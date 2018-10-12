<?php 

require_once '../core/core2.php';

$id_movie = $_SESSION['id_movie'];

if(Input::get('submit')){
	$value_token = Input::get('valuetoken');
	if(Input::validasi($value_token)){
		$negara 	= Input::get('negara');
		$bahasa 	= Input::get('bahasa');
		$runtime 	= Input::get('runtime');
		$budget 	= Input::get('budget');
		$keuntungan = Input::get('keuntungan');
		if($Detail->store($id_movie,$negara,$bahasa,$runtime,$budget,$keuntungan)){
			header('location:buatmovie.php');
		}
	}else{
		die("TOKEN BELUM DI SET");
	}
}

 ?>

<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">

<form method="post" action="">
<table>
	<tr>
		<td width="300px">
			<div class="col-xs-11">
				<label for="ex1">Id Movie:</label>
				<input class="form-control " name="id_movie" type="text" value="<?php echo $id_movie; ?>" readonly>
			</div>
		</td>
	</tr>
	<tr>
		<td width="300px">
			<div class="col-xs-11">
				<label for="ex1">Negara:</label>
				<input class="form-control " name="negara" type="text">
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<br>
			<div class="col-xs-11">
				<label for="ex1">Bahasa:</label>
				<input class="form-control " name="bahasa" type="text">
				<input name="value_token" type="hidden" value="<?php echo Input::token(); ?>">
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<br>
			<div class="col-xs-11">
				<label for="ex1">Runtime:</label>
				<input class="form-control " name="runtime" type="text">
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<br>
			<div class="col-xs-11">
				<label for="ex1">Budget:</label>
				<input class="form-control " name="budget" type="number">
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<br>
			<div class="col-xs-11">
				<label for="ex1">Keuntungan:</label>
				<input class="form-control " name="keuntungan" type="number">
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<br>
			<input type="submit" name="submit" class="btn btn-success">
		</td>
	</tr>
</table>	
</form>

<script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>