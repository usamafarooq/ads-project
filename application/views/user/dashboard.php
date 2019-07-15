<div class="page-header" style="background: url(assets/img/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Dashbord</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">Home /</a></li>
                            <li class="current">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <?php $this->load->view('user/user_sidebar'); ?>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="page-content">
                        <div class="inner-box">
                            <div class="dashboard-box">
                                <h2 class="dashbord-title">Dashboard</h2>
                            </div>
                            <div class="dashboard-wrapper">
                                <div class="dashboard-sections">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-write"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="#">Total Ad</a></h2>
                                                    <h3><?php echo $user['Daily_Ads'] ?> Ad</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-add-files"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="#">Available Limit</a></h2>
                                                    <h3><?php echo $limit ?> ads available</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>