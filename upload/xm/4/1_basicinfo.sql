-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-13 16:46:03
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
-- 表的结构 `basicinfo`
--

DROP TABLE IF EXISTS `basicinfo`;
CREATE TABLE IF NOT EXISTS `basicinfo` (
  `uid` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `sex` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `sage` int(2) DEFAULT NULL,
  `workclass` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `worktype` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `basicinfo`
--

INSERT INTO `basicinfo` (`uid`, `name`, `sex`, `sage`, `workclass`, `photo`, `worktype`) VALUES
('1002', '张强', '男', 33, '项目负责人', 'xm1.jpg', '在职'),
('1001', '李文华', '女', 25, '团队负责人', 'admin.jpg', '在职'),
('1003', '刘雯雯', '女', 22, '项目负责人', 'xm2.jpg', '在职'),
('2001', '王丽芳', '女', 25, '前端工程师', 'admin.jpg', '在职'),
('2002', '刘牛', '男', 35, '数据库工程师', 'admin.jpg', '在职'),
('2003', '王浩', '男', 37, '软件开发', 'admin.jpg', '在职'),
('2004', '向阳', '男', 35, '架构师', 'admin.jpg', '在职');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
