<?php 

require_once '../core/core2.php';

$no = 0;


 ?>

<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../plugin/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../plugin/jquery-ui/jquery-ui.css">
<style type="text/css">
	#konten{
		background-color: white;
		margin-left: 30px;
		width: 80%;
		
		margin-top: 20px;
	}
	#konten form{
		margin-left: 10px;
		margin-bottom: 50px;
	}
	header{
		background-color: white;
		width: 80%;
		margin-left: 30px;
	}
	/*
	#form{
		border: 4px solid black;
		height: 110%;
	}
	#form h4{
		background-color: blue;
		color: white;
		padding-top: 10px;
		padding-bottom: 10px;
		width: 130px;
		padding-left: 20px;
		padding-right: 20px;
		border-radius: 10px;
		margin-left: 50px;
		margin-top: -20px;
	}
	*/

</style>

<header class="w3-container" style="padding-top:5px;padding-bottom: 10px;">
    <h3><b><i class="glyphicon glyphicon-list-alt"></i> Laporan</b></h3>
</header>
<table id="konten">
	<tr>
		<td style="background-color: #79abfc;color: white;" height="50px"><h4 style="margin-left: 10px;"><b>Daftar Celebrity</b></h4></td>
	</tr>
	<tr>
		<td height="100px">
		<h3 style="margin-left: 20px">Pilih Tanggal</h3>
		 <form action="datalaporan.php" method="post">
		 	<div class="col-xs-12">
		 		<input id="tglawal" class="datepicker" name="tglawal" style="padding-left: 15px;padding-bottom: 5px;padding-top: 5px;padding-right: 15px;">
		 		<input id="tglakhir" class="datepicker" name="tglakhir" style="padding-left: 15px;padding-bottom: 5px;padding-top: 5px;padding-right: 15px;">
		 		<input type="button"  value="Pilih" id="pilih" class="btn btn-success">
			</div>

		 	
		 
		 </td>
	</tr>
	<tr>
		<td>
			<button style="display: none;margin-top: 20px;margin-left: 20px;" type='submit' id="kirim" name='submit'  class='btn btn-success'><i class="glyphicon glyphicon-print"></i> Buat Laporan</button>
		</form>
		<div id="kontens">

		</div>
	 	</td>
	 </tr>
</table>

<script src="../plugin/js/jquery1.js"></script>
<script src="../plugin/bootstrap/js/bootstrap.js"></script>
<script src="../plugin/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pilih').click(function(){
			var tglawal = $('#tglawal').val();
			var tglakhir = $('#tglakhir').val();
			$('#kirim').show();

			$.ajax({
				method:'post',
				url:'../rest/laporan.php',
				data:{tglakhir:tglakhir,tglawal:tglawal},
				success:function(data){
					document.getElementById("kontens").innerHTML=data;
				}
			})
		})
		$( ".datepicker" ).datepicker({
	    	dateFormat: 'yy-mm-dd',
	      changeYear: true,
	      changeMonth: true,
	      yearRange: '1950:2024'
	    });
	})
</script>