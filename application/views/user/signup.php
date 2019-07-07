<div class="page-header" style="background: url('<?php echo base_url('front_assets/img/banner1.jpg') ?>');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper">
                        <h2 class="product-title">Signup</h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>">Home /</a></li>
                            <li class="current">Signup</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="register section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>
                            Signup
                        </h3>
                        <form class="login-form" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text" id="sender-email" class="form-control" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" id="Name" class="form-control" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text" id="sender-email" class="form-control" name="phone" placeholder="Mobile/WhatsApp No.">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text" id="sender-email" class="form-control" name="re_email" placeholder="Re-type Email">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="password" id="Name" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="password" id="sender-email" class="form-control" name="con_password" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" id="Name" class="form-control" name="cnic" placeholder="CNIC">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text" id="sender-email" class="form-control" name="jazz_no" placeholder="Jazz/Warid Cash No.">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <select class="form-control select100" name="city_id" id="city">
                                            <option >Select City</option>
                                            <option value="">Islamabad</option>
                                            <option value="">Karachi</option>
                                            <option value="">Lahore</option>
                                            <option value="">Faislabad</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text" id="sender-email" class="form-control" name="referrer" placeholder="Not Have? Leave Blank">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <select class="form-control" name="package">
                                            <option >Select Package</option>
                                            <?php if ($pricing_plan) : ?>
                                                <?php foreach ($pricing_plan as $pricing): ?>
                                                    <option value="<?php echo $pricing['id'] ?>"><?php echo $pricing['Name'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                                <div class="checkbox">
                                    <input type="checkbox" name="terms">
                                    <label>By registering, you accept our Terms & Conditions</label>
                                </div>
                            </div>
                            
                            
                            
                            <div class="text-center">
                                <button class="btn btn-common log-btn">Signup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
