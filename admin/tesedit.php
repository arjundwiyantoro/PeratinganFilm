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
}

foreach($Detail->single($id_movie) as $d){
	$negara 	= $d->negara;
	$bahasa 	= $d->bahasa;
	$runtime 	= $d->runtime;
	$budget 	= $d->budget;
}

 ?>

 <!DOCTYPE html>
<html lang="en" >



<head>
  <meta charset="UTF-8">
  <title>Form wizard (using bootstrap tabs)</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

      <link rel="stylesheet" href="../css/index.css">

  
</head>

<body>

  <div class="container">
	<div class="row">
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

                    <li role="presentation" class="">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="detail">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Step 1</h3>
					 	<label>Judul Artikel</label>
					 	<input name="judul" type="text" value="<?php echo $judul;?>"><br>
					 	<label>Sinopsis</label>
					 	<textarea name="sinopsis"><?php echo $sinopsis; ?></textarea><br>
					 	<label>Cover</label>
					 	<input name="cover" type="file"><br>
					 	<input type="hidden" name="value_token" value="<?php echo Input::token();?>">
					 	<label>Penulis</label>
					 	<input name="penulis" value="<?php echo $penulis; ?>"><br>
					 	<label>Tanggal Rilis</label>
					 	<input name="tanggal" value="<?php echo $tanggal; ?>"><br>
					 	<label>Trailer</label>
					 	<input name="trailer" value="<?php echo $trailer; ?>"><br>
					 	<label>Genre</label>
					 	<select name="genre">
					 		<option>----Pilih Genre----</option>
					 		<option value="action">Action</option>
					 		<option value="drama">Drama</option>
					 		<option value="scifi">SciFi</option>
					 		<option value="horror">Horror</option>
					 		<option value="comedy">Comedy</option>
					 		<option value="animation">Animation</option>
					 	</select>
					 	<br>
					 	<label>Region</label>
					 	<select name="region">
					 		<option>----Pilih Region----</option>
					 		<option value="asia">Asia</option>
					 		<option value="eropa">Eropa</option>
					 		<option value="amerika">America</option>
					 		<option value="australia">Australia</option>
					 		<option value="indonesia">Indonesia</option>
					 	</select>
					 	<br>
					 	 <label>Background</label>
					 	<input type="file" name="bg"><br>
					 	<label>Diputar</label>
					 	<input type="radio" name="diputar" value="1">Ya
					 	<input type="radio" name="diputar" value="0">Tidak
					 	<br>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Step 2</h3>
					 	<label>Negara</label>
					 	<input name="negara" value="<?php echo $negara; ?>"><br>
					 	<label>Bahasa</label>
					 	<input name="bahasa" value="<?php echo $negara; ?>"><br>
					 	<label>runtime</label>
					 	<input name="runtime" value="<?php echo $runtime; ?>"><br>
					 	<label>budget</label>
					 	<input name="budget" type="number" value="<?php echo $budget; ?>"><br>
					 	<label>Keuntungan</label>
					 	<input name="keuntungan" type="number" value="<?php echo $keuntungan; ?>"><br>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Step 3</h3>
                        <p>This is step 3</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
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




</body>

</html>