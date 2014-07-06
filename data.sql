-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.3.0.4792
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for rum
CREATE DATABASE IF NOT EXISTS `rum` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rum`;


-- Dumping structure for table rum.rum_posts
CREATE TABLE IF NOT EXISTS `rum_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `text` text NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `flags` varchar(10) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parentId` (`parentId`),
  KEY `userId` (`userId`),
  FULLTEXT KEY `text` (`text`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table rum.rum_posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `rum_posts` DISABLE KEYS */;
INSERT INTO `rum_posts` (`id`, `parentId`, `userId`, `text`, `title`, `flags`, `created`) VALUES
	(1, -1, 1, '', 'Test category', 'CS', '2014-07-04 13:03:08');
/*!40000 ALTER TABLE `rum_posts` ENABLE KEYS */;


-- Dumping structure for table rum.rum_users
CREATE TABLE IF NOT EXISTS `rum_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `externalHandle` varchar(100) NOT NULL,
  `role` enum('user','mod','admin') NOT NULL DEFAULT 'user',
  `about` text NOT NULL,
  `joined` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table rum.rum_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `rum_users` DISABLE KEYS */;
INSERT INTO `rum_users` (`id`, `username`, `hash`, `mail`, `externalHandle`, `role`, `about`, `joined`) VALUES
	(1, 'test', '', 'test@example.com', '', 'user', 'not much', '2014-07-04 13:04:51');
/*!40000 ALTER TABLE `rum_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
