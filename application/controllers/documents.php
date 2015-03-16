<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Propertymodel', 'props');
        $this->load->model('Landlordmodel', 'landlord');
        $this->load->model('Auditmodel', 'audit');
    }

    public function index()
    {
        exit('here');
    }

    public function brochure()
    {
        $prop_id = $this->uri->segment(3);
        $this->data['property_data'] = $this->props->get_property($prop_id);

        // Log brochure download
        $this->audit->add_brochure_download($prop_id);
        // Overwrite boolean values with their related text values for display
//        if (isset($this->data['property_data']['type_id'])) {
//            $this->data['property_data']['type'] = $this->props->get_type_by_id($this->data['property_data']['type_id']);
//        }

        if (isset($this->data['property_data']['rent_type'])) {
            $this->data['property_data']['rent_type_name'] = $this->props->get_rent_type_by_id($this->data['property_data']['rent_type']);
        }

        if (isset($this->data['property_data']['furnished'])) {
            if ($this->data['property_data']['furnished'] == 0) {
                $this->data['property_data']['furnished'] = 'No';
            } else {
                $this->data['property_data']['furnished'] = 'Yes';
            }
        }

        if (isset($this->data['property_data']['pets_allowed'])) {
            if ($this->data['property_data']['pets_allowed'] == 0) {
                $this->data['property_data']['pets_allowed'] = 'No';
            } else if ($this->data['property_data']['pets_allowed'] == 1) {
                $this->data['property_data']['pets_allowed'] = 'Yes';
            } else {
                $this->data['property_data']['pets_allowed'] = 'Landlord&#39s discretion';
            }
        }

        if (isset($this->data['property_data']['smoking_allowed'])) {
            if ($this->data['property_data']['smoking_allowed'] == 0) {
                $this->data['property_data']['smoking_allowed'] = 'No';
            } else if ($this->data['property_data']['smoking_allowed'] == 1) {
                $this->data['property_data']['smoking_allowed'] = 'Yes';
            } else {
                $this->data['property_data']['smoking_allowed'] = 'Landlord&#39s discretion';
            }
        }

        if (isset($this->data['property_data']['dhss_allowed'])) {
            if ($this->data['property_data']['dhss_allowed'] == 0) {
                $this->data['property_data']['dhss_allowed'] = 'No';
            } else if ($this->data['property_data']['dhss_allowed'] == 1) {
                $this->data['property_data']['dhss_allowed'] = 'Yes';
            } else {
                $this->data['property_data']['dhss_allowed'] = 'Landlord&#39s discretion';
            }
        }

        // Generate and save QR code
        if (!file_exists('qr_codes/' . $this->data['property_data']['id'] . '.png')) {
            $this->load->library('ciqrcode');

            $params['data'] = 'http://www.rent-direct.co.uk/properties/view/' . $this->data['property_data']['slug'];
            $params['level'] = 'H';
            $params['size'] = 2;
            $params['savename'] = 'qr_codes/' . $this->data['property_data']['id'] . '.png';
            $this->ciqrcode->generate($params);
        }


        //$this->load->view('pdf/property_brochure', $this->data);

        $this->data['property_main_image'] = $this->props->get_property_main_image($prop_id);

        //exit(print_r(($this->data['property_main_image'])));

        $this->load->library('pdf');
        $this->pdf->load_view('pdf/property_brochure', $this->data);
        $this->pdf->render();
        $this->pdf->stream($this->data['property_data']['slug'] . ".pdf");
    }

    // next
}