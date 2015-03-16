
<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <div class='span3'>
        <figure class='logo'>
            <a href="<?=base_url('home')?>">
                <img src="<? echo base_url() ?>assets/img/logo.png" alt="Landlord Dashboard"/>
            </a>
        </figure>

    </div>

</div>
<!-- /.navbar-header -->



<ul class="nav navbar-top-links navbar-right">
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-messages">
        <!----- START OF MESSAGE ------>

        <? // check first to see if we have the msg variable
            if (isset($landlord_messages)) {

                foreach ($landlord_messages as $key=>$value) {
        ?>

                <li>
                    <a href="<?= base_url('landlord/inbox/read') . '/' . $value['message_id'] ?>">
                        <div>
                        <strong><?= $value['name'] ?></strong>
                        <span class="pull-right text-muted">
                             <em><?= date('d/m/Y H:i:s',strtotime($value['datetime_received'])) ?></em>
                            </span>
                            </div>
                        <div><?= substr(strip_tags($value['message']), 0, 65) . '...' ?></div>
                        </a>
                </li>
                    <li class="divider"></li>

                <? } // end of foreach ?>

        <? } else { echo "NO MESSAGES"; } // end of isset ?>

        <li>
            <a class="text-center" href="<?= base_url('landlord/inbox') ?>">
                <strong>Read All Messages</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>



    </ul>
    <!-- /.dropdown-messages -->
</li>
<!-- /.dropdown -->

<!-- /.dropdown -->
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-alerts">
        <li>
            <a href="#">
                <div>
                    <i class="fa fa-eye fa-fw"></i> New Viewing Request
                    <span class="pull-right text-muted small">4 minutes ago</span>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <i class="fa fa-envelope-o fa-fw"></i> Message Sent
                    <span class="pull-right text-muted small">4 minutes ago</span>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <i class="fa fa-tasks fa-fw"></i> Profile Updated
                    <span class="pull-right text-muted small">4 minutes ago</span>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <i class="fa fa-envelope fa-fw"></i> New Message
                    <span class="pull-right text-muted small">4 minutes ago</span>
                </div>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="text-center" href="#">
                <strong>See All Alerts</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    <!-- /.dropdown-alerts -->
</li>
<!-- /.dropdown -->
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="<? echo base_url('landlord/settings') ?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
        </li>
        <li class="divider"></li>
        <li><a href="<? echo base_url('landlord/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="<? echo base_url('landlord') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="<? echo base_url('landlord/properties') ?>"><i class="fa fa-home fa-fw"></i> Properties</a>
            </li>

            <li>
                <a href="<? echo base_url('landlord/viewings') ?>"><i class="fa fa-binoculars fa-fw"></i> Viewings</a>
            </li>

            <li>
                <a href="<? echo base_url('landlord/calendar') ?>"><i class="fa fa-calendar fa-fw"></i> Calendar</a>
            </li>

            <li>
                <a><i class="fa fa-child fa-fw"></i> <small>Tenants</small></a>
            </li>
                      <? // Ratings was <a href="<? echo base_url('landlord/tenants') "> ?>
            <li>
                <a><i class="fa fa-star fa-fw"></i><small> Ratings</small> </a>
            </li>
                    <? // Ratings was <a href="<? echo base_url('landlord/ratings') "> ?>
            <li>
                <a href="<? echo base_url('landlord/settings') ?>"><i class="fa fa-cogs fa-fw"></i> Account Settings</a>
            </li>

            <li>
                <a><i class="fa fa-wrench fa-fw"></i><small> Service Directory</small></a>
            </li>
            <? // Ratings was <a href="<? echo base_url('landlord/services') "> ?>
            <li>
                <a href="<? echo base_url('landlord/resources') ?>"><i class="fa fa-book fa-fw"></i> Resources</a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>


