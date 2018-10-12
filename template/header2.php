<?php 

require_once '../core/core.php';

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>FilemQu</title>
</head>
<link rel="stylesheet" type="text/css" href="../template/homepage.css">
<link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.css"> 
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<body>
<div id="head">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<h3 id="klik">FilemQuh</h3>
			</div>
			<div class="col-md-4 cari">
				<input type="search" placeholder="Cari..." id="cari">
				<button><span class="glyphicon glyphicon-search"></span></button>
			</div>
			<div class="col-md-6">
				<div class="myMenu">
					<ul class="dropDownMenu">
						<li><a href="../akandatang.php">Movie</a>
							<ul>
								<li><a href="../genre.php">Genre</a></li>
								<li><a href="../diputar.php">Sedang Diputar</a></li>
								<li><a href="../akandatang.php">Akan Datang</a></li>
							</ul>
						</li>
						<li><a href="http://html-tuts.com/?p=9961">Berita</a>
							<ul>
								<li><a href="http://html-tuts.com/?p=9961">HTML</a></li>
								<li><a href="http://html-tuts.com/?p=9961">CSS</a></li>
								<li><a href="http://html-tuts.com/?p=9961">JS</a></li>
							</ul>
						</li>
						<li><a href="http://html-tuts.com/?p=9961">Chart</a>
							<ul>
								<li><a href="http://html-tuts.com/?p=9961">HTML</a></li>
								<li><a href="http://html-tuts.com/?p=9961">CSS</a></li>
								<li><a href="http://html-tuts.com/?p=9961">JS</a></li>
							</ul>
						</li>
						<?php if(!isset($_SESSION['nama'])){ ?>
						<li><a href="../login.php">Login</a></li>
						<li><a href="../register.php">Register</a></li>
						<?php }else{ ?>
						<li><a href="user.php"><?php echo ucfirst(Session::get('nama')); ?></a>
							<ul>
								<li><a href="../watchlist.php">Your List</a></li>
								<li><a href="../ratinguser.php">Your Rating</a></li>
								<li><a href="../logout.php">Logout</a></li>
							</ul>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script src="../plugin/bootstrap/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>
<script src="../plugin/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript">
function click(){
	return window.location.href = 'http://localhost/tugasakhir/index2.php';
}
$(document).ready(function(){
	$('#klik').click(function(){
		click();
	})

	$('#cari').focus(function(){
		$('#cari').animate({
			height:'30px',
			width:'300px'
		})
		
	})

	$('#cari').blur(function(){
		$('#cari').animate({
			height:'30px',
			width:'230px'
		})
		
	})

         $("#cari").autocomplete({
            minLength: 2,
            source: "rest/server.php?page=cari",
            focus: function( event, ui ) {
              $("#cari").val( ui.item.value );
              return false;
            }
          });

         $("#cari").data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    
            var $li = $('<li>'),
                $img = $('<img width="50px" height="80px">');


            $img.attr({
              src: 'cover/' + item.icon,
              alt: item.value
            });

            $li.attr('data-value', item.value);
            $li.append('<a href="'+item.url+'">');
            $li.find('a').append($img).append(item.value);    

            return $li.appendTo(ul);
          };
});


$('.myMenu ul li').hover(function() {
	$(this).children('ul').stop(true, false, true).slideToggle(300);
});
</script>
</html>