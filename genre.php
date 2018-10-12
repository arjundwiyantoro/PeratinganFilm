
<?php 

include 'template/headerv21.php';

 ?>

<style type="text/css">
	body{
		background: linear-gradient(#bababa,#e5e5e5);
	}
	#conten img{
		position: relative;
		width: 400px;
		height: 300px;
	}
	#conten{
		margin-left: 99px;
		margin-right: 100px;
		background-color: white;
		padding-top: 10px;
		box-shadow: 5px 0px #888888;
		padding-bottom: 20px;
	}
	.center{
		margin-top: 120px;
		position: absolute;
		z-index: 2;
		color: white;
		padding-top: 10px;
		text-align: center;
		font-size: 35px;
	}

</style>
<style type="text/css"></style>
<body>
<div id="conten">
	<h1 style="margin-left: 20px;"><b>Populer Genre</b></h1>
	<br>
	<table style="margin-left: 20px;">
		<tr>
			<td class="">
				<a href="jenis.php?g=action">
				<div class="center" style="margin-left: 140px;">ACTION</div>
				<img src="cover/action.jpg">
				</a>
			</td>
			<td>
				<a href="jenis.php?g=drama">
				<div class="center" style="margin-left: 140px;">DRAMA</div>
				<img src="cover/drama.jpg">
				</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="jenis.php?g=animation">
				<div class="center" style="margin-left: 100px;">ANIMATION</div>
				<img src="cover/animation.jpg">
				</a>
			</td>
			<td>
				<a href="jenis.php?g=horror">
				<div class="center" style="margin-left: 130px;">HORROR</div>
				<img src="cover/horror.jpg">
				</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="jenis.php?g=comedy">
				<div class="center" style="margin-left: 130px;">COMEDY</div>
				<img src="cover/comedy.jpg" >
				</a>
			</td>
			<td>
				<a href="jenis.php?g=scifi">
				<div class="center" style="margin-left: 150px;">SCI-FI</div>
				<img src="cover/scifi.jpg">
				</a>
			</td>
		</tr>
	</table>
</div>
<?php include 'template/footer.html'; ?>
</body>
</html>