<?php 

require_once 'core/core.php';

$slug = Input::get('celeb');
$pemain = str_replace("_", " ", $slug);


if($Profil->jumlah($slug) == 0){
	header('location:404.php');
}

$bermain = $Pemain->bermain($pemain);

foreach($Profil->single($slug) as $d){
	$nama          = $d->nama;
	$tanggal_lahir = $d->tanggal_lahir;
	$photo         = $d->photo;
	$tentang       = $d->tentang;
	$Tempat 	   = $d->tempat_lahir;
}


include 'template/headerv21.php';
 ?>


<style type="text/css">
	body{
		background: linear-gradient(#bababa,#e5e5e5); 
	}
	#badan{
		margin-left: 99px;
		padding-top: 20px;
		padding-bottom: 20px;
		width: 1151px;
		background-color: white;
	}

	#profil,#filmtograpi{
		margin-left: 20px;
	}
	.tulisan{
		margin-left: 15px;
	}
	#filmtograpi table{
		border-collapse: collapse;
	}
	#filmtograpi table td{
		border-bottom: 1px solid black;
		padding: 8px 8px 8px 8px;
	}
	@media only screen and (max-width: 1300px) {
	    #badan {
	        width: 1075px;
	        margin-left: 92px;
	    }
	}
</style>

<div id="badan">
<div id="profil">
	<table >
		<tr>
			<td rowspan="4"><img src="profil/<?php echo $photo; ?>" width="195px" height="270px"></td>
			<td width="500px"><span class="tulisan" style="font-size: 19px;"><b><?php echo $nama; ?></b></span></td>
		</tr>
		<tr>
			<td><span class="tulisan"><b>Tanggal Lahir :</b> <?php echo date("j F Y", strtotime($tanggal_lahir)); ?></span></td>
		</tr>
		<tr>
			<td><span class="tulisan"><b>Tempat Lahir :</b> <?php echo $Tempat;  ?></span></td>
		</tr>
		<tr>
			<td><p class="tulisan"><?php echo $tentang; ?></p></td>
		</tr>
	</table>
</div>
<br>
<br>
<div id="filmtograpi">
	<h3><b>FILMOGRAPHY</b></h3>
	<table >
		<tr>
			<td width="50px"><b>SKOR</b></td>
			<td width="250px"><b>JUDUL</b></td>
			<td width="150px"><b>SEBAGAI</b></td>
			<td><b>TAHUN</b></td>
		</tr>
		<?php while($d = $bermain->fetchObject()){ ?>
		<tr>
			<td><?php echo number_format($d->jml,1); ?></td>
			<td><?php echo $d->judul; ?></td>
			<td><?php echo $d->sebagai; ?></td>
			<td><?php echo date("Y", strtotime($d->tanggal_rilis)); ?></td>
		</tr>
		<?php } ?>
	</table>
</div>
</div>
<?php include 'template/footer.html'; ?>