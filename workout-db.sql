-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for workout-db
CREATE DATABASE IF NOT EXISTS `workout-db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `workout-db`;

-- Dumping structure for table workout-db.area
CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table workout-db.area: ~3 rows (approximately)
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`id`, `area`) VALUES
	(1, 'lower body'),
	(2, 'core'),
	(3, 'upper body');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;

-- Dumping structure for table workout-db.combination
CREATE TABLE IF NOT EXISTS `combination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area1` int(11) DEFAULT NULL,
  `area2` int(11) DEFAULT NULL,
  `area3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table workout-db.combination: ~6 rows (approximately)
/*!40000 ALTER TABLE `combination` DISABLE KEYS */;
INSERT INTO `combination` (`id`, `area1`, `area2`, `area3`) VALUES
	(1, 1, 2, 3),
	(2, 1, 3, 2),
	(3, 2, 1, 3),
	(4, 2, 3, 1),
	(5, 3, 1, 2),
	(6, 3, 2, 1);
/*!40000 ALTER TABLE `combination` ENABLE KEYS */;

-- Dumping structure for table workout-db.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table workout-db.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
	(1, 'joe', 'joe@gmail.com', '8FF32489F92F33416694BE8FDC2D4C22'),
	(2, 'michael', 'michael@gmail.com', '0acf4539a14b3aa27deeb4cbdf6e989f');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table workout-db.user_combination_completed
CREATE TABLE IF NOT EXISTS `user_combination_completed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `combination_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table workout-db.user_combination_completed: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_combination_completed` DISABLE KEYS */;
INSERT INTO `user_combination_completed` (`id`, `user_id`, `combination_id`) VALUES
	(1, 2, 4),
	(2, 2, 3),
	(3, 2, 2);
/*!40000 ALTER TABLE `user_combination_completed` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
