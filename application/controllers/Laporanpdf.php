<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
    }
    
    public function index(){

        $data = array(
            "dataku" => array(
                "nama" => "Petani Kode",
                "url" => "http://petanikode.com"
            )
        );

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "kontrak.pdf";
        //$this->pdf->load_view('admin/cetak_kontrak', $data);

        $this->load->view('admin/cetak_kontrak');

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

