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


INSERT INTO `group` VALUES (1, '�����Ȳ�');
INSERT INTO `group` VALUES (2, '������ӳ');


INSERT INTO `category` VALUES (1, '����Ƭ', '1');
INSERT INTO `category` VALUES (2, '����Ƭ', '1');
INSERT INTO `category` VALUES (3, '����Ƭ', '1');
INSERT INTO `category` VALUES (4, '�ƻ�Ƭ', '1');
INSERT INTO `category` VALUES (5, '����Ƭ', '2');
INSERT INTO `category` VALUES (6, '����Ƭ', '2');
INSERT INTO `category` VALUES (7, '����Ƭ', '2');
INSERT INTO `category` VALUES (8, '�ƻ�Ƭ', '2');


INSERT INTO `product` VALUES (1, '����2', 3, '����: ��˳ / ��<br />
���: ��˳ / �� / ��س� / ����<br />
����: ������ / ֣���� / ��׿�� / ���� / л���� / �δﻪ / �μҾ� / ̷ҫ�� / ��ѩ<br />
����: ���� / ð�� / ���<br />
�ٷ���վ: http://www.thestormwarriors.com/<br />
��Ƭ����/����: ��� / �й�<br />
����: ����<br />
��ӳ����: 2011-06-25<br />
����: ����֮���߽��� / The Storm Warriors

����2�ľ����� �� �� �� �� �� �� 
�����������δﻪ �Σ������Ӿ��ģ�л���� �Σ���Ͷ��������ԭ���֣��������μҾ� �Σ��������ƣ������� �Σ��ɽ����������磨֣���� �Σ���Ѷ�ϵ����벽�������ֹ����������ش�����������������ʹ���򽣹���Ҳ�޼����¡�Ϊ��ǿ�У����硢�����ơ������������Σ�һ��������ħ�����ˣ���ֱ���ڶ��Σ���׿�� �Σ����֣������ø�����������˫���Ѷϣ�����Ҳ����ǰ��Ϊ���ƵУ�����Ը���ħ�䣬��ǿ����������������ʦ�����������������ɽ�������ʱ�����������������ݻʵۣ�̷ҫ�� �Σ��������ƿߡ������òп�ƻʵ�˵���������ڡ�ǧ��һ��֮�ʣ������Ⱥ�ϵ���һ�������Ծ����ɴ�չ������
������Ƭ�������ٳɳ������������ơ��ı࣬Ϊ10��ǰ��ΰǿ�桶�����۰����¡����������������ó��ֲ�Ƭ���������ֵܡ�', 50, 1, 0, 1);


INSERT INTO `product` VALUES (2, '����', 1, '����: ��һ��<br />
���: ��Ρ / �ϰ��� / ĳСѾ / ������<br />
����: ������ / �쾲�� / ��ѧ�� / ������ / �ν� / ���� / �޴�־ / ��С�� / ���� / ���� / ���� / ��ܿ / ������ / ��ޱ<br />
����: ���� / ����<br />
��Ƭ����/����: �й���½<br />
����: ������ͨ��<br />
��ӳ����: 2011-06-25(�й���½)<br />
Ƭ��: 103����<br />
����: ���� / ��������е���<br /><br />


��������е��׵ľ����� �� �� �� �� �� �� <br />
    ��Ƭ�������½ڣ��ֱ�չ������ΰ������� �Σ����Ļۣ��쾲�� �Σ���12���ı��������һ�£�������Ļ��ڱ��������꣬��Ȼ���������Ѿ�����ῶ����˶��Ļ۵ĳ�ŵ�����Ǿ�����ȴ���н�Զ��������һ�ξۻ����῵�һ����ҳ��ߡ����ڶ��£�������Ϻ���֯ͬѧ�ۻᣬ�����߷ֱ�����������������Ὼ��ۻ�Ա�Ļۡ�ǰ��������ǰ������飬������Ҳ�ǵ�������һ��˫��̥���ӡ��ھۻ��ϣ�������ͬѧ�ǵ������£���һ���߽��˶Է����������£���ҹ���´ӵ����Ļ۵�Խ��绰�����ڵ绰����ų����ո裬������¶�����������������Ȼ�����ڲ����೵վ����ῲź�Ȼ�����Ļ����ӵĲ����Լ�������һ�������Ů��������������ׯ԰���������ƣ��������ȴ�𽥷������Ļ�ʹ��ĸ�Դ����<br />
    ��Ƭ��1998����Ӿ��ĵ�Ӱ����������ԭ��������졣���ơ�����Ѹ�����׸衶��Ϊ���顷��', 50, 1, 0, 1);


INSERT INTO `product` VALUES (3, '������è2',6, '����: ղ�ݸ�����<br />
���: ����ɭ�������� / ���ס�����<br />
����: �ܿˡ������� / �������ȡ����� / ������ / ����µ��� / ���� / ��˹���޸� / ������ / ����������˹ / ղķ˹���� / ��˹͡�������� / �и��ƶ� / ����˹����˹���� / ά�˶ࡤ�Ӳ� / ���ᡤ��˲��͵�<br />
����: ϲ�� / ���� / ���� / ð�� / ��ͥ<br />
�ٷ���վ: www.kungfupanda.com<br />
��Ƭ����/����: ����<br />
����: Ӣ��<br />
��ӳ����: 2011-07-01(����) / 2011-05-28(�й���½)<br />
Ƭ��: 91����<br /><br />

������è2�ľ����� �� �� �� �� �� �� <br />
������è���� Po���ܿˡ������� Jack Black �������������γ����Ϊ���������������湦���ʦ Master Shifu����˹͡�������� Dustin Hoffman ����������������������� Tigress���������ȡ����� Angelina Jolie ������������ Monkey������ Jackie Chan ������������� Mantis����˹���޸� Seth Rogen ����������С�� Viper�������� Lucy Liu ����������� Crane������������˹ David Cross ������һ�𱣻��ź�ƽ�ȡ��������������Ȼ�����þ��������и�а��Ļ�������ү Lord Shen������µ��� Gary Oldman �������������������ܵ��Ļ������������й����һ��𹦷򣬰���������һ���µġ����ӿ��µ���ս�������ɹ� Soothsayer�������� Michelle Yeoh ��������ָ���£���������׹�ȥ���ҿ����������֮�գ������ҵ���ܵ��˵���ʤ�ؼ�������', 60, 1, 0, 1);


INSERT INTO `settings` (`theme`, `send_default_country`, `sendcosts_default_country`, `sendcosts_other_country`, `rembours_costs`, `currency`, `currency_symbol`, `paymentdays`, `vat`, `show_vat`, `db_prices_including_vat`, `sales_mail`, `shopname`, `shopurl`, `default_lang`, `order_prefix`, `order_suffix`, `stock_enabled`, `ordering_enabled`, `shop_disabled`, `shop_disabled_title`, `shop_disabled_reason`, `webmaster_mail`, `shoptel`, `shopfax`, `bankaccount`, `bankaccountowner`, `bankcity`, `bankcountry`, `bankname`, `bankiban`, `bankbic`, `start_year`, `shop_logo`, `background`, `slogan`, `page_title`, `page_footer`, `shipping_postal`, `shipping_atstore`, `shipping_unused`, `number_format`, `max_description`, `no_vat`, `pricelist_format`, `date_format`, `search_prodgfx`, `use_prodgfx`, `pay_bank`, `pay_atstore`, `pay_paypal`, `pay_onreceive`, `pay_unused`, `paypal_email`, `paypal_currency`, `thumbs_in_pricelist`, `keywords`, `charset`, `conditions_page`, `guarantee_page`, `shipping_page`, `pictureid`, `aboutus_page`, `live_news`, `pricelist_thumb_width`, `pricelist_thumb_height`, `category_thumb_width`, `category_thumb_height`, `product_max_width`, `product_max_height`) VALUES ('grey_business', 'China', 0, 0, 0, 'RMB', '��', 14, 1.25, '25%', 1, 'mango@hit.edu.cn', 'mango.org', 'http://www.mango.com/shop', 'cn', 'WEB-', '-06', 0, 1, 0, 'Closed', 'Dear visitor, the demo shop is temporarely down.', 'mango@hit.edu.cn', '012-3456789', '012-3456788', '12345678', 'YourName', 'BankCity', 'BankCountry', 'TestBank', 'BankIBAN', 'BankBIC/Swiftcode', 2011, 'logo.gif', 'bg.gif', 'mango������Ʊ', 'mango������Ʊ', 'HIT-CS', 1, 1, 0, '1,234.56', 60, 1, 2, 'Y-m-d G:i:s', 1, 1, 1, 1, 1, 1, NULL, 'mango@hit.edu.cn', 'RMB', 1, 'these, are, keywords', 'gb2312', 1, 1, 1, 1, 1, 1, 30, 30, 50, 50, 450, 350);


INSERT INTO `payment` (`id`, `description`, `code`, `system`) VALUES (1, '��������', '', 1);
INSERT INTO `payment` (`id`, `description`, `code`, `system`) VALUES (2, '��������', '', 1);
INSERT INTO `payment` (`id`, `description`, `code`, `system`) VALUES (3, '��������', '', 1);
INSERT INTO `payment` (`id`, `description`, `code`, `system`) VALUES (4, '�й�����', '', 1);