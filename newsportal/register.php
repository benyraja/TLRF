 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>TamilNadu LRF</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="assets/font/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="assets/font/font.css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" media="screen" />
<?php  include('includes/config.php'); ?>
<?php  include('includes/registration_login.php'); ?>

<?php include('includes/header.php'); ?>

</head>
<body>
<div class="container">
	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="register.php" >
			<h2>Register on TLRF</h2>
	Username 			:		<input  type="text" name="username" value="<?php echo $username; ?>"  placeholder="Username"> <br><br>
	Email 				:		<input type="email" name="email" value="<?php echo $email ?>" placeholder="Email"><br><br>
	Password 			:		<input type="password" name="password_1" placeholder="Password"><br><br>
	Confirm Password 	:		<input type="password" name="password_2" placeholder="Password confirmation"><br><br>
			<button type="submit" class="btn" name="reg_user">Register</button>
			<p>
				Already a member? <a href="login.php">Sign in</a>
			</p>
		</form>
	</div>
</div>
<!-- // container -->
<!-- Footer -->
<?php include('includes/footer.php'); ?>
<!-- // Footer -->
