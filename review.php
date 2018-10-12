<?php 

require_once 'core/core.php';

$id_movie = Input::get('id_movie');

foreach($Movie->single($id_movie) as $d){
	$judul = $d->judul;
	$cover = $d->cover;
	$jml   = $d->jml;
	$sinopsis = $d->sinopsis;
}

 ?>

<style type="text/css">
	#komen{
		border: none;
		width: 500px;
		padding-left: 10px;
		background-color: #F0F8FF;
	}

</style>


<div id="kepala">
	<table >
		<tr>
			<td rowspan="4"><img src="cover/<?php echo $cover; ?>" width="80px" height="120px"></td>
		</tr>
		<tr>
			<td style="padding-left: 10px;"><a href="detail.php?id_movie=<?php echo $id; ?>"><b><?php echo $judul; ?></b></a></td>
		</tr>
		<tr>
			<td style="padding-left: 10px;"><b>User Review</b></td>
		</tr>
		<tr>
			<td style="padding-left: 10px;"><a href="rating.php?id_movie=<?php echo $id; ?>">Buat Review</a></td>
		</tr>
	</table>
</div>

<h4>Review User</h4>
<?php foreach($Ratting->single($id_movie) as $c){ ?>
<div id="komen">
	<p style="padding-top: 20px;"><?php echo $c->jumlah; ?>/5</p>
	<p><?php echo $c->username; ?>&nbsp;&nbsp;&nbsp; <?php echo date("j F Y", strtotime($c->tanggal)); ?></p>
	<p><?php echo $c->review; ?></p><br>
</div>
<?php } ?>