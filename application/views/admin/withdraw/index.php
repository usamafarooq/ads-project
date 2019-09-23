		<!-- /.Navbar  Static Side -->
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
							<h1>View Withdraw</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>admin/"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">View Withdraw</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>View Withdraw</h4>
										<?php 
											if ($permission["created"] == "1") {
										?>
										<!-- <a href="<?php echo base_url("admin/withdraw/create") ?>"><button class="btn btn-info pull-right">Add Withdraw</button></a> -->
										<?php } ?>
									</div>
								</div>
								<div class="panel-body">
									
									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Id</th>
													<th>First name</th>
													<th>Last name</th>
													<th>Jazz no</th>
													<th>Amount</th>
													<th>Withdrawal Type</th>
													<th>Requested At</th>
													<th>Aprroved At</th>
													<th>Status</th>

													<?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<th>Action</th>

													<?php } ?>
												</tr>
											</thead>
										    <tbody>
										    	<?php
										    		foreach ($withdraw as $module) {
										    	?>
												<tr>
													<td><?php echo $module["id"] ?></td>
													<td><?php echo $module["first_name"] ?></td>
													<td><?php echo $module["last_name"] ?></td>
													<td><?php echo $module["jazz_no"] ?></td>
													<td><?php echo $module["Amount"] ?></td>
													<td>
														<?php $prefix = ''; ?>
														<?php 
															if (empty($module['withrawal_type'])) 
																$prefix = 'user_';
														?>
															
														<?php echo $module[$prefix.'withrawal_type'] ?>
														<?php echo ($module[$prefix.'withrawal_type'] == 'Meezan Bank') ? '('.$module[$prefix.'account_number'].')' : '' ?>
													</td>
													<td><?php echo date('d-M-Y', strtotime($module['created_at'])) ?></td>
													<td id="approve-<?php echo $module["id"] ?>"><?php echo ($module['approve_date'] != '0000-00-00 00:00:00')  ? date('d-M-Y', strtotime($module['approve_date'])) : '-' ?></td>
													<td id="status-<?php echo $module["id"] ?>"><?php echo $module["Status"] ?></td>


													<?php 
														if ($permission["edit"] == "1" || $permission["deleted"] == "1"){
													?>
													<td id="action-<?php echo $module["id"] ?>">
														<?php 
															if ($permission["edit"] == "1") {
														?>
														<?php if($module['Status'] == 'Pending'): ?>
														<!-- <a href="<?php // echo base_url() ?>admin/withdraw/approve/<?php //echo $module["id"] ?>">Approve</a> -->
														<a class="withdraw_action" href="javascript:void()" data-url="<?php echo base_url() ?>admin/withdraw/approve/" data-withdrawId="<?php echo $module["id"] ?>">Approve</a>
														<?php else: ?>
															-
													<?php endif; ?>
														<!-- <a href="<?php echo base_url() ?>admin/withdraw/edit/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/record1.png" title="View Order" alt="View Order" width="35" height="35"></a>
														<?php } ?>
														<?php 
															if ($permission["deleted"] == "1") {
														?>
		                                                <a href="<?php echo base_url() ?>admin/withdraw/delete/<?php echo $module["id"] ?>"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a> -->
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

		<div class="ajax-loader">
			<div class="ajax-spinner">
				<i class="fa fa-spinner fa-spin"></i>
			</div>
		</div>
		<!-- START CORE PLUGINS -->






