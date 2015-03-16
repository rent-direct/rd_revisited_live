<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<section id='hidden-header'>
    <section class='container'>

        <!-- jQuery Slider Form for Contact -->
        <section class='row contact-form'>
            <div class='span6'>
                <div class='login-form top-form'>
                    <h2>Request Feature</h2>
                    <p>Do you have any questions or requests? Don't be shy and contact us right away!</p>

                    <form action="" class='row'>
                        <div class='span3'>
                            <input type="text" class='input-block-level' name='name' placeholder="Name"/>
                        </div>
                        <div class='span3'>
                            <input type="email" class='input-block-level' name='email' placeholder="Email"/>

                        </div>
                        <div class='span6'>
                            <textarea name="message" class='input-block-level' rows="5" placeholder="Message"></textarea>
                            <input type="submit" name='submit' value='Send' class='btn btn-primary'/>
                        </div>
                    </form>
                </div>
            </div>
            <div class='span6'>
                <div class='row'>
                    <div class='span3'>
                        <!--- USER MENU TO ACCESS DASHBOARD AND STATS ---->
                    </div>

                    <div class='span3'>
                        <br />
                        <br />
                        <a style="width: 130px;" class="btn btn-default btn-large" href="<?= base_url('tenant') ?>" role="button" ><span class="fa fa-tachometer fa-1x"></span> DASHBOARD</a>
                        <br />
                        <br />
                        <a style="width: 130px;" class="btn btn-default btn-large" href="<?= base_url('tenant/logout') ?>" role="button" ><span class="fa fa-sign-out fa-1x" ></span> LOGOUT</a>

                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery Slider Form for Profile -->
        <section class='row add-form'>
            <div class='span6'>
                <div class='add-form top-form'>
                    <h2>Add Property</h2>
                    <p>Add Property</p>

                    <form class='row' method="post" accept-charset="utf-8" action="<? echo base_url('auth/login'); ?>">
                        <div class='span3'>
                            <input type="text" class='input-block-level' name='identity' id="identity" placeholder="Username"/>
                            <a href="<? echo base_url('home/logout'); ?>">Logout</a>

                        </div>
                        <div class='span3'>
                            <input type="password" class='input-block-level' name='password' id="password" placeholder="Password"/>
                            <input type="submit" name='submit' value='Login' class='btn btn-primary'/>


                        </div>


                        <div class='span3'>



                        </div>
                    </form>
                </div>
            </div>
            <div class='span6'>
                <div class='login-form top-form' >
                    <h2></h2>
                    <p></p>

                    <form action="" class='row' method="post" accept-charset="utf-8">
                        <div class='span3'>
                            <input type="text" class='input-block-level' id="username" name='username' placeholder="Username"/>
                            <input type="password" class='input-block-level' name='password' placeholder="Password"/>

                        </div>
                        <div class='span3'>
                            <input type="email" class='input-block-level' id="email" name='email' placeholder="Email"/>
                            <input type="password" class='input-block-level' id="password_confirm" name='password_confirm' placeholder="Confirm Password"/>
                            <input type="submit" name='submit' value='Register' class='btn btn-primary'/>
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
                        <li class="<? echo ($activeTab == "blog") ? "active" : ""; ?>"><a href="<?=base_url('blog')?>">Blog</a></li>
                        <li class="<?php echo ($activeTab == "features") ? "active" : ""; ?>"><a href="<?=base_url('features')?>">Features</a></li>
                        <li class="<?php echo ($activeTab == "help") ? "active" : ""; ?>">
                            <a href="<?=base_url('home/help')?>">Help</a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class='span3'>
                <div class='header-buttons'>
                    <a href="#" class='add custom-tooltip' title="Start Adding Properties!">Profile</a>
                    <a href="#" class='contact custom-tooltip' title='Go to Contact Form'>Messages</a>
                </div>
            </div>
        </section>
    </section>
</header>

