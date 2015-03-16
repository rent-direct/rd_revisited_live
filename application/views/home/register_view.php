<?
// retrieve the flash the data

$email = $this->session->flashdata('email');
$type_id = $this->session->flashdata('type_id');
$password = $this->session->flashdata('password');
$password_confirm = $this->session->flashdata('password_confirm');

?>




<style>
    .warning_error
    {
        text-color: red;
        font: "Arial Black", arial-black;
        font-weight: bold;
    }
</style>
<section id='page-title' class='small-height'>
    <section class='container'>
        <section class='row'>
            <div class='span8'>
                <h1>Sign up Today!</h1>
                <p>Sign up today as a tenant, landlord or advertiser!</p>
            </div>
        </section>
    </section>
</section>

<!----- Register Marketing Stats ------>
<section id='content' class='alternate-bg'>
    <section class='container'>
        <section class='row featured-items'>
            <div class='span12'>
                <div class='stats5'>
                    <div class='stats-box'>
                        <div class='inner'>
                            <span class='number'>708</span>
                            <span class='text'>Landlords</span>
                        </div>
                    </div>
                    <div class='stats-box'>
                        <div class='inner'>
                            <span class='number'>300</span>
                            <span class='text'>Advertisers</span>
                        </div>
                    </div>
                    <div class='stats-box'>
                        <div class='inner'>
                            <span class='number'>7016</span>
                            <span class='text'>Tenants</span>
                        </div>
                    </div>
                    <div class='stats-box'>
                        <div class='inner'>
                            <span class='number'>73</span>
                            <span class='text'>Searches per hour</span>
                        </div>
                    </div>
                    <div class='stats-box'>
                        <div class='inner'>
                            <span class='number'>90</span>
                            <span class='text'>Months of Activity</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
<!---- End of marketing stats ---->


<div class='span12'>
    <div class="hero-unit">
        <!--- Sign up Form Title ---->
        <form action="<? echo base_url('register') ?>" method="post" >
        <h1>Enter all the information correctly and choose the account type</h1>
            <div class="warning_error"> <strong> <p><?php echo validation_errors(); ?></p></strong></div>

<!---- Fields ----->
    <div class="row-fluid">
        <div class="span4">
            <div class="control-group">
                <label class="control-label" for="inputIcon">Email address</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input class="span10" id="inputIcon" pattern="^([_A-z0-9]){3,}$" type="text" name="email" value="<? if (isset($email)) {
                            echo($email);
                        } else {
                            echo('');
                        } ?>" required="required">
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputIcon">Confirm Email address</label>
                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input class="span10" id="inputIcon" pattern="^([_A-z0-9]){3,}$" type="text" name="confirm_email" value="<? if (isset($email)) {
                            echo($email);
                        } else {
                            echo('');
                        } ?>" required="required">
                    </div>
                </div>
            </div>
        <label>First Name</label>
        <input type="text" placeholder="" name="first_name" required="required">
        <label>Middle Name</label>
        <input type="text" placeholder="" name="middle_name">
        <label>Last Name</label>
        <input type="text" placeholder="" name="last_name" required="required">

            <label>Country</label>
            <select name="country">
            <option value="England">England</option>
            <option value="Scotland">Scotland</option>
            <option value="Wales">Wales</option>
            <option value="Northern Ireland">Northern Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            </select>

            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
        </div>

        <div class="span4">
            <!-- Add a div to house your
             postcode input field -->
            <div id="lookup_field"><br /></div>
            <br />

            <!-- This is your existing form -->
            <input id="first_line" type="text" placeholder="Address Line One" class="form-control" name="address_1" required="required">
            <br />
            <input id="second_line" type="text" placeholder="Address Line Two" class="form-control" name="address_2" >
            <br />
            <input id="third_line" type="text" placeholder="Address Line Three" class="form-control" name="address_3">
            <br />
            <input id="post_town" type="text" placeholder="Post Town" class="form-control" name="city" required="required">
            <br />
            <input id="county" type="text" placeholder="County" class="form-control" name="county" required="required">
            <br />
            <input id="postcode" type="text" placeholder="Postcode" class="form-control" name="postcode" required="required">
            <br />
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
                        county: '#county',
                        postcode: '#postcode'
                    },
                    button_class: 'btn btn-warning',
                    input_class: 'form-control',
                    dropdown_class: 'dropdown'
                });
            </script>
            <br />

            <label class="radio">
                <input type="radio" name="type_id" id="type_id" value="3" <? if ((int)$type_id == 3) {
                    echo $chkT = 'checked';
                } else {
                    echo $chkT = '';
                } ?>>
                Sign up as a <strong>TENANT</strong> and keep track of property viewings and search results <strong>FREE!</strong>
            </label>

            <br />


            <label class="radio">
                <input type="radio" name="type_id" id="type_id" value="2" <? if ((int)$type_id == 2) {
                    echo $chkL = 'checked';
                } else {
                    echo $chkL = '';
                } ?>>
                Sign up as a <strong>LANDLORD</strong> and start listing your properties from draft to live to even featured! <strong>FREE!</strong>
            </label>

            <br />


            <label class="radio">
                <!--- Advertiser Option disabled for now --->
                <input type="radio" name="type_id" id="type_id" value="4" disabled <? if ((int)$type_id == 4) {
                    echo $chkA = 'checked';
                } else {
                    echo $chkA = '';
                }?>>
                <div class="comingsoon" style="text-color: grey;">
                Be an <strong>ADVERTISER</strong> on Rent Direct with unbeatable package offers and make the most out our traffic - <strong>COMING SOON</strong>
            </label></div>
        </div>

       <div class="span4">
           <label>Company</label>
           <input type="text" placeholder="Optional" name="company">
           <label>Phone</label>
           <input type="text" placeholder="Required" name="phone" required="required">
           <br />
           <br />
           <br />
           <label>Password</label>
           <input type="password" placeholder="" name="password" value="<? if (isset($password)) {
               echo($password);
           } else {
               echo('');
           } ?>" required="required" data-minlength="8">
           <span class="help-block">Minimum of 8 characters</span>
           <label>Confirm</label>
           <input type="password" placeholder="" name="password_confirm" value="<? if (isset($password_confirm)) {
               echo($password_confirm);
           } else {
               echo('');
           } ?>" required="required"  data-minlength="8">
           <br />
           <br />
       </div>

    </div>
             <br />
             <br />
             <input type="radio" name="agreed_on_terms" id="a_SignatureOption" value="Yes" style="vertical-align: middle; margin: 0px;">
             <strong>I agree on the Terms and Conditions</strong>
             <br />
             <br />
    <div class="span11 pull-left">
             <button type="submit" id="butn" class="btn btn-primary" disabled>Register</button>
        </div>
            <script>
                $(document).ready(function() {
                    //This will check the status of radio button onload
                    $('input[id=a_SignatureOption]:checked').each(function() {
                        $("#butn").attr('disabled',false);
                    });

                    //This will check the status of radio button onclick
                    $('input[id=a_SignatureOption]').click(function() {
                        $("#butn").attr('disabled',false);
                    });
                });
            </script>
        </p>
        </form>

    </div>
</div>

