<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function index()
    {
        //----------------IF NOT LOGGED IN --------------------//
        if (!$this->ion_auth->logged_in())
        {
            //create the active tabs
            $data['activeTab'] = "search";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view",$data);
            $this->load->view("home/search_view");
            $this->load->view("home/includes/footer_view");
        }

        //----------------USER AUTH VIEWS --------------------//
        //header vars
        $lord = 'landlord';
        $tenant = 'user';

        if ($this->ion_auth->in_group($lord)) {
            //create the active tabs
            $data['activeTab'] = "search";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_landlord",$data);
            $this->load->view("home/search_view");
            $this->load->view("home/includes/footer_view_logged_in_landlord");

        }

        if($this->ion_auth->in_group($tenant)) {
            //create the active tabs
            $data['activeTab'] = "search";
            //load the views with other menus etc
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_tenant",$data);
            $this->load->view("home/search_view");
            $this->load->view("home/includes/footer_view_logged_in_tenant");
        }
        //-----------END USER AUTH VIEWS --------------------//
    }

}