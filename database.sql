-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               5.5.24 - MySQL Community Server (GPL)
-- Server Betriebssystem:        Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Exportiere Datenbank Struktur für form
CREATE DATABASE IF NOT EXISTS `form` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `form`;


-- Exportiere Struktur von Tabelle form.states
CREATE TABLE IF NOT EXISTS `states` (
  `ID` int(2) NOT NULL,
  `LAND_ID` smallint(3) NOT NULL,
  `STATE` char(2) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportiere Daten aus Tabelle form.states: ~27 rows (ungefähr)
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` (`ID`, `LAND_ID`, `STATE`, `DESCRIPTION`) VALUES
	(1, 55, 'AC', 'ACRE'),
	(2, 55, 'AL', 'ALAGOAS'),
	(3, 55, 'AP', 'AMAPA'),
	(4, 55, 'AM', 'AMAZONAS'),
	(5, 55, 'BA', 'BAHIA'),
	(6, 55, 'CE', 'CEARA'),
	(7, 55, 'DF', 'DISTRITO FEDERAL'),
	(8, 55, 'ES', 'ESPIRITO SANTO'),
	(9, 55, 'GO', 'GOIAS'),
	(10, 55, 'MA', 'MARANHAO'),
	(11, 55, 'MT', 'MATO GROSSO'),
	(12, 55, 'MS', 'MATO GROSSO DO SUL'),
	(13, 55, 'MG', 'MINAS GERAIS'),
	(14, 55, 'PA', 'PARA'),
	(15, 55, 'PB', 'PARAIBA'),
	(16, 55, 'PR', 'PARANA'),
	(17, 55, 'PE', 'PERNAMBUCO'),
	(18, 55, 'PI', 'PIAUI'),
	(19, 55, 'RJ', 'RIO DE JANEIRO'),
	(20, 55, 'RN', 'RIO GRANDE DO NORTE'),
	(21, 55, 'RS', 'RIO GRANDE DO SUL'),
	(22, 55, 'RO', 'RONDONIA'),
	(23, 55, 'RR', 'RORAIMA'),
	(24, 55, 'SC', 'SANTA CATARINA'),
	(25, 55, 'SP', 'SAO PAULO'),
	(26, 55, 'SE', 'SERGIPE'),
	(27, 55, 'TO', 'TOCANTINS');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;


-- Exportiere Struktur von Tabelle form.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` tinytext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `user_level` int(1) NOT NULL DEFAULT '1',
  `user_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `address` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `city` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `state` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `telephone` varchar(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `cellphone` varchar(14) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `presentation` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `include_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `approved` int(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `banned` int(1) NOT NULL DEFAULT '0',
  `ckey` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ctime` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`user_email`),
  FULLTEXT KEY `idx_search` (`full_name`,`address`,`user_email`,`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle form.users: 3 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `full_name`, `user_name`, `user_email`, `user_level`, `user_password`, `address`, `city`, `state`, `country`, `telephone`, `cellphone`, `presentation`, `image`, `include_date`, `update_date`, `approved`, `activation_code`, `banned`, `ckey`, `ctime`) VALUES
	(1, '', 'Administrador', 'admin@localhost.com', 5, '4c09e75fa6fe36038ac240e9e4e0126cedef6d8c85cf0a1ae', '', '', '', '', '', '', '', '', '2014-10-16 01:03:41', '0000-00-00 00:00:00', 1, 'FgxzHwRrpn', 0, '', ''),
	(4, 'MARCIO AUGUSTO SCHLOSSER', 'NemesisCT', 'marcio_augusto_09@hotmail.com', 2, 'n3m3515062', 'GENERAL FRANCISCO PHIENATTO', 'BLUMENAU', 'SANTA CATARINA', 'BRASIL', '(99) 9999-9999', '(99) 9999-9999', 'Ola, Ã© um prazer poder fazer parte de uma rede completa e com muitas vantagens.', '1985-cbd7a0ae4f6095220e130a5383f9c589.jpg', '2014-10-16 01:07:00', '2014-10-16 20:16:02', 1, '9NYp6E8NZC', 0, '', ''),
	(6, '', 'Felipe', 'felipe.kt_@hotmail.com', 1, '12345678', '', '', '', '', '', '', '', '', '2014-10-14 19:06:40', '0000-00-00 00:00:00', 0, '4Un9CgKY3J', 0, '', '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
