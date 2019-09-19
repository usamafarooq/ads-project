<script src='https://www.google.com/recaptcha/api.js'></script>

<div class="page-header" style="background: url('<?php echo base_url('front_assets/img/banner1.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Login</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('') ?>">Home /</a></li>
                        <li class="current">Login</li>
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

<section class="login section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-12 col-xs-12">
                <div class="login-form login-area">
                    <h3>
                        Login Now
                    </h3>
                    <form role="form" method="POST" class="login-form">
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-user"></i>
                                <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-lock"></i>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
                        </div>
                        <div class="form-group mb-3">
                            <div class="checkbox" style="visibility: hidden;">
                                <input type="checkbox" name="rememberme" value="rememberme">
                                <label>Keep me logged in</label>
                            </div>
                            <!-- <div class="pull-left"> -->
                                
                            <span class="float-left">Not a user? <a style="color: #ab47bc" class="" href="<?php echo base_url('user/signup') ?>">Signup</a></span>
                            <!-- </div> -->
                            <a class="float-right" style="color: #ab47bc" href="<?php echo base_url('user/forgot_passowrd')    ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-common log-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
