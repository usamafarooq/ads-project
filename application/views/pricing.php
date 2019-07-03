<div class="page-header" style="background: url('<?php echo base_url('front_assets/img/banner1.jpg') ?>');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Pricing Packages</h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>">Home /</a></li>
                            <li class="current">Package</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="pricing-table" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mainHeading">
                        <h2 class="section-title">Select Package</h2>
                    </div>
                </div>
                <?php foreach ($pricing_plan as $key => $value): ?>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="table">
                        <div class="icon">
                            <?php 
                                if ($key == 0) {
                                    echo '<i class="lni-gift"></i>';
                                }
                                elseif ($key == 1) {
                                    echo '<i class="lni-leaf"></i>';
                                }
                                else{
                                    echo '<i class="lni-layers"></i>';
                                }
                            ?>
                            
                        </div>
                        <div class="title">
                            <h3><?php echo $value['Name'] ?></h3>
                        </div>
                        <div class="pricing-header">
                            <p class="price-value"><sup>RS</sup><?php echo $value['Amount'] ?> <span>/ <?php echo $value['Duration'] ?> Mo</span></p>
                        </div>
                        <ul class="description">
                            <li><strong>Click</strong> <?php echo $value['Click_Price'] ?></li>
                            <li><strong>Referrals Click</strong> <?php echo $value['Refer_Click_Price'] ?></li>
                            <li><strong>Daily Ads</strong> <?php echo $value['Daily_Ads'] ?></li>
                            <li><strong>For <?php echo $value['Duration'] ?></strong> Months</li>
                        </ul>
                        <button class="btn btn-common">Buy Now</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
