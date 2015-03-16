<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Last step...</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <h3>Please select the image you would like to use as the primary property view...</h3>
    <br />

<form action="<?= base_url('landlord/select_main_image') ?>" method="post">
<?
// Extract the image data
foreach ($images as $key=>$value) { ?>

    <button type="submit" name="main_image" value="<?= $value['id'] ?>"><img src="<?= base_url() . 'gallery/' . $value['property_id'] . '/' . $value['file_name'] ?>" alt="My Property Image" height="150" width="150" class="img-thumbnail"></button>

<? } ?>

</form>

</div>
</div>