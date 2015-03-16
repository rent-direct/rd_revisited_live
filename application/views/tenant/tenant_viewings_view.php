
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Requested Viewings</h1>
            </div>
            <!-- /.col-lg-12 -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sent Viewing Requests
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Thumb</th>
                                        <th>Property Name</th>
                                        <th>Rent</th>
                                        <th>Bond</th>
                                        <th>Responded</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    //exit(print_r($viewings_data));
                                    foreach ($viewings_data as $key=>$value) {?>
                                    <? $address = $value['address_1']. ", ".$value['address_2']. ", ".$value['city']. ", ".$value['postcode']?>

                                    <tr class="odd gradeX">
                                        <td><? echo $value['thumb_file_name'] ?>/td>
                                        <td><? echo $value['title'] ?></td>
                                        <td><? echo $value['rent'] ?></td>
                                        <td><? echo $value['bond'] ?></td>
                                        <td class="center">X</td>
                                    </tr>


                                        <? } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <!----------------- END OF PANELS ------------------->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->


<!--- End Divs ---->
        </div>
    </div>

