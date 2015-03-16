
<form role="form" method="post" action="<? echo base_url('landlord/add_success') ?>">

    <input type="hidden" name="id" id="id" value="<? echo $id ?>">
    <!------------------------------------------------>

    <!-- Section -->
    <p><h4>Please choose an option.....</h4></p>
    <div class="row">
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
    <div class="row">
        <div class="col-md-4">
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
    <br />
    <br />
    <button type="submit" class="btn btn-primary">Proceed with Payment</button>
    <br />
    <br />
    <br />

</form>