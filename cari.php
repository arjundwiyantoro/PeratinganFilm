<?php 
require_once 'core/core.php';

$cari = Input::get('kata');



$i = 0;

$action = $Movie->jumlah('genre','action');
$drama = $Movie->jumlah('genre','drama');
$horror = $Movie->jumlah('genre','horror');
$comedy = $Movie->jumlah('genre','comedy');
$scifi = $Movie->jumlah('genre','sci-fi');
$animation = $Movie->jumlah('genre','animation');

$jml = $Movie->carijml($cari);

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
<h3 style="margin-left: 10px;"><b>Hasil Dari Pencarian '<?php echo $cari; ?>'</b></h3>
<?php if($jml != 0){ ?>
   <?php foreach($Movie->cari2($cari) as $d):$i++ ?>
 <div class="konten">
  <table >
 	<tr>
 		<td rowspan="4"><img src="cover/<?php echo $d->cover; ?>" width="140px" height="210px"></td>
 		<td width="350px">
	 		<h3 style="margin-left: 10px;"><?php echo $i."."; ?> <a href="tittle.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></h3>
	 		<table class="koko">
		 		<tr>
		 			<td width="110px" style=""><span style="margin-left: 0px;"><?php echo date("j F Y", strtotime($d->tanggal_rilis)); ?></span></td>
		 			<td><?php echo ucfirst($d->genre); ?></td>
		 		</tr>
	 		</table>
 		</td>
 	</tr>
 	<tr>
 		<td ><p style="margin-left: 10px;font-size: 15px;"><?php echo substr($d->sinopsis, 0,120) ?></p></td>
 	</tr>
 	 <tr>
 		<td><p style="font-size: 15px;margin-left: 10px;">Director:<?php echo $d->director; ?> Sutradara:<?php echo $d->penulis ?></p></td>
 	</tr>
  </table>
 </div>
 <?php endforeach; ?>
 <?php }else{ ?>
 	<div style="margin-left:10px;height: 200px;">
 		<h1>Hasil Tidak Ditemukan</h1>
 	</div>
 <?php } ?>
</div>
 </div>
 <?php include 'template/footer.html' ?>



 ?>