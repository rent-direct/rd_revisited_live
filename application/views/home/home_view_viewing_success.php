<div class="container">
    <div class="row col-centered">
        <div class="span-6 offset3">
            <br/>
            <br/>
            <!---- LOGIN ERROR PAGE VIEW --->

            <button class="btn btn-large btn-success" type="button" disabled>Thank you for your request, the landlord should be in touch soon!</button>

            <br/>
            <br/>
        </div>
    </div>
    <!----PREMIUM SLIDER ------------->
    <div class='featured-items-slider'>
        <ul class='slides'>


            <!---- NEXT ROW ----->
            <li>
                <div class='row'>


                    <!----------------------------- !TEMP! --- PHP CODE HEADER -------------------------------------------------------->
                    <?
                    //        $page = 1;
                    $count = 1;

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
                        // Page count limiter
                        $count++;
                        if ($count == 5) {
                            $count = 1;
                            $page++;
                        }

                    } ?>
                    <!----------------------------- !TEMP! --- PHP CODE END -------------------------------------------------------->



                    <!--- End of first row tab limiter ---->
                </div>
            </li>




            <!-----------NEXT ROW FOR SMALL SIDE TAB --------------->
            <li>
                <div class='row'>

                    <!--- TODO: need to sort out how we are going to arrange the features to next part ---->


                    <!--- End of Tab limiter and sections for premium ---->
                </div>
            </li>
        </ul>
</div>
