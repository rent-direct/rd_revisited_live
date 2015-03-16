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
                <div class='row'>

                    <div class='span3'>
                        <!--- USER MENU TO ACCESS DASHBOARD AND STATS ---->
                    </div>
                    <div class='span3'>
                        <br />
                        <br />
                        <a  class="btn btn-default btn-large" href="<?= base_url('landlord') ?>" role="button" ><span class="fa fa-tachometer fa-1x"></span> DASHBOARD</a>
                        <br />
                        <br />
                        <a  class="btn btn-default btn-large" href="<?= base_url('landlord/logout') ?>" role="button" ><span class="fa fa-sign-out fa-1x" ></span> LOGOUT</a>
                    </div>
                </div>

            </div>
        </section>

        <!-- jQuery Slider Form for Profile -->
        <section class='row add-form'>

            <form id="myWizard"  class="form-horizontal" name="postForm" method="post" action="<?= base_url('landlord/quick_add') ?>">


                <!---- STEP 1 ----->
                <section class="step centerForm" data-step-title="Address Look-Up">

                    <div class="control-group">
                        <div class="controls">
                            <div id="lookup_field_wizard"></div>
                        </div>
                        <div class="controls">
                            <input class="inputwiz" name="address_1" id="address_1" placeholder="Address 1" required="required">
                        </div>

                        <div class="controls">
                            <input class="inputwiz" name="address_2" id="address_2" placeholder="Address 2" required="required">
                        </div>

                        <div class="controls">
                            <input class="inputwiz" name="address_3" id="address_3" placeholder="Address 3" required="required">
                        </div>

                        <div class="controls">
                            <input class="inputwiz" name="city" id="city" placeholder="City" required="required">
                        </div>

                        <div class="controls">
                            <input  class="inputwiz" name="county" id="county" placeholder="County" required="required">
                        </div>

                        <div class="controls">
                            <input  class="inputwiz" name="postcode" id="postcode" placeholder="Postcode" required="required">
                        </div>

                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">

                    </div>
                </section>

                <!---- STEP 2 ----->
                <section class="step centerForm" data-step-title="Details">
                    <div class="control-group">

                        <input type="text" class="inputwiz" name="rent" id="rent" required="required" placeholder="Monthly Rent">

                    </div>
                    <label>Furnished</label>
                    <div class="btn-group" name="furnished" id="furnished" data-toggle="buttons-radio">
                        <button type="button" name="furnished" value="1" class="btn btn-primary btn-large">Furnished</button>
                        <button type="button" name="furnished" value="0" class="btn btn-primary btn-large">Unfurnished</button>
                    </div>
                    <br/><br/>

                    <label>How many Bedrooms?</label>
                    <div class="btn-group" name="bedrooms" id="bedrooms" data-toggle="buttons-radio">
                        <button type="button" name="bedrooms" class="btn btn-primary btn-large" value="1">1</button>
                        <button type="button" name="bedrooms" class="btn btn-primary btn-large" value="2">2</button>
                        <button type="button" name="bedrooms" class="btn btn-primary btn-large" value="3">3</button>
                        <button type="button" name="bedrooms" class="btn btn-primary btn-large" value="4">4</button>
                        <button type="button" name="bedrooms" class="btn btn-primary btn-large" value="5">5+</button>
                    </div>
                    <br />

                </section>

                <!---- STEP 3 ----->
                <section class="step centerForm" data-step-title="Last but not Least..">

                    <label>Does it have Parking?</label>
                    <div class="btn-group" name="parking" id="parking" data-toggle="buttons-radio">
                        <button type="button" name="parking" value="1" class="btn btn-primary btn-large">Yes</button>
                        <button type="button" name="parking" value="0" class="btn btn-primary btn-large">No</button>
                    </div>
                    <br /><br />

                    <label>DHSS Allowed?</label>
                    <div class="btn-group" name="dhss" id="dhss" data-toggle="buttons-radio">
                        <button type="button" name="dhss" value="1" class="btn btn-primary btn-large">Yes</button>
                        <button type="button" name="dhss" value="0" class="btn btn-primary btn-large">No</button>
                    </div>
                    <br /><br />

                    <label>What about an Ensuite?</label>
                    <div class="btn-group" name="ensuite" id="ensuite" data-toggle="buttons-radio">
                        <button type="button" name="ensuite" value="1" class="btn btn-primary btn-large">Yes</button>
                        <button type="button" name="ensuite" value="0" class="btn btn-primary btn-large">No</button>
                    </div>
                    <br /><br />
                    <button type="Submit" class="btn btn-success btn-large">Finish & Add Property</button>


                </section>
            </form>


            <script>
                //easy wizard
                $('#myWizard').easyWizard({
                    submitButton: false,
                    buttonsClass: 'btn btn-default btn-large',
                    submitButtonClass: 'btn btn-info',
                    beforeSubmit: function(wizardObj) {

                        var selectedVal = "";
                        var selected = $("input[type='radio'][name='furnished']:checked");
                        if (selected.length > 0) {
                            selectedVal = selected.val();
                        }


                        $.ajax({
                            url: base_url + 'landlord/wizard_flash',
                            dataType: 'json',
                            type: 'post',
                            contentType: 'application/json',
                            data: JSON.stringify( { "address_1": $('#address_1').val(),
                                                    "address_2": $('#address_2').val(),
                                                    "address_3": $('#address_3').val(),
                                                    "city": $('#city').val(),
                                                    "county": $('#county').val(),
                                                    "postcode": $('#postcode').val(),
                                                    "lat": $('#lat').val(),
                                                    "lng": $('#lng').val(),
                                                    "rent": $('#rent').val(),
                                                    "furnished": selectedVal,
                                                    "bedrooms": $('input[name=bedrooms]:checked', '#myWizard').val(),
                                                    "parking": $("input[name='parking']:checked").val(),
                                                    "dhss": $("input[name='dhss']:checked").val(),
                                                    "ensuite": $("input[name='ensuite']:checked").val()
                            }),
                            processData: false,
                            success: function( data, textStatus, jQxhr ){
                                $('#response pre').html( JSON.stringify( data ) );
                            },
                            error: function( jqXhr, textStatus, errorThrown ){
                                console.log( errorThrown );
                            }
                        });
                    }
                });

                // Add this after your form
                $('#lookup_field_wizard').setupPostcodeLookup({
                    // Add your API key
                    api_key: 'ak_i4tv5axrjLrwaraas6Xle0O8weJwF',
                    // Identify your fields with CSS selectors
                    output_fields: {
                        line_1: '#address_1',
                        line_2: '#address_2',
                        line_3: '#address_3',
                        post_town: '#city',
                        county: '#county',
                        postcode: '#postcode',
                        longitude: '#lng',
                        latitude: '#lat'
                    }
                });
                var base_url = "<?= base_url() ?>";
            </script>



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
                        <li class="<?php echo ($activeTab == "map_search") ? "active" : ""; ?>"><a href="<?=base_url('map_search')?>">Map Search</a>
                        <li class="<?php echo ($activeTab == "blog") ? "active" : ""; ?>"><a href="<?=base_url('blog')?>">Blog</a></li>
                        <li class="<?php echo ($activeTab == "features") ? "active" : ""; ?>"><a href="<?=base_url('features')?>">Features</a></li>
                        <li class="<?php echo ($activeTab == "help") ? "active" : ""; ?>">
                            <a href="<?=base_url('home/help')?>">Help</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class='span3'>
                <div class='header-buttons'>
                    <a href="#" class='add custom-tooltip' title="Start Adding Properties!">Add</a>
                    <a href="#" class='contact custom-tooltip' title='Go to Contact Form'>Messages</a>
                     <a href="#" class='dashboard custom-tooltip' data-toggle="modal" title='Go to Contact Form'>Front Dash</a>

                    <!-- todo: USER MODAL for login -->






                </div>
            </div>
        </section>
    </section>
</header>



