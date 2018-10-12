<?php 

require_once '../core/core2.php';

if(Input::get('submit')){
	$passlama = Input::get('passlama');
	$passbaru = Input::get('passbaru');
	$passbaru2 = Input::get('passbaru2');
	if(!empty(trim($passlama)) && !empty(trim($passbaru)) && !empty(trim($passbaru2))){
		if($Admin->cekpass($passlama)){
			if($passbaru == $passbaru2){
				$passbaru = password_hash(Input::get('passbaru'), PASSWORD_DEFAULT);
				if($Admin->editpass($passbaru)){
					header('location:admin.php');
				}else{
					die('GAGAL');
				}
			}else{
				echo '<script type="text/javascript">alert("Password Tidak Sama");</script>';
			}		
		}else{
			echo '<script type="text/javascript">alert("Salah password");</script>';
		}
	}else{
		echo '<script type="text/javascript">alert("Data Tidak Boleh kosong");</script>';
	}
}

 ?>

 <link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<style type="text/css">
	.custom-file-upload {
	    border: 1px solid #ccc;
	    display: inline-block;
	    padding: 6px 12px;
	    cursor: pointer;
	}
	#konten{
		background-color: white;
		margin-left: 30px;
		width: 80%;
		
		margin-top: 20px;
	}
	#konten form{
		margin-left: 10px;
		margin-bottom: 10px;
	}
	header{
		background-color: white;
		width: 80%;
		margin-left: 30px;
	}
</style>

<header class="w3-container" style="padding-top:5px;padding-bottom: 10px;">
    <h3><b><i class="fa fa-newspaper-o"></i> Edit Admin</b></h3>
</header>

<table id="konten">
	<tr>
		<td style="background-color: #79abfc;color: white;" height="50px"><h4 style="margin-left: 10px;"><b>Edit Password Admin</b></h4></td>
	</tr>
	<tr>
		<td height="300px">
		 <form action="" method="post">
		 <div class="col-xs-12">
		 	<label for="ex1">Password Lama</label>
		 	<input type="password" name="passlama" class="form-control" required>
		 </div>
		 <div class="col-xs-12">
		 	<label for="ex1">Password Baru</label>
		 	<input type="password" name="passbaru" class="form-control" required>
		 </div>
		 <div class="col-xs-12">
		 	<label for="ex1">Ulangi Password</label>
		 	<input type="password" name="passbaru2" class="form-control" required>
		 </div>
		 	<input style="margin-left: 15px;margin-top: 10px;" class="btn btn-success" type="submit" name="submit" value="Submit">
		 </form>
		 </td>
	 </tr>
</table>
<script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>
