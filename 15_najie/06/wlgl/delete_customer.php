<?php include("conn/conn.php");		//�������ݿ�
	if($delete==true){					//�ж��ύ�ı���ֵ�Ƿ�Ϊ��
		//����$_GET��ȡ�ı���ֵΪ���ݣ�ִ��ɾ�����
		$query=mysql_query("delete from tb_customer  where customer_id='$_GET[delete]'");
		if($query){
			echo "<script> alert('�ͻ���Ϣɾ���ɹ�');window.location.href='indexs.php?lmbs=�ͻ���Ϣ����';</script>";
		}
	}
?>