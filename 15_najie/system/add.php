<html>
<head>
    <title>学生宿舍信息管理</title>
</head>
<body>
<center>
<td>
          <a href='index.php'>返回主页</a>
    </td>
    <h3>增加学生信息</h3>

    <form id="addstu" name="addstu" method="post" action="confirm_add.php">
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
    				<option value="JK">计算机科学与技术学院:</option>
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
                <td><input type="submit" value="增加"/>&nbsp;&nbsp;
                    <input type="reset" value="重置"/>
                </td>
            </tr>
        </table>

    </form>
</center>
</body>
</html>