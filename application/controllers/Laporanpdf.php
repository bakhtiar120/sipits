<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        // $this->load->library('Pdf');
        // $this->load->library('cetak_pdf');
   
    }
    
    public function index(){

        $this->load->library('f_pdf');
        $pdf = new FPDF('P', 'mm', 'Letter');

        $pdf->AddPage();
        $pdf->Image('assets/bahan/its-logo.png', 10, 10, 20, 25);
        //$pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '14');
        $pdf->Cell(0, 5, 'KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN ', 0, 1, 'C');
        // $pdf->Cell(25);
        $pdf->Cell(0, 5, 'INSTITUT TEKNOLOGI SEPULUH NOPEMBER', 0, 1, 'C');
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(0, 5, 'DIREKTORAT RISET DAN PENGABDIAN KEPADA MASYARAKAT', 0, 1,'C' );
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'I', '10');
        $pdf->Cell(0, 5, 'Gedung Pusat Riset Lantai Lobby, Kampus ITS Sukolilo, Surabaya 60111', 0, 1, 'C');
        $pdf->Cell(25);
        $pdf->Cell(0, 2, 'Telp. (031) 0315953759, Fax (031)  5955793, PABX : 1404,1405,1330', 0, 1, 'C');
        $pdf->Ln(2);
        $pdf->SetFont('Times', 'I', '10');
        $pdf->Cell(25);
        
        $pdf->Cell(0, 2, 'Email: drpm@its.ac.id Website: www.its.ac.id/drpm', 0, 1, 'C');
        // $pdf->Ln(6);
        $pdf->SetLineWidth(1);
        $pdf->SetDrawColor(0,0,255);
        $pdf->Line(10,40,200,40);
        $pdf->Ln(10);
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(0, 5, 'SURAT PERJANJIAN', 0, 1, 'C');
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(0, 5, 'DOSEN PENELITI', 0, 1, 'C');
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(0, 5, 'DENGAN', 0, 1, 'C');
        $pdf->Cell(25);
        $pdf->SetFont('Times', 'B', '12');
        $pdf->Cell(0, 5, 'PENERIMA PENYELENGGARAAN ASISTEN PENELITIAN', 0, 1, 'C');
        $pdf->SetFont('Times', '', '12');
        $pdf->Cell(25);

        $pdf->Cell(0, 2, 'Nomor :   ', 0, 1, 'C');
        $pdf->Ln(6);
        $pdf->SetFont('Times', '', '10');
        $pdf->Cell(0,2, 'Pada hari ini Rabu, tanggal Lima, bulan Mei, tahun Dua ribu delapan belas yang bertandatangan di bawah ini:',0,1,'');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Nama', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Suprapto', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'NIP', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, '1231241', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Departemen', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'fisika', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Jabatan', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Ketua Peneliti Teknik Analisis Baru untuk Identifikasi Darah Sapi dan Babi untuk Pengendalian Produk Halal', 0, 1, '');
        $pdf->Ln(2);
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Skema Penelitian Unggulan sesuai Surat Perjanjian Sumber Dana ITS Nomor 47/PKS/ITS/2018  tanggal 1 Februari 2018', 0, 1, '');
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
        $pdf->Cell(0, 2, 'Alex', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Status', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Mahasiswa', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'NRP', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, '3243223525', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Departemen', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'fisika', 0, 1, '');
        $pdf->Ln(3);
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
        $pdf->Cell(0, 2, '0812932193291', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'email', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'aa@gmail.com', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Alamat KTP', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Jl Anggrek', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Alamat Domisili', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Jl Anggrek', 0, 1, '');
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
        $pdf->Cell(0, 2, 'memberikan reward kepada asisten peneliti, yang selanjutnya disebut PAP, sesuai ketentuan yang berlaku  : ', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'kepada', 0, 1, '');
        $pdf->SetFont('Times', 'B', '10');
        $pdf->setX(26);
        $pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
        $pdf->SetFont('Times', '', '10');
        $pdf->setX(52);
        $pdf->Cell(0, 2, 'berupa', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Jenis Reward', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Honorium', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Sebagai', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Administrasi', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        
        $pdf->Cell(0, 2, 'Selama', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, '8 Jam', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Sebesar', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, '500.000 Setiap Hari', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Total Sebesar', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Rp 9.500.000', 0, 1, '');
        $pdf->Ln(3);
        $pdf->setX(15);
        $pdf->Cell(0, 2, 'Terbilang', 0, 1, '');
        $pdf->setX(42);
        $pdf->Cell(0, -2, ':', 0, 1, '');
        $pdf->setX(45);
        $pdf->Cell(0, 2, 'Satu juta rupiah', 0, 1, '');
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
        $pdf->Ln(7);
        $pdf->SetFont('Times', 'B', '10');
        $pdf->Cell(0, 2, 'PIHAK PERTAMA', 0, 1, '');
        $pdf->setX(130);
        $pdf->Cell(0, -2, 'PIHAK KEDUA', 0, 1, '');
        $pdf->Ln(7);
        $pdf->SetFont('Times', '', '10');
        $pdf->Cell(0, 2, 'Suprapto PHd', 0, 1, '');
        $pdf->setX(130);
        $pdf->Cell(0, -2, 'Muhammad Yudha', 0, 1, '');
        $pdf->Ln(4);
        $pdf->Cell(0, 2, 'NIP. 197209191998021002', 0, 1, '');
        $pdf->setX(130);
        $pdf->Cell(0, -2, 'NIK. 1403052803954595', 0, 1, '');

        $pdf->Output();
            // $this->load->view('admin/cetak_kontrak');
        

        // $this->load->view('admin/cetak_kontrak');

    }

    function index2(){
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SURAT PERJANJIAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'DOSEN PENELITI',0,1,'C');
        $pdf->Cell(190,7,'DENGAN',0,1,'C');
        $pdf->Cell(190,7,'MAHASISWA PENERIMA PENYELENGGARAAN ASISTEN PENELITI',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,7,'Nomor Kontrak : xxx/xxx/xx/xxx/2019',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(90,7,'Pada hari ini Selasa, tanggal dua puluh empat, bulan Juli, tahun dua ribu delapan belas yang bertandatangan dibawah ini.',0,0,'L');
        $pdf->Cell(190,7,'Nama : Dosen Peneliti',0,1,'C');
        $pdf->Cell(190,7,'NIP : xxxxxxxx',0,1,'C');
        $pdf->Cell(190,7,'Jabatan : Ketua Peneliti [Judul] Skema [skema] Surat perjanjian Nomor xxxxxx',0,1,'C');
        $pdf->Cell(190,7,'Selanjutnya disebut PIHAK PERTAMA',0,1,'C');
        

        // $pdf->Cell(20,6,'NIM',1,0);
        // $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        // $pdf->Cell(27,6,'NO HP',1,0);
        // $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        // $pdf->SetFont('Arial','',10);
        // $mahasiswa = $this->db->get('mahasiswa')->result();
        // foreach ($mahasiswa as $row){
        //     $pdf->Cell(20,6,$row->nim,1,0);
        //     $pdf->Cell(85,6,$row->nama_lengkap,1,0);
        //     $pdf->Cell(27,6,$row->no_hp,1,0);
        //     $pdf->Cell(25,6,$row->tanggal_lahir,1,1); 
        // }
        $pdf->Output();
    }

    
}

