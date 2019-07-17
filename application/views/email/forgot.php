<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
	Dear <?php echo $user['first_name'] ?>,

	Click <a href="<?php echo base_url('user/reset/'.$token) ?>">Change Password</a> to reset your password.

	Regards
	Click Pay Earn

</body>
</html>