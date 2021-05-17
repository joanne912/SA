-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： us-cdbr-east-03.cleardb.com
-- 產生時間： 2021-05-17 15:59:32
-- 伺服器版本： 5.6.50-log
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
-- 資料庫： `heroku_cb1e0eb718e0348`
--

-- --------------------------------------------------------

--
-- 資料表結構 `announcement`
--

CREATE TABLE `announcement` (
  `ANNOUNCEMENT_ID` int(10) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `ANNOUNCEMENT_TITLE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_DATE` datetime(6) NOT NULL,
  `ANNOUNCEMENT_TYPE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_INC` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_CONTENT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNOUNCEMENT_DOC` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `community`
--

CREATE TABLE `community` (
  `COMMUNITY_ID` int(5) NOT NULL,
  `COMMUNITY_CITY` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMMUNITY_DISTRICT` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMMUNITY_NAME` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `community`
--

INSERT INTO `community` (`COMMUNITY_ID`, `COMMUNITY_CITY`, `COMMUNITY_DISTRICT`, `COMMUNITY_NAME`) VALUES
(1, '桃園市', '蘆竹區', '冠倫台北');

-- --------------------------------------------------------

--
-- 資料表結構 `facilities`
--

CREATE TABLE `facilities` (
  `FACILITIES_ID` int(15) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `FACILITIES_NAME` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_INTRODUCTION` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_DESCRIPTION` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_PLACE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_OPEN_TIME` time(6) NOT NULL,
  `FACILITIES_CLOSE_TIME` time(6) NOT NULL,
  `FACILITIES_IMG` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_POINT` int(10) DEFAULT NULL,
  `FACILITIES_LIMIT` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `facilities`
--

INSERT INTO `facilities` (`FACILITIES_ID`, `COMMUNITY_ID`, `FACILITIES_NAME`, `FACILITIES_INTRODUCTION`, `FACILITIES_DESCRIPTION`, `FACILITIES_PLACE`, `FACILITIES_OPEN_TIME`, `FACILITIES_CLOSE_TIME`, `FACILITIES_IMG`, `FACILITIES_POINT`, `FACILITIES_LIMIT`) VALUES
(1, 1, '游泳池', '平日、假日皆開放使用平日、假日皆開放使用，疫情期開放上限20人預約', '', '一樓', '00:00:00.000000', '00:00:00.000000', '', 10, 20);

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_booking`
--

CREATE TABLE `facilities_booking` (
  `FACILITIES_BOOKING_ID` int(20) NOT NULL,
  `FACILITIES_ID` int(15) NOT NULL,
  `HOUSEHOLD_ID` int(20) NOT NULL,
  `FACILITIES_BOOKING_DATE` date NOT NULL,
  `FACILITIES_EQUIPMENT_ID` int(5) DEFAULT NULL,
  `FACILITIES_BOOKING_AMOUNT` int(10) NOT NULL,
  `IS_CHECKIN` bit(1) NOT NULL,
  `IS_RETURN` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_booking_time`
--

CREATE TABLE `facilities_booking_time` (
  `FACILITIES_BOOKING_ID` int(20) NOT NULL,
  `FACILITIES_START` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_equipment`
--

CREATE TABLE `facilities_equipment` (
  `FACILITIES_EQUIPMENT_ID` int(5) NOT NULL,
  `FACILITIES_ID` int(15) NOT NULL,
  `FACILITIES_EQUIPMENT_NAME` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_EQUIPMENT_AMOUNT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_repair`
--

CREATE TABLE `facilities_repair` (
  `FACILITIES_REPAIR_ID` int(10) NOT NULL,
  `FACILITIES_ID` int(15) NOT NULL,
  `FACILITIES_REPAIR_DATE` datetime(6) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `FACILITIES_REPAIR_CONTENT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `FACILITIES_REPAIR_STATE` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `household`
--

CREATE TABLE `household` (
  `HOUSEHOLD_ID` int(20) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `HOUSEHOLD_ADD` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `POINT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `household`
--

INSERT INTO `household` (`HOUSEHOLD_ID`, `COMMUNITY_ID`, `HOUSEHOLD_ADD`, `POINT`) VALUES
(1, 1, '中正路510號1樓', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `USER_ID` int(10) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`USER_ID`, `COMMUNITY_ID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `package`
--

CREATE TABLE `package` (
  `PACKAGE_ID` int(20) NOT NULL,
  `COMMUNITY_ID` int(5) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `PACKAGE_DATE` date NOT NULL,
  `PACKAGE_TYPE` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PACKAGE_DEPOSIT` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PACKAGE_PHOTO` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IS_TAKEN` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `resident`
--

CREATE TABLE `resident` (
  `USER_ID` int(10) NOT NULL,
  `RESIDENT_GENDER` tinyint(1) NOT NULL,
  `RESIDENT_BDATE` date NOT NULL,
  `RESIDENT_PHONE` char(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resident`
--

INSERT INTO `resident` (`USER_ID`, `RESIDENT_GENDER`, `RESIDENT_BDATE`, `RESIDENT_PHONE`) VALUES
(2, 0, '2001-05-15', '0987654321');

-- --------------------------------------------------------

--
-- 資料表結構 `resident_address`
--

CREATE TABLE `resident_address` (
  `USER_ID` int(10) NOT NULL,
  `HOUSEHOLD_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `resident_address`
--

INSERT INTO `resident_address` (`USER_ID`, `HOUSEHOLD_ID`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `USER_ID` int(10) NOT NULL,
  `USER_NAME` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_ACCOUNT` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_PASSWORD` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USER_AUTHORITY` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`USER_ID`, `USER_NAME`, `USER_ACCOUNT`, `USER_PASSWORD`, `USER_AUTHORITY`) VALUES
(1, '一號管理員', 'abc123@gmail.com', '111111', '3'),
(2, '住戶一', 'def456@gmail.com', '44444444', '5');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ANNOUNCEMENT_ID`,`COMMUNITY_ID`) USING BTREE,
  ADD KEY `announcement_ibfk_1` (`COMMUNITY_ID`);

--
-- 資料表索引 `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`COMMUNITY_ID`);

--
-- 資料表索引 `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`FACILITIES_ID`,`COMMUNITY_ID`) USING BTREE,
  ADD KEY `COMMUNITY_ID` (`COMMUNITY_ID`) USING BTREE;

--
-- 資料表索引 `facilities_booking`
--
ALTER TABLE `facilities_booking`
  ADD PRIMARY KEY (`FACILITIES_BOOKING_ID`,`FACILITIES_ID`) USING BTREE,
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
  ADD PRIMARY KEY (`FACILITIES_EQUIPMENT_ID`,`FACILITIES_ID`),
  ADD KEY `FACILITIES_ID` (`FACILITIES_ID`) USING BTREE;

--
-- 資料表索引 `facilities_repair`
--
ALTER TABLE `facilities_repair`
  ADD PRIMARY KEY (`FACILITIES_REPAIR_ID`,`FACILITIES_ID`),
  ADD KEY `USER_ID` (`USER_ID`) USING BTREE,
  ADD KEY `FACILITIES_ID` (`FACILITIES_ID`) USING BTREE;

--
-- 資料表索引 `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`HOUSEHOLD_ID`,`COMMUNITY_ID`),
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
  ADD PRIMARY KEY (`PACKAGE_ID`,`COMMUNITY_ID`),
  ADD KEY `USER_ID` (`USER_ID`) USING BTREE,
  ADD KEY `COMMUNITY_ID` (`COMMUNITY_ID`);

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
-- 資料表的限制式 `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`);

--
-- 資料表的限制式 `facilities_booking`
--
ALTER TABLE `facilities_booking`
  ADD CONSTRAINT `facilities_booking_ibfk_1` FOREIGN KEY (`FACILITIES_ID`) REFERENCES `facilities` (`FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_booking_ibfk_2` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_booking_ibfk_3` FOREIGN KEY (`FACILITIES_EQUIPMENT_ID`) REFERENCES `facilities_equipment` (`FACILITIES_EQUIPMENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `facilities_repair_ibfk_1` FOREIGN KEY (`FACILITIES_ID`) REFERENCES `facilities` (`FACILITIES_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_repair_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `household`
--
ALTER TABLE `household`
  ADD CONSTRAINT `household_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_1` FOREIGN KEY (`COMMUNITY_ID`) REFERENCES `community` (`COMMUNITY_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `resident_address_ibfk_2` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
