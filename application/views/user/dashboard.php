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
                                                    <h3 class="ads_limit"><?php echo $limit ?> ads available</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="dashboardbox" id="watch-ads">
                                                <div class="icon"><i class="lni-write"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="#">Watch Ad</a></h2>
                                                    <h3>Click here to watch ads Ad</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="dashboardbox">
                                                <div class="icon"><i class="lni-add-files"></i></div>
                                                <div class="contentbox">
                                                    <h2><a href="#">Available Limit</a></h2>
                                                    <h3><?php echo $limit ?> ads available</h3>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row" style="display: none">

                                <?php if (!empty($ads)): ?>
                                    <?php foreach ($ads as $ad): ?>
                                                
                                
                                        <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2" data-id="<?php echo $ad['id'] ?>">
                                            <div class="featured-box item">
                                                <figure>
                                                    
                                                    <a target="__blank" href="<?php echo base_url('clickads/view/'.$ad['id']) ?>"><img class="img-fluid" src="<?php echo ad_file($ad["image"]) ?>" width="100%" height="300px" alt=""></a>
                                                </figure>
                                                <div class="feature-content">
                                                    <hr>
                                                    
                                                    <!-- <h4><a target="__blank" class="highlight" href="<?php //echo base_url('clickads/view/'.$ad['id']) ?>"><?php // echo $ad['Name'] ?></a></h4> -->
                                                    
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach ?>

                                    <?php else: ?>


                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-danger" >
                                            No ad(s) available
                                        </div>

                                <?php endif ?>

                            </div>

                </div>
            </div>
        </div>
    </div>




    <script>
        $('#watch-ads').on('click', function(e) {
        
            var adsItemm = $('.item');
            currentAd = adsItemm[Math.floor(Math.random() * 5)];
            var href = $(currentAd).find('a').attr('href');
            window.open(href, '_blank');
        });
        window.setInterval(function() {
        $.ajax({
            url: base_url+'clickads/checkViewedAds',
            type: 'GET',
            dataType: 'json',
            success:function(res){
                if (res.status == 200 && res.data.length > 0) {
                    $('.ads_limit').text(res.available_limit+' ads available');
                    $.each(res.data, function(i, v) {
                        $this = $('div [data-id='+v.ad_id+']');
                        if ($this.length > 0) 
                        {
                            $($this).remove();
                            
                        }
                    });
                }
            }
        });
        
    }, 3000);
    </script>