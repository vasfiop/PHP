<?php
include "inc/mysql.inc.php";
$aa=new mysql;
$bb=new mysql;
$aa->link("mysql");
$query="CREATE DATABASE `blog_db`";
if($aa->excu($query)){
  echo "数据库创建成功！<br>";
}
$bb->link("blog_db");
//创建表：manage_user_info//
$query="CREATE TABLE `manage_info`(
	`id` int(11) NOT NULL auto_increment,
	`manage_user` varchar(20) NOT NULL,
	`manage_pw` varchar(32) NOT NULL,
	`last_time` datetime default '0000-00-00 00:00:00',
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "创建表：manage_info 成功！<br>";
//创建表：user_info//
$query="CREATE TABLE `user_info`(
	`id` int(11) NOT NULL auto_increment,
	`user_name` varchar(20) NOT NULL,
	`user_pw` varchar(32) NOT NULL,
	`tag` char(2) default '1',
	`r_time` datetime default '0000-00-00 00:00:00',
	`last_time` datetime default '0000-00-00 00:00:00',
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "创建表：user_info 成功！<br>";
//创建表：blog_type_info//
$query="CREATE TABLE `blog_type_info`(
	`id` int(11) NOT NULL auto_increment,
	`user_id` int(11) NOT NULL,
	`type_name` varchar(10) NOT NULL,
	`add_time` datetime default '0000-00-00 00:00:00',
	`show_order` int(10) default '0',
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "创建表：blog_type_info 成功！<br>";
//创建表：blog_info//
$query="CREATE TABLE `blog_info`(
	`id` int(11) NOT NULL auto_increment,
	`user_id` int(11) NOT NULL,
	`type_id` int(11) NOT NULL,
	`title` varchar(100) NOT NULL,
	`cont` text NOT NULL,
	`add_time` datetime default '0000-00-00 00:00:00',
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "创建表：blog_info 成功！<br>";
//创建表：blog_comm_info//
$query="CREATE TABLE `blog_comm_info`(
	`id` int(11) NOT NULL auto_increment,
	`blog_id` int(11) default '0',
	`comm_name` varchar(32) NOT NULL,
	`cont` text NOT NULL,
	`add_time` datetime default '0000-00-00 00:00:00',
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "创建表：blog_comm_info 成功！<br>";
//创建表：pic_info//
$query="CREATE TABLE `pic_info`(
	`id` int(11) NOT NULL auto_increment,
	`addr` varchar(32) NOT NULL,
	`tag` char(2) default '1',
	`target` char(2) default '0',
	`user_id` int(11) NOT NULL,
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "创建表：pic_info 成功！<br>";
//初始化管理员用户名和密码//
$query="INSERT INTO `manage_info` VALUES(1,'admin','admin','0000-00-00 00:00:00')";
if($bb->excu($query)){
  echo "初始化管理员用户名和密码：admin,admin<br>";
}
echo "OK!";
?>