[<a href="input.php">继续添加</a>]
<?php
//这里是PHP代码
$sql = "SELECT * FROM `list`"; //需要执行的SQL语句(这里是浏览数据功能)
require('conn.php');               //调用conn.php文件，执行数据库操作
?>

<!---这里HTML代码，创建一个表格--->
<table width="100%" border="1">
        <tr>
                <th width="13%" bgcolor="#CCCCCC" scope="col">姓名</th>
                <th width="13%" bgcolor="#CCCCCC" scope="col">性别</th>
                <th width="13%" bgcolor="#CCCCCC" scope="col">手机</th>
                <th width="13%" bgcolor="#CCCCCC" scope="col">邮箱</th>
                <th width="29%" bgcolor="#CCCCCC" scope="col">地址</th>

                <th width="19%" bgcolor="#CCCCCC" scope="col">操作</th>

        </tr>


        <?php
        //这里是PHP代码
        //判断性别
        while ($row = mysql_fetch_row($result)) //循环开始
        {
                if ($row[2] == 0) {
                        $sex = '女士';
                } else {
                        $sex = '先生';
                }
        ?>

                <!---被循环的HTML表格中带有PHP代码--->
                <tr>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $sex;      ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>

                        <td>
                                <div align="center">
                                        [<a href="edit.php?id=<?php echo $row[0]; ?>">编辑</a>]
                                        [<a href="del.php?id=<?php echo $row[0]; ?>">删除</a>]
                                </div>
                        </td>

                </tr>


        <?php
        }
        ?>

</table>