<?php 

require_once 'core/core.php';

include 'template/headerv21.php';



$id_user = Input::get('id_user');

foreach($User->single($id_user) as $d){
	$nama = $d->nama;
	$profil = $d->profil;
	$tanggal = $d->tanggal;
}

$cek = $User->cek($id_user);

$date = date('Y-m-d');
$single = $Ratting->singlerating($id_user);
$startTimeStamp = strtotime($date);
$endTimeStamp = strtotime($tanggal);

$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;

 ?>

 <style type="text/css">
 	#profil{
		
		height: 150px;
		background-color: white;
	}
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}
	.nama {
		margin-top: -10px; margin-left: 10px;font-size: 25px;
	}
	#rating h4{
		margin-top: -1px;
		margin-left: 10px;
	}
	#rating{
		
		width: 83%;
		height: 300px;
		background-color: white;
	}
	.wrap{
		border: 2px solid #edeeef;
		width: 60%;
		height: 290px;
		border-radius: 10px;
	}
	#watchlist{
		border: 2px solid #edeeef;
		margin-top: -20px;
		width: 80%;
		height: 330px;
		background-color: white;
		width: 640px;
	}
	.wrap table{
		border-bottom: 1px solid #edeeef;
		margin-left: 5px;
	}
	#rating a{
		text-decoration: none;
	}
	#rating span{
		margin-left: 40px;
	}
	#watchlist p{
		margin-top: 0px;
	}
	#watchlist table{
		margin-left: 10px;
	}
	#watchlist h4{
		margin-top: 5px;
	}
	#watchlist a{
		text-decoration: none;
	}
	#profil,#watchlist,#rating{
		margin-left: 30px;
	}
	#badan{
		padding-top: 10px;
		margin-left: 99px;
		margin-right: 99px;
		background-color: white;
		padding-bottom: 50px;
	}
	#badge{
		margin-left: 20px;
		height: 100px;
	}
 </style>

<div id="badan">
<div id="profil">
	<table >
		<tr>
			<td width="100px" height="100px">
				<img src="profil/<?php echo $profil; ?>" width="100%" height="100%">
			</td>
			<td width="250px">
				<p class="nama"><?php echo ucfirst($nama); ?> </p>
				<p style="margin-top: -10px;margin-left: 10px;font-size: 13px;">Bergabung <?php echo date("j F Y",strtotime($tanggal)); ?></p>
			</td>
		</tr>
	</table>
</div>
<div id="badge" style="margin-top: -30px;margin-bottom: 5px;">
	<div class="col-md-1">
		<a href=""><img width="64px" height="65px" src="badge/gt.png" data-toggle="tooltip" title="Awal Mulai"></a>
	</div>
	<?php if($cek >= 5){ ?>
	<div class="col-md-1">
		<a href="badge.php"><img src="badge/bronze-medal.png" data-toggle="tooltip" title="Merating 5 Film"></a>
	</div>
	<?php } ?>
	<?php if($cek >= 30){ ?>
	<div class="col-md-1">
		<a href="badge.php"><img src="badge/silver-medal.png"></a>
	</div>
	<?php } ?>
	<?php if($cek >= 70){ ?>
	<div class="col-md-1">
		<a href="badge.php"><img src="badge/bronze-medal.png"></a>
	</div>
	<?php } ?>
	<?php if($cek >= 100){ ?>
	<div class="col-md-1">
		<a href="badge.php"><img src="badge/winner.png"></a>
	</div>
	<?php } ?>
	<?php if($numberDays >= 30){ ?>
	<div class="col-md-1">
		<a href="badge.php"><img src="badge/medal.png" data-toggle="tooltip" title="1 Bulan Di XYZrating"></a>
	</div>
	<?php } ?>
	<?php if($numberDays >= 360){ ?>
	<div class="col-md-1">
		<a href="badge.php"><img src="badge/badge.png"></a>
	</div>
	<?php } ?>
</div>
<div id="watchlist">
<h3 style="margin-left: 10px;">Review</h3>
<?php while($d = $single->fetchObject()){ ?>
<table>
	<tr>
		<td rowspan="3"><img height="238px" width="160px" src="cover/<?php echo $d->cover; ?>"></td>
		<td ><b style="margin-left: 10px;"><?php echo $d->judul; ?></b></td>
	</tr>
	<tr>
		<td><span style="margin-left: 10px;"><?php echo $d->tanggal; ?></span></td>
	</tr>
	<tr>
		<td>
			<p style="margin-left: 10px;"><?php echo $d->review; ?></p>
		</td>
	</tr>
</table>
<?php } ?>
</div>
</div>
 <?php include 'template/footer.html' ?>



