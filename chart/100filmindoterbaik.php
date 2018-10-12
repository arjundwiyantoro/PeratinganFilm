<?php 

require_once '../core/core2.php';

$i = 0;

include '../template/headerv2.php';

 ?>

 <style type="text/css">
 	body{
 		background: linear-gradient(#bababa,#e5e5e5); 
 	}
	#konten span{
		margin-left: 10px;
	}
	.score2{
		margin-left: 20px;
		margin-top: 0px;
		text-align: center;
		height: 50px;
		width: 50px;
		float: left;
	}
	.score2 h3{
		color: white;
		margin-top: 10px;
		font-size: 25px;
	}
	#konten{
		margin-left: 99px;
		background-color: white;
		padding-top: 10px;
		width: 1151px;
		padding-bottom: 20px;
	}
	@media only screen and (max-width: 1300px) {
	    #konten {
	        width: 1074px;
	        margin-left: 92px;
	    }
	}
	#konten table tr{
		border-bottom: 3px solid white;
	}
	#konten table{
		margin-left: 30px;
	}
</style>
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">

 <div id="konten">
 	<h2 style="margin-left: 30px;"><b>100 Film Indonesia Terbaik</b></h2>
 	<br>
 	<table class="table-striped">
 		<tr>
 			<td height="40px"></td>
 			<td width="300px"><span><b>Rank Title</b></span></td>
 			<td width="120px"><b>Filmqu Rating</b></td>
 			<td width="120px"><b>Your Rating</b></td>
 		</tr>
 		 <?php foreach($Movie->indoterbaik() as $d):$i++ ?>
 		<tr>
 			<td><img src="../cover/<?php echo $d->cover; ?>" height="80px" width="50px"></td>
 			<td><span><?php echo $i; ?>. <a href="../tittle.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></span></td>
 			<td>
				<?php if($d->jml <= 4){ ?>
					<div class="score2" style="background-color: red;">
						<h3><b><?php echo number_format($d->jml,1);; ?></b></h3>
					</div>
				<?php }else if($d->jml > 4 AND $d->jml <= 6){ ?>
					<div class="score2" style="background-color: #dce539;">
						<h3><b><?php echo number_format($d->jml,1);; ?></b></h3>
					</div>
				<?php }else{ ?>
					<div class="score2" style="background-color: #25c916;">
						<h3><b><?php echo number_format($d->jml,1);; ?></b></h3>
					</div>
				<?php } ?>
			</td>
 			<td></td>
 		</tr>
 		 <?php endforeach; ?>
 	</table>
 </div>

 <?php include '../template/footer2.html' ?>

 <script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>
<script src="../plugin/jquery-ui/jquery-ui.js"></script>