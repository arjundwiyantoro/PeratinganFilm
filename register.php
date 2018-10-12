<?php 

require_once 'core/core.php';

if(isset($_SESSION['id_user'])){
	if(!empty(Session::get('id_user'))){
		header('location:index2.php');
	}
}

$site_key = "6LcxMmAUAAAAAE8gZeQM02uBTx219IvvsqXeQxVm";
$secret_key = "6LcxMmAUAAAAAHji6UAg-Juv9WgYtQ18ujKdAjeY";

if(Input::get('submit')){
	if(isset($_POST['g-recaptcha-response'])){
		$api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response='.$_POST['g-recaptcha-response'];
        $response = @file_get_contents($api_url);
        $data = json_decode($response, true);
        if($data['success']){
			$value_token = Input::get('value_token');
			if(Input::validasi($value_token)){
				$email = Input::get('email');
				$cekpass = strlen(Input::get('password'));
				$pass    = input::get('password');
				$ulang   = Input::get('ulang');
				$nama = Input::get('nama');
				if(!empty($nama) AND !empty($email) AND !empty($cekpass)){
					if($cekpass >= 8){
						if($pass == $ulang){
							if($User->cekemail($email) == 0){
								$tanggal = date('y-m-d');
								$password = password_hash(Input::get('password'), PASSWORD_DEFAULT);
								if($User->store($nama,$password,$email,$tanggal)){
									echo ("<script LANGUAGE='JavaScript'>
										    window.alert('Berhasil Mendaftar');
										    window.location.href='login.php';
										    </script>");
								}else{
									die('Gagal');
								}
							}else{
								echo "<script LANGUAGE='JavaScript'>
										    window.alert('Email sudah di gunakan');
										    </script>";
							}
						}else{
							echo "<script LANGUAGE='JavaScript'>
										    window.alert('Password tidak sama');
										    </script>";
						}
					}else{
						echo "<script LANGUAGE='JavaScript'>
										    window.alert('Password kurang dari 8');
										    </script>";
					}
				}else{
					echo "<script LANGUAGE='JavaScript'>
										    window.alert('Data Tidak Boleh kosong');
										    </script>";
				}
			}else{
				echo "<script LANGUAGE='JavaScript'>
										    window.alert('Token Belum Di set');
										    </script>";
			}
		}else{
			echo "<script LANGUAGE='JavaScript'>
										    window.alert('Capcha belum di isi');
										    </script>";
		}
	}else{
		die("CAPCHA BELUM DI SET");
	}
}



include 'template/headerv21.php';

 ?>

<style type="text/css">
	body{
		background: linear-gradient(#bababa,#e5e5e5);
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
	#regis{
		border-radius: 10px;
		margin-left: 400px;
		width: 30%;
		border: 1px solid #cfcfd1;
		height: 550px;
	}
	.tes{
		margin-top: 14px;
	}
	#regis input{
		border-radius: 5px;
	}
	.tombol:hover{
		color: grey;
	}
</style>

<div id="badan">
<div id="regis">
	<h2 style="margin-left: 15px;">Buat Akun</h2>
	<form action="" method="post">
	<div class="col-xs-12 tes">
		<label >Username:</label>
		<input class="form-control input-md" name="nama"  type="text">
	</div>
	<div class="col-xs-12 tes">
		<label >Email:</label>
		<input class="form-control input-md" name="email"  type="email">
		<input name="value_token" type="hidden" value="<?php echo Input::token(); ?>">
	</div>
	<div class="col-xs-12 tes">
		<label >Password:</label>
		<input class="form-control input-md" name="password"  type="password" required>
	</div>
	<div class="col-xs-12 tes">
		<label >Ulangi Password:</label>
		<input class="form-control input-md" name="ulang"  type="password">
	</div>
	<div class="col-xs-12 tes">
        <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
    </div>
	<div class="col-xs-12 tes">
		<input class="form-control tombol" type="submit" name="submit" style="background-color: #79abfc;color: white;" value="Buat Akun">
	</div>
	</form>
	<br>
	<br>
	<b style="margin-left: 15px;display: inline-block;margin-top: 20px;">Sudah Punya akun <a href="login.php">Login</a> di sini</b>
</div>
</div>

<?php include 'template/footer.html'; ?>

<script src='https://www.google.com/recaptcha/api.js'></script>