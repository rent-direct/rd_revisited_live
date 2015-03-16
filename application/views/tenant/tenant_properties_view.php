<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Saved Properties</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Properties
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Thumb</th>
                                <th>Title</th>
                                <th>Rent</th>
                                <th>Bond</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($properties_data as $key => $value) { ?>
                                <tr class="odd gradeX">
                                    <td><img src="<? echo base_url() . 'prop_images/' . $value['thumb_file_name'] ?>"/>
                                    </td>
                                    <td>3 Bedroomed House, Newark</td>
                                    <td>550 / pm</td>
                                    <td>1200</td>
                                    <td class="center">
                                        <button type="button" class="btn btn-success">View</button>
                                    </td>
                                    <td class="center">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            <? } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <div class="well">
                        <h4>Properties you have saved</h4>

                        <p>You can view and delete saved properties, this section is ideal to keep track of things,
                            seeing who else is viewing them. Even graphical data and geo location coverage are on the
                            development roadmap.</p>
                        <a class="btn btn-default btn-lg btn-block" target="_blank" href="<? echo base_url('home') ?>">View
                            Rent Direct Home</a>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

