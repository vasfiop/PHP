<?php
////�༭��������
if ($_GET["edit_tag"]==1){
	$name="link".$_SESSION["user_id"];
   if (!@$fp=fopen("../config/$name.txt","r")){
         echo "δ������<br>";
        }else{
		$link_name=$_GET["link_name"];
		$link_name_new=$_POST["link_name_new"];
		$link_addr_new=$_POST["link_addr_new"];
		@$rst=fgets($fp,3000);   //��ȡ
		$link=explode("|",$rst);		
		for ($i=0;$i<count($link);$i++)
 			{  				
				if ($i%2==0){
				$j=$i+1;
					if ($link[$i]==$link_name){						
						$link[$i]=$link_name_new;
						$link[$j]=$link_addr_new;
					}
				}
		}
		//�����µ��ַ���
		for ($i=0;$i<count($link);$i++){
			if ($i==0){
			$link_new=$link[$i];
			}else{
				$link_new.="|".$link[$i];
			}
		//����д��
		if ($fp=fopen("../config/$name.txt", "w")){
	 	fwrite($fp,$link_new); 
		fclose($fp);
		} 
		}
   }
}
///�������
if ($_GET["add_tag"]==1){
	$link_name_new=$_POST[link_name_new];
	$link_addr_new=$_POST[link_addr_new];	
	if ($link_name_new!="" and $link_addr_new!=""){
		$name="link".$_SESSION["user_id"];
		@$fp=fopen("../config/$name.txt","r");
		@$rst=fgets($fp,3000);   //��ȡ
		if ($rst==""){
		$rst.=$link_name_new;
		$rst.="|".$link_addr_new;
		}else{
		$rst.="|".$link_name_new;
		$rst.="|".$link_addr_new;
		}
	//����д��
		if ($fp=fopen("../config/$name.txt", "w")){
	 	fwrite($fp,$rst); 
		fclose($fp);
		} 		
	}	
}
//ɾ������
if ($_GET["del_tag"]==1){
	$link_name=$_GET["link_name"];
	$name="link".$_SESSION["user_id"];
	if (!@$fp=fopen("../config/$name.txt","r")){
         echo "δ������<br>";
        }else{
		@$rst=fgets($fp,3000);   //��ȡ
		$link=explode("|",$rst);		
		for ($i=0;$i<count($link);$i++)
 			{
			if ($i%2==0){
				$j=$i+1;
					if ($link[$i]==$link_name){
					$link[$i]="";
					$link[$j]="";
					break;
					}
				}
			}
		//�����ַ���
		for ($i=0;$i<count($link);$i++)
 			{
			if ($link[$i]!=""){
				if ($i==0){
				$str_in=$link[$i];
				}else{
				$str_in.="|".$link[$i];
				}
			}
			}
			//����д��
		if ($fp=fopen("../config/$name.txt", "w")){
	 	fwrite($fp,$str_in); 
		fclose($fp);
		} 
		}
}
?>
<br>
<h4> �� �� �� �� �� ��</h4>
<table width="500" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" bgcolor="#CCCCCC"></td>
  </tr>
  <tr align="center" valign="middle">
    <td height="26">���</td>
    <td height="26">��ʾЧ��</td>
    <td>��ʾ����</td>
    <td height="26">������ַ</td>
    <td height="26">����</td>
  </tr>
 <?php
  //��../config/link.txt�ж�������
  $name="link".$_SESSION["user_id"];
  if (!@$fp=fopen("../config/$name.txt","r")){
      echo "δ������<br>";
      }else{
	  @$rst=fgets($fp,3000);   //��ȡ
	  $link=explode("|",$rst);
	  if ($rst!=""){				
		for ($i=0;$i<count($link);$i++)
 			{  				
				if ($i%2==0){
				$j=$i+1;
		?>
  <tr>
    <td height="1" colspan="5" bgcolor="#CCCCCC"></td>
  </tr>
  <tr align="center">
  	<form id="form1" name="form1" method="post" action="user.php?target=link&edit_tag=1&link_name=<?php echo $link[$i]?>">
    <td height="30" valign="middle"><?php echo (ceil($i/2)+1)?></td>
    <td height="30" valign="middle"><?php echo "<a href=".$link[$j]." target=_blank>".$link[$i]."</a>";?></td>
    <td height="30" valign="middle"><input name="link_name_new" type="text" size="10" maxlength="20" value="<?php echo $link[$i]?>" /></td>
    <td height="30" valign="middle"><input name="link_addr_new" type="text" size="20" maxlength="40" value="<?php echo $link[$j]?>" /></td>
    <td height="30" valign="middle"><input type="submit" name="Submit" value="�� ��" />
&nbsp;&nbsp;<a href="user.php?target=link&del_tag=1&link_name=<?php echo $link[$i]?>">ɾ ��</a></td>
  	</form>
  </tr>
  <?php
				}
			}
		}  
  }
  ?>
  <tr align="center">
  	<form id="form1" name="form1" method="post" action="user.php?target=link&add_tag=1">
    <td height="30" valign="middle"><?php echo ($i/2)+1?></td>
    <td height="30" valign="middle">&nbsp;</td>
    <td height="30" valign="middle"><input name="link_name_new" type="text" size="10" maxlength="20" /></td>
    <td height="30" valign="middle"><input name="link_addr_new" type="text" size="20" maxlength="40" /></td>
    <td height="30" valign="middle"><input type="submit" name="Submit" value="�� ��" /></td>
  	</form>
  </tr>   
  <tr>
    <td height="1" colspan="5" bgcolor="#CCCCCC"></td>
  </tr>
</table>
