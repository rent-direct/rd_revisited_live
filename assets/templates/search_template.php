<section id='page-title'>
    <section class='container'>
        <section class='row'>
            <div class='span6'>
                <h1>Search Results</h1>
                <p></p>
            </div>
        </section>
    </section>
</section>


<section id='content'>
<section class='container'>
<section class='row featured-items'>
<section class='span9'>


<div class='row'> <!--- x3 ---->

    <!------------------------------------ START OF SEARCH TITLE BAR ------------------------------------------->
    <div class='span9'>
        <div class='top-bar'>
            <div class='bar-title'>
                <div class='inner'>
                    <div class='pull-left custom-margin'>
                        <strong>1</strong> - <strong>9</strong> of <strong>1,075</strong> results for <strong><?= $search_string ?></strong> Properties For Rent
                    </div>

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
                    <div class='pull-right view-type custom-margin'>
                        <span class='text-line'>View:</span>
                        <ul>
                            <li class='active'><a href="search-grid.html" class='grid'>Grid</a></li>
                            <li><a href="search-list.html" class='list'>List</a></li>
                            <li class='last-element'><a href="search-location.html" class='location'>Location</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------ END OF SEARCH TITLE BAR ------------------------------------------->


<?
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

    ?>


    <!--- Start of Results ---->
    <div class='row'> <!--- x3 ---->

        <?
        echo "<div class='span3 featured-item-wrapper'>
        <div class='featured-item'>
            <div class='top'>
                <div class='inner-border'>
                    <div class='inner-padding'>
                        <figure>"; //end of echo
        echo ('<img src="' . base_url() . 'prop_images/' . $value['main_image'] . '" alt="" />');
        echo (' <div class="banner">' . $pets . '</div>" ');
        echo('<a href="/property/view/' . $value['id'] .  'class="figure-hover">Zoom</a>'); //todo: hyperlink ?? or image zoom
        echo "</figure>";
        echo ('<h3><a href="/property/view/' . $value['id'] . '">' . $value['bedrooms'] . ' bed ' . $prop_type . '</a></h3>');
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
        echo ('<div class="price">' . '£' . $value['rent'] . '&nbsp;' . '</div>');
        echo ('<div class="rate">' . $rent_type . '</div>');
        echo "</div>";
        echo "</div>";

        ?>

        <div class='span3 featured-item-wrapper'>
            <div class='featured-item'>
                <div class='top'>
                    <div class='inner-border'>
                        <div class='inner-padding'>
                            <figure>
                                <img src="img/photos/4834194361_85d5c4a5e0_b.jpg" alt="" />
                                <div class='banner'>FEATURED</div>
                                <a href="property.html" class='figure-hover'>Zoom</a>
                            </figure>
                            <h3><a href="property.html">1 Central Park S</a></h3>
                            <p>Las Vegas, NV</p>
                        </div>
                    </div>
                </div>
                <div class='bottom'>
                    <div class='inner-border'>
                        <div class='inner-padding'>
                            <p>4 beds  +  2 baths  +  245 sqft</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='price-wrapper'>
                <div class='price'>$1,499</div>
                <div class='rate'>/month</div>
            </div>
        </div>



    </div>
    <div class='row'> <!--- x3 ---->




        <!--- ENTER 3X CONTENT ---->



    </div>
    <div class='row'> <!--- x3 ---->



        <!--- ENTER 3X CONTENT ---->



    </div> <!--- END OF 9X9 ROW ---->


<? } // ------------------------------------------------ END OF FOR EACH --------------------------------------- ?>

<!--- Pagination --->
<div class="pagination">
    <ul>
        <li class='first-element'><a href="#">Prev</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">...</a></li>
        <li><a href="#">48</a></li>
        <li><a href="#">49</a></li>
        <li class='last-element'><a href="#">Next</a></li>
    </ul>
</div>

<!--- End section of search container ---->
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
                            <option value="all">£400</option>
                            <option value="all">£400</option>
                            <option value="all">£400</option>
                        </select>
                    </div>
                </div>
                <div class='widget-section second-half'>
                    <div class='inner'>
                        <label for="maxPrice">Max. Price</label>
                        <select name="propertyType" id="maxPrice" class='btn-block selectpicker'>
                            <option value="all">£1000</option>
                            <option value="all">£1000</option>
                            <option value="all">£1000</option>
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