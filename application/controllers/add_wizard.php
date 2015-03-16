<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Add_wizard extends My_Controller
{

    public function index()
    {
        if ($this->ion_auth->logged_in()) {

            //create the active tabs
            $data['activeTab'] = "home";

            $this->load->view("landlord/landlord_add_wizard");

        }
    }

    public function form_data()
    {


    }

    /** function for the upload image form */
    function do_upload()
    {
        $config['upload_path'] = './prop_uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
        }
    }
}