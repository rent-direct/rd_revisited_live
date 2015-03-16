<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Frontend Blogger</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

<!--- Main Blog Start --->
    <form method="post" action="<?= base_url('admin/blog/post') ?>">

        <!---- Single Input ---->
        <div class="form-group">
            <label for="InputName">Title of Post</label>
            <div class="input-group">
                <input type="text" class="form-control" name="title" id="title" placeholder="" required>
                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
            </div>
        </div>


        <!--->
        <p><label>DATE PUBLISHED (FIXED DATE)</label></p>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" name="date_published" readonly="true"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
            });
        </script>
        <!--->

        <div class="checkbox">
            <label>
                <input type="checkbox" id="front_page" name="front_page" value="1">
                Is Front Page
            </label>
        </div>
        <div class="checkbox disabled">
            <label>
                <input type="checkbox" id="published" name="published" value="1">
                Is Published
            </label>
        </div>

        <br />

        <textarea rows="20" cols="50" name="post_data" id="post_data"></textarea>

        <br /> <br />

        <label>User</label>
        <select class="form-control" name="author" id="author">
            <?
            //We'll use the extracted data for the posts of the people
            foreach ($staff_profiles as $key=>$value) {

            //concat
                $username = $value['first_name'] . ' ' . $value['second_name'] . ' / ' . $value['role'];

            ?>

            <? echo ('<option value="' . $username . '">' . $username . '</option>') ?>


            <? } ?>
        </select>
        <br/>
        <br/>
        <br/>


        <!-- Button -->
        <div class="control-group">
            <div class="controls">
                <button id="submit" name="submit" class="btn btn-default btn-lg">Submit Post</button>
            </div>
        </div>

    </form>


    <br /> <br /><br /> <br />

    <script type="text/javascript">
        tinymce.init({
            selector: "textarea"
        });
    </script>





















</div>