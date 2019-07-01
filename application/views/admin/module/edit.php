
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
                <h1>Edit Modules</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Edit Modules</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/modules/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $module['id'] ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Edit Modules</h4>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Name<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="name" type="text"  value="<?php  echo $module['name'] ?>" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Main Name<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="main_name" value="<?php  echo $module['main_name'] ?>" type="text" value="" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Sort<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="sort" value="<?php  echo $module['sort'] ?>" type="text" value="" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Icon<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="icon" type="text"  value="<?php echo $module['icon'] ?>" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>

                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">Url<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="Url" type="text"  value="<?php  echo $module['url'] ?>" id="example-text-input" placeholder="" required="">
                                </div>

                            </div>

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
