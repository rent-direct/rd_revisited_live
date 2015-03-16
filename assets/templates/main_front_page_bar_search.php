<!--- TAB SEARCH BAR ---->
<section class='row tab-finder'>
<div class='span12'>
<div class="tabbable">

<ul class="nav nav-tabs">
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
            <form action="<?= base_url('home/search') ?>" method="post">

                <div class="span3">
                    <div class="form-horizontal" id="town_search_field">
                        <label for="town" style="margin-left:20px">Search by Town / City</label>
                        <input type="text" style="margin-left:20px" name="city" id="residential_town" value="" autocomplete="off"
                               placeholder="e.g. Nottingham or London" class="town form-control"/>

                        <div class="town_search_results"></div>
                    </div>
                </div>

                <div class="span3">
                    <div class="form-horizontal" id="town_search_field">
                        <div class="form-horizontal">
                            <label for="postcode">...Or by Postcode</label>
                            <input type="text" class="form-control postcode" name="postcode" id="postcode_residential"
                                   placeholder="e.g. NG24" value="" />
                        </div>
                    </div>
                </div>

                <div class="span3">
                    <div class="form-horizontal">
                        <label for="radius">Within a Radius of</label>
                        <input type="text"  class="form-control radius" name="radius" id="radius_residential"
                               value="0">
                    </div>
                </div>

                <div class="span3">
                    <div class="form-horizontal">
                        <label for="unit">&nbsp;</label>
                        <select name="unit" id="unit" class="form-control">
                            <option value="miles" selected="selected">Miles
                            </option>
                            <option value="km" >Kilometers
                            </option>
                        </select>
                    </div>
                </div>


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

            <div class="span1 pull-right">
                <button style="" type="submit" class='btn btn-primary search-property'><i class="icon-search icon-white"></i> Go</button>
            </div>
            </form>
            <br />
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