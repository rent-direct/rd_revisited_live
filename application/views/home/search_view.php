<section id='page-title'>
    <section class='container'>
        <section class='row'>
            <div class='span6'>
                <h1>Search Results</h1>
                <p>Try out refine widget to make the most of your searching!</p>
            </div>
        </section>
    </section>
</section>


<section id='content'>
<section class='container'>
<section class='row featured-items'>
<section class='span9'>

<? // COUNTERS FOR RESULTS
if (isset($results)) {
    $countarray = count($results);
}
?>

<!------------------------------------ END OF SEARCH TITLE BAR ------------------------------------------->
<h2>Featured Properties for <strong><?= $search_strings ?></strong></h2>
<div class='controls'>
    <a href="#" class='prev'>Previous</a>
    <a href="#" class='next'>Next</a>
</div>
<!---- END ----------------------->

<style>
    .featured-items-rdedit {
        /* what could we do here??? */
    }
</style>

<!---- FEATURED SLIDER ------------->
<div class='featured-items-slider'>
    <ul class='slides'>

        <!---- NEXT ROW ----->

        <?
        //       set limiter
        $count = 0;

        foreach ($featured_properties as $key => $value) {

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
            if ($count == 2) {
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


<div class='row'> <!--- x3 ---->

    <!------------------------------------ START OF SEARCH TITLE BAR ------------------------------------------->
    <div class='span9'>

        <div class='top-bar'>
            <div class='bar-title'>
                <div class='inner'>
                    <div class='pull-left custom-margin'>
                        <strong>1</strong> - <strong>9</strong> of <strong> <?= $countarray ?></strong> results for <strong><?= $search_strings ?></strong> Properties For Rent
                    </div>

                    <? /*
                        // TODO: SHOW RESULTS PER PAGE
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
                    */ ?>
                </div>
            </div>



            <div class='bar-bottom'>
                <div class='inner'>

                    <? // TODO: SORT BY SECTION NEEDS SOME FUNCTION ?>
                    <div class='pull-left custom-margin'>
                        <span class='text-line'>Sort by:</span>
                        <select class='selectpicker'>
                            <option value="relevance">Relevance</option>
                            <option value="date">Date</option>
                        </select>
                    </div>

                    <? // TODO: MAPVIEW, LIST VIEW (INTERGRATE WITH 'MAP_SEARCH'???? )
                    /*
                    <div class='pull-right view-type custom-margin'>
                        <span class='text-line'>View:</span>
                        <ul>
                            <li class='active'><a href="search-grid.html" class='grid'>Grid</a></li>
                            <li><a href="search-list.html" class='list'>List</a></li>
                            <li class='last-element'><a href="search-location.html" class='location'>Location</a></li>
                        </ul>
                    </div>

                    */?>

                </div>
            </div>
        </div>
    </div>
</div>


<?
//set the counter for the row divs
$count = 0;

// Extract each search into own variable data
foreach ($results as $key=>$value) {

//var_dump($results);

                    // Switch statements
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
                    switch ($value['user_subscription_type']) {
                        case 0:
                            $featured = NULL;
                            break;
                        case 1:
                            $featured = NULL;
                            break;
                        case 2:
                            $featured = "FEATURED";
                            break;
                        case 4:
                            $featured = NULL;
                            break;
                        case 5:
                            $featured = NULL;
                            break;
                        case 6:
                            $featured = NULL;
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

?>


<? if ($count == 0) { echo "<div class='row'>"; }


    echo "<div class='span3 featured-item-wrapper'>
            <div class='featured-item'>
            <div class='top'>
                <div class='inner-border'>
                        <div class='inner-padding'>
                                <figure>"; //end of echo

    echo ('<a href="' . base_url('property/view') .'/'. $value['slug'] . '" >'); //START OF ANCHOR HYPERLINK
    echo ('<img src="' . base_url() . 'prop_images/' . $value['main_image'] . '" alt="" />');
    echo ('</a>'); // END OF ANCHOR HYPERLINK

    echo (' <div class="banner">' . $featured . '</div> ');
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
    if ($count == 2) {
        // echo ($count);
        echo ('</div>');
        $count = 0;
        //continue;
    } else {
        $count++;
    }
?>

<? } // ------------------------------------------------ END OF FOR EACH --------------------------------------- ?>

</div>
<!--- Pagination --->
<div class="pagination">
    <ul>
        <li class='first-element'><a href="#">Prev</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li class='last-element'><a href="#">Next</a></li>
    </ul>
</div>

<br />
<----- CI PAGINATION ----->
<div class="pagination">
    <ul>

    </ul>
</div>
<!--- End section of search container ---->
</section>

<!--------------------------------------- REFINE SEARCH CONTAINER ---------------------------------->
<aside class='span3'>
    <section class='widget'>
        <section class='widget-title uppercase'>
            <div class='inner'>
                <h2>Refine Search</h2>
            </div>
        </section>
        <section class='widget-content'>
            <form action="<?= base_url('home/refine_search') ?>" method="get">

                <div class='widget-section'>
                    <div class='inner'>
                        <label for="location">KEYWORD</label>
                        <input type="text" name='keyword' id='location' class='input-block-level' placeholder="Sherwood Street" value="<? if (isset($search_strings)) { echo $search_strings; } else { ""; } ?>"/>
                    </div>
                </div>
                <div class='widget-section'>
                    <div class='inner'>
                        <label for="propertyType">Type</label>
                        <select name="sub_type_id" id="propertyType" class='btn-block selectpicker'>
                            <option value="NULL">Select</option>
                            <option value="1">Semi Detached</option>
                            <option value="2">Detached</option>
                            <option value="3">Flat</option>
                            <option value="4">Maisonette</option>
                            <option value="5">Bungalow</option>
                            <option value="6">Apartment</option>
                        </select>
                    </div>
                </div>

                <div class='widget-section first-half'>
                    <div class='inner'>
                        <label for="minPrice">Min. Price P/M</label>
                        <select name="min_rent" id="minPrice" class='btn-block selectpicker'>
                            <option value="NULL">Select</option>
                            <option value="100">£100</option>
                            <option value="200">£200</option>
                            <option value="300">£300</option>
                            <option value="400">£400</option>
                            <option value="500">£500</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section second-half'>
                    <div class='inner'>
                        <label for="maxPrice">Max. Price P/M</label>
                        <select name="max_rent" id="maxPrice" class='btn-block selectpicker'>
                            <option value="NULL">Select</option>
                            <option value="1000">£1000</option>
                            <option value="1100">£1100</option>
                            <option value="1200">£1200</option>
                            <option value="1500">£1500</option>
                            <option value="2000">£2000</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section'>
                    <div class='inner'>
                        <label for="category">Bathrooms</label>
                        <select name="bathrooms" id="category" class='btn-block selectpicker'>
                            <option value="NULL">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section'>
                    <div class='inner'>
                        <label for="bedrooms">Bedrooms</label>
                        <select name="bedrooms" id="bedrooms" class='btn-block selectpicker'>
                            <option value="NULL">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section'>
                    <div class='inner' style='position: relative;'>
                        <label for="bedrooms">Has Parking</label>
                        <select name="parking" id="parking" class='btn-block selectpicker'>
                            <option value="NULL">Select</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <section class='widget-buttons'>
                    <div class='inner'>
                        <button type="submit" class="btn btn-primary btn-large btn-block">Update</button>
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
<!--------------------------------------- END REFINE SEARCH CONTAINER ---------------------------------->


<? // TODO: CONTACT FORM, MAYBE IMPLEMENT SOME JAVASCRIPT/ajax FOR 'QUICK CONTACT ON SEARCH RESULTS

/*
<section id='contact-form'>
    <section class='container'>
        <section class='row'>
            <div class='span9'>
                <div class='contact-box'>
                    <div class='title-bar'>
                        <div class='inner'>
                            <h2>Contact relevant estate agents & new homes developers</h2>
                            <p>Send a message to agents and developers matching your search for in using the box below.</p>
                        </div>
                    </div>
                    <div class='contact-box-content'>
                        <div class='inner'>
                            <div class='half first-half'>
                                <form action="">
                                    <label for="contact-name">Your Name</label>
                                    <input type="text" name='contact-name' placeholder="John Smith" id='contact-name' class='input-block-level'/>
                                    <label for="contact-message">Your Message</label>
                                    <textarea name="contact-message" id="contact-message" class='input-block-level' rows="10" placeholder="Your message"></textarea>
                                    <label for="contact-phone">Your Phone</label>
                                    <input type="tel" name='contact-phone' placeholder="(XXX) XXX - XX - XX" id='contact-phone' class='input-block-level'/>
                                    <label for="contact-email">Your Email</label>
                                    <input type="email" name='contact-email' placeholder="example@example.com" id='contact-email' class='input-block-level'/>
                                    <label class="checkbox">
                                        <input type="checkbox"> Keep me informed on property market updates
                                    </label>
                                </form>
                            </div>
                            <div class='half'>
                                <div class='custom-multiple-select-filters'>
                                    <span>Select: </span>
                                    <ul>
                                        <li><a href="#" class='all'>All</a></li>
                                        <li>|</li>
                                        <li><a href="#" class='featured'>Featured</a></li>
                                        <li>|</li>
                                        <li><a href="#" class='none'>None</a></li>
                                    </ul>
                                </div>
                                <div class='custom-multiple-select'>
                                    <select multiple='multiple'>
                                        <option rel='1' value="1">Hello 1</option>
                                        <option rel='2' value="2">Hello 2</option>
                                        <option rel='3' value="3">Hello 3</option>
                                        <option rel='4' value="4">Hello 4</option>
                                        <option rel='5' value="5">Hello 5</option>
                                        <option rel='6' value="6">Hello 6</option>
                                        <option rel='7' value="7">Hello 7</option>
                                        <option rel='8' value="8">Hello 8</option>
                                    </select>
                                    <ul>
                                        <li rel='1' class='featured'>
                                            <div class='inner-list'>
                                                <strong>Andrews - Cowley, OX4</strong> <br />
                                                <span>01865 360070</span>
                                            </div>
                                        </li>
                                        <li rel='2'>
                                            <div class='inner-list'>
                                                <strong>Andrews - Cowley, OX4</strong> <br />
                                                <span>01865 360070</span>
                                            </div>
                                        </li>
                                        <li rel='3' class='featured'>
                                            <div class='inner-list'>
                                                <strong>Andrews - Cowley, OX4</strong> <br />
                                                <span>01865 360070</span>
                                            </div>
                                        </li>
                                        <li rel='4'>
                                            <div class='inner-list'>
                                                <strong>Andrews - Cowley, OX4</strong> <br />
                                                <span>01865 360070</span>
                                            </div>
                                        </li>
                                        <li rel='5' class='featured'>
                                            <div class='inner-list'>
                                                <strong>Andrews - Cowley, OX4</strong> <br />
                                                <span>01865 360070</span>
                                            </div>
                                        </li>
                                        <li rel='6' class='featured'>
                                            <div class='inner-list'>
                                                <strong>Andrews - Cowley, OX4</strong> <br />
                                                <span>01865 360070</span>
                                            </div>
                                        </li>
                                        <li rel='7'>
                                            <div class='inner-list'>
                                                <strong>Andrews - Cowley, OX4</strong> <br />
                                                <span>01865 360070</span>
                                            </div>
                                        </li>
                                        <li rel='8'>
                                            <div class='inner-list'>
                                                <strong>Andrews - Cowley, OX4</strong> <br />
                                                <span>01865 360070</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <input type="submit" class='btn btn-primary btn-large pull-right' value='Send Message'/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <aside class='span3'>
                <section class='widget'>
                    <section class='widget-title'>
                        <div class='inner'>
                            <h2>Text Widget</h2>
                        </div>
                    </section>
                    <section class='widget-content top-arrow'>
                        <div class='inner'>
                            <p>Vestibulum venenatis sem a ligula rhoncus et gravida lacus consequat. Praesent sollicitudin dolor euismod quam elementum a lacinia odio vehicula.</p>
                        </div>
                    </section>
                </section>
                <section class='widget'>
                    <section class='widget-title'>
                        <div class='inner'>
                            <h2>Useful Links</h2>
                        </div>
                    </section>
                    <section class='widget-content top-arrow'>
                        <ul class='widget-list'>
                            <li><a href="#">Link Example</a></li>
                            <li><a href="#">Link Example</a></li>
                            <li><a href="#">Link Example</a></li>
                            <li><a href="#">Link Example</a></li>
                        </ul>
                    </section>
                </section>
            </aside>
        </section>
    </section>
</section>
*/
?>