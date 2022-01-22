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
-- Table structure for table `velemenyek`
--

DROP TABLE IF EXISTS `velemenyek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `velemenyek` (
  `velemenyID` int NOT NULL AUTO_INCREMENT,
  `emailID` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `konyvID` varchar(45) NOT NULL,
  `velemeny` varchar(200) NOT NULL,
  `datum` varchar(45) NOT NULL,
  `allowed` int DEFAULT NULL,
  PRIMARY KEY (`velemenyID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `velemenyek`
--

LOCK TABLES `velemenyek` WRITE;
/*!40000 ALTER TABLE `velemenyek` DISABLE KEYS */;
INSERT INTO `velemenyek` VALUES (16,'tesztelek@gmail.com','5','Az eleje furan indul, de a végére nagyon izgalmas lett.','2021.11.30',1),(17,'tesztelek@gmail.com','11','Jó volt. Ajánlom.','2021.11.30',0),(22,'tesztelek@gmail.com','13','Nagyon pacek volt.','2021.11.30',1),(25,'szkcsgrg@gmail.com','5','Jó','2021.12.02',0),(35,'szkcsgrg@gmail.com','5','Nem szerettem.','2021.12.14',NULL),(36,'szkcsgrg@gmail.com','5','Hát, olvastam már jobbat is.','2021.12.14',NULL),(37,'petrapalnatali@icloud.com','14','ok','2022.01.07',1);
/*!40000 ALTER TABLE `velemenyek` ENABLE KEYS */;
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
