<?php

//if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct(){

        parent::__construct();

        // The main basis data array for MY_Controller
        $this->data = array();

        if ($this->ion_auth->logged_in())
        {
            $this->data['logged_in'] = TRUE;
            $data['user_object'] = $this->ion_auth->user()->row();
            $this->data['user_data'] = (array) $data['user_object'];
            $this->data['user_id'] = $data['user_object']->id;
        }

        if ($this->ion_auth->in_group('user'))
        {
            $this->data['user_type'] = 'tenant';
        }
        else if ($this->ion_auth->in_group('landlord'))
        {
            $this->data['user_type'] = 'landlord';
        }
        else if ($this->ion_auth->in_group('advertiser'))
        {
            $this->data['user_type'] = 'advertiser';
        }
        else if ($this->ion_auth->in_group('marketing'))
        {
            $this->data['user_type'] = 'marketing';
        }
        else if ($this->ion_auth->in_group('blogger'))
        {
            $this->data['user_type'] = 'blogger';
        }

        //Get Landlord Extra Paid Features & Headliner + set the limits
        $this->load->model('Propertymodel');
        $this->data = array(
            'premium_properties' => $this->Propertymodel->get_premium_properties_limit(16),
            'headliner_properties' => $this->Propertymodel->get_headliner_properties_limit(8)

        );

    }


}