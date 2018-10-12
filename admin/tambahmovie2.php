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
		$negara 	= Input::get('negara');
		$bahasa 	= Input::get('bahasa');
		$runtime 	= Input::get('runtime');
		$budget 	= Input::get('budget');
		$keuntungan = Input::get('keuntungan');
		$coverbg = time()."-".rand(1000,9999).$cover;
		if(!empty($judul) AND !empty($genre) AND !empty($region) AND !empty($cover) AND !empty($coverbgr)){
			if($type == 'image/jpg' OR $type == 'image/png' OR $type == 'image/jpeg'){
				if(move_uploaded_file($tmp, '../cover/'.$cover)){
					move_uploaded_file($tmpbgr, '../cover/'.$coverbgr);
					if($Movie->store($id_movie,$judul,$slug,$sinopsis,$cover,$director,$penulis,$genre,$coverbgr,$region,$tanggal_rilis,$trailer)){
						$Detail->store($id_movie,$negara,$bahasa,$runtime,$budget,$keuntungan);
						echo ("<script LANGUAGE='JavaScript'>
							    window.alert('Berhasil Menambah Film');
							    window.location.href='?page=movie';
							    </script>");
					}else{
						die("gagal");
					}
				}else{
					echo '<script type="text/javascript">alert("Gagal Upload");</script>';
				}
			}else{
				echo '<script type="text/javascript">alert("Salah Type");</script>';
			}
		}else{
			echo '<script type="text/javascript">alert("Data Ada Yang Kosong");</script>';
		}
	}else{
		echo '<script type="text/javascript">alert("Token Salah");</script>';
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
    <h3><b><i class="fa fa-film"></i> <span style="color: #206ce8;">Movie</span> > Tambah Movie</b></h3>
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

                    <li role="presentation" class="disabled">
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
										<div class="col-xs-12">
											<label for="ex1">Negara:</label>
											<input class="form-control " name="negara" type="text">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<br>
										<div class="col-xs-12">
											<label for="ex1">Bahasa:</label>
											<input class="form-control " name="bahasa" type="text">
											<input name="value_token" type="hidden" value="<?php echo Input::token(); ?>">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<br>
										<div class="col-xs-12">
											<label for="ex1">Runtime:</label>
											<input class="form-control " name="runtime" type="text">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<br>
										<div class="col-xs-12">
											<label for="ex1">Budget:</label>
											<input class="form-control " name="budget" type="number">
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<br>
										<div class="col-xs-12">
											<label for="ex1">Keuntungan:</label>
											<input class="form-control " name="keuntungan" type="number">
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
<script src="../plugin/jquery-ui/jquery-ui.js"></script>
<script  src="../plugin/js/index.js"></script>
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





</html>
