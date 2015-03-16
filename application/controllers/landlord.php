<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * THIS IS THE MAIN LANDLORD CONTROLLER FOR THE BACKEND
 * TODO: UPLOAD FILES WITH AJAX // http://code.tutsplus.com/tutorials/how-to-upload-files-with-codeigniter-and-ajax--net-21684
 *
 *
 */


class Landlord extends My_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Landlordmodel');
        $this->load->model('Propertymodel');
        $this->load->model('Messagesmodel');
        $this->load->model('Utilmodel');

        //Copied from MY_CONTROLLER BECAUSE WE HAD PROBLEMS THAT NEED FIXING FROM DEV TO LIVE
        if ($this->ion_auth->logged_in())
        {
            $this->data['logged_in'] = TRUE;
            $data['user_object'] = $this->ion_auth->user()->row();
            $this->data['user_data'] = (array) $data['user_object'];
            $this->data['user_id'] = $data['user_object']->id;

            //Grab the messages for the nav menu
            $user_id = $this->data['user_id'];
            $limit = 5;
            $this->data['landlord_messages'] = $this->Messagesmodel->get_landlord_nav_messages($user_id,$limit);
        }

        if (!$this->ion_auth->in_group('landlord'))
        {
            redirect('/');
        }
    }

    public function index()
    {

        $this->load->library('Worldpay_direct');

        $user_id = $this->data['user_id'];

        $data = array(
            'property_count' => $this->Propertymodel->get_overall_property_count(),
            'message_count' =>  $this->Messagesmodel->get_overall_message_count($user_id),
            'listed_properties' => $this->Landlordmodel->get_listed_properties_count($user_id),
            'viewing_requests' => $this->Landlordmodel->get_overall_viewing_req_count($user_id)
        );

            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view",$this->data);
            $this->load->view("landlord/landlord_home_view",$data);
            $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function purchase_listing()
    {
        $prop_id = $this->uri->segment(3);

        $this->load->model('Adminmodel');

        $this->data['basic_description'] = $this->Adminmodel->get_description(1);
        $this->data['featured_description'] = $this->Adminmodel->get_description(2);
        $this->data['premium_description'] = $this->Adminmodel->get_description(3);
        $this->data['headliner_description'] = $this->Adminmodel->get_description(4);
        $this->data['basic_price'] = $this->Adminmodel->get_price(1);
        $this->data['featured_price'] = $this->Adminmodel->get_price(2);
        $this->data['premium_price'] = $this->Adminmodel->get_price(3);
        $this->data['headliner_price'] = $this->Adminmodel->get_price(4);

        $user_id = $this->data['user_id'];
        $this->data['draft_props'] = $this->Propertymodel->get_landlord_draft_properties($user_id);

        $this->data['purchase_prop_id'] = $prop_id;


        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_purchase_listing_view",$this->data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function confirm_checkout_details()
    {
        //------------------------------------------------------------------/
        //--------------WORLDPAY DIRECT INTEGRATION-------------------------/
        //------------------------------------------------------------------/

        $user_sub_type = $this->input->post('user_subscription_type');
        $purchase_prop_id = $this->input->post('purchase_prop_id');

        $user_data = (array) $this->ion_auth->user()->row();

        $mode = 0; //1 for live - 0 for debug
        if ($mode == 0) { $MerchantID = 'RentDi-6687237'; }
        if ($mode == 1) { $MerchantID = 'RentDi-4495682'; }

        $datetime_purchase = $str = date('Y-m-d H:i:s O');
        $PreSharedKey = 'e1DYJkOk2FkiTFxR7x3XAWvmhL47HWNuGlhUUy6gQnBCppUBdudQ89IX+yeOQ0yk3A==';
        $Password = 'RentDirect666';
        $CurrencyCode = '826';
        $transaction_type = 'SALE';

        $this->load->model('Adminmodel');
        if($user_sub_type == 1) { $wpPrice = $this->Adminmodel->get_price(1); }
        if($user_sub_type == 2) { $wpPrice = $this->Adminmodel->get_price(2); }
        if($user_sub_type == 3) { $wpPrice = $this->Adminmodel->get_price(3); }
        if($user_sub_type == 4) { $wpPrice = $this->Adminmodel->get_price(4); }

        //TAKE OUT THE DECIMAL POINT FOR WORLDPAY
        $final_checkout_price = str_replace('.', '', $wpPrice);

        //ORDER REF:
        $prop_ref = $this->Propertymodel->get_prop_reference($purchase_prop_id);
        $order_id = $user_sub_type;
        $order_description = $prop_ref;
        $callback_url = base_url('landlord/payment_success_final');
        $ServerResultURL = base_url('payment_process');

        //Generate Hashstring - use combination of post variables and variables stripped of invalid characters
        $HashString="PreSharedKey=" . $PreSharedKey;
        $HashString=$HashString . '&MerchantID=' . $MerchantID;
        $HashString=$HashString . '&Password=' . $Password;
        $HashString=$HashString . '&Amount=' . $final_checkout_price;
        $HashString=$HashString . '&CurrencyCode=' . $CurrencyCode;
//        $HashString=$HashString . '&EchoAVSCheckResult=' . 'true';
//        $HashString=$HashString . '&EchoCV2CheckResult=' . 'true';
//        $HashString=$HashString . '&EchoThreeDSecureAuthenticationCheckResult=' . 'true';
//        $HashString=$HashString . '&EchoCardType=' . 'true';
        $HashString=$HashString . '&OrderID=' . $order_id;
        $HashString=$HashString . '&TransactionType=' . $transaction_type;
        $HashString=$HashString . '&TransactionDateTime=' . $datetime_purchase;
        $HashString=$HashString . '&CallbackURL=' . $callback_url;
        $HashString=$HashString . '&OrderDescription=' . $order_description;
        $HashString=$HashString . '&CustomerName=' . $user_data['first_name'] . ' ' . $user_data['last_name'];
        $HashString=$HashString . '&Address1=' .  $user_data['address_1'];
        $HashString=$HashString . '&Address2=' .  $user_data['address_2'];
        $HashString=$HashString . '&Address3=' .  $user_data['address_3'];
        $HashString=$HashString . '&Address4=' .  '';
        $HashString=$HashString . '&City=' .  $user_data['city'];
        $HashString=$HashString . '&State=' .  $user_data['county'];
        $HashString=$HashString . '&PostCode=' .  $user_data['postcode'];
        $HashString=$HashString . '&CountryCode=' . $CurrencyCode;
        $HashString=$HashString . '&EmailAddress=' .  $user_data['email'];
        $HashString=$HashString . '&PhoneNumber=' .  $user_data['phone'];
//        $HashString=$HashString . '&EmailAddressEditable=' . 'false';
//        $HashString=$HashString . '&PhoneNumberEditable=' . 'false';
//        $HashString=$HashString . "&CV2Mandatory=" . 'true';
//        $HashString=$HashString . "&Address1Mandatory=" . 'false';
//        $HashString=$HashString . "&CityMandatory=" . 'false';
//        $HashString=$HashString . "&PostCodeMandatory=" . 'false';
//        $HashString=$HashString . "&StateMandatory=" . 'false';
//        $HashString=$HashString . "&CountryMandatory=" . 'false';
          $HashString=$HashString . "&ResultDeliveryMethod=" . 'SERVER';
          $HashString=$HashString . "&ServerResultURL=" . $ServerResultURL;
          $HashString=$HashString . "&PaymentFormDisplaysResult=" . 'false';

        //Encode HashDigest using SHA1 encryption (and create HashDigest for later use)
        //- This is used as a checksum by the gateway to ensure form post hasn't been tampered with.
        // USE utf8_encode() if we still have problems
        $this->data['HashString'] = $HashString;
        $this->data['HashDigest'] = sha1($HashString);

        $this->data['MerchantID'] = $MerchantID;
        $this->data['Amount'] = $final_checkout_price;
        $this->data['CurrencyCode'] = $CurrencyCode;
        $this->data['OrderID'] = $order_id;
        $this->data['TransactionDateTime'] = $datetime_purchase;
        $this->data['TransactionType'] = $transaction_type;
        $this->data['CallbackURL'] = $callback_url;
//        $this->data['CV2Mandatory'] = 'true';
//        $this->data['Address1Mandatory'] = 'false';
//        $this->data['CityMandatory'] = 'false';
//        $this->data['PostCodeMandatory'] = 'false';
//        $this->data['StateMandatory'] = 'false';
//        $this->data['CountryMandatory'] = 'false';
        $this->data['ResultDeliveryMethod'] = 'SERVER';
        $this->data['OrderDescription'] = $order_description;
        $this->data['CustomerName'] =  $user_data['first_name'] . ' ' . $user_data['last_name'];
        $this->data['Address1'] = $user_data['address_1'];
        $this->data['Address2'] = $user_data['address_2'];
        $this->data['Address3'] = $user_data['address_3'];
        $this->data['Address4'] = '';
        $this->data['City'] = $user_data['city'];
        $this->data['State'] = $user_data['county'];
        $this->data['Postcode'] = $user_data['postcode'];
        $this->data['CountryCode'] = $CurrencyCode;
        $this->data['EmailAddress'] = $user_data['email'];
        $this->data['PhoneNumber'] = $user_data['phone'];
        $this->data['ResultDeliveryMethod'] = 'SERVER';
        $this->data['ServerResultURL'] = $ServerResultURL;

        // $this->data['user_subscription_type'] = $this->input->post('user_subscription_type');
       // $this->data['purchase_prop_id'] = $this->input->post('purchase_prop_id');

        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_confirm_checkout_view",$this->data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }



    /**
     * This is the dashboard version of the add property section (E.G. NOT THE WIZARD)
     */
    public function add() // ------STEP 1------- of add prop process
    {
        $this->load->model('Landlordmodel');
        $this->load->library('form_validation');

        //***************DISABLE SET_RULES FOR DEBUGGING PURPOSES**********************
        $this->form_validation->set_rules('rent', 'Rent', 'required');
        $this->form_validation->set_rules('bond', 'Bond', 'required');
        $this->form_validation->set_rules('furnished', 'Furnished', 'required');
        $this->form_validation->set_rules('bedrooms', 'Bedrooms', 'required');
        $this->form_validation->set_rules('address_1', 'Address Line 1 - Street Number..', 'required');
//        $this->form_validation->set_rules('address_3', 'Address Line 3 - Street Details...', 'required');
        $this->form_validation->set_rules('postcode', 'Postcode', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        //**********************END OF DEBUG*******************************************

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view");
            $this->load->view("landlord/landlord_add_view");
            $this->load->view("landlord/includes/landlord_footer_view");
        } else {

            $this->load->helper('url');
            $postdata = array(
                'type_id' => $this->input->post('type_id'),
                'sub_type_id' => $this->input->post('sub_type_id'),
                'bedrooms' => $this->input->post('bedrooms'),
                'bathrooms' => $this->input->post('bathrooms'),
                'ensuite' => $this->input->post('ensuite'),
                'furnished' => $this->input->post('furnished'),
                'parking' => $this->input->post('parking'),
                'has_parking' => $this->input->post('has_parking'),
                'floors' => $this->input->post('floors'),
                'rent_type' => $this->input->post('rent_type'),
                'rent' => $this->input->post('rent'),
                'bond' => $this->input->post('bond'),
                'additional_fees' => $this->input->post('additional_fees'),
                'date_available' => $this->input->post('date_available'),
                'description' => $this->input->post('description'),
                'interior_features' => $this->input->post('interior_features'),
                'distances' => $this->input->post('distances'),
                'outdoor_features' => $this->input->post('outdoor_features'),
                'kitchen_features' => $this->input->post('kitchen_features'),
                'views' => $this->input->post('views'),

                'generic_street_name' => $this->input->post('generic_street_name'),
                'address_1' => $this->input->post('address_1'),
                'address_2' => $this->input->post('address_2'),
                'address_3' => $this->input->post('address_3'),
                'city' => $this->input->post('city'),
                'postcode' => $this->input->post('postcode'),
                'county' => $this->input->post('county'),
                'country' => $this->input->post('country'),

                'lat' => $this->input->post('lat'),
                'lng' => $this->input->post('lng'),
                'market_status' => $this->input->post('market_status'),
                'date_let' => $this->input->post('date_let'),
                'last_updated' => $this->input->post('last_updated'),
                'pets_allowed' => $this->input->post('pets_allowed'),
                'smoking_allowed' => $this->input->post('smoking_allowed'),
                'dhss_allowed' => $this->input->post('dhss_allowed'),
                'external_video_url' => $this->input->post('external_video_url'),
                'qr_code_filename' => $this->input->post('qr_code_filename'),
                'term_type' => $this->input->post('term_type'),
                'term_length_number' => $this->input->post('term_length_number'),
                'has_paid' => 0,
                'published' => 0,
                'user_subscription_type' => 0
            );

            // Date added
            $this->load->helper('date');
            $postdata['date_added'] = date("Y-m-d");

            //user id post
            $postdata['user_id'] = $this->Landlordmodel->get_user_id();
            $for_prop_count = $this->Landlordmodel->get_user_id();

            //generate a title using user input
            $rooms = $postdata['bedrooms'];
            $type = $postdata['sub_type_id'];
            $city = $postdata['city'];
            $gTitle = $postdata['generic_street_name'];

            //convert type ids for the title string, maybe create a function later on
            if ($type == 1) $typeString = 'Semi Detached';
            if ($type == 2) $typeString = 'Detached';
            if ($type == 3) $typeString = 'Flat';
            if ($type == 4) $typeString = 'Maisonette';
            if ($type == 5) $typeString = 'Bungalow';
            if ($type == 6)  $typeString = 'Apartment';

            //Assign a generic reference number to the property for future references, invoices and more!!
            $prop_id = $this->Landlordmodel->randKey();

            //change the unique reference to capitals which is more presentable on document print offs etc
            $postdata['prop_id'] = strtoupper($prop_id);

            //Change the first word to uppercase and rest lower, due to the postcode api or even user input
             $cityString = strtolower($city);

            //OUTPUT TITLE then carry on manipulating the strings
            $finalTitle  = $rooms . ' Bed ' . $typeString . ' on ' . $gTitle . ' in ' . ucwords($cityString);

            //post the title
            $postdata['title'] = $finalTitle;

            //create the underscore in spaces to create the slug
            $slug = str_replace(' ', '_', $finalTitle);

            $postdata['slug'] = strtolower($slug);

            $this->data['send_id'] = $this->Landlordmodel->insert($postdata);

            //lets add 1 to prop count for the users table, this will be viewed on frontend profile data for landlords
            $this->Landlordmodel->add_landlord_prop_count($for_prop_count);

            //now post the data into properties database then load the payment/success page
            //update: and display id for following posts to progress....
            $error = array('error' => 'Please upload the main property pictures');

            //Now goto the add property image and set up some unique variables for referencing images to the user
            //$this->add_property_image();
            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view",$this->data);
            $this->load->view("landlord/landlord_add_photos",$this->data,$error);
            $this->load->view("landlord/includes/landlord_footer_view");
        }
    }

    public function test_upload()
    {
        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view");
        $this->load->view("landlord/landlord_add_photos");
        $this->load->view("landlord/includes/landlord_footer_view");
    }
	
	public function add_property_images()
	{
        // grab the unique id of the property so we can contain them into there own folder
        $id = $this->input->post('id');

        // Here we will get the slug data from the property for the image file name
        $prop_slug = $this->Landlordmodel->get_prop_slug($id);

        // load the libraries at first
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');

        $filename = $prop_slug . '_';

        $upload_conf = array(
            'upload_path'   => './gallery/' . $id,
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '30000',
            'file_name' => $filename
        );

        $this->upload->initialize($upload_conf);

        /*
         * LETS MAKE THE DIRECTORIES IF THEY DO NOT EXIST!
         * EG. TENANTS HAVE NOT YET UPLOADED ANYTHING YET HERE IS THE START...
         */
        if (!is_dir('gallery'))
        {
            mkdir('./gallery', 0777, true);
        }
        $dir_exist = true; // flag for checking the directory exist or not
        if (!is_dir('gallery/' . $id))
        {
            mkdir('./gallery/' . $id, 0777, true);
            $dir_exist = false; // dir not exist
        }

        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
                $i++;
            }
        }
        // Unset the useless one ;)
        unset($_FILES['userfile']);

        // Put each errors and upload data to an array
        $error = array();
        $success = array();

        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {
            if (!$this->upload->do_upload($field_name))
            {
                // if upload fail, grab error
                $error['upload'][] = $this->upload->display_errors();
                // exit(print_r($error)); // temp function for debug (DELETE ON LAUNCH!!)
            }
            else
            {
                // otherwise, put the upload datas here.
                // if you want to use database, put insert query in this loop
                $upload_data = $this->upload->data();

                //set the name for the image
                $new_filename = $upload_data['raw_name'].$upload_data['file_ext'];

                // Now add to the database for reference
                $this->Landlordmodel->insert_gallery_images($id, $new_filename);

                // set the resize config
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['full_path'],
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
                    'maintain_ratio' => FALSE,
                    'width'         => 80,
                    'height'        => 80
                );

                // initializing
                $this->image_lib->initialize($resize_conf);

                // do it!
                if (!$this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                    //exit(print_r($error)); // temp function for debug (DELETE ON LAUNCH!!)
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $success[] = $upload_data;
                }

            }
        }

        // see what we get
        if(count($error > 0))
        {
            $data['error'] = $error;
        }
        else
        {
            $data['success'] = $upload_data;
        }

        /**
         * CREATE THE QR CODE
         * https://github.com/dwisetiyadi/CodeIgniter-PHP-QR-Code
         */
        // CONFIG:
        $this->load->library('ciqrcode');

        //$qr_id = $this->input->post('id');
        $qr_id = $id;

        $data['id'] = $id;

        $slug = $this->Utilmodel->get_prop_slug($qr_id);

        $link = base_url('property/view') . '/' . $slug;
        $params['data'] = $link;
        $params['level'] = 'H';
        $params['size'] = 2;
        $params['savename'] = "./qr_codes/" . $qr_id . '.png';
        $this->ciqrcode->generate($params);

        $data['images'] = $this->Landlordmodel->get_all_gallery_images($id);

       // var_dump($data['images']);

        /* Load "success" view with all the data! */
        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_main_image_view",$data);
        $this->load->view("landlord/includes/landlord_footer_view");
	}


    public function add_property_image() //------STEP 2------- of add prop process
    {
        /* Upload Settings */
        $config['upload_path'] = './prop_images';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '30000';

        /* Encrypting helps prevent the file name from being discerned once its saved */
        $config['encrypt_name'] = 'TRUE';

        /* Load the CodeIgniter upload library, feed it the config from above */
        $this->load->library('upload', $config);

        /* INIT CONFIG */
        $this->upload->initialize($config);

        /* Checks if the do_upload function has been successfully executed ...
	     and if not, shows the upload form and any errors (if they exist) */
        if (!$this->upload->do_upload()){

            /* Process errors if they exist */
            $error = array('error' => $this->upload->display_errors());

            /* Pass everything into the views */
            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view",$this->data);
            $this->load->view("landlord/landlord_add_photo", $error);
            $this->load->view("landlord/includes/landlord_footer_view");

            /* ... if the file passes validation ... */
        } else {

            /* Assign the upload's metadata (size, dimensions, destination, etc.) ...
	            ... to an array with another nice, clean variable */
            $upload = (array) $this->upload->data();

            /* Uses two upload library features to assemble the file name (the name, and extension) */
            $filename = $upload['raw_name'].$upload['file_ext'];

            /* Same with the thumbnail we'll generate, but with the suffix '_thumb' */
            $thumb = $upload['raw_name']."_thumb".$upload['file_ext'];

            /* Set the rules for the upload */
            $config['image_library'] = 'gd2';
            $config['source_image']	= "./prop_images/".$filename;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']	 = 128;
            $config['height']	= 128;

            /* Load "image manipulation library", see CodeIgniter user guide */
            $this->load->library('image_lib', $config);
            /* INIT CONFIG */
            $this->upload->initialize($config);

            /* Resize the image! */
            $this->image_lib->resize();

            /* Assign upload_data to $data variable */
            $data['upload_data'] = $this->upload->data();

            // here we will write out a description vars for the admin to use to edit prices etc
            $this->load->model('Adminmodel');

            //retreive the database ID of the last inputs
            $data = array(
                'id' => $this->input->post('id'),
                'basic_description' => $this->Adminmodel->get_description(1),
                'featured_description' => $this->Adminmodel->get_description(2),
                'premium_description' => $this->Adminmodel->get_description(3),
                'headliner_description' => $this->Adminmodel->get_description(4),
                'basic_price' => $this->Adminmodel->get_price(1),
                'featured_price' => $this->Adminmodel->get_price(2),
                'premium_price' => $this->Adminmodel->get_price(3),
                'headliner_price' => $this->Adminmodel->get_price(4)
            );

            /* Runs the users model (update_photo function, see below) and ...
	        ... loads the location of the photo new photo into prop profile                                               */
            $this->Landlordmodel->primary_prop_image($data['id'], $filename, $thumb);

            /**
             * CREATE THE QR CODE
             * https://github.com/dwisetiyadi/CodeIgniter-PHP-QR-Code
             */
            // CONFIG:
            $this->load->library('ciqrcode');

            $qr_id = $this->input->post('id');

            $slug = $this->Utilmodel->get_prop_slug($qr_id);

            $link = base_url('property/view') . '/' . $slug;
            $params['data'] = $link;
            $params['level'] = 'H';
            $params['size'] = 2;
            $params['savename'] = "./qr_codes/" . $qr_id . '.png';
            $this->ciqrcode->generate($params);

            /* Load "success" view with all the data! */
            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view",$this->data);
            $this->load->view("landlord/landlord_add_success",$data);
            $this->load->view("landlord/includes/landlord_footer_view");
        }
    }

    public function select_main_image() // last process of add property
    {
        // FOR MORE REF: http://stackoverflow.com/questions/7935456/input-type-image-submit-form-value

        $id = $this->input->post('main_image');
        var_dump($id);

        $this->Landlordmodel->make_primary_image($id);

        /* Load "success" view with all the data! */
        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_add_success");
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function add_success() // OLD ---- NEEDS DELETING
    {
            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view");
            $this->load->view("landlord/landlord_add_worldpay");
            $this->load->view("landlord/includes/landlord_footer_view");
    }


    public function payment_success_final()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);

        // var_dump($params);

        $OrderID = $params['OrderID'];

        $CrossReference = $params['CrossReference'];

        if ($OrderID == 0) { $OrderID = 'Draft'; }
        if ($OrderID == 1) { $OrderID = 'Featured'; }
        if ($OrderID == 2) { $OrderID = 'Premium'; }
        if ($OrderID == 3) { $OrderID = 'Headliner'; }

        $ExpireDate = $this->Utilmodel->get_prop_expire_date($CrossReference);

        $data = array('OrderID' => $OrderID,
                      'ExpireDate' => $ExpireDate);

        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view");
        $this->load->view("landlord/landlord_payment_success_view",$data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function headliner_options()
    {
        $mode = $this->uri->segment(3);

        $prop_id = $this->uri->segment(3);

        $this->data['property_data'] = $this->Propertymodel->get_landlord_property_by_id($prop_id);

        if ($mode == 'crop') // needs possible tweaks??
        {
            $this->load->library('image_lib');

            //set source file path and destination of file path
            $path = $this->input->post('file_name');
           //var_dump($path);
            $id = $this->input->post('id');
            $src_path = './prop_images/' . $path;
            $des_path = './prop_images/headliners/' . $path;

            $filename = $path;

            $x = $this->input->post('x');
            $y = $this->input->post('y');
            $x2 = $this->input->post('x2'); // tweak?
            $y2 = $this->input->post('y2'); // tweak?
            $width = $this->input->post('w');
            $height = $this->input->post('h');

            //set image library configuration
            $config['image_library']    = 'gd2';
            $config['source_image']     = $src_path;
            $config['new_image']        = $des_path;
            $config['maintain_ratio']   = FALSE;
            $config['width']            = $width;
            $config['height']           = $height;
            $config['x_axis']           = $x;
            $config['y_axis']           = $y;

            $this->image_lib->initialize($config);

            if (!$this->image_lib->crop()){
                $status = array('error' => $this->image_lib->display_errors());

                $this->load->view("landlord/includes/landlord_header_view_fresh");
                $this->load->view("landlord/includes/landlord_nav_view",$this->data);
                $this->load->view("landlord/landlord_headliner_view",$status);
                $this->load->view("landlord/includes/landlord_footer_view_fresh");
            } else {

                $this->Landlordmodel->headliner_prop_image($id, $filename);

                $status = array('crop_success' => 'You have successfully cropped the image for Headliner');

                $this->load->view("landlord/includes/landlord_header_view_fresh");
                $this->load->view("landlord/includes/landlord_nav_view",$this->data);
                $this->load->view("landlord/landlord_headliner_view",$status);
                $this->load->view("landlord/includes/landlord_footer_view_fresh");
            }

        } else {

            $this->load->view("landlord/includes/landlord_header_view_fresh");
            $this->load->view("landlord/includes/landlord_nav_view",$this->data);
            $this->load->view("landlord/landlord_headliner_view",$this->data);
            $this->load->view("landlord/includes/landlord_footer_view_fresh");

        }
    }

    public function properties()
    {
        $user_id = $this->data['user_data']['id'];
        $this->data['property_data'] = $this->Propertymodel->get_landlord_properties($user_id);

        $this->load->view("landlord/includes/landlord_header_view_proplist");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_properties_view",$this->data);
        $this->load->view("landlord/includes/landlord_footer_view_proplist");
    }

    public function viewings()
    {
        // Get the landlord's user id
        $user_id = $this->data['user_data']['id'];
        $this->data['viewings_data'] = $this->Landlordmodel->get_viewing_requests($user_id);

        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_viewings_view",$this->data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function viewing_request() {

        $request_id = $this->uri->segment(3);
        $this->data['request_data'] = $this->Landlordmodel->get_viewing_request($request_id);

        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_viewings_request_view", $this->data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function calendar()
    {
        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_calendar_view",$this->data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function tenants()
    {
        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_tenants_view",$this->data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function ratings()
    {
        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_ratings_view",$this->data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function settings()
    {

        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view",$this->data);
            $this->load->view("landlord/landlord_settings_view", $this->data);
            $this->load->view("landlord/includes/landlord_footer_view");
        } else {
                $postdata = array(
                    'address_1' => $this->input->post('address_1'),
                    'address_2' => $this->input->post('address_2'),
                    'address_3' => $this->input->post('address_3'),
                    'city' => $this->input->post('city'),
                    'postcode' => $this->input->post('postcode'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                    'county' => $this->input->post('county'),
                    'country' => $this->input->post('country'),
                    'first_name' => $this->input->post('first_name'),
                    'middle_name' => $this->input->post('middle_name'),
                    'last_name' => $this->input->post('last_name'),
                    'password' => $this->input->post('password')
                );

            $id = $this->data['user_id'];

            $this->ion_auth->update($id, $postdata);

            $success = array('success' => 'Successfully Updated Details');

            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view");
            $this->load->view("landlord/landlord_home_view",$success);
            $this->load->view("landlord/includes/landlord_footer_view");
        }

    }

    public function gallery()
    {
        $mode = $this->uri->segment(3);

        $user_id = $this->data['user_id'];

        $this->data['prop_gallery'] = $this->Propertymodel->get_landlord_properties($user_id);

        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view");
        $this->load->view("landlord/landlord_gallery_view",$this->data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    /**
     * FUNCTION FOR UPLOAD IMAGES TO A SPECIFIC PROPERTY
     */
    public function gallery_upload()
    {
        // grab the unique id of the property so we can contain them into there own folder
        $id = $this->input->post('prop_select_id');

        // Here we will get the slug data from the property for the image file name
        $prop_slug = $this->Landlordmodel->get_prop_slug($id);

        // load the libraries at first
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->library('image_lib');

        $filename = $prop_slug . '_';

        $upload_conf = array(
            'upload_path'   => './gallery/' . $id,
            'allowed_types' => 'gif|jpg|png',
            'max_size'      => '30000',
            'file_name' => $filename
        );

        $this->upload->initialize($upload_conf);

        /*
         * LETS MAKE THE DIRECTORYS IF THEY DO NOT EXIST!
         * EG. TENANTS HAVE NOT YET UPLOADED ANYTHING YET HERE IS THE START...
         */
        if (!is_dir('gallery'))
        {
            mkdir('./gallery', 0777, true);
        }
        $dir_exist = true; // flag for checking the directory exist or not
        if (!is_dir('gallery/' . $id))
        {
            mkdir('./gallery/' . $id, 0777, true);
            $dir_exist = false; // dir not exist
        }

        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
                $i++;
            }
        }
        // Unset the useless one ;)
        unset($_FILES['userfile']);

        // Put each errors and upload data to an array
        $error = array();
        $success = array();

        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {
            if (!$this->upload->do_upload($field_name))
            {
                // if upload fail, grab error
                $error['upload'][] = $this->upload->display_errors();
               // exit(print_r($error)); // temp function for debug (DELETE ON LAUNCH!!)
            }
            else
            {
                // otherwise, put the upload datas here.
                // if you want to use database, put insert query in this loop
                $upload_data = $this->upload->data();

                //set the name for the image
                $new_filename = $upload_data['raw_name'].$upload_data['file_ext'];

                // Now add to the database for reference
                $this->Landlordmodel->insert_gallery_images($id, $new_filename);

                // set the resize config
                $resize_conf = array(
                    // it's something like "/full/path/to/the/image.jpg" maybe
                    'source_image'  => $upload_data['full_path'],
                    // and it's "/full/path/to/the/" + "thumb_" + "image.jpg
                    // or you can use 'create_thumbs' => true option instead
                    'new_image'     => $upload_data['file_path'].'thumb_'.$upload_data['file_name'],
                    'maintain_ratio' => FALSE,
                    'width'         => 80,
                    'height'        => 80
                );

                // initializing
                $this->image_lib->initialize($resize_conf);

                // do it!
                if (!$this->image_lib->resize())
                {
                    // if got fail.
                    $error['resize'][] = $this->image_lib->display_errors();
                    exit(print_r($error)); // temp function for debug (DELETE ON LAUNCH!!)
                }
                else
                {
                    // otherwise, put each upload data to an array.
                    $success[] = $upload_data;
                }

            }
        }

        // see what we get
        if(count($error > 0))
        {
            $data['error'] = $error;
        }
        else
        {
            $data['success'] = $upload_data;
        }

        $user_id = $this->data['user_id'];

        $this->data['prop_gallery'] = $this->Propertymodel->get_landlord_properties($user_id);

        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_gallery_view",$this->data,$data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function resources()
    {
        $this->load->view("landlord/includes/landlord_header_view");
        $this->load->view("landlord/includes/landlord_nav_view",$this->data);
        $this->load->view("landlord/landlord_resources_view",$this->data);
        $this->load->view("landlord/includes/landlord_footer_view");
    }

    public function inbox()
    {
        $mode = $this->uri->segment(3);

        if ($mode == 'compose')
        {
            $id = $this->data['user_id'];
            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view",$this->data);
            $this->load->view("landlord/landlord_compose_view",$this->data);
            $this->load->view("landlord/includes/landlord_footer_view");
        }
        if ($mode == 'read')
        {
            $msg_id = $this->uri->segment(4);
            $user_id = $this->data['user_id'];

            $this->data['single_message'] = $this->Messagesmodel->grab_single_message($msg_id,$user_id);

            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view",$this->data);
            $this->load->view("landlord/landlord_read_view",$this->data);
            $this->load->view("landlord/includes/landlord_footer_view");
        }
        else
        {
            $id = $this->data['user_id'];
            $this->data['inbox_messages'] = $this->Messagesmodel->get_all_inbox_messages($id);
            $this->load->view("landlord/includes/landlord_header_view");
            $this->load->view("landlord/includes/landlord_nav_view",$this->data);
            $this->load->view("landlord/landlord_list_inbox_view",$this->data);
            $this->load->view("landlord/includes/landlord_footer_view");
        }

    }

    public function compose()
    {

    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('home');
    }

    public function wizard_flash()
    {
        $test = $this->input->post('address_1');
        exit(print_r($test));
        //var_dump($test);

        //set flash data at some point

        redirect('landlord/add');
    }

    public function refresh()
    {
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function documents()
    {
        /*
         * TODO: PARSER CLASS IN CODEIGNITER FOR DOCUMENT TO HTML
         */
        $mode = $this->uri->segment(3);

        switch ($mode) {
            case 'cold_weather':
                $this->load->view('landlord/documents/cold_weather_view');
                break;
            case 'service_charge':
                $this->load->view('landlord/documents/service_charge_view');
                break;
            case 'late_rent':
                $this->load->view('landlord/documents/late_rent_view');
                break;
            case 'rent_arrears':
                $this->load->view('landlord/documents/rent_arrears_view');
                break;
            case 'housing_benefit':
                $this->load->view('landlord/documents/housing_benefit_view');
                break;
            case 'tenant_warning_late_payment':
                $this->load->view('landlord/documents/tenant_warning_late_payment_view');
                break;
            case 'property_inventory':
                $this->load->view('landlord/documents/property_inventory_view');
                break;
            case 'property_inventory_unfurnished':
                $this->load->view('landlord/documents/property_inventory_unfurnished_view');
                break;
            case 'section_8':
                $this->load->view('landlord/documents/section_8_view');
                break;
            case 'section_21a':
                $this->load->view('landlord/documents/section_21a_view');
                break;
            case 'section_21b':
                $this->load->view('landlord/documents/section_21b_view');
                break;
            case 'security_deposit':
                $this->load->view('landlord/documents/security_deposit_view');
                break;
            case 'smoke_and_co_detector':
                $this->load->view('landlord/documents/smoke_and_co_detector_view');
                break;
            case 'tenancy_deposit_protection':
                $this->load->view('landlord/documents/tenancy_deposit_protection_view');
                break;
            case 'section_25':
                $this->load->view('landlord/documents/section_25_view');
                break;

        }

    }

}