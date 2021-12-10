-- phpMyAdmin SQL Dump
-- version 2.11.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2008 年 04 月 02 日 09:45
-- 服务器版本: 5.0.18
-- PHP 版本: 5.1.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `blog_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog_comm_info`
--

CREATE TABLE IF NOT EXISTS `blog_comm_info` (
  `id` int(11) NOT NULL auto_increment,
  `blog_id` int(11) default '0',
  `comm_name` varchar(32) NOT NULL,
  `cont` text NOT NULL,
  `add_time` datetime default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 表的结构 `blog_info`
--

CREATE TABLE IF NOT EXISTS `blog_info` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cont` text NOT NULL,
  `add_time` datetime default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 表的结构 `blog_type_info`
--

CREATE TABLE IF NOT EXISTS `blog_type_info` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `type_name` varchar(10) NOT NULL,
  `add_time` datetime default '0000-00-00 00:00:00',
  `show_order` int(10) default '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 表的结构 `manage_info`
--

CREATE TABLE IF NOT EXISTS `manage_info` (
  `id` int(11) NOT NULL auto_increment,
  `manage_user` varchar(20) NOT NULL,
  `manage_pw` varchar(32) NOT NULL,
  `last_time` datetime default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `manage_info`
--

INSERT INTO `manage_info` (`id`, `manage_user`, `manage_pw`, `last_time`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `pic_info`
--

CREATE TABLE IF NOT EXISTS `pic_info` (
  `id` int(11) NOT NULL auto_increment,
  `addr` varchar(32) NOT NULL,
  `tag` char(2) default '1',
  `target` char(2) default '0',
  `user_id` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 表的结构 `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(20) NOT NULL,
  `user_pw` varchar(32) NOT NULL,
  `tag` char(2) default '1',
  `r_time` datetime default '0000-00-00 00:00:00',
  `last_time` datetime default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

