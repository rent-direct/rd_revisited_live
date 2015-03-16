<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<section id='hidden-header'>
    <section class='container'>
        <section class='row contact-form'>
            <div class='span6'>


                <div class='login-form top-form'>
                    <h2>Contact Us</h2>
                    <p>Do you have any questions or requests? Don't be shy, contact us right away!</p>

                    <form action="<?= base_url('home/contact_us') ?>" method="post" class='row'>
                        <div class='span3'>
                            <input type="text" class='input-block-level' name='name' placeholder="Name"/>
                        </div>
                        <div class='span3'>
                            <input type="email" class='input-block-level' name='email' placeholder="Email"/>
                        </div>

                        <div class='span3'>
                            <input type="text" class='input-block-level' name='phone' placeholder="Phone"/>
                        </div>

                        <div class='span3'>
                            <select class='span3' name="issue">
                                <option value="1">General Enquiry</option>
                                <option value="2">Report a Problem</option>
                                <option value="3">Request a Feature</option>
                                <option value="4">Make a Complaint</option>
                            </select>
                        </div>

                        <div class='span6'>
                            <textarea name="body" class='input-block-level' rows="5" placeholder="Message"></textarea>
                            <input type="submit" name='submit' value='Send' class='btn btn-primary'/>
                        </div>
                    </form>
                </div>
            </div>


            <div class='span6'>
                <div class='top-form addresses'>
                    <h2>Address</h2>
                   <br /><br />
                  <div class='row'>
                        <div class='span3'>
                            <address>
                                <strong>General Enquiries</strong> <br/>
                                Rent Direct Online Ltd<br />12 Pinfold Lane, Newark, Notts, NG24 3LP<br/>
                                Phone: 01636 658844<br/>
                                Email: info@rent-direct.co.uk <br/>
                            </address>
                        </div>
                        <div class='span3'>
                            <address>
                                <strong>Report An Agent</strong> <br/>
                                <i>Let us know of a suspected agent</i> <br /><br/>
                                <br/>
                                Email: report@rent-direct.co.uk  <br/>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class='row profile-form'>
            <div class='span6'>
                <div class='login-form top-form'>
                    <h2>Login</h2>
                    <p>Login to Rent Direct and start listing today!</p>

                    <form class='row' method="post" accept-charset="utf-8" action="<? echo base_url('home/login'); ?>">
                        <div class='span3'>
                            <input type="text" class='input-block-level' name='identity' id="identity" placeholder="Username"/>
                            <input type="password" class='input-block-level' name='password' id="password" placeholder="Password"/>
                            <input type="checkbox"  name='remember' id="remember" value="1"/>
                            <label>Remember me</label>
                            <input type="submit" name='submit' value='Login' class='btn btn-primary'/>
                            <p><a href="">Logout</a></p>
                        </div>
                        <div class='span3'>
                            <p><a href="<? echo base_url() ?>hauth/login/Facebook" class="btn btn-facebook" role="button "><i class="fa fa-facebook"></i>   | Use Facebook </a><br> </p>
                            <p><a href="<? echo base_url() ?>hauth/login/Google" class="btn btn-google-plus" role="button "><i class="fa fa-google-plus"></i>  | Use Google Plus </a><br> </p>
                            <p><a href="<? echo base_url() ?>hauth/login/Twitter" class="btn btn-twitter" role="button "><i class="fa fa-twitter"></i>  | Use Twitter </a><br> </p>
                            <p><a href="<? echo base_url() ?>hauth/login/LinkedIn" class="btn btn-linkedin" role="button "><i class="fa fa-linkedin"></i>  | Use Linkedin </a><br> </p>
                        </div>
                    </form>
                </div>
            </div>
            <div class='span6'>
                <div class='login-form top-form' >
                    <h2>Sign up with Rent Direct</h2>
                    <p>Choose your personal profile as either landlord, tenant or advertiser.</p>
                    <form action="<? echo base_url('home/register'); ?>" class='row' method="post" accept-charset="utf-8">
                        <div class='span3'>

                            <div class="form-group">
                                <label>Sign up as a...</label>
                                <label class="radio-inline">
                                    <input type="radio" name="type_id" id="type_id" value="3" checked> Tenant
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type_id" id="type_id" value="2"> Landlord
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type_id" id="type_id" value="4" disabled> Advertiser
                                </label>

                            </div>
                        </div>
                        <div class='span3'>
                            <input type="email" class='input-block-level' id="email" name='email' placeholder="Email"/>
                            <input type="password" class='input-block-level' name='password' placeholder="Password"/>
                            <input type="password" class='input-block-level' id="password_confirm" name='password_confirm' placeholder="Confirm Password"/>
                            <input type="submit" name='submit' value='Register' class='btn btn-primary'/>
                            <p><?php echo validation_errors(); ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</section>
<header>
    <section class='container'>
        <section class='row'>
            <div class='span3'>
                <figure class='logo'>
                    <a href="<?=base_url('home')?>">
                        <img src="<? echo base_url() ?>assets/img/logo.png" alt=""/>

                    </a>
                </figure>
            </div>
            <div class='span6'>
                <nav class='main-nav'>
                    <ul>

                        <li class="<?php echo ($activeTab == "home") ? "active" : ""; ?>"><a href="<?=base_url('home')?>">Home</a></li>
                        <li class="<?php echo ($activeTab == "about") ? "active" : ""; ?>"><a href="<?=base_url('about')?>">About</a></li>
                        <li class="<?php echo ($activeTab == "map_search") ? "active" : ""; ?>"><a href="<?=base_url('map_search')?>">Map Search</a>

                            <? // TODO: MAP SEARCH  ?>

                            <ul class='dropdown-menu'>

                                <li class='first-element'><a href="<?=base_url('property')?>">Residential</a></li>

                                <li class='dropdown-submenu'>
                                    <a>Commercial</a>
                                    <ul class='dropdown-menu'>
                                        <li class='first-element'><a>Coming Soon!</a></li>
                                    </ul>
                                </li>

                                <li class='dropdown-submenu'>
                                    <a>Property Share</a>
                                    <ul class='dropdown-menu'>
                                        <li class='first-element'><a>Coming Soon!</a></li>
                                    </ul>
                                </li>

                                <li class='dropdown-submenu'>
                                    <a>Holiday Lettings</a>
                                <ul class='dropdown-menu'>
                                    <li class='first-element'><a>Coming Soon!</a></li>
                                </ul>
                                </li>

                            </ul>
                        </li>

                       <li class="<?echo ($activeTab == "blog") ? "active" : ""; ?>"><a href="<?=base_url('blog')?>">Blog</a></li>

                        <li class="<?php echo ($activeTab == "features") ? "active" : ""; ?>">
                            <a href="<?=base_url('features')?>">Features</a>
                        </li>

                        <li class="<?php echo ($activeTab == "help") ? "active" : ""; ?>">
                            <a href="<?=base_url('home/help')?>">Help</a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class='span3'>
                <div class='header-buttons'>
                    <a href="#" class='profile custom-tooltip' title="Go to My Profile">Profile</a>
                    <a href="#" class='contact custom-tooltip' title='Got to Contact Form'>Contact</a>
                </div>
            </div>
        </section>
    </section>
</header>
