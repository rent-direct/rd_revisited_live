<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Landlords Dashboard </h1><?
        //Echo the success messages after completion called from controller functions
        if (isset($success)) {
                echo('<h3>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;' . $success . '</h3>');
            } else {
                echo('');
            } ?>
        <?
        if (isset($payment_success)) {
        echo('<h3>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;' . $payment_success . '</h3>');
        } else {
        echo('');
        } ?>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- Dashboard Tables Start!!! -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-envelope-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><? echo $message_count ?></div>
                        <div>New Messages</div>
                    </div>
                </div>
            </div>
            <a href="<? echo base_url('landlord/inbox') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><? echo $listed_properties ?></div>
                        <div>My Properties</div>
                    </div>
                </div>
            </div>
            <a href="<? echo base_url('landlord/properties') ?>">
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
                        <i class="fa fa-home fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><? echo $property_count ?></div>
                        <div>Global Properties!</div>

                    </div>
                </div>
            </div>
            <a href="<? echo base_url('landlord/properties') ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-eye fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><? echo $viewing_requests ?></div>
                        <div>Viewing Requests</div>
                    </div>
                </div>
            </div>
            <a href="<? echo base_url('landlord/viewings') ?>">
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
<div class="col-lg-8">
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
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
<!-- /.panel -->

<!-- /.panel -->
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <ul class="timeline">
            <li>
                <div class="timeline-badge"><i class="fa fa-check"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Tenants Tab Coming soon!!</h4>
                        <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                        </p>
                    </div>
                    <div class="timeline-body">
                        <p>Soon we will have a section for the tenants, where we'll have ratings, etc</p>
                    </div>
                </div>
            </li>

            <li>
                <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-badge info"><i class="fa fa-save"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4 class="timeline-title">Lorem ipsum dolor</h4>
                    </div>
                    <div class="timeline-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus modi quam ipsum alias at est molestiae excepturi delectus nesciunt, quibusdam debitis amet, beatae consequuntur impedit nulla qui! Laborum, atque.</p>
                        <hr>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-gear"></i>  <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
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
            </li>

        </ul>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>


<!-- /.col-lg-8 -->

<div class="col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Notifications Panel
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="list-group">

                <a href="#" class="list-group-item">
                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                </a>

                <a href="#" class="list-group-item">
                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                </a>

            </div>
            <!-- /.list-group -->
            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->

    <!-- /.panel -->
    <div class="chat-panel panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i>
            Chat
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-chevron-down"></i>
                </button>
                <ul class="dropdown-menu slidedown">
                    <li>
                        <a href="#">
                            <i class="fa fa-refresh fa-fw"></i> Refresh
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-check-circle fa-fw"></i> Available
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-times fa-fw"></i> Busy
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-clock-o fa-fw"></i> Away
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <ul class="chat">
                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <strong class="primary-font">Jack Sparrow</strong>
                            <small class="pull-right text-muted">
                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                            </small>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>
                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <small class=" text-muted">
                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>
                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <strong class="primary-font">Jack Sparrow</strong>
                            <small class="pull-right text-muted">
                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>
                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                    <div class="chat-body clearfix">
                        <div class="header">
                            <small class=" text-muted">
                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
        <!-- /.panel-body -->
                       