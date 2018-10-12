<?php 

require_once 'core/core.php';



 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
 	<title></title>
 </head>
 <body>
 <div id="coba"></div>
		 <input id="id_movie">
		 <input id="id_user">
		 <input id="judul">
		 <input id="slug">
		 <input id="cover">
		 <button id="submit">koko</button>
 </body>
 </html>
<script src="plugin/js/jquery1.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#submit').on('click',function(){
 			var id_movie  = $('#id_movie').val();
 			var id_user  	= $('#id_user').val();
	 		var judul 	 	= $('#judul').val();
	 		var slug	 	= $('#slug').val();
	 		var cover	 	= $('#cover').val();
	 		$.ajax({
	 			method:"POST",
	 			url:"rest/server.php?page=store",
	 			data:{id_user:id_user,id_movie:id_movie,judul:judul,slug:slug,cover:cover},
	 			success:function(data){
	 				console.log(data);
	 			}
	 		});
 		});
 	});
 </script>