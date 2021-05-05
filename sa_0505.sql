-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021-05-05 14:33:38
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
-- 資料表結構 `announcement_info`
--

CREATE TABLE `announcement_info` (
  `ANN_ID` varchar(10) NOT NULL,
  `ANN_TITLE` varchar(10) NOT NULL,
  `ANN_DATE` datetime(6) NOT NULL,
  `ANN_TYPE` varchar(10) NOT NULL,
  `ANN_INC` varchar(10) NOT NULL,
  `ANN_CONTENT` text NOT NULL,
  `ANN_DOC` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `apartment`
--

CREATE TABLE `apartment` (
  `A_ID` varchar(5) NOT NULL,
  `A_CITY` varchar(5) NOT NULL,
  `A_DISTRICT` varchar(5) NOT NULL,
  `A_NAME` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_booking`
--

CREATE TABLE `facilities_booking` (
  `FB_ID` varchar(10) NOT NULL,
  `HOUSEHOLD_ID` varchar(10) NOT NULL,
  `F_ID` varchar(10) NOT NULL,
  `FB_DATE` date NOT NULL,
  `FBT_ID` varchar(10) DEFAULT NULL,
  `FE_ID` varchar(10) DEFAULT NULL,
  `FB_AMOUNT` int(10) NOT NULL,
  `IS_CHECKIN` bit(1) NOT NULL,
  `IS_RETURN` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_booking_time`
--

CREATE TABLE `facilities_booking_time` (
  `FBT_ID` varchar(10) NOT NULL,
  `F_ID` varchar(10) NOT NULL,
  `F_START` time(6) NOT NULL,
  `F_FINISH` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_equipment`
--

CREATE TABLE `facilities_equipment` (
  `FE_ID` varchar(10) NOT NULL,
  `F_ID` varchar(10) NOT NULL,
  `FE_NAME` varchar(10) NOT NULL,
  `FE_AMOUNT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_info`
--

CREATE TABLE `facilities_info` (
  `F_ID` varchar(10) NOT NULL,
  `A_ID` varchar(10) NOT NULL,
  `F_NAME` varchar(10) NOT NULL,
  `F_INTRODUCTION` text NOT NULL,
  `F_DESCRIPTION` text NOT NULL,
  `F_PLACE` varchar(10) NOT NULL,
  `F_TIME` time(6) NOT NULL,
  `F_POINT` int(10) DEFAULT NULL,
  `F_LIMIT` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `facilities_repair`
--

CREATE TABLE `facilities_repair` (
  `FR_ID` varchar(10) NOT NULL,
  `FR_DATE` datetime(6) NOT NULL,
  `U_ID` varchar(10) NOT NULL,
  `F_ID` varchar(10) NOT NULL,
  `FR_CONTENT` text NOT NULL,
  `FR_STATE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `household_address`
--

CREATE TABLE `household_address` (
  `HOUSEHOLD_ID` varchar(20) NOT NULL,
  `A_ID` varchar(5) NOT NULL,
  `HOUSEHOLD_ADD` varchar(30) NOT NULL,
  `POINT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `manager_info`
--

CREATE TABLE `manager_info` (
  `U_ID` varchar(10) NOT NULL,
  `A_ID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `package_info`
--

CREATE TABLE `package_info` (
  `P_ID` varchar(10) NOT NULL,
  `U_ID` varchar(10) NOT NULL,
  `P_ARRDATE` date NOT NULL,
  `P_TYPE` varchar(10) NOT NULL,
  `P_DEPOSIT` varchar(10) NOT NULL,
  `P_PHOTO` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `IS_TAKEN` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `resident_address`
--

CREATE TABLE `resident_address` (
  `U_ID` varchar(10) NOT NULL,
  `HOUSEHOLD_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `resident_info`
--

CREATE TABLE `resident_info` (
  `U_ID` varchar(10) NOT NULL,
  `R_GENDER` tinyint(1) NOT NULL,
  `R_BDATE` date NOT NULL,
  `R_PHONE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `U_ID` varchar(10) NOT NULL,
  `U_NAME` varchar(5) NOT NULL,
  `U_ACCOUNT` varchar(30) NOT NULL,
  `U_PASSWORD` varchar(30) NOT NULL,
  `U_AUTHORITY` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `announcement_info`
--
ALTER TABLE `announcement_info`
  ADD PRIMARY KEY (`ANN_ID`);

--
-- 資料表索引 `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`A_ID`);

--
-- 資料表索引 `facilities_booking`
--
ALTER TABLE `facilities_booking`
  ADD PRIMARY KEY (`FB_ID`),
  ADD KEY `HOUSEHOLD_ID` (`HOUSEHOLD_ID`),
  ADD KEY `F_ID` (`F_ID`),
  ADD KEY `FBT_ID` (`FBT_ID`),
  ADD KEY `FE_ID` (`FE_ID`);

--
-- 資料表索引 `facilities_booking_time`
--
ALTER TABLE `facilities_booking_time`
  ADD PRIMARY KEY (`FBT_ID`),
  ADD KEY `facilities_booking_time_ibfk_1` (`F_ID`);

--
-- 資料表索引 `facilities_equipment`
--
ALTER TABLE `facilities_equipment`
  ADD PRIMARY KEY (`FE_ID`),
  ADD KEY `F_ID` (`F_ID`);

--
-- 資料表索引 `facilities_info`
--
ALTER TABLE `facilities_info`
  ADD PRIMARY KEY (`F_ID`),
  ADD KEY `A_ID` (`A_ID`);

--
-- 資料表索引 `facilities_repair`
--
ALTER TABLE `facilities_repair`
  ADD PRIMARY KEY (`FR_ID`),
  ADD KEY `U_ID` (`U_ID`),
  ADD KEY `F_ID` (`F_ID`);

--
-- 資料表索引 `household_address`
--
ALTER TABLE `household_address`
  ADD PRIMARY KEY (`HOUSEHOLD_ID`),
  ADD KEY `household_address_ibfk_1` (`A_ID`);

--
-- 資料表索引 `manager_info`
--
ALTER TABLE `manager_info`
  ADD PRIMARY KEY (`U_ID`),
  ADD KEY `A_ID` (`A_ID`);

--
-- 資料表索引 `package_info`
--
ALTER TABLE `package_info`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `U_ID` (`U_ID`);

--
-- 資料表索引 `resident_address`
--
ALTER TABLE `resident_address`
  ADD PRIMARY KEY (`U_ID`,`HOUSEHOLD_ID`),
  ADD KEY `resident_address_ibfk_2` (`HOUSEHOLD_ID`);

--
-- 資料表索引 `resident_info`
--
ALTER TABLE `resident_info`
  ADD PRIMARY KEY (`U_ID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_ID`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `facilities_booking`
--
ALTER TABLE `facilities_booking`
  ADD CONSTRAINT `facilities_booking_ibfk_1` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household_address` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_booking_ibfk_2` FOREIGN KEY (`F_ID`) REFERENCES `facilities_info` (`F_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_booking_ibfk_3` FOREIGN KEY (`FBT_ID`) REFERENCES `facilities_booking_time` (`FBT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_booking_ibfk_4` FOREIGN KEY (`FE_ID`) REFERENCES `facilities_equipment` (`FE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `facilities_booking_time`
--
ALTER TABLE `facilities_booking_time`
  ADD CONSTRAINT `facilities_booking_time_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `facilities_info` (`F_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `facilities_equipment`
--
ALTER TABLE `facilities_equipment`
  ADD CONSTRAINT `facilities_equipment_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `facilities_info` (`F_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `facilities_info`
--
ALTER TABLE `facilities_info`
  ADD CONSTRAINT `facilities_info_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `apartment` (`A_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `facilities_repair`
--
ALTER TABLE `facilities_repair`
  ADD CONSTRAINT `facilities_repair_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facilities_repair_ibfk_2` FOREIGN KEY (`F_ID`) REFERENCES `facilities_info` (`F_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `household_address`
--
ALTER TABLE `household_address`
  ADD CONSTRAINT `household_address_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `apartment` (`A_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `manager_info`
--
ALTER TABLE `manager_info`
  ADD CONSTRAINT `manager_info_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manager_info_ibfk_2` FOREIGN KEY (`A_ID`) REFERENCES `apartment` (`A_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `package_info`
--
ALTER TABLE `package_info`
  ADD CONSTRAINT `package_info_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `resident_address`
--
ALTER TABLE `resident_address`
  ADD CONSTRAINT `resident_address_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resident_address_ibfk_2` FOREIGN KEY (`HOUSEHOLD_ID`) REFERENCES `household_address` (`HOUSEHOLD_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `resident_info`
--
ALTER TABLE `resident_info`
  ADD CONSTRAINT `resident_info_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `user` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
