-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2021-12-09 21:22:51
-- 服务器版本： 5.7.26
-- PHP 版本： 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `gender` int(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `birthday`, `avatar`) VALUES
(1, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(2, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(3, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(4, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(5, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(6, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(7, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(8, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(9, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(10, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(11, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(12, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(13, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(14, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(15, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(16, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(17, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(18, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(19, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(20, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(21, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(22, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(23, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(24, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(25, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(26, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(27, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(28, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(29, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(30, '李四', 1, '2020-12-12', './assets/img/icon-40.png'),
(31, '张三', 0, '2020-12-12', './assets/img/icon-08.png'),
(32, '李四', 1, '2020-12-12', './assets/img/icon-40.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
