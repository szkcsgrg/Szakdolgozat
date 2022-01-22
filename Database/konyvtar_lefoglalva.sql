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
-- Table structure for table `lefoglalva`
--

DROP TABLE IF EXISTS `lefoglalva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lefoglalva` (
  `lefoglalvaID` int NOT NULL AUTO_INCREMENT,
  `emailID` varchar(100) NOT NULL,
  `konyvID` int NOT NULL,
  `foglalasKezdete` varchar(45) NOT NULL,
  `foglalasVege` varchar(45) NOT NULL,
  `lefoglalva` int NOT NULL,
  PRIMARY KEY (`lefoglalvaID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lefoglalva`
--

LOCK TABLES `lefoglalva` WRITE;
/*!40000 ALTER TABLE `lefoglalva` DISABLE KEYS */;
INSERT INTO `lefoglalva` VALUES (15,'szkcsgrg@gmail.com',16,'2022.01.03','2022.01.10',2),(16,'szkcsgrg@gmail.com',11,'2022.01.04','2022.01.11',2),(17,'petrapalnatali@icloud.com',5,'2022.01.07','2022.01.14',2),(18,'petrapalnatali@icloud.com',12,'2022.01.07','2022.01.14',2),(19,'konyvtaros@konyvtar.hu',13,'2022.01.20','2022.01.27',1);
/*!40000 ALTER TABLE `lefoglalva` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-22 10:50:17
