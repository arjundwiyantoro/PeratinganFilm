<?php 
require_once '../core/core2.php';
$no = 0;
$tglawal = Input::get('tglawal');
$tglakhir = Input::get('tglakhir');
$tglawal1 = date("j F Y",strtotime($tglawal));
$tglakhir1 = date("j F Y",strtotime($tglakhir));

// memanggil library FPDF
require_once '../plugin/fpdf/fpdf.php';
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',15);
// mencetak string 
$pdf->Cell(190,7,'XYZFILM',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'LAPORAN RATING FILM DAN KEUNTUNGAN',0,1,'C');
$pdf->SetFont('Arial','B',8);
$pdf->Cell(190,13,'Laporan Tanggal: '.$tglawal1.' Sampai '.$tglakhir1,0,1,'C');
$pdf->Line(0, 45, 340-20, 45); 
$pdf->Cell(190,7,'',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetLeftMargin(15);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,10,'Id Movie',1,0);
$pdf->Cell(60,10,'Judul Film',1,0);
$pdf->Cell(20,10,'Skor',1,0,'C');
$pdf->Cell(35,10,'Budget',1,0);
$pdf->Cell(35,10,'Keuntungan',1,1);
 
$pdf->SetFont('Arial','',8);


foreach($Movie->laporan($tglawal,$tglakhir) as $row){
	$pdf->Cell(30,10,$row->id_movie,1,0);
    $pdf->Cell(60,10,$row->judul,1,0);
    $pdf->Cell(20,10,number_format($row->jml,1),1,0,'C');
    $pdf->Cell(35,10,'Rp.'.Input::convert($row->budget),1,0);
    $pdf->Cell(35,10,'Rp.'.Input::convert($row->keuntungan),1,1); 
}

ob_end_clean();
$pdf->Output();


 ?>