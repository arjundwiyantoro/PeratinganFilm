<?php 

require_once 'core/core.php';

include 'template/headerv21.php';

if(empty(Session::get('id_user'))){
	header('location:index2.php');
}

$id_user = Session::get('id_user');

foreach($User->single($id_user) as $d){
	$nama = $d->nama;
	$profil = $d->profil;
	$tanggal = $d->tanggal;
}

$cek = $User->cek($id_user);
$userrating = $User->limit5($id_user);
$userlist   = $Watchlist->limit4($id_user);

$date = date('Y-m-d');

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
	#watchlist table,h3,h4{
		margin-left: 10px;
	}
	#watchlist table{
		border-bottom: 1px solid;
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
		@media only screen and (max-width: 1300px) {
	    #badan {
	        margin-right: 92px;
	        margin-left: 92px;
	    }
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
			<td width="200px">
				<a href="edit_user.php" class="btn btn-default" style="margin-left: 50px;margin-bottom: 40px;">Edit Profil <i class="glyphicon glyphicon-chevron-right"></i></a>
			</td>
		</tr>
	</table>
</div>
<div id="badge">
	<div class="col-md-1">
		<a href="badge.php"><img width="64px" height="65px" src="badge/gt.png" data-toggle="tooltip" title="Awal Mulai"></a>
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
<div id="rating">
<div class="wrap">
<h3>Your Rating</h3>
	<table >
	<?php while($d = $userrating->fetchObject()){ ?>
	<td>
		<img width="100px" height="140px" src="cover/<?php echo $d->cover;?>" style="margin-left: 10px;">
		<p style="margin-left: 10px;margin-top: 0px;"><a href="tittle.php?m=<?php echo $d->slug; ?>"><?php echo substr($d->judul, 0,10); ?>...</a></p>
		<p style="margin-left: 50px;margin-top: -10px;"><b><?php echo $d->jumlah; ?></b></p>
	</td>
	<?php } ?>
	</table>
	<h4><a href="ratinguser.php">See more...</a></h4>
</div>
</div>

<br>
<br>

<div id="watchlist">
<div class="wrap2">
<h3 style="margin-top: 20px;">Your Watch List</h3>
	<table>
		<?php while($b = $userlist->fetchObject()){ ?>
		<td width="150px">
		<img width="140px" height="190px" src="cover/<?php echo $b->cover; ?>">
		<p><a href="tittle.php?m=<?php echo $b->slug; ?>"><?php echo substr($b->judul, 0,10); ?>...</a></p></p>
		</td>
		 <?php } ?>
	</table>
	<h4><a href="watchlist.php">See more...</a></h4>
</div>
</div>
</div>
 <?php include 'template/footer.html' ?>



