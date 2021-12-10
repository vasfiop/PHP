<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('tpl/header.php');
    include_once('inc_admin.php');
    use function mysql_connect\sqli_init;
    use function mysql_connect\sqli_ctrl;
    sqli_init();
    $uid = $_GET["uid"];
    $sql_1 = "select photo from users where uid=$uid";
    $rs_1 = sqli_ctrl($sql_1);
    $row_1 = mysqli_fetch_assoc($rs_1);
    $filename = "../images/".$row_1["photo"];
    //如果头像图片文件存在，则删除头像文件
    if(file_exists($filename)){//判定文件是否存在
        unlink($filename);
    }
    //删除数据库用户信息
    // $sql = "delete from users where uid=$uid";
    // $rs = sqli_ctrl($sql);
    $rs = UserDelete($uid);
    if($rs){
        echo "删除成功，3秒后跳转回列表页";
        header("refresh:3;url='userList.php");
    }else{
        echo "删除失败";
    }
    require_once('tpl/footer.php');
    ?>
</body>
</html>