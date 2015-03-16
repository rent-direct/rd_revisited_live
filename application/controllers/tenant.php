<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tenant extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        /* Load all required libraries, models and helpers that are not autoloaded */
        $this->load->model('Tenantmodel');
        $this->load->model('Propertymodel');

        //Copied from MY_CONTROLLER BECAUSE WE HAD PROBLEMS THAT NEED FIXING FROM DEV TO LIVE
        if ($this->ion_auth->logged_in())
        {
            $this->data['logged_in'] = TRUE;
            $data['user_object'] = $this->ion_auth->user()->row();
            $this->data['user_data'] = (array) $data['user_object'];
            $this->data['user_id'] = $data['user_object']->id;
        }

        // Check if there are any new viewing requests
        $this->data['num_viewing_requests'] = $this->Tenantmodel->get_number_of_viewing_requests($this->data['user_data']['id']);
        // Get the number of saved properties
        $this->data['num_saved_properties'] = $this->Tenantmodel->get_number_of_saved_properties($this->data['user_data']['id']);

        if (!$this->ion_auth->in_group('user'))
        {
            redirect('/');
        }

    }

    public function index()
    {
            $this->load->view("tenant/includes/tenant_header_view");
            $this->load->view("tenant/includes/tenant_nav_view");
            $this->load->view("tenant/tenant_home_view",$this->data);
            $this->load->view("tenant/includes/tenant_footer_view");
    }

    public function profile()
    {

    }

    public function properties() // saved properties
    {
        if ($this->ion_auth->in_group('user')) {

            $user_id = $this->ion_auth->user()->row()->id;
            $this->data['properties_data'] = $this->Tenantmodel->get_saved_properties($user_id);
            $this->data['num_props'] = count($this->data['properties_data']);

            $this->load->view("tenant/includes/tenant_header_view");
            $this->load->view("tenant/includes/tenant_nav_view");
            $this->load->view("tenant/tenant_properties_view",$this->data);
            $this->load->view("tenant/includes/tenant_footer_view");
        }
        else
        {
            echo 'Your not logged in as a tenant, if you require to rent properties please sign up as a tenant';
            $this->load->view('404_view');
        }
    }
    public function viewings()
    {
        if ($this->ion_auth->in_group('user')) {

            $this->data['viewings_data'] = $this->Tenantmodel->get_viewing_requests($this->data['user_data']['id']);
           // exit(print_r($this->data['viewings_data']));
            foreach ($this->data['viewings_data'] as $key=>$value) {
                $this->data['viewings_data'][$key]['views'] = $this->Propertymodel->get_property_views($value['viewing_property_id'], 'all');
                $this->data['viewings_data'][$key]['shares'] = $this->Propertymodel->get_property_shares($value['viewing_property_id'], 'all');
                $this->data['viewings_data'][$key]['saves'] = $this->Propertymodel->get_property_saves($value['viewing_property_id'], 'all');
            }

            $this->load->view("tenant/includes/tenant_header_view");
            $this->load->view("tenant/includes/tenant_nav_view");
            $this->load->view("tenant/tenant_viewings_view",$this->data);
            $this->load->view("tenant/includes/tenant_footer_view");
        }
        else
        {
            echo 'Your not logged in as a tenant, if you require to rent properties please sign up as a tenant';
            $this->load->view('404_view');
        }
    }

    public function viewing_request() {
        $request_id = $this->uri->segment(3);
        $this->data['request_data'] = $this->Tenant->get_viewing_request($request_id);
        if (empty($this->data['request_data'])) {
            $this->data['request_deleted'] == TRUE;
        }
        $this->load->view("tenant/includes/tenant_header_view");
        $this->load->view("tenant/includes/tenant_nav_view");
        $this->load->view("tenant/tenant_viewings_request_view",$this->data);
        $this->load->view("tenant/includes/tenant_footer_view");
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
            //create the active tabs
            $data['activeTab'] = "home";

            //load the views
            $this->load->view("tenant/includes/tenant_header_view");
            $this->load->view("tenant/includes/tenant_nav_view");
            $this->load->view("tenant/tenant_settings_view", $this->data);
            $this->load->view("tenant/includes/tenant_footer_view");
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

            //load the views
            $this->load->view("tenant/includes/tenant_header_view");
            $this->load->view("tenant/includes/tenant_nav_view");
            $this->load->view("tenant/tenant_home_view",$success,$this->data);
            $this->load->view("tenant/includes/tenant_footer_view");

        }

    }
    public function logout()
    {
        $this->ion_auth->logout();
        redirect('home');
    }

}