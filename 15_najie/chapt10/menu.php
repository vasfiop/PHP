<table width="220" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="8"></td>
  </tr>
  <tr>
    <td><h5>�Ƽ�����</h5>
	<?php
	//��config/link.txt�ж�������
	$name="link".$user_id;
     if (!@$fp=fopen("config/$name.txt","r")){
         echo "�ޣ�<br>";
        }else{
		@$rst=fgets($fp,3000);   //��ȡ
		$link=explode("|",$rst);		
		for ($i=0;$i<count($link);$i++)
 			{
  				if ($i%2==0){
				$j=$i+1;
				echo "<a href=".$link[$j]." target=_blank>".$link[$i]."</a>";
				echo "<br>";
				}
			}
		}		  
     ?></td>
  </tr>
  <tr>
    <td height="1" bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td height="20"><br>
    <h5>�����Ļ�</h5>
      <?php
	//���վ���Ļ�
	$name="sta_say".$user_id;
	if (!@$fp=file("config/$name.txt")){
         echo "�ޣ�<br>";
        }else{
			for ($i=0;$i<count($fp);$i++){
			$sta_say.=$fp[$i];
			}
		echo $sta_say;
		}	
	?></td>
  </tr>
  <tr>
    <td height="1" bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><br>
      <h5>վ������</h5>
      <table width="133" height="152" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="pic_sys/<?php
	$query="select * from pic_info where user_id='$user_id' and tag='1' and target='2'";
	$rst=$folie->excu($query);
	$info=mysql_fetch_array($rst);
	echo $info["addr"];?>" width="133" height="152" /></td>
        </tr>
      </table>
    <br /></td>
  </tr>
  
  <tr>
    <td height="1"  bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td><br /><h5>����</h5>
      <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><?php include "time.php";?></td>
        </tr>
      </table>    </td>
  </tr>
  <tr>
    <td height="1" bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td><br />
    <h5>��־����</h5>
	<?php
	$query="select * from blog_type_info where user_id='$user_id' order by show_order";
	$rst=$folie->excu($query);
	if(mysql_num_rows($rst)>=1){
	?>
      <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
	  <?php
	  while($info=mysql_fetch_array($rst)){
	  ?>
        <tr>
          <td><a href="type_blog.php?user_id=<?php echo $user_id;?>&type_id=<?php echo $info["id"];?>"><?php echo $info["type_name"];?></a></td>
        </tr>
		<?php
		}
		?>
      </table>
	  <?php
	  }else {
	  	echo "������־���ࡣ";
	  }
	  ?>	  </td>
  </tr>
  <tr>
    <td height="1" bgcolor="#cccccc"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
