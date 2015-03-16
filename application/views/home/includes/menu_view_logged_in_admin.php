<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<section id='hidden-header'>
    <section class='container'>

        <!-- jQuery Slider Form for Contact -->
        <section class='row contact-form'>
            <div class='span6'>
                <div class='login-form top-form'>

                    <form action="" class='row'>

                    </form>

                </div>
            </div>
            <div class='span6'>


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
                            <input type="text" class='input-block-level' name='identity' id="identity" placeholder="Username"/>
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
                    <h2>Register</h2>
                    <p>Either register directly with us or use our social login feature</p>

                    <form action="<? echo base_url('auth/create_user'); ?>" class='row' method="post" accept-charset="utf-8">
                        <div class='span3'>
                            <input type="text" class='input-block-level' id="username" name='username' placeholder="Username"/>
                            <input type="password" class='input-block-level' name='password' placeholder="Password"/>
                            <? if ($this->ion_auth->logged_in()) { echo "Logged in"; } else if (!$this->ion_auth->logged_in()) { echo "Not logged in"; } ?>
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
                        <li class=""><a href="<?=base_url('home')?>">Home</a></li>
                        <li class=""><a href="<?=base_url('about')?>">About</a></li>
                        <li class=""><a href="<?=base_url('features')?>">Features</a></li>
                        <li class=""><a href="<?=base_url('admin')?>">ADMIN DASHBOARD <i class="fa fa-tachometer"></i></a></li>
                    </ul>
                </nav>
            </div>
            <div class='span3'>
                <div class='header-buttons'>
                    <!--                    <a href="--><?php //echo base_url('add_wizard') ?><!--" class='add custom-tooltip' title="Add Property">Add</a>-->
                    <a href="<? echo base_url('add_wizard') ?>" class='add custom-tooltip' title="Start Adding Properties!">Profile</a>
                    <a href="#" class='contact custom-tooltip' title='Go to Contact Form'>Messages</a>
                </div>
            </div>
        </section>
    </section>
</header>



