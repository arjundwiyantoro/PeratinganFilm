<?php 

if(isset($_POST['submit'])){
	$detail = getimagesize($_FILES['file']['tmp_name']);
	$tinggi = $detail[1];
	echo $tinggi;
}


 ?>


<form method="post" action="" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" name="submit">
</form>