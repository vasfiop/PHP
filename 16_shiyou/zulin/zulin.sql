-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-10-23 13:38:43
-- 服务器版本： 5.7.26
-- PHP 版本： 5.6.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `dc_zulin`
--

-- --------------------------------------------------------

--
-- 表的结构 `dc_car`
--

CREATE TABLE `dc_car` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `classify` varchar(128) DEFAULT NULL,
  `chepai` varchar(128) DEFAULT NULL,
  `money` double(16,0) DEFAULT NULL,
  `paytime` datetime DEFAULT NULL,
  `zhuangkuang` text,
  `biaozhun` double(16,0) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dc_car`
--

INSERT INTO `dc_car` (`id`, `name`, `classify`, `chepai`, `money`, `paytime`, `zhuangkuang`, `biaozhun`, `createtime`, `updatetime`) VALUES
(5, '王总的车', '奔驰', '鲁VG8568', 1000000, '2020-05-27 00:00:00', '良好', 5000, 1590895606, 1590895732),
(7, '小轿车1', '宝马', '粤WE957', 700000, '2020-06-04 00:00:00', '良好', 2000, 1591191488, NULL),
(8, '小轿车2', '大众', '鲁VB7723', 300000, '2005-03-03 00:00:00', '良好', 500, 1591191748, NULL),
(10, '兰博基尼', '跑车', '京A-88888', 1000000, '2021-10-23 13:14:24', '良好2', 3000, 1634966075, 1634966097);

-- --------------------------------------------------------

--
-- 表的结构 `dc_kehu`
--

CREATE TABLE `dc_kehu` (
  `bid` int(11) NOT NULL,
  `sfz` varchar(218) DEFAULT NULL,
  `kname` varchar(218) DEFAULT NULL,
  `sex` varchar(128) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL,
  `address` varchar(218) DEFAULT NULL,
  `phone` varchar(36) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dc_kehu`
--

INSERT INTO `dc_kehu` (`bid`, `sfz`, `kname`, `sex`, `date`, `address`, `phone`) VALUES
(3, '111333', '客户1', '男', '1998-05-08', '潍坊', '13746565576'),
(4, '222444', '客户2', '女', '1997-07-04', '深圳', '13723454467');

-- --------------------------------------------------------

--
-- 表的结构 `dc_menu`
--

CREATE TABLE `dc_menu` (
  `id` int(3) NOT NULL,
  `href` varchar(80) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `pid` smallint(5) DEFAULT '0' COMMENT '父ID',
  `icon` varchar(50) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT '0' COMMENT '排序',
  `spread` tinyint(2) DEFAULT '0' COMMENT '默认展开 0:false   1:true'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dc_menu`
--

INSERT INTO `dc_menu` (`id`, `href`, `title`, `pid`, `icon`, `sort`, `spread`) VALUES
(1, '', '后台首页', 0, '&#xe68e;', 0, 1),
(2, '', '系统维护', 0, '&#xe716;', 5, 1),
(3, '/admin.php/Menu/index', '界面管理', 2, '&#xe653;', 2, 0),
(4, '/admin.php/Index/main', '后台首页', 1, '&#xe68e;', 0, 1),
(5, '/admin.php/Index/pwd', '修改密码', 1, '&#xe716;', 1, 0),
(7, '/admin.php/User/index', '用户管理', 26, '&#xe612;', 0, 0),
(8, '/admin.php/Role/index', '权限管理', 2, '&#xe716;', 1, 0),
(30, '/admin.php/Tongji/index', '统计汇总', 27, '&#xe653;', 0, 0),
(29, '/admin.php/Zulin/index', '车辆租赁', 28, '&#xe653;', 0, 0),
(26, '', '用户管理', 0, '&#xe612;', 3, 1),
(27, '', '报表信息', 0, '&#xe653;', 4, 1),
(28, '', '车辆租赁', 0, '&#xe653;', 2, 1),
(16, '', '车辆管理', 0, '&#xe653;', 1, 1),
(25, '/admin.php/Car/index', '车辆管理', 16, '&#xe653;', 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dc_role`
--

CREATE TABLE `dc_role` (
  `id` int(3) NOT NULL,
  `name` varchar(36) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dc_role`
--

INSERT INTO `dc_role` (`id`, `name`, `createtime`, `updatetime`) VALUES
(3, '司机', 1579252636, 1590890712),
(1, '系统管理员', 1579253528, 1591075553),
(2, '管理员', 1579402607, 1591075591),
(4, '客户', 1590890727, 1590890727);

-- --------------------------------------------------------

--
-- 表的结构 `dc_role_menu`
--

CREATE TABLE `dc_role_menu` (
  `rid` int(3) NOT NULL,
  `mid` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dc_role_menu`
--

INSERT INTO `dc_role_menu` (`rid`, `mid`) VALUES
(1, 3),
(1, 8),
(1, 2),
(1, 30),
(1, 27),
(1, 7),
(1, 26),
(1, 29),
(2, 1),
(2, 4),
(2, 5),
(2, 16),
(2, 25),
(2, 28),
(2, 29),
(2, 26),
(2, 7),
(2, 27),
(2, 30),
(1, 28),
(1, 25),
(1, 16),
(1, 5),
(1, 4),
(1, 1),
(3, 1),
(3, 4),
(3, 5),
(3, 16),
(3, 25),
(3, 27),
(3, 30),
(4, 1),
(4, 4),
(4, 5),
(4, 28),
(4, 29);

-- --------------------------------------------------------

--
-- 表的结构 `dc_siji`
--

CREATE TABLE `dc_siji` (
  `bid` int(11) NOT NULL,
  `sfz` varchar(218) DEFAULT NULL,
  `kname` varchar(218) DEFAULT NULL,
  `sex` varchar(128) DEFAULT NULL,
  `date` varchar(128) DEFAULT NULL,
  `address` varchar(218) DEFAULT NULL,
  `phone` varchar(36) DEFAULT NULL,
  `jiashizheng` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dc_siji`
--

INSERT INTO `dc_siji` (`bid`, `sfz`, `kname`, `sex`, `date`, `address`, `phone`, `jiashizheng`) VALUES
(6, '111111', '司机1', '男', '1985-06-05', '北京', '15284756876', '1113733445'),
(7, '222222', '司机2', '男', '1983-09-07', '上海', '13717912567', '2223733886');

-- --------------------------------------------------------

--
-- 表的结构 `dc_system`
--

CREATE TABLE `dc_system` (
  `id` varchar(36) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `jane_name` varchar(36) DEFAULT NULL,
  `footer` varchar(128) DEFAULT NULL,
  `footer_url` varchar(218) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dc_system`
--

INSERT INTO `dc_system` (`id`, `name`, `jane_name`, `footer`, `footer_url`) VALUES
('system', '汽车租赁', '汽车租赁', '2021', 'www.zulin.com:81/admin.php');

-- --------------------------------------------------------

--
-- 表的结构 `dc_user`
--

CREATE TABLE `dc_user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(36) COLLATE utf8_bin DEFAULT NULL COMMENT '名字',
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `bid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `dc_user`
--

INSERT INTO `dc_user` (`id`, `username`, `password`, `name`, `createtime`, `updatetime`, `rid`, `bid`) VALUES
(1, 'admin', 'LiqjxJQv3hu8tIx8_KCvkMzYlXP', '超管', NULL, 1587814256, 1, NULL),
(13, 'gl1', 'PYvAeoKLP8pDUPMVJnm3eIooqbF', '管理员1', 1587804929, 1591192413, 2, NULL),
(14, 'kh1', 'vJ5oCiznwBIrqDJzSEYYEUBL7F2', '客户1', 1591073863, 1591192251, 4, 3),
(15, 'sj1', 'VrxDv5HlaBSnr86ZaQP6Tuo-z3e', '司机1', 1591074596, 1591192188, 3, 6),
(16, 'kh2', 'NRjLhjYFJkWELRkJOGqa2N2gfZ-', '客户2', 1591192528, NULL, 4, 4),
(17, 'sj2', '4uuUH5CeonC6h6zmc4uTpEP4-Eb', '司机2', 1591192751, NULL, 3, 7);

-- --------------------------------------------------------

--
-- 表的结构 `dc_zulin`
--

CREATE TABLE `dc_zulin` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `kid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `kaishi` datetime DEFAULT NULL,
  `jieshu` datetime DEFAULT NULL,
  `money` double(16,0) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0' COMMENT '退租1  结算2  还车3'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dc_zulin`
--

INSERT INTO `dc_zulin` (`id`, `sid`, `kid`, `cid`, `kaishi`, `jieshu`, `money`, `status`) VALUES
(3, 15, 14, 5, '2020-06-02 00:00:00', '2020-06-19 00:00:00', 10000, 3),
(4, 15, 14, 5, '2020-06-02 00:00:00', '2020-06-26 00:00:00', 2, 1),
(7, 17, 16, 9, '2020-04-03 00:00:00', '2020-08-03 00:00:00', 8000, 1),
(8, 15, 14, 10, '2021-10-23 13:27:25', '2021-10-29 00:00:00', 5000, 2),
(9, 15, 14, 10, '2021-10-23 13:28:03', '2021-10-30 00:00:00', 1000, 1);

--
-- 转储表的索引
--

--
-- 表的索引 `dc_car`
--
ALTER TABLE `dc_car`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `dc_kehu`
--
ALTER TABLE `dc_kehu`
  ADD PRIMARY KEY (`bid`);

--
-- 表的索引 `dc_menu`
--
ALTER TABLE `dc_menu`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `dc_role`
--
ALTER TABLE `dc_role`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `dc_siji`
--
ALTER TABLE `dc_siji`
  ADD PRIMARY KEY (`bid`);

--
-- 表的索引 `dc_system`
--
ALTER TABLE `dc_system`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `dc_user`
--
ALTER TABLE `dc_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`username`);

--
-- 表的索引 `dc_zulin`
--
ALTER TABLE `dc_zulin`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `dc_car`
--
ALTER TABLE `dc_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `dc_kehu`
--
ALTER TABLE `dc_kehu`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `dc_menu`
--
ALTER TABLE `dc_menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用表AUTO_INCREMENT `dc_role`
--
ALTER TABLE `dc_role`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `dc_siji`
--
ALTER TABLE `dc_siji`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `dc_user`
--
ALTER TABLE `dc_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `dc_zulin`
--
ALTER TABLE `dc_zulin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
