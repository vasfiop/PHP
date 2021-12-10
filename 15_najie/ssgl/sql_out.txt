-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2011 年 05 月 15 日 23:16
-- 服务器版本: 4.1.9
-- PHP 版本: 4.3.10
-- 
-- 数据库: `bl_db`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `admin`
-- 

CREATE TABLE `admin` (
  `id` int(20) NOT NULL auto_increment,
  `username` varchar(100) character set gbk NOT NULL default '',
  `pwd` varchar(200) character set gbk NOT NULL default '',
  `list` varchar(10) character set gbk NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=koi8u AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `admin`
-- 

INSERT INTO `admin` VALUES (1, 'admin', '202cb962ac59075b964b07152d234b70', '管理员');
INSERT INTO `admin` VALUES (2, '123', '202cb962ac59075b964b07152d234b70', '管理员');

-- --------------------------------------------------------

-- 
-- 表的结构 `bjgl`
-- 

CREATE TABLE `bjgl` (
  `id` int(100) NOT NULL auto_increment,
  `xh` varchar(50) character set gbk NOT NULL default '',
  `zy` varchar(60) character set gbk NOT NULL default '',
  `bj` varchar(60) character set gbk NOT NULL default '',
  `c` varchar(20) character set gbk NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `bjgl`
-- 

INSERT INTO `bjgl` VALUES (1, '计算机', '现代教育', '1', '2011.10');
INSERT INTO `bjgl` VALUES (2, '32432', '324', '23432', '324');
INSERT INTO `bjgl` VALUES (3, '的萨芬', '发大水啊', '的萨芬', '的萨芬');

-- --------------------------------------------------------

-- 
-- 表的结构 `chengji`
-- 

CREATE TABLE `chengji` (
  `id` int(100) NOT NULL auto_increment,
  `xh` varchar(50) NOT NULL default '',
  `yy` varchar(20) character set gbk NOT NULL default '',
  `c` varchar(20) character set gbk NOT NULL default '',
  `wl` varchar(20) character set gbk NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `xh_2` (`xh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- 
-- 导出表中的数据 `chengji`
-- 

INSERT INTO `chengji` VALUES (18, '23', '213', '213', '213');
INSERT INTO `chengji` VALUES (19, '702', '男', '7单元', '2011');
INSERT INTO `chengji` VALUES (20, '234', '324', '324', '324');
INSERT INTO `chengji` VALUES (21, '342', '234', '324', '342');
INSERT INTO `chengji` VALUES (23, '302', '女', '5单元', '20110912');
INSERT INTO `chengji` VALUES (24, '567', '女', '南大楼', '20110920');

-- --------------------------------------------------------

-- 
-- 表的结构 `gg`
-- 

CREATE TABLE `gg` (
  `id` int(100) NOT NULL auto_increment,
  `xh` varchar(50) character set gbk NOT NULL default '',
  `yy` varchar(60) character set gbk NOT NULL default '',
  `c` varchar(20) character set gbk NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `gg`
-- 

INSERT INTO `gg` VALUES (1, '', '最近几天要下大雨，请各位同学好防备。', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `liub_user`
-- 

CREATE TABLE `liub_user` (
  `name` varchar(20) NOT NULL default '',
  `pwd` varchar(20) NOT NULL default '',
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- 
-- 导出表中的数据 `liub_user`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `pfb`
-- 

CREATE TABLE `pfb` (
  `id` int(100) NOT NULL auto_increment,
  `xh` varchar(50) NOT NULL default '',
  `yy` varchar(20) character set gbk NOT NULL default '',
  `c` varchar(20) character set gbk NOT NULL default '',
  `wl` varchar(20) character set gbk NOT NULL default '',
  `gs` varchar(10) character set gbk NOT NULL default '',
  `jd` varchar(40) character set gbk NOT NULL default '',
  `ly` varchar(20) character set gbk NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `pfb`
-- 

INSERT INTO `pfb` VALUES (5, '201', '', '3', '80', '2011', '班亮', '班亮');
INSERT INTO `pfb` VALUES (6, '201', '', '1', '90', '20110908', '班亮', '班亮');

-- --------------------------------------------------------

-- 
-- 表的结构 `shdj`
-- 

CREATE TABLE `shdj` (
  `id` int(100) NOT NULL auto_increment,
  `xh` varchar(50) character set gbk NOT NULL default '',
  `xm` varchar(60) character set gbk NOT NULL default '',
  `jd` varchar(20) character set gbk NOT NULL default '',
  `lb` varchar(50) character set gbk NOT NULL default '',
  `qsh` varchar(50) character set gbk NOT NULL default '',
  `jrj` varchar(60) character set gbk NOT NULL default '',
  `yy` text character set gbk NOT NULL,
  `c` varchar(20) character set gbk NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `shdj`
-- 

INSERT INTO `shdj` VALUES (1, '4324', '432', '3214', '234', '324', '2341', '32414', '32414');
INSERT INTO `shdj` VALUES (2, '234', '23432', '234', '324', '14234', '2344', '23144', '23414');
INSERT INTO `shdj` VALUES (3, '12', '班亮', '232', '女', '12', '8', '桌椅损坏', '20110912');
INSERT INTO `shdj` VALUES (4, '200830811002', '安德胜', '6单元', '男', '201', '8', '门窗损坏', '2011');

-- --------------------------------------------------------

-- 
-- 表的结构 `user`
-- 

CREATE TABLE `user` (
  `id` int(10) NOT NULL auto_increment,
  `xh` varchar(20) default NULL,
  `username` varchar(20) character set gbk default NULL,
  `pwd` varchar(200) character set gbk default NULL,
  `bj` varchar(50) character set gbk default NULL,
  `jg` varchar(50) character set gbk default NULL,
  `sfzh` varchar(50) character set gbk default NULL,
  `csly` varchar(50) character set gbk default NULL,
  `zymc` text character set gbk,
  `addss` text character set gbk,
  `tel` varchar(50) default NULL,
  `sex` varchar(10) character set gbk default NULL,
  `list` varchar(20) character set gbk default NULL,
  `mz` varchar(20) character set gbk default NULL,
  `xb` varchar(20) character set gbk default NULL,
  `lb` varchar(20) character set gbk default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312 AUTO_INCREMENT=126 ;

-- 
-- 导出表中的数据 `user`
-- 

INSERT INTO `user` VALUES (125, '200830811002', '李四', '202cb962ac59075b964b07152d234b70', '08（1）', '6单元201', '213321', '213213', '现代教育技术', '兴义', '32444325', '男', '学 生', '汉族', '英语系', '城市');
INSERT INTO `user` VALUES (124, '200830811001', '班亮', '202cb962ac59075b964b07152d234b70', '08教育1班', '6单元201', '213313213123', '19900801', '现代教育技术', '兴义市', '213123213', '男', '学 生', '汉族', '计科系', '农村');

-- --------------------------------------------------------

-- 
-- 表的结构 `users`
-- 

CREATE TABLE `users` (
  `name` varchar(20) NOT NULL default '',
  `bt` varchar(20) NOT NULL default '',
  `email` varchar(20) NOT NULL default '',
  `nr` text NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- 
-- 导出表中的数据 `users`
-- 

INSERT INTO `users` VALUES ('班亮', '你好', '', '你好你好好你哦啊的设计开发链接  额大幅');
INSERT INTO `users` VALUES ('亲王德福德文', '额外人', '', '额外范围 ');

-- --------------------------------------------------------

-- 
-- 表的结构 `zd`
-- 

CREATE TABLE `zd` (
  `id` int(100) NOT NULL auto_increment,
  `xh` varchar(50) character set gbk NOT NULL default '',
  `yy` text character set gbk NOT NULL,
  `c` varchar(20) character set gbk NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `zd`
-- 

        