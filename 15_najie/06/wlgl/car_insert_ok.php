<?php session_start(); include("conn/conn.php");
if($_SESSION[admin_user]==true){
if($Submit==true){

	    if(preg_match("/\d{17}[\d|X]|\d{15}/",$user_number,$counts)){ 
	   
             if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$user_tel,$countes)){ 
			  
   $query=mysql_query("insert into tb_car(username,user_number,tel,address,car_number,car_road,car_content)values('$username','$user_number','$user_tel','$address','$car_number','$car_road','$car_content')");
   if($query==true){
	   echo "<script>alert('��Դ��Ϣ��ӳɹ�!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";   }	   
	         }else{
                echo "<script>alert('������ĵ绰�����ʽ����ȷ!!');history.back()</script>";
             }
        }else{
           echo "<script>alert('����������֤����ĸ�ʽ����ȷ!!');history.back()</script>";
        }
    
} 


if($Submit2=="�޸�"){
    if(preg_match("/\d{17}[\d|X]|\d{15}/",$user_number,$counts)){ 
	   
             if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$user_tel,$countes)){ 

   $query="update tb_car set username='$username', user_number='$user_number', tel='$user_tel', address='$address', car_number='$car_number', car_road='$car_road', car_content='$car_content' where car_number='$car_number'";
   $result=mysql_query($query);
   if($result==true){
 	   echo "<script>alert('��Դ���ݸ��³ɹ�!!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";
   }
       }else{
                echo "<script>alert('������ĵ绰�����ʽ����ȷ!!');history.back()</script>";
             }
        }else{
           echo "<script>alert('����������֤����ĸ�ʽ����ȷ!!');history.back()</script>";
        }
}

if($Submit4=="ɾ��"){
   $query="delete  from tb_car where car_number='$car_number'";
   $result=mysql_query($query);
   if($result==true){
 	   echo "<script>alert('��Դ����ɾ���ɹ�!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";
   }

}

?>
<?php 
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>