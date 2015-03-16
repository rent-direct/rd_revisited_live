<?php
class Map_search extends My_Controller
{
    function __construct() {
        parent::__construct();
        /* Start of the premium features display code for frontend */
        $this->load->model('Homemodel');
        $this->load->model('Propertymodel');
        $this->load->model('Searchmodel');
    }

    public function index()
    {
        $data['activeTab'] = "map_search";
        if (!$this->ion_auth->logged_in())
        {
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view",$data);
            $this->load->view("home/map_search_view",$this->data);
            $this->load->view("home/includes/footer_view");
        }
        if ($this->ion_auth->in_group('landlord')) {
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_landlord",$data);
            $this->load->view("home/map_search_view",$this->data);
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }
        if($this->ion_auth->in_group('user')) {

            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_tenant",$data);
            $this->load->view("home/map_search_view",$this->data);
            $this->load->view("home/includes/footer_view_logged_in_tenant");
        }
    }

    public function results()
    {
        //load the google maps ci api
        $this->load->library('googlemaps');

        //initialize our map
        $this->googlemaps->initialize();

        $this->data['map'] = $this->googlemaps->create_map();

        $keyword = $this->input->post('keyword');
        $bedrooms = $this->input->post('bedrooms');
        $bathrooms = $this->input->post('bathrooms');

        if ($bedrooms == 0) { $bedrooms = NULL; }
        if ($bathrooms == 0) { $bathrooms = NULL; }

        $this->data['ms_results'] = $this->Searchmodel->multi_search_slim($keyword);

        //var_dump($data);

        // REPOSTS TO SEARCH VIEW!!!
        $data['search_strings'] = $this->input->post('keyword');

        $data['activeTab'] = "map_search";
        if (!$this->ion_auth->logged_in())
        {
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view",$data);
            $this->load->view("home/map_search_view",$this->data);
            $this->load->view("home/includes/footer_view");
        }
        if ($this->ion_auth->in_group('landlord')) {
            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_landlord",$data);
            $this->load->view("home/map_search_view",$this->data);
            $this->load->view("home/includes/footer_view_logged_in_landlord");
        }
        if($this->ion_auth->in_group('user')) {

            $this->load->view("home/includes/header_view");
            $this->load->view("home/includes/menu_view_logged_in_tenant",$data);
            $this->load->view("home/map_search_view",$this->data);
            $this->load->view("home/includes/footer_view_logged_in_tenant");
        }
    }



}