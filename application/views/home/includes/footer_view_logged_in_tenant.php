<i class='footer-bubble'></i>
</section>
</section>
</footer>
<style>.soc-icons {
        margin-top: 15px;
    }</style>
<section id='sub-footer'>
    <section class='container'>
        <section class='row'>
            <div class='span3'>
             <div class="soc-icons">
                <figure class='logo'>
                    <a href="<? echo base_url('home') ?>">
                        <img src="<? echo base_url() ?>assets/img/logo-footer.png" alt=""/>
                    </a>
                </figure></div>
            </div>
            <div class='span6'>
                <div class='copyright'>
                    <p>Copyright &copy; 2015 Rent Direct Online Ltd <br />
                        Company No: 09153898. All rights reserved.</p>
                </div>
            </div>
            
            <div class='span3'>
                <div class="soc-icons">
                    <a href="https://www.facebook.com/rentdirectcouk" target="_blank" title="Rent Direct On Facebook"><img src="<?= base_url() ?>/assets/img/facebook.png" border="0" alt="Rent Direct on Facebook"/></a>
                    <a href="https://plus.google.com/+Rent-directCoUk/" target="_blank" title="Rent Direct On Google +"><img src="<?= base_url() ?>/assets/img/google-plus.png" border="0" alt="Rent Direct on Google Plus"/></a>
                    <a href="http://uk.linkedin.com/in/rentdirect/" target="_blank" title="Rent Direct On Linked In"><img src="<?= base_url() ?>/assets/img/linkedin.png" border="0" alt="Rent Direct On Linked In"/></a>
                    <a href="http://www.stumbleupon.com/stumbler/RentDirectcouk" target="_blank" title="Rent Direct On Stumble Upon"><img src="<?= base_url() ?>/assets/img/stumbleupon.png" border="0" alt="Rent Direct on Stumble Upon"/></a>
                    <a href="https://twitter.com/RentDirects" target="_blank" title="Rent Direct On Twitter"><img src="<?= base_url() ?>/assets/img/twitter.png" border="0" alt="Rent Direct On Twitter"/></a>
                </div>
            </div>
        </section>
    </section>
</section>



<script src="<? echo base_url() ?>assets/js/vendor/jquery-1.9.1.min.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/bootstrap.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/bootstrap-select.min.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/jquery.flexslider-min.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/bootstrap-slider.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/jquery.mousewheel.min.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/jquery.mCustomScrollbar.min.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/tinynav.min.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/jquery.placeholder.min.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/gmap3.min.js"></script>
<script src="<? echo base_url() ?>assets/js/main_landlord.js"></script>
<script src="<? echo base_url() ?>assets/js/vendor/bootstrap-slider.js"></script>
<script src="<? echo base_url() ?>assets/js/validator.js"></script>
<!--- Tooltips ---->
<script src="<? echo base_url() ?>assets/js/tipped.js"></script>
<!--- Prop View Gallery ---->
<script src="<? echo base_url() ?>assets/js/jquery.galleriffic.js"></script>

<script>
    // AJAX ERROR HANDLER FOR SESSION
    $(document).ajaxError(function (e, xhr, settings, exception) {
        if (xhr.status == 401)
        {
            // open your popup
            $('#login-popup').modal('open');

            // attach the xhr object to the listener
            $(document).bind( "retry-xhr", {
                    xhro: xhr
                },
                function( event ) {
                    // retry the xhr when fired
                    $.ajax( event.data.xhro );
                });
        }
    });
</script>
</body>
</html>

