<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Welcome Headliners....</h1>
        </div>
        <h4>Were guessing you arrived here by notification? that's great! What you need to do now is crop the photo of the property you want headlined on our site, once you've cropped to our spec using our dashboard tool it'll be live within minutes.</h4>
    </div>

    <br />
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($error)) { echo '<div class="alert alert-success" role="alert">' . $error . '</div>'; } ?>
            <?php if(isset($error_image)) { echo '<div class="alert alert-danger" role="alert"><strong>' . $error_image . '</strong></div>'; } ?>
            <?php if(isset($crop_success)) { echo '<div class="alert alert-success" role="alert">' . $crop_success . '</div>'; } ?>

        </div>
    </div>

    <br />

    <?
    if (isset($property_data)) {

    foreach ($property_data as $key=>$value) {

    $path = base_url() . 'prop_images/' . $value['main_image'];

    ?>

    <form role="form" method="post" action="<? echo base_url('landlord/headliner_options/crop') ?>" enctype="multipart/form-data">

        <input type="hidden" name="x" id="x" value="" />
        <input type="hidden" name="y" id="y" value="" />
        <input type="hidden" name="x2" id="x2" value="" />
        <input type="hidden" name="y2" id="y2" value="" />
        <input type="hidden" name="w" id="w" value="" />
        <input type="hidden" name="h" id="h" value="" />
        <input type="hidden" id="file_name" name="file_name" value="<?= $value['main_image']; ?>" />

        <!-- You will probably want to store the id or path to the image you are altering -->
        <img id="cropthis" src="<?= $path ?>" alt="Image to crop" />

<script>
    function setCoords(c) {
        jQuery('#x').val(c.x);
        jQuery('#y').val(c.y);
        jQuery('#x2').val(c.x2);
        jQuery('#y2').val(c.y2);
        jQuery('#w').val(c.w);
        jQuery('#h').val(c.h);
    }

    $.Jcrop('#cropthis', {
        boxWidth: 1500,
        boxHeight: 1050,
        aspectRatio: 16 / 6,
        bgOpacity: .4,
        onChange: setCoords,
        onSelect: setCoords
    });
</script>

        <input type="hidden" name="id" id="id" value="<?= $value['id'] ?>">
        <br>
        <br>
        <p><button type="submit" class="btn btn-success">Save & Submit</button></p>
    </form>

<? } }else {
    // If user came here by chance sort out a message

    } ?>
</div>


