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


<section class="register section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="register-form login-area">
                    <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo $this->session->flashdata('success') ?>
                    </div>
                    <?php endif; ?>
                    <h3>Edit Profile</h3>
                    <form class="login-form" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?php echo $user['first_name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php echo $user['last_name'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" name="email" readonly="" placeholder="Email" value="<?php echo $user['email'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text" class="form-control" name="phone" data-inputmask="'mask': '0399-9999999'" placeholder="Mobile/WhatsApp No." value="<?php echo $user['phone'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="password" class="form-control" name="con_password" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-user"></i>
                                        <input type="text" class="form-control" name="cnic" placeholder="CNIC" data-inputmask="'mask': '99999-9999999-9'" name="cnic" value="<?php echo $user['cnic'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-icon">
                                        <i class="lni-envelope"></i>
                                        <input type="text" data-inputmask="'mask': '0399-9999999'" class="form-control" name="jazz_no" placeholder="Jazz/Warid Cash No." value="<?php echo $user['jazz_no'] ?>">
                                    </div>
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
</script>