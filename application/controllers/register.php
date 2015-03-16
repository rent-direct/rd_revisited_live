<?php

class Register extends CI_Controller
{
    public function index()
    {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $tables = $this->config->item('tables', 'ion_auth');

        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');


        if ($this->form_validation->run() == FALSE) {
            $data['activeTab'] = "register";
            //load the views
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view", $data);
            $this->load->view("home/register_view");
            $this->load->view("home/includes/footer_view");
        }
        if ($this->form_validation->run() == true) {
            //Sign up form validation
            $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');
            //$type_id = $this->input->post('type_id');
            $additional_data = array(
                'type_id' => $this->input->post('type_id'),
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
                'agreed_on_terms' => $this->input->post('agreed_on_terms'),
            );

            if ($this->input->post('type_id') == 2) {
                $group = array('2');
            } else if ($this->input->post('type_id') == 3) {
                $group = array('3');
            } else if ($this->input->post('type_id') == 4) {
                $group = array('4');
            }
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
            //check to see if we are creating the user
            //redirect them back to the home page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->session->set_flashdata('success', 'done');
            redirect("home", 'refresh');
        } else {
            //display the create user form
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            // this is where we will render out the page to say we've created the account
            //$this->_render_page('register', $this->data);
        }


    }


}