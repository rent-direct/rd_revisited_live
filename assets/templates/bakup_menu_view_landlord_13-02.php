<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<section id='hidden-header'>
<section class='container'>

<!-- jQuery Slider Form for Contact -->
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
            <h2>Location & Address</h2>
            <div class='map-container'>
                <iframe width="100%" height="180" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;q=Rainer+Ave,+Rowland+Heights,+Los+Angeles,+California+91748&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=42.495706,93.076172&amp;t=m&amp;ie=UTF8&amp;geocode=FcByBgIdVe34-A&amp;split=0&amp;hq=&amp;hnear=Rainer+Ave,+Rowland+Heights,+Los+Angeles,+California+91748&amp;ll=33.977033,-117.904072&amp;spn=0.024912,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
            </div>
            <div class='row'>
                <div class='span3'>
                    <address>
                        <strong>Head Office</strong> <br/>
                        5 Reiner Street, Newark, Notts, NE6 8UY <br/>
                        Phone: 555-555<br/>
                        Email: info@rent-direct.co.uk <br/>
                    </address>
                </div>
                <div class='span3'>
                    <address>
                        <strong>Representative</strong> <br/>
                        65 Clarke Street, Newark, Notts, NE9 KIT  <br/>
                        Phone: 555-555 <br/>
                        Email: info@rent-direct.co.uk  <br/>
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery Slider Form for Profile -->
<section class='row add-form'>
    <!--- START OF WIZARD ---->
    <br/>
    <script type="text/javascript">

        $(document).ready(function(){
            // Smart Wizard
            $('#wizard').smartWizard({transitionEffect:'slide'});
        });
    </script>


    <table align="center" border="0" cellpadding="0" cellspacing="0">
        <tr><td>
                <!-- Tabs -->
                <div id="wizard" class="swMain">
                    <ul>
                        <li><a href="#step-1">
                                <span class="stepNumber">1</span>
                <span class="stepDesc">
                  Enter Postcode<br />

                </span>
                            </a></li>
                        <li><a href="#step-2">
                                <span class="stepNumber">2</span>
                <span class="stepDesc">
                   Property Description<br />

                </span>
                            </a></li>
                        <li><a href="#step-3">
                                <span class="stepNumber">3</span>
                <span class="stepDesc">
                   Property Details<br />

                </span>
                            </a></li>
                        <li><a href="#step-4">
                                <span class="stepNumber">4</span>
                <span class="stepDesc">
                   Final Step<br />

                </span>
                            </a></li>
                    </ul>
                    <div id="step-1">
                        <div class="row">
                            <div class="span3 offset1">
                                <div class="span6">
                                    <fieldset>

                                        <div id="lookup_field"></div>

                                        <!-- This is your existing form -->
                                        <input id="first_line" type="text" placeholder="Address Line One" class="form-control" name="pAddress_1">

                                        <input id="second_line" type="text" placeholder="Address Line Two" class="form-control" name="pAddress_2">

                                        <input id="third_line" type="text" placeholder="Address Line Three" class="form-control" name="pAddress_3">

                                        <input id="post_town" type="text" placeholder="Post Town" class="form-control" name="pCity">

                                        <input id="postcode" type="text" placeholder="Postcode" class="form-control" name="pPostcode">

                                        <!-- Start script for the postcode query -->
                                        <script>
                                            // Add this after your form
                                            $('#lookup_field').setupPostcodeLookup({
                                                // Add your API key
                                                api_key: 'ak_i4tv5axrjLrwaraas6Xle0O8weJwF',
                                                // Identify your fields with CSS selectors
                                                output_fields: {
                                                    line_1: '#first_line',
                                                    line_2: '#second_line',
                                                    line_3: '#third_line',
                                                    post_town: '#post_town',
                                                    postcode: '#postcode'
                                                },
                                                button_class: 'btn btn-success btn-lg ',
                                                input_class: 'form-control',
                                                dropdown_class: 'dropdown'
                                            });
                                        </script>

                                        <input type="hidden" name="lat" id="lat">
                                        <input type="hidden" name="lng" id="lng">
                                    </fieldset>
                                </div>
                            </div>
                            <br/>
                        </div>

                    </div>
                    <div id="step-2">




                        <!--- HIDDEN FIELDS FOR USER ID ETC... ----->
                        <input type="hidden" name="user_id" value="<? ?>">
                        <input type="hidden" name="prop_id">

                        <!-- Section -->
                        <p><h4>Number of Bedrooms</h4></p>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default btn-lg active">
                                <input type="radio" name="pBedrooms" id="pBedrooms" autocomplete="off" value="1"> 1
                            </label>
                            <label class="btn btn-default btn-lg">
                                <input type="radio" name="pBedrooms" id="pBedrooms" autocomplete="off" value="2"> 2
                            </label>
                            <label class="btn btn-default btn-lg">
                                <input type="radio" name="pBedrooms" id="pBedrooms" autocomplete="off" value="3"> 3
                            </label>
                            <label class="btn btn-default btn-lg">
                                <input type="radio" name="pBedrooms" id="pBedrooms" autocomplete="off" value="4"> 4
                            </label>
                            <label class="btn btn-default btn-lg">
                                <input type="radio" name="pBedrooms" id="pBedrooms" autocomplete="off" value="5"> 5+
                            </label>
                        </div>
                        <br />
                        <br />

                        <!-- Section -->
                        <p><h4>Type of Property</h4></p>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default btn-lg active">
                                <input type="radio" name="pSub_type_id" id="pSub_type_id" autocomplete="off" value="1"> Terraced
                            </label>
                            <label class="btn btn-default btn-lg">
                                <input type="radio" name="pSub_type_id" id="pSub_type_id" autocomplete="off" value="2"> Semi-D
                            </label>
                            <label class="btn btn-default btn-lg">
                                <input type="radio" name="pSub_type_id" id="pSub_type_id" autocomplete="off" value="3"> Detached
                            </label>
                            <label class="btn btn-default btn-lg">
                                <input type="radio" name="pSub_type_id" id="pSub_type_id" autocomplete="off" value="4"> Flat / Apart
                            </label>
                            <label class="btn btn-default btn-lg">
                                <input type="radio" name="pSub_type_id" id="pSub_type_id" autocomplete="off" value="5"> Maisonette
                            </label>
                            <label class="btn btn-default btn-lg">
                                <input type="radio" name="pSub_type_id" id="pSub_type_id" autocomplete="off" value="6"> Bungalow
                            </label>
                        </div>
                        <br />
                        <br />
                        <div class="span3">
                            <!--- Section --->
                            <label>Rent</label>
                            <input type="text" name="pRent" class="form-control" id="rent" placeholder="Amount">


                            <br />
                        </div>
                        <div class="span3">
                            <!--- Section --->
                            <label>Bond</label>
                            <input type="text" name="pBond" class="form-control" id="bond" placeholder="Amount">

                            <br />
                        </div>


                        <!------------------------------------------------>

                    </div>

                    <div id="step-3">
                        <h2 class="StepTitle">Step 3 Content</h2>

                    </div>
                    <div id="step-4">
                        <h2 class="StepTitle">Step 4 Content</h2>

                    </div>
                </div>

                <!-- End SmartWizard Content -->

            </td></tr>
    </table>



    <!--- END OF WIZARD --->
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
                        <li class="<?php echo ($activeTab == "blog") ? "active" : ""; ?>"><a href="<?=base_url('blog')?>">Blog</a></li>
                        <li class="<?php echo ($activeTab == "features") ? "active" : ""; ?>"><a href="<?=base_url('features')?>">Features</a></li>
                        <li class="<?php echo ($activeTab == "landlord") ? "active" : ""; ?>"><a href="<?=base_url('landlord')?>">Dashboard <i class="fa fa-tachometer"></i></a></li>

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



