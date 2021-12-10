<?php
$id=$_GET["id"];
$sql = "SELECT * FROM `list`
                WHERE `id`='$id'";         //需要执行的SQL语句(这里是浏览数据功能)
                                                    //要注意ID哦，这个语句和show.php有些不同
                
require('conn.php');                       //调用conn.php文件，执行数据库操作
$row = mysql_fetch_row($result);   //将SQL执行语句的结果集保存为数组(排队咯)
?>

<!---我们把input.php的表单扣来加入PHP代码就可以了，只有性别部分要做特殊处理--->
<form id="form1" name="form1" method="post" action="edited.php">
          <input type="hidden" name="id" id="id" value="<?php echo $row[0];?>">
  <p>姓名：<input name="name" type="text" id="name"  value="<?php echo $row[1]; ?>" /></p>
  <p>
  
<?php
//特殊处理性别，如果是0就选中女士，否则选种先生，checked="checked"就是选中哦
if($row[2]==0)
{
        echo '性别：<input type="radio" name="sex" value="0" checked="checked" />女士　
                         <input type="radio" name="sex" value="1" />先生';
}
else
{
        echo '性别：<input type="radio" name="sex" value="0" />女士　
                         <input type="radio" name="sex" value="1" checked="checked" />先生';
}
?>

  </p>
  <p>手机：<input name="mobi"  type="text" id="mobi"  value="<?php echo $row[3]; ?>" /></p>
  <p>邮箱：<input name="email" type="text" id="email" value="<?php echo $row[4]; ?>" /></p>
  <p>地址：<input name="addr"  type="text" id="addr"  value="<?php echo $row[5]; ?>" /></p>
  <p>
        <input type="submit" name="Submit" value="添加" />
        <input type="reset" name="Submit2" value="重写" />
  </p>
</form>
