<?php 

require_once 'core/core.php';

include 'template/headerv21.php';

$id_user = Session::get('id_user');

foreach($User->single($id_user) as $d){
	$nama = $d->nama;
	$profil = $d->profil;
	$tanggal = $d->tanggal;
}

if(Input::get('submit')){
	$token = Input::get('value_token');
	if(Input::validasi($token) == true){
		$profil = $_FILES['profil']['name'];
		$tmp 	= $_FILES['profil']['tmp_name'];
		if(move_uploaded_file($tmp, 'profil/'.$profil)){
			if($User->updateimg($id_user,$profil)){
				header('location:user.php');
			}
		}
	}
}


 ?>

<style type="text/css">
	tr.border_bottom td {
  		border-bottom:1pt solid #e8e8e8;
	}
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}

	.tes{
		margin-top: 10px;
	}
	#badan {
		background-color: white;
		margin-left: 99px;
		margin-right: 99px;
		padding-top: 50px;
		padding-bottom: 100px;
	}
	#badan table{
		margin-left: 40px;
	}
</style>
<div id="badan">
<form action="" method="post" enctype="multipart/form-data">
<table >
	<tr class="border_bottom">
		<td colspan="2" width="700px" height="50px"><b style="font-size: 20px;">EDIT AKUN</b></td>
	</tr>
	<tr class="border_bottom">
		<td height="120px" width="160px"><b style="margin-bottom:50px;display: inline-block;">PROFIL IMAGE</b></td>
		<td>
 			<img width="90px" id="blah" height="95px" src="profil/<?php echo $profil; ?>" style="border:1px solid #fce135;margin-left: 15px;">
 			<input id="file" type="file" name="profil" style="margin-left: 10px;display: inline-block;">
 			<input type="hidden" name="value_token" value="<?php echo Input::token(); ?>">
 		</td>
	</tr>
	<tr class="border_bottom">
		<td height="150px"><b style="margin-bottom: 80px;display: inline-block;">PASSWORD</b></td>
		<td>
			<div class="tes col-xs-7">
				<input placeholder="Password Lama" class="form-control " name="id_movie" type="text">
			</div>
			<br>
			<div class="tes col-xs-7">
				<input placeholder="Password Baru" class="form-control " name="id_movie" type="text">
			</div>
			<div class="tes col-xs-7">
				<input placeholder="Ulangi Password" class="form-control " name="id_movie" type="text">
			</div>
		</td>
	</tr>
</table>
<input id="input" style="margin-left: 600px;margin-top: 10px;display: none;" name="submit" type="submit" value="Save Change">
</form>
</div>

<?php include 'template/footer.html'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#file').click(function(){
			$('#input').show();
		})
		function readURL(input) {

		 if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		      $('#blah').attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		  }
		}

		$("#file").change(function() {
		  readURL(this);
		});
	})
</script>