<form role="form" action="https://mms.cardsaveonlinepayments.com/Pages/PublicPages/PaymentForm.aspx" method="post" target="_self">

    <input type="hidden" name="HashDigest" value="<?= $HashDigest ?>" />
    <input type="hidden" name="MerchantID" value="<?= $MerchantID ?>" />
    <input type="hidden" name="Amount" value="<?= $Amount ?>" />
    <input type="hidden" name="CurrencyCode" value="<?= $CurrencyCode ?>" />
    <!--                                <input type="hidden" name="EchoAVSCheckResult" value="true" />-->
    <!--                                <input type="hidden" name="EchoCV2CheckResult" value="true" />-->
    <!--                                <input type="hidden" name="EchoThreeDSecureAuthenticationCheckResult" value="true" />-->
    <!--                                <input type="hidden" name="EchoCardType" value="true" />-->
    <input type="hidden" name="OrderID" value="<?= $OrderID ?>" />
    <input type="hidden" name="TransactionType" value="<?= $TransactionType ?>" />
    <input type="hidden" name="TransactionDateTime" value="<?= $TransactionDateTime ?>" />
    <input type="hidden" name="CallbackURL" value="<?= $CallbackURL ?>" />
    <input type="hidden" name="OrderDescription" value="<?= $OrderDescription ?>" />
    <input type="hidden" name="CustomerName" value="<?= $CustomerName ?>" />
    <input type="hidden" name="Address1" value="<?= $Address1 ?>" />
    <input type="hidden" name="Address2" value="<?= $Address2 ?>" />
    <input type="hidden" name="Address3" value="<?= $Address3 ?>" />
    <input type="hidden" name="Address4" value="<?= $Address4 ?>" />
    <input type="hidden" name="City" value="<?= $City ?>" />
    <input type="hidden" name="State" value="<?= $State ?>" />
    <input type="hidden" name="Postcode" value="<?= $Postcode ?>" />
    <input type="hidden" name="CountryCode" value="<?= $CountryCode ?>" />
    <input type="hidden" name="EmailAddress" value="<?= $EmailAddress ?>" />
    <input type="hidden" name="PhoneNumber" value="<?= $PhoneNumber ?>" />
    <!--                                <input type="hidden" name="EmailAddressEditable" value="false" />-->
    <!--                                <input type="hidden" name="PhoneNumberEditable" value="false" />-->
    <!--                                <input type="hidden" name="CV2Mandatory" value="--><?//= $CV2Mandatory ?><!--" />-->
    <!--                                <input type="hidden" name="Address1Mandatory" value="--><?//= $Address1Mandatory ?><!--" />-->
    <!--                                <input type="hidden" name="CityMandatory" value="--><?//= $CityMandatory ?><!--" />-->
    <!--                                <input type="hidden" name="PostCodeMandatory" value="--><?//= $PostCodeMandatory ?><!--" />-->
    <!--                                <input type="hidden" name="StateMandatory" value="--><?//= $StateMandatory ?><!--" />-->
    <!--                                <input type="hidden" name="CountryMandatory" value="--><?//= $CountryMandatory ?><!--" />-->
    <input type="hidden" name="ResultDeliveryMethod" value="<?= $ResultDeliveryMethod ?>" />
    <input type="hidden" name="ServerResultURL" value="<?= $ServerResultURL ?>" />
    <input type="hidden" name="PaymentFormDisplaysResult" value="false" />
    <!--                                <input type="hidden" name="ThreeDSecureCompatMode" value="false" />-->






    // PHP

    //Generate Hashstring - use combination of post variables and variables stripped of invalid characters
    $HashString="PreSharedKey=" . $PreSharedKey;
    $HashString=$HashString . '&MerchantID=' . $MerchantID;
    $HashString=$HashString . '&Password=' . $Password;
    $HashString=$HashString . '&Amount=' . $wpPrice;
    $HashString=$HashString . '&CurrencyCode=' . $CurrencyCode;
    //        $HashString=$HashString . '&EchoAVSCheckResult=' . 'true';
    //        $HashString=$HashString . '&EchoCV2CheckResult=' . 'true';
    //        $HashString=$HashString . '&EchoThreeDSecureAuthenticationCheckResult=' . 'true';
    //        $HashString=$HashString . '&EchoCardType=' . 'true';
    $HashString=$HashString . '&OrderID=' . $order_id;
    $HashString=$HashString . '&TransactionType=' . $transaction_type;
    $HashString=$HashString . '&TransactionDateTime=' . $datetime_purchase;
    $HashString=$HashString . '&CallbackURL=' . $callback_url;
    $HashString=$HashString . '&OrderDescription=' . $order_description;
    $HashString=$HashString . '&CustomerName=' . $user_data['first_name'] . ' ' . $user_data['last_name'];
    $HashString=$HashString . '&Address1=' .  $user_data['address_1'];
    $HashString=$HashString . '&Address2=' .  $user_data['address_2'];
    $HashString=$HashString . '&Address3=' .  $user_data['address_3'];
    $HashString=$HashString . '&Address4=' .  '';
    $HashString=$HashString . '&City=' .  $user_data['city'];
    $HashString=$HashString . '&State=' .  $user_data['county'];
    $HashString=$HashString . '&PostCode=' .  $user_data['postcode'];
    $HashString=$HashString . '&CountryCode=' . $CurrencyCode;
    $HashString=$HashString . '&EmailAddress=' .  $user_data['email'];
    $HashString=$HashString . '&PhoneNumber=' .  $user_data['phone'];
    //        $HashString=$HashString . '&EmailAddressEditable=' . 'false';
    //        $HashString=$HashString . '&PhoneNumberEditable=' . 'false';
    //        $HashString=$HashString . "&CV2Mandatory=" . 'true';
    //        $HashString=$HashString . "&Address1Mandatory=" . 'false';
    //        $HashString=$HashString . "&CityMandatory=" . 'false';
    //        $HashString=$HashString . "&PostCodeMandatory=" . 'false';
    //        $HashString=$HashString . "&StateMandatory=" . 'false';
    //        $HashString=$HashString . "&CountryMandatory=" . 'false';
    $HashString=$HashString . "&ResultDeliveryMethod=" . 'SERVER';
    $HashString=$HashString . "&ServerResultURL=" . $ServerResultURL;
    $HashString=$HashString . "&PaymentFormDisplaysResult=" . 'false';

    //Encode HashDigest using SHA1 encryption (and create HashDigest for later use)
    //- This is used as a checksum by the gateway to ensure form post hasn't been tampered with.
    // USE utf8_encode() if we still have problems
    $this->data['HashString'] = $HashString;
    $this->data['HashDigest'] = sha1($HashString);

    $this->data['MerchantID'] = $MerchantID;
    $this->data['Amount'] = $wpPrice;
    $this->data['CurrencyCode'] = $CurrencyCode;
    $this->data['OrderID'] = $order_id;
    $this->data['TransactionDateTime'] = $datetime_purchase;
    $this->data['TransactionType'] = $transaction_type;
    $this->data['CallbackURL'] = $callback_url;
    //        $this->data['CV2Mandatory'] = 'true';
    //        $this->data['Address1Mandatory'] = 'false';
    //        $this->data['CityMandatory'] = 'false';
    //        $this->data['PostCodeMandatory'] = 'false';
    //        $this->data['StateMandatory'] = 'false';
    //        $this->data['CountryMandatory'] = 'false';
    $this->data['ResultDeliveryMethod'] = 'SERVER';
    $this->data['OrderDescription'] = $order_description;
    $this->data['CustomerName'] =  $user_data['first_name'] . ' ' . $user_data['last_name'];
    $this->data['Address1'] = $user_data['address_1'];
    $this->data['Address2'] = $user_data['address_2'];
    $this->data['Address3'] = $user_data['address_3'];
    $this->data['Address4'] = '';
    $this->data['City'] = $user_data['city'];
    $this->data['State'] = $user_data['county'];
    $this->data['Postcode'] = $user_data['postcode'];
    $this->data['CountryCode'] = $CurrencyCode;
    $this->data['EmailAddress'] = $user_data['email'];
    $this->data['PhoneNumber'] = $user_data['phone'];
    $this->data['ResultDeliveryMethod'] = 'SERVER';
    $this->data['ServerResultURL'] = $ServerResultURL;