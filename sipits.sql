/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - sipits
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `data_bpup` */

DROP TABLE IF EXISTS `data_bpup`;

CREATE TABLE `data_bpup` (
  `id_bpup` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nomor_induk` varchar(100) NOT NULL,
  `departemen` varchar(200) NOT NULL,
  `universitas` varchar(200) NOT NULL,
  `alamat_kampus` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `no_kontrak` varchar(200) NOT NULL,
  `tanggal_kontrak` date NOT NULL,
  `skema` varchar(200) NOT NULL,
  `sumber` varchar(200) NOT NULL,
  `tahun` int(5) NOT NULL,
  `nrp` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `program_studi` varchar(200) DEFAULT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `alamat_ktp` varchar(200) NOT NULL,
  `alamat_domisili` varchar(200) NOT NULL,
  `email_bea` varchar(50) NOT NULL,
  `no_hp_bea` varchar(50) DEFAULT NULL,
  `ktm` varchar(200) DEFAULT NULL,
  `ktp` varchar(200) DEFAULT NULL,
  `jenis_reward` varbinary(50) DEFAULT 'Beasiswa Biaya Pendidikan',
  `lama_pembiayaan` int(2) DEFAULT NULL,
  `sejak` varchar(10) DEFAULT NULL,
  `sejak_tahun` varchar(20) DEFAULT NULL,
  `sampai` varchar(10) DEFAULT NULL,
  `sampai_tahun` varchar(20) DEFAULT NULL,
  `satuan_biaya` int(20) DEFAULT NULL,
  `total_biaya` int(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tanggal_submit` date DEFAULT NULL,
  `luaran` varchar(100) DEFAULT NULL,
  `jenis_luaran` varchar(100) DEFAULT NULL,
  `isi_luaran` varchar(100) DEFAULT NULL,
  `status_luaran` int(11) DEFAULT NULL,
  `submit_luaran` date DEFAULT NULL,
  PRIMARY KEY (`id_bpup`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_bpup` */

insert  into `data_bpup`(`id_bpup`,`nama`,`nomor_induk`,`departemen`,`universitas`,`alamat_kampus`,`email`,`no_hp`,`judul`,`no_kontrak`,`tanggal_kontrak`,`skema`,`sumber`,`tahun`,`nrp`,`nama_lengkap`,`program_studi`,`pendidikan`,`alamat_ktp`,`alamat_domisili`,`email_bea`,`no_hp_bea`,`ktm`,`ktp`,`jenis_reward`,`lama_pembiayaan`,`sejak`,`sejak_tahun`,`sampai`,`sampai_tahun`,`satuan_biaya`,`total_biaya`,`status`,`tanggal_submit`,`luaran`,`jenis_luaran`,`isi_luaran`,`status_luaran`,`submit_luaran`) values 
(1,'Suprapto, Ph.D','197209191998021002','-','ITS','-','admin@gmail.com','0123123123','Teknik Analisis Baru untuk Identifikasi Darah Sapi dan Babi untuk Pengendalian Produk Halal','47/PKS/ITS/2018','2018-02-01','Penelitian Unggulan','ITS',2018,'1403052803954595','Muhammad Yudha Syahputra','-','Magister','Jl. Hang Tuah Kecamatan Sungai Ampit, Riau','Keputih Gang Makam Blok D no 2, Surabaya','abc@gmail.com','085859012008','89676-jne.pdf','25644-jne.pdf','Beasiswa Biaya Pendidikan',1,'Ganjil','2018/2019','Ganjil','2017/2018',15000000,15000,0,'2020-08-25','70080-1110-2325-1-SM.pdf','Lainnya','a',1,NULL);

/*Table structure for table `data_kmpi` */

DROP TABLE IF EXISTS `data_kmpi`;

CREATE TABLE `data_kmpi` (
  `id_kmpi` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nomor_induk` varchar(100) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `univ` varchar(200) NOT NULL,
  `alamat_kantor` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `nama_pembimbing` varchar(100) NOT NULL,
  `nomor_pembimbing` varchar(200) NOT NULL,
  `departemen_pembimbing` varchar(100) NOT NULL,
  `fakultas_pembimbing` varchar(100) NOT NULL,
  `email_pembimbing` varchar(100) NOT NULL,
  `hp_pembimbing` varchar(100) NOT NULL,
  `judul_publikasi` varchar(250) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `draft_publikasi` varchar(100) NOT NULL,
  `luaran_publikasi` varchar(100) NOT NULL,
  `mou_publikasi` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `luaran` varchar(100) DEFAULT NULL,
  `status_luaran` int(1) DEFAULT NULL,
  `tanggal_submit` date NOT NULL,
  PRIMARY KEY (`id_kmpi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_kmpi` */

/*Table structure for table `data_kp` */

DROP TABLE IF EXISTS `data_kp`;

CREATE TABLE `data_kp` (
  `id_kp` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nomor_induk` varchar(100) NOT NULL,
  `departemen` varchar(200) NOT NULL,
  `universitas` varchar(200) NOT NULL,
  `alamat_kantor` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `ketua` varchar(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `skema` varchar(50) NOT NULL,
  `sumber` varchar(50) NOT NULL,
  `lama_penelitian` int(20) NOT NULL,
  `anggota` varchar(250) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `mou` varchar(100) NOT NULL,
  `moa` varchar(100) NOT NULL,
  `luaran` varchar(100) DEFAULT NULL,
  `status_luaran` int(1) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `tanggal_submit` date NOT NULL,
  `kategori` int(100) NOT NULL,
  PRIMARY KEY (`id_kp`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `data_kp` */

insert  into `data_kp`(`id_kp`,`nama`,`nomor_induk`,`departemen`,`universitas`,`alamat_kantor`,`email`,`no_hp`,`ketua`,`judul`,`skema`,`sumber`,`lama_penelitian`,`anggota`,`proposal`,`mou`,`moa`,`luaran`,`status_luaran`,`status`,`tanggal_submit`,`kategori`) values 
(7,'anak mama','123123123','informatika','ITS','sukolilo','dasd@gmail.com','09345839453','Paijo','The Relationship between The Existence of Educational Games and Non-player Character based on Literature Review','PDUPT','Dana Dikti',10,'haha;hihi','81605-1.PNG','65620-2.PNG','44424-bukti submit.pdf',NULL,NULL,4,'2020-01-29',0),
(8,'baba','qqq','qqqq','qqqq','qqqqq','qqqqq','qqqqq','qqqq','qqqq','qqq','qqq',2,'qqqq','80546-1.PNG','83846-2.PNG','42461-bukti submit.pdf',NULL,NULL,2,'2020-01-29',0),
(9,'caca','qqq','qqqq','qqqq','qqqqq','qqqqq','qqqqq','qqqq','qqqq','qqq','qqq',2,'qqqq','28963-1.PNG','88204-2.PNG','50417-bukti submit.pdf',NULL,NULL,3,'2020-01-29',0),
(10,'Dwi Oktafitria, S.Si., M.Sc.','-/0706108602','Biologi/Fakultas MIPA','Universitas PGRI Ronggolawe','Jl. Manunggal No. 61 Tuban, 62381','dwioktafitria86@gmail.com','085731133551','Dr. Dewi Hidayati, M.Si','APLIKASI IN SITU VERMIKOMPOS UNTUK REHABILITASI LAHAN MARGINAL BEKAS TAMBANG INDUSTRI SEMEN DI TUBAN BERBASIS AGRIKULTUR','PENELITIAN KERJASAMA ANTAR PERGURUAN TINGGI (PAKER','DANA ITS TAHUN 2020',9,'Nova Maulidina Ashuri, S.Si., M.Si','14137-PROPOSAL PAKERTI_Dewi Hidayati_Biologi ITS_2020.docx','75480-MoU ITS dan Unirow(1) (1).pdf','54703-MoA Biologi dan Unirow(1).pdf','',0,3,'2020-03-11',0),
(11,'Dwi Oktafitria, S.Si., M.Sc.','-/0706108602','Biologi/Fakultas MIPA','Universitas PGRI Ronggolawe','Jl. Manunggal No. 61 Tuban, 62381','dwioktafitria86@gmail.com','085731133551','Dr. Dewi Hidayati, M.Si','APLIKASI IN SITU VERMIKOMPOS UNTUK REHABILITASI LAHAN MARGINAL BEKAS TAMBANG INDUSTRI SEMEN DI TUBAN BERBASIS AGRIKULTUR','PENELITIAN KERJASAMA ANTAR PERGURUAN TINGGI (PAKER','DANA ITS TAHUN 2020',9,'Nova Maulidina Ashuri, S.Si., M.Si','94604-PROPOSAL PAKERTI_Dewi Hidayati_Biologi ITS_2020.docx','90957-MoU ITS dan Unirow(1) (1).pdf','53042-MoA Biologi dan Unirow(1).pdf',NULL,NULL,2,'2020-03-11',0),
(12,'Dwi Oktafitria, S.Si., M.Sc.','-/0706108602','Biologi/Fakultas MIPA','Universitas PGRI Ronggolawe','Jl. Manunggal No. 61 Tuban, 62381','dwioktafitria86@gmail.com','085731133551','Dr. Nurul Jadid, S.Si., M.Sc','Teknik Mikropropagasi Tunas Mikro Stevia rebaudiana (Bertoni) aksesi Mini secara in vitro sebagai Upaya Pemuliaan dan Perbanyakan Bibit Unggul Tanaman Pemanis Sehat Alternatif bagi Penderita Diabetes','PENELITIAN KERJASAMA ANTAR PERGURUAN TINGGI (PAKER','DANA ITS TAHUN 2020',9,'Wirdhatul Muslihatin, S.Si., M.Si; Dini Ermavitalini, S.Si., M.Si; Christin Risbandini, S.Si','80436-proposal_daftar_7003_PAKERTI_20200308030408.pdf','84019-MOU ITS.pdf','42300-MoA Biologi dan Unirow(1).pdf',NULL,NULL,0,'2020-03-11',0),
(13,'Dwi Oktafitria, S.Si., M.Sc.','0706108602','Biologi/FMIPA','Universitas PGRI Ronggolawe','Jl. Manunggal No. 61 Tuban, 62381','dwioktafitria86@gmail.com','085731133551','Dr. Nurul Jadid, S.Si., M.Sc','Teknik Mikropropagasi Tunas Mikro Stevia rebaudiana (Bertoni) aksesi Mini secara in vitro sebagai Upaya Pemuliaan dan Perbanyakan Bibit Unggul Tanaman Pemanis Sehat Alternatif bagi Penderita Diabetes','PENELITIAN KERJASAMA ANTAR PERGURUAN TINGGI','DANA ITS TAHUN 2020',9,'Wirdhatul Muslihatin, S.Si., M.Si; Dini Ermavitalini, S.Si., M.Si; Christin Risbandini, S.Si','52161-proposal_daftar_7003_PAKERTI_20200308030408.pdf','84784-MOU ITS.pdf','63119-MoA Biologi dan Unirow(1).pdf',NULL,NULL,0,'2020-03-13',0),
(14,'Dwi Oktafitria, S.Si., M.Sc.','0706108602','Biologi/FMIPA','Universitas PGRI Ronggolawe','Jl. Manunggal No. 61 Tuban, 62381','dwioktafitria86@gmail.com','085731133551','Dr. Nurul Jadid, S.Si., M.Sc','Teknik Mikropropagasi Tunas Mikro Stevia rebaudiana (Bertoni) aksesi Mini secara in vitro sebagai Upaya Pemuliaan dan Perbanyakan Bibit Unggul Tanaman Pemanis Sehat Alternatif bagi Penderita Diabetes','PENELITIAN KERJASAMA ANTAR PERGURUAN TINGGI','DANA ITS TAHUN 2020',9,'Wirdhatul Muslihatin, S.Si., M.Si; Dini Ermavitalini, S.Si., M.Si; Christin Risbandini, S.Si','12158-proposal_daftar_7003_PAKERTI_20200308030408.pdf','43004-MOU ITS.pdf','72106-MoA Biologi dan Unirow(1).pdf',NULL,NULL,0,'2020-03-13',0),
(15,'Dwi Oktafitria, S.Si., M.Sc.','0706108602','Biologi/FMIPA','Universitas PGRI Ronggolawe','Jl. Manunggal No. 61 Tuban, 62381','dwioktafitria86@gmail.com','085731133551','Dr. Nurul Jadid, S.Si., M.Sc','Teknik Mikropropagasi Tunas Mikro Stevia rebaudiana (Bertoni) aksesi Mini secara in vitro sebagai Upaya Pemuliaan dan Perbanyakan Bibit Unggul Tanaman Pemanis Sehat Alternatif bagi Penderita Diabetes','PENELITIAN KERJASAMA ANTAR PERGURUAN TINGGI','DANA ITS TAHUN 2020',9,'Wirdhatul Muslihatin, S.Si., M.Si; Dini Ermavitalini, S.Si., M.Si; Christin Risbandini, S.Si','74220-proposal_daftar_7003_PAKERTI_20200308030408.pdf','72253-MOU ITS.pdf','1840-MoA Biologi dan Unirow(1).pdf',NULL,NULL,0,'2020-03-16',0),
(16,'Dwi Oktafitria, S.Si., M.Sc.','0706108602','Biologi/FMIPA','Universitas PGRI Ronggolawe','Jl. Manunggal No. 61 Tuban, 62381','dwioktafitria86@gmail.com','085731133551','Dr. Nurul Jadid, S.Si., M.Sc','Teknik Mikropropagasi Tunas Mikro Stevia rebaudiana (Bertoni) aksesi Mini secara in vitro sebagai Upaya Pemuliaan dan Perbanyakan Bibit Unggul Tanaman Pemanis Sehat Alternatif bagi Penderita Diabetes','PENELITIAN KERJASAMA ANTAR PERGURUAN TINGGI','DANA ITS TAHUN 2020',9,'Wirdhatul Muslihatin, S.Si., M.Si; Dini Ermavitalini, S.Si., M.Si; Christin Risbandini, S.Si','52212-proposal_daftar_7003_PAKERTI_20200308030408.pdf','58320-MOU ITS.pdf','47854-MoA Biologi dan Unirow(1).pdf',NULL,NULL,4,'2020-03-16',0),
(17,'Dwi Oktafitria, S.Si., M.Sc.','0706108602','Biologi/FMIPA','Universitas PGRI Ronggolawe','Jl. Manunggal No. 61 Tuban, 62381','dwioktafitria86@gmail','085731133551','Dr. Nurul Jadid, S.Si., M.Sc','Teknik Mikropropagasi Tunas Mikro Stevia rebaudiana (Bertoni) aksesi Mini secara in vitro sebagai Upaya Pemuliaan dan Perbanyakan Bibit Unggul Tanaman Pemanis Sehat Alternatif bagi Penderita Diabetes','PENELITIAN KERJASAMA ANTAR PERGURUAN TINGGI (PAKER','DANA LOKAL ITS TAHUN 2020',9,'Wirdhatul Muslihatin, S.Si., M.Si; Dini Ermavitalini, S.Si., M.Si; Christin Risbandini, S.Si','55394-proposal_daftar_7003_PAKERTI_20200308030408.pdf','70877-MOU ITS.pdf','60583-MoA Biologi dan Unirow(1).pdf',NULL,NULL,0,'2020-03-18',0);

/*Table structure for table `data_p3i` */

DROP TABLE IF EXISTS `data_p3i`;

CREATE TABLE `data_p3i` (
  `id_p3i` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nomor_induk` varchar(100) NOT NULL,
  `departemen` varchar(200) NOT NULL,
  `universitas` varchar(200) NOT NULL,
  `alamat_kantor` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `hindex` varchar(100) NOT NULL,
  `pernyataan` varchar(100) NOT NULL,
  `draf` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `tabungan` varchar(100) NOT NULL,
  `judul1` varchar(100) DEFAULT NULL,
  `skema1` varchar(100) DEFAULT NULL,
  `sumber1` varchar(100) DEFAULT NULL,
  `luaran1` varchar(100) DEFAULT NULL,
  `status_luaran1` int(1) DEFAULT NULL,
  `judul2` varchar(100) DEFAULT NULL,
  `skema2` varchar(100) DEFAULT NULL,
  `sumber2` varchar(100) DEFAULT NULL,
  `luaran2` varchar(100) DEFAULT NULL,
  `status_luaran2` int(1) DEFAULT NULL,
  `judul3` varchar(100) DEFAULT NULL,
  `skema3` varchar(100) DEFAULT NULL,
  `sumber3` varchar(100) DEFAULT NULL,
  `luaran3` varchar(100) DEFAULT NULL,
  `status_luaran3` int(1) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `tanggal_submit` date NOT NULL,
  `kategori` int(20) NOT NULL,
  PRIMARY KEY (`id_p3i`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_p3i` */

insert  into `data_p3i`(`id_p3i`,`nama`,`nomor_induk`,`departemen`,`universitas`,`alamat_kantor`,`email`,`no_hp`,`hindex`,`pernyataan`,`draf`,`npwp`,`tabungan`,`judul1`,`skema1`,`sumber1`,`luaran1`,`status_luaran1`,`judul2`,`skema2`,`sumber2`,`luaran2`,`status_luaran2`,`judul3`,`skema3`,`sumber3`,`luaran3`,`status_luaran3`,`status`,`tanggal_submit`,`kategori`) values 
(1,'Via Vallen','12345678','IT','ITS','Surabaya','admin@gmail.com','234234','1','38864-tanah mjk.pdf','19810-tanah mjk.pdf','42226-tanah mjk.pdf','59304-tanah mjk.pdf','Materi office','Oke oke','Pusat','18709-12.pdf',1,'qwe','ewq','weq',NULL,NULL,'zxc','cxz','xcz',NULL,NULL,0,'2020-08-10',0);

/*Table structure for table `data_pap` */

DROP TABLE IF EXISTS `data_pap`;

CREATE TABLE `data_pap` (
  `id_pap` int(100) NOT NULL AUTO_INCREMENT,
  `nama_ketua` varchar(100) NOT NULL,
  `nomor_induk_ketua` varchar(100) NOT NULL,
  `departemen_ketua` varchar(100) NOT NULL,
  `universitas_ketua` varchar(100) NOT NULL,
  `alamat_ketua` varchar(100) NOT NULL,
  `email_ketua` varchar(100) NOT NULL,
  `no_hp_ketua` varchar(100) NOT NULL,
  `nama_ap` varchar(100) NOT NULL,
  `nomor_induk_ap` varchar(100) NOT NULL,
  `alamat_ktp_ap` varchar(100) NOT NULL,
  `alamat_domisili_ap` varchar(100) NOT NULL,
  `email_ap` varchar(100) NOT NULL,
  `no_hp_ap` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `nomor_kontrak` varchar(100) NOT NULL,
  `tanggal_kontrak` varchar(100) NOT NULL,
  `skema` varchar(100) NOT NULL,
  `pendanaan` varchar(100) NOT NULL,
  `jumlah_hibah` varchar(100) NOT NULL,
  `target_luaran` varchar(100) NOT NULL,
  `honor` varchar(100) NOT NULL,
  `lama_bulan` varchar(100) NOT NULL,
  `total_honor` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_submit` varchar(100) NOT NULL,
  `pernyataan` varchar(100) NOT NULL,
  `ktp` varchar(100) NOT NULL,
  `luaran` varchar(100) DEFAULT NULL,
  `status_luaran` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_pap`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_pap` */

insert  into `data_pap`(`id_pap`,`nama_ketua`,`nomor_induk_ketua`,`departemen_ketua`,`universitas_ketua`,`alamat_ketua`,`email_ketua`,`no_hp_ketua`,`nama_ap`,`nomor_induk_ap`,`alamat_ktp_ap`,`alamat_domisili_ap`,`email_ap`,`no_hp_ap`,`judul`,`nomor_kontrak`,`tanggal_kontrak`,`skema`,`pendanaan`,`jumlah_hibah`,`target_luaran`,`honor`,`lama_bulan`,`total_honor`,`status`,`tanggal_submit`,`pernyataan`,`ktp`,`luaran`,`status_luaran`) values 
(1,'Indri Meilani','1989201822301','DRPM ','ITS','Kampus ITS Sukolilo ','indri.its.05@gmail.com','087811162717','Restu Sri Rahayu ','1992201722457','Magelang','Keputih ','restu@its.ac.id','081578890402','Rancang Bangun Sistem Informasi dan Dokumen Sistem Manajemen Mutu Berbasis  ISO 9001:2015 Integrasi ','2200/PKS/ITS/2020','2020-06-03','Penelitian Tenaga Pendidikan ','ITS','20000000','Aplikasi Website ','300000','5','1500000',5,'2020-08-03','66934-Surat Pernyataan_RAH.pdf','17216-Lembar Pengesahan_RAH.pdf','',NULL);

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `NIDN` varchar(25) NOT NULL,
  `NIP` varchar(25) NOT NULL,
  `Alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `fakultas` text NOT NULL,
  `universitas` text NOT NULL,
  `H_index_scopus` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `dosen` */

insert  into `dosen`(`id`,`nama`,`NIDN`,`NIP`,`Alamat`,`email`,`telepon`,`departemen`,`fakultas`,`universitas`,`H_index_scopus`) values 
(1,'Eden Hazard','32324234','32324234','Jl Semangka','edenhazard@gmail.com','082239239921','Teknik Kimia','Fakultas Teknologi Industri','Institut Teknologi Sepuluh Nopember',''),
(2,'Indri Meilani','1989201822301','1989201822301','Kampus ITS Sukolilo ','indri.its.05@gmail.com','087811162717','DRPM ','','ITS',''),
(3,'Suprapto, Ph.D','197209191998021002','197209191998021002','-','admin@gmail.com','0123123123','-','','ITS','');

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(25) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `alamat_KTP` varchar(250) NOT NULL,
  `alamat_domisili` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `universitas` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`id`,`nama`,`nrp`,`nik`,`alamat_KTP`,`alamat_domisili`,`email`,`no_hp`,`departemen`,`fakultas`,`universitas`) values 
(1,'Alex Graham','34324344','34324344','Jl Sulawesi','Jl Sulawesi','alexgraham@gmail.com','081232233192','Teknik Industri','Fakultas Teknologi industri','Insitut Teknologi Sepuluh Nopember'),
(2,'Restu Sri Rahayu ','1992201722457','1992201722457','Magelang','Keputih ','restu@its.ac.id','081578890402','Oke','Oke','Oke');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(36) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`) values 
(1,'admin@admin.com','$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
