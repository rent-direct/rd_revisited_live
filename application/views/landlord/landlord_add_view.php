<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Property - Dashboard Version</h1>
    </div>



<div class="row">
<div class="col-md-5">

<!--- VALIDATE ERRORS ---->
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <strong>Warning</strong> <?php echo validation_errors(); ?>
</div>
<!--- End of Validation --->


<form role="form" method="post" action="<? echo base_url('landlord/add') ?>" enctype="multipart/form-data">

<p>TODO: AUTOGEN lastupdated, pLast_updated - ON EDIT FORM</p>

<br/>

<!--- HIDDEN FIELDS FOR USER ID ETC... ----->
<input type="hidden" name="user_id" value="<? ?>">
<input type="hidden" name="prop_id">

<!------------------------------------------------>
<label>Category</label>
<select class="form-control" name="type_id" disabled>
    <option value="1">Residential</option>
    <option value="2">Commercial</option>
    <option value="3">Rooms / Property Share</option>
    <option value="4">Holiday Lets</option>
</select>

<p class="help-block">Residential only available for now but more options will be coming soon to Rent Direct. Watch this
    space!</p>
<br/>
<!------------------------------------------------>
<label>Type</label>
<select class="form-control" name="sub_type_id">
    <option value="1">Semi Detached</option>
    <option value="2">Detached</option>
    <option value="3">Flat</option>
    <option value="4">Maisonette</option>
    <option value="5">Bungalow</option>
    <option value="6">Apartment</option>
</select>
<br/>
<!------------------------------------------------>
<label>Number of Bedrooms</label>
<select class="form-control" name="bedrooms">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5+</option>
</select>
<br/>
<!------------------------------------------------>
<label>Number of Bathrooms</label>
<select class="form-control" name="bathrooms">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
</select>
<br/>


<!------------------------------------------------>

<div class="form-group">
    <label>Furnished</label>

    <div class="radio">
        <label>
            <input type="radio" name="furnished" id="furnished" value="0" checked>No
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="furnished" id="furnished" value="1">Yes
        </label>
    </div>
</div>
<br/>


<!------------------------------------------------>
<div class="form-group">
    <label>Ensuite</label>

    <div class="radio">
        <label>
            <input type="radio" name="ensuite" id="ensuite" value="0" checked>No
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="ensuite" id="ensuite" value="1">Yes
        </label>
    </div>
</div>
<br/>


<!------------------------------------------------>
<div class="form-group">
    <label>Smoking Allowed</label>

    <div class="radio">
        <label>
            <input type="radio" name="smoking_allowed" id="smoking_allowed" value="No" checked>No
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="smoking_allowed" id="smoking_allowed" value="Yes">Yes
        </label>
    </div>
</div>
<br/>
<!------------------------------------------------>
<div class="form-group">
    <label>Has Parking?</label>

    <div class="radio">
        <label>
            <input type="radio" name="has_parking" id="has_parking" value="0" checked>No
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="has_parking" id="has_parking" value="1">Yes
        </label>
    </div>
</div>
<br/>


<!------------------------------------------------>
<label>Details of the parking....</label>
<input class="form-control" name="parking" id="parking">

<p class="help-block">Enter details about parking here</p>
<br/>
<!------------------------------------------------>
<label>How many floors</label>
<select class="form-control" name="floors">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
</select>
<br/>




<!------------------------------------------------>

    <h2>Financial Details</h2>

    <div class="form-group has-warning">
        <label>Rent Type</label>
        <select class="form-control" name="rent_type">
            <option value="1">Monthly</option>
            <? // TODO: COMMENTED OUT BECAUSE WE ARE ON RESIDENTIAL PROPS ?>
<!--            <option value="2">Weekly</option>-->
<!--            <option value="3">Nightly</option>-->
<!--            <option value="4">In Person</option>-->
        </select>
        <br/>
        <!------------------------------------------------>
        <label>Rent</label>

        <div class="form-group input-group">
            <span class="input-group-addon">£</span>
            <input type="text" class="form-control" name="rent" id="rent" required="required">
        </div>
        <br/>
        <!------------------------------------------------>
        <label>Bond</label>

        <div class="form-group input-group">
            <span class="input-group-addon">£</span>
            <input type="text" class="form-control" name="bond" id="bond" required="required">
        </div>
        <br/>
    </div>

    <!------------------------------------------------>
    <label>Additional Fees</label>
    <input class="form-control" name="additional_fees" id="additional_fees">

    <p class="help-block">Enter any details regarding additional fees to make clear to the client</p>
    <br/>

    <label>Market Status</label>
    <select class="form-control" name="market_status">
        <option value="1">Let</option>
        <option value="2">To Let</option>
        <option value="3">Under Contract</option>
    </select>
    <br/>

    <div class="form-group">
        <label>DHSS Allowed</label>

        <div class="radio">
            <label>
                <input type="radio" name="dhss_allowed" id="dhss_allowed" value="0" checked>No
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="dhss_allowed" id="dhss_allowed" value="1">Yes
            </label>
        </div>
    </div>
    <br/>

<!------------------------------------------------>
<br/>

<!--->
<p><label>Date Available</label></p>
<div class="form-group">
    <div class='input-group date' id='datetimepicker1'>
        <input type='text' class="form-control" name="date_available" readonly="true"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>
<!--->

<br/>
<br/>
<br/>

<!------------------------------------------------>

<div class="form-group">
    <label>Detailed Description</label>
    <textarea class="form-control" rows="15" name="description" id="description" required="required"></textarea>

    <p class="help-block">Odd bits still need work? Close to the shop? Railway tracks in the backyard?!</p>
</div>




<!--- Splitters --->
</div>
<div class="col-md-5">
<!--- End Splitters --->

    <!------------------------------------------------>
    <h3>Location Details</h3>
    <br/>


    <label>Interior Features</label>
    <input class="form-control" name="interior_features" id="interior_features">

    <p class="help-block">Nice antique style wallpaper?</p>
    <br/>

    <label>Outdoor Features</label>
    <input class="form-control" name="outdoor_features" id="outdoor_features">

    <p class="help-block">Brand new Garden Hose? Swimming Pool?</p>
    <br/>

    <label>Kitchen Features</label>
    <input class="form-control" name="kitchen_features" id="kitchen_features">

    <p class="help-block">Furnished as mentioned above so we have a kettle....</p>
    <br/>

    <label>Views</label>
    <input class="form-control" name="views" id="views">

    <p class="help-block">Great hillside view!</p>
    <br/>

    <label>Distances</label>
    <input class="form-control" name="distances" id="distances">

    <p class="help-block">Not far from the supermarket, opposite a Police Station</p>
    <br/>

<!------------------------------------------------>

    <? // TODO: MAYBE MOVE THE GENERIC STREET TITLE BELOW INPUT 'FIND MY ADDRESS' ?>

    <div class="form-group has-warning">
        <label>Generic Street Title (15 Characters max)</label>
        <input class="form-control" name="generic_street_name" id="generic_street_name" required="required">

        <p class="help-block">Please input the street name only, obviously we wouldn't want to show the tenants the
            number of the street so we use this for our autogenerated title for url links. Use our postcode finder below
            and you should have the street name you need on 'Address 1'.</p>
    </div>
    <br/>


    <h5>Use our Postcode Address finder to look up the address</h5>

    <div id="lookup_field"></div>
    <br/>
    <br/>
    <label>Address 1</label>
    <input class="form-control" name="address_1" id="address_1" required="required">
    <br/>

    <label>Address 2</label>
    <input class="form-control" name="address_2" id="address_2">
    <br/>

    <label>Address 3</label>
    <input class="form-control" name="address_3" id="address_3">
    <br/>

    <label>City/Town</label>
    <input class="form-control" name="city" id="city" required="required">
    <br/>

    <label>County</label>
    <input class="form-control" name="county" id="county" required="required">
    <br/>

    <label>Postcode</label>
    <input class="form-control" name="postcode" id="postcode" required="required">
    <br/>

    <label>Country</label>
    <select class="form-control" name="country" id="country">
        <option value="1">England</option>
        <option value="2">Scotland</option>
        <option value="3">Wales</option>
        <option value="4">Northern Ireland</option>
        <option value="5">Isle of Man</option>
    </select>
    <br/>

    <!------hidden fields for long lat --->
    <input type="hidden" name="lat" id="lat">
    <input type="hidden" name="lng" id="lng">
    <br/>
    <!------------------------------------>

    <br/>
    <br/>
    <br/>
    <script>
        // Add this after your form
        $('#lookup_field').setupPostcodeLookup({
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
            },
            button_class: 'btn btn-default btn-lg ',
            input_class: 'form-control'

        });
    </script>

<!------------------------------------------------>

<label>Video URL</label>
<input class="form-control" name="external_video_url" id="external_video_url">

<p class="help-block">We'll be adding more hosting features soon so please Paste a link here from any videos you have
    hosted online</p>

    <br/>
    <br/>
    <br/>


<div class="panel">
    <div class="form-group">
        <label>Terms & Conditions</label>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="confirm_1" name="confirmations" id="confirmations">I confirm that all of
                the details? I have entered for this property /
                room listing are accurate.
            </label>
        </div>
        <br/>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="confirm_2" name="confirmations" id="confirmations">I confirm that any
                descriptions? I have entered for this property / room
                listing are true and accurately describe the property / room as it is at this time.
            </label>
        </div>
        <br/>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="confirm_3" name="confirmations" id="confirmations">I confirm that any
                photographs I have uploaded for this property / room
                listing are of that property, were taken recently, and show the property / room as it is at this time.
            </label>
        </div>
        <br/>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="confirm_4" name="confirmations" id="confirmations">I confirm that any
                floor plans, EPCs or brochures I have uploaded for
                this property / room listing are for the property I am listing.
            </label>
        </div>
        <br/>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="confirm_5" name="confirmations" id="confirmations">I confirm that all
                financial information?
                The information that you provided in the 'finance' section of this form. For example, if you require a
                higher bond or additional up-front fee for tenants that are smokers or have pets, you must clearly state
                this in the finance section.
                I have entered for the property / room listing is accurate.
            </label>
        </div>



    <br/>
    <p><label>Did you agree to all terms and conditions?</label></p>


        <div class="checkbox">
            <label>
                <input type="checkbox" value="confirm_5" name="confirmations_final" id="confirmations_final">
                I Agree
            </label>
        </div>


    <button type="submit" id="Submit" class="btn btn-info" disabled>Save & Upload Image</button>
    <br/>
    <br/>
    </div>

    <script>//Validation Script

        $("#confirmations_final").click(function() {
            var checked_status = this.checked;
            if (checked_status == true) {
                $("#Submit").removeAttr("disabled");
            } else {
                $("#Submit").attr("disabled", "disabled");
            }
        });

    </script>

    <!--- End of Form --->
</form>


</div>
</div>
<!-- /.col-lg-6 (nested) -->
</div>
<!-- /.row (nested) -->
</div>
<!-- /.panel-body -->
