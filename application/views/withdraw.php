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

<?php if ($this->session->flashdata('error')): ?>
    <div class="col-md-12 alert alert-danger text-center">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif ?>
<?php if ($this->session->flashdata('success')): ?>

<div class="col-md-12 alert alert-success text-center">
    <?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif ?>

<section id="about" class="section-padding">
    <div class="container">
        <div class="row">
            <?php $this->load->view('user/user_sidebar'); ?>
                <div class="col-sm-12 col-md-8 col-lg-9">
            <!-- <div class="col-md-12 col-lg-12 col-xs-12"> -->
                <div class="about-wrapper">
                    <h2 class="intro-title">MY ACCOUNT - WITHDRAW / CASH YOUR EARNINGS</h2>
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
