<!DOCTYPE html>
<html>
<head>
	<title>FilemQu</title>
</head>
<link rel="stylesheet" type="text/css" href="template/homepage.css">
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
<body>
<div id="head">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<h3 id="klik">FilemQuh</h3>
			</div>
			<div class="col-md-4 cari">
				<input type="search" placeholder="Cari...">
				<button><span class="glyphicon glyphicon-search"></span></button>
			</div>
			<div class="col-md-6">
				<div class="myMenu">
					<ul class="dropDownMenu">
						<li><a href="http://html-tuts.com/?p=9961">Movie</a>
							<ul>
								<li><a href="http://html-tuts.com/?p=9961">Genre</a></li>
								<li><a href="http://html-tuts.com/?p=9961">CSS</a></li>
								<li><a href="http://html-tuts.com/?p=9961">JS</a></li>
							</ul>
						</li>
						<li><a href="http://html-tuts.com/?p=9961">Berita</a>
							<ul>
								<li><a href="http://html-tuts.com/?p=9961">HTML</a></li>
								<li><a href="http://html-tuts.com/?p=9961">CSS</a></li>
								<li><a href="http://html-tuts.com/?p=9961">JS</a></li>
							</ul>
						</li>
						<li><a href="http://html-tuts.com/?p=9961">Design</a>
							<ul>
								<li><a href="http://html-tuts.com/?p=9961">HTML</a></li>
								<li><a href="http://html-tuts.com/?p=9961">CSS</a></li>
								<li><a href="http://html-tuts.com/?p=9961">JS</a></li>
							</ul>
						</li>
						<li><a href="http://html-tuts.com/?p=9961">Login</a></li>
						<li><a href="http://html-tuts.com/?p=9961">Register</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="body">
	
</div>
<div id="footer"></div>
</body>
<script src="plugin/bootstrap/js/jquery1.js"></script>
<script src="plugin/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
function click(){
	return window.location.href = 'http://localhost/tugasakhir/index.php';
}
$(document).ready(function(){
	$('#klik').click(function(){
		click();
	})
})


$('.myMenu ul li').hover(function() {
	$(this).children('ul').stop(true, false, true).slideToggle(300);
});
</script>
</html>