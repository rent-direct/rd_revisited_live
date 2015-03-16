<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
    function __construct() {
        parent::__construct();
        /* Start of the premium features display code for frontend */
        $this->load->model('Homemodel');
        $this->load->model('Propertymodel');
        $this->load->model('Searchmodel');

        if ($this->ion_auth->logged_in())
        {
            $this->data['logged_in'] = TRUE;
            $data['user_object'] = $this->ion_auth->user()->row();
            $this->data['user_data'] = (array) $data['user_object'];
            $this->data['user_id'] = $data['user_object']->id;
        }

        $this->load->library('pagination');


    }

    public function index()
    {
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        $data['activeTab'] = "home";
        if ($this->ion_auth->is_admin())
        {
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_admin",$data);
            $this->load->view("home/home_view",$this->data);
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }
        //set the home variable for the tab in the data array
        $data['activeTab'] = "home";
        if (!$this->ion_auth->logged_in()) {
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view",$data);
            $this->load->view("home/home_view",$this->data);
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view");
        }
        if ($this->ion_auth->logged_in()) {

           if ($this->ion_auth->in_group('landlord')) {
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_landlord",$data);
            $this->load->view("home/home_view",$this->data);
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view_logged_in_landlord");
           }
           else if($this->ion_auth->in_group('user')) {
             $this->load->view("home/includes/header_view");
             $this->load->view("home/includes/menu_view_logged_in_tenant",$data);
             $this->load->view("home/home_view",$this->data);
             $this->load->view("home/includes/sub_footer");
             $this->load->view("home/includes/footer_view_logged_in_tenant");
           }
        }
    }

    public function arrange_viewing()
    {
        $post_data = $this->input->post();

        //var_dump($post_data);
        $this->Propertymodel->add_viewing($post_data);

        // set flashdata
        $this->session->set_flashdata('message', 'Thank you for your request, the landlord should be in touch soon!');

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('home');
    }

    public function login()
    {
        //validate form input
        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true)
        {
            //check to see if the user is logging in
            //check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            {
                //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message_login', $this->ion_auth->messages());
                redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {
                //if the login was un-successful
                //redirect them back to the login page
                $this->session->set_flashdata('message_login', $this->ion_auth->errors());
                redirect($_SERVER['HTTP_REFERER']); //use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        }
        else
        {
            //the user is not logging in so display the login page
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

            $this->_render_page('home/login', $this->data);
        }

    }

    public function register()
    {
        $this->session->set_flashdata('email', $this->input->post('email'));
        $this->session->set_flashdata('type_id', $this->input->post('type_id'));
        $this->session->set_flashdata('password', $this->input->post('password'));
        $this->session->set_flashdata('password_confirm', $this->input->post('password_confirm'));

        redirect('register', 'refresh');
    }

    public function search() //Main Execute search
    {

        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);

        //var_dump($params);

        $rent = $params['rent'];
        $bedrooms = $params['bedrooms'];
        $bathrooms = $params['bathrooms'];
        $keyword = $params['keyword'];

        $data['featured_properties'] = $this->Propertymodel->get_featured_properties_limit_onsearch(8, $keyword, $rent);

        $data['results'] = $this->Searchmodel->multi_search_slim_filter($keyword,$rent);

        // reposts on search view
        $data['search_strings'] = $params['keyword'];

        if (!$this->ion_auth->logged_in())
        {
            //create the active tabs
            $data['activeTab'] = "search";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view",$data);
            $this->load->view("home/search_view",$data);
            $this->load->view("home/includes/footer_view");
        }
        if ($this->ion_auth->in_group('landlord')) {
            //create the active tabs
            $data['activeTab'] = "search";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_landlord",$data);
            $this->load->view("home/search_view",$data);
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }
        if($this->ion_auth->in_group('user')) {
            //create the active tabs
            $data['activeTab'] = "search";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_tenant",$data);
            $this->load->view("home/search_view",$data);
            $this->load->view("home/includes/footer_view_logged_in_tenant");
        }

    }

    public function refine_search()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        parse_str($url['query'], $params);

       // var_dump($params);

        $keyword = $params['keyword'];

        $type = $params['sub_type_id'];
        //if ($type == 'NULL') { $type = NULL; }

        $min_rent = $params['min_rent'];
        $max_rent = $params['max_rent'];
        $bedrooms = $params['bedrooms'];
        $bathrooms = $params['bathrooms'];
        $parking = $params['parking'];

        $data['featured_properties'] = $this->Propertymodel->get_featured_properties_limit_onrefine(8, $keyword);

        $data['results'] = $this->Searchmodel->multi_search_refine($keyword,$type,$min_rent,$max_rent,$bedrooms,$bathrooms,$parking);

        // reposts on search view
        $data['search_strings'] = $params['keyword'];

        if (!$this->ion_auth->logged_in())
        {
            //create the active tabs
            $data['activeTab'] = "search";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view",$data);
            $this->load->view("home/search_view",$data);
            $this->load->view("home/includes/footer_view");
        }
        if ($this->ion_auth->in_group('landlord')) {
            //create the active tabs
            $data['activeTab'] = "search";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_landlord",$data);
            $this->load->view("home/search_view",$data);
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }
        if($this->ion_auth->in_group('user')) {
            //create the active tabs
            $data['activeTab'] = "search";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_tenant",$data);
            $this->load->view("home/search_view",$data);
            $this->load->view("home/includes/footer_view_logged_in_tenant");
        }
    }


    public function contact_us()
    {
        $this->load->model('Messagesmodel');

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'body' => $this->input->post('body'),
        );

        $issue = $this->input->post('issue');

        if ($issue == 1) { $istring = 'Enquiry'; }
        if ($issue == 2) { $istring = 'Problem'; }
        if ($issue == 3) { $istring = 'Request'; }
        if ($issue == 4) { $istring = 'Complaint'; }

        $data['issue'] = $this->input->post('issue');

        $this->Messagesmodel->contact_us($data);

        $this->session->set_flashdata('success_contacted', 'Thank you for contacting rent direct, we will be in touch very soon regarding your ' . $istring . '. In the mean time, why not have a good search through what we have to offer?');

        //send info an email:
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@rent-direct.co.uk', // change it to yours
            'smtp_pass' => 'Simone12!', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $from = $this->input->post('email');
        $name_sender = $this->input->post('name');
        $body = $this->input->post('body');

        $this->email->from($from, $name_sender);

        // TODO: redirect different emails in the future to the problem they have
        $this->email->to('info@rent-direct.co.uk');

        if ($issue == 2) { $this->email->cc('jamie@rent-direct.co.uk'); }

        //$this->email->bcc('them@their-example.com');

        $subject = 'Rent Direct: A ' . $istring . ' has been reported.';

        $this->email->subject($subject);
        $this->email->message($body);

        $this->email->send();

       // echo $this->email->print_debugger();

        redirect("home", 'refresh');

    }

    public function help()
    {

        if ($this->ion_auth->is_admin())
        {
            $data['activeTab'] = "help";

            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_admin",$data);
            $this->load->view("home/help_view");
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }

        //set the home variable for the tab in the data array
        $data['activeTab'] = "help";

        //Not logged in view data
        if (!$this->ion_auth->logged_in()) {
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view",$data);
            $this->load->view("home/help_view");
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view");
        }
        //auth groups
        if ($this->ion_auth->logged_in()) {

            if ($this->ion_auth->in_group('landlord')) {
                $this->load->view("home/includes/header_view");
                $this->load->view("home/includes/menu_view_logged_in_landlord",$data);
                $this->load->view("home/help_view");
                $this->load->view("home/includes/sub_footer");
                $this->load->view("home/includes/footer_view_logged_in_landlord");
            }
            else if($this->ion_auth->in_group('user')) {
                $this->load->view("home/includes/header_view");
                $this->load->view("home/includes/menu_view_logged_in_tenant",$data);
                $this->load->view("home/help_view");
                $this->load->view("home/includes/sub_footer");
                $this->load->view("home/includes/footer_view_logged_in_tenant");
            }

        }

    }



}