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
-- Table structure for table `hirek`
--

DROP TABLE IF EXISTS `hirek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hirek` (
  `idhirek` int NOT NULL AUTO_INCREMENT,
  `tittle` varchar(45) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `editorID` varchar(45) NOT NULL,
  PRIMARY KEY (`idhirek`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hirek`
--

LOCK TABLES `hirek` WRITE;
/*!40000 ALTER TABLE `hirek` DISABLE KEYS */;
INSERT INTO `hirek` VALUES (5,'Felolvasás','Arday Géza legújabb műveit személyesen olvassa fel 2022.02.10-én.\r\n\r\nVárunk mindenkit szeretettel.','2022.01.21','konyvtaros@konyvtar.hu'),(6,'Felolvasás','Leiner Laura legújabb művét személyesen olvassa fel 2022.03.10-én.\r\n\r\nVárunk mindenkit szeretettel.','2022.01.21','konyvtaros@konyvtar.hu'),(8,'Baba-Mama program.','2022.02.01. 17:30-tól \r\n\r\nBaba-Mama program kerül megrendezésre, Tóth Eszter gyermek pedagógus vezénylésével.','2022.01.12','konyvtaros@konyvtar.hu'),(9,'A könyvtár zárva','Szeretett könyvtárunk \r\n2022.02.12-től 2022.02.14-ig \r\nzárva tartja ajtaját.','2022.01.21','konyvtaros@konyvtar.hu'),(10,'Felolvasás','Bikácsy Gergely legújabb műveit személyesen olvassa fel 2022.02.28-án.\r\n\r\nVárunk mindenkit szeretettel.','2021.12.21','konyvtaros@konyvtar.hu'),(12,'A könyvtár zárva','Szeretett könyvtárunk \r\n2022.02.02-től 2022.02.04-ig \r\nzárva tartja ajtaját.','2022.01.21','konyvtaros@konyvtar.hu');
/*!40000 ALTER TABLE `hirek` ENABLE KEYS */;
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
