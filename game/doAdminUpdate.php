<?php
include_once("include.php");
$aid = $_POST['aid'];
$a_name = $_POST['a_name'];
$a_telphone = $_POST['a_telphone'];
Sqli\sqli_init();
$success = admin\UpdateNameTel($aid,$a_name,$a_telphone);
// TODO 继续处理下面的管理员更新