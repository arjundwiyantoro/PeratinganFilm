<?php 

require_once 'core/core.php';

if(isset($_SESSION['id_user'])){
	$id_user = Session::get('id_user');
}

$slug = Input::get('m');

if($Movie->jumlah('slug',$slug) == 0){
	die("404 Not Found");
}

foreach($Movie->slug($slug) as $d){
	$id_movie 	= $d->id_movie;
	$judul 		= $d->judul;
	$sinopsis 	= $d->sinopsis;
	$jml 		= $d->jml;
	$cover 		= $d->cover;
	$director 	= $d->director;
	$penulis 	= $d->penulis;
}

$slug = str_replace(" ", "_", $judul);

$jumlah = $Ratting->jumlah($id_movie);

 ?>
 <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="plugin/slick-1.8.0/slick/slick.css">
<link rel="stylesheet" type="text/css" href="plugin/slick-1.8.0/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/detail.css">

<div id="header">
	<b><?php echo $judul ?></b><span>Skor: <?php echo number_format($jml,1);?>/5  Dari <?php echo $jumlah; ?> User</span> 	
</div>
<div id="image">
<table>
<tr>
	<td><img id="myImg" height="300px" width="200px" src="cover/<?php echo $cover; ?>"></td>
	<td>
	<?php if($jml <= 2){ ?>
	<div id="kritikus" style="background-color: red;"><h3><?php echo number_format($jml,1);?></h3></div>
	<?php }else if($jml > 2 AND $jml <= 3){ ?>
	<div id="kritikus" style="background-color: #f2ec41;"><h3><?php echo number_format($jml,1);?></h3></div>
	<?php }else{ ?>
	<div id="kritikus" style="background-color: #25c916;"><h3><?php echo number_format($jml,1);?></h3></div>
	<?php } ?>
	</td>
	<td>
	<?php if(isset($_SESSION['id_user'])){ ?>
		<?php if($Watchlist->cek($id_user,$id_movie) == 0){ ?>
			<input id="id_movie" type="hidden" value="<?php echo $id_movie; ?>">
			 <input id="id_user" type="hidden" value="<?php echo $id_user; ?>">
			 <button id="submit">tambah</button>
			 <button id="hapus" style="display: none;">hapus</button>
		<?php }else{ ?>
			<input id="id_movie" type="hidden" value="<?php echo $id_movie; ?>">
			<input id="id_user" type="hidden" value="<?php echo $id_user; ?>">
			<button id="submit" style="display: none;">tambah</button>
			<button id="hapus" >hapus</button>
		<?php } ?>
	<?php }else{ ?>
		<button id="" onclick="window.location.replace('login.php');">tambah</button>
	<?php } ?>
	</td>
</tr>
</table>
</div>
<div id="isi">
<p><?php echo $sinopsis; ?></p>
<p><b>Director:</b>  <?php echo $director; ?></p>
<p><b>Penulis :</b>  <?php echo $penulis; ?></p>
<p><b>Pemain :</b>
<?php if(!empty($Pemain->single($id_movie))){ ?>
<?php foreach($Pemain->single($id_movie) as $b){
		echo $b->nama .", ";
	} ?></p>
<?php }else{ ?>
<p></p>
<?php } ?>
</div>
<div id="pemain">
	<table>
		<tr>
			<td width="400px">Pemain</td>
			<td width="400px">Sebagai</td>
		</tr>
		<?php if(!empty($Pemain->single($id_movie))){ ?>
		<?php foreach($Pemain->single($id_movie) as $b){ 
			$slug = str_replace(" ", "_", $b->nama);
			?>
		<tr>			
			<td><a href="profil.php?celeb=<?php echo $slug; ?>"><?php echo $b->nama; ?></a></td>
			<td><?php echo $b->sebagai; ?></td>
		</tr>
		<?php } ?>
		<?php }else{ ?>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<?php } ?>
	</table>
</div>
<h3 style="margin-left: 20px;"><?php echo $judul; ?> Photo</h3>
	<section class="regular slider">
		<?php foreach($Photo->single($id_movie) as $c){ ?>
		<div>
			<img  width="200px" height="180px" src="photo/<?php echo $c->photo; ?>">
		</div>
		<?php } ?>
	</section>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<div id="detail">
	<?php foreach($Detail->single($id_movie) as $d): ?>
	<p><b>Budget :</b>Rp. <?php echo Input::convert($d->budget); ?></p>
	<p><b>Keuntungan :</b>Rp. <?php echo Input::convert($d->keuntungan); ?></p>
	<p><b>Negara :</b><?php echo $d->negara; ?></p>
	<p><b>Bahasa :</b><?php echo $d->bahasa; ?></p>
	<p><b>Runtime :</b><?php echo $d->runtime; ?></p>
	<?php endforeach; ?>
</div>
<div id="komen">
	<table border="1px">
		<tr>
			<td>Kritikus</td>
			<td>User</td>
		</tr>
		<tr>
			<td height="200px">
			</td>
			<td width="300px">
				<?php foreach($Ratting->single($id_movie) as $c): ?>
					<b><?php echo $c->review; ?></b><br>
				<?php endforeach; ?>
			</td>
		</tr>
	</table>
</div>

 <script src="plugin/js/jquery1.js" type="text/javascript"></script>
 <script src="plugin/slick-1.8.0/slick/slick.js" type="text/javascript" charset="utf-8"></script>
 <script type="text/javascript">
 var modal = document.getElementById('myModal');
 	var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}

 	$(document).on('ready', function() {
 		$('#submit').on('click',function(){
 			var id_movie    = $('#id_movie').val();
 			var id_user  	= $('#id_user').val();
	 		var judul 	 	= $('#judul').val();
	 		var slug	 	= $('#slug').val();
	 		var cover	 	= $('#cover').val();
	 		$.ajax({
	 			method:"POST",
	 			url:"rest/server.php?page=store",
	 			data:{id_user:id_user,id_movie:id_movie,judul:judul,slug:slug,cover:cover},
	 			success:function(data){
	 				$('#submit').hide(500);
	 				$('#hapus').show(500);
	 			}
	 		});
 		});

 		$('#hapus').click(function(){
 			var id_movie    = $('#id_movie').val();
 			var id_user  	= $('#id_user').val();
 			$.ajax({
 				method:'post',
 				url:'rest/server.php?page=delete',
 				data:{id_movie:id_movie,id_user:id_user},
 				success:function(data){
 					$('#hapus').hide(500);
 					$('#submit').show(500);
 				}
 			}) 
 		});

 		$(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4
      });
 	});
 </script>