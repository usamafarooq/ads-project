<?php 
$contents = '
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
                <h1>Add '.str_replace("_"," ",ucfirst($controller_name)).'</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Add '.str_replace("_"," ",ucfirst($controller_name)).'</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/'.$controller_name.'/insert" enctype="multipart/form-data">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Add '.str_replace("_"," ",ucfirst($controller_name)).'</h4>
                            </div>
                        </div>
                        <div class="panel-body">';
 $con = 1;
foreach ($fileds as $f) {
   
    $contents .= '<div class="form-group row">

                                <label for="example-text-input" class="col-sm-3 col-form-label">'.str_replace("_"," ",ucfirst($f['name'])).'';
                                if ($f['required'] == 1) {
                                    $contents .= '<span class="required">*</span>';
                                    $req = 'required=""';
                                }
                                else{
                                    $req = ''; 
                                }
                                if ($f['type'] == 'INT') {
                                    $type = 'number';
                                }
                                elseif ($f['type'] == 'VARCHAR') {
                                    $type = 'text';
                                }
                                elseif ($f['type'] == 'TEXT') {
                                    $type = 'textarea';
                                }
                                elseif ($f['type'] == 'DATE') {
                                    $type = 'date';
                                }
                                if ($f['is_relation'] == 1) {
                                    $contents .='</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="'.$f['name'].'" '.$req.'>
                                                <option>Select '.str_replace("_"," ",ucfirst($f['name'])).'</option>';
                                                $column = explode(',', $f['value_column']);
                                                $contents .='<?php foreach ($table_'.$f["relation_table"].' as $t) {?>
                                                    <option value="<?php echo $t["'.$f['relation_column'].'"] ?>"><?php echo $t["'.$column[0].'"] ?></option>
                                               <?php } ?>';
                                            $contents .='</select>
                                        </div>

                                    </div>';
                                }
                                else{
                                    $contents .='</label>
                                        <div class="col-sm-9">';
if ($f['filed_type'] == 'checkbox') {
    $options = explode(',', $f['options']);
    for ($i=0; $i < sizeof($options); $i++) { 
        $contents .= '<div class="checkbox checkbox-info checkbox-inline">
            <input type="checkbox"  name="'.$f['name'].'[]" id="inlineCheckbox'.$con.'" value="'.$options[$i].'">
            <label for="inlineCheckbox'.$con.'"> '.ucfirst($options[$i]).' </label>
        </div>';
        $con++;
    }
} 
elseif ($f['filed_type'] == 'radio') {
    $options = explode(',', $f['options']);
    for ($i=0; $i < sizeof($options); $i++) { 
        $contents .= '<div class="radio radio-info radio-inline">
            <input type="radio"  name="'.$f['name'].'" id="inlineCheckbox'.$con.'" value="'.$options[$i].'">
            <label for="inlineCheckbox'.$con.'"> '.ucfirst($options[$i]).' </label>
        </div>';
        $con++;
    }
}
elseif ($f['filed_type'] == 'select') {
    $options = explode(',', $f['options']);
    $contents .='<select class="form-control" name="'.$f['name'].'" '.$req.'>
        <option>Select '.str_replace("_"," ",ucfirst($f['name'])).'</option>';
    for ($i=0; $i < sizeof($options); $i++) {
        $contents .= '<option value="'.$options[$i].'">'.ucfirst($options[$i]).'</option>';
    }
    $contents .='</select>';
}
elseif ($f['filed_type'] == 'file') {
    $contents .= '<input class="form-control" name="'.$f['name'].'" type="file" value="" id="example-text-input" placeholder="" '.$req.'>';
} 
elseif ($f['filed_type'] == 'textarea') {
    $contents .= '<textarea class="form-control" name="'.$f['name'].'" '.$req.'></textarea>';
}
else{
    $contents .= '<input class="form-control" name="'.$f['name'].'" type="'.$type.'" value="" id="example-text-input" placeholder="" '.$req.'>';
}                                          
                                        $contents .='</div>

                                    </div>';
                                }
                            //     $contents .='</label>
                            //     <div class="col-sm-9">
                            //         <input class="form-control" name="'.$f['name'].'" type="'.$type.'" value="" id="example-text-input" placeholder="" '.$req.'>
                            //     </div>

                            // </div>';
}                            

                            $contents .= '<div class="form-group row">

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
';
?>