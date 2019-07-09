
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
                <h1>Edit Withdraw</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Withdraw</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/withdraw/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $withdraw["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Withdraw</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">User<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="User" required="">
                                                <option>Select User</option><?php foreach ($table_users as $t) {?>
                                                    <option value="<?php echo $t["id"] ?>" <?php if($t["id"] == $withdraw["User"]) echo "selected" ?>><?php echo $t["first_name"] ?></option>
                                               <?php } ?></select>
                                        </div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Amount<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $Amount = explode(",", $withdraw["Amount"]) ?>
                                        <input class="form-control" name="Amount" type="text" value="<?php echo $withdraw["Amount"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Status<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $Status = explode(",", $withdraw["Status"]) ?>
                                        <select class="form-control" name="Status" required="">
        <option>Select Status</option><option value="Pending" <?php if("Pending" == $withdraw["Status"]) echo "selected" ?>>Pending</option><option value="Accept" <?php if("Accept" == $withdraw["Status"]) echo "selected" ?>>Accept</option><!-- <option value="Reject" <?php if("Reject" == $withdraw["Status"]) echo "selected" ?>>Reject</option> --></select></div>

                                    </div><div class="form-group row">

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
