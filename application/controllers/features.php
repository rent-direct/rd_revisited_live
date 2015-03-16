<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Features extends CI_Controller
{
    public function index()
    {
        if ($this->ion_auth->is_admin())
        {
            $data['activeTab'] = "features";

            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_admin",$data);
            $this->load->view("home/features_view");
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }

        //set the home variable for the tab in the data array
        $data['activeTab'] = "features";

        //Not logged in view data
        if (!$this->ion_auth->logged_in()) {
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view",$data);
            $this->load->view("home/features_view");
            $this->load->view("home/includes/footer_view");
        }
        //auth groups
        if ($this->ion_auth->logged_in()) {

            if ($this->ion_auth->in_group('landlord')) {
                $this->load->view("home/includes/header_view");
                $this->load->view("home/includes/menu_view_logged_in_landlord",$data);
                $this->load->view("home/features_view");
                $this->load->view("home/includes/sub_footer");
                $this->load->view("home/includes/footer_view_logged_in_landlord");
            }
            else if($this->ion_auth->in_group('user')) {
                $this->load->view("home/includes/header_view");
                $this->load->view("home/includes/menu_view_logged_in_tenant",$data);
                $this->load->view("home/features_view");
                $this->load->view("home/includes/sub_footer");
                $this->load->view("home/includes/footer_view_logged_in_tenant");
            }


        }
        if ($this->ion_auth->is_admin()) {
            //create the active tabs
            $data['activeTab'] = "features";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_admin",$data);
            $this->load->view("home/about_view");
            $this->load->view("home/includes/sub_footer");
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }


    }


}