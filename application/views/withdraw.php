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
                    <?php $withdraw_limit = $this->session->userdata('withdraw_limit') ?>
                    <h2 class="intro-title">MY ACCOUNT - WITHDRAW / CASH YOUR EARNINGS</h2>
                    <p class="intro-desc">WITHDRAW YOUR AMOUNT</p>
                    <p>Get CASH. You must earn at least Rs.<?php echo $withdraw_limit ?></p><br>
                    <p>Your current amount is Rs.<?php echo number_format($this->session->userdata('amount'), 2) ?></p><br>
                    <?php if($this->session->userdata('amount') >= $withdraw_limit): ?>
                        <?php if (is_open() == true): ?>
                        <a class="tg-btn" href="<?php echo base_url('withdraw/cash') ?>">Withdraw Cash</a>
                    <?php else: ?>
                        <p>withdrawal Time is 7:00 AM to 9:00 AM , 12:00PM to 02:00 PM , 04:00PM to 06:00 PM </p> 
                    <?php endif ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
