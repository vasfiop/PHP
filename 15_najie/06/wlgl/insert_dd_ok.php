<?php
session_start(); 
if($_SESSION[admin_user]==true){
include("conn/conn.php");
$fahuo_time=date("Y-m-d H:i:s");
    if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$car_tel,$countes)){ 
	    if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$fahuo_tel,$countes)){ 
            if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$shouhuo_tel,$countes)){ 

  $query="insert into tb_shopping (car_number,car_tel,fahuo_id,fahuo_user, fahuo_tel,fahuo_address,fahuo_content,fahuo_time,fahuo_fk,shouhuo_user,shouhuo_address,shouhuo_tel)values('$car_number','$car_tel','$fahuo_id','$fahuo_user','$fahuo_tel','$fahuo_address','$fahuo_content','$fahuo_time','$fahuo_fk','$shouhuo_user','$shouhuo_address','$shouhuo_tel')";
$result=mysql_query($query);

  $querys="insert into tb_car_log(car_log,car_number,log_date,fahuo_id)values('$car_log','$car_number','$fahuo_time','$fahuo_id')";
  $results=mysql_query($querys);
  $queryss="insert into tb_customer (customer_user,customer_tel,customer_address)values('$fahuo_user','$fahuo_tel','$fahuo_address')";
  $resultss=mysql_query($queryss);

  echo "<script>alert('��������ӳɹ�!');history.back();</script>"; 

      }else{
                echo "<script>alert('��������ջ��˵ĵ绰�����ʽ����ȷ!!');history.back()</script>";
             }
        }else{
           echo "<script>alert('������ķ����˵ĵ绰�����ʽ����ȷ!!');history.back()</script>";
        }
    }else{
         echo "<script>alert('������ĳ����ĵ绰�����ʽ����ȷ!!');history.back()</script>";
    }
?><?php 
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>