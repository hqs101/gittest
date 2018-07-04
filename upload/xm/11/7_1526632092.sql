-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2018-05-13 16:45:46
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
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `grade` varchar(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '3',
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `grade`, `password`) VALUES
('1003', '2', 'e10adc3949ba59abbe56e057f20f883e'),
('1001', '1', 'e10adc3949ba59abbe56e057f20f883e'),
('1002', '2', 'e10adc3949ba59abbe56e057f20f883e'),
('2001', '3', 'e10adc3949ba59abbe56e057f20f883e'),
('2002', '3', 'e10adc3949ba59abbe56e057f20f883e'),
('2003', '3', 'e10adc3949ba59abbe56e057f20f883e'),
('2004', '3', 'e10adc3949ba59abbe56e057f20f883e'),
('2005', '3', 'e10adc3949ba59abbe56e057f20f883e'),
('2006', '3', 'e10adc3949ba59abbe56e057f20f883e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
