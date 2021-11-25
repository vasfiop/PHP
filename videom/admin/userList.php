<?php
include_once("tpl/header.php");
include_once("../system/loginCheck.php");
include_once("../../Util/mysqli.php");
include_once("SQL.php");
Sqli\sqli_init();
$list = null;
if (isset($_POST['search']))
    $list = my_sql\GetUserBySearch($_POST['search']);
else
    $list = my_sql\GetUsers();

$count = mysqli_num_rows($list);
?>
<p>请输入用户名:
<form action="" method="post">
    <input type="text" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ""; ?>">
    <input type="submit" value="搜索">
</form>
</p>

<div align="center">
    <p>注册用户表共<?php echo $count; ?></p>
    <table border="1">
        <tr>
            <td>序号</td>
            <td>用户名</td>
            <td>性别</td>
            <td>电话</td>
            <td>头像</td>
            <td>电子邮件</td>
            <td>操作</td>
        </tr>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($list)) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $row["uname"] . "</td>";
            $sex =  $row['gender'] == '1' ? '女' : '男';
            echo "<td>" . $sex . "</td>";
            echo "<td>" . $row['tel'] . "</td>";
            echo "<td><img src=\"../image/" . $row['photo'] . "\" style=\"width:20%;height:20%;\"></td>";
            echo "<td>" . $row["email"] . "</td>";
            echo '<td><a href="userEdit.php?id=' . $row['uid'] . '">修改</a>|' .
                '<a href="doUserDelete.php?tid=' . $row['uid'] . '" onclick="return confirm(\'你确定吗?\')">删除</a></td>';
            echo "</tr>";
            $i++;
        }
        ?>
    </table>
</div>

<?php
include_once("tpl/footer.php");
?>