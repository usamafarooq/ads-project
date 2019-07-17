<footer>

        <section class="footer-Content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-mb-12">
                        <div class="widget">
                            <h3 class="footer-logo"><img src="<?php echo base_url('front_assets/img/logo.png') ?>" alt=""></h3>
                            <div class="textwidget">
                                <p>Click Pay Earn is a registered and recognized platform for those who want to earn money online. Simply sign up to view ads and earn money or if you’re a business and want to publish your ad, contact us today</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-mb-12">
                        <div class="widget">
                            <h3 class="block-title">Help & Support</h3>
                            <ul class="menu">
                                <li><a href="<?php echo base_url('about') ?>">About Us</a></li>
                                <li><a href="<?php echo base_url('terms') ?>">Terms</a></li>
                                <li><a href="<?php echo base_url('contact') ?>">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-mb-12">
                        <div class="widget">
                            <h3 class="block-title">Subscribe us</h3>
                            <p class="text-sub">Subscribe your email address here and stay updated with all the offers and news.</p>
                            <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
                                <div class="form-group is-empty">
                                    <input type="email" value="" name="Email" class="form-control" id="sub-email" placeholder="Email address" required="">
                                    <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-check-box"></i></button>
                                    <div class="clearfix"></div>
                                    <div class="show-message">
                                        
                                    </div>
                                </div>
                            </form>
                            <ul class="footer-social">
                                <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                                <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-info float-left">
                            <p>All copyrights reserved &copy; <?php echo date('Y') ?> - Designed by <a href="http://webewox.com/" rel="nofollow">Webewox</a></p>
                        </div>
                        <!-- <div class="float-right">
                            <ul class="bottom-card">
                                <li>
                                    <a href="#"><img src="<?php echo base_url('front_assets/img/footer/card1.jpg') ?>" alt="card"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo base_url('front_assets/img/footer/card2.jpg') ?>" alt="card"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo base_url('front_assets/img/footer/card3.jpg') ?>" alt="card"></a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?php echo base_url('front_assets/img/footer/card4.jpg') ?>" alt="card"></a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <style type="text/css">
        .help-block.with-errors {
            color: #dc3545!important;
        }
    </style>
    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
    </a>

    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <script type="text/javascript">
        var base_url = '<?php echo base_url() ?>'
    </script>
    <script src="<?php echo base_url('front_assets/js/jquery-min.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/bootstrap.min.js') ?>"></script>
    <!-- <script src="<?php echo base_url('front_assets/js/color-switcher.js') ?>"></script> -->
    <script src="<?php echo base_url('front_assets/js/jquery.counterup.min.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/waypoints.min.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/wow.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/owl.carousel.min.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/nivo-lightbox.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/jquery.slicknav.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/main.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/form-validator.min.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/contact-form-script.min.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/summernote.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/validation.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/custom-validation.js') ?>"></script>
    <script>
        $('#subscribe-form').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: base_url+'home/add_sub',
                type: 'POST',
                dataType: 'json',
                data: {email: $('#sub-email').val()},
                success:function(res){
                    $('.show-message').html('<p class="alert alert-success">Subscribe successfully</p>');
                }
            })
        });
        
    </script>
</body>

</html>