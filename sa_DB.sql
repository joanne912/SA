-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: us-cdbr-east-03.cleardb.com    Database: heroku_cb1e0eb718e0348
-- ------------------------------------------------------
-- Server version	5.6.50-log

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
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcement` (
  `ANNOUNCEMENT_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_TITLE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_DATE` datetime(6) NOT NULL,
  `ANNOUNCEMENT_TYPE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_INC` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_CONTENT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_DOC` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ANNOUNCEMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `community`
--

DROP TABLE IF EXISTS `community`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `community` (
  `COMMUNITY_ID` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMMUNITY_CITY` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMMUNITY_DISTRICT` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMMUNITY_NAME` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`COMMUNITY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `community`
--

LOCK TABLES `community` WRITE;
/*!40000 ALTER TABLE `community` DISABLE KEYS */;
INSERT INTO `community` VALUES ('00001','桃園市','蘆竹區','冠倫台北');
/*!40000 ALTER TABLE `community` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities` (
  `FACILITIES_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMMUNITY_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_NAME` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_INTRODUCTION` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_DESCRIPTION` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_PLACE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_OPEN_TIME` time(6) NOT NULL,
  `FACILITIES_CLOSE_TIME` time(6) NOT NULL,
  `FACILITIES_IMG` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_POINT` int(10) DEFAULT NULL,
  `FACILITIES_LIMIT` int(10) DEFAULT NULL,
  PRIMARY KEY (`FACILITIES_ID`),
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE,
  CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES ('0000000001','00001','游泳池','平日、假日皆開放使用平日、假日皆開放使用，疫情期開放上限20人預約','','一樓','00:00:00.000000','00:00:00.000000','',10,20);
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities_booking`
--

DROP TABLE IF EXISTS `facilities_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities_booking` (
  `FACILITIES_BOOKING_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HOUSEHOLD_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_BOOKING_DATE` date NOT NULL,
  `FACILITIES_EQUIPMENT_ID` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FACILITIES_BOOKING_AMOUNT` int(10) NOT NULL,
  `IS_CHECKIN` bit(1) NOT NULL,
  `IS_RETURN` bit(1) DEFAULT NULL,
  PRIMARY KEY (`FACILITIES_BOOKING_ID`),
  KEY `HOUSEHOLD_ID` (`HOUSEHOLD_ID`),
  KEY `FACILITIES_ID` (`FACILITIES_ID`) USING BTREE,
  KEY `FACILITIES_EQUIPMENT_ID` (`FACILITIES_EQUIPMENT_ID`) USING BTREE,
  CONSTRAINT `facilities_booking_ibfk_1` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household_address` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facilities_booking_ibfk_2` FOREIGN KEY (`FACILITIES_ID`) REFERENCES `facilities` (`FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facilities_booking_ibfk_4` FOREIGN KEY (`FACILITIES_EQUIPMENT_ID`) REFERENCES `facilities_equipment` (`FACILITIES_EQUIPMENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities_booking`
--

LOCK TABLES `facilities_booking` WRITE;
/*!40000 ALTER TABLE `facilities_booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `facilities_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities_booking_time`
--

DROP TABLE IF EXISTS `facilities_booking_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities_booking_time` (
  `FACILITIES_BOOKING_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_START` time(6) NOT NULL,
  `FACILITIES_FINISH` time(6) NOT NULL,
  PRIMARY KEY (`FACILITIES_BOOKING_ID`,`FACILITIES_START`) USING BTREE,
  CONSTRAINT `facilities_booking_time_ibfk_1` FOREIGN KEY (`FACILITIES_BOOKING_ID`) REFERENCES `facilities_booking` (`FACILITIES_BOOKING_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities_booking_time`
--

LOCK TABLES `facilities_booking_time` WRITE;
/*!40000 ALTER TABLE `facilities_booking_time` DISABLE KEYS */;
/*!40000 ALTER TABLE `facilities_booking_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities_equipment`
--

DROP TABLE IF EXISTS `facilities_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities_equipment` (
  `FACILITIES_EQUIPMENT_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_EQUIPMENT_NAME` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_EQUIPMENT_AMOUNT` int(3) NOT NULL,
  PRIMARY KEY (`FACILITIES_EQUIPMENT_ID`),
  KEY `FACILITIES_ID` (`FACILITIES_ID`) USING BTREE,
  CONSTRAINT `facilities_equipment_ibfk_1` FOREIGN KEY (`FACILITIES_ID`) REFERENCES `facilities` (`FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities_equipment`
--

LOCK TABLES `facilities_equipment` WRITE;
/*!40000 ALTER TABLE `facilities_equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `facilities_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities_repair`
--

DROP TABLE IF EXISTS `facilities_repair`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities_repair` (
  `FACILITIES_REPAIR_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_REPAIR_DATE` datetime(6) NOT NULL,
  `USER_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_REPAIR_CONTENT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_REPAIR_STATE` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`FACILITIES_REPAIR_ID`),
  KEY `USER_ID` (`USER_ID`) USING BTREE,
  KEY `FACILITIES_ID` (`FACILITIES_ID`) USING BTREE,
  CONSTRAINT `facilities_repair_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facilities_repair_ibfk_2` FOREIGN KEY (`FACILITIES_ID`) REFERENCES `facilities` (`FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities_repair`
--

LOCK TABLES `facilities_repair` WRITE;
/*!40000 ALTER TABLE `facilities_repair` DISABLE KEYS */;
/*!40000 ALTER TABLE `facilities_repair` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `household_address`
--

DROP TABLE IF EXISTS `household_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `household_address` (
  `HOUSEHOLD_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMMUNITY_ID` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HOUSEHOLD_ADD` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `POINT` int(10) NOT NULL,
  PRIMARY KEY (`HOUSEHOLD_ID`),
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE,
  CONSTRAINT `household_address_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `household_address`
--

LOCK TABLES `household_address` WRITE;
/*!40000 ALTER TABLE `household_address` DISABLE KEYS */;
INSERT INTO `household_address` VALUES ('00001','00001','中正路510號1樓',0);
/*!40000 ALTER TABLE `household_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manager` (
  `USER_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMMUNITY_ID` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`USER_ID`),
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE,
  CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES ('001','00001');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package` (
  `PACKAGE_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PACKAGE_DATE` date NOT NULL,
  `PACKAGE_TYPE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PACKAGE_DEPOSIT` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PACKAGE_PHOTO` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IS_TAKEN` bit(1) NOT NULL,
  PRIMARY KEY (`PACKAGE_ID`),
  KEY `USER_ID` (`USER_ID`) USING BTREE,
  CONSTRAINT `package_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resident`
--

DROP TABLE IF EXISTS `resident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resident` (
  `USER_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESIDENT_GENDER` tinyint(1) NOT NULL,
  `RESIDENT_BDATE` date NOT NULL,
  `RESIDENT_PHONE` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`USER_ID`),
  CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resident`
--

LOCK TABLES `resident` WRITE;
/*!40000 ALTER TABLE `resident` DISABLE KEYS */;
INSERT INTO `resident` VALUES ('002',0,'2001-05-15','0987654321');
/*!40000 ALTER TABLE `resident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resident_address`
--

DROP TABLE IF EXISTS `resident_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resident_address` (
  `USER_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HOUSEHOLD_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`USER_ID`,`HOUSEHOLD_ID`),
  KEY `HOUSEHOLD_ID` (`HOUSEHOLD_ID`) USING BTREE,
  CONSTRAINT `resident_address_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resident_address_ibfk_2` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household_address` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resident_address`
--

LOCK TABLES `resident_address` WRITE;
/*!40000 ALTER TABLE `resident_address` DISABLE KEYS */;
INSERT INTO `resident_address` VALUES ('002','00001');
/*!40000 ALTER TABLE `resident_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `USER_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_NAME` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_ACCOUNT` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_PASSWORD` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_AUTHORITY` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('001','一號管理員','abc123@gmail.com','111111','3'),('002','住戶一','def456@gmail.com','44444444','5');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-16 21:49:32
