<?php 

require_once '../core/core2.php';

$id_celeb = Input::get('id_celeb');

foreach($Profil->single2($id_celeb) as $d){
	$nama          = $d->nama;
	$tanggal_lahir = $d->tanggal_lahir;
	$photos         = $d->photo;
	$tentang       = $d->tentang;
	$tempat 	   = $d->tempat_lahir;
}

if(Input::get('submit')){
	$value_token = Input::get('value_token');
	if(Input::validasi($value_token)){
		$nama = Input::get('nama');
		$slug = str_replace(" ", "_", $nama);
		$tanggal_lahir = Input::get('tanggal');
		$tempat_lahir  = Input::get('tempat');
		$tentang = Input::get('tentang');
		$photo    = $_FILES['file']['name'];
		$tmp     = $_FILES['file']['tmp_name'];
		$type	 = $_FILES['file']['type'];
		if(!empty($photo)){
			if(move_uploaded_file($tmp, '../profil/'.$photo)){
				if($Profil->update($id_celeb,$nama,$slug,$tanggal_lahir,$tempat_lahir,$tentang,$photo)){
					unlink('../profil/'.$photos);
					header('location:?page=celebrity');
				}else{
					die('gagal');
				}
			}else{
				die("GAGAL MENGINPUT");
			}
		}else{
			$photo = $photos;
			if($Profil->update($id_celeb,$nama,$slug,$tanggal_lahir,$tempat_lahir,$tentang,$photo)){
				die('berhasil');
			}else{
				die('gagal');
			}
		}
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
    <h3><b>Celebrity > Tambah Profil</b></h3>
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
						<label for="ex1">Nama:</label>
						<input class="form-control " type="text" name="nama" value="<?php echo $nama; ?>">
					</div>
				</td>
			</tr>
			<tr>
				<td width="500px">
					<br>
					<div class="col-xs-9">
						<label for="ex1">Tanggal:</label>
						<input class="form-control " type="text" name="tanggal" value="<?php echo $tanggal_lahir; ?>">
					</div>
				</td>
			</tr>
			<tr>
				<td width="500px">
					<br>
					<div class="col-xs-9">
						<label for="ex1">Tempat Lahir:</label>
						<input class="form-control " type="text" name="tempat" value="<?php echo $tempat; ?>">
						<input type="hidden" name="value_token" value="<?php echo Input::token(); ?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<div class="col-xs-11">
						<label for="ex1">Tentang:</label>
						<textarea name="tentang" class="form-control" rows="7"><?php echo $tentang; ?></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<div class="col-xs-11">
						<label for="ex1">Profil Picture:</label>
						<input name="file" type="file">
						<b><?php echo $photos; ?></b>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
					<input style="margin-left: 12px;" type="submit" name="submit" class="btn btn-success">
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