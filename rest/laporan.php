<?php 
require_once '../core/core2.php';
	$tglawal = Input::get('tglawal');
	$tglakhir = Input::get('tglakhir');
		echo "<br>";
		echo "<table style='border-color: #ccc;
		    background: #eaebec;margin-left:20px;margin-top:5px;'>";
		echo "<tr>";
		echo "<th style='border-color: #ccc;
		    font-size: 17px;
		    height: 30px;
		    background: #ededed;
		    padding: 10px 30px;'>Id Film</th>";
		echo "<th style='border-color: #ccc;
		    font-size: 17px;
		    height: 30px;
		    background: #ededed;
		    padding: 10px 30px;'>Judul</th>";
		echo "<th style='border-color: #ccc;
		    font-size: 17px;
		    height: 30px;
		    background: #ededed;
		    padding: 10px 30px;'>Skor</th>";
		echo "<th style='border-color: #ccc;
		    font-size: 17px;
		    height: 30px;
		    background: #ededed;
		    padding: 10px 30px;'>Budget</th>";
		echo "<th style='border-color: #ccc;
		    font-size: 17px;
		    height: 30px;
		    background: #ededed;
		    padding: 10px 30px;'>Keuntungan</th>";
		echo "</tr>";
	foreach($Movie->laporan($tglawal,$tglakhir) as $d){
		echo 	"<tr>";
		echo 		"<td style='border-color: #ccc;
	    padding: 10px 30px;
	    font-size: 17px;
	    height: 30px;
	    background: #fafafa;'>".$d->id_movie."</td>";
		echo 		"<td style='border-color: #ccc;
	    padding: 10px 30px;
	    font-size: 17px;
	    height: 30px;
	    background: #fafafa;'>".$d->judul."</td>";
		echo 		"<td style='border-color: #ccc;
	    padding: 10px 30px;
	    font-size: 17px;
	    height: 30px;
	    background: #fafafa;'>".number_format($d->jml,1)."</td>";
	    echo 		"<td style='border-color: #ccc;
	    padding: 10px 30px;
	    font-size: 17px;
	    height: 30px;
	    background: #fafafa;'>".Input::convert($d->budget)."</td>";
	    echo 		"<td style='border-color: #ccc;
	    padding: 10px 30px;
	    font-size: 17px;
	    height: 30px;
	    background: #fafafa;'>".Input::convert($d->keuntungan)."</td>";
		echo 	"</tr>";
	}



 ?>