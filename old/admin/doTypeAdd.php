<?php
require_once('tpl/header.php');
include_once('inc_admin.php');
use function mysql_connect\sqli_init;
use function mysql_connect\sqli_ctrl;
$con = sqli_init();
$typeName = $_POST["typename"];
$rs = ContrastType($typeName);
$num = mysqli_num_rows($rs);
if($num>0){
    redirect('typeAdd.php','视频已存在！3秒后返回，课继续添加！');
}else{
    $rs = AddType($typeName);
    $num = mysqli_affected_rows($con);
    if($num>0){
        redirect('typeAdd.php','视频添加成功！3秒后返回，可继续添加！');
    }else{
        echo "视频添加失败";
    }
}
?>
<?php
require_once('tpl/footer.php');
?>