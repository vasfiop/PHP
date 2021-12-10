<?php
//1.连接数据库
$Link = mysqli_connect("localhost","root",'123')
or die("数据库连接失败");
mysqli_select_db($Link,"student")
or die("选择数据库失败");
//2.解决中文乱码问题
//$Link->query("SET NAMES 'UTF8'");
//3.通过action的值进行对应操作
$name = $_POST['name'];
$id = $_POST['id'];
$dormitoryid = $_POST['dormitoryid'];
$gender = $_POST['gender'];
$departmentid = $_POST['departmentid'];
$build = $_POST['build'];
$class = $_POST['class'];
$phonenum = $_POST['phonenum'];

//printf("%s",$name);
//写sql语句,判断该id是否已在studentinfo表中,如不在则insert into,如在则update
$lookForId = "select * from studentinfo where id = '{$id}'";
$sql_insert = "insert into studentinfo (name,dormitoryid,gender,build,departmentid,class,phonenum,id) values( '{$name}','{$dormitoryid}','{$gender}','{$build}','{$departmentid}','{$class}','{$phonenum}','{$id}')";
$sql_update = "update studentinfo set name='{$name}',dormitoryid='{$dormitoryid}',gender='{$gender}',departmentid='{$departmentid}',class='{$class}',phonenum='{$phonenum}' WHERE id='{$id}'";

//$result = mysqli_query($Link,$lookForId)
//$array_result = mysqli_fetch_array($result);
//$id = $array_result[0];

if(mysqli_query($Link,$lookForId)){
    //printf("no this id");
	mysqli_query($Link,$sql_insert);
	//printf("新插入一条信息");
	}
if(mysqli_query($Link,$sql_update)) {
      echo "<script> alert('修改成功');
                            window.location='index.php'; //跳转到首页
                 </script>";
     } else {
            echo "<script> alert('2修改失败');
                            window.history.back(); //返回上一页
                 </script>";
     }

?>