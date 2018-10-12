<?php 

require_once '../core/core2.php';


if(Input::get('submit')){
	$judul = Input::get('judul');
	$slug = str_replace(" ", "_", $judul);
	$tanggal = date("Y-m-d");
	$isi = Input::get('isi');
	$image = $_FILES['image']['name'];
	$imagetmp  = $_FILES['image']['tmp_name'];
	if(!empty($judul) AND !empty($isi)){
		if(move_uploaded_file($imagetmp, '../cover/'.$image)){
			if($News->store($judul,$slug,$tanggal,$isi,$image)){
				header('location:?page=news');
			}else{
				die("GAGAL");
			}
		}
	}else{
		echo ' <script type="text/javascript">alert("Judul dan isi tidak boleh kosong");</script>';
	}	
}


 ?>

 <link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<style type="text/css">
	input[type="file"] {
    	display: none;
	}
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
    <h3><b><i class="fa fa-newspaper-o"></i> News > Tambah News</b></h3>
</header>

<table id="konten">
	<tr>
		<td style="background-color: #79abfc;color: white;" height="50px"><h4 style="margin-left: 10px;"><b>Form News</b></h4></td>
	</tr>
	<tr>
		<td height="600px">
		 <form method="post" action="" enctype="multipart/form-data">
		  <table>
			<tr>
				<td width="700px">
					<div class="col-xs-6">
						<label for="ex1">Judul:</label>
						<input class="form-control " type="text" name="judul">
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<div class="col-xs-12">
						<label for="ex1">Isi:</label>
						<textarea name="isi" id="editor1" class="form-control" rows="10"></textarea>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<br>
					<div class="col-xs-11">
						<label for="upload" class="custom-file-upload"><i class="glyphicon glyphicon-upload"></i> Upload</label><br>
						<img id="blah" src="#" width="200px" height="140px" alt=" " />
						<input id="upload" name="image" type="file">
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
<script src="../plugin/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1' );
	config.height = 700;
</script>
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

		 $('#upload').bind('change', function() { 
		 	var fileName = ''; 
		 	fileName = $(this).val(); 
		 	$('#file-selected').html(fileName); })
	})
</script>