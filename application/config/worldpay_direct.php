<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * MAIN CONFIG FILE FOR WORLDPAY_DIRECT CARDSAVE
 * Created:		03/03/2015
 * Created By:	Jamie Taylor, Rent Direct
 * Modified:		03/03/2015
 * Version:		1.0
 *
 *  mode 0 = debug / dev
 *  mode 1 = LIVE
 *
 */

$mode = 0;

if ($mode == 0)
{
    $config['WebAddress'] = "http://192.168.0.3/worldpay_final_v2";
    $config['PreSharedKey'] = "e1DYJkOk2FkiTFxR7x3XAWvmhL47HWNuGlhUUy6gQnBCppUBdudQ89IX+yeOQ0yk3A==";
    $config['MerchantID'] = "RentDi-6687237";
    $config['Password'] = "RentDirect2014";
    $config['EmailResult'] = TRUE;
    $config['ToAddress'] = "jamie@rent-direct.co.uk";
    $config['FromAddress'] = "info@rent-direct.co.uk";
}
else if ($mode == 1)
{
    $config['WebAddress'] = "http://new.rent-direct.co.uk";
    $config['PreSharedKey'] = "e1DYJkOk2FkiTFxR7x3XAWvmhL47HWNuGlhUUy6gQnBCppUBdudQ89IX+yeOQ0yk3A==";
    $config['MerchantID'] = "RentDi-4495682";
    $config['Password'] = "RentDirect2014";
    $config['EmailResult'] = TRUE;
    $config['ToAddress'] = "jamie@rent-direct.co.uk";
    $config['FromAddress'] = "info@rent-direct.co.uk";
}