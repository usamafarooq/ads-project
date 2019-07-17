
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
                <h1>Add User</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Add User</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/users/insert" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Add User</h4>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Username<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="username" type="text" value="" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Email<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="email" type="email" value="" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Password<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="password" type="password" value="" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Role<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role" required="">
                                        <option>Select Role</option>
                                        <?php 
                                            foreach ($role as $r) {
                                                echo '<option value="'.$r['id'].'">'.$r['name'].'</option>';
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
                                    <button type="submit" class="btn btn-primary pull-right">Add</button>
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
