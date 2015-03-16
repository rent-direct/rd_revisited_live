<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<section id='hidden-header'>
    <section class='container'>


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
                        <li class="<?php echo ($activeTab == "features") ? "active" : ""; ?>">
                        </li>
                        <li class="<?php echo ($activeTab == "blog") ? "active" : ""; ?>">
                            <a href="<?=base_url('blog')?>">Blog</a>
                        </li>
                        <li class="<?php echo ($activeTab == "landlord") ? "active" : ""; ?>"><a href="<?=base_url('landlord')?>">Dashboard</a></li>
                    </ul>
                </nav>
            </div>
            <div class='span3'>
                <div class='header-buttons'>

                    <a href="#" class='contact custom-tooltip' title='Got to Contact Form'>Contact</a>
                </div>
            </div>
        </section>
    </section>
</header>

