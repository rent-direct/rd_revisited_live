<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Property Details Added Successfully...</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <!--            <div class="alert alert-success" role="alert">--><?php //echo $error;?><!--</div>-->
        </div>
    </div>

    <h3>Now lets choose some photos for the property view...</h3>
    <p><strong>Select multiple files to upload...</strong></p>

    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="<?= base_url('landlord/add_property_images') ?>" method="POST" enctype="multipart/form-data">

        <div class="form-inline">
            <div class="form-group">
                <input name="userfile[]" id="userfile" type="file" multiple="true">
            </div>

            <input type="hidden" name="id" value="<?= $send_id ?>">

            <button type="submit" class="btn btn-sm btn-primary">Upload files</button>
        </div>


    </form>


    <br />







</div>
</div>
