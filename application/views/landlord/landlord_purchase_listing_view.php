
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Purchase Listing</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Purchase Plan
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4><?if (isset($error)) { echo $error; }?></h4>

                            <!-- Section -->
                            <form role="form" action="<?= base_url('landlord/confirm_checkout_details') ?>" enctype='multipart/form-data' method="post">



                                <div class="col-md-4">
                                    <h3>Basic - £<?=$basic_price?></h3>
                                    <!---- Entry Point 1 ---->
                                    <? echo $basic_description ?>
                                    <!----------------------->
                                    <label class="btn btn-default btn-lg">
                                        <input type="radio" name="user_subscription_type" id="user_subscription_type" autocomplete="off" value="1" checked> Basic
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <h3>Featured - £<?=$featured_price?></h3>
                                    <!---- Entry Point 2 ---->
                                    <? echo $featured_description ?>
                                    <!----------------------->
                                    <label class="btn btn-default btn-lg">
                                        <input type="radio" name="user_subscription_type" id="user_subscription_type" autocomplete="off" value="2"> Featured
                                    </label>
                                </div>
                            </div>
                            <br />
                        </div>

                                <div class="col-md-4 offset">
                                    <h3>Premium - £<?=$premium_price?></h3>
                                    <!---- Entry Point 3 ---->
                                    <? echo $premium_description ?>
                                    <!----------------------->
                                    <label class="btn btn-default btn-lg">
                                        <input type="radio" name="user_subscription_type" id="user_subscription_type" autocomplete="off" value="3"> Premium
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <h3>Headliner - £<?=$headliner_price?></h3>
                                    <!---- Entry Point 4 ---->
                                    <? echo $headliner_description ?>
                                    <!----------------------->
                                    <label class="btn btn-default btn-lg">
                                        <input type="radio" name="user_subscription_type" id="user_subscription_type" autocomplete="off" value="4"> Headliner
                                    </label>
                                </div>
                            </div>


                                <input type="hidden" name="purchase_prop_id" value="<? if(isset($purchase_prop_id)) { echo $purchase_prop_id; } ?>">

                                <br/>
                                <button type="submit" class="btn btn-default">Proceed to Checkout</button>
                                <button type="reset" class="btn btn-default">Reset</button>

                <br/>

                <br/>

                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>