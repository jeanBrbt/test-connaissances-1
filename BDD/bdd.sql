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

-- Listage des données de la table test_ivs_jean2.building : ~8 rows (environ)
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
INSERT INTO `building` (`id`, `id_organisation_id`, `nom`, `zipcode`) VALUES
	(1, 4, 'Building_A2', '1'),
	(2, 4, 'Building_A3', '2'),
	(3, 1, 'Building_B1', '3'),
	(4, 1, 'Building_B2', '4'),
	(5, 1, 'Building_B3', '5'),
	(6, 2, 'Building_C1', '6'),
	(7, 2, 'Building_C2', '7'),
	(8, 2, 'Building_C3', '8'),
	(10, 4, 'Building_A1', '0');
/*!40000 ALTER TABLE `building` ENABLE KEYS */;

-- Listage des données de la table test_ivs_jean2.doctrine_migration_versions : ~2 rows (environ)
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20220505103744', '2022-05-05 10:38:14', 206),
	('DoctrineMigrations\\Version20220505104532', '2022-05-05 10:45:44', 67);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage des données de la table test_ivs_jean2.organisation : ~2 rows (environ)
/*!40000 ALTER TABLE `organisation` DISABLE KEYS */;
INSERT INTO `organisation` (`id`, `nom`) VALUES
	(1, 'Organisation_B'),
	(2, 'Organisation_C'),
	(4, 'Organisation_A');
/*!40000 ALTER TABLE `organisation` ENABLE KEYS */;

-- Listage des données de la table test_ivs_jean2.piece : ~27 rows (environ)
/*!40000 ALTER TABLE `piece` DISABLE KEYS */;
INSERT INTO `piece` (`id`, `id_building_id`, `nom`, `personnes_presentes`) VALUES
	(1, 10, 'Building_A1_1', 2),
	(2, 10, 'Building_A1_2', 5),
	(3, 10, 'Building_A1_3', 10),
	(4, 1, 'Building_A2_1', 12),
	(5, 1, 'Building_A2_2', 2),
	(6, 1, 'Building_A2_3', 8),
	(7, 2, 'Building_A3_1', 9),
	(8, 2, 'Building_A3_3', 17),
	(9, 3, 'Building_B1_1', 50),
	(10, 3, 'Building_B1_2', 100),
	(11, 3, 'Building_B1_3', 200),
	(12, 4, 'Building_B2_1', 1),
	(13, 4, 'Building_B2_2', 0),
	(14, 4, 'Building_B2_3', 3),
	(15, 5, 'Building_B3_1', 50),
	(16, 5, 'Building_B3_2', 60),
	(17, 5, 'Building_B3_3', 30),
	(18, 6, 'Building_C1_1', 12),
	(19, 6, 'Building_C1_2', 15),
	(20, 6, 'Building_C1_3', 4),
	(21, 7, 'Building_C2_1', 54),
	(22, 7, 'Building_C2_2', 111),
	(23, 7, 'Building_C2_3', 200),
	(24, 8, 'Building_C3_1', 1),
	(25, 8, 'Building_C3_2', 8),
	(26, 8, 'Building_C3_3', 9),
	(27, 2, 'Building_A3_2', 0);
/*!40000 ALTER TABLE `piece` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
