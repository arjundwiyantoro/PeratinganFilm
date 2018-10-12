<?php 

require_once 'core/core.php';

require_once 'template/headerv21.php';

$id_movie = Input::get('id_movie');

if(isset($_SESSION['id_user'])){
	$id_user = Session::get('id_user');
	if($Ratting->cekkomen($id_user,$id_movie)){
		foreach($Ratting->editsingle($id_user,$id_movie) as $d){
			$jumlah = $d->jumlah;
			$komen  = $d->review;
		}
	}
}

$single = $Ratting->single2($id_movie);


foreach($Movie->single($id_movie) as $d){
	$judul = $d->judul;
	$jml   = $d->jml;
	
}

if(Input::get('submit')){
	$value_token = Input::get('value_token');
	$kata = strlen(Input::get('review'));
	if($kata >= 100 AND $kata <= 4000){
		if(Input::validasi($value_token) == true){
			$id_movie = Input::get('id_movie');
			$jumlah = Input::get('jml');
			$review = Input::get('review');
			$username = Session::get('nama');
			$tanggal = date('y-m-d');
			if($Ratting->store($id_movie,$id_user,$jumlah,$review,$username,$tanggal)){
				header('location:rating.php?id_movie='.$id_movie);
			}else{
				echo '<script type="">window.alert("Ada Masalah Dengan Database");</script>';
			}
		}
	}else{
		echo '<script type="">window.alert("Minimal 100 karakter dan Maksimal 4000 karakter");</script>';
	}
}



 ?>

 <style type="text/css">
	*{
		text-decoration: none;
	}
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}
	textarea::placeholder {
  		color:#444444; 
  		font-size: 17px;
	}
	#komen a{
		color: black;
	}
	.score2{
		margin-top: 0px;
		margin-left: 10px;
		text-align: center;
		margin-bottom: 50px;
		height: 50px;
		width: 50px;
		float: left;
	}
	.score2 > h3{
		margin-top: 10px;
		font-size: 25px;
		color: white;
	}
	.score3{
		margin-top: 0px;
		margin-left: 0px;
		text-align: center;
		margin-bottom: 0px;
		height: 65px;
		width: 65px;
		float: left;
	}
	.score3 > h3{
		margin-top: 15px;
		font-size: 30px;
		color: white;
	}
	#komen p{
		font-size: 16px;
	}
	#komen table{
		border-bottom: 1px solid;
	}
	.textContainer_Truncate{
		margin-top: -5px;
	}
	#blom{
		width: 850px;
		height: 110px;
		border: 1px solid;
	}
	#blom p{
		margin-top: 10px;
		margin-left: 10px;
		color:#bcbcbc; 
  		font-size: 17px;
	}
	#badan {
		padding-top: 20px;
		padding-bottom: 80px;
		margin-left: 99px;
		margin-right: 99px;
		background-color: white;
	}
	@media only screen and (max-width: 1300px) {
	    #badan {
	        margin-right: 92px;
	        margin-left: 92px;
	    }
	}
	#title,#komen,#form{
		margin-left: 30px;
	}
	.bttn{
		color: white;
		background-color: black;
	}
</style>
 <link href="plugin/star-rating/styles/ffrating.css" rel="stylesheet"   />
 <div id="badan">
 <div id="title">
 	<h1><b><?php echo $judul; ?></b></h1>
 	<table >
 		<tr>
 			<td rowspan="2">
 				<?php if($jml <= 4){ ?>
				<div class="score3" style="background-color: red;">
					<h3><b><?php echo number_format($jml,1); ?></b></h3>
				</div>
				<?php }else if($jml > 4 AND $jml <= 6){ ?>
				<div class="score3" style="background-color: #f2ec41;">
					<h3><b><?php echo number_format($jml,1); ?></b></h3>
				</div>
				<?php }else{ ?>
				<div class="score3" style="background-color: #25c916;">
					<h3><b><?php echo number_format($jml,1); ?></b></h3>
				</div>
				<?php } ?>
 			</td>
 			<td><h3 style="margin-left: 10px;">User Score</h3></td>
 		</tr>
 		<tr>
 			<td><h4 style="margin-left: 10px;">Terdiri Dari <?php echo $Ratting->jumlah($id_movie); ?> Rattings</h4></td>
 		</tr>
 	</table>
 </div>
 <br>
 <br>
 <div id="form">
 <form action="" method="post">
 <table>
  	<?php if(isset($_SESSION['id_user'])){ ?>
 		<?php if($Ratting->cekkomen($id_user,$id_movie)){ ?>
 	<tr>
 		<td width="285px" ><h3 style="margin-top: -25px;">Review Film Ini..</h3></td>
 		<td ><h3 style="margin-top: -25px;">Rating sekarang</h3></td>
 		<td><input style="margin-bottom:20px" type="textbox" id="star1" class="ff-rating" name="jml" value="<?php echo $jumlah; ?>" /></td>
 	</tr>

	 	<tr>
	 		<input type="hidden" name="value_token" value="<?php echo Input::token(); ?>">
	 		<td colspan="3"><textarea name="review" placeholder="Minimal 100 kata untuk menulis review" cols="103" rows="5" style="border:1px solid black;padding-top: 10px;padding-left: 10px;"><?php echo $komen; ?></textarea></td>
	 	</tr>
	 </table>
	 <label>4000 karakter maximal</label>
	 <input type="submit" name="submit" value="Submit" class="btn btn-default bttn">
	 </form>
	 <br>
	 	<?php }else{ ?>
	 	<tr>
 			<td width="285px" ><h3 style="margin-top: -25px;">Review Film Ini..</h3></td>
 			<td ><h3 style="margin-top: -25px;">Rating sekarang</h3></td>
 			<td><input style="margin-bottom:20px" type="textbox" id="star1" class="ff-rating" name="jml" /></td>
 		</tr>
	 	 	<tr>
	 		<input type="hidden" name="value_token" value="<?php echo Input::token(); ?>">
	 		<td colspan="3"><textarea name="review" placeholder="Minimal 100 kata untuk menulis review" cols="103" rows="5" style="border:1px solid black;padding-top: 10px;padding-left: 10px;"></textarea></td>
	 	</tr>
	 </table>
	 <label>4000 karakter maximal</label>
	 <input type="submit" name="submit" value="Submit" class="btn btn-default bttn">
	 </form>
	 <br>
	 <?php } ?>
 <?php }else{ ?>
 	<tr>
 		<td width="285px" ><h3 style="margin-top: -25px;">Review Film Ini..</h3></td>
 		<td ><h3 style="margin-top: -25px;">Rating sekarang</h3></td>
 		<td><input style="margin-bottom:20px" type="textbox" id="star1" class="ff-rating" name="jml" /></td>
 	</tr>
 	<tr>
 		<td colspan="3">
 			<div id="blom">
 				<p>Untuk Merating film anda harus <a href="login.php">Login</a> terlebih dahulu jika belum memiliki akun silakan <a href="register.php">Daftar</a> terlebih dahulu</p>
 			</div>
 		</td>
 	</tr>
 </table>
 <label style="margin-top: 20px;">4000 karakter maximal</label>
 <button style="margin-left: 10px" class="btn btn-default bttn">Submit</button>
 <br>
 <?php } ?>
</div>
 <br>
 <br>
<div id="komen">
<h2><b>User Review</b></h2>
<?php while($d = $single->fetchObject()){ ?>
<table>
	<tr>
		<td rowspan="2" height="140px" width="80px">
				<?php if($d->jumlah <= 4){ ?>
				<div class="score2" style="background-color: red;">
					<h3><b><?php echo $d->jumlah; ?></b></h3>
				</div>
				<?php }else if($d->jumlah > 4 AND $d->jumlah <= 6){ ?>
				<div class="score2" style="background-color: #f2ec41;">
					<h3><b><?php echo $d->jumlah; ?></b></h3>
				</div>
				<?php }else{ ?>
				<div class="score2" style="background-color: #25c916;">
					<h3><b><?php echo $d->jumlah; ?></b></h3>
				</div>
				<?php } ?>
		</td>
		<td width="700px"><a href="member.php?id_user=<?php echo $d->id_user; ?>"><b><?php echo ucfirst($d->username); ?></b></a></td>
		<td width="150px" style="text-align: right;"><?php echo date("j F Y",strtotime($d->tanggal)); ?></td>
	</tr>
	<tr>
		<td><div class="textContainer_Truncate"><p><?php echo $d->review; ?></p></div></td>
	</tr>
</table>
<?php } ?>
</div>
</div>
<?php require_once 'template/footer.html'; ?>
<script src="plugin/star-rating/scripts/ffrating.js"></script>
            <script>
                 $(document).ready(function(){
                 	     var maxheight=80;
      					var showText = "More";
      					var hideText = "Less";

                     $('#nps1').ffrating({isStar:false});
                     $('#nps2').ffrating({isStar:false});
                     $('#nps3').ffrating({isStar:false,minLabel:'Disagree',mediumLabel:'Neutral',maxLabel:'Agree'});
                     $('#star1').ffrating({isStar:true});
                     $('#star2').ffrating({isStar:true,readonly:true,showSelectedRating:true,min:1,max:5});

                     $('.textContainer_Truncate').each(function () {
				        var text = $(this);
				        if (text.height() > maxheight){
				            text.css({ 'overflow': 'hidden','height': maxheight + 'px' });

				            var link = $('<a href="#"><b>' + showText + '</b></a>');
				            var linkDiv = $('<div></div>');
				            linkDiv.append(link);
				            $(this).after(linkDiv);

				            link.click(function (event) {
				              event.preventDefault();
				              if (text.height() > maxheight) {
				                  $(this).html(showText);
				                  text.css('height', maxheight + 'px');
				              } else {
				                  $(this).html(hideText);
				                  text.css('height', 'auto');
				              }
				            });
				        }       
				     });

                });
            </script>