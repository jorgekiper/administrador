/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.38-MariaDB : Database - db_festival_amapro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_festival_amapro` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db_festival_amapro`;

/*Table structure for table `fechas_importantes` */

DROP TABLE IF EXISTS `fechas_importantes`;

CREATE TABLE `fechas_importantes` (
  `id_fechas_importantes` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `evento_fecha` varchar(255) DEFAULT NULL,
  `texto_boton` varchar(255) DEFAULT NULL,
  `url_boton` varchar(255) DEFAULT NULL,
  `id_users` int(10) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL COMMENT '1=visible, 2=activo, novisible  0=inactivo, 3=eliminado',
  PRIMARY KEY (`id_fechas_importantes`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `fechas_importantes` */

LOCK TABLES `fechas_importantes` WRITE;

insert  into `fechas_importantes`(`id_fechas_importantes`,`fecha`,`evento_fecha`,`texto_boton`,`url_boton`,`id_users`,`fecha_registro`,`status`) values (1,'2019-07-16','Sesión de capacitación a agencias',NULL,NULL,1,'2019-06-24 15:46:43',1),(2,'2019-07-16','Apertura de Inscripciones y carga de casos',NULL,NULL,1,'2019-06-24 15:47:09',1),(3,'2019-08-06','Sesión de capacitación a creativos',NULL,NULL,1,'2019-06-24 15:47:33',1),(4,'2019-08-06','Apertura de Inscripciones de equipos creativos',NULL,NULL,1,'2019-06-24 15:48:17',1),(5,'2019-09-17','Sesión de capacitación a jurados',NULL,NULL,1,'2019-06-24 15:48:39',1),(6,'2019-09-30','Cierre de carga de casos',NULL,NULL,1,'2019-06-24 15:48:57',1),(7,'2019-10-01','Inicio de juzgamiento',NULL,NULL,1,'2019-06-24 15:49:14',1),(8,'2019-10-15','Cierre de juzgamiento',NULL,NULL,1,'2019-06-24 15:49:46',1),(9,'2019-11-21','Festival AMAPRO 2019',NULL,NULL,1,'2019-06-24 15:50:03',1);

UNLOCK TABLES;

/*Table structure for table `sliders` */

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `id_slider` int(10) NOT NULL AUTO_INCREMENT,
  `url_imagen` varchar(255) NOT NULL,
  `texto_slider` varchar(255) DEFAULT NULL,
  `texto_btn` varchar(255) DEFAULT NULL,
  `url_btn` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_usr` int(10) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sliders` */

LOCK TABLES `sliders` WRITE;

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_users` int(10) NOT NULL AUTO_INCREMENT,
  `id_rol_user` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `token_user` varchar(500) NOT NULL,
  `date_registered` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id_users`,`id_rol_user`,`name`,`username`,`password`,`first_name`,`last_name`,`token_user`,`date_registered`,`status`) values (1,1,'SuperAdmin','admin@admin.com','7bbc5dbe5bb39c1faf54d2f491bd5cde','SuperAdmin',NULL,'AxRX7SE2019-06-24 21:13:00VP17','2019-06-24 10:09:26',1);

UNLOCK TABLES;

/*Table structure for table `users_rol` */

DROP TABLE IF EXISTS `users_rol`;

CREATE TABLE `users_rol` (
  `id_users_rol` int(10) NOT NULL AUTO_INCREMENT,
  `name_rol` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_registered` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_users_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `users_rol` */

LOCK TABLES `users_rol` WRITE;

insert  into `users_rol`(`id_users_rol`,`name_rol`,`date_registered`,`status`) values (1,'SuperAdmin','2019-06-24 10:08:08',1),(2,'Admin','2019-06-24 10:08:16',1),(3,'Publico','2019-06-24 10:08:33',1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
