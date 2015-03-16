//------------------------------------------------------------------/
//--------------WORLDPAY DIRECT INTERGRATION------------------------/
//------------------------------------------------------------------/

//$this->load->library('Worldpay_direct');

$user_data = (array) $this->ion_auth->user()->row();

$timestamp =  $str = date('Y-m-d H:i:s P');

$MerchantID = 'RentDi-6687237';
$formdata['datetime_purchase'] = $timestamp;
$formdata['merchant_id'] = 'RentDi-6687237';
$PreSharedKey = 'e1DYJkOk2FkiTFxR7x3XAWvmhL47HWNuGlhUUy6gQnBCppUBdudQ89IX+yeOQ0yk3A==';
$Password = 'RentDirect2014';
$CurrencyCode = 826;


//Generate Hashstring - use combination of post variables and variables stripped of invalid characters
$HashString="PreSharedKey=" . $PreSharedKey;
$HashString=$HashString . '&MerchantID=' . $MerchantID;
$HashString=$HashString . '&Password=' . $Password;
$HashString=$HashString . '&Amount=' . $wpPrice;
$HashString=$HashString . '&CurrencyCode=' . $CurrencyCode;
$HashString=$HashString . '&OrderID=' . $chkID;
$HashString=$HashString . '&TransactionDateTime=' . $timestamp;
$HashString=$HashString . '&TransactionType=' . 'SALE';
$HashString=$HashString . '&CallbackURL=' . base_url('landlord/payment_success_final');
$HashString=$HashString . "&CV2Mandatory=" . true;
$HashString=$HashString . "&Address1Mandatory=" . false;
$HashString=$HashString . "&CityMandatory=" . false;
$HashString=$HashString . "&PostCodeMandatory=" . false;
$HashString=$HashString . "&StateMandatory=" . false;
$HashString=$HashString . "&CountryMandatory=" . false;
$HashString=$HashString . "&ResultDeliveryMethod=" . 'POST';
$HashString=$HashString . '&OrderDescription=' . $wpProduct . ' - RESIDENTIAL';
$HashString=$HashString . '&CustomerName=' . $user_data['first_name'] . ' ' . $user_data['last_name'];
$HashString=$HashString . '&Address1=' .  $user_data['address_1'];
$HashString=$HashString . '&Address2=' .  $user_data['address_2'];
$HashString=$HashString . '&Address3=' .  $user_data['address_3'];
$HashString=$HashString . '&City=' .  $user_data['city'];
$HashString=$HashString . '&State=' .  $user_data['county'];
$HashString=$HashString . '&PostCode=' .  $user_data['postcode'];
$HashString=$HashString . '&CountryCode=' . 826;
$HashString=$HashString . '&EmailAddress=' .  $user_data['email'];
$HashString=$HashString . '&PhoneNumber=' .  $user_data['phone'];

//Encode HashDigest using SHA1 encryption (and create HashDigest for later use) - This is used as a checksum by the gateway to ensure form post hasn't been tampered with.
$formdata['HashDigest'] = utf8_encode(sha1($HashString));
$formdata['HashString'] = utf8_encode($HashString);
