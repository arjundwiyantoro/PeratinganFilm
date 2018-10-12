<?php 

require_once 'core/core.php';

$perPage = 8;
$page 	 = isset($_GET["halaman"]) ? (int)$_GET["halaman"]: 1;


$pages	   = ceil($News->jumlah()/$perPage);

include 'template/headerv21.php';
 ?>

 <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
<style type="text/css">
	*{
		text-decoration: none;
	}
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}
	#konten {
		margin-left: 99px;
		margin-right: 99px;
		padding-top: 20px;
		height: 850px;
		padding-bottom: 100px;
		background-color: white;
	}
	@media only screen and (max-width: 1300px) {
	    #konten {
	        margin-right: 92px;
	        margin-left: 92px;
	    }
	}
	.tes{
		margin-top: 40px;
	}
	.thumbnail {
	  height: 280px;
	  border: 0 none;
    box-shadow: none;
	}
	#page{
		margin-left: 500px;
		margin-top: 650px;
	}
</style>

<div id="konten" >
	<h1 style="margin-left: 20px;"><b>BERITA</b></h1>
	<?php foreach($News->paging() as $d): ?>
	<div class="tes col-xs-6  col-md-3">
		<div class="thumbnail">
			<a href="article.php?judul=<?php echo $d->slug; ?>"><img src="cover/<?php echo $d->image; ?>" width="95%" style="min-height:150px;height:150px;" ></a>
			<div class="caption">
				<h4><a href="article.php?judul=<?php echo $d->slug; ?>" style="text-decoration: none;"><?php echo $d->judul; ?></a></h4>
				<p><?php echo date("j F Y", strtotime($d->tanggal)); ?></p>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php $pagesnext = $page+1 ; ?>
<?php $pagesprev = $page-1; ?>
<br>
<br>
<div id="page">
<ul class="pagination">
 	<?php for($i=1; $i<=$pages; $i++) { ?>
 	<li><a href="?halaman=<?php echo  $i?>"><?php echo  $i?></a></li>
  <?php } ?>
 
   <?php if ($pagesprev == $i) {?>
	<li><a href="?halaman=<?php echo $pagesprev?>"><</a></li>
	<?php } ?>
  <?php if ($pagesnext != $i) {?>
  	<li><a class="link1" href="?halaman=<?php echo $pagesnext?>">></a></li>
 	<?php } ?>
 </ul>
</div>
</div>
<?php include 'template/footer.html' ?>

<script src="plugin/bootstrap/js/bootstrap.js"></script>
