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
/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(36) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`hash`) values 
(1,'admin@admin.com','$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.','admin'),
(8,'cahyasw2@gmail.com','$2y$10$LpJ47b9ZZ0Be20.MplOp/.A8GEL./GdOEtLMZ0t.rpI4Uy2WtAivu','admin'),
(10,'cahyasw2@gmail.com','$2y$10$0zyfaCZscm.nSa1ofZePE.t07teDkkb8eJpC4ficUo7AopT0Ik4QG','12345');

/*Table structure for table `user_akses` */

DROP TABLE IF EXISTS `user_akses`;

CREATE TABLE `user_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `kode_menu` varchar(50) NOT NULL,
  `tambah` int(2) NOT NULL DEFAULT 1 COMMENT '0=false, 1=true',
  `baca` int(2) NOT NULL DEFAULT 1 COMMENT '0=false, 1=true',
  `edit` int(2) DEFAULT 1 COMMENT '0=false, 1=true',
  `hapus` int(2) DEFAULT 1 COMMENT '0=false, 1=true',
  PRIMARY KEY (`id`),
  KEY `akses_kode_menu` (`kode_menu`),
  KEY `akses_level` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=866 DEFAULT CHARSET=latin1;

/*Data for the table `user_akses` */

insert  into `user_akses`(`id`,`id_user`,`kode_menu`,`tambah`,`baca`,`edit`,`hapus`) values 
(825,1,'admin',1,1,1,1),
(826,1,'arsip',1,1,1,1),
(827,1,'atur_bpup',1,1,1,1),
(828,1,'atur_kmpi',1,1,1,1),
(829,1,'atur_kp',1,1,1,1),
(830,1,'atur_p3i',1,1,1,1),
(831,1,'atur_pap',1,1,1,1),
(832,1,'rak',1,1,1,1),
(833,1,'users',1,1,1,1),
(861,8,'admin',0,1,0,0),
(862,8,'atur_kp',0,1,1,0),
(863,8,'atur_pap',0,0,1,0),
(864,8,'atur_p3i',0,0,1,0),
(865,8,'atur_bpup',0,1,0,0);

/*Table structure for table `user_level` */

DROP TABLE IF EXISTS `user_level`;

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user_level` */

insert  into `user_level`(`id`,`level`,`keterangan`) values 
(1,'administrator','Administrator');

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` int(11) NOT NULL DEFAULT 1 COMMENT '0=parent, 1=child',
  `parent` varchar(50) DEFAULT NULL,
  `kode_menu` varchar(50) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL DEFAULT '#',
  `icon` varchar(75) NOT NULL DEFAULT 'fa fa-circle-o',
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_menu` (`kode_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`id`,`tipe`,`parent`,`kode_menu`,`nama_menu`,`url`,`icon`,`urutan`) values 
(47,0,NULL,'admin','Dashboard','admin','nav-icon fas fa-tachometer-alt',0),
(52,0,NULL,'atur_kp','Program KP','atur_kp','nav-icon fas fa-archive',0),
(53,0,NULL,'atur_pap','Program PAP','atur_pap','nav-icon far fa-clipboard',0),
(54,0,NULL,'atur_kmpi','Program KMPI','atur_kmpi','nav-icon fas fa-book',0),
(55,0,NULL,'atur_p3i','Program P3I','atur_p3i','nav-icon fas fa-file-alt',0),
(56,0,NULL,'atur_bpup','Program BPUP','atur_bpup','nav-icon fas fa-file-alt',0),
(57,0,NULL,'arsip','Data Arsip','arsip','nav-icon fas fa-file-alt',0),
(58,0,NULL,'rak','Data Rak','rak','nav-icon fas fa-file-alt',0),
(59,0,NULL,'users','Master Users','users','nav-icon fas fa-users',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
