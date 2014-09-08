-- --------------------------------------------------------
-- Сервер:                       127.0.0.1
-- Server version:               5.6.13-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Версія:              8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table xtech.tbl_migration
DROP TABLE IF EXISTS `tbl_migration`;
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.tbl_migration: ~16 rows (approximately)
DELETE FROM `tbl_migration`;
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1399455895),
	('m140507_090025_organizations', 1399455903),
	('m140507_094700_insert_organization', 1399456317),
	('m140507_112456_branches', 1399463670),
	('m140507_112643_insert_branches', 1399471149),
	('m140507_112959_departmens', 1399471249),
	('m140507_113034_insert_departmens', 1399471249),
	('m140507_113458_cabinets', 1399471249),
	('m140507_113510_insert_cabinets', 1399471249),
	('m140507_141128_employees', 1399473324),
	('m140507_142642_insert_employee', 1399473324),
	('m140507_143643_type_dev', 1399473736),
	('m140507_143657_ins_type_dev', 1399473736),
	('m140508_082448_devices', 1399539187),
	('m140508_083633_device_pc', 1399539187),
	('m140508_114310_users', 1399549639),
	('m140515_070545_ins_dev', 1400138373),
	('m140515_073309_ins_devpc', 1400139386);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;


-- Dumping structure for table xtech.t_branches
DROP TABLE IF EXISTS `t_branches`;
CREATE TABLE IF NOT EXISTS `t_branches` (
  `id_branch` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_organization` int(2) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `telephones` varchar(255) DEFAULT NULL,
  `emails` varchar(500) DEFAULT NULL,
  `www` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_branch`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_branches: ~1 rows (approximately)
DELETE FROM `t_branches`;
/*!40000 ALTER TABLE `t_branches` DISABLE KEYS */;
INSERT INTO `t_branches` (`id_branch`, `name`, `id_organization`, `description`, `telephones`, `emails`, `www`, `address`) VALUES
	(2, 'Миру 27', 1, 'Branch on Mira', '40977', 'pfu@i.ua', 'www.pfu.dp.ua', '52501, Sinelnikovo, Mira, 27'),
	(3, 'Енгельса 3а', 1, 'Branch on Engelsa street', '41382', 'pfupp@i.ua', '', '52500, Sinelnikovo, Engelsa, 3a'),
	(4, 'К.Маркса', 2, 'фыуацуа', '', '', '', ''),
	(5, 'кпукпукпукпукпукп укп укп укп', 2, '', '', '', '', '');
/*!40000 ALTER TABLE `t_branches` ENABLE KEYS */;


-- Dumping structure for table xtech.t_cabinets
DROP TABLE IF EXISTS `t_cabinets`;
CREATE TABLE IF NOT EXISTS `t_cabinets` (
  `id_cabinet` int(2) NOT NULL AUTO_INCREMENT,
  `id_department` int(2) DEFAULT NULL,
  `number` varchar(20) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `telephones` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cabinet`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_cabinets: ~5 rows (approximately)
DELETE FROM `t_cabinets`;
/*!40000 ALTER TABLE `t_cabinets` DISABLE KEYS */;
INSERT INTO `t_cabinets` (`id_cabinet`, `id_department`, `number`, `description`, `telephones`) VALUES
	(1, 1, '9a', 'servers room', NULL),
	(2, 1, '9', 'second floor', '4-06-92'),
	(3, 2, '8', 'zagal', '4-11-62'),
	(4, 2, '11', 'zagal nach', '4-06-18'),
	(5, 3, '1', 'цуацуа', ''),
	(6, 4, '344', '', '');
/*!40000 ALTER TABLE `t_cabinets` ENABLE KEYS */;


-- Dumping structure for table xtech.t_departmens
DROP TABLE IF EXISTS `t_departmens`;
CREATE TABLE IF NOT EXISTS `t_departmens` (
  `id_department` int(2) NOT NULL AUTO_INCREMENT,
  `id_branch` int(2) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `telephones` varchar(255) DEFAULT NULL,
  `emails` varchar(500) DEFAULT NULL,
  `boss` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_department`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_departmens: ~4 rows (approximately)
DELETE FROM `t_departmens`;
/*!40000 ALTER TABLE `t_departmens` DISABLE KEYS */;
INSERT INTO `t_departmens` (`id_department`, `id_branch`, `name`, `description`, `telephones`, `emails`, `boss`) VALUES
	(1, 2, 'ispz', 'ispz department', '40692', NULL, NULL),
	(2, 2, 'zagal', 'zagal department', '41162', NULL, NULL),
	(3, 3, 'zvern', 'zvern department', '43045', NULL, NULL),
	(4, 4, 'укпукпукпукпукпукп', '', '', '', NULL),
	(5, 5, 'укпукпукпукп', '', '', '', NULL);
/*!40000 ALTER TABLE `t_departmens` ENABLE KEYS */;


-- Dumping structure for table xtech.t_devices
DROP TABLE IF EXISTS `t_devices`;
CREATE TABLE IF NOT EXISTS `t_devices` (
  `id_device` int(11) NOT NULL AUTO_INCREMENT,
  `id_employee` int(2) DEFAULT NULL,
  `id_type` int(2) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `inv_number` int(11) DEFAULT NULL,
  `sn` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `end_varantly_yesr` int(11) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `expluatation` tinyint(1) DEFAULT NULL,
  `expluatation_data` date DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL,
  `break` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_device`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_devices: ~12 rows (approximately)
DELETE FROM `t_devices`;
/*!40000 ALTER TABLE `t_devices` DISABLE KEYS */;
INSERT INTO `t_devices` (`id_device`, `id_employee`, `id_type`, `name`, `description`, `inv_number`, `sn`, `year`, `end_varantly_yesr`, `service`, `expluatation`, `expluatation_data`, `private`, `break`) VALUES
	(1, 1, 2, 'bms', 'desc 1', 1130100, 'AA100', 2008, 2009, 'dervice BMS1', 1, '2008-12-14', 0, 0),
	(2, 1, 1, 'lg flatroneeeee', 'descwefwefwef', 1130101, 'BB100', 2008, 2009, 'dervice LG', 1, '2008-12-14', 0, 0),
	(4, 4, 3, 'asus', 'bad book', 10480098, 'sa1564785112', 2013, 2015, 'asus', 1, '2013-10-16', 0, 0),
	(5, 1, 11, 'a4tech', '', 10450085, 'wefwefwef', 2012, 2012, '', 1, '2011-07-08', 0, 0),
	(6, 3, 6, 'zerox a3', 'regergerg', 2147483647, '456456456', 2012, 2013, 'rthrtht', 1, '2013-07-31', 0, 0),
	(7, 3, 2, 'bms', 'weqdwefwe', 45345, 'trhtrh', 2014, 2019, 'rthtrhtrh', 1, '2014-07-02', 0, 0),
	(9, 3, 2, 'bms', 'ewfwefwef', 45345, '345345', 2014, 2019, '34t34t', 0, '0000-00-00', 0, 0),
	(20, 3, 2, 'dfgdfg', 'dfgfg', 56456, '456456', 2014, 2019, '4564545fbdb', 0, '0000-00-00', 0, 0),
	(22, 2, 1, 'lg', 'descr', 1048002, 'df8845654', 2010, 2011, 'lg sc', 1, '2010-01-01', 0, 0),
	(23, 2, 11, 'a4tech', 'descr', NULL, '', 2010, 2010, '', 1, '0000-00-00', 0, 0),
	(24, 2, 12, 'a4tech', 'descr', NULL, '', 2010, 2010, '', 1, '0000-00-00', 0, 0),
	(25, 4, 1, 'erge', 'ergeg', 435345, 'ergerg56', 2014, 2019, 'e5hthrth', 1, '2014-09-01', 0, 0),
	(26, 3, 2, 'trhtrh', 'trhrth', 476567, '567567', 2014, 2019, 'tyjtyj', 1, '2014-08-13', 0, 0),
	(27, 4, 1, 'ergeg', 'ggergeerg', 345645645, 'hth 67567', 2014, 2019, 'hrehr', 1, '2014-08-06', 0, 0);
/*!40000 ALTER TABLE `t_devices` ENABLE KEYS */;


-- Dumping structure for table xtech.t_devices_types
DROP TABLE IF EXISTS `t_devices_types`;
CREATE TABLE IF NOT EXISTS `t_devices_types` (
  `id_device_type` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_device_type`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_devices_types: ~12 rows (approximately)
DELETE FROM `t_devices_types`;
/*!40000 ALTER TABLE `t_devices_types` DISABLE KEYS */;
INSERT INTO `t_devices_types` (`id_device_type`, `name`, `description`) VALUES
	(1, 'Монітор', 'description of monitors'),
	(2, 'Системний блок', 'description of monitors'),
	(3, 'Ноутбук', 'description of monitors'),
	(4, 'Принтер', 'description of monitors'),
	(5, 'ДБЖ', 'description of monitors'),
	(6, 'Копіювальний апарат', 'description of monitors'),
	(7, 'Телефонний апарат', 'description of monitors'),
	(8, 'Хаб', 'description of monitors'),
	(9, 'Свіч', 'description of monitors'),
	(10, 'Модем', 'description of monitors'),
	(11, 'Клавіатура', 'description of monitors'),
	(12, 'Маніпулятор миша', 'description of monitors');
/*!40000 ALTER TABLE `t_devices_types` ENABLE KEYS */;


-- Dumping structure for table xtech.t_device_pc
DROP TABLE IF EXISTS `t_device_pc`;
CREATE TABLE IF NOT EXISTS `t_device_pc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_device_pc` int(11) DEFAULT NULL,
  `mb` varchar(255) DEFAULT NULL,
  `cpu_name` varchar(255) DEFAULT NULL,
  `cpu_p` double DEFAULT NULL,
  `hdd_name` varchar(255) DEFAULT NULL,
  `hdd_p` double DEFAULT NULL,
  `ram_name` varchar(255) DEFAULT NULL,
  `ram_p` double DEFAULT NULL,
  `video_name` varchar(255) DEFAULT NULL,
  `video_p` int(11) DEFAULT NULL,
  `cdrom_name` varchar(255) DEFAULT NULL,
  `lan_name` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `net_name` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_t_device_pc_t_devices` (`id_device_pc`),
  CONSTRAINT `FK_t_device_pc_t_devices` FOREIGN KEY (`id_device_pc`) REFERENCES `t_devices` (`id_device`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_device_pc: ~3 rows (approximately)
DELETE FROM `t_device_pc`;
/*!40000 ALTER TABLE `t_device_pc` DISABLE KEYS */;
INSERT INTO `t_device_pc` (`id`, `id_device_pc`, `mb`, `cpu_name`, `cpu_p`, `hdd_name`, `hdd_p`, `ram_name`, `ram_p`, `video_name`, `video_p`, `cdrom_name`, `lan_name`, `os`, `net_name`, `ip`) VALUES
	(1, 1, 'gigabyte 3a11122233456', 'intel', 1.6, 'maxtor', 250, 'hynix2', 1024, 'nvidia', 128, 'nec cd', 'realtek11122233333', 'windows 7 ultimate 9000', 'nach_ispz', '172.40.96.163'),
	(2, 20, 'dfgdfg', 'dfgfdg', 44, 'dfg', 456, 'dfgdfg', 34, 'dfgg', 45, 'dfg', 'gdf', 'dfg', 'd', ''),
	(3, 26, 'tyjtyj', 'tyj', 6, '', NULL, '', NULL, '', NULL, '', '', '', '', '');
/*!40000 ALTER TABLE `t_device_pc` ENABLE KEYS */;


-- Dumping structure for table xtech.t_employees
DROP TABLE IF EXISTS `t_employees`;
CREATE TABLE IF NOT EXISTS `t_employees` (
  `id_employee` int(11) NOT NULL AUTO_INCREMENT,
  `id_cabinet` int(2) DEFAULT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `telephones` varchar(255) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `tab_number` int(10) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pasp` varchar(255) DEFAULT NULL,
  `fired` tinyint(1) DEFAULT NULL,
  `dof` date DEFAULT NULL,
  PRIMARY KEY (`id_employee`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_employees: ~9 rows (approximately)
DELETE FROM `t_employees`;
/*!40000 ALTER TABLE `t_employees` DISABLE KEYS */;
INSERT INTO `t_employees` (`id_employee`, `id_cabinet`, `firstname`, `lastname`, `surname`, `description`, `telephones`, `post`, `email`, `login`, `tab_number`, `home_address`, `dob`, `pasp`, `fired`, `dof`) VALUES
	(1, 2, 'Galushko', 'Dmitro', 'Oleksandrovich', 'cool men', '0664297689', NULL, 'sinelnikovodima@mail.ru', 'jazzz', 111, 'USSR', '1983-04-05', 'AK 156156', 0, NULL),
	(2, 2, 'Monah', 'San', 'Vas', 'the', '0661565648', NULL, 'mon@mail.ru', 'monah', 222, 'USA', '1980-05-15', 'AK 555555', 0, NULL),
	(3, 3, 'Zaika', 'Lil', 'Sergo', 'girl', '05648548545', NULL, 'mail@mail.ru', 'lilo', 333, 'USSR', '1983-04-05', 'AK 156156', 0, NULL),
	(4, 4, 'Reutova', 'Luda', 'Oleksandrovich', 'the', '0664297689', NULL, 'luda@mail.ru', 'reut', 4444, 'USSR', '1983-04-05', 'AK 156156', 0, NULL),
	(5, NULL, 'a', 'b', 'c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, NULL, 'aa', 'bb', 'cc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 3, 'John', 'Ivan', 'Petrovich', '', '', '', '', '', NULL, '', '0000-00-00', '', 0, '0000-00-00'),
	(8, 5, 'йцвйц', 'йцвйц', 'йцвйцв', '', '', '', '', '', NULL, '', '0000-00-00', '', 0, '0000-00-00'),
	(9, 6, 'кккккккккккккк', 'ккккккккккккккк', 'кккккккккккккккк', 'впвап', '', '', '', '', NULL, '', '0000-00-00', '', 0, '0000-00-00'),
	(10, NULL, 'zcsa', 'ascas', 'ascasc', 'ascasc', '3453', NULL, '', 'sdfgsdf', 345345345, '', '0000-00-00', 'df 34545', 0, '0000-00-00');
/*!40000 ALTER TABLE `t_employees` ENABLE KEYS */;


-- Dumping structure for table xtech.t_organizations
DROP TABLE IF EXISTS `t_organizations`;
CREATE TABLE IF NOT EXISTS `t_organizations` (
  `id_organization` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `telephones` varchar(255) DEFAULT NULL,
  `emails` varchar(500) DEFAULT NULL,
  `www` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `boss` int(10) DEFAULT NULL,
  `buh` int(10) DEFAULT NULL,
  `okpo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_organization`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_organizations: ~3 rows (approximately)
DELETE FROM `t_organizations`;
/*!40000 ALTER TABLE `t_organizations` DISABLE KEYS */;
INSERT INTO `t_organizations` (`id_organization`, `name`, `description`, `telephones`, `emails`, `www`, `address`, `boss`, `buh`, `okpo`) VALUES
	(1, 'УПФУ в м. Синельниковому та Синельниківському районі', 'Pens fond of Ukraine is very big big big organization111111111', '0664297689, 40692, 40429', 'pfumail44@mail.com', 'http://www.pfusin.gov.ua', '52500, Sinelnikovo, Mira, 27', 3, 2, '15646761'),
	(2, 'ПФУ в Дніпропетровській області', 'la la la', '1567895', 'gupfu@obl.ua', '', '49000, Dnepropetrovsk', NULL, NULL, '12345678'),
	(4, 'Управління Пенсійного фонду України в м. Синельниковому та Синельниківському районі', '', '4-07-90, 4-11-76, 4-29-19', 'pfusin54@i.ua', '', '27, вул.Миру, м.Синельникове, Дніпропетровська обл., 52501', NULL, NULL, '37741841');
/*!40000 ALTER TABLE `t_organizations` ENABLE KEYS */;


-- Dumping structure for table xtech.t_users
DROP TABLE IF EXISTS `t_users`;
CREATE TABLE IF NOT EXISTS `t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `salt` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `profile` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_users: ~1 rows (approximately)
DELETE FROM `t_users`;
/*!40000 ALTER TABLE `t_users` DISABLE KEYS */;
INSERT INTO `t_users` (`id`, `username`, `password`, `salt`, `email`, `profile`) VALUES
	(1, 'admin', 'admin', NULL, '', NULL);
/*!40000 ALTER TABLE `t_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
