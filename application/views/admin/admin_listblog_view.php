<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">BLOG (BETA)<div class="pull-right"><a href="<? echo base_url('admin/blog/new') ?>" class="btn btn-success btn-lg" role="button">Add New Blog</a></div></h1>
            <?
            //Echo the success messages after completion called from controller functions
            if (isset($blog_success)) {
                echo('<div class="alert alert-success" role="alert">' . $blog_success . '</div>');
            } else {
                echo('');
            } ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    BETA: List of blogs, published/unpublished, will have its own user interface for marketing staff in the up and coming months
                </div>
<style>
    /* style the icons in the listings */
                .fa-check-square-o {
                color: green;
                }
                .fa-minus-square {
                    color: red;
                }
</style>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>FRT-PG</th>
                                <th>PUBL</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?
                            //We'll use the extracted data of the landlords propertys into the view
                            foreach ($blog_listings as $key=>$value) {

                            //make icons for the FP and Published to make it look nice
                            switch ($value['front_page']) {
                                case null:
                                    $front_page = 'null';
                                    break;
                                case 0:
                                    $front_page = "<i class='fa fa-minus-square'></i>";
                                    break;
                                case 1:
                                    $front_page = "<i class='fa fa-check-square-o'></i>";
                                    break;
                            }
                                switch ($value['published']) {
                                    case null:
                                        $published = 'null';
                                        break;
                                    case 0:
                                        $published = "<i class='fa fa-minus-square'></i>";
                                        break;
                                    case 1:
                                        $published = "<i class='fa fa-check-square-o'></i>";
                                        break;
                                }

                                ?>
                                <tr class="odd gradeX">
                                    <td><? echo $value['id'] ?></td>
                                    <td><? echo $value['title'] ?></td>
                                    <td><? echo $value['author'] ?></td>
                                    <td><? echo $value['date_added'] ?></td>
                                    <td><? echo $front_page ?></td>
                                    <td><? echo $published ?></td>
                                    <td class="center"><button type="button" class="btn btn-success btn-sm">View</button> </td>
                                    <td class="center"><button type="button" class="btn btn-warning btn-sm">Edit</button> </td>
                                    <td class="center"><button type="button" class="btn btn-danger btn-sm">Delete</button> </td>

                                </tr>

                            <? } ?>
                            </tbody>
                        </table>
                    </div>

                </div>