<?php 
require_once 'core/core.php';

include 'template/headerv21.php';

if(isset($_SESSION['id_user'])){
	$id_user = Session::get('id_user');
}

$slug = Input::get('m');

if($Movie->jumlah('slug',$slug) == 0){
	header('location:404.php');
}

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
	$background = $d->background;
	$trailer	= $d->trailer;
	$genre		= $d->genre;
	$tanggal_rilis = $d->tanggal_rilis;
}

$slug = str_replace(" ", "_", $judul);

$jumlah = $Ratting->jumlah($id_movie);

$single = $Ratting->single2($id_movie);

$photo = $Photo->single2($id_movie);


 ?>

<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="plugin/slick-1.8.0/slick/slick.css">
<link rel="stylesheet" type="text/css" href="plugin/slick-1.8.0/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/detail.css">
<style type="text/css">
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}
	#badan{
		margin-right: 101px;
		margin-left: 99px;
		height: 500px;
		background-repeat: no-repeat;
		
		box-shadow: 5px 0px #888888;
	}
	.tulisan{
		height: 500px;
		background-color: rgba(0, 0, 0, .3);
	}
	#badan > h2{
		color: white;
		font-size: 40px;
		margin-top: -460px;
		margin-left: 40px;
	}
	#badan > table{
		color: white;
		margin-left: 40px;
	}
	.score{
		margin-top: -40px;
		margin-left: 70px;
		text-align: center;
		height: 80px;
		width: 80px;
	}
	.score > h3{
		padding-top: 20px;
		font-size: 40px;
	}
	.konten{
		border-bottom: 1px solid white;
	}
	.score2{
		margin-top: 0px;
		text-align: center;
		height: 50px;
		width: 50px;
		float: left;
	}
	.score2 > h3{
		color: white;
		margin-top: 10px;
		font-size: 25px;
	}
	.nama{
		font-size: 20px;
		color: black;
		font-weight: bold;
	}
	.nama,.tanggal{
		margin-left: 20px;
	}
	.tanggal{
		color: #cccccc;
	}
	#komen{
		padding-top: 20px;
		padding-bottom: 50px;
	}
	#komen table{
		margin-left: 20px;
		margin-top: 20px;
	}
	iframe{
		margin-left: 20px;
		border: none;
	}
	.lihat{
		display: inline-block;
		margin-top: 20px;
		text-decoration: none;
		margin-left: 20px;
		border: 1px solid blue;
		padding: 10px 160px 10px 160px;
		-moz-transition: all .3s ease-in;
		transition: all .3s ease-in;
	}
	.lihat:hover{
		background-color: #3178ea;
		color: white;
		border: 1px solid white;
	}
	.pro {
	  overflow: hidden;
	}

	.pro img {
	  -moz-transition: all 0.3s;
	  -webkit-transition: all 0.3s;
	  transition: all 0.3s;
	  cursor: pointer;
	}

	.pro:hover img {
	  -moz-transform: scale(1.1);
	  -webkit-transform: scale(1.1);
	  transform: scale(1.1);
	}
	.watchlist{
		width: 200px;
		margin-top: 10px;
	}
/* The Modal (background) */
	.modal2 {
	  display: none;
	  position: fixed;
	  z-index: 1;
	  padding-top: 50px;
	  left: 0;
	  top: 0;
	  width: 100%;
	  height: 100%;
	  overflow: auto;
	  background-color: black;
	}

	/* Modal Content */
	.modal-content {
	  position: relative;
	  background-color: #fefefe;
	  margin: auto;
	  padding: 0;
	  width: 80%;
	  max-width: 1200px;
	}

	/* The Close Button */
	.close {
	  color: white;
	  position: absolute;
	  top: 10px;
	  right: 25px;
	  font-size: 35px;
	  font-weight: bold;
	}

	.close:hover,
	.close:focus {
	  color: #999;
	  text-decoration: none;
	  cursor: pointer;
	}

	/* Hide the slides by default */
	.mySlides {
	  display: none;
	}

	/* Next & previous buttons */
	.prev,
	.next {
	  cursor: pointer;
	  position: absolute;
	  top: 45%;
	  width: auto;
	  padding: 16px;
	  margin-top: -50px;
	  color: white;
	  font-weight: bold;
	  font-size: 20px;
	  transition: 0.6s ease;
	  border-radius: 0 3px 3px 0;
	  user-select: none;
	  -webkit-user-select: none;
	}

	/* Position the "next button" to the right */
	.next {
	  right: 0;
	  border-radius: 3px 0 0 3px;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover,
	.next:hover {
	  background-color: rgba(0, 0, 0, 0.8);
	}

	/* Number text (1/3 etc) */
	.numbertext {
	  color: #f2f2f2;
	  font-size: 12px;
	  padding: 8px 12px;
	  position: absolute;
	  top: 0;
	}

	/* Caption text */
	.caption-container {
	  text-align: center;
	  background-color: black;
	  padding: 2px 16px;
	  color: white;
	}

	img.demo {
	  opacity: 0.6;
	}

	.active,
	.demo:hover {
	  opacity: 1;
	}

	img.hover-shadow {
	  transition: 0.3s;
	}

	.hover-shadow:hover {
	  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	@media only screen and (max-width: 1300px) {
	    #badan {
	        margin-right: 92px;
	        margin-left: 92px;
	    }
	    #komen,#isi,#pemain,#detail,#galery,#image{
	    	margin-left: 91px;
	    	width: 1075px;
	    }
	}
</style>
<body>
<div id="badan" style="background-image: url(cover/<?php echo $background; ?>);">
	<div class="tulisan">
	</div>
	<h2 style="margin-bottom: 40px;"><b><?php echo $judul; ?> (<?php echo date('Y', strtotime($tanggal_rilis)); ?>)</b></h2>
	<table >
		<tr>
			<td width="500px" height="150px">
				<table class="konten">
					<tr>
						<td width="350px" height="40px" style="font-size: 20px;">RATINGQU</td>
						<td width="150px" height="50px" rowspan="2">
						<?php if($jml == 0){ ?>
							<div class="score" style="background-color: red;">
								<h3><b><?php echo round($jml); ?></b></h3>
							</div>
						<?php }else if($jml > 0 AND $jml <= 4){ ?>
							<div class="score" style="background-color: red;">
								<h3><b><?php echo number_format($jml,1); ?></b></h3>
							</div>
						<?php }else if($jml > 4 AND $jml <= 6){ ?>
							<div class="score" style="background-color: #dce539;">
								<h3><b><?php echo number_format($jml,1); ?></b></h3>
							</div>
						<?php }else if($jml == 10){ ?>
							<div class="score" style="background-color: #25c916;">
								<h3><b><?php echo round($jml); ?></b></h3>
							</div>
						<?php }else{ ?>
							<div class="score" style="background-color: #25c916;">
								<h3><b><?php echo number_format($jml,1); ?></b></h3>
							</div>
						<?php } ?>
						</td>
					</tr>
					<tr>
						<td width="350px" height="90px">
						Favorit review 
						<br>
						terdiri dari <?php echo $jumlah; ?> kritik
						<br>
						<a href="rating.php?id_movie=<?php echo $id_movie; ?>">lihat full</a>
						</td>
					</tr>
				</table>
			</td>
			<td rowspan="2" width="500px" height="150px">
				<iframe src="http://www.youtube.com/embed/<?php echo $trailer; ?>" width="470px" height="350px"         allowfullscreen="allowfullscreen"
        mozallowfullscreen="mozallowfullscreen" 
        msallowfullscreen="msallowfullscreen" 
        oallowfullscreen="oallowfullscreen"></iframe>
			</td>
		</tr>
	<!-- 2 rating	
		<tr>
			<td  width="500px" height="150px">
				<table class="konten">
					<tr>
						<td width="350px" height="40px" style="font-size: 20px;">User Review</td>
						<td width="150px" height="50px" rowspan="2">
							<div class="score">
								<h3>8</h3>
							</div>
						</td>
					</tr>
					<tr>
						<td width="350px" height="90px">
						Favorit review 
						<br>
						terdiri dari 50 kritikus
						<br>
						<a href="">lihat full</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		-->
	</table>
</div>


<div id="image">
<table>
<tr>
	<td><img id="myImg" height="300px" width="200px" src="cover/<?php echo $cover; ?>"></td>
</tr>
<tr>
	<td>
		<?php if(isset($_SESSION['id_user'])){ ?>
		<?php if($Watchlist->cek($id_user,$id_movie) == 0){ ?>
			<input id="id_movie" type="hidden" value="<?php echo $id_movie; ?>">
			 <input id="id_user" type="hidden" value="<?php echo $id_user; ?>">
			 <button data-toggle="tooltip" title="Tambah watchlist" class="btn btn-primary watchlist" id="submit"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
			 <button data-toggle="tooltip" title="HapusWatchlist" class="btn btn-success watchlist" id="hapus" style="display: none;"><i class="glyphicon glyphicon-ok"></i> Watchlist</button>
		<?php }else{ ?>
			<input id="id_movie" type="hidden" value="<?php echo $id_movie; ?>">
			<input id="id_user" type="hidden" value="<?php echo $id_user; ?>">
			<button class="btn btn-primary watchlist" id="submit" style="display: none;"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
			<button data-toggle="tooltip" title="Hapus Watchlist watchlist" class="btn btn-success watchlist" id="hapus" ><i class="glyphicon glyphicon-ok"></i> Watchlist</button>
		<?php } ?>
	<?php }else{ ?>
		<button  class="btn btn-primary watchlist" onclick="window.location.replace('login.php');"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
	<?php } ?>
	</td>
</tr>
</table>
</div>
<div id="isi">
<p><?php echo $sinopsis; ?></p>
<p><b>Director:</b>  <a href=""><?php echo $director; ?></a></p>
<p><b>Penulis :</b>  <a href=""><?php echo $penulis; ?></a></p>
<p><b>Pemain :</b>
<?php if(!empty($Pemain->single($id_movie))){ ?>
<?php foreach($Pemain->single($id_movie) as $b){
		echo "<a href=''>".$b->nama."</a>".", ";
	} ?></p>
<?php }else{ ?>
<p></p>
<?php } ?>
<p><b>Genre :</b>  <a href="jenis.php?g=<?php echo $genre; ?>"><?php echo ucfirst($genre); ?></a></p>
</div>
<div id="pemain">
	<h1 style="margin-left: 20px;"><b>Pemain</b></h1>
	<table>
		<tr>
			<th width="400px">Pemain</th>
			<th width="400px">Sebagai</th>
		</tr>
		<?php if(!empty($Pemain->single($id_movie))){ ?>
		<?php foreach($Pemain->limit10($id_movie) as $b){ 
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
<div id="galery">
<h3 style="margin-left: 20px;"><b><?php echo $judul; ?> Photo</b></h3>
	<section class="regular slider">
		<?php $gambarke = 0; ?>
		<?php while($c = $photo->fetchObject()){$gambarke++ ?>
		<div class="pro">
			<img style="cursor: pointer;" onclick="openModal();currentSlide(<?php echo $gambarke; ?>)" width="450px" height="200px" src="photo/<?php echo $c->photo; ?>">
		</div>
		<?php } ?>
	</section>
	<div id="myModal" class="modal2">
	  <span class="close cursor" onclick="closeModal()">&times;</span>
	  <div class="modal-content">
	  	<?php $gambarke2 = 0; ?>
	  	<?php $photo2 = $Photo->single2($id_movie); ?>
	  	<?php $jmgmbr = $photo2->rowcount(); ?>
	  	<?php while($d = $photo2->fetchObject()){$gambarke2++ ?>
	    <div class="mySlides">
	      <div class="numbertext"><?php echo $gambarke2; ?> /<?php echo $jmgmbr; ?></div>
	      <img src="photo/<?php echo $d->photo; ?>" style="width: 100%;height: 600px;">
	    </div>
	    <?php } ?>
	    <!-- Next/previous controls -->
	    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	    <a class="next" onclick="plusSlides(1)">&#10095;</a>

	    <!-- Caption text -->
	    <div class="caption-container">
	      <p id="caption"></p>
	    </div>

	    <!-- Thumbnail image controls -->

	  </div>
	</div>
</div>
<div id="myModal2" class="modal">
  <span class="close2">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<div id="detail">
	<h1 style="margin-left: 20px;"><b>Details</b></h1>
	<p><b>Tanggal Rilis :</b>  <?php echo date("j F Y", strtotime($tanggal_rilis)); ?></p>
	<?php foreach($Detail->single($id_movie) as $d): ?>
	<?php if($d->budget != 0){ ?>
	<p><b>Budget :</b> Rp. <?php echo Input::convert($d->budget); ?></p>
	<?php }else{ ?>
	<p><b>Budget :</b> <i>Belum Diketahui</i></p>
	<?php } ?>
	<?php if($d->keuntungan != 0){ ?>
	<p><b>Keuntungan :</b> Rp. <?php echo Input::convert($d->keuntungan); ?></p>
	<?php }else{ ?>
	<p><b>Keuntungan :</b> <i>Belum Diketahui</i></p>
	<?php } ?>
	<p><b>Negara :</b> <?php echo $d->negara; ?></p>
	<p><b>Bahasa :</b> <?php echo $d->bahasa; ?></p>
	<p><b>Runtime :</b> <?php echo $d->runtime; ?></p>
	<?php endforeach; ?>
</div>
<div id="komen">
	<h1 style="margin-left: 20px;"><b>Review User</b></h1>
	<?php while($c = $single->fetchObject()): ?>
	<table>
		<tr>
			<td width="400px">
			<?php if($c->jumlah <= 4){ ?>
				<div class="score2" style="background-color: red;">
					<h3><?php echo $c->jumlah; ?></h3>
				</div>
			<?php }else if($c->jumlah > 4 AND $c->jumlah <= 6){ ?>
				<div class="score2" style="background-color: #dce539;">
					<h3><?php echo $c->jumlah; ?></h3>
				</div>
			<?php }else{ ?>
				<div class="score2" style="background-color: #25c916;">
					<h3><?php echo $c->jumlah; ?></h3>
				</div>
			<?php } ?>
				<span class="nama"><?php echo ucfirst($c->username); ?></span>
				<br>
				<span class="tanggal"><?php echo date("j F Y", strtotime($c->tanggal)); ?></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<p><?php echo substr($c->review,0,100); ?></p>
			</td>
		</tr>
	</table>
	<?php endwhile; ?>
	<a href="rating.php?id_movie=<?php echo $id_movie; ?>" class="lihat">Lihat Semua</a>
</div>
<?php include 'template/footer.html'; ?>			
</body>
 <script src="plugin/slick-1.8.0/slick/slick.js" type="text/javascript" charset="utf-8"></script>
 <script type="text/javascript">
 var modal = document.getElementById('myModal2');
 	var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

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
	 				$('#submit').hide();
	 				$('#hapus').show();
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
 					$('#hapus').hide();
 					$('#submit').show();
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
 <script>
// Open the Modal
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>