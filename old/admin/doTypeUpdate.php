<?php
require_once('tpl/header.php');
 include_once('inc_admin.php');
 use function mysql_connect\sqli_init;
 $con = sqli_init();
 $tid = $_POST['tid'];
 $typename = trim($_POST['typename']);
 $rs = TypeUpdate($typename,$tid) or die("sql更新失败<br>".mysqli_error($con));
 $num = mysqli_affected_rows($con);
 if($num!=1){
     redirect('typeList.php','修改失败！3秒后返回类型列表');
 }else{
    redirect('typeList.php','修改成功！3秒后返回类型列表');
 }

?>
<?php
require_once('tpl/footer.php');
?>