-- MySQL dump 10.13  Distrib 8.0.27, for macos11 (x86_64)
--
-- Host: localhost    Database: konyvtar
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kolcsonzok`
--

DROP TABLE IF EXISTS `kolcsonzok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kolcsonzok` (
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `vezeteknev` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `keresztnev` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `felhasznalonev` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `jelszo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `adminE` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci DEFAULT NULL COMMENT 'Null => User , 0 => Konyvtaros , 1 => Admin',
  `aktivE` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci DEFAULT NULL COMMENT 'Null => Aktiv , 0 => Inaktiv , 1 => Torolt',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kolcsonzok`
--

LOCK TABLES `kolcsonzok` WRITE;
/*!40000 ALTER TABLE `kolcsonzok` DISABLE KEYS */;
INSERT INTO `kolcsonzok` VALUES ('Ivettke@gmail.com','Nagy','Ivett','Nagy Ivett','0268f92036d98098002f361d88aadcf4b09fc1a0',NULL,NULL),('konyvtaros@konyvtar.hu','Könyvtáros','Marika','Könyvtáros Marika','b08d73b69d550bfa49fb2ebbe0a191c4a4b67c17','1',NULL),('petrapalnatali@icloud.com','Pál','Petra','Pál Petra','f0f1477661f7c5496d8960169fdf0d7e02d8e53a',NULL,NULL),('szkcsgrg@gmail.com','Szakács','Gergő','Anonymus','0268f92036d98098002f361d88aadcf4b09fc1a0',NULL,NULL),('tesztelek@gmail.com','Teszt','Elek','Teszt Elek','0268f92036d98098002f361d88aadcf4b09fc1a0',NULL,NULL);
/*!40000 ALTER TABLE `kolcsonzok` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-06 17:59:53
