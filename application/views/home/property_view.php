<? /**
 *
 * THIS IS THE MAIN PROPERTY VIEW FOR EACH PROPERTY IN THE DATABASE
 * IT SHOULD NEVER CONTAIN ANY ERRORS EVEN IF NO DATA IS CALLED TO THE VIEW....
 *
 * SEE THE OLD RENT DIRECT FILE 'property_view_social_container' FOR THE SOCIAL STUFF
 *
 */
?>

<? // Should never happen, someone's pissing about with the url
if (!isset($property_data)) {

    exit('ERROR: No property data');
}
?>

<section id='page-title'>
    <section class='container'>
        <section class='row'>
            <div class='span6'>
                <h1>Property</h1>
                <ul class="breadcrumb">
                    <li><a href="<? echo base_url('home') ?>">Home</a> <span class="divider">&ndash;</span></li>
                    <li><a href="<? echo base_url('property') ?>">Property</a> <span class="divider">&ndash;</span></li>
                    <li class="active"><? if (isset($property_data['title']) && !empty($property_data['title'])) {
                            echo($property_data['title']);
                        } else {
                            echo('N/A');
                        } ?></li>
                </ul>
            </div>
        </section>
    </section>
</section>

<section id='content' class='alternate-bg'>
<section class='container'>

<?
// get flashdata
$message = $this->session->flashdata('message');

if ($message) {
    echo('<div class="alert alert-success">' . '<strong>Thank you</strong> for your request, the <strong>landlord</strong>  should be in touch soon!' . '</div><br />');
}
?>

<?
// get flashdata
$message_login = $this->session->flashdata('message_login');

if ($message_login) {
    echo('<div class="alert alert-success"><strong>' . $message_login . '</strong></div><br />');
}
?>

<h5>
    <?
    // get flashdata
    $message_login = $this->session->flashdata('quick_message');

    if ($message_login) {
        echo('<div class="alert alert-success"><strong>' . $message_login . '</strong></div><br />');
    }
    ?>
</h5>

<!----- BANNER SECTION ----->
<style> .ad-propview-fix {
        padding-bottom: 20px;
    }</style>
<div class="ad-propview-fix">
    <div class="row">
        <br/>

        <div class="span6">
            <img src="<?= base_url() ?>/banners/468x60.jpg" alt="ADVERTISING WILL BE HERE SHORTLY, WATCH THIS SPACE!!">
        </div>

        <div class="span6">
            <img src="<?= base_url() ?>/banners/468x60.jpg" alt="ADVERTISING WILL BE HERE SHORTLY, WATCH THIS SPACE!!"
                 style="float: right;">
        </div>
    </div>
</div>
<!---- End of Banner Section ---->

<section class='row featured-items'>
<section class='span9'>

<div class='property-box'>
    <div class='top'>

        <div class='row'>
            <div class='left'>
                <!-- Start Advanced Gallery Html Containers -->
                <?
                // TODO: NEED TO MAKE SOME JQUERY TO HIDE MAIN IMAGE ON CLICK OR JUST MAKE THE MULTIPLE UPLOADER ON CHECKOUT PROCEDURE
                                       echo ('<img src="' . base_url() . 'prop_images/' . $property_data['main_image'] . '" alt="" class="bg-image" />');
                ?>
                <div id="slideshow" class="slideshow"></div>
                <!--- Temp Page Breaks for Gallery View --->
                <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
                <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
                <br/> <br/> <br/> <br/>

                <div class='title-line'>
                    <div class='pull-left'>
                        <h2><? if (isset($property_data['generic_street_name']) && !empty($property_data['generic_street_name'])) {
                                echo($property_data['generic_street_name']);
                            } else {
                                echo('N/A');
                            } ?></h2> <br/>


                        <p><? if (isset($property_data['city']) && !empty($property_data['city'])) {
                                echo($property_data['city']);
                            } else {
                                echo('N/A');
                            } ?></p>


                    </div>
                    <div class='pull-right'>
                            <span
                                class='price'>£<? if (isset($property_data['rent']) && !empty($property_data['rent'])) {
                                    echo((int)$property_data['rent']);
                                } else {
                                    echo('N/A');
                                } ?></span>
                    </div>
                </div>
                <br/>
                <br/>

                <div class='description'>

                    <p>

                    <h3>Description</h3></p>

                    <p><? if (isset($property_data['description']) && !empty($property_data['description'])) {
                            echo($property_data['description']);
                        } else {
                            echo('N/A');
                        } ?></p>

                    <p>

                    <h3>Interior features</h3></p>

                    <p><? if (isset($property_data['interior_features']) && !empty($property_data['interior_features'])) {
                            echo($property_data['interior_features']);
                        } else {
                            echo('N/A');
                        } ?></p>

                    <p>

                    <h3>Outdoor features</h3></p>

                    <p><? if (isset($property_data['outdoor_features']) && !empty($property_data['outdoor_features'])) {
                            echo($property_data['outdoor_features']);
                        } else {
                            echo('N/A');
                        } ?></p>

                    <p>

                    <h3>Kitchen features</h3></p>

                    <p><? if (isset($property_data['kitchen_features']) && !empty($property_data['kitchen_features'])) {
                            echo($property_data['kitchen_features']);
                        } else {
                            echo('N/A');
                        } ?></p>

                    <h3>Views</h3></p>

                    <p><? if (isset($property_data['views']) && !empty($property_data['views'])) {
                            echo($property_data['views']);
                        } else {
                            echo('N/A');
                        } ?></p>

                    <h3>Distances</h3></p>

                    <p><? if (isset($property_data['distances']) && !empty($property_data['distances'])) {
                            echo($property_data['distances']);
                        } else {
                            echo('N/A');
                        } ?></p>

                    <? if (isset($property_data['has_parking']) && $property_data['has_parking'] == 1) { ?>

                    <h3>Parking Details</h3></p>

                    <p><? if (isset($property_data['parking']) && !empty($property_data['parking'])) {
                            echo($property_data['parking']);
                        } else {
                            echo('N/A');
                        } ?></p>
                    <? } ?>
                </div>
            </div>
            <!--- End of Viewing Container ----->



            <? /*
           // ------------------------ START OF GALLERY -------------------------- //
                NOTES: GALLERY CSS FOR THIS IS IN ASSETS/CSS/GALLERFIC-2.CSS
                        USE THIS TO MAKE TWEAKS AS WELL AS THE HARDCODED
                            JAVASCRIPT BELOW THE GALLERY THUMBS
                            TODO: NEATEN THE GALLERY LAYOUT
            */
            ?>
            <div class='right'>
                <h3>Gallery <span></span></h3>


                <div id="thumbs" class="navigation">
                    <ul class="thumbs noscript">

                        <? foreach ($prop_gallery as $key => $value) { ?>

                            <li>
                                <a class="thumb" name="lizard"
                                   href="<?= base_url() . 'gallery/' . $value['property_id'] . '/' . $value['file_name'] ?>"
                                " title="<?= $value['alt_tag'] ?>">
                                <img
                                    src="<?= base_url() . 'gallery/' . $value['property_id'] . '/thumb_' . $value['file_name'] ?>"
                                    alt="Title #3"/>
                                </a>
                            </li>

                        <? } // end of gallery ?>


                    </ul>

                </div>


                <? // ADD IN VIEW ALL PHOTOS LATER
                // <a rel="prettyPhoto[gallery]" class='more'>View all photos</a>
                ?>

                <script type="text/javascript">
                    $(document).ready(function () {
                        var gallery = $('#thumbs').galleriffic({
                            delay: 3000, // in milliseconds
                            numThumbs: 10, // The number of thumbnails to show page
                            preloadAhead: -1, // Set to -1 to preload all images
                            enableTopPager: false,
                            enableBottomPager: true,
                            maxPagesToShow: 7,  // The maximum number of pages to display in either the top or bottom pager
                            slideshow: false,
                            imageContainerSel: '#slideshow', // The CSS selector for the element within which the main slideshow image should be rendered
                            //controlsContainerSel:      '', // The CSS selector for the element within which the slideshow controls should be rendered
                            //captionContainerSel:       '#caption', // The CSS selector for the element within which the captions should be rendered
                            loadingContainerSel: '#loading', // The CSS selector for the element within which should be shown when an image is loading
                            renderSSControls: true, // Specifies whether the slideshow's Play and Pause links should be rendered
                            renderNavControls: true, // Specifies whether the slideshow's Next and Previous links should be rendered
                            playLinkText: '',
                            pauseLinkText: 'Pause',
                            prevLinkText: 'Previous',
                            nextLinkText: 'Next',
                            nextPageLinkText: 'Next &rsaquo;',
                            prevPageLinkText: '&lsaquo; Prev',
                            enableHistory: false, // Specifies whether the url's hash and the browser's history cache should update when the current slideshow image changes
                            enableKeyboardNavigation: false, // Specifies whether keyboard navigation is enabled
                            autoStart: false, // Specifies whether the slideshow should be playing or paused when the page first loads
                            syncTransitions: false, // Specifies whether the out and in transitions occur simultaneously or distinctly
                            defaultTransitionDuration: 250, // If using the default transitions, specifies the duration of the transitions
                            onSlideChange: undefined, // accepts a delegate like such: function(prevIndex, nextIndex) { ... }
                            onTransitionOut: undefined, // accepts a delegate like such: function(slide, caption, isSync, callback) { ... }
                            onTransitionIn: undefined, // accepts a delegate like such: function(slide, caption, isSync) { ... }
                            onPageTransitionOut: undefined, // accepts a delegate like such: function(callback) { ... }
                            onPageTransitionIn: undefined, // accepts a delegate like such: function() { ... }
                            onImageAdded: undefined, // accepts a delegate like such: function(imageData, $li) { ... }
                            onImageRemoved: undefined  // accepts a delegate like such: function(imageData, $li) { ... }
                        });
                    });
                </script>

                <? //-------- END OF GALLERY---------------------------------------- ?>
            </div>
            <!----- END OF RIGHT BAR ----->
        </div>
    </div>
</div>

<div class='bottom'>
    <div class='inner'>
        <div class='row'>
            <div class='pull-left update-box'>
                <p>Date added on <a
                        href="#"><? if (isset($property_data['date_added']) && !empty($property_data['date_added'])) {
                            echo($property_data['date_added']);
                        } else {
                            echo('N/A');
                        } ?></a> by <a href="#"><?= $landlord_details['first_name']; ?></a>.</p>
            </div>

            <?
            // Only show sign in or register if not not logged in
            if (!$this->ion_auth->logged_in()) {
                ?>

                <div class='pull-right'>
                    <p> Please<a href="#"> sign in or register</a> to request a viewing.</p>
                </div>

            <? } else { ?>

                <div class='pull-right'>
                    <p> You are now logged in.</p>
                </div>

            <? } ?>
        </div>
    </div>
</div>
</div>
<br/>
<br/>


<div class='author-section big-margins'>
    <div class='left'>
        <div class='inner'>
            <div class='row'>
                <figure>

                </figure>

                <? if (isset($landlord_details)) { ?>
                <div class='text'>
                    <h2><?= $landlord_details['first_name']; ?> </h2> <br/>
                    <span class='job-title'><?= $landlord_details['company']; ?> </span>

                    <p><?= $landlord_details['about_me']; ?> </p>
                    <?
                    // Only show sign in or register if not not logged in
                    if (!$this->ion_auth->logged_in()) {
                        echo "<strong>Login to contact Landlord</strong>";
                    } else {
                        ?>
                        <a href="#contactModalLandlord" data-toggle="modal" class='follow btn btn-primary'></i> Quick
                            Contact</a>

                    <? } ?>
                </div>
            </div>
        </div>
    </div>


            <!---- Contact Us Modal ---->
            <div id="contactModalLandlord" class="modal hide fade" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Quick Contact</h3>
                </div>
                <div class="modal-body">
                    <p>Briefly contact the landlord for any further information regarding this property</p>

                    <form action="<?= base_url('ajax/quick_contact') ?>" method="post" class='row'>
                        <div class='span3'>
                            <label>Name </label>
                            <input type="text" id="name" class='input-block-level' name='name' placeholder="Name"
                                   readonly="readonly" value="<? if (isset($user_data)) {
                                echo $user_data['first_name'] . ' ' . $user_data['last_name'];
                            } ?>"/>
                        </div>
                        <div class='span3'>
                            <label>Enter Email (If Different)</label>
                            <input type="email" id="email" class='input-block-level' name='email' placeholder="Email"
                                   value="<? if (isset($user_data)) {
                                       echo $user_data['email'];
                                   } ?>"/>
                        </div>

                        <div class='span3'>

                            <label>Enter Phone (If Different)</label>
                            <input type="text" id="phone" class='input-block-level' name='phone' placeholder="Phone"/>
                        </div>

                        <div class='span6'>
                            <textarea name="body" id="body" class='input-block-level span4' rows="5"
                                      placeholder="Message"></textarea>
                        </div>

                        <input type="hidden" id="prop_id"
                               value="<? if (isset($property_data['id']) && !empty($property_data['id'])) {
                                   echo($property_data['id']);
                               } else {
                                   echo('N/A');
                               } ?>" name="prop_id">

                        <input type="hidden" id="landlord_id" name="landlord_id"
                               value="<? if (isset($landlord_details)) {
                                   echo $landlord_details['id'];
                               } ?>">
                        <input type="hidden" name="tenant_id" value="<? if (isset($user_data)) {
                            echo $user_data['id'];
                        } ?>">

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <input type="submit" name='submit' value='Send' class='btn btn-primary'/>
                    </form>
                </div>
            </div>

            <? } //END IF ?>


</div>
</section>


<aside class='span3'>
<section class='widget'>
<section class='widget-title uppercase'>
    <div class='inner'>
        <h2>SIDE MENU</h2>
    </div>
</section>
<section class='widget-content'>
<form action="">
<div class='widget-section'>
    <div class='inner'>

        <a class="has_tooltip" href="#" id="log_in_to_add_to_saved_properties" data-toggle="tooltip"
           data-placement="top" title="Log in or register to add to your saved properties"><img id="saved_image"
                                                                                                src="<?= base_url() ?>/assets/img/buttons/fave.png"
                                                                                                height="40" width="40"
                                                                                                border="0"/></a></li>            </li>

        <a class="has_tooltip" href="<?= base_url() ?>documents/brochure/<? if (isset($property_data['id']) && !empty($property_data['id'])) {
            echo($property_data['id']);
        } else {
            echo('N/A');
        } ?>" data-toggle="tooltip" data-placement="top"
           title="Download a printable information sheet"><img src="<?= base_url() ?>/assets/img/buttons/downloads.png"
                                                               height="40" width="40" border="0"/></a>

        <a class="has_tooltip" href="#" id="email_to_friend" data-toggle="tooltip" data-placement="top"
           title="Share this property via email"><img src="<?= base_url() ?>/assets/img/buttons/email.png" border="0"
                                                      width="40" height="40"/></a>


        <a class="has_tooltip" href="#" id="fb_share" data-toggle="tooltip" data-placement="top"
           title="Share this property on Facebook"><img
                src="<?= base_url() ?>/assets/img/buttons/social_facebook_box_blue.png" width="40" border="0"/></a>

        <a class="has_tooltip" href="https://twitter.com/share?url=http://www.rent-direct.co.uk/properties/view/<? if (isset($property_data['slug']) && !empty($property_data['slug'])) {
            echo($property_data['slug']);
        } else {
            echo('N/A');
        } ?>"
           target="_blank" class="twitter-share-button" id="twitter_share" data-toggle="tooltip" data-placement="top"
           title="Share this property on Twitter"><img src="<?= base_url() ?>/assets/img/buttons/twitter_button.png"
                                                       width="40" border="0"/></a>


    </div>
</div>
<div class='widget-section'>
    <div class='inner'>
        <h4>Quick Facts</h4>

        <table class='table table-hover table-bordered'>
            <tr>
                <td>Rent</td>
                <td>£<? if (isset($property_data['rent']) && !empty($property_data['rent'])) {
                        echo((int)$property_data['rent']);
                    } else {
                        echo('N/A');
                    } ?></td>
            </tr>
            <tr>
                <td>Bond</td>
                <td>£<? if (isset($property_data['bond']) && !empty($property_data['bond'])) {
                        echo((int)$property_data['bond']);
                    } else {
                        echo('N/A');
                    } ?></td>
            </tr>
            <tr>
                <td>Available From</td>
                <td><? if (isset($property_data['date_available']) && !empty($property_data['date_available'])) {
                        echo($property_data['date_available']);
                    } else {
                        echo('N/A');
                    } ?></td>
            </tr>
            <tr>
                <td>Bedrooms</td>
                <td><? if (isset($property_data['bedrooms']) && !empty($property_data['bedrooms'])) {
                        echo($property_data['bedrooms']);
                    } else {
                        echo('N/A');
                    } ?></td>
            </tr>
            <tr>
                <td>Bathrooms</td>
                <td><? if (isset($property_data['bathrooms']) && !empty($property_data['bathrooms'])) {
                        echo($property_data['bathrooms']);
                    } else {
                        echo('N/A');
                    } ?></td>
            </tr>
            <tr>
                <td>Furnished</td>
                <td><? if (isset($property_data['furnished']) && !empty($property_data['furnished'])) {
                        echo($property_data['furnished']);
                    } else {
                        echo('N/A');
                    } ?></td>
            </tr>
            <tr>
                <td>Pets</td>
                <td><? if (isset($property_data['pets_allowed']) && !empty($property_data['pets_allowed'])) {
                        echo($property_data['pets_allowed']);
                    } else {
                        echo('N/A');
                    } ?></td>
            </tr>
            <tr>
                <td>Smoking</td>
                <td><? if (isset($property_data['smoking_allowed']) && !empty($property_data['smoking_allowed'])) {
                        echo($property_data['smoking_allowed']);
                    } else {
                        echo('N/A');
                    } ?></td>
            </tr>
            <tr>
                <td>Dhss</td>
                <td><? if (isset($property_data['dhss_allowed']) && !empty($property_data['dhss_allowed'])) {
                        echo($property_data['dhss_allowed']);
                    } else {
                        echo('N/A');
                    } ?></td>
            </tr>
            <tr>

                <td>Parking</td>

                <td><? if (isset($property_data['has_parking']) && $property_data['has_parking'] == 1) {
                        echo "Yes";
                    } else {
                        echo('No');
                    } ?></td>
            </tr>
        </table>

    </div>
</div>
<div class='widget-section'>
    <div class='inner'>
        <h4>Stats</h4>
        <p>Property Page Views: <strong><? if (isset($hit_count)) { echo $hit_count; } else { 'Not Yet Viewed'; } ?></strong> </p>
        <p>Property Favourites: <strong> DB</strong> </p>
        <p>Social Likes: <strong> DB </strong> </p>
    </div>
</div>
<div class='widget-section'>
    <div class='inner'>
        <?
        // Only show viewing request if user is logged in
        if (($this->ion_auth->in_group('user')) || ($this->ion_auth->in_group('landlord'))) {
        ?>
        <!--- Modal ---->

        <!--- Model Backdrop Fix ---->
        <style>
            .modal-backdrop {
                z-index: -1;
            }
        </style>
        <!--- End Backdrop Fix ---->

        <a href="#myModal" id="modalBtn" role="button" class="btn" data-toggle="modal"><i class="fa fa-eye"></i> Request Viewing</a>
        <br />


        <!-- Modal Request -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <!-- Form Open -->
            <form method="post" action="<? echo base_url('home/arrange_viewing') ?>">

                <?
                // If the current user is logged in, set a hidden field so that an instant messages session can be set up
                if (isset($user_data['id'])) {
                    echo('<input type="hidden" name="tenant_id" id="tenant_id" value="' . $user_data['id'] . '" />');
                }
                ?>

                <input type="hidden" name="property_id" id="property_id" value="<?= $property_data['id'] ?>"/>
                <input type="hidden" name="user_id" id="user_id" value="<?= $property_data['user_id'] ?>"/>
                <input type="hidden" name="view_mon" id="view_mon" class="day_list" value="0"/>
                <input type="hidden" name="view_tues" id="view_tues" class="day_list" value="0"/>
                <input type="hidden" name="view_wed" id="view_wed" class="day_list" value="0"/>
                <input type="hidden" name="view_thurs" id="view_thurs" class="day_list" value="0"/>
                <input type="hidden" name="view_fri" id="view_fri" class="day_list" value="0"/>
                <input type="hidden" name="view_sat" id="view_sat" class="day_list" value="0"/>
                <input type="hidden" name="view_sun" id="view_sun" class="day_list" value="0"/>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Request Viewing</h3>
                </div>
                <div class="modal-body">
                    <label for="contact-name">Your Name</label>
                    <input type="text" name='name' readonly="readonly"
                           placeholder="<? echo $user_data['first_name'] . ' ' . $user_data['last_name'] ?>"
                           id='contact-name' class='input-block-level'/>

                    <label for="contact-name">Your Email
                        <small>(if different)</small>
                    </label>
                    <input type="text" name='email' id='contact-name' class='input-block-level'
                           value="<? echo $user_data['email'] ?>"/>

                    <label for="contact-name">Your Contact
                        <small>(if different)</small>
                    </label>
                    <input type="text" name='phone' id='contact-name' class='input-block-level'
                           value="<? echo $user_data['phone'] ?>"/>

                    <label for="contact-name">What days are the best for you</label>

                    <div class="form-group">
                        <input type="checkbox" name="view_mon" id="my-checkbox1" value="1">
                        <input type="checkbox" name="view_tues" id="my-checkbox2" value="1">
                        <input type="checkbox" name="view_wed" id="my-checkbox3" value="1">
                        <input type="checkbox" name="view_thurs" id="my-checkbox4" value="1">
                        <input type="checkbox" name="view_fri" id="my-checkbox5" value="1">
                        <input type="checkbox" name="view_sat" id="my-checkbox6" value="1">
                        <input type="checkbox" name="view_sun" id="my-checkbox7" value="1">
                    </div>

                    <script>
                        $("[id='my-checkbox1']").bootstrapSwitch({labelText: 'Mon', offText: 'NO', onText: 'YES'});
                        $("[id='my-checkbox2']").bootstrapSwitch({labelText: 'Tues', offText: 'NO', onText: 'YES'});
                        $("[id='my-checkbox3']").bootstrapSwitch({labelText: 'Wed', offText: 'NO', onText: 'YES'});
                        $("[id='my-checkbox4']").bootstrapSwitch({labelText: 'Thurs', offText: 'NO', onText: 'YES'});
                        $("[id='my-checkbox5']").bootstrapSwitch({labelText: 'Fri', offText: 'NO', onText: 'YES'});
                        $("[id='my-checkbox6']").bootstrapSwitch({labelText: 'Sat', offText: 'NO', onText: 'YES'});
                        $("[id='my-checkbox7']").bootstrapSwitch({labelText: 'Sun', offText: 'NO', onText: 'YES'});
                    </script>

                    <br/>

                    <h3>What times of the day are best for you</h3>

                    <div class="row-fluid">
                        <div class="span4 offset1">
                            <label for="contact-name">From</label>

                            <div class="input-append bootstrap-timepicker">
                                <input id="timepicker1" readonly="readonly" name="time_from" type="text"
                                       class="input-block-level">
                                <span class="add-on"><i class="icon-time"></i></span>
                            </div>
                            <script type="text/javascript">
                                $('#timepicker1').timepicker();
                            </script>
                            <br/>
                        </div>
                        <div class="span4 offset1">
                            <label for="contact-name">To</label>

                            <div class="input-append bootstrap-timepicker">
                                <input id="timepicker2" readonly="readonly" name="time_to" type="text"
                                       class="input-block-level">
                                <span class="add-on"><i class="icon-time"></i></span>
                            </div>
                            <script type="text/javascript">
                                $('#timepicker2').timepicker();
                            </script>
                            <br/>
                        </div>
                    </div>

                    <label for="contact-message">Any questions before we begin?</label>
                    <textarea name="message" id="message" class='input-block-level' rows="5" placeholder=""></textarea>

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Send Request!</button>
            </form>
        </div>




    </div>
    <!---- End of modal ---->

    <? } else { ?>
        Please login to request a viewing or add to favourites..
    <? } ?>
</div>
</div>

</form>
</section>
</section>
</aside>
</section>
</section>
</section>
<script>
    /*
        MAIN JAVA FILES
     */

    $(document).ready(function(){

        $('#pin_on_pintrest').click(function(e) {
            var property_id = '<?=$property_data['id']?>';
            var share_type = 'PINTREST';
            $.post('/ajax/add_share', {property_id:property_id, share_type:share_type}, function(data){

            },'json');

            var width  = 575,
                height = 400,
                left   = ($(window).width()  - width)  / 2,
                top    = ($(window).height() - height) / 2,
                url    = this.href,
                opts   = 'status=1' +
                    ',width='  + width  +
                    ',height=' + height +
                    ',top='    + top    +
                    ',left='   + left;

            window.open(url, 'twitter', opts);

            return false;
        });

        $('#fb_share').click(function () {

            var property_id = '<?=$property_data['slug']?>';
            var share_type = 'FACEBOOK';
            $.post('/ajax/add_share', {property_id:property_id, share_type:share_type}, function(data){

            },'json');

            var url = 'http://www.rent-direct.co.uk' + window.location.pathname;

            FB.ui({
                method: 'share_open_graph',
                action_type: 'og.likes',
                action_properties: JSON.stringify({
                    object: base_url + 'properties/view/<?=$property_data['slug']?>'
                })
            }, function(response){

                var base_url = "<? echo base_url() ?>";
            });

        });


    });
