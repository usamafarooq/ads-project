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
							<h1>View Users</h1>
							<small> </small>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url() ?>"><i class="pe-7s-home"></i> Home</a></li>

								<li class="active">View Users</li>
							</ol>
						</div>
					</div> <!-- /. Content Header (Page header) -->

					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-bd">
								<div class="panel-heading">
									<div class="panel-title">
										<h4>View Users</h4>
										<?php 
											if ($permission['created'] == '1') {
										?>
										<a href="<?php echo base_url('admin/users/create') ?>"><button class="btn btn-info pull-right">Add Users</button></a>
										<?php } ?>
									</div>
								</div>
								<div class="panel-body">
									
									<div class="table-responsive">
										<table id="dataTableExample2" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th>Id</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Jazz/Warid no</th>
													<th>CNIC</th>
													<th>City</th>
													<th>Referrer</th>
													<th>Package</th>
													<th>Current Earning</th>
													<th>Pending withdraw</th>
													<th>Approved withdraw</th>
													<th>Status</th>
													<th>Role</th>
													<?php 
														if ($permission['edit'] == '1' || $permission['deleted'] == '1'){
													?>
													<th>Action</th>
													<?php } ?>
												</tr>
											</thead>
										    <tbody>
										    	<?php
										    		foreach ($users as $user) {
										    	?>
												<tr>
													<td><?php echo $user['id'] ?></td>
													<td><?php echo $user['first_name'].' '. $user['last_name'] ?></td>
													<td><?php echo $user['email'] ?></td>
													<td><?php echo $user['phone'] ?></td>
													<td><?php echo $user['jazz_no'] ?></td>
													<td><?php echo $user['cnic'] ?></td>
													<td><?php echo $user['city_id'] ?></td>
													<td><?php echo $user['referrer'] ?></td>
													<td><?php echo $user['package'] ?></td>
													<td><?php echo $user['amount'] ?></td>
													<td><?php echo $user['approve_amount'] ?></td>
													<td><?php echo $user['pending_amount'] ?></td>
													<td>
														<?php if ($user['status'] == 'Pending'): ?>
															
														<a href="<?php echo base_url() ?>admin/users/status/<?php echo $user['id'] ?>/approved" onclick="return confirm('are you sure you want to change status')"><?php echo $user['status'] ?></a>
														<?php elseif($user['status'] == 'Approved') :?>
														<a href="<?php echo base_url() ?>admin/users/status/<?php echo $user['id'] ?>/inactive" onclick="return confirm('are you sure you want to change status')"><?php echo $user['status'] ?></a>
														<?php else: ?>
														<a href="<?php echo base_url() ?>admin/users/status/<?php echo $user['id'] ?>/approved" onclick="return confirm('are you sure you want to change status')"><?php echo $user['status'] ?></a>

														<?php endif ?>

														<!-- <?php //echo $user['status'] ?> -->
															
													</td>
													<td><?php echo $user['role'] ?></td>
													<?php 
														if ($permission['edit'] == '1' || $permission['deleted'] == '1'){
													?>
													<td>
														<?php 
															if ($permission['edit'] == '1') {
														?>
														<a href="<?php echo base_url() ?>admin/users/edit/<?php echo $user['id'] ?>"><img src="<?php echo base_url() ?>assets/record1.png" onclick="return confirm('are you sure you want to delete this user?')" title="View Order" alt="View Order" width="35" height="35"></a>
														<?php } ?>

														<?php 
															if ($permission['deleted'] == '1') {
														?>
		                                                <a href="<?php echo base_url() ?>admin/users/delete/<?php echo $user['id'] ?>" onclick="return confirm('are you sure you want to delete?')"><img src="<?php echo base_url() ?>assets/d-icon.png" title="Delete" alt="Delete" width="35" height="35"></a>
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






