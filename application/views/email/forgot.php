<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
	Dear <?php echo $user['first_name'] ?>,<br><br>

	Click <a href="<?php echo base_url('user/reset/'.$token) ?>">Change Password</a> to reset your password. <br><br>

	Regards,<br>
	Team Click Pay Earn<br>

</body>
</html>