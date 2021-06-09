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
  `ANNOUNCEMENT_ID` int(10) NOT NULL AUTO_INCREMENT,
  `COMMUNITY_ID` int(5) NOT NULL,
  `ANNOUNCEMENT_TITLE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_DATE` datetime(6) NOT NULL,
  `ANNOUNCEMENT_TYPE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_INC` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_CONTENT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_DOC` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ANNOUNCEMENT_ID`,`COMMUNITY_ID`) USING BTREE,
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`),
  CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,1,'公告一','2021-05-31 22:17:19.000000','生活','社區管理公告','公告一測試測試測試測試測試測試測試測試測試測試',NULL),(1,2,'系統維修','2021-05-31 00:00:00.000000','緊急通知','系統','本系統將在2021/06/12 13:00~14:30進行例行性系統維護工程，請所有用戶在此期間不要使用本系統，造成您的不便，不好意思。',NULL),(1,3,'管理費降價','2021-05-31 00:00:00.000000','財務','管理員','因應疫情嚴峻，許多居民工作受影響，因此管理費由原本的3000元降價至2999元，全民防疫救台灣',NULL),(2,2,'停水通知','2021-05-31 00:00:00.000000','緊急通知','管理員','近期因應各地缺水，本社區實施停水政策，每日14:00~16:30，全社區不分樓層將停水，請各位住戶配合。',NULL),(2,3,'COSTCO會員中心','2021-05-31 00:00:00.000000','廣告','系統','2021/06/05 00:00~12:00蝦皮全館免運，蝦幣大放送！(我亂說的)',NULL),(3,1,'財務報表','2021-05-31 22:45:51.000000','財務','社區管理公告','這個月管理費不夠',NULL),(3,2,'公設暫停開放','2021-05-31 00:00:00.000000','緊急通知','管理員','近期因台灣疫情嚴重，本社區配合政府三級警報政策，即日起所有公設將暫停開放，全民放疫救台灣',NULL),(3,3,'COSTCO會員中心','2021-05-31 00:00:00.000000','生活','管理員','COSTCO會員中心將在6/3於本社區一樓交誼廳擺攤，有興趣的住民歡迎預先至服務台登記，活動期間請配合防疫政策，配戴口罩，謝謝。',NULL),(4,1,'測試公告時間','2021-05-31 23:09:39.000000','緊急通知','社區管理公告','時間時間會給我答案',NULL),(5,1,'廣告','2021-06-01 00:09:38.000000','廣告','社區管理公告','廣告被刪掉了\r\n再新增一個\r\n希望大家可以多使用我們的服務哦',NULL),(6,1,'公告公告','2021-05-31 23:15:40.000000','財務','社區管理公告','沒什麼內容',NULL),(7,1,'生活好幫手','2021-06-01 19:29:09.000000','廣告','社區管理公告','有需要生活好幫手，請洽詢管理員。',NULL),(8,1,'停水通知','2021-06-01 19:36:13.000000','生活','社區管理公告','6/11晚上7:00開始進行水管維修，因此本社區將進行停水，持續三個小時，到6/11晚上10:00。',NULL),(9,1,'防疫生活','2021-06-02 11:09:10.000000','生活','社區管理公告','過好防疫生活',NULL),(10,1,'防疫在家也能享受樂趣','2021-06-08 19:44:20.000000','廣告','社區管理公告','防疫期間，在家是不是悶壞啦?\r\n快使用我們為您打造的遊戲機，享受家人間的樂趣吧。',''),(11,1,'社區管理系統說明書','2021-06-08 19:50:39.000000','生活','社區管理公告','詳見附件。','109系統分析與設計-資管二甲-第三組.pdf'),(12,1,'社區管理系統說明書','2021-06-08 19:51:01.000000','生活','社區管理公告','詳見附件。','');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `community`
--

DROP TABLE IF EXISTS `community`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `community` (
  `COMMUNITY_ID` int(5) NOT NULL,
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
INSERT INTO `community` VALUES (1,'桃園市','蘆竹區','冠倫台北'),(2,'新北市','鶯歌區','巴黎大街'),(3,'新北市','三峽區','上北大');
/*!40000 ALTER TABLE `community` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities` (
  `FACILITIES_ID` int(15) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `FACILITIES_NAME` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_INTRODUCTION` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_DESCRIPTION` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_PLACE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_OPEN_TIME` time(6) NOT NULL,
  `FACILITIES_CLOSE_TIME` time(6) NOT NULL,
  `FACILITIES_IMG1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_IMG2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FACILITIES_IMG3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FACILITIES_POINT` int(10) DEFAULT NULL,
  `FACILITIES_LIMIT` int(10) DEFAULT NULL,
  PRIMARY KEY (`FACILITIES_ID`,`COMMUNITY_ID`) USING BTREE,
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE,
  CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES (1,1,'游泳池','本社區之游泳池為標準的50公尺水道，開放時間內皆有安全的執照救生員，每日定期換水，請住戶放心使用。\r\n疫情期間暫停開放。','本社區之游泳池為標準的50公尺水道，開放時間內皆有安全的執照救生員，每日定期換水，請住戶放心使用。\r\n疫情期間暫停開放。','一樓','09:00:00.000000','18:00:00.000000','1_1_1.jpg','1_1_2.jpg','1_1_3.jpg',10,30),(1,2,'中庭花園','本社區定期聘請花藝師來進行設計及維護，歡迎住戶多加參觀。','本社區定期聘請花藝師來進行設計及維護，歡迎住戶多加參觀。','','08:00:00.000000','22:00:00.000000','4_1_1.jpg','4_1_2.jpg','4_1_3.jpg',0,50),(2,1,'兒童遊戲室','需家長陪同。','需家長陪同。','','09:00:00.000000','20:00:00.000000','13_1_1.jpg','13_1_2.jpg','13_1_3.jpg',5,10),(2,2,'撞球室','可以打撞球','不要隨便拿撞球桿跟人家打架，也不要拿撞球當棒球丟喔~','12樓 ','10:00:00.000000','21:00:00.000000','7_1_1.jpg','7_1_2.jpg','',5,10),(3,1,'健身房','本社區定期維護器材，以住戶的使用安全為第一考量。','本社區定期維護器材，以住戶的使用安全為第一考量。','','09:00:00.000000','20:00:00.000000','3_1_1.jpg','3_1_2.jpg','4_1_3.jpg',5,10),(3,2,'KTV','唱歌的地方','隔音很好，隨便你唱','17樓','12:00:00.000000','18:00:00.000000','11_1_1.jpg','11_1_2.jpg','11_1_3.jpg',5,5),(4,2,'會議室','開會的地方','禁止開趴','8樓','07:00:00.000000','20:00:00.000000','12_1_1.jpg','12_1_2.jpg','12_1_3.jpg',3,15),(5,1,'空中花園','本空中花園具有些許危險性，小孩入園需家長陪同。','本空中花園具有些許危險性，小孩入園需家長陪同。','','00:00:00.000000','03:00:00.000000','5_1_1.jpg','5_1_2.jpg','5_1_3.jpg',0,10),(5,2,'圖書館','有書的地方','可以借書，也可以捐書，也要記得還書喔~','7樓','08:00:00.000000','20:00:00.000000','15_1_1.jpg','15_1_2.jpg','',3,0),(6,2,'桌球室','打桌球的地方','有桌球桌跟椅子可以休息，備有桌球拍以及桌球。','地下2樓','10:00:00.000000','21:00:00.000000','6_1_1.jpg','','',5,8),(8,1,'羽球場','打羽球的地方','想打羽球就要自己帶球拍，盡量穿羽球鞋比較安全','隔壁鐵皮屋','10:00:00.000000','21:00:00.000000','8_1_1.jpg','','',5,20),(9,2,'舞蹈教室','有鏡子的地方','木頭地板，練舞記得自備室內鞋比較好喔~一個人也可以來喔~','3樓','08:00:00.000000','22:00:00.000000','9_1_1.jpg','9_1_2.jpg','',5,20),(10,1,'KTV','唱歌的地方','隔音不好，請自重','1樓','12:00:00.000000','20:00:00.000000','10_1_1.jpg','10_1_2.jpg','10_1_3.jpg',5,10),(14,3,'電腦室','有電腦的地方','WIFE速度堪比網咖','5樓','08:00:00.000000','23:00:00.000000','14_1_1.jpg','','',10,5),(16,1,'讀書室','讀書的地方','小朋友不乖帶來這裡也沒用喔~','8樓','08:00:00.000000','22:00:00.000000','16_1_1.jpg','16_1_2.jpg','16_1_3.jpg',3,10),(17,3,'電子遊戲室','打電動的地方','不是賭博的那種喔~是湯姆熊那種','14樓','10:00:00.000000','17:00:00.000000','17_1_1.jpg','17_1_2.jpg','17_1_3.jpg',5,25),(18,3,'會議室','開會的地方','比較大喔~','18樓','10:00:00.000000','20:00:00.000000','18_1_1.jpg','','',10,40),(19,1,'器材公設','可以新增器材','借器材吧','','09:00:00.000000','21:00:00.000000','游泳池1.jpg','','',5,10),(20,1,'籃球場','歡迎與家人、朋友一起來運動!','歡迎與家人、朋友一起來運動!','','08:00:00.000000','21:00:00.000000','basketball-108622_960_720.jpg','basketball-2258650_960_720.jpg','basketball-2258651_960_720.jpg',10,40),(21,1,'','','','','00:00:00.000000','00:00:00.000000','','','',0,0),(22,1,'','','','','00:00:00.000000','00:00:00.000000','','','',0,0);
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities_booking`
--

DROP TABLE IF EXISTS `facilities_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities_booking` (
  `FACILITIES_BOOKING_ID` int(20) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `HOUSEHOLD_ID` int(20) NOT NULL,
  `FACILITIES_ID` int(15) NOT NULL,
  `FACILITIES_BOOKING_DATE` date NOT NULL,
  `FACILITIES_EQUIPMENT_ID` int(5) DEFAULT NULL,
  `FACILITIES_EQUIPMENT_AMOUNT` int(11) DEFAULT NULL,
  `FACILITIES_BOOKING_AMOUNT` int(10) NOT NULL,
  `IS_CANCEL` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`FACILITIES_BOOKING_ID`,`COMMUNITY_ID`,`FACILITIES_ID`),
  KEY `HOUSEHOLD_ID` (`HOUSEHOLD_ID`),
  KEY `FACILITIES_ID` (`FACILITIES_ID`) USING BTREE,
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`,`FACILITIES_ID`),
  CONSTRAINT `facilities_booking_ibfk_2` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facilities_booking_ibfk_4` FOREIGN KEY (`COMMUNITY_ID`, `FACILITIES_ID`) REFERENCES `facilities` (`COMMUNITY_ID`, `FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities_booking`
--

LOCK TABLES `facilities_booking` WRITE;
/*!40000 ALTER TABLE `facilities_booking` DISABLE KEYS */;
INSERT INTO `facilities_booking` VALUES (1,1,100,1,'2021-06-07',NULL,NULL,2,_binary ''),(1,1,100,2,'2021-05-21',NULL,NULL,2,_binary '\0'),(1,1,100,3,'2021-06-17',NULL,NULL,1,_binary '\0'),(1,1,100,8,'2021-06-01',NULL,NULL,2,_binary '\0'),(1,1,100,19,'2021-06-06',2,3,3,_binary '\0'),(1,2,100,2,'2021-04-15',NULL,NULL,3,_binary '\0'),(1,2,200,4,'2021-05-31',NULL,NULL,10,_binary '\0'),(1,2,100,6,'2021-06-25',NULL,NULL,3,_binary ''),(1,2,200,9,'2021-05-13',NULL,NULL,5,_binary '\0'),(1,3,100,14,'2021-05-26',NULL,NULL,1,_binary '\0'),(2,1,100,1,'2021-06-07',NULL,NULL,2,_binary '\0'),(2,1,100,2,'2021-06-05',NULL,NULL,4,_binary '\0'),(2,1,100,19,'2021-06-07',2,2,4,_binary ''),(3,1,100,1,'2021-06-08',NULL,NULL,1,_binary ''),(3,1,100,2,'2021-06-16',NULL,NULL,2,_binary ''),(3,1,100,19,'2021-06-07',2,2,4,_binary '\0'),(4,1,100,1,'2021-06-08',NULL,NULL,1,_binary '\0'),(4,1,100,19,'2021-06-07',2,2,4,_binary ''),(5,1,100,1,'2021-06-15',NULL,NULL,1,_binary ''),(5,1,100,19,'2021-06-07',2,5,5,_binary '\0'),(6,1,100,1,'2021-06-26',3,1,2,_binary ''),(6,1,100,19,'2021-06-04',2,NULL,1,_binary '\0'),(7,1,100,1,'0000-00-00',3,NULL,1,_binary '\0'),(8,1,100,1,'0000-00-00',3,NULL,1,_binary '\0'),(9,1,100,1,'2021-06-10',3,1,3,_binary '\0'),(10,1,100,1,'2021-06-10',3,1,4,_binary '\0'),(11,1,100,1,'2021-06-05',3,1,1,_binary '\0');
/*!40000 ALTER TABLE `facilities_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities_booking_time`
--

DROP TABLE IF EXISTS `facilities_booking_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities_booking_time` (
  `FACILITIES_BOOKING_ID` int(20) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `FACILITIES_ID` int(15) NOT NULL,
  `FACILITIES_START` int(11) NOT NULL,
  `HOUSEHOLD_ID` int(11) NOT NULL,
  PRIMARY KEY (`FACILITIES_BOOKING_ID`,`FACILITIES_ID`,`COMMUNITY_ID`,`FACILITIES_START`,`HOUSEHOLD_ID`),
  KEY `FACILITIES_ID` (`FACILITIES_ID`),
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`,`FACILITIES_ID`,`FACILITIES_BOOKING_ID`),
  KEY `facilities_booking_time_ibfk_5_idx` (`HOUSEHOLD_ID`),
  CONSTRAINT `facilities_booking_time_ibfk_4` FOREIGN KEY (`COMMUNITY_ID`, `FACILITIES_ID`, `FACILITIES_BOOKING_ID`) REFERENCES `facilities_booking` (`COMMUNITY_ID`, `FACILITIES_ID`, `FACILITIES_BOOKING_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facilities_booking_time_ibfk_5` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities_booking_time`
--

LOCK TABLES `facilities_booking_time` WRITE;
/*!40000 ALTER TABLE `facilities_booking_time` DISABLE KEYS */;
INSERT INTO `facilities_booking_time` VALUES (9,1,1,10,100),(9,1,1,11,100),(9,1,1,12,100),(10,1,1,10,100),(10,1,1,11,100),(10,1,1,12,100),(10,1,1,13,100),(11,1,1,10,100),(11,1,1,11,100),(1,1,3,16,100),(1,1,3,17,100);
/*!40000 ALTER TABLE `facilities_booking_time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities_equipment`
--

DROP TABLE IF EXISTS `facilities_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities_equipment` (
  `FACILITIES_EQUIPMENT_ID` int(11) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `FACILITIES_ID` int(15) NOT NULL,
  `FACILITIES_EQUIPMENT_NAME` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_EQUIPMENT_AMOUNT` int(3) NOT NULL,
  `FACILITIES_EQUIPMENT_UNIT` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`FACILITIES_EQUIPMENT_ID`,`FACILITIES_ID`,`COMMUNITY_ID`),
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`,`FACILITIES_ID`),
  KEY `FACILITIES_ID` (`FACILITIES_ID`,`COMMUNITY_ID`),
  CONSTRAINT `facilities_equipment_ibfk_1` FOREIGN KEY (`FACILITIES_ID`, `COMMUNITY_ID`) REFERENCES `facilities` (`FACILITIES_ID`, `COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities_equipment`
--

LOCK TABLES `facilities_equipment` WRITE;
/*!40000 ALTER TABLE `facilities_equipment` DISABLE KEYS */;
INSERT INTO `facilities_equipment` VALUES (1,3,14,'HDMI線',3,'條'),(1,1,20,'籃球',5,'個'),(2,3,14,'音源線',3,'條'),(2,1,19,'桌球',50,'顆'),(3,1,1,'浮板',10,'個'),(3,2,9,'音響',2,'個'),(3,3,17,'Switch',1,'組'),(4,2,6,'桌球拍',6,'支'),(4,3,17,'Xbox',1,'組'),(5,2,2,'撞球裝備組(撞球桿*2、撞球、巧克*2)',2,'組'),(5,3,18,'HDMI線',2,'條'),(6,1,8,'羽球拍',8,'支'),(6,3,18,'麥克風',5,'支');
/*!40000 ALTER TABLE `facilities_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities_repair`
--

DROP TABLE IF EXISTS `facilities_repair`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facilities_repair` (
  `FACILITIES_REPAIR_ID` int(10) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `FACILITIES_ID` int(15) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `FACILITIES_REPAIR_DATE` datetime(6) NOT NULL,
  `FACILITIES_REPAIR_CONTENT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_REPAIR_STATE` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_REPAIR_RETURN` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`FACILITIES_REPAIR_ID`,`FACILITIES_ID`,`COMMUNITY_ID`),
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`,`FACILITIES_ID`),
  KEY `USER_ID` (`USER_ID`),
  CONSTRAINT `facilities_repair_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`, `FACILITIES_ID`) REFERENCES `facilities` (`COMMUNITY_ID`, `FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facilities_repair_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facilities_repair_ibfk_3` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities_repair`
--

LOCK TABLES `facilities_repair` WRITE;
/*!40000 ALTER TABLE `facilities_repair` DISABLE KEYS */;
INSERT INTO `facilities_repair` VALUES (1,1,1,44,'2021-06-02 02:05:52.000000','水乾了','waiting',''),(1,1,2,44,'2021-05-12 00:00:00.000000','wife連不到了','solving','廠商已經修好了喔!'),(1,2,5,54,'2021-06-01 05:00:29.000000','圖書館沒有書','waiting',NULL),(2,2,3,44,'2021-05-20 00:00:00.000000','麥克風會爆音','solving','因為疫情期間，為了防疫，減少群聚與接觸，故暫時不請廠商維修，待疫情趨緩，將立即通知廠商維修。'),(2,2,5,54,'2021-06-01 05:02:49.000000','圖書館沒有書','solving','目前正在添購新書，請稍後幾日，將陸續上架。'),(3,1,8,44,'2021-05-24 00:00:00.000000','網子破掉了','solving','因為疫情期間，為了防疫，減少群聚與接觸，故暫時不請廠商維修，待疫情趨緩，將立即通知廠商維修。'),(4,1,2,44,'2021-05-25 00:00:00.000000','啞鈴太輕了，可以多買一點嗎？','waiting','由於經費不足，故不增加其他設備，歡迎住戶自行購買後，將私有物變為公有物。'),(4,1,8,44,'2021-06-02 17:13:27.000000','沒球了','waiting','疫情期間不維修'),(5,2,1,44,'2021-05-26 00:00:00.000000','花園花都枯萎了，可以幫他們澆一下水嗎?','resolve','疫情期間所有公設(含空中花園)暫停開放喔~請住戶不要無視公告擅自進去喔~以後如果看到花園花枯萎有時間可以幫忙澆一下喔~打掃阿姨會感謝您的。'),(6,3,18,44,'2021-05-30 00:00:00.000000','椅子坐墊不好坐，可以換一個嗎？','resolve','疫情期間所有公設(含會議室)暫停開放喔~請住戶不要無視公告擅自進去喔~由於經費不足，故不增加其他設備或更換現有設備，歡迎住戶自行購買後，將私有物變為公有物。');
/*!40000 ALTER TABLE `facilities_repair` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `household`
--

DROP TABLE IF EXISTS `household`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `household` (
  `HOUSEHOLD_ID` int(20) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `HOUSEHOLD_ADDRESS` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `POINT` int(10) NOT NULL,
  PRIMARY KEY (`HOUSEHOLD_ID`,`COMMUNITY_ID`),
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE,
  CONSTRAINT `household_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `household`
--

LOCK TABLES `household` WRITE;
/*!40000 ALTER TABLE `household` DISABLE KEYS */;
INSERT INTO `household` VALUES (100,1,'510號1樓',465),(100,2,'41號1樓',480),(100,3,'12號1樓',470),(200,1,'510號2樓',500),(200,2,'29號3樓',500);
/*!40000 ALTER TABLE `household` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manager` (
  `USER_ID` int(10) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  PRIMARY KEY (`USER_ID`),
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE,
  CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `manager_ibfk_3` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `manager_ibfk_4` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (34,1),(64,1);
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package` (
  `PACKAGE_ID` int(20) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `PACKAGE_DATE` date NOT NULL,
  `PACKAGE_TYPE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PACKAGE_DEPOSIT` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PACKAGE_PHOTO` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IS_TAKEN` bit(1) NOT NULL,
  PRIMARY KEY (`PACKAGE_ID`,`COMMUNITY_ID`),
  KEY `USER_ID` (`USER_ID`) USING BTREE,
  KEY `COMMUNITY_ID` (`COMMUNITY_ID`),
  CONSTRAINT `package_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `package_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `package_ibfk_3` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `USER_ID` int(10) NOT NULL,
  `RESIDENT_GENDER` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RESIDENT_BDATE` date NOT NULL,
  `RESIDENT_PHONE` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`USER_ID`),
  CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resident_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resident`
--

LOCK TABLES `resident` WRITE;
/*!40000 ALTER TABLE `resident` DISABLE KEYS */;
INSERT INTO `resident` VALUES (44,'男','2021-05-03','0987654321'),(54,'女','2001-05-15','0987654321'),(74,'女','2020-11-22','0988789789'),(84,'女','2021-05-10','0987654321'),(215,'男','2021-04-26','0920000813'),(218,'男','2018-10-29','0920181029'),(219,'男','2021-04-25','0900099900'),(220,'男','2021-05-28','0980706050'),(221,'女','2021-05-27','092323323');
/*!40000 ALTER TABLE `resident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resident_address`
--

DROP TABLE IF EXISTS `resident_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resident_address` (
  `USER_ID` int(10) NOT NULL,
  `COMMUNITY_ID` int(11) NOT NULL,
  `HOUSEHOLD_ID` int(20) NOT NULL,
  PRIMARY KEY (`USER_ID`,`HOUSEHOLD_ID`,`COMMUNITY_ID`),
  KEY `HOUSEHOLD_ID` (`HOUSEHOLD_ID`) USING BTREE,
  KEY `resident_address_ibfk_2` (`COMMUNITY_ID`,`HOUSEHOLD_ID`),
  KEY `HOUSEHOLD_ID_2` (`HOUSEHOLD_ID`,`COMMUNITY_ID`),
  CONSTRAINT `resident_address_ibfk_4` FOREIGN KEY (`HOUSEHOLD_ID`, `COMMUNITY_ID`) REFERENCES `household` (`HOUSEHOLD_ID`, `COMMUNITY_ID`),
  CONSTRAINT `resident_address_ibfk_5` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resident_address`
--

LOCK TABLES `resident_address` WRITE;
/*!40000 ALTER TABLE `resident_address` DISABLE KEYS */;
INSERT INTO `resident_address` VALUES (44,1,100),(44,2,100),(44,3,100),(54,1,100),(74,1,100),(74,3,100),(84,2,100),(215,1,100),(218,1,100),(219,1,100),(220,2,100),(221,2,100),(44,2,200),(74,2,200),(215,2,200);
/*!40000 ALTER TABLE `resident_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `USER_ID` int(10) NOT NULL,
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
INSERT INTO `user` VALUES (34,'警衛1','abc123@gmail.com','111111','3'),(44,'簡伯伯','def456@gmail.com','44444444','5'),(54,'管理者1','ghi789@gmail.com','7777','4'),(64,'警衛2','abc111@gmail.com','111','3'),(74,'住戶2','def444@gmail.com','444','5'),(84,'管理者2','ghi777@gmail.com','777','4'),(214,'carat','svt@gamil.com','seventeen0526','5'),(215,'nana','jaemin@gmail.com','dream0813','5'),(218,'wizon','izone@gmail.com','20181029','5'),(219,'aaa','123456@gmail.com','12345678','5'),(220,'user','user@gmail.com','rup 54m06','5'),(221,'楊誼萱','aaa@gmail.com','12345','5');
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

-- Dump completed on 2021-06-10  0:07:45
