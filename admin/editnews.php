<?php 

require_once '../core/core2.php';

$id_news = Input::get('id_news');

foreach($News->singleid($id_news) as $d){
	$judul = $d->judul;
	$isi   = $d->isi;
	//$tanggal = $d->tanggal;
	$imagen = $d->image;
}

if(Input::get('submit')){
	$judul = Input::get('judul');
	$slug = str_replace(" ", "_", $judul);
	//$tanggal = date("Y-m-d");
	$isi = Input::get('isi');
	$image = $_FILES['image']['name'];
	$imagetmp  = $_FILES['image']['tmp_name'];
	if(!empty($image)){
		if(move_uploaded_file($imagetmp, '../cover/'.$image)){
			if($News->update($id_news,$judul,$slug,$isi,$image)){
				unlink('../cover/'.$imagen);
				header('location:?page=news');
			}else{
				die("GAGAL");
			}
		}
	}else{
		$image = $imagen;
		if($News->update($id_news,$judul,$slug,$isi,$image)){
			die("BERHASIL");
		}else{
			die("GAGAL");
		}
	}
}

 ?>
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<style type="text/css">
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
</style>

<header class="w3-container" style="padding-top:5px;padding-bottom: 10px;">
    <h3><b><i class="fa fa-newspaper-o"></i> Berita > Data Berita > Edit Berita</b></h3>
</header>

<table id="konten">
	<tr>
		<td style="background-color: #79abfc;color: white;" height="50px"><h4 style="margin-left: 10px;"><b>Daftar Celebrity</b></h4></td>
	</tr>
	<tr>
		<td height="450px">

		 <form method="post" action="" enctype="multipart/form-data">
		  <table>
			<tr>
				<td width="500px">
					<div class="col-xs-9">
						<label for="ex1">Judul:</label>
						<input class="form-control " type="text" name="judul" value="<?php echo $judul; ?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<div class="col-xs-11">
						<label for="ex1">Isi:</label>
						<textarea name="isi" class="form-control" rows="7"><?php echo $isi; ?></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<div class="col-xs-11">
						<label for="ex1">Image:</label>
						<input name="image" type="file">
						<b><?php echo $imagen; ?></b>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
					<input style="margin-left: 12px;" type="submit" name="submit" class="btn btn-success">
				</td>
			</tr>
		</table>
		 </form>
	 	</td>
	 </tr>
</table>



<script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		function readURL(input) {
			  if (input.files && input.files[0]) {
			    var reader = new FileReader();

			    reader.onload = function(e) {
			      $('#blah').attr('src', e.target.result);
			    }

			    reader.readAsDataURL(input.files[0]);
			  }
			}

			$("#upload").change(function() {
			  readURL(this);
		});

</script>
