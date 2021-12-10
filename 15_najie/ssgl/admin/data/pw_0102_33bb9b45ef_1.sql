#---------------------------------------------------------#
# qhdinfo bakfile
# qhdinfo:鍜屽叾鏁版嵁澶囦唤v1.0
# Time: 2002-01-02 14:25:20
# --------------------------------------------------------#


DROP TABLE IF EXISTS admin;
CREATE TABLE admin (
  id int(20) NOT NULL auto_increment,
  username varchar(100) character set gbk NOT NULL,
  pwd varchar(200) character set gbk NOT NULL,
  list varchar(10) character set gbk NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=koi8u;

DROP TABLE IF EXISTS chengji;
CREATE TABLE chengji (
  id int(100) NOT NULL auto_increment,
  xh varchar(50) NOT NULL,
  yy varchar(20) NOT NULL,
  c varchar(20) NOT NULL,
  wl varchar(20) NOT NULL,
  gs varchar(10) NOT NULL,
  jd varchar(40) NOT NULL,
  ly varchar(20) NOT NULL,
  dy varchar(20) NOT NULL,
  sw varchar(20) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
  id int(10) NOT NULL auto_increment,
  xh varchar(20) default NULL,
  username varchar(20) character set gbk default NULL,
  pwd varchar(200) character set gbk default NULL,
  bj varchar(50) character set gbk default NULL,
  jg varchar(50) character set gbk default NULL,
  sfzh varchar(50) character set gbk default NULL,
  csly varchar(50) character set gbk default NULL,
  zymc text character set gbk,
  addss text character set gbk,
  tel varchar(50) default NULL,
  sex varchar(10) character set gbk default NULL,
  list varchar(20) character set gbk default NULL,
  mz varchar(20) character set gbk default NULL,
  xb varchar(20) character set gbk default NULL,
  lb varchar(20) character set gbk default NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gb2312;

INSERT INTO admin VALUES('1','admin','202cb962ac59075b964b07152d234b70','管理员');
INSERT INTO admin VALUES('2','123','202cb962ac59075b964b07152d234b70','管理员');

INSERT INTO chengji VALUES('1','200730812045','87','87','65','74','56','68','98','99');
INSERT INTO chengji VALUES('2','200730812010','90','45','56','60','78','89','87','87');
INSERT INTO chengji VALUES('3','200730812011','85','62','65','65','64','64','65','55');
INSERT INTO chengji VALUES('4','200730812012','66','56','65','62','64','65','65','64');
INSERT INTO chengji VALUES('5','200730812013','64','45','87','55','56','64','64','64');
INSERT INTO chengji VALUES('6','200730812014','63','65','65','65','64','64','68','64');
INSERT INTO chengji VALUES('7','200730812015','69','78','90','65','91','56','68','99');
INSERT INTO chengji VALUES('8','200730812016','65','65','45','87','95','64','65','65');

INSERT INTO user VALUES('1','200730812045','张林3','202cb962ac59075b964b07152d234b70','07计教(1)','贵州省河口县','522222198612132145','19861214','现代教育(计算机科学技术)','贵州省河口县林业村','08593296299','男','学 生','汉族','计科系','农村');
INSERT INTO user VALUES('2','200730812010','张小平1','202cb962ac59075b964b07152d234b70','07计教(1)1','贵州省江口','522224519861243157','19870123','现代教育(计算机科学技术)','贵州省江口县林业村','0859329298','女1','学 生','苗族','计科系','农村');
INSERT INTO user VALUES('3','200730812011','王伟','202cb962ac59075b964b07152d234b70','07计教(2)','贵州省沿河县','5222245198612431541','19870123','现代教育(计算机科学技术)','贵州省沿河县林业村','08593296298','男','学 生','汉族','计科系','农村');
INSERT INTO user VALUES('4','200730812012','周伟','202cb962ac59075b964b07152d234b70','07计教(1)','贵州省兴义市','5222245198612431547','1987564','现代教育(计算机科学技术)','贵州省兴义市小林村','08593245288','男','学 生','汉族','计科系','农村');
INSERT INTO user VALUES('5','200730812013','张静','202cb962ac59075b964b07152d234b70','07计教(2)','贵州省兴义市','522224519861243157','19864513','外语翻译','贵州省兴义市小林村','08593245288','男','学 生','汉族','计科系','农村');
INSERT INTO user VALUES('7','200730812014','周三','202cb962ac59075b964b07152d234b70','07电子(2)班','贵州省兴义市','54556654646464646','19861245','电子技术','贵州省兴义市林业村','08593269754','男','学 生','土家族','计科系','城市');

