<?php
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Contoh');
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
	$pdf->AddPage();
$pdf->setJPEGQuality(75);
	$pdf->Write(5, 'Contoh Laporan PDF dengan CodeIgniter + tcpdf');$html= "<div><img src='../../../assets/bahan/its-logo.png' width='200' height='400' /><br></div>";

$html = <<<EOD
<h1 style="text-decoration:none;background-color:#CC0000;color:black;">Page with image</h1>
<p><img src="../../../assets/bahan/bg-lppm.jpg" />
 </p>
EOD;


$pdf->Image(realpath(APPPATH . "../../../assets/bahan/drpm-logo.jpeg"), 15, 140, 75, 113, 'JPG', 'http://www.tcpdf.org', '', true, 150, '', false, false, 1, false, false, false);
$pdf->Output('contoh1.pdf', 'I');
