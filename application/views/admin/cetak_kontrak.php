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

 <body bgcolor="white">
 <div style="text-align:center">PEMERINTAH KOTA CIREBON</div>
  <font face="Arial" color="black"> <p align="center"> PEMERINTAH KOTA CIREBON </p></font>
  <font face="Arial" color="blue"> <p align="center"> DINAS PENDIDIKAN </p></font>
  <font face="Arial" color="green"> <p align="center"> SEKOLAH MENENGAH KEJURUAN NEGERI 1 CIREBON </p></font>
  <font face="Arial" color="black" size="3"> <p align="center"> JL. Perjuangan By Pass Sunyaragi Telp.(0231) 123456 Cirebon 45141 </p></font>
  <hr>

  <font face="Arial" color="red" size="6"> <p align="center"> <u> <b> SURAT KETERANGAN PENELITIAN </b></u></font><br>
  <font face="Arial" color="red" size="4"> Nomer: 8021/SMKN1/2015 </p></font>






  <p align="center">
   Berdasarkan surat dari Universitas Pendidikan Indonesia (UPI) Nomor 4609/UN404/DT/2014
  tanggal 15 Desember 2015 perihal ijin melakukan penelitian, dengan ini kami menerangkan bahwa:
  </p>


    <pre>
    Nama  :Riffa Alfaridzi Priatna


    NIM  :0804252


    Fakultas :Pendidikan Matematika dan Ilmu Pengetahuan Alam


    Jurusan  :Pendidikan Ilmu Komputer
    </pre>



  <p align="center"><font face="Arial">
   Telah melakukan penelitian di sekolah kami tanggal<font color="red"> 7 s/d 21 Maret 2015</font>, dengan judul
  "Penerapan Metode Pembelajaran IMPROVE Berbasis Multimedia Interaktif Untuk Meningkatkan
   Intrapersonal intelegensi siswa dalam Mata Pelajaran TIK"
  </font></p>
 </body>
EOD;
$pdf->writeHTML($html, true, 0, true, true);


$pdf->Output('contoh1.pdf', 'I');
