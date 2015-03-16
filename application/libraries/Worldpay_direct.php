<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . "/config/worldpay_direct.php");

/**
 * Class Worldpay_direct
 * Created By Jamie Taylor, Rent Direct
 * A Codeigniter library for the Worldpays Cardsave Gateway
 * Created on 03.03.15
 * Last Modified 03.03.15
 * Version: 0.1
 */

class Worldpay_direct {

    /* MAIN CONFIG
     * TODO: ADD THIS TO A SEPERATE CONFIG FILE
     *
     */
    var $WebAddress = "http://192.168.0.3/worldpay_final_v2";
    var $PreSharedKey = "e1DYJkOk2FkiTFxR7x3XAWvmhL47HWNuGlhUUy6gQnBCppUBdudQ89IX+yeOQ0yk3A==";
    var $MerchantID = "RentDi-6687237";
    var $Password = "RentDirect2014";
    var $EmailResult = TRUE;
    var $ToAddress = "jamie@rent-direct.co.uk";
    var $FromAddress = "info@rent-direct.co.uk";
    var $CurrencyCode = 826;


    public function __construct()
    {
        // The main config file for this plugin
        //$this->config->load('worldpay_direct', TRUE);
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function getCurrencyCode()
    {
        return $this->CurrencyCode;
    }

    public function getPreSharedKey()
    {
        return $this->PreSharedKey;
    }

    public function getMerchantID()
    {
        return $this->MerchantID;
    }

    //Function to get date/time stamp as required by the gateway
    public function gatewaydatetime() {
        $str = date('Y-m-d H:i:s P');
        return $str;
    }

    //Function to compare Hash returned from the gateway and that generated in the script above.
    public function checkhash($HashDigest) {
        $ReturnedHash = $_POST["HashDigest"];
        if ($HashDigest == $ReturnedHash) {
            echo "PASSED";
        } else {
            echo "FAILED";
        }
    }

    public function stripGWInvalidChars($strToCheck) {
        $toReplace = array("#","\\",">","<", "\"", "[", "]");
        $cleanString = str_replace($toReplace, "", $strToCheck);
        return $cleanString;
    }

    //Function to generate a unique OrderID for the transaction (The OrderID can be any AlphaNumeric string - e.g. your own carts order ID if applicable
    function guid(){
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }



}