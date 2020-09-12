<?php

$pdf = new FPDF('P', 'mm', 'Letter');

$pdf->AddPage();
$pdf->Image('assets/bahan/logo_its.png', 10, 10, 25);
$pdf->Cell(2);
$pdf->SetFont('Times', 'B', '14');
$pdf->Cell(0, 5, 'KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN ', 0, 1, 'C');
$pdf->Cell(2);
$pdf->Cell(0, 5, 'INSTITUT TEKNOLOGI SEPULUH NOPEMBER', 0, 1, 'C');
$pdf->Cell(2);
$pdf->SetFont('Times', 'B', '12');
$pdf->Cell(0, 5, 'DIREKTORAT RISET DAN PENGABDIAN KEPADA MASYARAKAT', 0, 1, 'C');
$pdf->Cell(2);
$pdf->SetFont('Times', 'I', '10');
$pdf->Cell(0, 5, 'Gedung Pusat Riset Lantai Lobby, Kampus ITS Sukolilo, Surabaya 60111', 0, 1, 'C');
$pdf->Cell(2);
$pdf->Cell(0, 2, 'Telp. (031) 0315953759, Fax (031)  5955793, PABX : 1404,1405,1330', 0, 1, 'C');
$pdf->Ln(2);
$pdf->SetFont('Times', 'I', '10');
$pdf->Cell(2);

$pdf->Cell(0, 2, 'Email: drpm@its.ac.id Website: www.its.ac.id/drpm', 0, 1, 'C');
// $pdf->Ln(6);
$pdf->SetLineWidth(1);

$pdf->SetDrawColor(0, 0, 255);
$pdf->Line(10, 40, 200, 40);
$pdf->Ln(10);

$pdf->Cell(2);
$pdf->SetFont('Times', 'B', '10');

$pdf->Cell(0, 5, 'TANDA TERIMA', 0, 1, 'C');
$pdf->SetFont('Times', '', '10');
$pdf->SetFillColor(192, 192, 192);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.3);
$pdf->setX(165);
$pdf->Cell(30, -6, '  No  :  37', 1, 0);
$pdf->Ln(5);

$header = array(
    array("label" => "No", "length" => 10, "align" => "C"),
    array("label" => "Uraian", "length" => 50, "align" => "C"),

    array("label" => "Banyak", "length" => 30, "align" => "C"),

    array("label" => "Status Hardcopy", "length" => 30, "align" => "C"),

    array("label" => "Status Unggahan", "length" => 30, "align" => "C"),

    array("label" => "Keterangan", "length" => 40, "align" => "C"),
);
#buat header tabel

foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, 0, $kolom['align'], true);
}

$nomor = 1;
foreach ($detail as $dt) {
    $pdf->Ln();
    $pdf->Cell(10, 6, $nomor, 1, 0, 'C');
    $pdf->Cell(50, 6, $dt->kategori, 1, 0);
    $pdf->Cell(30, 6, $dt->satuan, 1, 0, 'C');
    $centang = "";
    if ($dt->status == 1) {
        $centang = "v";
    }
    $pdf->Cell(30, 6, $centang, 1, 0, 'C');
    $pdf->Cell(30, 6, '', 1, 0, 'C');
    $pdf->Cell(40, 6, '', 1, 0, 'C');
    $nomor++;
}
$pdf->Ln(10);
$pdf->Cell(40, 6, ' Nama Ketua', 1, 0);

$pdf->Cell(5, 6, ':', 1, 0, 'C');

$pdf->Cell(145, 6, $arsip->nama_ketua, 1, 0);
$pdf->Ln();
$pdf->Cell(40, 6, ' Departemen', 1, 0);

$pdf->Cell(5, 6, ':', 1, 0, 'C');

$pdf->Cell(145, 6, $arsip->departemen, 1, 0);
$pdf->Ln();
$pdf->Cell(40, 6, ' Skema Kegiatan', 1, 0);

$pdf->Cell(5, 6, ':', 1, 0, 'C');

$pdf->Cell(145, 6, $arsip->skema, 1, 0);
$pdf->Ln();
$pdf->MultiCell(40, 12, ' Judul Kegiatan', 1, 'L');
$pdf->setX(50);
$pdf->MultiCell(5, -12, ':', 1, 'C');
$pdf->setX(55);
// $pdf->MultiCell(145, 12, ':', 1, 'C');
$cellWidth = 145; //lebar sel
$cellHeight = 12; //tinggi sel satu baris normal
$judul = $arsip->judul;
//periksa apakah teksnya melibihi kolom?
$line = 0;
if ($pdf->GetStringWidth($judul) < $cellWidth) {
    //jika tidak, maka tidak melakukan apa-apa
    $line = 1;
} else {
    //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
    //dengan memisahkan teks agar sesuai dengan lebar sel
    //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel

    $textLength = strlen($judul);    //total panjang teks
    $errMargin = 5;        //margin kesalahan lebar sel, untuk jaga-jaga
    $startChar = 0;        //posisi awal karakter untuk setiap baris
    $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
    $textArray = array();    //untuk menampung data untuk setiap baris
    $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)

    while ($startChar < $textLength) { //perulangan sampai akhir teks
        //perulangan sampai karakter maksimum tercapai
        while (
            $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
            ($startChar + $maxChar) < $textLength
        ) {
            $maxChar++;
            $tmpString = substr($judul, $startChar, $maxChar);
        }
        //pindahkan ke baris berikutnya
        $startChar = $startChar + $maxChar;
        //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
        array_push($textArray, $tmpString);
        //reset variabel penampung
        $maxChar = 0;
        $tmpString = '';
    }
    //dapatkan jumlah baris
    $line = count($textArray);
}
$height = 12;
if ($line > 1) {
    $height = $height / $line;
}
$pdf->MultiCell(145, $height, $judul, 1, 'L');
// $pdf->Ln();

$pdf->Cell(40, 6, ' Sumber Dana', 1, 0);

$pdf->Cell(5, 6, ':', 1, 0, 'C');

$pdf->Cell(145, 6, $arsip->sumber, 1, 0);
$pdf->Ln();
$pdf->Cell(40, 6, ' Tahun Pelaksanaan', 1, 0);

$pdf->Cell(5, 6, ':', 1, 0, 'C');

$pdf->Cell(145, 6, $arsip->tahun, 1, 0);
$pdf->Ln();
$pdf->Cell(40, 6, ' Nomor Kontrak', 1, 0);

$pdf->Cell(5, 6, ':', 1, 0, 'C');

$pdf->Cell(145, 6, $arsip->nomor_kontrak . $arsip->kode_kontrak, 1, 0);
$pdf->Ln();
$pdf->Cell(40, 6, ' Nomor SK', 1, 0);

$pdf->Cell(5, 6, ':', 1, 0, 'C');

$pdf->Cell(145, 6, $arsip->nomor_sk . $arsip->kode_sk, 1, 0);
$pdf->Ln();
$pdf->Cell(40, 6, ' Nama Pengirim', 1, 0);

$pdf->Cell(5, 6, ':', 1, 0, 'C');

$pdf->Cell(145, 6, ' ' . $tanda->nama_pengirim, 1, 0);
$pdf->Ln();
$pdf->Cell(40, 6, ' Nomor HP Pengirim', 1, 0);

$pdf->Cell(5, 6, ':', 1, 0, 'C');

$pdf->Cell(145, 6, ' ' . $tanda->hp, 1, 0);
$pdf->Ln(15);
$pdf->setX(150);
$pdf->Cell(0, 2, 'Surabaya, '.date("d M Y"), 0, 1, '');
$pdf->Ln(15);
$pdf->setX(150);
$pdf->Cell(0, 2, ' ' . $tanda->nama_penerima, 0, 1, '');
$pdf->Ln();
$pdf->Cell(0, 2, 'NB :Harap Disimpan Jangan Sampai Hilang. Terima Kasih', 0, 1, '');
$pdf->Output();
