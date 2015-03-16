<?php

/*
 * this class has no use, might need deleting!!!!! check!
 */
class Payment_successful extends My_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index() // DIRECTS TO http://new.rent-direct.co.uk/payment_succesful
    {
        $StatusCode = 0;

//        $OrderID = $this->input->post('OrderID'); // e.g $_POST
//        $OrderDescription = $this->input->post('OrderDescription');

//        var_dump($OrderID . ' ' . $OrderDescription);

//        $this->session->set_flashdata('payment_successful', 'Your payment has been successful and your property will be live over the next 10 mins');

//        redirect('landlord');

        echo "<br />StatusCode=" . $StatusCode; // this is where you said to just echo this out to get the redirect
    }

}