<?php 

require_once '../core/core2.php';

$id_movie = Input::get('id_movie');

	if (isset($_POST["kirim"])) {
		$jumlah = count($_FILES['gambar']['name']);
		if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) { 
				$photo = $_FILES['gambar']['name'][$i];
				$tmp_name = $_FILES['gambar']['tmp_name'][$i];				
				move_uploaded_file($tmp_name, "../photo/".$photo);
				$Photo->store($id_movie,$photo);				
			}
			header('location:admin.php?page=galery');
		}
		else{
			echo '<script type="text/javascript">alert("Gambar Tidak Ada");</script>';
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
    <h3><b><i class="fa fa-film"></i> <span style="color: #206ce8;">Movie</span> > <span style="color: #206ce8;">Galery</span> > <span style="color: #206ce8;">Lihat Galery</span> > Tambah Galery</b></b></h3>
</header>

<table id="konten">
	<tr>
		<td style="background-color: #79abfc;color: white;" height="50px"><h4 style="margin-left: 10px;"><b>Upload Image</b></h4></td>
	</tr>
	<tr>
		<td height="200px">
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="file" name="gambar[]" multiple>
			<br>
			<input class="btn btn-success" type="submit" name="kirim" value="Submit">
		</form>
	 	</td>
	 </tr>
</table>
<script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>