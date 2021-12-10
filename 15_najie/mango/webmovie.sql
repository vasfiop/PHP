CREATE TABLE `ticket`(
  `ID` int(11) NOT NULL auto_increment,
  `SEATID` int(11) NOT NULL default '0',
  `PRODUCTID` int(11) NOT NULL default '0',
  `CUSTOMERID` int(11) NOT NULL default '0',
  `TIME` datetime,
  `FLAG` char(1) NOT NULL default '0',
  `ORDERTIME` datetime,
  PRIMARY KEY  (`ID`)
);

CREATE TABLE `seat`(
  `ID` int(11) NOT NULL auto_increment,
  `CINEMA` varchar(60) NOT NULL default '',
  `ROOM` varchar(60) NOT NULL default '',
  `SEATNUM` int(4) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
);

CREATE TABLE `category` (
  `ID` int(11) NOT NULL auto_increment,
  `DESC` varchar(40) NOT NULL default '',
  `GROUPID` varchar(11) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) ;

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL auto_increment,
  `LOGINNAME` varchar(20) NOT NULL default '',
  `PASSWORD` varchar(15) NOT NULL default '',
  `LASTNAME` varchar(50) NOT NULL default '',
  `MIDDLENAME` varchar(10) NOT NULL default '',
  `INITIALS` varchar(10) NOT NULL default '',
  `IP` varchar(20) NOT NULL default '',
  `ADDRESS` varchar(100) NOT NULL default '',
  `ZIP` varchar(20) NOT NULL default '',
  `CITY` varchar(75) NOT NULL default '',
  `PHONE` varchar(30) NOT NULL default '',
  `EMAIL` varchar(75) NOT NULL default '',
  `GROUP` varchar(15) NOT NULL default 'CUSTOMER',
  `COUNTRY` varchar(75) NOT NULL default '',
  `COMPANY` varchar(75) NOT NULL default '',
  `JOINDATE` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) ;

CREATE TABLE `group` (
  `ID` int(11) NOT NULL auto_increment,
  `NAME` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`ID`)
) ;

CREATE TABLE `order` (
  `ID` int(11) NOT NULL auto_increment,
  `DATE` varchar(20) NOT NULL default '',
  `STATUS` tinyint(1) NOT NULL default '0',
  `SHIPPING` tinyint(1) NOT NULL default '0',
  `PAYMENT` tinyint(1) NOT NULL default '0',
  `CUSTOMERID` int(11) NOT NULL default '0',
  `TOPAY` double NOT NULL default '0',
  `WEBID` varchar(25) default NULL,
  `NOTES` longtext,
  PRIMARY KEY  (`ID`)
) ;

CREATE TABLE `product` (
  `ID` int(11) NOT NULL auto_increment,
  `PRODUCTID` varchar(60) NOT NULL default '0',
  `CATID` int(11) NOT NULL default '0',
  `DESCRIPTION` longtext NOT NULL,
  `PRICE` double NOT NULL default '0',
  `STOCK` int(1) default NULL,
  `FRONTPAGE` tinyint(1) NOT NULL default '0',
  `NEW` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`ID`)
) ;

CREATE TABLE `settings` (
  `theme` varchar(50) default NULL,
  `send_default_country` varchar(50) default NULL,
  `sendcosts_default_country` double default NULL,
  `sendcosts_other_country` double default NULL,
  `rembours_costs` double default NULL,
  `currency` varchar(10) default NULL,
  `currency_symbol` varchar(10) default NULL,
  `paymentdays` tinyint(4) default NULL,
  `vat` double default NULL,
  `show_vat` varchar(10) default NULL,
  `db_prices_including_vat` tinyint(1) default NULL,
  `sales_mail` varchar(50) default NULL,
  `shopname` varchar(100) default NULL,
  `shopurl` varchar(100) default NULL,
  `default_lang` char(2) default NULL,
  `order_prefix` varchar(10) default NULL,
  `order_suffix` varchar(10) default NULL,
  `stock_enabled` tinyint(1) default NULL,
  `ordering_enabled` tinyint(1) default NULL,
  `shop_disabled` tinyint(1) default NULL,
  `shop_disabled_title` varchar(50) default NULL,
  `shop_disabled_reason` varchar(100) default NULL,
  `webmaster_mail` varchar(50) default NULL,
  `shoptel` varchar(50) default NULL,
  `shopfax` varchar(50) default NULL,
  `bankaccount` varchar(50) default NULL,
  `bankaccountowner` varchar(50) default NULL,
  `bankcity` varchar(50) default NULL,
  `bankcountry` varchar(50) default NULL,
  `bankname` varchar(50) default NULL,
  `bankiban` varchar(50) default NULL,
  `bankbic` varchar(50) default NULL,
  `start_year` int(4) default NULL,
  `shop_logo` varchar(50) default NULL,
  `background` varchar(50) default NULL,
  `slogan` varchar(200) default NULL,
  `page_title` varchar(200) default NULL,
  `page_footer` varchar(100) default NULL,
  `shipping_postal` tinyint(1) default NULL,
  `shipping_atstore` tinyint(1) default NULL,
  `shipping_unused` tinyint(1) default NULL,
  `number_format` varchar(8) default NULL,
  `max_description` tinyint(2) default NULL,
  `no_vat` tinyint(1) default NULL,
  `pricelist_format` tinyint(1) default NULL,
  `date_format` varchar(15) default NULL,
  `search_prodgfx` tinyint(1) default NULL,
  `use_prodgfx` tinyint(1) default NULL,
  `pay_bank` tinyint(1) default NULL,
  `pay_atstore` tinyint(1) default NULL,
  `pay_paypal` tinyint(1) default NULL,
  `pay_onreceive` tinyint(1) default NULL,
  `pay_unused` tinyint(1) default NULL,
  `paypal_email` varchar(100) default NULL,
  `paypal_currency` char(3) default NULL,
  `thumbs_in_pricelist` tinyint(1) default NULL,
  `keywords` varchar(200) default NULL,
  `charset` varchar(50) default NULL,
  `conditions_page` tinyint(1) default NULL,
  `guarantee_page` tinyint(1) default NULL,
  `shipping_page` tinyint(1) default NULL,
  `pictureid` tinyint(1) default NULL,
  `aboutus_page` tinyint(1) default NULL,
  `live_news` tinyint(1) default NULL,
  `pricelist_thumb_width` tinyint(2) default NULL,
  `pricelist_thumb_height` tinyint(2) default NULL,
  `category_thumb_width` tinyint(2) default NULL,
  `category_thumb_height` tinyint(2) default NULL,
  `product_max_width` int(5) default NULL,
  `product_max_height` int(5) default NULL
) ;


CREATE TABLE `payment` (
  `id` int(11) NOT NULL auto_increment,
  `description` varchar(150) default NULL,
  `code` longtext,
  `system` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ;


INSERT INTO `customer` VALUES (1, 'admin', 'admin', 'ADMIN', '', '', '', '', '', '123456789987654321', '', 'mango@hit.edu.cn', 'ADMIN', '', '', '');


INSERT INTO `group` VALUES (1, '正在热播');
INSERT INTO `group` VALUES (2, '即将上映');


INSERT INTO `category` VALUES (1, '爱情片', '1');
INSERT INTO `category` VALUES (2, '动画片', '1');
INSERT INTO `category` VALUES (3, '动作片', '1');
INSERT INTO `category` VALUES (4, '科幻片', '1');
INSERT INTO `category` VALUES (5, '爱情片', '2');
INSERT INTO `category` VALUES (6, '动画片', '2');
INSERT INTO `category` VALUES (7, '动作片', '2');
INSERT INTO `category` VALUES (8, '科幻片', '2');


INSERT INTO `product` VALUES (1, '风云2', 3, '导演: 彭顺 / 彭发<br />
编剧: 彭顺 / 彭发 / 彭柏成 / 秋逸<br />
主演: 郭富城 / 郑伊健 / 蔡卓妍 / 唐嫣 / 谢霆锋 / 任达华 / 何家劲 / 谭耀文 / 林雪<br />
类型: 动作 / 冒险 / 奇幻<br />
官方网站: http://www.thestormwarriors.com/<br />
制片国家/地区: 香港 / 中国<br />
语言: 粤语<br />
上映日期: 2011-06-25<br />
又名: 风云之皇者降临 / The Storm Warriors

风云2的剧情简介 · · · · · · 
　　绝无神（任达华 饰）及其子绝心（谢霆锋 饰），投毒暗算中原武林，无名（何家劲 饰）、步惊云（郭富城 饰）成阶下囚。聂风（郑伊健 饰）闻讯赶到，与步惊云联手攻击，均遭重创。无名单挑绝无神，使用万剑归宗也无济于事。为破强敌，聂风、步惊云、楚楚（唐嫣饰）一起来拜谒魔道高人，但直到第二梦（蔡卓妍 饰）出现，才引得高人现身，但他双臂已断，功力也大不如前。为了破敌，聂风愿身堕魔戒，增强功力。而步惊云则师从无名，创建了新派剑道。此时，绝无神生擒了中州皇帝（谭耀文 饰）来到凌云窟。绝心用残酷逼皇帝说出龙骨所在。千钧一发之际，风云先后赶到，一场江湖对决，由此展开……
　　本片根据马荣成畅销漫画《风云》改编，为10年前刘伟强版《风云雄霸天下》的续集，导演是擅长恐怖片的彭氏两兄弟。', 50, 1, 0, 1);


INSERT INTO `product` VALUES (2, '将爱', 1, '导演: 张一白<br />
编剧: 沈巍 / 邢爱娜 / 某小丫 / 黄子珈<br />
主演: 李亚鹏 / 徐静蕾 / 王学兵 / 杜汶泽 / 何洁 / 程伊 / 崔达志 / 岳小军 / 陈明 / 宁浩 / 冯砾 / 王芸 / 曹卫宇 / 赵薇<br />
类型: 剧情 / 爱情<br />
制片国家/地区: 中国大陆<br />
语言: 汉语普通话<br />
上映日期: 2011-06-25(中国大陆)<br />
片长: 103分钟<br />
又名: 将爱 / 将爱情进行到底<br /><br />


将爱情进行到底的剧情简介 · · · · · · <br />
    本片分三个章节，分别展现了杨峥（李亚鹏 饰）与文慧（徐静蕾 饰）在12年后的别样生活。第一章：杨峥与文慧在北京结婚多年，虽然物质生活已经让杨峥兑现了对文慧的承诺，但是精神方面却渐行渐远。终于在一次聚会后，杨峥第一次离家出走……第二章：大家在上海组织同学聚会，主办者分别邀请了汽车修理工杨峥和售货员文慧。前者正在与前妻闹离婚，而后者也是单独抚养一对双胞胎儿子。在聚会上，他们在同学们的怂恿下，又一次走进了对方……第三章：深夜里，杨峥接到了文慧的越洋电话。她在电话里哭着唱生日歌，令杨峥下定决心来法国找他。然而，在波尔多车站，杨峥才赫然发现文慧来接的不是自己，而是一个年轻的女孩，他们在葡萄庄园里享受美酒，但是杨峥却逐渐发现了文慧痛苦的根源……<br />
    本片是1998年电视剧版的电影版续集，由原班人马打造。王菲、陈奕迅倾情献歌《因为爱情》。', 50, 1, 0, 1);


INSERT INTO `product` VALUES (3, '功夫熊猫2',6, '导演: 詹妮弗·余<br />
编剧: 乔纳森·阿贝尔 / 格伦·伯杰<br />
主演: 杰克·布莱克 / 安吉丽娜·朱莉 / 杨紫琼 / 加里·奥德曼 / 成龙 / 塞斯·罗根 / 刘玉玲 / 大卫·克罗斯 / 詹姆斯·洪 / 达斯汀·霍夫曼 / 尚格·云顿 / 丹尼斯·海斯伯特 / 维克多·加博 / 丹尼·麦克布耐德<br />
类型: 喜剧 / 动作 / 动画 / 冒险 / 家庭<br />
官方网站: www.kungfupanda.com<br />
制片国家/地区: 美国<br />
语言: 英语<br />
上映日期: 2011-07-01(美国) / 2011-05-28(中国大陆)<br />
片长: 91分钟<br /><br />

功夫熊猫2的剧情简介 · · · · · · <br />
　　熊猫阿宝 Po（杰克·布莱克 Jack Black 配音）终于美梦成真成为了神龙大侠，跟随功夫大师 Master Shifu（达斯汀·霍夫曼 Dustin Hoffman 配音）与盖世五侠：悍娇虎 Tigress（安吉丽娜·朱莉 Angelina Jolie 配音）、猴王 Monkey（成龙 Jackie Chan 配音）、快螳螂 Mantis（塞斯·罗根 Seth Rogen 配音）、俏小龙 Viper（刘玉玲 Lucy Liu 配音）、灵鹤 Crane（大卫·克罗斯 David Cross 配音）一起保护着和平谷、过着宁静的生活。然而，好景不长，有个邪恶的坏人沈王爷 Lord Shen（加里·奥德曼 Gary Oldman 配音）正打算用无人能挡的机密武器征服中国并且毁灭功夫，阿宝面临着一次新的、更加可怕的挑战，在羊仙姑 Soothsayer（杨紫琼 Michelle Yeoh 配音）的指引下，他必须回首过去并揭开自身的生世之谜，才能找到打败敌人的致胜关键力量。', 60, 1, 0, 1);


INSERT INTO `settings` (`theme`, `send_default_country`, `sendcosts_default_country`, `sendcosts_other_country`, `rembours_costs`, `currency`, `currency_symbol`, `paymentdays`, `vat`, `show_vat`, `db_prices_including_vat`, `sales_mail`, `shopname`, `shopurl`, `default_lang`, `order_prefix`, `order_suffix`, `stock_enabled`, `ordering_enabled`, `shop_disabled`, `shop_disabled_title`, `shop_disabled_reason`, `webmaster_mail`, `shoptel`, `shopfax`, `bankaccount`, `bankaccountowner`, `bankcity`, `bankcountry`, `bankname`, `bankiban`, `bankbic`, `start_year`, `shop_logo`, `background`, `slogan`, `page_title`, `page_footer`, `shipping_postal`, `shipping_atstore`, `shipping_unused`, `number_format`, `max_description`, `no_vat`, `pricelist_format`, `date_format`, `search_prodgfx`, `use_prodgfx`, `pay_bank`, `pay_atstore`, `pay_paypal`, `pay_onreceive`, `pay_unused`, `paypal_email`, `paypal_currency`, `thumbs_in_pricelist`, `keywords`, `charset`, `conditions_page`, `guarantee_page`, `shipping_page`, `pictureid`, `aboutus_page`, `live_news`, `pricelist_thumb_width`, `pricelist_thumb_height`, `category_thumb_width`, `category_thumb_height`, `product_max_width`, `product_max_height`) VALUES ('grey_business', 'China', 0, 0, 0, 'RMB', '￥', 14, 1.25, '25%', 1, 'mango@hit.edu.cn', 'mango.org', 'http://www.mango.com/shop', 'cn', 'WEB-', '-06', 0, 1, 0, 'Closed', 'Dear visitor, the demo shop is temporarely down.', 'mango@hit.edu.cn', '012-3456789', '012-3456788', '12345678', 'YourName', 'BankCity', 'BankCountry', 'TestBank', 'BankIBAN', 'BankBIC/Swiftcode', 2011, 'logo.gif', 'bg.gif', 'mango网上售票', 'mango网上售票', 'HIT-CS', 1, 1, 0, '1,234.56', 60, 1, 2, 'Y-m-d G:i:s', 1, 1, 1, 1, 1, 1, NULL, 'mango@hit.edu.cn', 'RMB', 1, 'these, are, keywords', 'gb2312', 1, 1, 1, 1, 1, 1, 30, 30, 50, 50, 450, 350);


INSERT INTO `payment` (`id`, `description`, `code`, `system`) VALUES (1, '工商银行', '', 1);
INSERT INTO `payment` (`id`, `description`, `code`, `system`) VALUES (2, '建设银行', '', 1);
INSERT INTO `payment` (`id`, `description`, `code`, `system`) VALUES (3, '招商银行', '', 1);
INSERT INTO `payment` (`id`, `description`, `code`, `system`) VALUES (4, '中国银行', '', 1);