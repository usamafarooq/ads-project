
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
                <h1>Edit Pricing plan</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Pricing plan</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/pricing_plan/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $pricing_plan["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Pricing plan</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Name<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $Name = explode(",", $pricing_plan["Name"]) ?>
                                        <input class="form-control" name="Name" type="text" value="<?php echo $pricing_plan["Name"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Click Price<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $Click_Price = explode(",", $pricing_plan["Click_Price"]) ?>
                                        <input class="form-control" name="Click_Price" type="text" value="<?php echo $pricing_plan["Click_Price"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Refer Click Price<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $Refer_Click_Price = explode(",", $pricing_plan["Refer_Click_Price"]) ?>
                                        <input class="form-control" name="Refer_Click_Price" type="text" value="<?php echo $pricing_plan["Refer_Click_Price"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Daily Ads<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $Daily_Ads = explode(",", $pricing_plan["Daily_Ads"]) ?>
                                        <input class="form-control" name="Daily_Ads" type="text" value="<?php echo $pricing_plan["Daily_Ads"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Amount<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $Amount = explode(",", $pricing_plan["Amount"]) ?>
                                        <input class="form-control" name="Amount" type="text" value="<?php echo $pricing_plan["Amount"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Duration<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $Duration = explode(",", $pricing_plan["Duration"]) ?>
                                        <input class="form-control" name="Duration" type="text" value="<?php echo $pricing_plan["Duration"] ?>" id="example-text-input" placeholder="" required=""></div>

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
