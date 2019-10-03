
<!-- /.Navbar  Static Side -->
<div class="control-sidebar-bg"></div>
<!-- Page Content -->
<div id="page-wrapper">
    <!-- main content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Edit User</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit User</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->
       
        <form method="post" action="<?php echo base_url() ?>admin/users/update" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit User</h4>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Username<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="username" type="text" value="<?php echo $user['username'] ?>" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                <?php 
                    foreach($role as $singlerole){
                        if($singlerole['id'] == $user['role']){
                            echo '<input type="hidden" value="'.$singlerole['name'].'" name="user_role">';
                            if($singlerole['name'] == 'User'){
                ?>      
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">First Name<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="first_name" type="text" value="<?php echo $user['first_name'] ?>" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Last Name<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="last_name" type="text" value="<?php echo $user['last_name'] ?>" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Withdrawal Type<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="withrawal_type" required="">
                                            <option value="">Select Withdrawal Type*</option>
                                            <option value="Jazzcash" <?php if($user['withrawal_type'] == 'Jazzcash') { echo "selected"; } ?>>Jazzcash</option>
                                            <option value="Easypaisa" <?php if($user['withrawal_type'] == 'Easypaisa') { echo "selected"; } ?>>Easypaisa</option>
                                            <option value="Meezan Bank" <?php if($user['withrawal_type'] == 'Meezan Bank') { echo "selected"; } ?>>Meezan Bank</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Mobile/Whatsapp No<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="phone" type="text" value="<?php echo $user['phone'] ?>" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">CNIC<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="cnic" type="text" value="<?php echo $user['cnic'] ?>" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Jazz/EasyPaisa No<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="jazz_no" type="text" value="<?php echo $user['jazz_no'] ?>" id="example-text-input" placeholder="" required="">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Referrer Email<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="referrer" type="text" value="<?php echo $user['referrer'] ?>" id="example-text-input" placeholder="" >
                                        <div class="help-block text-danger"><?php echo form_error('referrer') ?></div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">City<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        
                                        <select class="form-control" name="city_id" required="">
                                            <?php foreach ($cities as $city): ?>
                                                <?php 
                                                    if($city['name'] == $user['city_id']){
                                                        $selected = "selected";
                                                    } else {
                                                        $selected = "";
                                                    }
                                                 ?>
                                            <option value="<?php echo $city['name'] ?>" <?php echo $selected ?>><?php echo $city['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Package<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        
                                        <select class="form-control" name="pricing_plan_id" id="pricing_plan_id" required="">
                                            <?php foreach ($packages as $package): ?>
                                                <?php 
                                                    if($package['id'] == $plan_user['pricing_plan_id']){
                                                        $selected = "selected";
                                                    } else {
                                                        $selected = "";
                                                    }
                                                 ?>
                                            <option data-duration="<?php echo $package['Duration'] ?>" value="<?php echo $package['id'] ?>" <?php echo $selected ?>><?php echo $package['Name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Package Duration<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        
                                        <select class="form-control" data-ext-duration="<?php echo $pricing_plan['Duration'] ?>" data-user-id="<?php echo $plan_user['user_id'] ?>" id="package" name="package">
                                           <option value="continue">Continue</option>
                                           <option value="extend">Extended</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <input type="hidden" id="oldExpiry" value="<?php echo $plan_user['expire_at']; ?>">

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Expiry Date<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="expire_at" type="text" value="<?php echo $plan_user['expire_at'] ?>" id="expire_at" placeholder="" required="">
                                    </div>

                                </div>

                <?php
                            }
                        }
                    }
                ?>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Email<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="email" type="email" value="<?php echo $user['email'] ?>" readonly id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Password<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="password" type="password" value="" id="example-text-input" placeholder="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Role<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role" required="">
                                        <option>Select Role</option>
                                        <?php 
                                            foreach ($role as $r) {
                                                if ($r['id'] == $user['role']) {
                                                    $checked = 'selected';
                                                }
                                                else{
                                                    $checked = '';
                                                }
                                                echo '<option '.$checked.' value="'.$r['id'].'">'.$r['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                            </div>
<?php if ($this->session->flashdata('error')): ?>
                <a class="btn btn-danger block full-width m-b"><?php echo $this->session->flashdata('error'); ?></a>

<?php endif ?>
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
<!-- /.main content -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- START CORE PLUGINS -->
