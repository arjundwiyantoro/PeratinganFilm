<?php 

require_once '../core/core2.php';

if(Input::get('submit')){
	$value_token = Input::get('value_token');
	if(Input::validasi($value_token) == true){
		$judul = Input::get('judul');
		$slug = str_replace(" ", "_", $judul);
		$sinopsis = Input::get('sinopsis');
		$director = Input::get('director');
		$trailer = Input::get('trailer');
		$tanggal_rilis = Input::get('tanggal');
		$genre 	  = Input::get('genre');
		$region   = Input::get('region');
		$id1 	  = $genre === "action" ? '01' : ($genre === "drama" ? '02' : ($genre === "scifi" ? '03' : ($genre === "horror" ? '04': $genre == "comedy" ? '05' : '06')));
		$id2	  = $region == "asia" ? '01' : ($region == "eropa" ? '02' : ($region == "amerika" ? '03' : ($region == "australia" ?'04':'05')));
		$no = $id1.$id2;
		$next = $Movie->cekno($no);
		$id_movie = $no.$next;
		$penulis  = Input::get('penulis');
		$cover = $_FILES['cover']['name'];
		$tmp   = $_FILES['cover']['tmp_name'];
		$type  = $_FILES['cover']['type'];
		$coverbgr = $_FILES['bg']['name'];
		$tmpbgr   = $_FILES['bg']['tmp_name'];
		$typebgr  = $_FILES['bg']['type'];
		$coverbg = time()."-".rand(1000,9999).$cover;
		if($type == 'image/jpg' OR $type == 'image/png' OR $type == 'image/jpeg'){
			if(move_uploaded_file($tmp, '../cover/'.$cover)){
				move_uploaded_file($tmpbgr, '../cover/'.$coverbgr);
				if($Movie->store($id_movie,$judul,$slug,$sinopsis,$cover,$director,$penulis,$genre,$coverbgr,$region,$tanggal_rilis,$trailer)){
					unset($_SESSION['id_movie']);
					$_SESSION['id_movie'] = $id_movie;
					header('location:detail.php');
				}else{
					die("gagal");
				}
			}else{
				die('GAGAL Upload');
			}
		}else{
			echo '<script type="text/javascript">alert("Salah Type");</script>';
		}
	}else{
		echo '<script type="text/javascript">alert("Token Belum Di set");</script>';
	}
}



 ?>

<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.css">

<header class="w3-container" style="padding-top:22px">
   <h3><b>Buat Movie</b></h3>
</header>

<form  method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td width="400px">
			<div class="col-xs-10">
		    	<label for="ex1">Judul Movie:</label>
		    	<input class="form-control input-sm" name="judul" type="text">
		  	</div>
		</td>
		<td width="400px">
			<div class="col-xs-10">
		    	<label for="ex1">Director:</label>
		    	<input class="form-control input-sm" name="director" type="text">
		  	</div>
		</td>
	</tr>
	<tr>
		<td>
			<br>
			<div class="col-xs-10">
		    	<label >Penulis:</label>
		    	<input class="form-control input-sm" name="penulis"  type="text">
		  	</div>
		</td>
		<td>
			<br>
			<div class="col-xs-10">
		    	<label >Tanggal Rilis:</label>
		    	<input class="form-control input-sm" name="tanggal"  type="text" id="datepicker">
		  	</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<br>
			 <div class="form-group" style="margin-left: 12px;">
			  <label for="comment">Sinopsis:</label>
			  <textarea class="form-control" rows="5" name="sinopsis"></textarea>
			</div> 
		</td>
	</tr>
	<tr>
		<td>
			 <div class="col-xs-10">
			  <label for="sel1">Genre:</label>
			  <select class="form-control" name="genre">
				<option value="">----Pilih Genre----</option>
		 		<option value="action">Action</option>
		 		<option value="drama">Drama</option>
		 		<option value="scifi">SciFi</option>
		 		<option value="horror">Horror</option>
		 		<option value="comedy">Comedy</option>
		 		<option value="animation">Animation</option>
			  </select>
			</div> 
		</td>
		<td>
			 <div class="col-xs-10">
			  <label for="sel1">Region:</label>
			  <select class="form-control" name="region">
		 		<option>----Pilih Region----</option>
		 		<option value="asia">Asia</option>
		 		<option value="eropa">Eropa</option>
		 		<option value="amerika">America</option>
		 		<option value="australia">Australia</option>
		 		<option value="indonesia">Indonesia</option>
			  </select>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<br>
			<div class="col-xs-10">
				<label>Cover</label>
				<input type="file" name="cover">
			</div>
		</td>
		<td>
			<br>
			<div class="col-xs-10">
				<label>Background</label>
				<input type="file" name="bg">
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<br>
			<div class="col-xs-10">
		    	<label for="ex1">Trailer:</label>
		    	<input class="form-control input-sm" name="trailer" type="text">
		  	</div>
		</td>
		<td>
			<br>
			<div class="col-xs-10">
		    	<label for="ex1">Diputar</label><br>
		    	 <label class="radio-inline"><input type="radio" name="diputar" checked>Ya</label>
				 <label class="radio-inline"><input type="radio" name="diputar">Tidak</label>
		  	</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<br>
			<input type="hidden" name="value_token" value="<?php echo Input::token();?>">
			<input type="submit" name="submit" class="btn btn-success" value="Submit" style="margin-left: 13px">
		</td>
	</tr>
</table>
</form>
<script src="../plugin/js/jquery1.js"></script>
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
<script src="../plugin/bootstrap/js/bootstrap.js"></script>
<script src="../plugin/jquery-ui/jquery-ui.js"></script>