<?php
	$Link=mysqli_connect("localhost","root",'123')
	or die("数据库连接失败");
	
    // 判断输入密码与确认密码是否相同
    $passcode_1 = $_POST['passcode'];
    $confirmpasscode = $_POST['confirmpasscode'];
    if ($passcode_1 != $confirmpasscode) {
        exit("输入的密码与确认密码不相等！");
    }

    $id = $_POST['id'];

    // 判断用户名是否重复
    $idSQL = "select * from user where id = '$id'";
    mysqli_select_db($Link,"student")
	or die("选择数据库失败");
    $resultSet = mysqli_query($Link,$idSQL);
    if (@mysqli_num_rows($resultSet) > 0) {
        echo"<td>
                  <a href='register.html'>学号/工号已注册,点击重新注册</a>
             </td>";
		exit();
    }
    $flag = $_POST['flag'];
	$passcode=md5($passcode_1);
    $registerSQL = "insert into user values('$id', '$passcode', '$flag')";
	
	if(mysqli_query($Link,$registerSQL)){
		if($flag==2){
		$studentsql = "INSERT INTO `studentinfo` (`name`, `id`, `dormitoryid`, `gender`, `departmentid`, `class`, `phonenum`) VALUES ('', '$id', '', NULL, '', '', '')";
		
		mysqli_query($Link,$studentsql);
	}
		echo"<td>
                    <a href='login.html'>注册成功,返回登录</a>
                  </td>";
	}else if($flag==1){
		$staffsql = "INSERT INTO staff ('id',) VALUES ('{$id}')";
		
	}else{
		echo "注册失败!";
	}

?>