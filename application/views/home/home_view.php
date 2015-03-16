<?
/*
 * THIS IS THE 'MAIN' FRONT PAGE OF RENT DIRECT, EVERYTHING HERE IS THE MOST IMPORTANT
 * PART OF THE BUSINESS, IT MUST BE KEPT AS CLEAN AS POSSIBLE WHEN IT COMES TO CODE
 * ANY CHANGES MUST BE FIRST TALKED ABOUT BEFORE ACTUALLY DOING THEM WITH EITHER
 * JAMES OR SENIOR CODERS, CHEERS!
 *
 * 13.02.15 --- TO GET THE SEARCH TABS BACK FOR COMMERCIAL, YOU NEED TO SET DATA-TOOGLE TAB
 * REFER TO THE OLD TEMPLATES TO GATHER THE CODE BACK FOR THE SEARCH FEATURES
 *
 */
?>

<section id='homepage-slider'>
    <div class='controls-wrapper'>
        <section class='container'>
            <section class='row'>
                <div class='controls hidden-phone'>
                    <a href="#" class='prev'>Previous</a>
                    <a href="#" class='next'>Next</a>
                </div>
            </section>
        </section>
    </div>

<!------------------------------------------------------ HEADLINER SECTION START ------------------------------------>
    <section class='slider-wrapper'>
        <div class='homepage-slider hidden-phone'>
            <ul class='slides'>

                <!--- Php code temp line start --->
                <?
                $page = 1;
                $count = 1;

                foreach ($headliner_properties as $key => $value) {
                switch ($value['rent_type']) {
                    case 1:
                        $rent_type = "per month";
                        break;
                    case 2:
                        $rent_type = "per week";
                        break;
                    case 3:
                        $rent_type = "per night";
                        break;
                    case 4:
                        $rent_type = "per person";
                        break;
                }
                    switch ($value['sub_type_id']) {

                        case 1:
                            $prop_type = "SEMI-DETACHED";
                            break;
                        case 2:
                            $prop_type = "DETACHED";
                            break;
                        case 3:
                            $prop_type = "FLAT";
                            break;
                        case 4:
                            $prop_type = "MAISONETTE";
                            break;
                        case 5:
                            $prop_type = "BUNGALOW";
                            break;
                        case 6:
                            $prop_type = "APARTMENT";
                            break;
                    }


                //create a mini title for headliners
                $miniTitle = $value['bedrooms'] . ' BED ' . $prop_type . ' IN ' . strtoupper($value['city']);
                ?>
                    <li>
                            <img src="<?= base_url() ?>prop_images/headliners/<?=$value['headliner_file_name']?>" alt="" class='bg-image'/>
                            <div class='container'>
                                <div class='row'>
                                    <div class='span12'>

                                        <div class='description'>
                                            <div class='left'>
                                                <div class='title'>
                                                    <div class='big'><a href="<?= site_url('property/view/' . $value['slug']) ?>"><?= $miniTitle ?></a></div>
                                                    <div class='small'><?=$value['city'] ?></div>
                                                </div>
                                                <div class='rooms'><?= $value['bedrooms'] . ' Bedrooms + ' . $value['bathrooms'] . ' Bathrooms' ?> </div>
                                            </div>
                                            <div class='right'>
                                                <div class='price'>
                                                    <div class='number'> £<?= (int)$value['rent'] ?> </div>
                                                    <div class='rate'> <?= $rent_type ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
<?

                }
                ?>


                <!-- headliner limiter end --->
            </ul>

        </div>
    </section>
    <!---- END HEADLINER SECTION ----->


</section>


<section id='main' role='main'>
<section class='container'>

<!---------------------------------- TAB SEARCH BAR ------------------------------------------>
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
       <form action="<?= base_url('home/search') ?>" method="get">

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
                                <label style="margin-left:60px" for="amount">Max Rent (Per Month)</label>
                                <input style="margin-left:60px" id="slider_output_amount" class="form-control slider_output" name="rent" type="text" value="1500" readonly="readonly">
                                <div class="price_slider" class="slider_output_box"></div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="form-horizontal">

                                <label style="margin-left:60px" for="bedrooms">Minimum Number of Bedrooms</label>
                                <input style="margin-left:60px" id="number_bedrooms" class="form-control slider_output" type="text" name="bedrooms" value="2" readonly="readonly">
                                <div id="bedrooms_slider"></div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="form-horizontal">
                                <label style="margin-left:60px" for="amount">Minimum Number of Bathrooms</label>
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
                                <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1500" data-slider-step="1" data-slider-value="2"/>
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
<!----------------------------------END  TAB SEARCH BAR ------------------------------------------>

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
