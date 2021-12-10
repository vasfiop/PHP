/*
SQLyog Ultimate v8.32 
MySQL - 5.0.18-nt : Database - blog_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog_db` /*!40100 DEFAULT CHARACTER SET gb2312 */;

USE `blog_db`;

/*Table structure for table `blog_comm_info` */

DROP TABLE IF EXISTS `blog_comm_info`;

CREATE TABLE `blog_comm_info` (
  `id` int(11) NOT NULL auto_increment,
  `blog_id` int(11) default '0',
  `comm_name` varchar(32) character set latin1 NOT NULL,
  `cont` text character set latin1 NOT NULL,
  `add_time` datetime default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `blog_comm_info` */

/*Table structure for table `blog_info` */

DROP TABLE IF EXISTS `blog_info`;

CREATE TABLE `blog_info` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `title` varchar(100) character set latin1 NOT NULL,
  `cont` text character set latin1 NOT NULL,
  `add_time` datetime default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `blog_info` */

/*Table structure for table `blog_type_info` */

DROP TABLE IF EXISTS `blog_type_info`;

CREATE TABLE `blog_type_info` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `type_name` varchar(10) character set latin1 NOT NULL,
  `add_time` datetime default '0000-00-00 00:00:00',
  `show_order` int(10) default '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `blog_type_info` */

/*Table structure for table `manage_info` */

DROP TABLE IF EXISTS `manage_info`;

CREATE TABLE `manage_info` (
  `id` int(11) NOT NULL auto_increment,
  `manage_user` varchar(20) character set latin1 NOT NULL,
  `manage_pw` varchar(32) character set latin1 NOT NULL,
  `last_time` datetime default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `manage_info` */

insert  into `manage_info`(`id`,`manage_user`,`manage_pw`,`last_time`) values (1,'admin','admin','0000-00-00 00:00:00');

/*Table structure for table `pic_info` */

DROP TABLE IF EXISTS `pic_info`;

CREATE TABLE `pic_info` (
  `id` int(11) NOT NULL auto_increment,
  `addr` varchar(32) character set latin1 NOT NULL,
  `tag` char(2) character set latin1 default '1',
  `target` char(2) character set latin1 default '0',
  `user_id` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `pic_info` */

/*Table structure for table `user_info` */

DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL auto_increment,
  `user_name` varchar(20) character set latin1 NOT NULL,
  `user_pw` varchar(32) character set latin1 NOT NULL,
  `tag` char(2) character set latin1 default '1',
  `r_time` datetime default '0000-00-00 00:00:00',
  `last_time` datetime default '0000-00-00 00:00:00',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `user_info` */

insert  into `user_info`(`id`,`user_name`,`user_pw`,`tag`,`r_time`,`last_time`) values (1,'s','123','1','0000-00-00 00:00:00','2011-06-05 14:04:53'),(2,'??','123','1','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
