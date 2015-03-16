<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Viewing Requests</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of properties in Database
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Thumb</th>
                                <th>Property Name</th>
                                <th>Tenant Name</th>
                                <th>Phone</th>
                                <th>Received</th>
                                <th>Email</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?
                           // var_dump($viewings_data);
                                //lets rock n roll and get the data!!
                            foreach ($viewings_data['new'] as $key => $value) {

       $address = $value['address_1']. ", ".$value['address_2']. ", ".$value['city']. ", ".$value['county'].", ".$value['postcode']

                            ?>

                            <tr class="odd gradeX">
                                <td><img src="<? echo base_url() . 'prop_images/' .  $value['thumb_file_name'] ?>" /></td>
                                <td><? echo $value['title']  ?></td>
                                <td><? echo $value['name']?></td>
                                <td><? echo $value['phone']?></td>
                                <td class="center"><? echo $value['recieved']?></td>
                                <td class="center"><? echo $value['email']?></td>

                                <td class="center"><a href="<? echo base_url('landlord/viewing_request/' . $value['viewing_id']) ?>"><button type="button" class="btn btn-success">View</button> </td>

                                <td class="center"><button type="button" class="btn btn-danger">Delete</button> </td>
                            </tr>


                            <? } ?>
                            </tbody>
                        </table>
                    </div>



                    <!--- END OF DOC DIV --->
</div>