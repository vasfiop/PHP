-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-07-24 13:12:33
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
-- 数据库： `board`
--

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) UNSIGNED NOT NULL COMMENT '留言内容ID',
  `reply` text COMMENT '管理员回复',
  `reply_time` varchar(20) DEFAULT NULL COMMENT '回复时间',
  `uid` int(11) NOT NULL COMMENT '关联 users 表的 uid',
  `contents` text NOT NULL COMMENT '留言内容',
  `send_time` varchar(20) NOT NULL COMMENT '发表留言时间',
  `post_ip` varchar(100) NOT NULL COMMENT '发表留言时的IP地址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`cid`, `reply`, `reply_time`, `uid`, `contents`, `send_time`, `post_ip`) VALUES
(1, NULL, '', 1, '.宋代著名学者朱熹对此章评价极高，说它是「入道之门，积德之基」。本章这三句话是人们非常熟悉的。历来的解释都是：学了以后，又时常温习和练习，不也高兴吗等等。三句话，一句一个意思，前后句子也没有什么连贯性。但也有人认为这样解释不符合原义，指出这里的「学」不是指学习，而是指学说或主张；「时」不能解为时常，而是时代或社会的意思，「习」不是温习，而是使用，引申为采用。而且，这三句话不是孤立的，而是前后相互连贯的。这三句的意思是：自己的学说，要是被社会采用了，那就太高兴了；退一步说，要是没有被社会所采用，可是很多朋友赞同我的学说，纷纷到我这里来讨论问题，我也感到快乐；再退一步说，即使社会不采用，人们也不理解我，我也不怨恨，这样做，不也就是君子吗？（见《齐鲁学刊》1986年第6期文）这种解释可以自圆其说，而且也有一定的道理，供读者在理解本章内容时参考。', '1592030801', '127.0.0.1'),
(2, '测试回复内容...', '1592470278', 2, '“海纳百川，有容乃大；壁立千仞，无欲则刚。”此联为清末政治家林则徐任两广总督时在总督府衙题书的堂联。意为：大海因为有宽广的度量才容纳了成百上千条河流；高山因为没有勾心斗角的凡世杂欲才如此的挺拔。上下联最后一字——“大”与“刚”，意思是说，这种浩然之气最伟大，最刚强，更表明了作者的至大至刚。这种海纳百川的胸怀和“壁立千仞”的刚直，来源于“无欲”。这样的气度和“无欲”情怀以及至大至刚的浩然之气，正是心理健康不可缺少的元素。\r\n\r\n做人如此，治国也可以借鉴，一个国家各个领域都兴旺发达，能接纳不同的思想，政治、经济、文化、艺术等，才能高度文明，而不是某一方面畸形发展，造成社会大众的心智的缺失，这样的国家是不会长久富强的。', '1592021773', '127.0.0.1'),
(3, NULL, '', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1592059416', '127.0.0.1'),
(4, NULL, '', 1, '学问之美，在于使人一头雾水;诗歌之美，在于煽动男女出轨;女人之美，在于蠢得无怨无悔;男人之美，在于说谎说得白日见鬼。', '1592138555', '2409:8a38:6822:c8a0:4cd0:cb47:55ee:f78f'),
(5, NULL, '', 1, '没见过草原，不知道天多高地多厚。没见过草原上的白云，不知道什么是空灵，什么是纯净。', '1592138640', '2409:8a38:6822:c8a0:4cd0:cb47:55ee:f78f'),
(6, '测试回复', '1592470060', 1, '	你见，或者不见我 我就在那里 不悲 不喜 你念，或者不念我 情就在那里 不来 不去 你爱，或者不爱我 爱就在那里 不增 不减 你跟，或者不跟我 我的手就在你手里 不舍不弃 来我的怀里， 或者 让我住进你的心里 默然相爱 寂静欢喜\r\n--扎西拉姆·多多 《班扎古鲁白玛的沉默》', '1592138764', '2409:8a38:6822:c8a0:4cd0:cb47:55ee:f78f'),
(10, NULL, '', 1, '测试', '1592190927', '2409:8a38:6822:c8a0:c45b:450c:38e2:4580'),
(11, NULL, '', 1, '测试', '1592190928', '2409:8a38:6822:c8a0:c45b:450c:38e2:4580'),
(12, NULL, '', 1, '测试', '1592190929', '2409:8a38:6822:c8a0:c45b:450c:38e2:4580'),
(14, NULL, '', 1, '测试', '1592190931', '2409:8a38:6822:c8a0:c45b:450c:38e2:4580'),
(17, NULL, '', 1, '测试', '1592190934', '2409:8a38:6822:c8a0:c45b:450c:38e2:4580'),
(18, NULL, '', 1, '测试', '1592190935', '2409:8a38:6822:c8a0:c45b:450c:38e2:4580'),
(19, NULL, '', 1, '测试', '1592190937', '2409:8a38:6822:c8a0:c45b:450c:38e2:4580'),
(20, NULL, '', 1, '测试', '1592190938', '2409:8a38:6822:c8a0:c45b:450c:38e2:4580'),
(21, NULL, '', 1, '测试', '1592190939', '2409:8a38:6822:c8a0:c45b:450c:38e2:4580'),
(24, NULL, '', 4, '下午下课了来打王者', '1592279308', '240e:ce:80bd:b054:245c:e2ad:6a2e:1fd'),
(25, '测试回复内容', '1592470365', 1, '@WDNMDY 收到。吃完午饭就来打王者', '1592279326', '2409:8a38:6822:c8a0:14fe:23d0:aa68:2fa0'),
(26, '测试管理员回复留言内容', '1592616301', 1, '再次测试留言内容，测试自己更新留言内容', '1592616277', '127.0.0.1'),
(32, 'nihao ', '1627103071', 8, '123456', '1627103008', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `user_right` int(1) NOT NULL DEFAULT '0' COMMENT '默认是0，表示的是普通用户  1:超级管理员，可以管理后台',
  `nickname` varchar(30) NOT NULL COMMENT '用户昵称',
  `summary` varchar(128) DEFAULT NULL COMMENT '个性签名',
  `password` varchar(128) NOT NULL COMMENT '用户密码，是经过双重 md5 加密的',
  `sex` int(1) NOT NULL DEFAULT '0' COMMENT '0:未知性别 1:男 2:女',
  `qq` varchar(28) DEFAULT 'QQ账号',
  `email` varchar(54) DEFAULT '邮箱',
  `reg_time` varchar(20) DEFAULT NULL COMMENT '注册时间',
  `reg_ip` varchar(100) DEFAULT NULL COMMENT '注册时的IP地址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uid`, `user_right`, `nickname`, `summary`, `password`, `sex`, `qq`, `email`, `reg_time`, `reg_ip`) VALUES
(1, 1, 'admin', '我就是我，不一样的烟火..', '12345678', 1, '12345678', '123@qq.com', '1592030801', '192.168.3.4'),
(2, 0, '有容乃大', '海纳百川，有容乃大。', '2634407844', 2, '2634407844', '2624407844@qq.com', '1592021773', '192.168.3.4'),
(3, 0, 'chuwen', '', 's1361289290', 1, '1361289290', '1361289290@qq.com', '1592110180', '127.0.0.1'),
(4, 0, 'WDNMDY', '', 'WDNMDYLQ123', 1, '979446687', '979446687@qq.com', '1592279280', '240e:ce:80bd:b054:245c:e2ad:6a2e:1fd'),
(5, 0, 'test1234', '', 'test12345678', 1, '12345', '123@qq.com', '1627011622', '127.0.0.1'),
(8, 0, 'test456', '', 'test456789', 1, '123456', '1234@qq.com', '1627102994', '127.0.0.1');

--
-- 转储表的索引
--

--
-- 表的索引 `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`) USING BTREE;

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`) USING BTREE;

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '留言内容ID', AUTO_INCREMENT=33;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
