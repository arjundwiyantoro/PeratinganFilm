<?php 

require_once '../core/core2.php';

$error = '';
$error1 = '';

if(Input::get('submit')){
	$nama = Input::get('nama');
	$slug = str_replace(" ", "_", $nama);
	$tanggal_lahir = Input::get('tanggal');
	$tempat_lahir  = Input::get('tempat');
	$tentang = Input::get('tentang');
	$photo    = $_FILES['file']['name'];
	$tmp     = $_FILES['file']['tmp_name'];
	$type	 = $_FILES['file']['type'];
	if(!empty($nama) AND !empty($tanggal_lahir)){
		if($type == 'image/jpg' OR $type == 'image/png' OR $type == 'image/jpeg'){
			if(move_uploaded_file($tmp, '../profil/'.$photo)){
				if($Profil->store($nama,$slug,$tanggal_lahir,$tempat_lahir,$tentang,$photo)){
					echo ("<script LANGUAGE='JavaScript'>
							    window.alert('Berhasil Menambah Profil');
							    window.location.href='?page=celebrity';
							    </script>");
				}else{
					die('gagal');
				}
			}
		}
	}else{
		echo ("<script LANGUAGE='JavaScript'>
							    window.alert('Nama Dan Tanggal lahir wajib di isi');
							    </script>");
	}
}

if(Input::get('submit')){
	if(empty($nama)){
		$error = 'Tidak Boleh kosong';
	}
}

if(Input::get('submit')){
	if(empty($tanggal)){
		$error1 = 'Tidak Boleh kosong';
	}
}


 ?>

<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.css">
<style type="text/css">
	#konten{
		background-color: white;
		margin-left: 30px;
		width: 80%;
		
		margin-top: 20px;
	}
	#konten form{
		margin-left: 10px;
		margin-bottom: 50px;
	}
	header{
		background-color: white;
		width: 80%;
		margin-left: 30px;
	}
	/*
	#form{
		border: 4px solid black;
		height: 110%;
	}
	#form h4{
		background-color: blue;
		color: white;
		padding-top: 10px;
		padding-bottom: 10px;
		width: 130px;
		padding-left: 20px;
		padding-right: 20px;
		border-radius: 10px;
		margin-left: 50px;
		margin-top: -20px;
	}
	*/

</style>



<header class="w3-container" style="padding-top:5px;padding-bottom: 10px;">
    <h3><b><i class="fa fa-glass"></i> Celebrity > Tambah Profil</b></h3>
</header>


<table id="konten">
	<tr>
		<td style="background-color: #79abfc;color: white;" height="50px"><h4 style="margin-left: 10px;"><b>Daftar Celebrity</b></h4></td>
	</tr>
	<tr>
		<td height="650px">
		<form method="post" enctype="multipart/form-data">
		  <table>
			<tr>
				<td width="500px">
					<div class="col-xs-9">
						<label for="ex1">Nama: <span style="color: red;font-size: 17px;">*</span></label>
						<input class="form-control " type="text" name="nama" placeholder="Nama">
					</div>
					<span style="display: inline-block;margin-top: 40px;color: red;"><?php echo $error; ?></span>
				</td>
			</tr>
			<tr>
				<td width="500px">
					<br>
					<div class="col-xs-9">
						<label for="ex1">Tanggal Lahir: <span style="color: red;font-size: 17px;">*</span></label>
						<input class="form-control " type="text" name="tanggal" id="datepicker" placeholder="Tanggal Lahir">
					</div>
					<span style="display: inline-block;margin-top: 40px;color: red;"><?php echo $error1; ?></span>
				</td>
			</tr>
			<tr>
				<td width="500px">
					<br>
					<div class="col-xs-9">
						<label for="ex1">Tempat Lahir:</label>
						<input placeholder="Tempat Lahir..." class="form-control " type="text" name="tempat">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<div class="col-xs-11">
						<label for="ex1">Tentang:</label>
						<textarea name="tentang" class="form-control" rows="7" placeholder="Tentang..."></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<div class="col-xs-11">
						<label for="ex1">Profil Picture:</label>
						<input name="file" type="file">
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
					<input style="margin-left: 12px;" type="submit" name="submit" class="btn btn-success" value="Submit">
				</td>
			</tr>
		</table>
		</form>
	 	</td>
	 </tr>
</table>



<script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>
<script src="../plugin/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript">
	  $( function() {
    $( "#datepicker" ).datepicker({
    	dateFormat: 'yy-mm-dd',
      changeYear: true,
      changeMonth: true,
      yearRange: '1950:2024'
    });
  } );
</script>