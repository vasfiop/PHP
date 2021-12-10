<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php include ("checklogin.php"); ?>
<?php

if($action == "checkout"){
	if(!empty($_POST['total']))
	{
		$topay = $_POST['total'];
	  }

		echo "<p><p>";
		echo "  <table width=\"100%\" class=\"datatable\">";
  		//echo "  <caption>\"电影信息\"</caption>";
        //echo "  <tr><th>\"电影信息\"</th></tr>";
		echo "  <tr class=\"altrow\"> <td algin=right>";
		echo "<p>";
		echo "支付总价格 :";
		echo "<td><p>￥：$topay</td>";
		echo "<p>";
		echo " </td></tr></table>";
		echo " <br/>";


	echo "<form action=\"index.php?page=checkout&action=checkout_ok\" method=\"post\">";
	echo "<table width=\"100%\" border=\"1\" cellspcing=8 align=\"center\">";
	echo "<tr><td class=\"boderless\" align=\"center\">";
	echo "<p>";
	echo "<center><font size=3 ><b>请选择支付银行</b></font></center>";
		echo "<p>";
			echo " <select name=\"ways\">";
			$query="SELECT * FROM payment";
			$sql = mysql_query($query) or die(mysql_error());
			while ($row = mysql_fetch_row($sql)) 
			{
				echo "<option value=$row[0]>" .$row[1];
			}
			echo " </select>";
			echo "<p>";
			echo "<input type=\"hidden\" name=\"total\" value=".$topay.">";
		echo "<input type=submit value=\"确定\">";
		//echo "<input type=reset value=\"取消\">";
		echo "</form>";
	echo "</td></tr></table>";
}
?>

<?php
if($action == "checkout_ok")
{
	if(!empty($_POST['total']))
	{
		$topay = $_POST['total'];
	  }
	     if (!empty($_POST['ways']))
	     {
		 	 $waysid = $_POST['ways'];
			$succeed=mysql_query("INSERT INTO `order` (`ID`, `DATE`, `STATUS`, `SHIPPING`, `PAYMENT`, `CUSTOMERID`, `TOPAY`, `WEBID`, `NOTES`) VALUES (NULL, now(), '0', '0', '".$waysid."','".$customerid."', '".$topay."', NULL, NULL)") or die(mysql_error());
			if($succeed)
			{
				echo "<p>";
				$query="UPDATE ticket SET FLAG=2 WHERE CUSTOMERID=$customerid AND FLAG=1";
				$sql = mysql_query($query) or die(mysql_error());
				exit(PutWindow ("支付成功", "本次交易成功", "notify.gif", "50"));
				exit(include("includes/exit.inc.php"));
			}
		}
		else
		{
			echo "error选择支付方式没传过来";
		}
	
}
?>

