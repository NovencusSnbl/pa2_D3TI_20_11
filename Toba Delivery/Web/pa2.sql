/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.38-MariaDB : Database - pa2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pa2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pa2`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `usernameA` varchar(30) DEFAULT NULL,
  `passwordA` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`usernameA`,`passwordA`) values (2,'admin01','$2y$10$mcE8adnIZiFgomjbpFCu9es7cCx5jszmc18N8g/39utIVdqsf.TOi'),(3,'admin11','$2y$10$br5vH1P2BEMFp8u1iNNnaOiA7nrXhsuXRveGw2qUGbr57Ko9SGnVq'),(4,'admin03','$2y$10$PRUVzY66vEt/yExC8MDaheJ3tE43uUShp9m/zKYrkvSYi8ssk3EFi');

/*Table structure for table `costumer` */

DROP TABLE IF EXISTS `costumer`;

CREATE TABLE `costumer` (
  `id_costumer` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(12) DEFAULT NULL,
  `mobile` blob,
  `gender` blob,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id_costumer`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `costumer` */

insert  into `costumer`(`id_costumer`,`email`,`username`,`PASSWORD`,`mobile`,`gender`,`status`) values (1,'user1@gmail.com','user1','suka2saya','567890','Laki laki',1),(2,'user02@gmail.com','user02','suka2saya','456787654','Perempuan',1),(3,'mangasi@gmail.com','mangasi','suka2saya','234567887654','Laki laki',0);

/*Table structure for table `kurir` */

DROP TABLE IF EXISTS `kurir`;

CREATE TABLE `kurir` (
  `id_kurir` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `fotoDiri` varchar(225) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `fotoSIM` varchar(225) DEFAULT NULL,
  `fotoSTNK` varchar(225) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id_kurir`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kurir` */

insert  into `kurir`(`id_kurir`,`nama`,`email`,`password`,`gender`,`fotoDiri`,`alamat`,`fotoSIM`,`fotoSTNK`,`status`) values (5,'maydi','s@gmail.com','123','Laki - lak','5eaef1993730a.jpg','porsea','5eaef19937543.png','5eaef1993774d.png',1),(6,'maydi','novencussinambela00@gmail.com','123456','Laki-laki','5eaef89346c5d.jpg','porsea','5eaef89346e9e.jpg','5eaef8934700c.jpg',0),(7,'saya','saya@gmail.com','suka2saya','Laki-laki','5eb260cb13b39.png','porsea','5eb260cb14124.png','5eb260cb14685.png',0);

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(20) DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `gambar` varchar(225) DEFAULT NULL,
  `nama_toko` varchar(50) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`nama_produk`,`harga`,`gambar`,`nama_toko`,`alamat`) values (1,'$namaProduk',0,'$gambarProduk','$namaToko','$alamat'),(2,'Indomie',25000,'5eb417f98c919.jfif','Toko sabar','jln soposurung ,balige');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
