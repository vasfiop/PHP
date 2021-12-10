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
    $con = sqli_init();
    $tid = $_GET["tid"];
    $rs = TypeDelect($tid);
    $num = mysqli_affected_rows($con);
    if($num!=1){
        redirect('typeList.php','删除失败！3秒后返回类型列表');
    }else{
        redirect('typeList.php','删除成功！3秒后返回类型列表');
    }
    ?>
    <?php
require_once('tpl/footer.php');
?>
</body>
</html>