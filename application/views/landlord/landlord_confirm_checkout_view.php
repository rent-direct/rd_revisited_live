
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Payment Gateway</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Confirm Checkout Details
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4><?if (isset($error)) { echo $error; }?></h4>

                            <p>Confirm details and from here we'll take you to the payment processing page where we use Worldpay which is very secure!</p>
                            <!-- Section -->

                            <? if (isset($HashDigest)) { ?>

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

                            <br/>
                            <button type="submit" class="btn btn-default">Proceed to Payment</button>
                            <button type="reset" class="btn btn-default">Cancel</button>

                            <br/>

                            </form>
            </div>        <? } // end of isset to check if data has been passed to view ?>
        </div>
    </div>
</div>
</div>
</div>
</div>