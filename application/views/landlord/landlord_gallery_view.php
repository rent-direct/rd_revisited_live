
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Property Gallery</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Image Properties
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4><?if (isset($error)) { echo $error; }?></h4>

                            <h5>Start by choosing the property you want to add the gallery of images on, they'll then appear on the property profile to the public...</h5>
                            <br />
                            <form role="form" action="<?= base_url('landlord/gallery_upload') ?>" enctype='multipart/form-data' method="post">

                                <!-- Select the Property -->
                                <div class="form-group">
                                    <label>Select the Property...</label>
                                    <select class="form-control" name="prop_select_id">

                                     <?   foreach ($prop_gallery as $key=>$value) { ?>
                                        <option value="<?= $value['id']?>"><?= $value['title'] . ' - ' . $value['postcode'] . ' - £'  . (int)$value['rent']?></option>
                                     <? } ?>

                                    </select>
                                </div>

                                <br/>

                                <div class="form-group">
                                    <label>Now select the images you wish to add to the property profile (Max of 10)</label>
                                    <input name="userfile[]" id="userfile" type="file" multiple="true">
                                </div>

                                <br/>

                                <button type="submit" class="btn btn-default">Upload</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>