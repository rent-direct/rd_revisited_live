<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rent Direct Staff<div class="pull-right"><a href="<? echo base_url('landlord/add') ?>" class="btn btn-primary btn-lg active" role="button">Add New Record</a></div></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Profiles on Rent Direct staff for reference on certain tasks around the site, also baring in mind we need to add celeb bloggers and such, at the moment this is for mainly the 'technical' inhouse side of work for various bits n bobs around the site for DBCALL purposes and what log - Also a good idea for logging everyone who does some work for us but once were big we can have this as a more corperate kind of section
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>First First</th>
                                <th>Last Name</th>
                                <th>Role</th>
                                <th>Notes</th>
                                <th>Part/Full Time</th>
                                <th>Date Started</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

<?
//We'll use the extracted data of the landlords propertys into the view
        foreach ($staff_profiles as $key=>$value) {

?>
<tr class="odd gradeX">
            <td><? echo $value['id'] ?></td>
            <td><? echo $value['first_name'] ?></td>
            <td><? echo $value['second_name'] ?></td>
            <td><? echo $value['role'] ?></td>
            <td><? echo $value['notes'] ?></td>
            <td><? echo $value['part_full_time'] ?></td>
            <td><? echo $value['date_started'] ?></td>
    <td class="center"><button type="button" class="btn btn-warning">Edit</button> </td>
    <td class="center"><button type="button" class="btn btn-danger">Delete</button> </td>

</tr>

    <? } ?>
                            </tbody>
                        </table>
                    </div>

                </div>