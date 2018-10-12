<?php 

require_once '../core/core2.php';

$id_movie = Input::get('id_movie');

foreach($Movie->single2($id_movie) as $d){
	$judul 		= $d->judul;
	$sinopsis 	= $d->sinopsis;
	$director 	= $d->director;
	$penulis 	= $d->penulis;
}

if(Input::get('submit')){
	$value_token = Input::get('value_token');
	if(Input::validasi($value_token)){
		$judul 	  = Input::get('judul');
		$sinopsis = Input::get('sinopsis');
		$director = Input::get('director');
		$penulis  = Input::get('penulis');
		$genre 	  = Input::get('genre');
		$region   = Input::get('region');
		if($Movie->update($id_movie,$judul,$sinopsis,$director,$penulis,$genre,$region)){
			header('location:?page=movie');
		}else{
			die('gagal');
		}
	}
}

 ?>

  <form method="post" action="" enctype="multipart/form-data">
 	<label>Judul Artikel</label>
 	<input name="judul" type="text" value="<?php echo $judul; ?>"><br>
 	<label>Sinopsis</label>
 	<textarea name="sinopsis"><?php echo $sinopsis; ?></textarea><br>
 	<label>Director</label>
 	<input name="director" value="<?php echo $director; ?>"><br>
 	<input type="hidden" name="value_token" value="<?php echo Input::token();?>">
 	<label>Penulis</label>
 	<input name="penulis" value="<?php echo $penulis; ?>"><br>
 	<label>Genre</label>
 	<select name="genre">
 		<option>----Pilih Genre----</option>
 		<option value="action">Action</option>
 		<option value="drama">Drama</option>
 		<option value="scifi">SciFi</option>
 		<option value="horror">Horror</option>
 		<option value="comedy">Comedy</option>
 	</select>
 	<br>
 	<label>Region</label>
 	<select name="region">
 		<option>----Pilih Region----</option>
 		<option value="asia">Asia</option>
 		<option value="eropa">Eropa</option>
 		<option value="amerika">America</option>
 		<option value="australia">Australia</option>
 	</select>
 	<br>
 	<input name="submit" type="submit">
 </form>