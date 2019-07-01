
<style type="text/css">
    table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border-top: 0px solid #e4e5e7 !important;

</style>
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
                <h1>Role</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Role</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/role/insert" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        
                        <div class="panel-body">

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="" name="role" id="example-text-input" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                   <table class="table  ">
                                                <thead>
                                                    <tr>
                                                        <th><center>View</center></th>
                                                        <th><center>View All</center></th>
                                                        <th><center>Edit</center></th>
                                                        <th><center>Create</center></th>
                                                        <th><center>Delete</center></th>
                                                        <th><center>Disable</center></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                       
                                    
                                </div>
                            </div>
                            <?php 
                                foreach ($modules as $module) {
                            ?>
                            <div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label" style="    margin-top: -11px;"><?php echo $module['name'] ?></label>
                                <div class="col-sm-9" style="    margin-top: -29px;">
                                    <table class="table  ">

                                        <tbody class="professional_reference-append">   
                                            <tr>
                                                <td>
                                                    <div class="col-sm-2">
                                                        <input type="checkbox" data-toggle="toggle" name="<?php echo $module['id'] ?>[view]" value="1" data-on="Yes" data-off="No">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-2">
                                                        <input type="checkbox" data-toggle="toggle" name="<?php echo $module['id'] ?>[view_all]" value="1" data-on="Yes" data-off="No">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-2">
                                                        <input type="checkbox" data-toggle="toggle" name="<?php echo $module['id'] ?>[edit]" value="1" data-on="Yes" data-off="No">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-2">
                                                        <input type="checkbox" data-toggle="toggle" name="<?php echo $module['id'] ?>[created]" value="1" data-on="Yes" data-off="No">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-2">
                                                        <input type="checkbox" data-toggle="toggle" name="<?php echo $module['id'] ?>[deleted]" value="1" data-on="Yes" data-off="No">

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-sm-2">
                                                        <input type="checkbox" data-toggle="toggle" name="<?php echo $module['id'] ?>[disable]" value="1" data-on="Yes" data-off="No">

                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div> 
                            <?php } ?>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
