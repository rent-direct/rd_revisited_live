<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends My_Controller
{
    public function index()
    {
        //----------------IF NOT LOGGED IN --------------------//
        if (!$this->ion_auth->logged_in())
        {
            //create the active tabs
            $data['activeTab'] = "about";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view",$data);
            $this->load->view("home/about_view");
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view");
        }

        if ($this->ion_auth->in_group('landlord')) {
            //create the active tabs
            $data['activeTab'] = "about";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_landlord",$data);
            $this->load->view("home/about_view");
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view_logged_in_landlord");

        }

        if($this->ion_auth->in_group('user')) {
            //create the active tabs
            $data['activeTab'] = "about";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_tenant",$data);
            $this->load->view("home/about_view");
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view_logged_in_tenant");
        }

        if ($this->ion_auth->is_admin()) {
            //create the active tabs
            $data['activeTab'] = "about";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_admin",$data);
            $this->load->view("home/about_view");
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }
    }

}