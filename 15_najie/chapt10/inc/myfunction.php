<?php
class myfunction{
////////�ַ�ת���������ݿ��в�������ʱ��//////////////////////////
      function str_to($str)
      {
        $str=str_replace(" ","&nbsp;",$str);  //�ѿո��滻html���ַ����ո�
        $str=str_replace("<","&lt;",$str);  //��html�������־�������
        $str=str_replace(">","&gt;",$str);  //��html�������־�������
        $str=nl2br($str);               //�ѻس��滻��html�е�br
        return $str;
        }
////////�ַ�ת���������ݿ��ж�����ʾ�ڱ��ı�������//////////////////////////
      function str_to2($str)
      {
        $str=str_replace("&nbsp;"," ",$str);  //�ѿո��滻html���ַ����ո�
        $str=str_replace("<br />","",$str);  //��html�������־�������
        return $str;
        }
//JS������Ϣ��
	function js_alert($message,$url){
		echo "<script language=javascript>alert('";
		echo $message;
		echo "');location.href='";
		echo $url;
		echo "';</script>";
	}
//�ж��Ƿ�Ϊ����
	function int_estimation($num){
		if (eregi("^[0-9]+$", $num)){
			return true;
		} else {
			return false;
		}
	}
//����id������������
	function type_idto_name($type_id){
		$folie=new mysql;
        $folie->link("");
		$query="select type_name from blog_type_info where id='$type_id'";
		$rst=$folie->excu($query);
		$info=mysql_fetch_array($rst);
		return $info["type_name"];
	}
	/*
//�û��������û�id
	function user_nameto_id($user_name){
		$folie=new mysql;
        $folie->link("");
		$query="select id from user_info where user_name='$user_name' and tag='1' and last_time='0000-00-00 00:00:00'";
		$rst=$folie->excu($query);
		if(mysql_num_rows($rst)>=1){
		$info=mysql_fetch_array($rst);
		return $info['id'];
		}else {
		$query="select id from user_info where user_name='$user_name' and tag='0' and last_time='0000-00-00 00:00:00'";
		$rst=$folie->excu($query);
		if(mysql_num_rows($rst)>=1){
			echo "<script language=javascript>alert('�û��ѱ����Σ�');location.href='index.php';</script>";
		}
		}
		$query1="select id from user_info where user_name='$user_name'";
		$rst1=$folie->excu($query1);
		if(mysql_num_rows($rst1)<1){
			echo "<script language=javascript>alert('�û��������ڣ�');location.href='index.php';</script>";
		}
	}
*/
//������Ϣ���е�����id���ز�����������
	function blog_type_idto_name($type_id){
		$folie=new mysql;
        $folie->link("");
		$query="select * from blog_type_info where id='$type_id'";
		$rst=$folie->excu($query);
		$info=mysql_fetch_array($rst);
		return $info["type_name"];
	}

//////////��ҳ���� ���أ���ҳ ��һҳ [1][2][...] ��һҳ βҳ//////////
  function pagination($query,$page_id,$add,$pagesize){
  //  include "mysql.inc";
     ////////ʹ�÷���Ϊ:
     ///////  $myf=new myfunction;
     ///////  $query="";
	 ///////  $myf->pagination($query,$page_id,$add,$num_per_page);
     ///////  $crazy=$folie->excu($query);
    $aa=new mysql;
	global $query; //����ȫ�ֱ��� ������� limit ���
	$aa->link("");
	$rst=$aa->excu($query);
	$total_num=mysql_num_rows($rst);
	$page_id=$_GET['page_id'];
	if($page_id==""){
	  $page_id=1;
	}
	$total_page=ceil($total_num/$pagesize);	
	$up=$page_id-1;
	$down=$page_id+1;
	if($total_num<=0){
		echo "��������.";
	}else {
		echo "<a href=".$add."page_id=1>��ҳ</a>&nbsp;";
		if($up<1){
		$up=1;
		//echo "��һҳ";
		}else {
		echo "<a href=".$add."page_id=".$up.">��һҳ</a>";
		}
		for($i=1;$i<=$total_page;$i++){
	  	echo "[<a href=".$add."page_id=".$i.">".$i."</a>]&nbsp;";
		}
		if($down>$total_page){
	 	 $down=$total_page;
	  	//echo "��һҳ&nbsp;";
		}else {
		echo "<a href=".$add."page_id=".$down.">��һҳ</a>&nbsp;";
		}
		echo "<a href=".$add."page_id=$total_page>βҳ</a>";
		$begin=($page_id-1)*$pagesize;
		$query=$query." limit $begin,$pagesize";
	}
  }
}
?>