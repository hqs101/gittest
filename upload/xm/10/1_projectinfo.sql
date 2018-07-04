-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-13 16:46:36
-- 服务器版本： 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team`
--

-- --------------------------------------------------------

--
-- 表的结构 `projectinfo`
--

DROP TABLE IF EXISTS `projectinfo`;
CREATE TABLE IF NOT EXISTS `projectinfo` (
  `pid` int(6) NOT NULL,
  `pname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `uid` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pdescribe` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `pstatus` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'on',
  `pschedule` int(3) DEFAULT '0',
  `endtime` date NOT NULL,
  `jiashaofile` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `projectinfo`
--

INSERT INTO `projectinfo` (`pid`, `pname`, `uid`, `pdescribe`, `pstatus`, `pschedule`, `endtime`, `jiashaofile`) VALUES
(1, 'frist', '1001', NULL, 'end', 0, '2018-05-31', ''),
(2, '图书管理系统', '1003', 'dsadasdasd', 'on', 0, '2018-05-31', '152552046195.txt'),
(3, '网上在线论坛', '1002', '这是一个论坛', 'on', 25, '2018-06-30', '152552052842.html'),
(4, '网上在线订餐系统', '1003', '这是一个网上订餐系统', 'on', 25, '2018-08-31', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
