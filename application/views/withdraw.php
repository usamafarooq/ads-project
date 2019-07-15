<div class="page-header" style="background: url('<?php echo base_url('front_assets/img/banner1.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Withdraw Cash</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home /</a></li>
                        <li class="current">Withdraw Cash</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="about" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="about-wrapper">
                    <h2 class="intro-title">MY ACCOUNT - WITHDAW / CASH YOUR EARNINGS</h2>
                    <p class="intro-desc">WITHDRAW YOUR AMOUNT</p>
                    <p>Get CASH. You must earn at least Rs.500</p><br>
                    <p>Your current amount is Rs.<?php echo number_format($user['amount'], 2) ?></p><br>
                    <?php if($user['amount'] >= 500): ?>
                    <a class="tg-btn" href="<?php echo base_url('withdraw/cash') ?>">Withdraw Cash</a>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
