<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        // Initialise data property as an array
        $this->data = array();

        //load the models
        $this->load->model('Messagesmodel');
        $this->load->model('Calendarmodel');
        $this->load->model('Auditmodel');

        /* Check user login status and set vars for user data if logged in*/

    }

    public function add_message()
    {
        $message_data = $this->input->post();
        $message_data['message_datetime'] = date('Y-m-d H:i:s');
        $this->Messagesmodel->add_message($message_data);
        $data['response'] = "SUCCESS";
        exit(json_encode($data));
    }

    public function calendar_add()
    {
        $calendar_data = $this->input->post();

        //$data['message_datetime'] = date('Y-m-d H:i:s');

        $data['title'] = 'hello world';

        $data['start'] = date('Y') . ' ' . date('m');
        //$data['end'] = date('m');

        //$this->Calendarmodel->add_message($calendar_data);
        //$data['success'] = "SUCCESS";
        exit(json_encode($data));
    }

    public function search()
    {
        $this->load->model('Searchmodel');
        $search = $this->input->post('search');
        $query = $this->Searchmodel->ajax_search($search);
        echo json_encode($query);
    }

    /*
     * OLD RD FUNCTION FOR MULTIPLE IMAGE UPLOADS
     */
    public function landlord_photos()
    {
        //exit(print_r($_FILES));
        $prop_id = $this->input->post('prop_id');

        $uploads_dir = $_SERVER['DOCUMENT_ROOT'] . '/property_images/';

        foreach ($_FILES as $key => $value) {

            $tmp_name = $value["tmp_name"][0];
            $name = $value["name"][0];
            $tmp = explode('.', $name);
            $ext = $tmp[1];
            $name = $tmp[0] . rand(0, 100000) . date('YmdHis') . "." . $ext;
            move_uploaded_file($tmp_name, $uploads_dir . $name);
            $data['file_name'] = $name;

            // Add record to property_images table
            $this->props->add_property_image($prop_id, $name);

            // Get id of last inserted row to return
            $data['id'] = $this->db->insert_id();
            $data['property_id'] = $prop_id;

            // Check if there is only one image so far. If so, make it the default image
            $images = $this->props->get_property_images($prop_id);
            $count = count($images);
            if ($count == 1) {
                $this->props->set_default_image_by_id($data['id'], $prop_id);
            }
        }

        exit(json_encode($data));
    }

    function quick_contact()
    {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $body = $this->input->post('body');
        $prop_id = $this->input->post('prop_id');
        $landlord_id = $this->input->post('landlord_id');
        $tenant_id = $this->input->post('tenant_id');


        $this->Messagesmodel->send_quick_contact_ajax($name, $phone, $email, $body, $prop_id, $landlord_id, $tenant_id);

        $this->session->set_flashdata('quick_message', 'Thank you for your message, the landlord should be in touch soon!');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_share() {
        $share_data['property_id'] = $this->input->post('property_id');
        $share_data['share_type'] = $this->input->post('share_type');
        $this->Auditmodel->add_property_share($share_data);
        $data['response'] = 'SUCCESS';
        exit(json_encode($data));
    }





}