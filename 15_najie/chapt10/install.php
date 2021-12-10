<?php
include "inc/mysql.inc.php";
$aa=new mysql;
$bb=new mysql;
$aa->link("mysql");
$query="CREATE DATABASE `blog_db`";
if($aa->excu($query)){
  echo "���ݿⴴ���ɹ���<br>";
}
$bb->link("blog_db");
//������manage_user_info//
$query="CREATE TABLE `manage_info`(
	`id` int(11) NOT NULL auto_increment,
	`manage_user` varchar(20) NOT NULL,
	`manage_pw` varchar(32) NOT NULL,
	`last_time` datetime default '0000-00-00 00:00:00',
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "������manage_info �ɹ���<br>";
//������user_info//
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
echo "������user_info �ɹ���<br>";
//������blog_type_info//
$query="CREATE TABLE `blog_type_info`(
	`id` int(11) NOT NULL auto_increment,
	`user_id` int(11) NOT NULL,
	`type_name` varchar(10) NOT NULL,
	`add_time` datetime default '0000-00-00 00:00:00',
	`show_order` int(10) default '0',
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "������blog_type_info �ɹ���<br>";
//������blog_info//
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
echo "������blog_info �ɹ���<br>";
//������blog_comm_info//
$query="CREATE TABLE `blog_comm_info`(
	`id` int(11) NOT NULL auto_increment,
	`blog_id` int(11) default '0',
	`comm_name` varchar(32) NOT NULL,
	`cont` text NOT NULL,
	`add_time` datetime default '0000-00-00 00:00:00',
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "������blog_comm_info �ɹ���<br>";
//������pic_info//
$query="CREATE TABLE `pic_info`(
	`id` int(11) NOT NULL auto_increment,
	`addr` varchar(32) NOT NULL,
	`tag` char(2) default '1',
	`target` char(2) default '0',
	`user_id` int(11) NOT NULL,
	UNIQUE KEY `id` (`id`)
	)";
$bb->excu($query);
echo "������pic_info �ɹ���<br>";
//��ʼ������Ա�û���������//
$query="INSERT INTO `manage_info` VALUES(1,'admin','admin','0000-00-00 00:00:00')";
if($bb->excu($query)){
  echo "��ʼ������Ա�û��������룺admin,admin<br>";
}
echo "OK!";
?>