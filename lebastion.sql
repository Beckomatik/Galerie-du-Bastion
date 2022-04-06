-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table galeriedubastion.admins : ~2 rows (environ)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `firstname`, `lastname`, `mdp`, `email`, `created_at`) VALUES
	(1, 'Alan', 'Dauphin', '$2y$10$eZ1CFAD4StljXqiIJxIwyuqFrH037txcHgApzpyFA3zaADXvDPicO', 'alandauphin@hotmail.fr', '2022-03-31 10:35:42'),
	(2, 'John', 'Doe', '$2y$10$h1yju8rahkWE27wKLpOj3.ElasgxBSbvlMRpzxoN7kGDVminChkXq', 'jane@contact.fr', '2022-03-31 10:36:37');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Listage des données de la table galeriedubastion.blogposts : ~0 rows (environ)
/*!40000 ALTER TABLE `blogposts` DISABLE KEYS */;
/*!40000 ALTER TABLE `blogposts` ENABLE KEYS */;

-- Listage des données de la table galeriedubastion.comments : ~0 rows (environ)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Listage des données de la table galeriedubastion.contacts : ~0 rows (environ)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `fullname`, `mail`, `phone`, `objet`, `content`, `created_at`) VALUES
	(5, 'Girafou', 'girafou@contact.fr', '33333', 'date de livraison', 'Bonjour, pouvez vous m&#039;indiquer une date de livraison svp?', '2022-03-25 12:41:18'),
	(6, 'rgrrg', 'gr@contact.fr', '1111', 'obj', 'egeg', '2022-03-31 09:47:04');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Listage des données de la table galeriedubastion.portfolios : ~3 rows (environ)
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` (`id`, `picture`, `title`, `category`, `alt`, `created_at`) VALUES
	(18, 'annie-spratt-rjIacQc-uYs-unsplash.jpg', 'Nuances de vert 1/3', 'nature', 'fougères, plante verte', '2022-04-04 14:55:07'),
	(19, 'jonatan-pie-EvKBHBGgaUo-unsplash.jpg', 'Nuances de vert 2/2', 'Paysage', 'landscape photography, aurores boreales, scandinavie', '2022-04-04 14:56:37'),
	(20, 'rebecca-orlov-epic-playdate-HGVtA1zSHo4-unsplash.jpg', 'Nuances de vert 3/3', 'Textures', 'textures vertes', '2022-04-04 14:57:12');
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
