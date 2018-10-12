<?php 

require_once '../core/core2.php';

$id_movie = Input::get('id_movie');

$db = mysqli_connect("localhost","root","","tesrating");

if(isset($_POST['submit'])){
	$nama    = $_POST['nama'];
	$sebagai = $_POST['sebagai'];
	$index = 0;
	foreach($nama as $namas){
		$query = mysqli_query($db,"INSERT INTO pemain(id_movie,nama,sebagai) VALUES('$id_movie','$namas','$sebagai[$index]')");
		$index ++;
	}
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Berhasil Menambah Pemain');
    window.location.href='?page=pemain';
    </script>");
}



 ?>

 <link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<style type="text/css">
	input[type="file"] {
    	display: none;
	}
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
	#insert-form{
		margin-top: 40px;
	}
	#table{
		background-color: white;
	}
</style>

<header class="w3-container" style="padding-top:5px;padding-bottom: 10px;">
    <h3><b><i class="fa fa-newspaper-o"></i> Movie > Pemain > Tambah Pemain</b></h3>
</header>


<form method="post" action="">
<button class="btn btn-primary" style="margin-top: 40px;margin-left: 35px;" type="button" id="btn-tambah-form">Tambah Form &nbsp;<i class="glyphicon glyphicon-plus"></i></button>
<a style="margin-top: 40px;" href="?page=tambah_pemain&id_movie=<?php echo $id_movie; ?>" id="btn-reset-form" class="btn btn-warning">Reset Form &nbsp;<i class="glyphicon glyphicon-refresh"></i></a>
</td>
</tr>
<tr>
<td>
<table id="insert-form" class="table" style="margin-left: 10px;">
	<tr>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;Nama</th>
		<th>&nbsp;&nbsp;&nbsp;Sebagai</th>
	</tr>
	<tr>
		<td>
			<div class="col-xs-7">
				<input class="form-control " type="text" name="nama[]">
			</div>
		</td>
		<td>
			<div class="col-xs-7">
				<input class="form-control " type="text" name="sebagai[]">
			</div>
		</td>
	</tr>
</table>
<br><br>

<div ></div>

<hr>    
<input type="submit" value="Simpan" name="submit" class="btn btn-success" style="margin-left: 35px;margin-bottom: 10px;">


<script type="text/javascript" src="../plugin/js/jquery1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn-tambah-form').click(function(){
			var jumlah = parseInt($("#jumlah-form").val());// Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1;// Tambah 1 untuk jumlah form nya
			var a = "<tr>"
					
					+ "<td>"
					+ "<div class='col-xs-7'>"
					+ "<input class='form-control' type='text' name='nama[]'>"
					+ "</div>"
					+ "</td>"
					+ "<td>"
					+ "<div class='col-xs-7'>"
					+ "<input class='form-control' type='text' name='sebagai[]'>"
					+ "</div>"
					+ "</td>"
					+ "</tr>";
			$('#insert-form').append(a);
		})
	})
</script>

<script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>