<?php

/**
 * Class Payment_process
 *
 * THIS CLASS PROCESSES THE PAYMENT FOR WORLDPAY CARDSAVE, EG. SERVER RESULT URL (NOT CALLBACK)
 * THE CALLBACK IS ON THE LANDLORD CONTROLLER = payment_success_final();
 */
class Payment_process extends My_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Utilmodel');
    }

    public function index()
    {
        $this->session->set_flashdata('payment_message', 'Your payment has been successful and your property will be live over the next 10 minutes');

        $szOrderDescription = $_POST["OrderDescription"]; // Order description is the prop_id

        $szOrderID = $_POST["OrderID"];

        $szCrossReference = $_POST["CrossReference"];

        $this->Utilmodel->set_user_has_paid($szOrderDescription);

        $this->Utilmodel->set_user_sub_type($szOrderDescription,$szOrderID);

        $this->Utilmodel->set_cross_reference($szOrderDescription,$szCrossReference);

        //$this->Utilmodel->set_pay_success_flash();

        $StatusCode = 0;

        echo "<br />StatusCode=" . $StatusCode;
    }

}