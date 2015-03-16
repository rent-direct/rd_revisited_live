<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Property Added Successfully!</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <h3>Now lets choose the main photos</h3>
    <p>Select an image we will use as the main promotional image for the property, keep in mind when choosing out headliner option as the top promotional method you'll definatly need a high resolution image</p>

    <br />
    <div class="row">
    <div class="col-md-4">
    <div class="alert alert-success" role="alert"><?php echo $error;?></div>
    </div>
    </div>

    <br />

    <form role="form" method="post" action="<? echo base_url('landlord/add_property_image') ?>" enctype="multipart/form-data">
        <input type="file" name="userfile" class="btn btn-default" size="20" />
        <br />
        <input type="submit" class="btn btn-success" value="Upload New Picture & Continue" />
        <input type="hidden" name="id" id="id" value="<? echo $id; ?>">

   </form>

    </div>
</div>
