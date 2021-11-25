<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
include_once("../../Util/mysqli.php");
include_once("SQL.php");
$typename = $_POST['typename'];
Sqli\sqli_init();
$success = my_sql\InsertVideoType($typename);
if ($success)
    redirect('typeList.php', '修改成功！3秒后返回类型列表!');
else
    redirect('typeList.php', '修改成功！3秒后返回类型列表!');
include_once("tpl/footer.php");