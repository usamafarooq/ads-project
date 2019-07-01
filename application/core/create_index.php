<?php 
$contents = '		<!-- /.Navbar  Static Side -->
			<div class="control-sidebar-bg"></div>
			<!-- Page Content -->
			<div id="page-wrapper">
				<!-- main content -->
				<div class="content">
					<!-- Content Header (Page header) -->
					<div class="content-header">
						<div class="header-icon">
							<i class="pe-7s-box1"></i>
						</div>
						<div class="header-title">
							<h1>View '.str_replace("_"," ",ucfirst($controller_name)).'</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>admin/"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">View '.str_replace("_"," ",ucfirst($controller_name)).'</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>View '.str_replace("_"," ",ucfirst($controller_name)).'</h4>
										<?php 
											if (%permission["created"] == "1") {
										?>
										<a href="<?php echo base_url("admin/'.$controller_name.'/create") ?>"><button class="btn btn-info pull-right">Add '.str_replace("_"," ",ucfirst($controller_name)).'</button></a>
										<?php } ?>
									</div>
								</div>
								<div class="panel-body">
									
									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Id</th>';
foreach ($fileds as $f) {
	if ($f['is_relation'] == 1) {
		$column = explode(',', $f['value_column']);
		for ($i=0; $i < sizeof($column); $i++) { 
			$contents .= '<th>'.str_replace("_"," ",ucfirst($column[$i])).'</th>';
		}
	}
	else{
		$contents .= '<th>'.str_replace("_"," ",ucfirst($f['name'])).'</th>';
	}
}
													
													$contents .= '<?php 
														if (%permission["edit"] == "1" || %permission["deleted"] == "1"){
													?>
													<th>Action</th>
													<?php } ?>
												</tr>
											</thead>
										    <tbody>
										    	<?php
										    		foreach (%'.$controller_name.' as %module) {
										    	?>
												<tr>
													<td><?php echo %module["id"] ?></td>';
foreach ($fileds as $f) {
	if ($f['is_relation'] == 1) {
		$column = explode(',', $f['value_column']);
		for ($i=0; $i < sizeof($column); $i++) { 
			$contents .= '<td><?php echo %module["'.$column[$i].'"] ?></td>';
		}
	}
	else{
		if ($f['filed_type'] == 'file') {
			$contents .= '<td><a href="<?php echo base_url() ?>/<?php echo %module["'.$f['name'].'"] ?>">View File</a></td>';
		}
		else{
			$contents .= '<td><?php echo %module["'.$f['name'].'"] ?></td>';
		}
	}
}													
													$contents .= '<?php 
														if (%permission["edit"] == "1" || %permission["deleted"] == "1"){
													?>
													<td>
														<?php 
															if (%permission["edit"] == "1") {
														?>
														<a href="<?php echo base_url() ?>admin/'.$controller_name.'/edit/<?php echo %module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="35" height="35"></a>
														<?php } ?>
														<?php 
															if (%permission["deleted"] == "1") {
														?>
		                                                <a href="<?php echo base_url() ?>admin/'.$controller_name.'/delete/<?php echo %module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a>
		                                                <?php } ?>
	                                                </td>
	                                                <?php } ?>
												</tr>
												<?php } ?>
											</tbody>
										</table>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div style="height: 450px;"></div>
				</div> <!-- /.main content -->
			</div><!-- /#page-wrapper -->
		</div><!-- /#wrapper -->
		<!-- START CORE PLUGINS -->






';
?>