<?php 

require_once '../core/core2.php';

$id_movie = 4;

$db = mysqli_connect("localhost","root","","tesrating");

if(isset($_POST['submit'])){
	$nama    = $_POST['nama'];
	$sebagai = $_POST['sebagai'];
	$index = 0;
	foreach($nama as $namas){
		$query = mysqli_query($db,"INSERT INTO pemain(id_movie,nama,sebagai) VALUES('4','$namas','$sebagai[$index]')");
		$index ++;
	}
	header('location:pemain.php');
}



 ?>

<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<style type="text/css">
	table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 60%;
    border: 1px solid #ddd;
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}
</style>

 <h1>Multiple Insert</h1>
<form method="post" action="">
<button type="button" id="btn-tambah-form">Tambah Data Form</button>
<button type="button" id="btn-reset-form">Reset Form</button><br><br>
<table id="insert-form">
	<tr>
		<th>Nama</th>
		<th>Sebagai</th>
	</tr>
	<tr>
		<td><input type="text" name="nama[]" required></td>
		<td><input type="text" name="sebagai[]" required></td>
	</tr>
</table>
<br><br>

<div ></div>

<hr>    
<input type="submit" value="Simpan" name="submit">
</form>

 <input type="hidden" id="jumlah-form" value="1">

<script type="text/javascript" src="../plugin/js/jquery1.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btn-tambah-form').click(function(){
			var jumlah = parseInt($("#jumlah-form").val());// Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1;// Tambah 1 untuk jumlah form nya
			var a = "<tr>"
					
					+ "<td><input type='text' name='nama[]' required></td>"
					
					+ "<td><input type='text' name='sebagai[]' required></td>"
					+ "</tr>";
			$('#insert-form').append(a);
		})
	})
</script>

<script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>