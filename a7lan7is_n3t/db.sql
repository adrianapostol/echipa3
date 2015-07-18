-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for atlantis
CREATE DATABASE IF NOT EXISTS `atlantis` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `atlantis`;


-- Dumping structure for table atlantis.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `name` varchar(50) NOT NULL,
  `group_link` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table atlantis.groups: ~11 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`name`, `group_link`, `location`, `category_name`, `created_at`) VALUES
    ('007', 'skype://', 'Iasi', 'movies', 1437228089),
    ('avengers', 'skype://', 'iasi', 'movies', 1437227625),
    ('Dr. Who', 'skype:?chat&blob=3pPWmhFUcnaUXdQ2yMn6ReSVJh9COaWXd', 'Bucharest', 'movies', 1437222238),
    ('Dr. Who Iasi', 'skype:?chat&blob=3pPWmhFUcnaUXdQ2yMn6ReSVJh9COaWXd', 'Iasi', 'movies', 1437222247),
    ('Dragon Ball', 'skype://', 'Timisoara', 'anime', 1437226393),
    ('hackaton', 'skype:?chat&blob=p2TIhCkoRLc1azdO1c_g9nzAp2VMzAcuO', 'Iasi', 'funTimes', 1437228503),
    ('hackatonTestGroup', 'skype:?chat&blob=TlWNj3lpEJPUYjwIkUiWyr7xQB1aT27Q3', 'Timisoara', 'QA', 1437232367),
    ('hackatonTestGroup2', 'skype:?chat&blob=9JjYFu0hFp0sWEcD3SuIeBohwsetIaFz4', 'Iasi', 'QA', 1437232463),
    ('Star Wars', 'skype://', 'Iasi', 'movies', 1437222250),
    ('Stargate', 'skype://', 'Iasi', 'movies', 1437225523),
    ('TestersUnite', 'skype:?chat&blob=tM3b0QFjDrrOwbCXT5-2m3ZwgSY9MzmRa', 'Iasi', 'QA', 1437227943);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table atlantis.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_name` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `join_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table atlantis.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_name`, `id`, `group_name`, `join_date`) VALUES
    ('atcrip', 1, 'avengers', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
