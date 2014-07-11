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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_branches: ~2 rows (approximately)
DELETE FROM `t_branches`;
/*!40000 ALTER TABLE `t_branches` DISABLE KEYS */;
INSERT INTO `t_branches` (`id_branch`, `name`, `id_organization`, `description`, `telephones`, `emails`, `www`, `address`) VALUES
	(2, 'mira', 1, 'Branch on Mira', '40977', 'pfu@i.ua', NULL, '52501, Sinelnikovo, Mira, 27'),
	(3, 'engelsa', 1, 'Branch on Engelsa street', '41382', 'pfupp@i.ua', NULL, '52500, Sinelnikovo, Engelsa, 3a');
/*!40000 ALTER TABLE `t_branches` ENABLE KEYS */;


-- Dumping structure for table xtech.t_cabinets
CREATE TABLE IF NOT EXISTS `t_cabinets` (
  `id_cabinet` int(2) NOT NULL AUTO_INCREMENT,
  `id_department` int(2) DEFAULT NULL,
  `number` varchar(20) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `telephones` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cabinet`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_cabinets: ~4 rows (approximately)
DELETE FROM `t_cabinets`;
/*!40000 ALTER TABLE `t_cabinets` DISABLE KEYS */;
INSERT INTO `t_cabinets` (`id_cabinet`, `id_department`, `number`, `description`, `telephones`) VALUES
	(1, 1, '9a', 'servers room', NULL),
	(2, 1, '9', 'second floor', '4-06-92'),
	(3, 2, '8', 'zagal', '4-11-62'),
	(4, 2, '11', 'zagal nach', '4-06-18');
/*!40000 ALTER TABLE `t_cabinets` ENABLE KEYS */;


-- Dumping structure for table xtech.t_departmens
CREATE TABLE IF NOT EXISTS `t_departmens` (
  `id_department` int(2) NOT NULL AUTO_INCREMENT,
  `id_branch` int(2) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `telephones` varchar(255) DEFAULT NULL,
  `emails` varchar(500) DEFAULT NULL,
  `boss` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_department`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_departmens: ~2 rows (approximately)
DELETE FROM `t_departmens`;
/*!40000 ALTER TABLE `t_departmens` DISABLE KEYS */;
INSERT INTO `t_departmens` (`id_department`, `id_branch`, `name`, `description`, `telephones`, `emails`, `boss`) VALUES
	(1, 2, 'ispz', 'ispz department', '40692', NULL, NULL),
	(2, 2, 'zagal', 'zagal department', '41162', NULL, NULL),
	(3, 3, 'zvern', 'zvern department', '43045', NULL, NULL);
/*!40000 ALTER TABLE `t_departmens` ENABLE KEYS */;


-- Dumping structure for table xtech.t_devices
CREATE TABLE IF NOT EXISTS `t_devices` (
  `id_device` int(11) NOT NULL AUTO_INCREMENT,
  `id_organization` int(2) DEFAULT NULL,
  `id_branch` int(2) DEFAULT NULL,
  `id_department` int(2) DEFAULT NULL,
  `id_cabinet` int(2) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_devices: ~5 rows (approximately)
DELETE FROM `t_devices`;
/*!40000 ALTER TABLE `t_devices` DISABLE KEYS */;
INSERT INTO `t_devices` (`id_device`, `id_organization`, `id_branch`, `id_department`, `id_cabinet`, `id_employee`, `id_type`, `name`, `description`, `inv_number`, `sn`, `year`, `end_varantly_yesr`, `service`, `expluatation`, `expluatation_data`, `private`, `break`) VALUES
	(1, 1, 2, 1, 2, 1, 2, 'bms', 'desc 1', 1130100, 'AA100', 2008, 2009, 'dervice BMS1', 1, '2008-12-14', 0, 0),
	(2, 1, 2, 1, 2, 1, 1, 'lg flatroneeeee', 'descwefwefwef', 1130101, 'BB100', 2008, 2009, 'dervice LG', 1, '2008-12-14', 0, 0),
	(3, 1, 2, 1, 2, 2, 3, 'xerox', 'such', 1130856, 'wefwef', 2010, 2011, NULL, 1, '2014-07-02', 0, 0),
	(4, 1, 2, 2, 4, 4, 3, 'asus', 'bad book', 10480098, 'sa1564785112', 2013, 2015, 'asus', 1, '2013-10-16', 0, 0),
	(5, 1, 2, 1, 2, 1, 11, 'a4tech', '', 10450085, 'wefwefwef', 2012, 2012, '', 1, '2011-07-08', 0, 0);
/*!40000 ALTER TABLE `t_devices` ENABLE KEYS */;


-- Dumping structure for table xtech.t_devices_types
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
	(1, 'monitor', 'description of monitors'),
	(2, 'pc', 'description of monitors'),
	(3, 'notebook', 'description of monitors'),
	(4, 'printer', 'description of monitors'),
	(5, 'ups', 'description of monitors'),
	(6, 'xerox', 'description of monitors'),
	(7, 'telephone', 'description of monitors'),
	(8, 'hub', 'description of monitors'),
	(9, 'switch', 'description of monitors'),
	(10, 'modem', 'description of monitors'),
	(11, 'keyboard', 'description of monitors'),
	(12, 'mouse', 'description of monitors');
/*!40000 ALTER TABLE `t_devices_types` ENABLE KEYS */;


-- Dumping structure for table xtech.t_device_pc
CREATE TABLE IF NOT EXISTS `t_device_pc` (
  `id` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_device_pc: ~1 rows (approximately)
DELETE FROM `t_device_pc`;
/*!40000 ALTER TABLE `t_device_pc` DISABLE KEYS */;
INSERT INTO `t_device_pc` (`id`, `id_device_pc`, `mb`, `cpu_name`, `cpu_p`, `hdd_name`, `hdd_p`, `ram_name`, `ram_p`, `video_name`, `video_p`, `cdrom_name`, `lan_name`, `os`, `net_name`, `ip`) VALUES
	(0, 1, 'gigabyte 3a11122233456', 'intel', 1.6, 'maxtor', 250, 'hynix2', 1024, 'nvidia', 256, 'nec cd', 'realtek11122233333', 'windows 7 ultimate 9000', 'nach_ispz', '172.40.96.163');
/*!40000 ALTER TABLE `t_device_pc` ENABLE KEYS */;


-- Dumping structure for table xtech.t_employees
CREATE TABLE IF NOT EXISTS `t_employees` (
  `id_employee` int(11) NOT NULL AUTO_INCREMENT,
  `id_organization` int(2) DEFAULT NULL,
  `id_branch` int(2) DEFAULT NULL,
  `id_department` int(2) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_employees: ~4 rows (approximately)
DELETE FROM `t_employees`;
/*!40000 ALTER TABLE `t_employees` DISABLE KEYS */;
INSERT INTO `t_employees` (`id_employee`, `id_organization`, `id_branch`, `id_department`, `id_cabinet`, `firstname`, `lastname`, `surname`, `description`, `telephones`, `post`, `email`, `login`, `tab_number`, `home_address`, `dob`, `pasp`, `fired`, `dof`) VALUES
	(1, 1, 2, 1, 2, 'Galushko', 'Dmitro', 'Oleksandrovich', 'cool men', '0664297689', NULL, 'sinelnikovodima@mail.ru', 'jazzz', 111, 'USSR', '1983-04-05', 'AK 156156', 0, NULL),
	(2, 1, 2, 1, 2, 'Monah', 'San', 'Vas', 'the', '0661565648', NULL, 'mon@mail.ru', 'monah', 222, 'USA', '1980-05-15', 'AK 555555', 0, NULL),
	(3, 1, 2, 2, 3, 'Zaika', 'Lil', 'Sergo', 'girl', '05648548545', NULL, 'mail@mail.ru', 'lilo', 333, 'USSR', '1983-04-05', 'AK 156156', 0, NULL),
	(4, 1, 2, 1, 4, 'Reutova', 'Luda', 'Oleksandrovich', 'the', '0664297689', NULL, 'luda@mail.ru', 'reut', 4444, 'USSR', '1983-04-05', 'AK 156156', 0, NULL);
/*!40000 ALTER TABLE `t_employees` ENABLE KEYS */;


-- Dumping structure for table xtech.t_organizations
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table xtech.t_organizations: ~0 rows (approximately)
DELETE FROM `t_organizations`;
/*!40000 ALTER TABLE `t_organizations` DISABLE KEYS */;
INSERT INTO `t_organizations` (`id_organization`, `name`, `description`, `telephones`, `emails`, `www`, `address`, `boss`, `buh`, `okpo`) VALUES
	(1, 'Pens fond of Ukraine', 'Pens fond of Ukraine is very big big big organization', '0664297689, 40692', 'pfumail@mail.com', 'http://www.pfusin.gov.ua', '52500, Sinelnikovo, Mira, 27', 0, 0, '1564676'),
	(2, 'Obl PFU', 'la la la', '1567895', 'gupfu@obl.ua', NULL, '49000, Dnepropetrovsk', NULL, NULL, '12345678');
/*!40000 ALTER TABLE `t_organizations` ENABLE KEYS */;


-- Dumping structure for table xtech.t_users
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
