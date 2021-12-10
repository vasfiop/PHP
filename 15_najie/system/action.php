<?php
//1.连接数据库
$Link = mysqli_connect("localhost","root",'123')
or die("数据库连接失败");
mysqli_select_db($Link,"student")
or die("选择数据库失败");
//2.解决中文乱码问题
//$Link->query("SET NAMES 'UTF8'");
//3.通过action的值进行对应操作
$action = $_POST['action'];
switch ($action) {
    case 'add':{   //增加操作
        $name = $_POST['name'];
		$id = $_POST['id'];
		$domitoryid = $_POST['domitoryid'];
        $gender = $_POST['gender'];
        $departmentid = $_POST['departmentid'];
        $classid = $_POST['class'];
		$phonenum = $_POST['phonenum'];

        //写sql语句
        $sql = "INSERT INTO studentinfo VALUES ('{$name}','{$gender}','{$domitoryid}','{$class}')";
        $rw = $pdo->exec($sql);
        if ($rw > 0) {
            echo "<script> alert('增加成功');
                            window.location='index.php'; //跳转到首页
                 </script>";
        } else {
            echo "<script> alert('增加失败');
                            window.history.back(); //返回上一页
                 </script>";
        }
        break;
    }
    case "del": {    //1.获取表单信息
        $id = $_GET['id'];
        $sql = "DELETE FROM stu WHERE id={$id}";
        $pdo->exec($sql);
        header("Location:index.php");//跳转到首页
        break;
    }
    case "edit" :{   //1.获取表单信息
        $id = $_POST['id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $class = $_POST['class'];
        $domitoryid = $_POST['domitoryid'];

        $sql = "UPDATE stu SET name='{$name}',gender='{$gender}',dormitoryid='{$dormitoryid}',class='{$class}' WHERE id='{$id}'";
        $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='index.php'</script>";
        }else{
            echo "<script>alert('修改失败');window.history.back()</script>";
        }


        break;
    }

}
?>