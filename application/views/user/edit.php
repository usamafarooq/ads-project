<div class="page-header" style="background: url('<?php echo base_url('front_assets/img/banner1.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Edit Profile</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home /</a></li>
                        <li class="current">Edit Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('success')): ?>
<div class="col-md-12 alert alert-success">
    <strong>Success!</strong> <?php echo $this->session->flashdata('success') ?>
</div>
<?php endif; ?>

<section class="register section-padding">
    <div class="container">
        <div class="row">
            <?php $this->load->view('user/user_sidebar'); ?>
                <div class="col-sm-12 col-md-8 col-lg-9">
                <div class="register-form login-area">
                    <h3>Edit Profile</h3>
                    <form class="login-form validate-edit-user" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" required name="first_name" placeholder="First Name" value="<?php echo $user['first_name'] ?>">
                                    </div>
                                    <div class="help-block text-danger"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" required name="last_name" placeholder="Last Name" value="<?php echo $user['last_name'] ?>">
                                    </div>
                                    <div class="help-block text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <select class="form-control" required="" id="withrawal_type" name="withrawal_type">
                                            <option value="" <?php echo ($user['withrawal_type'] == '') ? 'selected' : '' ?>>Select Withdrawal Type*</option>
                                            <option value="Jazzcash" <?php echo ($user['withrawal_type'] == 'Jazzcash') ? 'selected' : '' ?>>Jazzcash</option>
                                            <option value="Easypaisa" <?php echo ($user['withrawal_type'] == 'Easypaisa') ? 'selected' : '' ?>>Easypaisa</option>
                                            <option value="Meezan Bank" <?php echo ($user['withrawal_type'] == 'Meezan Bank') ? 'selected' : '' ?>>Meezan Bank</option>
                                        </select>
                                    </div>
                                    <?php //if (form_error('first_name')): ?>
                                        <div class="help-block text-danger"><?php echo form_error('withrawal_type') ?></div>
                                    <?php //endif ?>
                                </div>
                                <div class="col-md-6  account_number_div d-none">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text"class="form-control" required="" id="account_number" value="<?php echo $user['account_number'] ?>" name="account_number" data-inputmask="'mask': '9999-9999999999'" placeholder="Account Number*">
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
                                        <input type="text" class="form-control" name="email" readonly="" placeholder="Email" value="<?php echo $user['email'] ?>">
                                    </div>
                                    <div class="help-block text-danger"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-phone-handset"></i>
                                        <input type="text" class="form-control" id="phone" required name="phone" data-inputmask="'mask': '0399-9999999'" placeholder="Mobile/WhatsApp No." value="<?php echo $user['phone'] ?>">
                                    </div>
                                    <div class="help-block text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-key"></i>
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="help-block text-danger"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-key"></i>
                                        <input type="password" id="c-password" class="form-control" name="con_password" placeholder="Confirm Password">
                                    </div>
                                    <div class="help-block text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" id="cnic" required placeholder="CNIC" data-inputmask="'mask': '99999-9999999-9'" name="cnic" value="<?php echo $user['cnic'] ?>">
                                    </div>
                                    <div class="help-block text-danger"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-phone-handset"></i>
                                        <input type="text" id="jazz_no" required data-inputmask="'mask': '0399-9999999'" class="form-control" name="jazz_no" placeholder="Jazzcash/ Easypaisa No*" value="<?php echo $user['jazz_no'] ?>">
                                    </div>
                                    <div class="help-block text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
 
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <select class="form-control select100" required="" name="city_id" id="city">
                                            <option value="">Select City</option>
                                            <?php foreach ($cities as $city): ?>
                                            <option value="<?php echo $city['name'] ?>" <?php echo ($city['name'] == $user['city_id']) ? 'selected' : ''; ?>><?php echo $city['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="help-block text-danger"></div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-common log-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(":input").inputmask();
    var withrawal_type = $('#withrawal_type').val();
    show_account(withrawal_type);
    $('#withrawal_type').on('change', function(event) {
        var withrawal_type = $(this).val();
        show_account(withrawal_type);
    });

    function show_account(withrawal_type) {
        if (withrawal_type == 'Meezan Bank') 
        {
            $('#account_number').attr('required');
            $('.account_number_div').removeClass('d-none');

        }
        else{
            $('#account_number').removeAttr('required');
            $('.account_number_div').addClass('d-none');
        }
    }
</script>