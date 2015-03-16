<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Propertymodel', 'props');
        $this->data = array();

    }

    public function index() {
        exit('here');
    }

    public function brochure() {
        $this->load->library('pdf');
        $this->pdf->load_view('pdf/property_brochure');
        $this->pdf->render();
        $this->pdf->stream("property.pdf");
        return true;
    }


}
