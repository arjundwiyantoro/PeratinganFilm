<?php 

require_once 'core/core.php';


$i = 0;
 ?>

  <?php foreach($Movie->terbaru() as $d):$i++ ?>
 <div class="konten">
  <table >
 	<tr>
 		<td rowspan="4"><img src="cover/<?php echo $d->cover; ?>" width="140px" height="210px"></td>
 		<td width="350px">
	 		<h3 style="margin-left: 10px;"><?php echo $i."."; ?> <a href="detail.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></h3>
	 		<table class="koko">
		 		<tr>
		 			<td width="110px" style="border-right: 1px solid;"><span style="margin-left: 10px;"><?php echo date("j F Y", strtotime($d->tanggal_rilis)); ?></span></td>
		 			<td width="80px" style="border-right: 1px solid;"></td>
		 			<td><?php echo $d->genre; ?></td>
		 		</tr>
	 		</table>
 		</td>
 	</tr>
 	<tr>
 		<td height="20px">
 		<img src="star.png" width="20px" height="30px"> 
 		<span style="margin-bottom: -5px;"><?php echo number_format($d->jml,1); ?></span> 
 		&nbsp; &nbsp; &nbsp;
 		&nbsp; &nbsp; &nbsp;
 		<img src="rstar.png" width="20px" height="20px" style="margin-bottom: 5px;">
 		
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