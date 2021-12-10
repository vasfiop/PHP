<html>
<head>
    <meta charset="UTF-8">
    <title>个人信息管理</title>

</head>
<body>
<center>
    <?php
    //1.连接数据库
    $Link = mysqli_connect("localhost","root",'123')
	or die("数据库连接失败");
	mysqli_select_db($Link,"student")
	or die("选择数据库失败");
    //2.防止中文乱码
    //$Link->query("SET NAMES 'UTF8'");
    //3.拼接sql语句，取出信息
	$sql_id="select * from temporary";
		foreach ($Link->query($sql_id) as $row){
			$id=$row['id'];
		}
	$id_login = $id;
    $sql = "SELECT * FROM studentinfo WHERE id =".$id;
    $result = mysqli_query($Link,$sql);//返回预处理对象
	//printf("%s:%s"),$row["id"],$row["name"];
    if(mysqli_num_rows($result)>=0){
        $stu =mysqli_fetch_array($result);//按照关联数组进行解析
    }else{
        die("没有要修改的数据！");
    }
    ?>
	<?php
    include_once "student_menu.php";
    ?>

	<form id="addstu" name="editstu" method="post" action="confirm_edit.php">
        <table>
            <tr>
                <td>姓名</td>
                <td><input id="name" name="name" type="text"/></td>
            </tr>
			<tr>
                <td>学号</td>
                <td><input id="id" name="id" type="text"/></td>
            </tr>
			<tr>
                <td>楼号</td>
                <td><input type="text" name="build" id="build"/></td>
            </tr>
			<tr>
                <td>宿舍</td>
                <td><input type="text" name="dormitoryid" id="dormitoryid"/></td>
            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="gender" value="男"/>&nbsp;男
                    <input type="radio" name="gender" value="女"/>&nbsp;女
                </td>
            </tr>
			<tr>
                <td>学院</td>
                <td><select name="departmentid">
    				<option value="JK">计算机科学与技术学院</option>
    				<option value="TJ">土木工程与建筑学院</option>
    				<option value="WY">文艺学院</option>
    				<option value="LX">理学院</option>
					<option value="TY">体育学科部</option>
    				</select>
                </td>
            </tr>
            <tr>
                <td>班级</td>
                <td><input id="class" name="class" type="text"/></td>
            </tr>
			<tr>
                <td>电话</td>
                <td><input type="text" name="phonenum" id="phonenum"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="修改"/>&nbsp;&nbsp;
                    <input type="reset" value="重置"/>
                </td>
            </tr>
        </table>

    </form>



</center>
</body>
</html>