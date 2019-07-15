
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
                <h1>Edit Ads</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Ads</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/ads/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $ads["id"] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Ads</h4>
                            </div>
                        </div>
                        <div class="panel-body"><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Name<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $Name = explode(",", $ads["Name"]) ?>
                                        <input class="form-control" name="Name" type="text" value="<?php echo $ads["Name"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Link<span class="required">*</span></label>
                                        <div class="col-sm-9">
<?php $link = explode(",", $ads["link"]) ?>
                                        <input class="form-control" name="link" type="text" value="<?php echo $ads["link"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div><!-- <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Clicks<span class="required">*</span></label>
                                        <div class="col-sm-9"><input class="form-control" name="click" type="number" value="<?php echo $ads["click"] ?>" id="example-text-input" placeholder="" required=""></div>

                                    </div> --><div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-9">
<?php $image = explode(",", $ads["image"]) ?>
                                        <input class="form-control" name="image" type="file" value="" id="example-text-input" placeholder=""></div>

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
