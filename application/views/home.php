<section id="about" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12">
                <div class="about-wrapper">
                    <p class="intro-desc">
                    Click Pay Earn is a registered and recognized company that allows businesses to advertise and convey their message to the desired audience by providing them a common platform.
                    </p>
                    <p class="intro-desc">
                    If you’re an individual who wants to earn extra money, just sign up and start viewing our ads to earn money after a simple process.
                    </p>
                    <p class="intro-desc">
                    We also allow companies to reach their audience! You just need to provide your advertisement and get noticed by thousands of people each day.
                    </p>
                    <!-- <h2 class="intro-title">Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit Sed Do</h2>
                    <p class="intro-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit nostrum, doloremque quaerat sit tempora eius est reiciendis accusamus magnam quae. Explicabo dolore officia, iure a ullam aliquam nemo excepturi, repellat. uod ut delectus ad tempora.
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi laboriosam sit nam animi, distinctio maiores possimus! Suscipit officiis reiciendis vitae omnis eligendi? Tempora at ullam repudiandae, magnam nemo fuga omnis.</p> -->
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12">
                <img class="img-fluid" src="<?php echo base_url('front_assets/img/about/about.png') ?>" alt="">
            </div>
        </div>
    </div>
</section>
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
                        <a href="<?php echo base_url('user/signup'.'?plan='.$value['id']) ?>"><button class="btn btn-common">Buy Now</button></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
