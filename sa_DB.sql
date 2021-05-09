-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021-05-09 08:27:37
-- 伺服器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sa`
--

-- --------------------------------------------------------

--
-- 資料表結構 `announcement`
--

CREATE TABLE `announcement` (
  `ANNOUNCEMENT_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ANNOUNCEMENT_TITLE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ANNOUNCEMENT_DATE` datetime(6) NOT NULL,
  `ANNOUNCEMENT_TYPE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ANNOUNCEMENT_INC` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ANNOUNCEMENT_CONTENT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ANNOUNCEMENT_DOC` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `community`
--

CREATE TABLE `community` (
  `COMMUNITY_ID` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `COMMUNITY_CITY` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `COMMUNITY_DISTRICT` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `COMMUNITY_NAME` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities`
--

CREATE TABLE `facilities` (
  `FACILITIES_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `COMMUNITY_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_NAME` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_INTRODUCTION` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_DESCRIPTION` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_PLACE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_TIME` time(6) NOT NULL,
  `FACILITIES_POINT` int(10) DEFAULT NULL,
  `FACILITIES_LIMIT` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_booking`
--

CREATE TABLE `facilities_booking` (
  `FACILITIES_BOOKING_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `HOUSEHOLD_ID` varchar(10) NOT NULL,
  `FACILITIES_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_BOOKING_DATE` date NOT NULL,
  `FACILITIES_EQUIPMENT_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FACILITIES_BOOKING_AMOUNT` int(10) NOT NULL,
  `IS_CHECKIN` bit(1) NOT NULL,
  `IS_RETURN` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_booking_time`
--

CREATE TABLE `facilities_booking_time` (
  `FACILITIES_BOOKING_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_START` time(6) NOT NULL,
  `FACILITIES_FINISH` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_equipment`
--

CREATE TABLE `facilities_equipment` (
  `FACILITIES_EQUIPMENT_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_EQUIPMENT_NAME` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_EQUIPMENT_AMOUNT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_repair`
--

CREATE TABLE `facilities_repair` (
  `FACILITIES_REPAIR_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_REPAIR_DATE` datetime(6) NOT NULL,
  `USER_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_REPAIR_CONTENT` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `FACILITIES_REPAIR_STATE` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `household_address`
--

CREATE TABLE `household_address` (
  `HOUSEHOLD_ID` varchar(20) NOT NULL,
  `COMMUNITY_ID` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `HOUSEHOLD_ADD` varchar(30) NOT NULL,
  `POINT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `USER_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `COMMUNITY_ID` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `package`
--

CREATE TABLE `package` (
  `PACKAGE_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USER_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PACKAGE_DATE` date NOT NULL,
  `PACKAGE_TYPE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PACKAGE_DEPOSIT` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PACKAGE_PHOTO` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `IS_TAKEN` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `resident`
--

CREATE TABLE `resident` (
  `USER_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `RESIDENT_GENDER` tinyint(1) NOT NULL,
  `RESIDENT_BDATE` date NOT NULL,
  `RESIDENT_PHONE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `resident_address`
--

CREATE TABLE `resident_address` (
  `USER_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `HOUSEHOLD_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `USER_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USER_NAME` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USER_ACCOUNT` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USER_PASSWORD` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USER_AUTHORITY` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ANNOUNCEMENT_ID`);

--
-- 資料表索引 `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`COMMUNITY_ID`);

--
-- 資料表索引 `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`FACILITIES_ID`),
  ADD KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE;

--
-- 資料表索引 `facilities_booking`
--
ALTER TABLE `facilities_booking`
  ADD PRIMARY KEY (`FACILITIES_BOOKING_ID`),
  ADD KEY `HOUSEHOLD_ID` (`HOUSEHOLD_ID`),
  ADD KEY `FACILITIES_ID` (`FACILITIES_ID`) USING BTREE,
  ADD KEY `FACILITIES_EQUIPMENT_ID` (`FACILITIES_EQUIPMENT_ID`) USING BTREE;

--
-- 資料表索引 `facilities_booking_time`
--
ALTER TABLE `facilities_booking_time`
  ADD PRIMARY KEY (`FACILITIES_BOOKING_ID`,`FACILITIES_START`) USING BTREE;

--
-- 資料表索引 `facilities_equipment`
--
ALTER TABLE `facilities_equipment`
  ADD PRIMARY KEY (`FACILITIES_EQUIPMENT_ID`),
  ADD KEY `FACILITIES_ID` (`FACILITIES_ID`) USING BTREE;

--
-- 資料表索引 `facilities_repair`
--
ALTER TABLE `facilities_repair`
  ADD PRIMARY KEY (`FACILITIES_REPAIR_ID`),
  ADD KEY `USER_ID` (`USER_ID`) USING BTREE,
  ADD KEY `FACILITIES_ID` (`FACILITIES_ID`) USING BTREE;

--
-- 資料表索引 `household_address`
--
ALTER TABLE `household_address`
  ADD PRIMARY KEY (`HOUSEHOLD_ID`),
  ADD KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE;

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE;

--
-- 資料表索引 `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PACKAGE_ID`),
  ADD KEY `USER_ID` (`USER_ID`) USING BTREE;

--
-- 資料表索引 `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`USER_ID`);

--
-- 資料表索引 `resident_address`
--
ALTER TABLE `resident_address`
  ADD PRIMARY KEY (`USER_ID`,`HOUSEHOLD_ID`),
  ADD KEY `HOUSEHOLD_ID` (`HOUSEHOLD_ID`) USING BTREE;

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `facilities_booking`
--
ALTER TABLE `facilities_booking`
  ADD CONSTRAINT `facilities_booking_ibfk_1` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household_address` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_booking_ibfk_2` FOREIGN KEY (`FACILITIES_ID`) REFERENCES `facilities` (`FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_booking_ibfk_4` FOREIGN KEY (`FACILITIES_EQUIPMENT_ID`) REFERENCES `facilities_equipment` (`FACILITIES_EQUIPMENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `facilities_booking_time`
--
ALTER TABLE `facilities_booking_time`
  ADD CONSTRAINT `facilities_booking_time_ibfk_1` FOREIGN KEY (`FACILITIES_BOOKING_ID`) REFERENCES `facilities_booking` (`FACILITIES_BOOKING_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `facilities_equipment`
--
ALTER TABLE `facilities_equipment`
  ADD CONSTRAINT `facilities_equipment_ibfk_1` FOREIGN KEY (`FACILITIES_ID`) REFERENCES `facilities` (`FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `facilities_repair`
--
ALTER TABLE `facilities_repair`
  ADD CONSTRAINT `facilities_repair_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_repair_ibfk_2` FOREIGN KEY (`FACILITIES_ID`) REFERENCES `facilities` (`FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `household_address`
--
ALTER TABLE `household_address`
  ADD CONSTRAINT `household_address_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `resident_address`
--
ALTER TABLE `resident_address`
  ADD CONSTRAINT `resident_address_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resident_address_ibfk_2` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household_address` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
