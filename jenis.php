<?php 

require_once 'core/core.php';

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
<h3 style="margin-left: 10px;"><b>Kategory <?php echo ucfirst($genre); ?></b></h3>
<span style="margin-left: 10px;">sort by:<a href="jenis.php?g=<?php echo $genre;?>&urut=Alphabet">Alphabet</a> <a href="jenis.php?g=<?php echo $genre;?>&urut=Rating_skor">Rating Skor</a> <a href="jenis.php?g=<?php echo $genre;?>&urut=tanggal_rilis">Tanggal Rilis</a></span>
 <?php while($d = $jenis->fetchObject()):$i++ ?>
 <div class="konten">
  <table >
 	<tr>
 		<td rowspan="4" height="300"><img style="margin-bottom: 70px;margin-left: 10px;-webkit-filter: drop-shadow(5px 5px 5px #222); filter: drop-shadow(5px 5px 5px #222);" src="cover/<?php echo $d->cover; ?>" width="120px" height="200px"></td>
 		<td width="350px">
	 		<h3 style="margin-left: 20px;margin-top: 5px;"><?php echo $i."."; ?> <a href="tittle.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></h3>
	 		<table class="koko">
		 		<tr>
		 			<td width="150px" style="" height="50px"><span style="margin-left: 10px;"><?php echo date("j F Y", strtotime($d->tanggal_rilis)); ?></span></td>
		 			<td ><span style="margin-left: 20px;"><a href=""><?php echo ucfirst($d->genre); ?></a></span></td>
		 		</tr>
	 		</table>
 		</td>
 	</tr>
 	<tr>
 		<td height="5px">
 		<img src="css/star.png" width="20px" height="20px" style="margin-left: 20px;"> 
 		<span style="margin-bottom: -5px;"><b><?php echo number_format($d->jml,1); ?></b></span> 
 		&nbsp; &nbsp; &nbsp;
 		&nbsp; &nbsp; &nbsp;
 		<img src="css/rstar.png" width="20px" height="20px" >
 		
 		</td>
 	</tr>
 	<tr>
 		<td ><p style="margin-left: 20px;font-size: 15px;"><?php echo substr($d->sinopsis, 0,120) ?></p></td>
 	</tr>
 	 <tr>
 		<td><p style="font-size: 15px;margin-left: 20px;">Director:<a href=""><?php echo $d->director; ?></a><br> Sutradara:<a href=""><?php echo $d->penulis ?></a></p></td>
 	</tr>
  </table>
 </div>
 <?php endwhile; ?>
</div>
 </div>
 <?php include 'template/footer.html' ?>