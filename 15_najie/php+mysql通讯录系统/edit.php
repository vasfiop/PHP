<?php
$id=$_GET["id"];
$sql = "SELECT * FROM `list`
                WHERE `id`='$id'";         //��Ҫִ�е�SQL���(������������ݹ���)
                                                    //Ҫע��IDŶ���������show.php��Щ��ͬ
                
require('conn.php');                       //����conn.php�ļ���ִ�����ݿ����
$row = mysql_fetch_row($result);   //��SQLִ�����Ľ��������Ϊ����(�Ŷӿ�)
?>

<!---���ǰ�input.php�ı���������PHP����Ϳ����ˣ�ֻ���Ա𲿷�Ҫ�����⴦��--->
<form id="form1" name="form1" method="post" action="edited.php">
          <input type="hidden" name="id" id="id" value="<?php echo $row[0];?>">
  <p>������<input name="name" type="text" id="name"  value="<?php echo $row[1]; ?>" /></p>
  <p>
  
<?php
//���⴦���Ա������0��ѡ��Ůʿ������ѡ��������checked="checked"����ѡ��Ŷ
if($row[2]==0)
{
        echo '�Ա�<input type="radio" name="sex" value="0" checked="checked" />Ůʿ��
                         <input type="radio" name="sex" value="1" />����';
}
else
{
        echo '�Ա�<input type="radio" name="sex" value="0" />Ůʿ��
                         <input type="radio" name="sex" value="1" checked="checked" />����';
}
?>

  </p>
  <p>�ֻ���<input name="mobi"  type="text" id="mobi"  value="<?php echo $row[3]; ?>" /></p>
  <p>���䣺<input name="email" type="text" id="email" value="<?php echo $row[4]; ?>" /></p>
  <p>��ַ��<input name="addr"  type="text" id="addr"  value="<?php echo $row[5]; ?>" /></p>
  <p>
        <input type="submit" name="Submit" value="���" />
        <input type="reset" name="Submit2" value="��д" />
  </p>
</form>
