<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
include_once("../../Util/mysqli.php");
include_once("SQL.php");
$tid = $_GET['tid'];
Sqli\sqli_init();
$list = my_sql\GetVideoByTypeId($tid);
$count = mysqli_num_rows($list);
if ($count != 0) {
    redirect('typeList.php', '无法删除！视频类型下有视频!3秒后返回类型列表!');
} else {
    $success = my_sql\DeleteVideoType($tid);
    if ($success)
        redirect('typeList.php', '删除成功！3秒后返回类型列表!');
    else
        redirect('typeList.php', '删除成功！3秒后返回类型列表!');
}
include_once("tpl/footer.php");
