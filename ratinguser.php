<?php 

require_once 'core/core.php';

$id_user = Session::get('id_user');

$i = 0;

if($User->cek($id_user) == 0){
	header('location:user.php');
}

 ?>

<?php 

$genre = Input::get('g');

$i = 0;

$action = $Movie->jumlah('genre','action');
$drama = $Movie->jumlah('genre','drama');
$horror = $Movie->jumlah('genre','horror');
$comedy = $Movie->jumlah('genre','comedy');
$scifi = $Movie->jumlah('genre','sci-fi');
$animation = $Movie->jumlah('genre','animation');

if(!isset($_GET['urut'])){
	$jenis = $Movie->genre($genre);
}else if($_GET['urut'] == 'Alphabet'){
	$jenis = $Movie->alphabet($genre);
}else if($_GET['urut'] == 'Rating_skor'){
	$jenis = $Movie->urutjml($genre);
}else if($_GET['urut'] == 'tanggal_rilis'){
	$jenis = $Movie->uruttgl($genre);
}

include 'template/headerv21.php';

 ?>

<style type="text/css">
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}
	#badan{
		background-color: white;
		padding-top: 10px;
		padding-bottom: 10px;
		margin-left: 99px;
		margin-right: 99px;
		box-shadow: 5px 0px #888888;
	}
	.konten table h3{
		font-size: 18px;
		margin-top: -5px;
	}
	.konten table p{
		font-size: 15px;
	}
	.konten table{
		margin-left: 10px;
	}
	.konten img{
		-webkit-filter: drop-shadow(2px 2px 2px #222); 
		filter: drop-shadow(2px 2px 2px #222);
	}
	.koko{
		margin-top: -13px;
	}
	.konten{
		margin-top: 20px;
		margin-bottom:40px;
		margin-left: 10px; 
		background-color: #f7f7f7;
		border-radius: 15px;
		margin-right: 20px;
		padding-top: 20px;
		padding-bottom: 20px;
	}
	#konten2{
		float: right;

	}
	#subkonten2{
		border-radius: 15px;
		margin-right: 40px;
		width: 300px;
		height: 200px;
		border: 1px solid #f7f7f7;
		margin-top: 10px;
		background-color: #e0ebfc;
		box-shadow: 2px 2px 0px 0px #888888;
	}
	#subkonten2 a{
		color: blue;
	}
	#subkonten3{
		border-radius: 15px;
		margin-right: 40px;
		width: 300px;
		height: 200px;
		border: 1px solid black;
		margin-top: 40px;
	}
	#jenis{
		border: 1px solid #f7f7f7;
		width: 750px;
		margin-left: 20px;
		border-radius: 15px;
	}
</style>
<div id="badan">
 <div id="konten2">
 	<div id="subkonten2">
 	<h4 style="margin-left: 10px;"><b>Kategory</b></h4>
 	<ul>
 		<li><a href="jenis.php?g=action">Action</a> (<?php echo $action; ?>)</li>
 		<li><a href="jenis.php?g=horror">Horror</a> (<?php echo $horror; ?>)</li>
 		<li><a href="jenis.php?g=drama">Drama</a> (<?php echo $drama; ?>)</li>
 		<li><a href="jenis.php?g=sci-fi">Sci-Fi</a> (<?php echo $scifi; ?>)</li>
 		<li><a href="jenis.php?g=animation">Animation</a> (<?php echo $animation; ?>)</li>
 		<li><a href="jenis.php?g=comedy">Comedy</a> (<?php echo $comedy; ?>)</li>
 	</ul>
 	</div>
 </div>
<div id="jenis">
<h3 style="margin-left: 10px;"><b>Sudah Di Ratting</b></h3>
 <?php foreach($User->tes($id_user) as $d):$i++ ?>
 <div class="konten">
  <table >
 	<tr>
 		<td rowspan="3"><img src="cover/<?php echo $d->cover; ?>" width="100px" height="150px"></td>
 		<td width="300px">
 		<h3 style="margin-left: 14px;"><?php echo $i."."; ?> <a href="tittle.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></h3>
 		<table class="koko" style="margin-left: 15px;margin-top: -3px;">
 		<tr>
 			<td width="130px" style=""><?php echo date("j F Y", strtotime($d->tanggal_rilis)); ?></td>
 			<td width="80px" style="">Skor:<b><?php echo $d->jumlah; ?>/10</b></td>
 			<td><a href="jenis.php?g=<?php echo $d->genre; ?>"><?php echo ucfirst($d->genre); ?></a></td>
 		</tr>
 		</table>
 		</td>
 	</tr>
 	<tr>
 		<td><span style="margin-left: 15px;">Di rating pada <?php echo date("j F Y", strtotime($d->tanggal)); ?></span></td>
 	</tr>
 	<tr>
 		<td><p style="margin-left: 15px;"><?php echo substr($d->sinopsis, 0,80) ?></p></td>
 	</tr>
  </table>
 </div>
 <?php endforeach; ?>
</div>
 </div>
 <?php include 'template/footer.html' ?>