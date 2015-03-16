<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rent Direct Staff</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <?
    // get flashdata
    $save_fees = $this->session->flashdata('save_fees');

    if ($save_fees) {
        echo ('<div class="alert alert-success">' . $save_fees . '</div><br />');
    }
    ?>
<h2>Financial Details - Enter the prices you would like to charge per package on the frontend</h2>
    <!--- Form Start --->
    <form method="post" action="<? echo base_url('admin/save_payment_details') ?>">

    <div class="form-group has-warning">
        <!------------------------------------------------>

        <label>Basic Fees</label>

        <div class="form-group input-group col-md-2">
            <span class="input-group-addon">£</span>
            <input type="text" class="form-control" name="basic_price" id="basic_price" value="<? echo $payment_details_basic ?>">
        </div>
        <label>Basic Description</label>
        <div class="form-group input-group">
            <textarea rows="20" cols="50" name="basic_description"><? echo $description_details_basic ?></textarea>
        </div>
        <br/><br/><br/><br/>
        <!------------------------------------------------>

        <label>Featured Fees</label>

        <div class="form-group input-group col-md-2">
            <span class="input-group-addon">£</span>
            <input type="text" class="form-control" name="featured_price" id="featured_price" value="<? echo $payment_details_featured ?>">
        </div>
        <label>Featured Description</label>
        <div class="form-group input-group">
            <textarea rows="20" cols="50" name="featured_description"><? echo $description_details_featured ?></textarea>
        </div>
        <br/><br/><br/><br/>
        <!------------------------------------------------>
        <label>Premium Fees</label>

        <div class="form-group input-group col-md-2">
            <span class="input-group-addon">£</span>
            <input type="text" class="form-control" name="premium_price" id="premium_price" value="<? echo $payment_details_premium ?>">
        </div>
        <label>Premium Description</label>
        <div class="form-group input-group">
        <textarea rows="20" cols="50" name="premium_description"><? echo $description_details_premium ?></textarea>
        </div>
        <br/><br/><br/><br/>
        <!------------------------------------------------>
        <label>Headliner Fees</label>

        <div class="form-group input-group col-md-2">
            <span class="input-group-addon">£</span>
            <input type="text" class="form-control" name="headliner_price" id="headliner_price" value="<? echo $payment_details_headliner ?>">
        </div>
        <label>Headliner Description</label>
        <div class="form-group input-group">
            <textarea rows="20" cols="50" name="headliner_description"><? echo $description_details_headliner ?></textarea>
        </div>
        <br/>
    </div>


    <!-- Button -->
    <div class="control-group">
        <div class="controls">
            <button id="submit" name="submit" class="btn btn-danger btn-lg">Save Payment Fees</button>
        </div>
    </div>

    <br/><br/><br/>

    </form>
    <!--- Form End --->

    <script type="text/javascript">
        tinymce.init({
            selector: "textarea"
        });
    </script>


</div>

