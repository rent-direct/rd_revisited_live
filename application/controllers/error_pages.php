<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error_pages extends CI_Controller
{
    public function index()
    {
        $this->load->view("404_view");
    }

    public function change_me_for_another_error()
    {
        $this->load->view("404_view");
    }

}