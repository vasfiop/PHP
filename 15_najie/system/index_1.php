<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
</head>
<body>
<center>
    <?php
    include_once "menu.php";
    ?>
    <h3>浏览学生信息</h3>
    <table width="600" border="1">
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>电话</th>
			<th>学院</th>
            <th>班级</th>
			<th>楼号</th>
			<th>宿舍</th>
            <th>操作</th>
        </tr>
		
        <?php
        //1.连接数据库
        $Link = mysqli_connect("localhost","root",'123')
		or die("数据库连接失败");
		mysqli_select_db($Link,"student")
		or die("选择数据库失败");
        //2.解决中文乱码问题
        //$Link->query("SET NAMES 'UTF8'");
        //3.执行sql语句，并实现解析和遍历
        $sql = "SELECT * FROM studentinfo ";
        foreach ($Link->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['gender']}</td>";
            echo "<td>{$row['phonenum']}</td>";
			echo "<td>{$row['departmentid']}</td>";
            echo "<td>{$row['class']}</td>";
			echo "<td>{$row['build']}</td>";
			echo "<td>{$row['dormitoryid']}</td>";
            echo "<td>
                    <a href='confirm_delete.php?id=({$row['id']})'>删除</a>
                    <a href='edit.php?id=({$row['id']})'>修改</a>
                  </td>";
            echo "</tr>";
        }

        ?>

    </table>
</center>

</body>
</html>
