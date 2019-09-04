<?php 
    
    $ref = '';
    if ($this->input->get('ref')) {
        $ref = $this->input->get('ref');
        $ref = urldecode($ref);
        $ref = encrypt_decrypt('decrypt', $ref);
    }

 ?>

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

    <section class="register section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="register-form login-area">
                        <h3>
                            Signup
                        </h3>
                        <form class="login-form validate-signup" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" required="" name="first_name" placeholder="First Name*">
                                    </div>
                                    <?php //if (form_error('first_name')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('first_name') ?></div>
                                    <?php //endif ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text"class="form-control" required="" name="last_name" placeholder="Last Name*">
                                    </div>
                                    <?php //if (form_error('last_name')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('last_name') ?></div>
                                    <?php //endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <select class="form-control" required="" id="withrawal_type" name="withrawal_type">
                                            <option value="">Select Withdrawal Type*</option>
                                            <option value="Jazzcash">Jazzcash</option>
                                            <option value="Easypaisa">Easypaisa</option>
                                            <option value="Meezan Bank">Meezan Bank</option>
                                        </select>
                                    </div>
                                    <?php //if (form_error('first_name')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('withrawal_type') ?></div>
                                    <?php //endif ?>
                                </div>
                                <div class="col-md-6  account_number_div d-none">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text"class="form-control" required="" id="account_number" name="account_number" data-inputmask="'mask': '9999-9999999999'" placeholder="Account Number*">
                                    </div>
                                    <?php //if (form_error('last_name')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('account_number') ?></div>
                                    <?php //endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text" class="form-control" required="" name="username" placeholder="Username*">
                                    </div>
                                    <?php //if (form_error('username')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('username') ?></div>
                                    <?php //endif ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-phone-handset"></i>
                                        <input type="text" class="form-control" required="" id="phone" name="phone" data-inputmask="'mask': '0399-9999999'" placeholder="Mobile/WhatsApp No*">
                                    </div>
                                    <?php //if (form_error('phone')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('phone') ?></div>
                                    <?php //endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="email" class="form-control" id="email" required="" name="email" placeholder="Email*">
                                    </div>
                                    <?php //if (form_error('email')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('email') ?></div>
                                    <?php //endif ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="email" class="form-control" required="" name="re_email" placeholder="Re-type Email*">
                                    </div>
                                    <?php //if (form_error('re_email')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('re_email') ?></div>
                                    <?php //endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-key"></i>
                                        <input type="password" id="password" class="form-control" required="" name="password" placeholder="Password*">
                                    </div>
                                    <?php //if (form_error('password')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('password') ?></div>
                                    <?php //endif ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-key"></i>
                                        <input type="password" class="form-control" required="" id="c-password" name="con_password" placeholder="Confirm Password*">
                                    </div>
                                    <?php //if (form_error('con_password')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('con_password') ?></div>
                                    <?php //endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" required="" minlength="15" name="cnic" id="cnic" placeholder="CNIC*" data-inputmask="'mask': '99999-9999999-9'">
                                    </div>
                                    <?php //if (form_error('cnic')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('cnic') ?></div>
                                    <?php //endif ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-phone-handset"></i>
                                        <input type="text" class="form-control" id="jazz_no" required="" name="jazz_no" data-inputmask="'mask': '0399-9999999'" placeholder="Jazz/Warid Cash No*">
                                    </div>
                                    <?php //if (form_error('jazz_no')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('jazz_no') ?></div>
                                    <?php //endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <select class="form-control select100" required="" name="city_id" id="city">
                                            <option value="">Select City*</option>
                                            <?php foreach ($cities as $city): ?>
                                            <option value="<?php echo $city['name'] ?>"><?php echo $city['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <?php //if (form_error('city_id')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('city_id') ?></div>
                                    <?php //endif ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="email" class="form-control" value="<?php echo $ref ?>" id="referrer" name="referrer" placeholder="Referral Email">
                                    </div>
                                    <?php //if (form_error('referrer')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('referrer') ?></div>
                                    <?php //endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <select class="form-control" required="" name="package">
                                            <option value="">Select Package*</option>
                                            <?php if ($pricing_plan) : ?>
                                                <?php foreach ($pricing_plan as $pricing): ?>
                                                    <option value="<?php echo $pricing['id'] ?>"><?php echo $pricing['Name'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                    <?php //if (form_error('package')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('package') ?></div>
                                    <?php //endif ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3 col-md-6">
                            <div class="checkbox">
                                    <input type="checkbox" required="" name="terms">
                                    <label>By registering, you accept our <a href="<?php echo base_url('terms') ?>" target="_blank">Terms & Conditions</a></label>
                                </div>
                                <?php //if (form_error('terms')): ?>
                                    <div class="help-block text-danger"><?php echo form_error('terms') ?></div>
                                <?php //endif ?>
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
<script>
    $(":input").inputmask();
    $('#withrawal_type').on('change', function(event) {
        var withrawal_type = $(this).val();
        if (withrawal_type == 'Meezan Bank') 
        {
            $('#account_number').attr('required');
            $('.account_number_div').removeClass('d-none');

        }
        else{
            $('#account_number').removeAttr('required');
            $('.account_number_div').addClass('d-none');
        }
    });
</script>