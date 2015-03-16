<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Property extends MY_Controller
{
    function __construct() {
        parent::__construct();
        // Initialise data property as an array
        //$this->data = array();

        /* Load all required libraries, models and helpers that are not autoloaded */
      //  $this->load->model('membersmodel', 'members');
        $this->load->model('Propertymodel', 'props');
        $this->load->model('Landlordmodel', 'landlord');
        $this->load->model('Messagesmodel');
        $this->load->model('Utilmodel');
        $this->data['activeTab'] = "property";

        // TEMP COPY AS CONTROLLER MALFUNCTIONING ON LIVE
        if ($this->ion_auth->logged_in())
        {
            $this->data['logged_in'] = TRUE;
            $data['user_object'] = $this->ion_auth->user()->row();
            $this->data['user_data'] = (array) $data['user_object'];
            $this->data['user_id'] = $data['user_object']->id;
        }
    }


    public function index()
    {
        // EMPTY??

    }

    //PROP PROFILES
    public function view()
    {
        /* Get property data for display */
        $prop_id = $this->uri->segment(3);

        // Get main property data
        $this->data['property_data'] = $this->props->get_property_string_slug($prop_id, false);

        $user_id = $this->data['property_data']['user_id'];

        $prop_key_id = $this->data['property_data']['id'];

        $this->data['landlord_details'] = $this->landlord->get_user_details($user_id);

        if (isset($this->data['property_data']['furnished'])) {
            if ($this->data['property_data']['furnished'] == 0) {
                $this->data['property_data']['furnished'] = 'No';
            } else {
                $this->data['property_data']['furnished'] = 'Yes';
            }
        }

        if (isset($this->data['property_data']['pets_allowed'])) {
            if ($this->data['property_data']['pets_allowed'] == 0) {
                $this->data['property_data']['pets_allowed'] = 'No';
            } else if ($this->data['property_data']['pets_allowed'] == 1) {
                $this->data['property_data']['pets_allowed'] = 'Yes';
            } else {
                $this->data['property_data']['pets_allowed'] = 'Landlord&#39s discretion';
            }
        }

        if (isset($this->data['property_data']['smoking_allowed'])) {
            if ($this->data['property_data']['smoking_allowed'] == 0) {
                $this->data['property_data']['smoking_allowed'] = 'No';
            } else if ($this->data['property_data']['smoking_allowed'] == 1) {
                $this->data['property_data']['smoking_allowed'] = 'Yes';
            } else {
                $this->data['property_data']['smoking_allowed'] = 'Landlord&#39s discretion';
            }
        }

        if (isset($this->data['property_data']['dhss_allowed'])) {
            if ($this->data['property_data']['dhss_allowed'] == 0) {
                $this->data['property_data']['dhss_allowed'] = 'No';
            } else if ($this->data['property_data']['dhss_allowed'] == 1) {
                $this->data['property_data']['dhss_allowed'] = 'Yes';
            } else {
                $this->data['property_data']['dhss_allowed'] = 'Landlord&#39s discretion';
            }
        }

        // Grab the gallery images from specific properties
        $this->data['prop_gallery'] = $this->props->get_property_gallery($prop_key_id);

        $data['title'] = $this->data['property_data']['title'];

        //add hit to prop counter
        $this->Utilmodel->add_prop_hit($prop_key_id);

        //fetch hit prop data
        $this->data['hit_count'] = $this->Utilmodel->get_prop_hit($prop_key_id);

       // exit(print_r($this->data));


        //----------------USER AUTHS --------------------//

        if (!$this->ion_auth->logged_in())
        {
            //load the views with other menus etc
            $this->load->view("home/includes/header_view",$data);
            $this->load->view("home/includes/menu_view",$this->data);
            $this->load->view("home/property_view",$this->data);
            $this->load->view("home/includes/footer_view");

        }
        if ($this->ion_auth->in_group('landlord')) {
            //load the views with other menus etc
            $this->load->view("home/includes/header_view",$data);
            $this->load->view("home/includes/menu_view_logged_in_landlord",$this->data);
            $this->load->view("home/property_view",$this->data);
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }
        if($this->ion_auth->in_group('user')) {
            //load the views with other menus etc
            $this->load->view("home/includes/header_view",$data);
            $this->load->view("home/includes/menu_view_logged_in_tenant",$this->data);
            $this->load->view("home/property_view",$this->data);
            $this->load->view("home/includes/footer_view_logged_in_tenant");
        }
    }

    public function quick_contact()
    {
        $postdata = array(  'name' => $this->input->post('name'),
                            'phone' => $this->input->post('phone'),
                            'email' => $this->input->post('email'),
                            'body' => $this->input->post('body'),
                            'prop_id' => $this->input->post('prop_id'),
                            'landlord_id' => $this->input->post('landlord_id'),
                            'tenant_id' => $this->input->post('tenant_id')

        );

        $this->Messagesmodel->send_quick_contact_ajax($postdata);

        //var_dump($postdata);

        // set flashdata

        //$prop_id = $postdata['message_viewing_id'];

        redirect('home');
       // $this->view($prop_id);

    }

}