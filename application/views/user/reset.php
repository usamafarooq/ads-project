<div class="page-header" style="background: url('<?php echo base_url('front_assets/img/banner1.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Reset</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('') ?>">Home /</a></li>
                        <li class="current">Reset</li>
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
                        Reset Password
                    </h3>
                    <form role="form" method="POST" class="login-form validate-reset">
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-lock"></i>
                                <input type="password" class="form-control" required="" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="help-block text-danger"></div>
                        </div>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="lni-lock"></i>
                                <input type="password" class="form-control" id="c-password" name="con_password" required="" placeholder="Confirm Password">
                            </div>
                            <div class="help-block text-danger"></div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="checkbox" style="visibility: hidden;">
                                <input type="checkbox" name="rememberme" value="rememberme">
                                <label>Keep me logged in</label>
                            </div>
                            <!-- <div class="pull-left"> -->
                                
                            <span class="float-left">Not a user? <a style="color: #ab47bc" class="" href="<?php echo base_url('user/signup') ?>">Signup</a></span>
                            <!-- </div> -->
                            <a class="float-right" style="color: #ab47bc" href="<?php echo base_url('user/login')    ?>">Login?</a>
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
