<?php 

require_once '../core/core2.php';

$id_movie = Input::get('id_movie');

foreach($Movie->single2($id_movie) as $d){
	$judul 		= $d->judul;
	$sinopsis 	= $d->sinopsis;
	$director 	= $d->director;
	$penulis 	= $d->penulis;
	$tanggal    = $d->tanggal_rilis;
	$trailer    = $d->trailer;
	$genre 		= $d->genre;
	$region 	= $d->region;
}

foreach($Detail->single($id_movie) as $d){
	$negara 	= $d->negara;
	$bahasa 	= $d->bahasa;
	$runtime 	= $d->runtime;
	$budget 	= $d->budget;
	$keuntungan = $d->keuntungan;
}


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
		$penulis  = Input::get('penulis');
		$negara 	= Input::get('negara');
		$bahasa 	= Input::get('bahasa');
		$runtime 	= Input::get('runtime');
		$budget 	= Input::get('budget');
		$keuntungan = Input::get('keuntungan');
		$coverbg = time()."-".rand(1000,9999).$cover;
		if($Movie->update($id_movie,$judul,$sinopsis,$director,$penulis,$genre,$trailer,$region)){
			$Detail->update($id_movie,$negara,$bahasa,$runtime,$budget,$keuntungan);
			header('location:?page=movie');
		}else{
			die("GAGAL");
		}
	}else{
		die('Token Salah');
	}
}

if(Input::get('submit')){
	$cover = $_FILES['cover']['name'];
	if(!empty($cover)){
		$tmp   = $_FILES['cover']['tmp_name'];
		$type  = $_FILES['cover']['type'];
		if(move_uploaded_file($tmp, '../cover/'.$cover)){
			$Movie->updatecover($id_movie,$cover);
		}
	}
}


if(Input::get('submit')){
	$coverbgr = $_FILES['bg']['name'];
	if(!empty($coverbgr)){
		$tmpbgr   = $_FILES['bg']['tmp_name'];
		$typebgr  = $_FILES['bg']['type'];
		if(move_uploaded_file($tmpbgr, '../cover/'.$coverbgr)){
			$Movie->updatecoverbgr($id_movie,$coverbgr);
		}
	}
}

 ?>


<style type="text/css">
		header{
		background-color: white;
		width: 94%;
		margin-left: 30px;
	}
</style>



  
  
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

<link rel="stylesheet" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">

  

<header class="w3-container" style="padding-top:5px;padding-bottom: 10px;">
    <h3><b><i class="fa fa-film"></i> <span style="color: #206ce8;">Movie</span> > <span style="color: #206ce8;">Data Movie</span> > Edit Movie</b></h3>
</header>



  <div >
	<div >
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="buat movie">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" >
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="detail">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
						<table method="post" action="" enctype="multipart/form-data">
							<tr>
								<td width="400px">
									<div class="col-xs-10">
								    	<label for="ex1">Judul Movie:</label>
								    	<input class="form-control input-sm" name="judul" type="text" value="<?php echo $judul; ?>">
								  	</div>
								</td>
								<td width="400px">
									<div class="col-xs-10">
								    	<label for="ex1">Director:</label>
								    	<input class="form-control input-sm" name="director" type="text" value="<?php echo $director; ?>">
								  	</div>
								</td>
							</tr>
							<tr>
								<td>
									<br>
									<div class="col-xs-10">
								    	<label >Penulis:</label>
								    	<input class="form-control input-sm" name="penulis"  type="text" value="<?php echo $penulis; ?>">
								  	</div>
								</td>
								<td>
									<br>
									<div class="col-xs-10">
								    	<label >Tanggal Rilis:</label>
								    	<input class="form-control input-sm" name="tanggal"  type="text" value="<?php echo $tanggal; ?>">
								  	</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<br>
									 <div class="form-group" style="margin-left: 12px;">
									  <label for="comment">Sinopsis:</label>
									  <textarea class="form-control" rows="5" name="sinopsis"><?php echo $sinopsis; ?></textarea>
									</div> 
								</td>
							</tr>
							<tr>
								<td>
									 <div class="col-xs-10">
									  <label for="sel1">Genre:</label>
									  <select class="form-control" name="genre">
										<option value="">----Pilih Genre----</option>
								 		<option value="action" <?php if($genre == 'action'){ echo 'selected';} ?>>Action</option>
								 		<option value="drama" <?php if($genre == 'drama'){ echo 'selected';} ?>>Drama</option>
								 		<option value="scifi" <?php if($genre == 'scifi'){ echo 'selected';} ?>>SciFi</option>
								 		<option value="horror" <?php if($genre == 'horror'){ echo 'selected';} ?>>Horror</option>
								 		<option value="comedy" <?php if($genre == 'comedy'){ echo 'selected';} ?>>Comedy</option>
								 		<option value="animation" <?php if($genre == 'animation'){ echo 'selected';} ?>>Animation</option>
									  </select>
									</div> 
								</td>
								<td>
									 <div class="col-xs-10">
									  <label for="sel1">Region:</label>
									  <select class="form-control" name="region">
								 		<option>----Pilih Region----</option>
								 		<option value="asia" <?php if($region == 'asia'){ echo 'selected';} ?>>Asia</option>
								 		<option value="eropa" <?php if($region == 'eropa'){ echo 'selected';} ?>>Eropa</option>
								 		<option value="amerika" <?php if($region == 'amerika'){ echo 'selected';} ?>>America</option>
								 		<option value="australia" <?php if($region == 'australia'){ echo 'selected';} ?>>Australia</option>
								 		<option value="indonesia" <?php if($region == 'indonesia'){ echo 'selected';} ?>>Indonesia</option>
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
								    	<input class="form-control input-sm" name="trailer" type="text" value="<?php echo $trailer; ?>">
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
						</table>
					 	<br>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
					 	<form method="post" action="">
							<table>
								<tr>
									<td width="300px">
										<div class="col-xs-11">
											<label for="ex1">Negara:</label>
											<input class="form-control " name="negara" type="text" value="<?php echo $negara; ?>">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<br>
										<div class="col-xs-11">
											<label for="ex1">Bahasa:</label>
											<input class="form-control " name="bahasa" type="text" value="<?php echo $bahasa; ?>">
											<input name="value_token" type="hidden" value="<?php echo Input::token(); ?>">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<br>
										<div class="col-xs-11">
											<label for="ex1">Runtime:</label>
											<input class="form-control " name="runtime" type="text" value="<?php echo $runtime; ?>">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<br>
										<div class="col-xs-11">
											<label for="ex1">Budget:</label>
											<input class="form-control " name="budget" type="number" value="<?php echo $budget; ?>">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<br>
										<div class="col-xs-11">
											<label for="ex1">Keuntungan:</label>
											<input class="form-control " name="keuntungan" type="number" value="<?php echo $keuntungan; ?>">
										</div>
									</td>
								</tr>
							</table>	
							</form>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><input type="submit" name="submit" class="btn btn-primary" value="Save and continue"></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

  

    <script  src="../plugin/js/index.js"></script>






</html>
