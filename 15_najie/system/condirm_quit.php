mysqli_query($Link,"delete from temporary");
<?php
$Link=mysqli_connect("localhost","root",'123')
or die("数据库连接失败");
mysqli_select_db($Link,"student")
or die("选择数据库失败");
//获取输入的信息
$id = $_POST['id'];
$passcode = $_POST['passcode'];
$query = mysqli_query($Link,"select id,flag from user where id = '$id' and passcode = '$passcode'")
or die("SQL语句执行失败");
//printf("%s : %s ",$id,$passcode);
//判断用户以及密码
if($row = mysqli_fetch_array($query))
{
    //判断权限
    if($row['flag'] == 2){
		mysqli_query($Link,"insert into temporary values('$id')");
        echo "<a href='personalinfo.php'>欢迎访问</a>";
    }else{
		printf("%s",$row['flag']);
        echo "userflag不正确";
    }

}else{
    echo "登陆失败,请检查账号密码";
}
?>

