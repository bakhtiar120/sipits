<?php
/* setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

/* konstruktor halaman pdf sbb :   
   P  = Orientasinya "Potrait"
   cm = ukuran halaman dalam satuan centimeter
   A4 = Format Halaman
    
   jika ingin mensetting sendiri format halamannya, gunakan array(width, height) 
   contoh : $this->fpdf->FPDF("P","cm", array(20, 20)); 
*/

$pdf = new FPDI();
$pdf->addPage('L');

//$pagecount = $pdf->setSourceFile('C:\xampp\htdocs\mppl\system\libraries\kartupasien.pdf');
$pagecount = $pdf->setSourceFile('fpdf\templates\pap_template.pdf');

$tplIdx = $pdf->importPage(1);
$pdf->SetAutoPageBreak(true, 0);
$pdf->useTemplate($tplIdx);

$pdf->Output('kartupasien.pdf', 'I');
?>