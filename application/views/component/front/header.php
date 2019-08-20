<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo (!empty($description)) ? $description : 'Earn Easy Money by Viewing Ads | Click Pay Earn' ?>">
    <title><?php echo $title ?></title>

    <link rel="icon" href="<?php echo base_url('front_assets/img/favicon.png') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/css/bootstrap.min.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/fonts/line-icons.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/css/slicknav.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/css/color-switcher.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/css/nivo-lightbox.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/css/animate.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/css/owl.carousel.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/css/main.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/css/responsive.css') ?>">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_assets/css/colors/purple.css') ?>">
    <script>var base_url = '<?php echo base_url() ?>'</script>
    
    <script src="<?php echo base_url('front_assets/js/jquery-min.js') ?>"></script>
    <script src="<?php echo base_url('front_assets/js/jquery.inputmask.min.js') ?>"></script>
    <!-- <script src="https://raw.githubusercontent.com/RobinHerbots/Inputmask/5.x/dist/inputmask.js"></script> -->
</head>

<body>

    <header id="header-wrap">

        <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
            <div class="container">

                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                    </button>
                    <a href="<?php echo base_url() ?>" class="navbar-brand"><img src="<?php echo base_url('front_assets/img/logo.png') ?>" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url() ?>">Home</a>
                        </li>
                        <?php if ($this->session->userdata('role') != 2) { ?>
                        <li class="nav-item <?php echo (base_url(uri_string()) == base_url('pricing')) ? 'active' : '' ?>">
                            <a class="nav-link " href="<?php echo base_url('pricing') ?>">Pricing PLan</a>
                        </li>
                        <?php } ?>
                        <!-- <li class="nav-item <?php echo (base_url(uri_string()) == base_url('clickads')) ? 'active' : '' ?>">
                            <a class="nav-link " href="<?php echo base_url('clickads') ?>">Click Ads</a>
                        </li> -->
                        <li class="nav-item <?php echo (base_url(uri_string()) == base_url('about')) ? 'active' : '' ?>">
                            <a class="nav-link " href="<?php echo base_url('about') ?>">About Us</a>
                        </li>
                        <li class="nav-item <?php echo (base_url(uri_string()) == base_url('contact')) ? 'active' : '' ?>">
                            <a class="nav-link " href="<?php echo base_url('contact') ?>">Contact Us</a>
                        </li>
                        <!-- <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item active" href="index.html">Home 1</a>
                                <a class="dropdown-item" href="index-2.html">Home 2</a>
                                <a class="dropdown-item" href="index-3.html">Home 3</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.html">Categories</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listings</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="adlistinggrid.html">Ad Grid</a>
                                <a class="dropdown-item" href="adlistinglist.html">Ad Listing</a>
                                <a class="dropdown-item" href="ads-details.html">Listing Detail</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="about.html">About Us</a>
                                <a class="dropdown-item" href="services.html">Services</a>
                                <a class="dropdown-item" href="ads-details.html">Ads Details</a>
                                <a class="dropdown-item" href="post-ads.html">Ads Post</a>
                                <a class="dropdown-item" href="pricing.html">Packages</a>
                                <a class="dropdown-item" href="testimonial.html">Testimonial</a>
                                <a class="dropdown-item" href="faq.html">FAQ</a>
                                <a class="dropdown-item" href="404.html">404</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="blog.html">Blog - Right Sidebar</a>
                                <a class="dropdown-item" href="blog-left-sidebar.html">Blog - Left Sidebar</a>
                                <a class="dropdown-item" href="blog-grid-full-width.html"> Blog full width </a>
                                <a class="dropdown-item" href="single-post.html">Blog Details</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li> -->
                    </ul>
                    <ul class="sign-in">
                        <li class="nav-item dropdown">
                            <?php if (!$this->session->userdata('id')): ?>
                            <a class="nav-link" href="<?php echo base_url('user/login') ?>"> Login</a>
                            <a class="nav-link" href="<?php echo base_url('user/signup') ?>"> Signup</a>
                            <?php else: ?>
                            <!-- <a class="nav-link" href="<?php echo base_url('user/logout') ?>"> Logout</a> -->

                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni-user"></i> <?php echo $this->session->userdata('first_name') ?></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo base_url('user/dashboard') ?>"><i class="lni-home"></i> Dashboard</a>
                                <a class="dropdown-item" href="<?php echo base_url('user/edit') ?>"><i class="lni-user"></i> Edit Profile</a>
                                <a class="dropdown-item" href="<?php echo base_url('referrals') ?>"><i class="lni-users"></i> My Referrals</a>
                                <a class="dropdown-item" href="<?php echo base_url('withdraw') ?>"><i class="lni-sort-amount-asc"></i> Withdraw</a>
                                <a class="dropdown-item" href="<?php echo base_url('payments') ?>"><i class="lni-sort-amount-asc"></i> Payment History</a>
                                <a class="dropdown-item" href="<?php echo base_url('user/logout') ?>"> <i class="lni-close"></i>Logout</a>
                                <!-- <a class="dropdown-item" href="account-profile-setting.html"><i class="lni-home"></i> Account Home</a>
                                <a class="dropdown-item" href="account-myads.html"><i class="lni-wallet"></i> My Ads</a>
                                <a class="dropdown-item" href="account-favourite-ads.html"><i class="lni-heart"></i> Favourite ads</a>
                                <a class="dropdown-item" href="account-archived-ads.html"><i class="lni-folder"></i> Archived</a>
                                <a class="dropdown-item" href="login.html"><i class="lni-lock"></i> Log In</a>
                                <a class="dropdown-item" href="signup.html"><i class="lni-user"></i> Signup</a>
                                <a class="dropdown-item" href="forgot-password.html"><i class="lni-reload"></i> Forgot Password</a>
                                <a class="dropdown-item" href="account-close.html"><i class="lni-close"></i>Account close</a> -->
                            </div>
                            <?php endif ?>

                        </li>
                    </ul>
                    <!-- <a class="tg-btn" href="post-ads.html">
                        <i class="lni-pencil-alt"></i> Post An Ad
                    </a> -->
                </div>
            </div>

            <ul class="mobile-menu">
                <li>
                    <a class="<?php echo (base_url(uri_string()) == base_url()) ? 'active' : '' ?>" href="<?php echo base_url() ?>">Home</a>
                </li>
                <li>
                    <a class="<?php echo (base_url(uri_string()) == base_url('pricing')) ? 'active' : '' ?>" href="<?php echo base_url('pricing') ?>">Pricing PLan</a>
                </li>
                <!-- <li>
                    <a class="<?php echo (base_url(uri_string()) == base_url('clickads')) ? 'active' : '' ?>" href="<?php echo base_url('clickads') ?>">Click Ads</a>
                </li> -->
                <li>
                    <a class="<?php echo (base_url(uri_string()) == base_url('about')) ? 'active' : '' ?>" href="<?php echo base_url('about') ?>">About Us</a>
                </li>
                <li>
                    <a class="<?php echo (base_url(uri_string()) == base_url('contact')) ? 'active' : '' ?>" href="<?php echo base_url('contact') ?>">Contact Us</a>
                </li>
                <!-- <li>
                    <a class="active" href="#">Home</a>
                    <ul class="dropdown">
                        <li><a class="active" href="index.html">Home 1</a></li>
                        <li><a href="index-2.html">Home 2</a></li>
                        <li><a href="index-3.html">Home 2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="category.html">Categories</a>
                </li>
                <li>
                    <a href="#">Listings</a>
                    <ul class="dropdown">
                        <li><a href="adlistinggrid.html">Ad Grid</a></li>
                        <li><a href="adlistinglist.html">Ad Listing</a></li>
                        <li><a href="ads-details.html">Listing Detail</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="ads-details.html">Ads Details</a></li>
                        <li><a href="post-ads.html">Ads Post</a></li>
                        <li><a href="pricing.html">Packages</a></li>
                        <li><a href="testimonial.html">Testimonial</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="404.html">404</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Blog</a>
                    <ul class="dropdown">
                        <li><a href="blog.html">Blog - Right Sidebar</a></li>
                        <li><a href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
                        <li><a href="blog-grid-full-width.html"> Blog full width </a></li>
                        <li><a href="single-post.html">Blog Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="contact.html">Contact Us</a>
                </li> -->

                
                <li>
                    <?php if (!$this->session->userdata('id')): ?>
                    <a class="nav-link" href="<?php echo base_url('user/login') ?>"> Login</a>
                    <a class="nav-link" href="<?php echo base_url('user/signup') ?>"> Signup</a>
                    <?php else: ?>
                    <a><?php echo $this->session->userdata('first_name') ?></a>
                    <ul class="dropdown">
                        <a href="<?php echo base_url('user/dashboard') ?>"><i class="lni-home"></i> Dashboard</a>
                        <li><a href="<?php echo base_url('user/edit') ?>"><i class="lni-user"></i> Edit Profile</a></li>
                        <li><a href="<?php echo base_url('referrals') ?>"><i class="lni-users"></i> My Referrals</a></li>
                        <li><a href="<?php echo base_url('withdraw') ?>"><i class="lni-sort-amount-asc"></i> Withdraw</a></li>
                        <li><a href="<?php echo base_url('payments') ?>"><i class="lni-sort-amount-asc"></i> Payment History</a></li>
                        <li><a href="<?php echo base_url('user/logout') ?>"> <i class="lni-close"></i>Logout</a></li>
                    </ul>
                    <?php endif ?>
                </li>
                <!-- <li>
                    <a>My Account</a>
                    <ul class="dropdown">
                        <li><a href="account-profile-setting.html"><i class="lni-home"></i> Account Home</a></li>
                        <li><a href="account-myads.html"><i class="lni-wallet"></i> My Ads</a></li>
                        <li><a href="account-favourite-ads.html"><i class="lni-heart"></i> Favourite ads</a></li>
                        <li><a href="account-archived-ads.html"><i class="lni-folder"></i> Archived</a></li>
                        <li><a href="login.html"><i class="lni-lock"></i> Log In</a></li>
                        <li><a href="signup.html"><i class="lni-user"></i> Signup</a></li>
                        <li><a href="forgot-password.html"><i class="lni-reload"></i> Forgot Password</a></li>
                        <li><a href="account-close.html"><i class="lni-close"></i>Account close</a></li>
                    </ul>
                </li> -->
            </ul>

        </nav>

        <?php if(isset($slider)): ?>
        <div id="hero-area">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12 text-center">
                        <div class="contents">
                            <h1 class="head-title">Welcome to <span class="year">CLick Pay Earn</span></h1>
                            <p>Click Pay Earn is here to help those who seek easy ways to earn money online. It is a platform that pays you on each ad you view. Simply sign up now and start making money!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </header>
