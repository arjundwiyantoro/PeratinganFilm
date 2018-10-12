<?php 

require_once 'core/core.php';

require_once 'template/headerv21.php';

$profil = $Profil->borntoday5();

 ?>



<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="plugin/bx-slider/jquery.bxslider.css">
<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
<style type="text/css">
	*{
		text-decoration: none;
	}
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}
	#badan{
		margin-left: 99px;
		background-color: white;
		margin-right: 99px;
		-webkit-box-shadow: 10px 0 5px -2px #888;
	}
	@media only screen and (max-width: 1300px) {
	    #badan {
	        margin-right: 92px;
	        margin-left: 92px;
	    }
	}
	@media only screen and (max-width: 1024px) {
	    #badan {
	        margin-left: 74px;
	        margin-right: 74px;
	    }
	    #navbar{
	    	width: 104%;
	    }
	    .konten img{
	    	width: 104%;
	    }
	    .tulisan {
	    	width: 100px;
	    }
	    .tulisan h4{
	    	font-size: 10px;
	    }
	}
	.konten{
		width: 260px;
		height: 140px;
		margin-top: -190px;
	}
	.tulisan{
		margin-top: -120px;
		z-index: 2;
		position: absolute;
		height: 100px;
		width: 290px;
		background-color: rgba(255,255,255, .6);
		margin-left: 30px;
		background-repeat: no-repeat;
	}
	.tulisan h4{
		margin-top: 8px;
		font-size: 20px;
		margin-left: 8px;
	}
	.tulisan p{
		margin-top: -10px;
		margin-left: 8px;
	}
	#konten2 table table{
		margin-top: -10px;
		margin-left: 20px;
	}
	#konten2 a{
		color: black;
		text-decoration: none;
		font-family: 'Cabin', sans-serif;
	}
	#konten2 b{
		font-family: 'Cabin', sans-serif;
	}
	#konten2 span{
		font-family: 'Cabin', sans-serif;
	}
	#konten2 a:hover{
		color: #80acf2;
	}
	#konten2 {
		padding-bottom: 10px;
	}
	#konten3 {
		width: 800px;
		height: 350px;
		
	}
	#konten4 {
		width: 800px;
		height: 400px;
		
	}
	#konten5 {
		width: 800px;
		height: 400px;
		
	}
	#konten3 h4{
		padding-left: 30px;
		font-size: 25px;
		width: 800px;
		background-color: red;
		color: white;
		border-radius: 5px;
		height: 30px;
		padding-top: 10px;
		padding-bottom: 30px;
	}
	#konten3 table{
		margin-top: 20px;
		margin-left: 20px;
	}
	#konten4 h4{
		padding-left: 30px;
		font-size: 25px;
		width: 800px;
		background-color: red;
		color: white;
		border-radius: 5px;
		height: 30px;
		padding-top: 10px;
		padding-bottom: 30px;
	}
	#konten4 table{
		margin-top: 20px;
		margin-left: 20px;
	}
	#konten5 h4{
		padding-left: 30px;
		font-size: 25px;
		width: 800px;
		background-color: red;
		color: white;
		border-radius: 5px;
		height: 30px;
		padding-top: 10px;
		padding-bottom: 30px;
	}
	#konten5 table{
		margin-top: 20px;
		margin-left: 20px;
	}
	.bxslider img{
		height: 315px;
	}
	.score2{
		margin-top: 0px;
		text-align: center;
		height: 40px;
		width: 40px;
		float: left;
	}
	.score2 > h3{
		color: white;
		margin-top: 10px;
		font-size: 20px;
	}
	.score3{
		position: absolute;
		z-index: 3;
		margin-top: -160px;
		margin-left: 10px;
		text-align: center;
		height: 40px;
		width: 40px;
		float: left;
	}
	.score3 > h3{
		color: white;
		margin-top: 10px;
		font-size: 20px;
	}
	.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
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
  width: 90%;
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
  top: 50%;
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
</style>
<body>
<div id="badan">
<div id="navbar">
	<table >
		<tr>
			<td width="450px" height="300px">
					<div class="bxslider">
					<?php foreach($News->rand4() as $d){ ?>
						<div><a href="article.php?judul=<?php echo $d->slug; ?>"><img src="cover/<?php echo $d->image; ?>" title="<?php echo substr($d->isi, 0,80); ?>"></a></div>
					<?php } ?>
					</div>
			</td>
			<?php foreach($News->news2() as $d){ ?>
			<td height="300px" width="350px">
				<div class="konten" >
					<a href="article.php?judul=<?php echo $d->slug; ?>"><img src="cover/<?php echo $d->image; ?>" width="340px" height="330px"></a>
					<div class="tulisan">
						<h4><?php echo substr($d->judul, 0,15); ?></h4>
						<p><?php echo substr($d->isi, 0,50); ?></p>
					</div>
				</div>
			</td>
			<?php } ?>
		</tr>
	</table>
</div>
<div id="konten2">
	<table >
		<tr>
			<td width="400px" height="400px">
				<table >
					<tr>
						<td colspan="3" width="350px" height="40px"><b style="font-size: 17px;">SEDANG DIPUTAR</b></td>
					</tr>
					 	<?php foreach($Movie->diputarlimit(6) as $d){ ?>
					 	<tr>
					 		<td height="50px">
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
					 		<td><a href="tittle.php?m=<?php echo $d->slug; ?>" ><?php echo $d->judul; ?></a></td>
					 		<td><span><?php echo date("j F", strtotime($d->tanggal_rilis)); ?></span></td>
					 	</tr>
					 	<?php } ?>
					<tr>
						<td height="50px" colspan="3"><a href="diputar.php" style="color: blue;"><b>Lihat Semua</b></a></td>
					</tr>
				</table>
			</td>
			<td width="400px" height="350px">
				<table >
					<tr>
						<td colspan="3" width="300px" height="40px"><b style="font-size: 17px;">DI PUTAR MUSIM INI</b></td>
					</tr>
				 	<?php foreach($Movie->diputarmusimini() as $d){ ?>
				 	<tr>
				 		<td height="50px"><a href="tittle.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></td>
				 		<td><span style="font-family: 'Cabin', sans-serif;"><?php echo date("j F", strtotime($d->tanggal_rilis)); ?></span></td>
				 	</tr>
				 	<?php } ?>
				</table>
			</td>
		</tr>
		<tr>
			<td height="350px">
				<table >
					<tr>
						<td colspan="3" width="350px" height="40px"><b style="font-size: 17px;">AKAN DATANG</b></td>
					</tr>
				 	<?php foreach($Movie->akandatang() as $d){ ?>
				 	<tr>
				 		<td height="50px"><a href="tittle.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></td>
				 		<td><span><?php echo date("j F", strtotime($d->tanggal_rilis)); ?></span></td>
				 	</tr>
				 	<?php } ?>
				 	<tr>
				 		<td><a  href="akandatang.php" style="color: blue"><b>Lihat Semua</b></a></td>
				 	</tr>
				</table>
			</td>
			<td >
				<table >
					<tr>
						<td colspan="3" width="350px" height="40px"><b style="font-size: 17px;">TERPOPULER</b></td>
					</tr>
				 	<?php foreach($Movie->topboxofficelimit(6) as $d){ ?>
				 	<tr>
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
				 		<td height="50px"><a href="tittle.php?m=<?php echo $d->slug; ?>"><?php echo $d->judul; ?></a></td>
				 		<td><span>Rp.<?php echo Input::convert($d->keuntungan); ?></span></td>
				 	</tr>
				 	<?php } ?>
				</table>
			</td>
		</tr>
	</table>
</div>
<div id="konten3">
	<h4><b>Rekomendasi</b></h4>
	<table >
		<tr>
			<?php foreach($Movie->recomend() as $d){ ?>
			<td width="400px" height="250px">
				<a href="tittle.php?m=<?php echo $d->slug; ?>"><img src="cover/<?php echo $d->cover; ?>" width="90%" height="170px"></a>
				 			<?php if($d->jml <= 4){ ?>
								<div class="score3" style="background-color: red;">
									<h3><b><?php echo number_format($d->jml,1);; ?></b></h3>
								</div>
							<?php }else if($d->jml > 4 AND $d->jml <= 6){ ?>
								<div class="score3" style="background-color: #dce539;">
									<h3><b><?php echo number_format($d->jml,1);; ?></b></h3>
								</div>
							<?php }else{ ?>
								<div class="score3" style="background-color: #25c916;">
									<h3><b><?php echo number_format($d->jml,1);; ?></b></h3>
								</div>
							<?php } ?>
				<br>
				<a href="tittle.php?m=<?php echo $d->slug; ?>" style=""><b><?php echo substr($d->judul, 0,20); ?></b></a>
			</td>
			<?php } ?>
		</tr>
	</table>
</div>
<div id="konten4">
	<h4><b>LAHIR HARI INI</b></h4>
	<table >
		<tr>
		<?php while($d = $profil->fetchObject()): ?>
			<td width="150px" height="290px">
				<img src="profil/<?php echo $d->photo; ?>" width="85%" height="190px">
				<a href="profil.php?celeb=<?php echo $d->slug; ?>"><?php echo $d->nama; ?></a>
			</td>
		<?php endwhile; ?>
		</tr>
	</table>
</div>
<div id="konten5">
	<h4><b>Galery FilmQu</b></h4>
	<table>
		<tr>
		<?php $gambarke = 1; ?>
		<?php foreach($Photo->galery() as $d){$gambarke++ ?>
			<td width="300px" height="250px">
				<img style="cursor: pointer;" onclick="openModal();currentSlide(<?php echo $gambarke; ?>)" src="photo/<?php echo $d->photo; ?>" width="95%" height="170px">
				<a href="">aksdoaskdoksdo olaksdokasdo oko</a>
			</td>
		<?php } ?>
		</tr>
	</table>
</div>
</div>
<!-- The Modal/Lightbox -->
<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
  	<?php $gambarke2 = 0; ?>
  	<?php foreach($Photo->galery() as $d){$gambarke2++ ?>
    <div class="mySlides">
      <div class="numbertext"><?php echo $gambarke2; ?> / 3</div>
      <img src="photo/<?php echo $d->photo; ?>" style="width: 100%;height: 800px;">
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
    <?php $gamberke3 = 0; ?>
  	<?php foreach($Photo->galery() as $d){$gamberke3++ ?>
    <div class="column">
      <img style="height: 140px;width: 100%;" class="demo" src="photo/<?php echo $d->photo; ?>" onclick="currentSlide(<?php echo $gambarke3; ?>)" alt="Nature">
    </div>
    <?php } ?>

  </div>
</div>

<?php require_once 'template/footer.html'; ?>
</body>
</html>
<script type="text/javascript" src="plugin/bx-slider/jquery.bxslider.min.js"></script>
<script type="text/javascript">
	$(function(){
  $('.bxslider').bxSlider({
  	auto: true,
    mode: 'fade',
    captions: true,
    slideWidth: 600
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
