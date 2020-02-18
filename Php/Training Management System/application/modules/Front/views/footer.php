 <!-- Footer -->
            <footer id="footer" class="footer divider layer-overlay overlay-dark-9" data-bg-img="images/bg/bg2.jpg">
                <div class="container">
                    <div class="row border-bottom">
                        <div class="col-sm-6 col-md-3">
                            <div class="widget dark">
                                <h4 class="widget-title">Skill Development & Technical Institute</h4>
                                <!-- <img class="mt-5 mb-20" alt="" src="images/logo.jpg">-->
                                <p>House#08 (2nd Floor),Sumon Plaza, Senpara,Parbota,Begum Rukeya Sharoni,Mirpur-10,<br>Dhaka-1216,Bangladesh.</p>
                                <ul class="list-inline mt-5">
                                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-color-2 mr-5"></i> <span class="text-gray" >123-456-789</span> </li>
                                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i> <span class="text-gray">info@sdtibd.com</span> </li>
                                    <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-color-2 mr-5"></i> <span class="text-gray" >www.sdtibd.com</span> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="widget dark">
                                <h4 class="widget-title">Useful Links</h4>
                                <ul class="list angle-double-right list-border">
                                    <li><a href="<?=base_url().'sdti'?>">About Us</a></li>
                                    <li><a href="<?=base_url().'all_course/1'?>">Our Courses</a></li>
                                    <li><a href="<?=base_url().'apply'?>">Apply Now</a></li>
                                    <li><a href="<?=base_url().'gallery'?>">Gallery</a></li>
                                    <!-- <li><a href="shop-category.html">Faq</a></li>  -->             
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="widget dark">
                                <h4 class="widget-title">Twitter Feed</h4>
                                <div class="twitter-feed list-border clearfix" data-username="Envato" data-count="2"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="widget dark">
                                <h4 class="widget-title line-bottom-theme-colored-2">Opening Hours</h4>
                                <div class="opening-hours">
                                    <ul class="list-border">
                                        <li class="clearfix"> <span> Mon - Tues :  </span>
                                            <div class="value pull-right"> 6.00 am - 10.00 pm </div>
                                        </li>
                                        <li class="clearfix"> <span> Wednes - Thurs :</span>
                                            <div class="value pull-right"> 8.00 am - 6.00 pm </div>
                                        </li>
                                        <li class="clearfix"> <span> Fri : </span>
                                            <div class="value pull-right"> 3.00 pm - 8.00 pm </div>
                                        </li>
                                        <li class="clearfix"> <span> Sun : </span>
                                            <div class="value pull-right"> Closed </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-30">
                        <div class="col-md-2">
                            <div class="widget dark">
                                <h5 class="widget-title mb-10">Call Us Now</h5>
                                <div class="text-gray">
                                    +880-1711-045 669 <br>
                                    +880-1713-197 241
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget dark">
                                <h5 class="widget-title mb-10">Connect With Us</h5>
                                <ul class="styled-icons icon-bordered icon-sm">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-2">
                            <div class="widget dark">
                                <h5 class="widget-title mb-10">Subscribe Us</h5>
                                <!-- Mailchimp Subscription Form Starts Here -->
                                <form id="mailchimp-subscription-form-footer" class="newsletter-form">
                                    <div class="input-group">
                                        <input type="email" value="" name="EMAIL" placeholder="Your Email" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-footer">
                                        <span class="input-group-btn">
                                            <button data-height="45px" class="btn bg-theme-color-2 text-white btn-xs m-0 font-14" type="submit">Subscribe</button>
                                        </span>
                                    </div>
                                </form>
                                <!-- Mailchimp Subscription Form Validation-->
                                <script type="text/javascript">
                                    $('#mailchimp-subscription-form-footer').ajaxChimp({
                                        callback: mailChimpCallBack,
                                        url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
                                    });

                                    function mailChimpCallBack(resp) {
                                        // Hide any previous response text
                                        var $mailchimpform = $('#mailchimp-subscription-form-footer'),
                                                $response = '';
                                        $mailchimpform.children(".alert").remove();
                                        if (resp.result === 'success') {
                                            $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                                        } else if (resp.result === 'error') {
                                            $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                                        }
                                        $mailchimpform.prepend($response);
                                    }
                                </script>
                                <!-- Mailchimp Subscription Form Ends Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom bg-black-333">
                    <div class="container pt-20 pb-20">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="font-11 text-black-777 m-0">Copyright &copy;2017 Skill Development & Technical Institute. All Rights Reserved.Developed By <a href="http://youthfireit.com/">YouthFireIT</a></p>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="widget no-border m-0">
                                    <ul class="list-inline sm-text-center mt-5 font-12">
                                        <li>
                                            <a href="faq.html">FAQ</a>
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <a href="contact.html">Help Desk</a>
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <a href="contact.html">Support</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <a class="scrollToTop" href="index-mp-layout2.html#"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- end wrapper -->

        <!-- Footer Scripts -->
        <!-- JS | Custom script for all pages -->
        <script src="<?=base_url()?>js/custom.js"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
              (Load Extensions only on Local File Systems ! 
               The following part can be removed on Server for On Demand Loading) -->
        <script type="text/javascript" src="<?=base_url()?>js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

    </body>
</html>