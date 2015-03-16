<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">My Messages<div class="pull-right"><a href="<? echo base_url('landlord/inbox/compose') ?>" class="btn btn-default btn" role="button">Compose Message</a></div></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <br />
        <div class="col-md-6">
            <img src="<?= base_url() ?>/banners/468x60.jpg" alt="ADVERTISING WILL BE HERE SHORTLY, WATCH THIS SPACE!!" >
        </div>

        <div class="col-md-6">
            <img src="<?= base_url() ?>/banners/468x60.jpg" alt="ADVERTISING WILL BE HERE SHORTLY, WATCH THIS SPACE!!" style="float: right;" >
        </div>
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
                        <table class="table table-striped table-bordered table-hover" id="inbox">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tenant Name</th>
                                <th>Message</th>
                                <th>Date Received</th>
                                <th>Prop ID</th>
                                <th>View/Reply</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?
                            //We'll use the extracted data of the landlords propertys into the view
                            foreach ($inbox_messages as $key=>$value) { ?>

                                <tr class="odd gradeX">

                                    <td><?= $value['message_id'] ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= substr(strip_tags($value['message']), 0, 110) ?></td>
                                    <td><?= date('d/m/Y H:i:s',strtotime($value['datetime_received'])) ?></td>
                                    <td><?= $value['prop_id'] ?></td>
                                    <td class="center">View</td>
                                    <td class="center">Delete</td>
                                </tr>

                            <? } ?>


                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#inbox').DataTable({
                                        responsive: true
                                    });
                                });
                            </script>
                            </tbody>
                        </table>
                    </div>

                </div>
