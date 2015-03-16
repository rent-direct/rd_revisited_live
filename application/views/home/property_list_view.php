<?
/*
  * THIS VIEW IS THE 'MAP SEARCH' SEARCH SECTION, THIS IS NEED TO BE SPOT ON WHEN IT
  * COMES TO SEARCHING AND PROPERLY INTERGRATED WITH GOOGLE MAPS API
  */

?>


<section id='page-title'>
    <section class='container'>
        <section class='row'>
            <div class='span6'>
                <h1>Residential Properties</h1>
                <p>Here are the list of the residential properties that our Landlords have signed up to list....</p>
            </div>
        </section>
    </section>
</section>
<section id='main' role='main'>
<section class='container'>


<!--- TAB SEARCH BAR ---->
<section class='row tab-finder'>
    <div class='span12'>
        <div class="tabbable">

            <ul class="nav nav-tabs">
                <? // THE LONG LETTERING IS MAKING IT LOOK SHIT ON TABLETS ?>
                <li class="active first-tab"><a class="tipped-tab1" href="#tab1" data-toggle="tab">Residential</a></li>
                <li><a href="#" class="tipped-tab2">Commercial</a></li>    <? // data toggle tabs removed ?>
                <li><a href="#" class="tipped-tab3">Property Share</a></li>
                <li><a href="#" class="tipped-tab4">Holiday Lettings</a></li>
                <li><a href="#" class="tipped-tab5">Council Swap</a></li>
            </ul>

            <? // JAMES: THE CSS FOR THE POP UP IS IN ASSETS/CSS/TIPPED-CUSTOM ?>

            <script type="text/javascript">
                var tab1 = "Residential Properties Now Live!";
                var tab2 = "Commercial Properties will be available soon!";
                var tab3 = "Property Share will be available soon!";
                var tab4 = "Holiday Lettings will be available soon!";
                var tab5 = "Council Swap will be available soon!";

                $(document).ready(function() {
                    Tipped.create('.tipped-tab1', tab1, { size: 'huge' });
                    Tipped.create('.tipped-tab2', tab2, { size: 'huge' });
                    Tipped.create('.tipped-tab3', tab3, { size: 'huge' });
                    Tipped.create('.tipped-tab4', tab4, { size: 'huge' });
                    Tipped.create('.tipped-tab5', tab5, { size: 'huge' });
                });
            </script>

            <div class="tab-content">

                <!--- Residential Prop Share --->
                <div class="tab-pane active" id="tab1">
                    <div class="row"  >
                        <br />
                        <form action="<?= base_url('property/search_map') ?>" method="post">

                            <div class="span8">
                                <div class="form-horizontal" id="town_search_field">

                                    <input type="text" style="margin-left:60px; text-align: left" name="keyword" id="residential_town" value="" autocomplete="off"
                                           placeholder="e.g. Nottingham, Sheffield, Street Name....." class="town form-control span7"/>
                                    <div class="town_search_results"></div>
                                </div>
                            </div>


                            <div class="pull-right">
                                <button style="margin-left:60px" type="submit" class='btn btn-primary search-property'><i class="icon-search icon-white"></i> Search Property</button>
                            </div>

                            <br />
                            <br />

                    </div>

                    <!------------- NEXT ROW ---------------->
                    <style>
                        .form-control {
                            text-align: center;
                            font-weight: bold;

                        }

                        .slider_output {
                            font-weight: bold;
                            font-size: 40;
                        }


                    </style>

                    <div class="row">

                        <div class="span4">
                            <div class="form-horizontal">

                                <label style="margin-left:60px" for="amount">Rent (per month)</label>
                                <input style="margin-left:60px" id="slider_output_amount" class="form-control slider_output" name="rent" type="text" value="" readonly="readonly">
                                <div class="price_slider" class="slider_output_box"></div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="form-horizontal">

                                <label style="margin-left:60px" for="bedrooms">Minimum number of bedrooms</label>
                                <input style="margin-left:60px" id="number_bedrooms" class="form-control slider_output" type="text" name="bedrooms" value="2" readonly="readonly">
                                <div id="bedrooms_slider"></div>

                            </div>

                        </div>

                        <div class="span4">
                            <div class="form-horizontal">

                                <label style="margin-left:60px" for="amount">Minimum number of bathrooms</label>
                                <input style="margin-left:60px" id="number_bathrooms" class="form-control slider_output amount" type="text" name="bathrooms" value="1" readonly="readonly">
                                <div class="price_slider" class="slider_output_box"></div>

                            </div>
                        </div>
                    </div>

                    <!------------- NEXT ROW //// MORE OPTIONS---------------->
                    <div class="row">

                        <style>
                            /** CSS FOR SLIDERS **/
                            #ex1Slider .slider-selection {
                                background: #BABABA;
                            }
                            .slideContain {
                                margin-left: 60px;
                            }

                        </style>

                        <div class="span4">
                            <br />
                            <div class="slideContain">

                                <b>£100</b><input id="ex1" type="text" class="span2" value="" data-slider-min="100" data-slider-max="5000" data-slider-step="5" data-slider-value="[250,450]"/><b>£5000</b>
                            </div>
                            <br />
                        </div>


                        <div class="span4">
                            <br />
                            <div class="slideContain">
                                <input id="ex2" data-slider-id='ex2Slider' type="text" data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="2"/>
                            </div>
                            <br />
                        </div>


                        <div class="span4">
                            <br />
                            <div class="slideContain">
                                <input id="ex3" data-slider-id='ex3Slider' type="text" data-slider-min="0" data-slider-max="3" data-slider-step="1" data-slider-value="1"/>
                            </div>
                            <br />
                        </div>

                        <!---- End row ---->
                    </div>
                    <div class="row">
                        <br />

                    </div>


                    <script>
                        $(document).ready(function() {
                            $("#ex1").slider();
                            $("#ex1").on("slide", function(slideEvt) {
                                $("#slider_output_amount").val(slideEvt.value);
                            });

                            $("#ex2").slider();
                            $("#ex2").on("slide", function(slideEvt) {
                                $("#number_bedrooms").val(slideEvt.value);
                            });

                            $("#ex3").slider();
                            $("#ex3").on("slide", function(slideEvt) {
                                $("#number_bathrooms").val(slideEvt.value);
                            });
                        });
                    </script>

                    </form>
                    <!--- End of tab content ---->
                </div>
            </div>
        </div>
    </div>
</section>
<!--- END SEARCH BAR ---->

<!---- PREMIUM ITEMS HEADER ----->
<section class='row featured-items'>
    <div class='span12'>
        <h5>  <?
            // get flashdata
            $success = $this->session->flashdata('success');

            if ($success) {
                echo ('<div class="alert alert-success">' . '<strong>Thank you</strong> for signing up with Rent Direct, please login to continue where you will be able to access to the user dashboard.' . '</div><br />');
            }
            ?></h5>

        <? // contacted us success ?>
        <h5>
            <?
            // get flashdata
            $success_contacted = $this->session->flashdata('success_contacted');

            if ($success_contacted) {
                echo '<div class="alert alert-success">' . $success_contacted . '</div><br />';
            }
            ?>
        </h5>
        <h5>
            <?
            // get flashdata
            $login_error = $this->session->flashdata('message');

            if ($login_error) {
                echo '<div class="alert alert-success">' . $login_error. '</div><br />';
            }
            ?>
        </h5>


        <h2>Premium Properties</h2>
        <div class='controls'>
            <a href="#" class='prev'>Previous</a>
            <a href="#" class='next'>Next</a>
        </div>
        <!---- END ----------------------->

        <!----PREMIUM SLIDER ------------->
        <div class='featured-items-slider'>
            <ul class='slides'>

                <!---- NEXT ROW ----->

                <?
                //       set limiter
                $count = 0;

                foreach ($premium_properties as $key => $value) {

                    switch ($value['rent_type']) {
                        case 1:
                            $rent_type = "/per month";
                            break;
                        case 2:
                            $rent_type = "/per week";
                            break;
                        case 3:
                            $rent_type = "/per night";
                            break;
                        case 4:
                            $rent_type = "/per person";
                            break;
                    }
                    switch ($value['pets_allowed']) {
                        case 0:
                            $pets = "No Pets";
                            break;
                        case 1:
                            $pets = "Pets";
                            break;
                    }
                    switch ($value['country']) {

                        case 1:
                            $country = "England";
                            break;
                        case 2:
                            $country = "Scotland";
                            break;
                        case 3:
                            $country = "Wales";
                            break;
                        case 4:
                            $country = "Northen Ireland";
                            break;
                        case 5:
                            $country = "Isle of Man";
                            break;
                    }
                    switch ($value['sub_type_id']) {

                        case 1:
                            $prop_type = "Semi-Detached";
                            break;
                        case 2:
                            $prop_type = "Detached";
                            break;
                        case 3:
                            $prop_type = "Flat";
                            break;
                        case 4:
                            $prop_type = "Maisonette";
                            break;
                        case 5:
                            $prop_type = "Bungalow";
                            break;
                        case 6:
                            $prop_type = "Apartment";
                            break;
                    }
                    switch ($value['has_parking']) {
                        case 0:
                            $parking = "";
                            break;
                        case 1:
                            $parking = '+ <i class="fa fa-car"></i>';
                            break;
                    }

                    if ($count == 0) { echo "<li><div class='row'>"; }

                    echo "<div class='span3 featured-item-wrapper'>
            <div class='featured-item'>
            <div class='top'>
                <div class='inner-border'>
                        <div class='inner-padding'>
                                <figure>"; //end of echo

                    echo ('<a href="' . base_url('property/view') .'/'. $value['slug'] . '" >'); //START OF ANCHOR HYPERLINK
                    echo ('<img src="' . base_url() . 'prop_images/' . $value['main_image'] . '" alt="" />');
                    echo ('</a>'); // END OF ANCHOR HYPERLINK

                    echo (' <div class="banner">' . $pets . '</div> ');
                    echo('<a href="' . site_url('property/view/' . $value['slug']) .  '" class="figure-hover">Zoom</a>');
                    echo "</figure>";
                    echo ('<h3><a href="' . site_url('property/view/' . $value['slug']) . '">' . $value['bedrooms'] . ' bed ' . $prop_type . '</a></h3>');
                    echo ('<p>' . $value['city'] . '</p>');
                    echo "</div>";
                    echo "</div>";
                    echo "<i class='bubble'></i>";
                    echo "</div>";
                    echo "<div class='bottom'>
                    <div class='inner-border'>
                        <div class='inner-padding'>";
                    echo ('<p>'. $value['bedrooms'] . ' <i class="fa fa-bed"></i> ' . ' + ' . $value['bathrooms'] . ' <i class="fa fa-tint"></i> ' . $parking . '</p>');
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='price-wrapper'>";
                    echo ('<div class="price">' . '£' . (int)$value['rent'] . '&nbsp;' . '</div>');
                    echo ('<div class="rate">' . $rent_type . '</div>');
                    echo "</div>";
                    echo "</div>";

                    // Page count limiter
                    if ($count == 3) {
                        // echo ($count);
                        echo ('</div></li>');
                        $count = 0;
                        //continue;
                    } else {
                        $count++;
                    }

                } ?>



            </ul>
        </div>
    </div>
    <!--- End of Tab limiter and sections for premium ---->



<i class='content-bubble'></i>
</section>
</section>
</section>
<section id='content'>
<section class='container'>
<section class='row featured-items'>
<section class='span9'>
<div class='row'>
    <div class='span9'>
        <div class='top-bar'>
            <div class='bar-title'>
                <div class='inner'>
                    <div class='pull-left custom-margin'>
                        <strong>1</strong> - <strong>9</strong> of <strong>1,075</strong> results for <strong>Oxford</strong> property <strong>For Sale</strong>
                    </div>

                    <? // TODO: RESULTS PER PAGE - MAP LIST VIEW ?>
                    <? /*
                    <div class='pull-right results-per-page custom-margin'>
                        <span class='text-line'>Results per page:</span>
                        <ul>
                            <li class='active'><a href="#">9</a></li>
                            <li>|</li>
                            <li><a href="#">18</a></li>
                            <li>|</li>
                            <li><a href="#">27</a></li>
                        </ul>
                    </div>
                    */?>

                </div>
            </div>
            <div class='bar-bottom'>
                <div class='inner'>
                    <div class='pull-left custom-margin'>
                        <span class='text-line'>Sort by:</span>
                        <select class='selectpicker'>
                            <option value="relevance">Relevance</option>
                            <option value="date">Date</option>
                        </select>
                    </div>

                    <? // TODO: GRID LIST OPTIONS FOR MAP VIEW SEARCH ?>
                    <? /*
                    <div class='pull-right view-type custom-margin'>
                        <span class='text-line'>View:</span>
                        <ul>
                            <li><a href="search-grid.html" class='grid'>Grid</a></li>
                            <li><a href="search-list.html" class='list'>List</a></li>
                            <li class='last-element active'><a href="search-location.html" class='location'>Location</a></li>
                        </ul>
                    </div>
                    */  ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!---- SECTION FOR MAP SEARCH ---->
<div class='location-finder'>
    <div class='left-side'>

 <?       foreach ($ms_results as $key => $value) { ?>

        <article rel='1'>
            <figure>
                <img src="<? echo base_url() ?>assets/img/photos/4834194361_85d5c4a5e0_b.jpg" alt="" />
            </figure>
            <div class='text'>
                <h3>161 E 110th St</h3>
                <p>Los Angeles, C</p>
                <span class='price'>$95,000</span>
            </div>
        </article>

<? } ?>
        <article rel='2'>
            <figure>
                <img src="<? echo base_url() ?>assets/img/photos/4834197589_84d75a42bd_b.jpg" alt="" />
            </figure>
            <div class='text'>
                <h3>East 61st Street</h3>
                <p>Los Angeles, C</p>
                <span class='price'>$123,000</span>
            </div>
        </article>


        <article rel='3'>
            <figure>
                <img src="<? echo base_url() ?>assets/img/photos/4834201025_e7f66118eb_b.jpg" alt="" />
            </figure>
            <div class='text'>
                <h3>300 Riverside</h3>
                <p>Los Angeles, C</p>
                <span class='price'>$156,000</span>
            </div>
        </article>

    </div>
    <div class='right-side'>
        <a href="#" class='button-slider expanded'></a>
        <div id="map_canvas"></div>
    </div>
</div>
</section>
<aside class='span3'>
    <section class='widget'>
        <section class='widget-title uppercase'>
            <div class='inner'>
                <h2>Refine Search</h2>
            </div>
        </section>
        <section class='widget-content'>
            <form action="">
                <div class='widget-section'>
                    <div class='inner'>
                        <label for="location">Location</label>
                        <input type="text" name='location' id='location' class='input-block-level' value='Oxford'/>
                    </div>
                </div>
                <div class='widget-section'>
                    <div class='inner'>
                        <label for="propertyType">Property Type</label>
                        <select name="propertyType" id="propertyType" class='btn-block selectpicker'>
                            <option value="all">All</option>
                            <option value="all">Mansion</option>
                            <option value="all">Apartment</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section'>
                    <div class='inner'>
                        <label for="category">Category</label>
                        <select name="propertyType" id="category" class='btn-block selectpicker'>
                            <option value="all">For Sale</option>
                            <option value="all">For Rent</option>
                            <option value="all">Forclosures</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section first-half'>
                    <div class='inner'>
                        <label for="minPrice">Min. Price</label>
                        <select name="propertyType" id="minPrice" class='btn-block selectpicker'>
                            <option value="all">$17K</option>
                            <option value="all">$27K</option>
                            <option value="all">$37K</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section second-half'>
                    <div class='inner'>
                        <label for="maxPrice">Max. Price</label>
                        <select name="propertyType" id="maxPrice" class='btn-block selectpicker'>
                            <option value="all">$999K</option>
                            <option value="all">$899K</option>
                            <option value="all">$799K</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section'>
                    <div class='inner'>
                        <label for="bedrooms">Bedrooms</label>
                        <select name="propertyType" id="bedrooms" class='btn-block selectpicker'>
                            <option value="all">3</option>
                            <option value="all">2</option>
                            <option value="all">4</option>
                            <option value="all">5</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section'>
                    <div class='inner' style='position: relative;'>
                        <label for="size">Size</label>
                        <input type="text" name='size' id='size' class='input-block-level' value='500'/>
                        <span class='measure-type'>sqft</span>
                    </div>
                </div>
                <div class='widget-section'>
                    <div class='inner'>
                        <label for='range'>Slide Example</label>
                        <input type="text" name='size' id='range' class='input-block-level range-example'/>
                    </div>
                </div>
                <section class='widget-buttons'>
                    <div class='inner'>
                        <a href="#" class='more-options'>More Options</a> <br />
                        <a href='#' class='btn btn-primary btn-large btn-block'>Update</a>
                    </div>
                </section>
            </form>
        </section>
    </section>
    <a href="#" id='clearFilters'>Clear all filters</a>
</aside>
</section>
</section>
</section>


<!------------------ SCRIPT FOR GOOGLE MAPS ----------------->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
    function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
            center: new google.maps.LatLng(53.0539097, -0.7789069),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
