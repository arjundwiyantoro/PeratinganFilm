<?php 

if(isset($_POST['submit'])){
	//ternary operation
	$kata1 = ($_POST['genre'] == 'aksi' ? '01' : '02');

	if($_POST['region'] == 'asia'){
		$kata2 = '01';
	}else{
		$kata2 = '02';
	}

	$baru = $kata1.$kata2;

	echo $baru;
}



 ?>


<form action="" method="post">
	<select name="genre">
		<option value="aksi">Action</option>
		<option value="drama">Drama</option>
	</select>
	<select name="region">
		<option value="asia">Asia</option>
		<option value="eropa">Eropa</option>
	</select>
	<input type="submit" name="submit">
</form>