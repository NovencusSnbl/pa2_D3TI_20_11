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
) ENGINE=InnoDB AUTO_INCREMENT=100019 DEFAULT CHARSET=latin1;

/*Data for the table `costumer` */

insert  into `costumer`(`id_costumer`,`email`,`username`,`PASSWORD`,`mobile`,`gender`,`status`) values (100009,'novencussinambela00@gmail.com','novencus','suka2saya','09876','Laki laki',1),(100016,'chelsysitumorang1212@gmail.com','Chelsea','123itdel','765456789','Perempuan',1),(100017,'davinsonhutapea89@gmail.com','davinson','suka2saya','98765','Laki laki',1),(100018,'user1@gmail.com','saya','suka2saya','1634567','Laki laki',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=10004 DEFAULT CHARSET=latin1;

/*Data for the table `kurir` */

insert  into `kurir`(`id_kurir`,`nama`,`email`,`password`,`gender`,`fotoDiri`,`alamat`,`fotoSIM`,`fotoSTNK`,`status`) values (10002,'maydi','novencussinambela00@gmail.com','suka2saya','Laki-laki','5edf31d29ad55.jfif','Jln pasar ,Porsea','5edf31d29af96.jfif','5edf31d2a906f.jfif',1),(10003,'lucy','chelsysitumorang1212@gmail.com','1234567','Perempuan','5eeae8cbed76f.jpg','Jln pasar ,Porsea','5eeae8cc03009.jfif','5eeae8cc06149.jfif',1);

/*Table structure for table `pemesanan` */

DROP TABLE IF EXISTS `pemesanan`;

CREATE TABLE `pemesanan` (
  `idpemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_pemesanan` datetime DEFAULT NULL,
  `waktu_sampai` datetime DEFAULT NULL,
  `asal` blob,
  `tujuan` blob,
  `status` int(11) DEFAULT '0',
  `status_bayar` int(1) DEFAULT '0',
  `idkurir` int(11) DEFAULT NULL,
  `idcostumer` int(11) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `pembayaran` float DEFAULT NULL,
  PRIMARY KEY (`idpemesanan`),
  KEY `FK_pemesanan_kurir` (`idkurir`),
  KEY `FK_pemesanan_costumer` (`idcostumer`),
  KEY `FK_pemesanan_produk` (`idproduk`),
  CONSTRAINT `FK_pemesanan_costumer` FOREIGN KEY (`idcostumer`) REFERENCES `costumer` (`id_costumer`),
  CONSTRAINT `FK_pemesanan_produk` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `pemesanan` */

insert  into `pemesanan`(`idpemesanan`,`waktu_pemesanan`,`waktu_sampai`,`asal`,`tujuan`,`status`,`status_bayar`,`idkurir`,`idcostumer`,`idproduk`,`pembayaran`) values (54,'2020-06-26 13:35:16','0000-00-00 00:00:00','Porsea','Balige',3,0,10002,100009,7,0),(55,'2020-06-26 14:20:17','0000-00-00 00:00:00','Porsea','Sitoluama',1,0,10002,100009,6,0);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`nama_produk`,`harga`,`gambar`,`nama_toko`,`alamat`) values (6,'Martabak Manis',21000,'https://media-cdn.tripadvisor.com/media/photo-s/09/ed/e6/70/mtf-utwov-1130-largejpg.jpg','Martabak Sabar','Jln. Pasar Porsea,Porsea'),(7,'Indomie goreng',12000,'https://upload.wikimedia.org/wikipedia/commons/1/1e/Indomie_Mie_goreng_Penyetan_Cok.jpg','Mak Sarah','Jln. Sitoluama ,IT Del'),(8,'Ifumie Goreng',25000,'https://i2.wp.com/resepkoki.id/wp-content/uploads/2016/04/Resep-Ifumie.jpg?fit=2282%2C2304&ssl=1','Bakmi Sehat','Jln. Balige');

/*Table structure for table `saran` */

DROP TABLE IF EXISTS `saran`;

CREATE TABLE `saran` (
  `idsaran` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`idsaran`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `saran` */

insert  into `saran`(`idsaran`,`email`,`nama`,`deskripsi`) values (1,'novencussinambela00@gmail.com','Novencus Sinambela','  		\r\n  		Begitulah');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
