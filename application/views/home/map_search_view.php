<?
/*
  * THIS VIEW IS THE 'MAP SEARCH' SEARCH SECTION, THIS IS NEED TO BE SPOT ON WHEN IT
  * COMES TO SEARCHING AND PROPERLY INTERGRATED WITH GOOGLE MAPS API, SCRIPTS FOR THIS
 * ON THE BOTTOM OF THE FILE
  */

?>
<?// if(isset($map)) { echo $map['js']; } ?>

<section id='page-title'>
    <section class='container'>
        <section class='row'>
            <div class='span6'>
                <h1>Map Search</h1>
                <p>Our own unique Map Search tool with lots of options including Geo Location etc...</p>
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
                        <form action="<?= base_url('map_search/results') ?>" method="post">

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


<!--        <h2>Premium Properties</h2>-->
<!--        <div class='controls'>-->
<!--            <a href="#" class='prev'>Previous</a>-->
<!--            <a href="#" class='next'>Next</a>-->
<!--        </div>-->
        <!---- END ----------------------->

        <!----PREMIUM SLIDER ----------------(REMOVED AS OF 19.02.15------------->

    <!--- End of Tab limiter and sections for premium ---->

        <!----- BANNER SECTION ----->
        <div class="row">
            <br />
            <div class="span6">
                <img src="<?= base_url() ?>/banners/468x60.jpg" alt="ADVERTISING WILL BE HERE SHORTLY, WATCH THIS SPACE!!" >
            </div>

            <div class="span6">
                <img src="<?= base_url() ?>/banners/468x60.jpg" alt="ADVERTISING WILL BE HERE SHORTLY, WATCH THIS SPACE!!" style="float: right;" >
            </div>
        </div>
        <!---- End of Banner Section ---->


        <? // COUNTERS FOR RESULTS
        if (isset($results)) {
            $countarray = count($results);
        }
        ?>



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
                                        <strong>1</strong> - <strong><? if (isset($countarray)) { echo $countarray; } ?></strong> of <strong>DBCALL</strong> results for <strong><? if (isset($search_strings)) { echo $search_strings; } ?></strong> properties
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
<!--                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->

                <!---- SECTION FOR MAP SEARCH ---->
                <div class='location-finder'>
                    <div class='left-side'>

                        <?

                        $artCount = 1; // counter for the article page

                        if (isset($ms_results)) {
                        foreach ($ms_results as $key => $value) {

                            // Switch statements
                            switch ($value['rent_type']) {
                            case 1:
                            $rent_type = "/pm";
                            break;
                            case 2:
                            $rent_type = "/pw";
                            break;
                            case 3:
                            $rent_type = "/pn";
                            break;
                            case 4:
                            $rent_type = "/pp";
                            break;
                            }
                            $artCount++;
                            ?>

                            <div class="map<?=$artCount ?>">
                            <article rel='<?= 1 ?>'>
                                <figure>
                                    <a href="<?= base_url('property/view') . '/' . $value['slug'] ?>"><img src="<? echo base_url() . 'prop_images/' .  $value['thumb_file_name'] ?>" /></a>
                                </figure>
                                <div class='text'>
                                    <h3><?= $value['generic_street_name'] ?></h3>
                                    <p><?= $value['city'] ?></p>
                                    <span class='price'>£<?= (int)$value['rent'] . '<small> ' . $rent_type . '</small>' ?></span>
                                </div>
                            </article>
                            </div>

                            <input type="hidden" name="lat" value="<?= $value['lat'] ?>" >
                            <input type="hidden" name="lng" value="<?= $value['lng'] ?>" >
                            <input type="hidden" id="latlng" name="latlng" value="<?= $value['lat'] . ', ' . $value['lng'] ?>" >

<!---->
<!--                             <script>-->
<!--                                 // FOR THE CLICK SYSTEM-->
<!--                            $( ".map--><?//= $artCount ?><!--" ).click(function() {-->
<!--                                alert( "Handler for .click() called." );-->
<!--                                });-->
<!--                                 //FOR GOOGLE MAPS-->
<!--                                 var map; // Global declaration of the map-->
<!--                                 var lat_longs_map = new Array();-->
<!--                                 var markers_map = new Array();-->
<!--                                 var iw_map;-->
<!--                                 iw_map = new google.maps.InfoWindow();-->
<!--                                 function initialize_map() {-->
<!---->
<!--                                     var myLatlng = new google.maps.LatLng(--><?//= $value['lat'] . ', ' . $value['lng'] ?><!--);-->
<!--                                     var myOptions = {-->
<!--                                         zoom: 13,-->
<!--                                         center: myLatlng,-->
<!--                                         mapTypeId: google.maps.MapTypeId.ROADMAP}-->
<!--                                     map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);-->
<!--                                 }-->
<!---->
<!--                                 function createMarker_map(markerOptions) {-->
<!--                                     var marker = new google.maps.Marker(markerOptions);-->
<!--                                     markers_map.push(marker);-->
<!--                                     lat_longs_map.push(marker.getPosition());-->
<!--                                     return marker;-->
<!--                                 }-->
<!---->
<!--                                 google.maps.event.addDomListener(window, "load", initialize_map);-->
<!--                             </script>-->

                        <? } //end of foreach
                    } // end of isset check  ?>


                    </div>
                    <div class='right-side'>
                        <a href="#" class='button-slider expanded'></a>

                        <!--- google maps ---->
                        <? if (isset($map)) { echo $map['html']; } ?>

                        <!--- Mouse Click Event Listener for Maps ---->


                        <script type="text/javascript">
                            //<![CDATA[



                            //]]>
                        </script>

                    </div>
                </div>
            </section>

            <!----------------- BEGINNING OF REFINE SEARCH ---------------------->
            <aside class='span3'>
                <section class='widget'>
                    <section class='widget-title uppercase'>
                        <div class='inner'>
                            <h2>Refine Search</h2>
                        </div>
                    </section>
                    <section class='widget-content'>
                        <form action="<?= base_url('home/search') ?>" method="post">

                            <div class='widget-section'>
                                <div class='inner'>
                                    <label for="location">KEYWORD</label>
                                    <input type="text" name='location' id='location' class='input-block-level' placeholder="Sherwood Street"/>
                                </div>
                            </div>
                            <div class='widget-section'>
                                <div class='inner'>
                                    <label for="propertyType">Type</label>
                                    <select name="propertyType" id="propertyType" class='btn-block selectpicker'>
                                        <option value="1">Semi Detached</option>
                                        <option value="2">Detached</option>
                                        <option value="3">Flat</option>
                                        <option value="4">Maisonette</option>
                                        <option value="5">Bungalow</option>
                                        <option value="6">Apartment</option>
                                    </select>
                                </div>
                            </div>
                            <div class='widget-section'>
                                <div class='inner'>
                                    <label for="category">Rent Type</label>
                                    <select name="propertyType" id="category" class='btn-block selectpicker'>
                                        <option value="1">Monthly</option>
                                        <option value="2">Weekly</option>
                                        <option value="3">Nightly</option>
                                        <option value="4">In Person</option>
                                    </select>
                                </div>
                            </div>
                            <div class='widget-section first-half'>
                                <div class='inner'>
                                    <label for="minPrice">Min. Price P/M</label>
                                    <select name="propertyType" id="minPrice" class='btn-block selectpicker'>
                                        <option value="all">£300</option>
                                        <option value="all">£400</option>
                                        <option value="all">£500</option>
                                    </select>
                                </div>
                            </div>
                            <div class='widget-section second-half'>
                                <div class='inner'>
                                    <label for="maxPrice">Max. Price P/M</label>
                                    <select name="propertyType" id="maxPrice" class='btn-block selectpicker'>
                                        <option value="all">£1000</option>
                                        <option value="all">£1500</option>
                                        <option value="all">£2000</option>
                                    </select>
                                </div>
                            </div>
                            <div class='widget-section'>
                                <div class='inner'>
                                    <label for="bedrooms">Bedrooms</label>
                                    <select name="propertyType" id="bedrooms" class='btn-block selectpicker'>
                                        <option value="all">1</option>
                                        <option value="all">2</option>
                                        <option value="all">3</option>
                                        <option value="all">4</option>
                                        <option value="all">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class='widget-section'>
                                <div class='inner' style='position: relative;'>
                                    <label for="bedrooms">Has Parking</label>
                                    <select name="propertyType" id="parking" class='btn-block selectpicker'>
                                        <option value="all">Yes</option>
                                        <option value="all">No</option>
                                    </select>
                                </div>
                            </div>
                            <section class='widget-buttons'>
                                <div class='inner'>
                                    <a href='#' class='btn btn-primary btn-large btn-block'>Update</a>
                                </div>
                            </section>
                        </form>
                    </section>
                </section>
                <a href="#" id='clearFilters'>Clear all filters</a>
            </aside>
            <!----------------- END OF REFINE SEARCH ---------------------->

        </section>
    </section>
</section>


<!------------------ SCRIPT FOR GOOGLE MAPS ----------------->
<!--<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
<!--<script>-->
<!--    function initialize() {-->
<!--        var map_canvas = document.getElementById('map_canvas');-->
<!--        var map_options = {-->
<!--            center: new google.maps.LatLng(53.0539097, -0.7789069),-->
<!--            zoom: 8,-->
<!--            mapTypeId: google.maps.MapTypeId.ROADMAP-->
<!--        }-->
<!--        var map = new google.maps.Map(map_canvas, map_options);-->
<!--    }-->
<!--    google.maps.event.addDomListener(window, 'load', initialize);-->
<!--</script>-->
