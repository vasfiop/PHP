<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
   <?php
 include_once"menu.php";
//分页的函数
function news($pageNum = 1, $pageSize = 3)
{
    $array = array();
    $coon = mysqli_connect("localhost", "root","123");
    mysqli_select_db($coon, "student");
    mysqli_set_charset($coon, "utf8");
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
	$departmentid = $_POST['departmentid'];
    $rs = "select * from studentinfo where departmentid = '$departmentid' limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($coon, $rs);
    while ($obj = mysqli_fetch_object($r)) {
        $array[] = $obj;
    }
    mysqli_close($coon,"student");
    return $array;
}
 
//显示总页数的函数
function allNews()
{
    $coon = mysqli_connect("localhost", "root","123");
    mysqli_select_db($coon, "student");
    mysqli_set_charset($coon, "utf8");
	$departmentid = $_POST['departmentid'];
	//printf("%s",$departmentid);
    $rs = "select count(*) num from studentinfo where departmentid = '$departmentid'"; //可以显示出总页数
    $r = mysqli_query($coon, $rs);
    $obj = mysqli_fetch_object($r);
    mysqli_close($coon,"student");
    return $obj->num;
}
 
    @$allNum = allNews();
    @$pageSize = 10; //约定没页显示几条信息
    @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    @$endPage = ceil($allNum/$pageSize); //总页数
    @$array = news($pageNum,$pageSize);
    ?>
</head>
<body>
<center>
<h3>学生个人信息</h3>
	<td>
          <a href='showbydepartment.html'>重新搜索</a>
          <a href='index.php'>返回主页</a>
    </td>
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
			
        </tr>
    <?php
    foreach($array as $key=>$values){
        echo "<tr>";
        echo "<td>{$values->id}</td>";
        echo "<td>{$values->name}</td>";
        echo "<td>{$values->gender}</td>";
        echo "<td>{$values->phonenum}</td>";
        echo "<td>{$values->departmentid}</td>";
		echo "<td>{$values->class}</td>";
		echo "<td>{$values->build}</td>";
		echo "<td>{$values->dormitoryid}</td>";
        echo "</tr>";
    }
    ?>
</table>
<div>
    <a href="?pageNum=1">首页</a>
    <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
    <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
    <a href="?pageNum=<?php echo $endPage?>">尾页</a>
 
</div>
 </center>
</body>
</html>