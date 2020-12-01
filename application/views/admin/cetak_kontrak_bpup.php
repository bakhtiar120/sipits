<?php
function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
function tgl_aja($tgl_a)
{
    $tanggal = substr($tgl_a, 8, 2);
    return $tanggal;
}

//Fungsi Ambil bulan aja
function bln_aja($bulan_a)
{
    $bulan = getBulan(substr($bulan_a, 5, 2));
    return $bulan;
}

//Fungsi Ambil tahun aja
function thn_aja($thn)
{
    $tahun = substr($thn, 0, 4);
    return $tahun;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
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
$pdf->SetFont('Times', 'B', '12');
$pdf->Cell(0, 5, 'SURAT PERJANJIAN', 0, 1, 'C');
$pdf->Cell(2);
$pdf->SetFont('Times', 'B', '12');
$pdf->Cell(0, 5, 'DOSEN PENELITI', 0, 1, 'C');
$pdf->Cell(2);
$pdf->SetFont('Times', 'B', '12');
$pdf->Cell(0, 5, 'DENGAN', 0, 1, 'C');
$pdf->Cell(2);
$pdf->SetFont('Times', 'B', '12');
$pdf->Cell(0, 5, 'PENERIMA BEASISWA PASCASARJANA UNTUK PENELITI(BPUP)', 0, 1, 'C');
$pdf->SetFont('Times', '', '12');
$pdf->Cell(2);
$pdf->Ln(2);
$pdf->Cell(0, 2, 'Nomor : ' . $no_kontrak, 0, 1, 'C');
$pdf->Ln(6);
$pdf->SetFont('Times', '', '10');
$pdf->Cell(0, 2, 'Pada hari ini, tanggal '.terbilang(tgl_aja($tanggal_kontrak)).', bulan '. bln_aja($tanggal_kontrak) .', tahun '.terbilang(thn_aja($tanggal_kontrak)). ' yang bertandatangan di bawah ini:', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Nama', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $nama, 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'NIP', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $nomor_induk, 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Departemen', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $departemen, 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Jabatan', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->MultiCell(0, 4, 'Ketua Peneliti ' . $judul. ' Skema Penelitian Unggulan sesuai Surat Perjanjian Sumber Dana ITS Nomor 47/PKS/ITS/2018 ', 0, 1, '');
// $pdf->Ln(2);
// $pdf->setX(45);
// $pdf->Cell(0, 2, 'Skema Penelitian Unggulan sesuai Surat Perjanjian Sumber Dana ITS Nomor 47/PKS/ITS/2018', 0, 1, '');
$pdf->Ln(2);
$pdf->setX(45);

$pdf->Cell(0, 2, 'tanggal 1 Februari 2018', 0, 1, '');
$pdf->Ln(3);
$pdf->Cell(0, 2, 'Selanjutnya disebut', 0, 1, '');
$pdf->SetFont('Times', 'B', '11');
$pdf->setX(40);
$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
$pdf->Ln(8);
$pdf->SetFont('Times', '', '10');
$pdf->Cell(0, 2, 'Dengan', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Nama', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $nama_lengkap, 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'NRP', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $nrp, 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->setX(15);
$pdf->Cell(0, 2, 'NIK', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, '4234234', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'No HP', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $no_hp_bea, 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'email', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $email_bea, 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Alamat KTP', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $alamat_ktp, 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Alamat Domisili', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $alamat_domisili, 0, 1, '');
$pdf->Ln(3);
$pdf->Cell(0, 2, 'Selanjutnya disebut', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(40);
$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
$pdf->Ln(7);
$pdf->Cell(0, 2, 'PIHAK PERTAMA', 0, 1, '');
$pdf->setX(42);
$pdf->SetFont('Times', '', '10');
$pdf->Cell(0, -2, 'dan', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(48);
$pdf->Cell(0, 2, 'PIHAK KEDUA', 0, 1, '');
$pdf->setX(75);
$pdf->SetFont('Times', '', '10');
$pdf->Cell(0, -2, 'sepakat mengadakan perjanjian sebagai berikut:', 0, 1, '');
$pdf->Ln(4);
$pdf->SetFont('Times', '', '10');
$pdf->Cell(0, 2, '1.', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(15);
$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
$pdf->SetFont('Times', '', '10');
$pdf->setX(46);
$pdf->Cell(0, 2, 'memberikan reward kepada penerima beasiswa pascasarjana untuk peneliti, yang selanjutnya disebut BPUP, ', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'sesuai ketentuan yang berlaku kepada', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(70);
$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
$pdf->SetFont('Times', '', '10');
$pdf->setX(96);
$pdf->Cell(0, 2, 'berupa', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Jenis Reward', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, 'Beasiswa Biaya Pendidikan', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Pendidikan', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $pendidikan, 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);

$pdf->Cell(0, 2, 'Selama', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, $lama_pembiayaan . ' Semester', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Sebesar', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, rupiah($satuan_biaya).' Setiap Semester', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Total Sebesar', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, rupiah($total_biaya), 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'Terbilang', 0, 1, '');
$pdf->setX(42);
$pdf->Cell(0, -2, ':', 0, 1, '');
$pdf->setX(45);
$pdf->Cell(0, 2, terbilang($total_biaya).' Rupiah', 0, 1, '');
$pdf->Ln(3);
$pdf->Cell(0, 2, '2.', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(15);
$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
$pdf->setX(41);
$pdf->SetFont('Times', '', '10');
$pdf->Cell(0, 2, 'mempunyai kewajiban membantu', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(90);
$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
$pdf->SetFont('Times', '', '10');
$pdf->setX(122);
$pdf->Cell(0, 2, 'dalam melaksanakan penelitian dan meningkatkan jumlah', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'dan mutu luaran penelitian;', 0, 1, '');

$pdf->Ln(3);
$pdf->Cell(0, 2, '3.', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(15);
$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
$pdf->SetFont('Times', '', '10');
$pdf->setX(46);
$pdf->Cell(0, 2, 'akan menghentikan honorarium asisten peneliti kepada', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(125);
$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
$pdf->SetFont('Times', '', '10');
$pdf->setX(151);
$pdf->Cell(0, 2, 'dalam hal', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(166);
$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
$pdf->Ln(4);
$pdf->SetFont('Times', '', '10');
$pdf->setX(15);

$pdf->Cell(0, 2, 'dalam hal PIHAK KEDUA tidak dapat melaksanakan kewajibannya sesuai point 2; dan', 0, 1, '');
$pdf->Ln(3);
$pdf->Cell(0, 2, '4. ', 0, 1, '');

$pdf->SetFont('Times', 'B', '10');
$pdf->setX(15);
$pdf->Cell(0, -2, 'PIHAK PERTAMA', 0, 1, '');
$pdf->SetFont('Times', '', '10');
$pdf->setX(46);
$pdf->Cell(0, 2, 'dan', 0, 1, '');
$pdf->SetFont('Times', 'B', '10');
$pdf->setX(52);
$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
$pdf->SetFont('Times', '', '10');
$pdf->setX(78);
$pdf->Cell(0, 2, 'wajib memberikan luaran berupa Jurnal Internasional kepada Direktur Riset dan Pengabdian', 0, 1, '');
$pdf->Ln(3);
$pdf->setX(15);
$pdf->Cell(0, 2, 'kepada Masyarakat (DRPM)  ITS.', 0, 1, '');
$pdf->Ln(7);

$pdf->SetFont('Times', '', '10');
$pdf->Cell(0, 2, 'Demikian surat perjanjian ini dibuat oleh kedua belah pihak, ditandatangani di atas materai secukupnya sesuai ketentuan yang berlaku.', 0, 1, '');
$pdf->Ln(30);
$pdf->SetFont('Times', 'B', '10');
$pdf->Cell(0, 2, 'PIHAK PERTAMA', 0, 1, '');
$pdf->setX(130);
$pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
$pdf->Ln(30);
$pdf->SetFont('Times', '', '10');
$pdf->Cell(0, 2, $nama, 0, 1, '');
$pdf->setX(130);
$pdf->Cell(0, -2, $nama_lengkap, 0, 1, '');
$pdf->Ln(5);
$pdf->Cell(0, 2, 'NIP. '.$nomor_induk, 0, 1, '');
$pdf->setX(130);
$pdf->Cell(0, -2, 'NIK. 1403052803954595', 0, 1, '');

$pdf->Output();

?>