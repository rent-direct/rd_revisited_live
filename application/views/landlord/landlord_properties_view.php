<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">My Properties<div class="pull-right"><a href="<? echo base_url('landlord/add') ?>" class="btn btn-success btn-lg" role="button">Add New Property</a></div></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <p><strong>You have !DB! properties that are not live on the site yet, would you like <a href="<?= site_url('landlord/purchase_listing/')?>" />purchase</a> a listing now?</strong></p>

    NOTICE Headliners: You will need to crop your image with our tool, not to worry as you will have a notification on the listings which will take you to the cropping section

    <br /> <br />

    <div class="row">
    <div class="col-lg-12">
    <div class="panel panel-default">
    <div class="panel-heading">
        List of properties in Database
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
    <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dtProps">
    <thead>
    <tr>
        <th>Thumb</th>
        <th>Property Name</th>
        <th>Subscription Type</th>
        <th>Rent</th>
        <th>Gallery Images</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>

    <?
    //We'll use the extracted data of the landlords propertys into the view
    foreach ($property_data as $key=>$value) {

        //sort out the user_subscription_type into proper var strings for table data
        switch ($value['user_subscription_type']) {
            case null:
                $sub_type = "N/A <strong>null!!</strong>";
                break;
            case 0:
                $sub_type = "Draft";
                break;
            case 1:
                $sub_type = "Basic";
                break;
            case 2:
                $sub_type = "Featured";
                break;
            case 3:
                $sub_type = "Premium";
                break;
            case 4:
                $sub_type = "Headliner";
                break;
            //for feature
            case 5:
                $sub_type = "NULL";
                break;
            case 6:
                $sub_type = "NULL";
                break;
        }
        $id = $value['id'];
    ?>


    <tr class="odd gradeX">

        <td><img style="width: 50px; height: 50px;" src="<? echo site_url() . 'prop_images/' .  $value['thumb_file_name'] ?>" /></td>
        <td><? echo $value['title'] . ' - <strong> ' . $value['prop_id'] . '</strong>'?></td>
        <td class="center">
            <?

            if ($sub_type == 'Headliner')
            {
                echo $sub_type . '<a href="' . site_url('landlord/headliner_options/') . '/' . $id . '" class="btn btn-danger btn-sm" role="button">Crop! </a> ';
                $prop_id = $value['main_image'];
            }
            else if ($sub_type == 'Draft')
            {
                echo $sub_type . '<a href="' . site_url('landlord/purchase_listing/') . '/' . $id . '" class="btn btn-success btn-sm" role="button">PURCHASE LISTING </a> ';
            }
            else
            {
                echo $sub_type;
            }
            ?>

            <?
            // get flashdata
            $payment_message = $this->session->flashdata('payment_message');

            if ($payment_message) {
                echo ('<div class="alert alert-success">' . $payment_message . '</div><br />');
            }
            ?>

        </td>
        <td>£<? echo (int)$value['rent'] ?></td>
        <td class="center"><a href="<? echo base_url('landlord/gallery') ?>" class="btn btn-default btn-xs" role="button">Gallery</a></td>
        <td class="center"><button type="button" class="btn btn-warning btn-xs">Edit</button> </td>
        <td class="center"><button type="button" class="btn btn-danger btn-xs">Delete</button> </td>
    </tr>

   <? } ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dtProps').DataTable({
                responsive: true
            });
        });
    </script>
    </tbody>
    </table>
    </div>

</div>
