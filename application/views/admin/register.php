<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>SME-ERP | Admin Login</title>

	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

	<div class="middle-box text-center loginscreen  animated fadeInDown">
		<div>
			<div>

				<!-- <h1 class="logo-name"><img src="<?php echo base_url() ?>assets/logo.png"></h1> -->
				<h1 class="logo-name">
					<img src="<?php echo base_url() ?>admin_assets/images/logo.png" alt="logo" /></h1>

			</div>
			<h3>Welcome to PharmEvo</h3>
			<form class="m-t" role="form" method="post" action="<?php echo base_url()?>admin/register/insert_user">
				<div class="form-group">
					<input type="text" class="form-control" name="name" placeholder="Username" required="">
				</div>
				<div class="form-group">
					<input type="email" class="form-control"  name="email" placeholder="email" required="">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required="">
				</div>
				<div class="form-group">
					<select name="role" class="form-control" required="">
						<option>Please Select Role</option>
						<?php 
							foreach ($role as $r) {
								echo '<option value="'.$r['id'].'">'.$r['name'].'</option>';
							}
						?>
						
					</select>
				</div>
				<button type="submit" class="btn btn-primary block full-width m-b">Signup</button>
<?php if ($this->session->flashdata('error')): ?>
				<a class="btn btn-danger block full-width m-b"><?php echo $this->session->flashdata('error'); ?></a>

<?php endif ?>

			</form>
		</div>
	</div>

	<!-- Mainly scripts -->
	<script src="<?php echo base_url() ?>assets/js/jquery-2.1.1.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

</body>

</html>
