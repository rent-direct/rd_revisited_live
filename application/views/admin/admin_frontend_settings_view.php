<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">EDIT FRONTEND</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>


    <h4>Editable Sections </h4>
    <h5>All this section is for editing the about section with calls to the premium sections of the site etc.</h5>
    <h5><?
        //Echo the success messages after completion called from controller functions
        if (isset($save_success)) {
            echo('<div class="alert alert-success" role="alert">' . $save_success . '</div>');
        } else {
            echo('');
        } ?></h5>
<form method="post" action="<?= base_url('admin/frontend_settings/save') ?>" >

  <? foreach ($frontend_data as $key=>$value) { ?>

    <!---- Panel Group ---->
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <!--- Panel 1 ---->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <strong>TAB 1 [<?= $value['tab1_title'] ?>]</strong>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">

                <div class="panel-body">

                    <div class="form-group">
                        <label for="InputName">Tab Title </label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="tab1_title" id="tab1_title" placeholder="" required value="<?= $value['tab1_title'] ?>">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>


                    <div class="radio">
                        <label>
                            <input type="radio" name="tab1_published" id="tab1_published" value="1" checked>
                            Published
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tab1_published" id="tab1_published" value="0">
                            Not Published
                        </label>
                    </div>

                    <textarea name="tab1_content" rows="10"><?= $value['tab1_content'] ?></textarea>

                </div>

            </div>
        </div>
        <!--- Panel 2 ---->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <strong>TAB 2 [<?= $value['tab2_title'] ?>]</strong>                </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="InputName">Tab Title</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="tab2_title" id="tab2_title" placeholder="" required value="<?= $value['tab2_title'] ?>">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="tab2_published" id="tab2_published" value="1" checked>
                            Published
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tab2_published" id="tab2_published" value="0">
                            Not Published
                        </label>
                    </div>

                    <textarea name="tab2_content" rows="10"><?= $value['tab2_content'] ?></textarea>                </div>
            </div>
        </div>
        <!--- Panel 3 ---->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <strong>TAB 3 [<?= $value['tab3_title'] ?>]</strong>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="InputName">Tab Title</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="tab3_title" id="tab3_title" placeholder="" required value="<?= $value['tab3_title'] ?>>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="tab3_published" id="tab3_published" value="1" checked>
                            Published
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tab3_published" id="tab3_published" value="0">
                            Not Published
                        </label>
                    </div>

                    <textarea name="tab3_content" rows="10"><?= $value['tab3_content'] ?></textarea>                </div>
            </div>
        </div>
        <!--- Panel 4 ---->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <strong>TAB 4 [<?= $value['tab4_title'] ?>]</strong>
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="InputName">Tab Title</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="tab4_title" id="tab4_title" placeholder="" required value="<?= $value['tab4_title'] ?>>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="tab4_published" id="tab4_published" value="1" checked>
                            Published
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tab4_published" id="tab4_published" value="0">
                            Not Published
                        </label>
                    </div>

                    <textarea name="tab4_content" rows="10"><?= $value['tab4_content'] ?></textarea>                </div>
            </div>
        </div>
    </div>
    <!--- END OF PANEL TABS ---->

    <p><strong>Preview:</strong></p>
    <div class='col-md-6'>
        <div class='description-controls'>
            <ul>
                <li><a href="#" rel='1' class='active'>Who We Are</a></li>
                <li><a href="#" rel='2'>Costs</a></li>

                <li><a href="#" rel='3'>Coming Soon!</a></li>
                <li><a href="#" rel='4'>Coming Soon!</a></li>
            </ul>
        </div>
    </div>




            <!-- Button -->
            <div class="control-group">
                <label class="control-label" for="submit">CLICK SAVE TO MAKE FINAL CHANGES</label>
                <div class="controls">
                    <button id="submit" name="submit" class="btn btn-danger btn-lg">SAVE</button>
                </div>
            </div>


    </form>

<? } ?>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<script type="text/javascript">
    tinymce.init({
        selector: "textarea"
    });
</script>

</div>

