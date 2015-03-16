<i class='content-bubble'></i>
</section>
</section>
</section>
<footer>
    <section class='container'>
        <section class='row'>
            <div class='span4 footer-widget'>
                <h2>About Us</h2>
                <p>Rent Direct Online Ltd is a comprehensive property search portal. Designed to allow full and free communication between landlords and tenants. No agents, no expensive fees, no hassle. Just simple, easy rentals for everyone.</p>

                <a href="#" class='read-more'>Learn More</a>
            </div>
            <div class='span4 footer-widget'>
                <h2>Our Blog</h2>
                <div class='blog-style'>
                    <article>
                        <div class='date-box'>
                            <div class='day'>10</div>
                            <div class='month'>Aug</div>
                        </div>
                        <div class='text-box'>
                            <h3><a href="#">Video killed the radio star - but it's a major new feature on Rent Direct!</a></h3>
                            <span class='author'>posted by admin</span>
                            <div class='excerpt'>
                                <p>Rent Direct now supports Youtube and Vimeo hosted video property tours....</p>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

            <div class='span4 footer-widget'>
                <h2>Testimonials</h2>
                <div class='testimonial-box'>
                    <div class='controls'>
                        <a href="#" class='prev'>Previous</a>
                        <a href="#" class='next'>Next</a>
                    </div>
                    <ul class='slides'>
                        <li>
                            <div class='slide-box'>
                                <div class='text-box'>
                                    <div class='inner'>
                                        <p>I find this site really helpful and straight forward</p>
                                    </div>
                                    <i class='bubble'></i>
                                </div>
                                <div class='author-box'>
                                    <figure></figure>
                                    <div class='texts'>
                                        <span class='name'>James Morrison</span> <br />
                                        <span class='position'>Property Developer</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class='slide-box'>
                                <div class='text-box'>
                                    <div class='inner'>
                                        <p>The 'Landlords' Dashboard couldnt get any Easier!</p>
                                    </div>
                                    <i class='bubble'></i>
                                </div>
                                <div class='author-box'>
                                    <figure></figure>
                                    <div class='texts'>
                                        <span class='name'>Emma Taylor</span> <br />
                                        <span class='position'>Accounts & Management</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="row">
                <div class="span4" style="padding-left: 30px">
                    <h2>LEGAL</h2>
                    <p><a href="<?= base_url('about') ?>#privacy_policy">Privacy Policy</a></p>
                    <p><a href="<?= base_url('about') ?>#terms_conditions">Terms & Conditions</a></p>
                    <p><a href="<?= base_url('about') ?>#cookie_policy">Cookie Policy</a></p>
                </div>
                <div class="span4">
                    <h2>GET ON RENT DIRECT</h2>
                    <p><a href="<?= base_url('about') ?>#advertise">Advertise</a></p>
                    <p><a href="<?= base_url('about') ?>#costs">Pricing</a></p>

                </div>
                <div class="span4">
                    <h2>IMPORTANT INFO</h2>
                    <p><a href="<?= base_url('about') ?>">About Rent Direct</a></p>
                    <p><a href="#contactModal" data-toggle="modal">Contact Us</a></p>
               </div>
            </div>

            <!---- Contact Us Modal ---->
            <div id="contactModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Contact Us</h3>
                </div>
                <div class="modal-body">
                    <p>Do you have any questions or requests? Don't be shy, contact us right away!</p>

                    <form action="<?= base_url('home/contact_us') ?>" method="post" class='row'>
                        <div class='span3'>
                            <input type="text" class='input-block-level' name='name' placeholder="Name"/>
                        </div>
                        <div class='span3'>
                            <input type="email" class='input-block-level' name='email' placeholder="Email"/>
                        </div>

                        <div class='span3'>
                            <input type="text" class='input-block-level' name='phone' placeholder="Phone"/>
                        </div>

                        <div class='span3'>
                            <select class='span3' name="issue">
                                <option value="1">General Enquiry</option>
                                <option value="2">Report a Problem</option>
                                <option value="3">Request a Feature</option>
                                <option value="4">Make a Complaint</option>
                            </select>
                        </div>

                        <div class='span6'>
                            <textarea name="body" class='input-block-level span4' rows="5" placeholder="Message"></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <input type="submit" name='submit' value='Send' class='btn btn-primary'/>
                    </form>
                </div>
            </div>