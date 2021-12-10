-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 12 月 20 日 02:23
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `gps2`
--

-- --------------------------------------------------------

--
-- 表的结构 `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) CHARACTER SET gbk COLLATE gbk_bin NOT NULL,
  `sex` varchar(1) NOT NULL,
  `mobi` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addr` varchar(50) CHARACTER SET gbk COLLATE gbk_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `list`
--

INSERT INTO `list` (`id`, `name`, `sex`, `mobi`, `email`, `addr`) VALUES
(13, 'hfcj', '0', '1265', 'voicj', 'vnkjnbv'),
(14, 'kfjdlsk', '0', '4', 'h', 'jgf'),
(15, 'hjfbsdj', '0', 'hjdfgvjsdh', 'usf', 'fdsh'),
(16, 'fgd', '1', 'gfd', 'gfd', 'gfdfd'),
(17, 'dsadsa', '0', 'fdsaf', 'fsa', 'fsa'),
(18, 'dsadsa', '0', 'fdsaf', 'fsa', 'fsa');
