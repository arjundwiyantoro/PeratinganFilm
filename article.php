<?php 

require_once 'core/core.php';

$slug = Input::get('judul');

if(isset($_SESSION['id_user'])){
	$id_user = $_SESSION['id_user'];
	foreach($User->single($id_user) as $d){
		$profil = $d->profil;
	}
}

foreach($News->single($slug) as $d){
	$id_news = $d->id_news;
	$judul = $d->judul;
	$isi   = $d->isi;
	$image = $d->image;
	$tanggal = $d->tanggal;
}

if(Input::get('submit')){
	$komen = Input::get('komen');
	$tanggal = date('Y-m-d');
	if($Komen->store($id_news,$id_user,$komen,$tanggal)){
		header('location:article.php?judul='.$slug);
	}
}



$single = $Komen->single($id_news);

$pecah = explode("\r\n\r\n", $isi);

$text = "";

for ($i=0; $i<=count($pecah)-1; $i++)
{
	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
	$text .= $part;
}

include 'template/headerv21.php';
 ?>

<style type="text/css">
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}
	#konten{
		margin-left: 99px;
		width: 1151px;
		padding-top: 10px;
		padding-bottom: 40px;
		background-color: white;
	}
	#berita{
		margin-left: 20px;
	}
	#berita p {
		font-size: 18px;
		margin-right: 200px;
	}
	#komen{
		margin-left: 20px;
		padding-bottom: 30px;
	}
	@media only screen and (max-width: 1300px) {
	    #konten {
	        width: 1074px;
	        margin-left: 92px;
	    }
	    textarea{
	    	width: 650px;
	    }

	}
	@media only screen and (max-width: 1200px) {
	    #konten {
	        width: 959px;
	        margin-left: 82.5px;
	    }
	}
	@media only screen and (max-width: 1024px) {
	    #konten {
	        width: 859px;
	        margin-left: 74px;
	    }
	}
</style>

<div id="konten">
<div id="berita">
<h2><b><?php echo $judul; ?></b></h2>
<p><?php echo date("j F Y",strtotime($tanggal)); ?></p>
<img width="750px" height="500px" src="cover/<?php echo $image; ?>"><br>
<br>
<?php echo $text; ?>
</div>
<br>
<br>
<div id="komen">
	<h3><b><?php echo $single->rowcount(); ?> Komentar</b></h3>
	<br>
	<?php if(isset($_SESSION['id_user'])){ ?>
	<form action="" method="post">
	<table>
		<tr>
			<td  height="100px" width="80px">
			<img style="margin-bottom:30px; " width="50px" height="50px" src="profil/<?php echo $profil; ?>">
			</td>
			<td width="600px">
				<textarea style="border:1px solid black;padding-top: 10px;padding-left: 10px;" name="komen" cols="100" rows="3" placeholder="Masukan Komentar"></textarea>
				<input class="btn btn-primary" style="margin-left: 570px;margin-top: 5px;" type="submit" name="submit" value="Submit">
			</td>
		</tr>
	</table>
	</form>
	<?php }else{ ?>
		<table>
		<tr>
			<td  height="100px" width="80px">
			<img style="margin-bottom:30px; " width="50px" height="50px" src="profil/profil.png">
			</td>
			<td width="600px">
				<textarea style="border:1px solid black;padding-top: 10px;padding-left: 10px;" name="komen" cols="100" rows="3" placeholder="Masukan Komentar"></textarea>
				<button style="margin-left: 570px;margin-top: 5px;" class="btn btn-primary" onclick="window.location = 'login.php';">Submit</button>
			</td>
		</tr>
	</table>
	<?php } ?>
	<br>
	<br>
<?php while($d = $single->fetchObject()){ ?>
	<table >
		<tr>
			<td rowspan="2" height="100px" width="80px">
			<img style="margin-bottom: 30px;" width="50px" height="50px" src="profil/<?php echo $d->profil; ?>">
			</td>
			<td width="600px"><b><?php echo ucfirst($d->nama); ?></b></td>
			<td width="150px" style="text-align: right;"><?php echo date("j F Y",strtotime($d->tanggal)); ?></td>
		</tr>
		<tr>
			<td><div class="textContainer_Truncate"><p style="font-size: 17px;"><?php echo $d->komen; ?></p></div></td>
		</tr>
	</table>
<?php } ?>
</div>
</div>

<?php include 'template/footer.html'; ?>