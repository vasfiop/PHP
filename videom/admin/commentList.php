<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
include_once("../../Util/mysqli.php");
include_once("SQL.php");
Sqli\sqli_init();
$list = my_sql\GetCommentByOrder();
?>
<table border="1" align="center">
    <tr>
        <th>序号</th>
        <th>视频名称</th>
        <th>留言内容</th>
        <th>留言人</th>
        <th>发表时间</th>
        <th>操作</th>
    </tr>
    <?php
    $i = 1;
    while ($row = mysqli_fetch_assoc($list)) {
    ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['videoname']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['uname']; ?></td>
            <td><?php echo $row['cdate']; ?></td>
            <td><a href="doCommentDelete.php?cid=<?php echo $row['cid']; ?>">删除</a></td>
        </tr>
    <?php
    }
    ?>
</table>
<?php
include_once("tpl/footer.php");
