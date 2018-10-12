<?php 

require_once '../core/core2.php';

if(isset($_SESSION['admin'])){
	if(!empty($_SESSION['admin'])){
		header('location:admin.php');
	}
}



if(input::get('submit')){
	$value_token = Input::get('token');
	if(Input::validasi($value_token)){
		$username = Input::get('username');
		$password = Input::get('password');
		if($Admin->login($username,$password)){
			header('location:admin.php');
		}else{
			echo '<script type="text/javascript">alert("username/password salah");</script>';
		}
	}else{
		die("TOKEN BELUM DI SET");
	}
}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
</head>
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="../css/base.css">
	<link rel="stylesheet" href="../css/skeleton.css">
	<link rel="stylesheet" href="../css/layout.css">
	<style type="text/css">
		#header{
			height: 60px;
			background-color: #828aff;
		}
		#header h2{
			color: white;
			padding-top: 8px;
			margin-left: 20px;
		}
		body{
			background-color: #bababa;
		}
	</style>
<body>


	<!-- Primary Page Layout -->
			
	<div id="header">
		<h2><i class="glyphicon glyphicon-film"></i> XYZFilm</h2>
	</div>

	<div class="container">

		
		<div class="form-bg">
			<form method="POST" action="">
				<h2>Login Admin</h2>
				<p><input type="text" placeholder="username" name="username"></p>
				<p><input type="password" placeholder="Password" name="password"></p>
				<input type="hidden" name="token" value="<?php echo Input::token(); ?>">
				<label for="remember">
				  <input type="checkbox" id="remember" value="remember" />
				  <span>Remember me on this computer</span>
				</label>
				<input style="margin-left: 38px;" class="btn btn-primary" type="submit" name="submit" value="Login">
			<form>
		</div>
	</div>
</body>


</html>
<script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>