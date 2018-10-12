<?php 

require_once 'core/core.php';

if(isset($_SESSION['id_user'])){
	if(!empty(Session::get('id_user'))){
		header('location:index2.php');
	}
}

if(Input::get('submit')){
	$value_token = Input::get('value_token');
	if(Input::validasi($value_token)){
		$email     = Input::get('email');
		$password  = Input::get('password');
		if(!empty($email) && !empty($password)){
			if($User->cekemail($email) != 0){
				if($User->loginv($email,$password)){
					header('location:index2.php');
				}else{
					echo ("<script LANGUAGE='JavaScript'>
								window.alert('Password Salah');
							</script>");
				}
			}else{
				echo ("<script LANGUAGE='JavaScript'>
								window.alert('Email Belum Terdaftar');
							</script>");
			}
		}else{
			echo ("<script LANGUAGE='JavaScript'>
								window.alert('Password dan Email Tidak boleh Kosong');
							</script>");
		}
	}
}



include 'template/headerv21.php';

 ?>
<style type="text/css">
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}
	#form{
		border: 1px solid #cfcfd1;
		width: 30%;
		border-radius: 10px;
		height: 350px;
		margin-left: 400px;
	}
	#badan {
		background-color: white;
		margin-left: 99px;
		margin-right: 99px;
		padding-top: 80px;
		padding-bottom: 100px;
	}
	@media only screen and (max-width: 1300px) {
	    #badan {
	        margin-right: 92px;
	        margin-left: 92px;
	    }
	}
	.tes{
		margin-top: 14px;
	}
</style>

<div id="badan">
<div id="form">
<h2 style="margin-left: 15px;">Login Xyzfilm</h2>
 <form action="" method="POST">
 	<div class="col-xs-12 tes">
		<label >Email:</label>
		<input class="form-control input-md" name="email"  type="email">
		<input name="value_token" type="hidden" value="<?php echo Input::token(); ?>">
	</div>
 	<input name="value_token" type="hidden" value="<?php echo Input::token(); ?>">
 	<div class="col-xs-12 tes">
		<label >Password:</label>
		<input class="form-control input-md" name="password"  type="password">
	</div>
 	<div class="col-xs-12 tes">
		<input class="form-control tombol" type="submit" name="submit" style="background-color: #79abfc;color: white;" value="Login">
	</div>
	<b style="margin-left: 15px;display: inline-block;margin-top: 30px;margin-left: 63px;">Belum Punya Akun <a href="register.php">Buat</a> di sini</b>
</form>
</div>
</div>

<?php include 'template/footer.html'; ?>