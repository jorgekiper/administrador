-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.21-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_intranet
CREATE DATABASE IF NOT EXISTS `db_intranet` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_intranet`;

-- Volcando estructura para tabla db_intranet.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id_proyecto` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_proyecto` varchar(255) DEFAULT NULL,
  `fecha_inicio_diseno` date DEFAULT NULL,
  `fecha_fin_diseno` date DEFAULT NULL,
  `horas_cotizadas_diseno` int(10) DEFAULT NULL,
  `fecha_inicio_front` date DEFAULT NULL,
  `fecha_fin_front` date DEFAULT NULL,
  `horas_cotizadas_front` int(10) DEFAULT NULL,
  `fecha_inicio_back` date DEFAULT NULL,
  `fecha_fin_back` date DEFAULT NULL,
  `horas_cotizadas_back` int(10) DEFAULT NULL,
  `horas_totales_reales` int(10) DEFAULT NULL,
  `tipo_proyecto` int(10) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_intranet.proyectos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;

-- Volcando estructura para tabla db_intranet.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(10) NOT NULL AUTO_INCREMENT,
  `id_rol_user` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `token_user` varchar(500) NOT NULL,
  `date_registered` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_intranet.users: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_users`, `id_rol_user`, `name`, `first_name`, `last_name`, `token_user`, `date_registered`, `username`, `password`, `status`) VALUES
	(1, 1, 'SuperAdmin', 'SuperAdmin', NULL, 'R7TaNSE2021-12-21 20:20:32VP17', '2019-06-24 10:09:26', 'admin@admin.com', 'f1759cc718b8f317fc17a847552d1267', 1),
	(2, 4, 'Gilberto', 'Ahuatzi', NULL, '', '2019-06-24 21:59:07', '', '', 0),
	(3, 4, 'Adolfo', 'Alvarez', NULL, '', '2019-06-24 22:01:25', 'adolfo.alvarez@edenred.com', '', 0),
	(4, 4, 'Alejandro', 'Campos', NULL, '', '2019-06-24 22:02:24', '', '', 0),
	(5, 4, 'Alejandro', 'Corona', NULL, '', '2019-06-24 22:03:42', '', '', 0),
	(6, 4, 'Alexis', 'Ospina', NULL, '', '2019-06-25 10:11:47', '', '', 0),
	(7, 4, 'Brigitte', 'Seumenicht', NULL, '', '2019-06-25 10:14:08', '', '', 0),
	(8, 4, 'Carlos', 'Cienfugos', NULL, '', '2019-06-25 10:39:43', '', '', 0),
	(9, 4, 'Carlos', 'García', NULL, '', '2019-06-25 10:44:47', '', '', 0),
	(10, 4, 'Damaris', 'Dávalos', NULL, '', '2019-06-25 10:48:35', '', '', 0),
	(11, 4, 'Daniel', 'González', 'Becerril', '', '2019-06-25 10:51:16', '', '', 0),
	(12, 4, 'Daniel Alejandro', 'Aguilar', NULL, '', '2019-06-25 10:58:19', '', '', 0),
	(13, 4, 'Dora', 'Salemi', NULL, '', '2019-06-25 11:00:21', '', '', 0),
	(14, 4, 'Elisa', 'Salemi', NULL, '', '2019-06-25 11:02:24', '', '', 0),
	(15, 4, 'Fernando', 'Anzures', NULL, '', '2019-06-25 11:03:39', '', '', 0),
	(16, 4, 'Fernando', 'Moroga', NULL, '', '2019-06-25 11:05:56', '', '', 0),
	(17, 4, 'Fernando', 'Alvarez', 'Kuri', '', '2019-06-25 11:07:42', '', '', 0),
	(18, 4, 'Gabriel', 'Richaud', NULL, '', '2019-06-25 11:09:56', '', '', 0),
	(19, 4, 'Gerardo', 'Saavedra', NULL, '', '2019-06-25 11:21:36', '', '', 0),
	(20, 4, 'Guillermo', 'Perezbolde', NULL, '', '2019-06-25 11:23:43', '', '', 0),
	(21, 4, 'Hans', 'Hatch', NULL, '', '2019-06-25 11:25:42', '', '', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla db_intranet.users_rol
CREATE TABLE IF NOT EXISTS `users_rol` (
  `id_users_rol` int(10) NOT NULL AUTO_INCREMENT,
  `name_rol` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_registered` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_users_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Volcando datos para la tabla db_intranet.users_rol: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users_rol` DISABLE KEYS */;
INSERT INTO `users_rol` (`id_users_rol`, `name_rol`, `date_registered`, `status`) VALUES
	(1, 'SuperAdmin', '2019-06-24 10:08:08', 1),
	(2, 'Admin', '2019-06-24 10:08:16', 1),
	(3, 'Publico', '2019-06-24 10:08:33', 1),
	(4, 'Jurado', '2019-06-24 21:58:18', 1);
/*!40000 ALTER TABLE `users_rol` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
