
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
                <h1>Add Fileds</h1>
                <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li class="active">Add Fileds</li>
                </ol>
            </div>
        </div>
        <!-- /. Content Header (Page header) -->

        <form method="post" action="<?php echo base_url() ?>admin/modules/fields_insert" enctype="multipart/form-data">
            <input type="hidden" name="module_id" value="<?php echo $id ?>">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd ">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Add Fileds</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="after-add-sub">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Name<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="name[]" type="text" value="" id="example-text-input" placeholder="" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Filed Type<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control filed-type" name="filed-type[]" required="">
                                            <option>Select Type</option>
                                            <option value="input">Input</option>
                                            <option value="textarea">Textarea</option>
                                            <option value="checkbox">Checkbox</option>
                                            <option value="radio">Radio</option>
                                            <option value="select">Dropdown</option>
                                            <option value="file">File</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row filed-options" style="display: none;">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Options<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="options[]" class="form-control" placeholder="Comma Separated Values">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Type<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="type[]" required="">
                                            <option>Select Type</option>
                                            <option value="INT">INT</option>
                                            <option value="VARCHAR">VARCHAR</option>
                                            <option value="TEXT">TEXT</option>
                                            <option value="DATE">DATE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">length<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="length[]" type="number" value="" id="example-text-input" placeholder="" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label">Required<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="required[0]" type="checkbox" value="1" id="example-text-input" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2 delet pull-right">
                                        <button type="button" class="add-sub btn btn-success ">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <div class="all-q row">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label ">Relation<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control relation" name="relation_table" required="">
                                            <option>Select Relation</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hide-div row" style="display: none;">
                                    <div class="form-group col-md-3">
                                        <label>Table</label><br>
                                        <select name="table[]" class="form-control table">
                                            <option>Select Table</option>
                                            <?php 
                                                for ($i=0; $i < sizeof($tables); $i++) { 
                                                    echo '<option value="'.$tables[$i].'">'.ucfirst($tables[$i]).'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Relation Colume</label><br>
                                        <select name="relation[]" class="form-control relation_column">
                                            <option>Select Colume</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Against</label><br>
                                        <select name="against[]" class="form-control against_column">
                                            <option>Select Colume</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Value Colume</label><br>
                                        <select name="value[0][]" multiple="" class="form-control value">
                                            <option>Select Colume</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-2 delet pull-right">
                                            <button type="button" class="add-relation btn btn-success ">Add More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<script type="text/javascript">
    $("body").on("click",".add-sub",function(){
        var html = $(".after-add-sub").first().clone();
        $(html).find(".delet").html("<a class='btn btn-danger remove'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> "+' <a class="btn btn-success add-sub"><strong> + </strong> </a>');
        $(".after-add-sub").last().after(html);
        $(".after-add-sub").last().find('input,select').not('input[type="checkbox"]').val('')
        $(".after-add-sub").last().find('input[type="checkbox"]').removeAttr('checked')
        $(".after-add-sub").last().find('.hide-div').hide()
        var con = 0
        $(".after-add-sub").each(function() {
            $(this).find('input[type="checkbox"]').attr('name','required['+con+']')
            con++
        })
        get_tables()
        filed_type()
    });
    $("body").on("click",".remove",function(){
        $(this).parents(".after-add-sub").remove();
        var con = 0
        $(".after-add-sub").each(function() {
            $(this).find('input[type="checkbox"]').attr('name','required['+con+']')
            con++
        })
    });


    $("body").on("click",".add-relation",function(){
        var html = $(".hide-div").first().clone();
        $(html).find(".delet").html("<a class='btn btn-danger remove-relation'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> "+' <a class="btn btn-success add-sub"><strong> + </strong> </a>');
        $(".hide-div").last().after(html);
        $(".hide-div").last().find('input,select').not('input[type="checkbox"]').val('')
        $(".hide-div").last().find('input[type="checkbox"]').removeAttr('checked')
        var con = 0
        $(".hide-div").each(function() {
            $(this).find('.value').attr('name','value['+con+'][]')
            con++
        })
        get_tables()

        var against = $('.against_column').last()
        against.empty();
        against.append('<option>Select Colume</option>')
        $('[name="name[]"]').each(function() {
            against.append('<option value="'+$(this).val()+'">'+$(this).val()+'</option>')
        })
    });
    $("body").on("click",".remove-relation",function(){
        $(this).parents(".hide-div").remove();
        var con = 0
        $(".hide-div").each(function() {
            $(this).find('.value').attr('name','value['+con+'][]')
            con++
        })
    });

    function get_tables() {
        $('.relation').change(function() {
            var th = $(this)
            var against = $('.against_column').last()
            if($(this).val() == 'yes'){
                $(this).parent().parent().parent().find('.hide-div').show()
                against.empty();
                against.append('<option>Select Colume</option>')
                $('[name="name[]"]').each(function() {
                    against.append('<option value="'+$(this).val()+'">'+$(this).val()+'</option>')
                })
            }
            else{
                $(this).parent().parent().parent().find('.hide-div').hide()
            }
        })
        $('.table').change(function() {
            var th = $(this)
            var relation = th.parent().parent().find('.relation_column')
            var value_column = th.parent().parent().find('.value')
            if($(this).val()){
                var value = $(this).val()
                $.ajax({
                  type: "GET",
                  url: "<?php echo base_url('admin/modules/get_colume/') ?>"+value,
                  dataType: 'json',
                  success: function(html)
                  {
                    //var html = JSON.stringify(html);
                    relation.empty();
                    value_column.empty();
                    relation.append('<option>Select Colume</option>')
                    value_column.append('<option>Select Colume</option>')
                    for (var i = 0; i < html.length; i++) {
                        console.log(html[i])
                        value_column.append('<option value="'+html[i]['Field']+'">'+html[i]['Field']+'</option>')
                        var type = html[i]['Type']
                        type = type.split('(')
                        type = type[0]
                        if(type == 'int'){
                            relation.append('<option value="'+html[i]['Field']+'">'+html[i]['Field']+'</option>')
                        }
                    }
                  }
                });
            }
        })
    }
    get_tables()
    function filed_type() {
        $('.filed-type').change(function() {
            var val = $(this).val()
            $(this).parent().parent().parent().find('.filed-options input').val('')
            if(val == 'checkbox' || val == 'radio' || val == 'select' || val == 'file'){
                $(this).parent().parent().parent().find('.filed-options').show()
            }
            else{
                $(this).parent().parent().parent().find('.filed-options').hide()
            }
        })
    }
    filed_type()
</script>