<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Settings</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Account Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">

                                <form role="form" action="<? echo base_url('tenant/settings') ?>" method="POST">

                                    <div class="warning_error"> <strong> <p><?php echo validation_errors(); ?></p></strong></div>


                                    <div class="form-group">
                                        <label>First Name <small>(Required)</small></label>
                                        <input class="form-control" name="first_name" placeholder="" value="<? echo $user_data['first_name'] ?>">

                                    </div>

                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input class="form-control" name="middle_name" placeholder="" value="<? echo $user_data['middle_name'] ?>">

                                    </div>

                                    <div class="form-group">
                                        <label>Last Name <small>(Required)</small></label>
                                        <input class="form-control" name="last_name" placeholder="" value="<? echo $user_data['last_name'] ?>">

                                    </div>

                                    <div class="form-group">
                                        <label>Company</label>
                                        <input class="form-control" name="company" placeholder="" value="<? echo $user_data['company'] ?>">

                                    </div>

                                    <div class="form-group">
                                        <label>Contact Telephone <small>(Required)</small></label>
                                        <input class="form-control" placeholder="" name="phone" value="<? echo $user_data['phone'] ?>">
                                        <p class="help-block">Prefably Primary</p>
                                    </div>

                                    <!---Passwords---->
                                    <div class="form-group">
                                        <label>New Password <small>(Required)</small></label>
                                        <input type="password" class="form-control" placeholder="" name="password" value="">
                                        <p class="help-block">Enter a new password</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm New Password <small>(Required)</small></label>
                                        <input type="password" class="form-control" placeholder="" name="password_confirm" value="">
                                        <p class="help-block">Confirm the new password</p>
                                    </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Address 1 <small>(Required)</small></label>
                                    <input class="form-control" placeholder="" name="address_1" value="<? echo $user_data['address_1'] ?>">

                                </div>

                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input class="form-control" placeholder="" name="address_2" value="<? echo $user_data['address_2'] ?>">

                                </div>

                                <div class="form-group">
                                    <label>Address 3</label>
                                    <input class="form-control" placeholder="" name="address_3" name="address_3" value="<? echo $user_data['address_3'] ?>">

                                </div>

                                <div class="form-group">
                                    <label>City <small>(Required)</small></label>
                                    <input class="form-control" placeholder="" name="city" value="<? echo $user_data['city'] ?>">

                                </div>

                                <div class="form-group">
                                    <label>County <small>(Required)</small></label>
                                    <input class="form-control" placeholder="" name="county" value="<? echo $user_data['county'] ?>">

                                </div>

                                <div class="form-group">
                                    <label>Postcode <small>(Required)</small></label>
                                    <input class="form-control" placeholder="" name="postcode" value="<? echo $user_data['postcode'] ?>">

                                </div>

                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" placeholder="" name="country" value="<? echo $user_data['country'] ?>">

                                </div>

                            </div>
                            <button type="submit" class="btn btn-default">Save Details</button>

                            </form>
                        </div>
                    </div>
                </div>
                <br />


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Other settings....
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form">
                                            SETTINGS HERE

                                    </div>
                                    <div class="col-lg-6">
                                        <form role="form">

                                            SETTINGS HERE
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>