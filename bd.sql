-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour tp_php_sio1
CREATE DATABASE IF NOT EXISTS `tp_php_sio1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tp_php_sio1`;

-- Listage de la structure de table tp_php_sio1. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id_category`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table tp_php_sio1.category : ~2 rows (environ)
DELETE FROM `category`;
INSERT INTO `category` (`id_category`, `libelle`) VALUES
	(1, 'Promotion'),
	(2, 'Information');

-- Listage de la structure de table tp_php_sio1. news
CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text,
  `fk_category` int NOT NULL,
  PRIMARY KEY (`id_news`),
  KEY `FK__categorie` (`fk_category`) USING BTREE,
  CONSTRAINT `FK_news_category` FOREIGN KEY (`fk_category`) REFERENCES `category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table tp_php_sio1.news : ~4 rows (environ)
DELETE FROM `news`;
INSERT INTO `news` (`id_news`, `titre`, `description`, `fk_category`) VALUES
	(1, 'Premiere news', NULL, 1),
	(2, 'Deuxième news', NULL, 2),
	(3, 'Troisieme', NULL, 1),
	(4, 'ghhjklm', NULL, 1);

-- Listage de la structure de table tp_php_sio1. news_user
CREATE TABLE IF NOT EXISTS `news_user` (
  `fk_news` int NOT NULL,
  `fk_user` int NOT NULL,
  `note` int DEFAULT NULL,
  PRIMARY KEY (`fk_news`,`fk_user`) USING BTREE,
  KEY `FK__category` (`fk_user`) USING BTREE,
  CONSTRAINT `FK_news_user_news` FOREIGN KEY (`fk_news`) REFERENCES `news` (`id_news`),
  CONSTRAINT `FK_news_user_user` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table tp_php_sio1.news_user : ~0 rows (environ)
DELETE FROM `news_user`;
INSERT INTO `news_user` (`fk_news`, `fk_user`, `note`) VALUES
	(1, 1, 5),
	(1, 2, 4),
	(2, 2, 4);

-- Listage de la structure de table tp_php_sio1. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table tp_php_sio1.user : ~1 rows (environ)
DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `login`, `password`, `is_admin`) VALUES
	(1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
	(2, 'user', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
