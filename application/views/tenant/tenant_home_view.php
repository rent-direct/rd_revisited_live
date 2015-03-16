<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tenants Dashboard </h1><?
        //Echo the success messages after completion called from controller functions
        if (isset($success)) {
            echo('<h3>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;' . $success . '</h3>');
        } else {
            echo('');
        } ?>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- Dashboard Tables Start! -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-home fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><? echo $num_viewing_requests ?></div>
                        <div>Requests Made</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><? echo $num_saved_properties ?></div>
                        <div>Saved Properties!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>


<!-- /.row -->
<div class="row">
<div class="col-md-8">
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bar-chart-o fa-fw"></i> Global Property Listings Over Time
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Action</a>
                    </li>
                    <li><a href="#">Another action</a>
                    </li>
                    <li><a href="#">Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div id="morris-area-chart"></div>
</div>
<!-- /.panel-body -->
</div>
    </div>
<div class="col-md-4">
    <!---- START OF NOTIFICATIONS PANEL ----->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Notifications
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <i class="fa fa-envelope fa-fw"></i> DBCALL FROM LANDLORD - 11/10/13
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-tasks fa-fw"></i> DBCALL FROM LANDLORD - 11/10/13
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-upload fa-fw"></i> DBCALL FROM LANDLORD - 11/10/13
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                    </a>

                </div>
                <!-- /.list-group -->
                <a href="#" class="btn btn-default btn-block">View All Alerts</a>
            </div>
            <!-- /.panel-body -->
        </div>

</div>
    </div>
