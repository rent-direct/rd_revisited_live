<body>

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


    <!---- TODO: MESSAGE SYSTEM ----->
    <ul class="dropdown-menu dropdown-messages">
        <li>
            <a href="#"> <!-- LINK TO INBOX -->
                <div>
                    <strong>TODO: John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>TODO: DB DATE</em>
                                    </span>
                </div>
                <div>TODO: DB CALL REF MSG</div>
            </a>
        </li>


        <!---- 2ND MESSAGE TODO: MESSAGE SYSTEM ---->
        <li class="divider"></li>
        <li>
            <a href="#">
                <div>
                    <strong>DB POINT TO VIEWINGS CHAT</strong>
                                    <span class="pull-right text-muted">
                                        <em>TODO: DB DATE</em>
                                    </span>
                </div>
                <div>TODO: DB CALL REF MSG</div>
            </a>
        </li>

        <!----- READ MORE DB CALL ------>
        <li class="divider"></li>
        <li>
            <a class="text-center" href="<? echo base_url('tenant/viewings') ?>">
                <strong>Read All Messages</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    <!-- /.dropdown-messages -->
</li>
<!-- /.dropdown -->





<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
        <li><a href="<? echo base_url('tenant/settings') ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
        </li>
        <li><a href="<? echo base_url('tenant/settings') ?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
        </li>
        <li class="divider"></li>
        <li><a href="<? echo base_url('tenant/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                    <input type="text" class="form-control" placeholder="Coming soon..." disabled>
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>


            <li>
                <a href="<? echo base_url('tenant') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="<? echo base_url('tenant/properties') ?>"><i class="fa fa-heart fa-fw"></i> Saved Properties</a>
            </li>

            <li>
                <a href="<? echo base_url('tenant/viewings') ?>"><i class="fa fa-calendar fa-fw"></i> Viewings</a>
            </li>

            <li>
                <a href="<? echo base_url('tenant/settings') ?>"><i class="fa fa-cogs fa-fw"></i> Account Settings</a>
            </li>


        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>


