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
  		//echo "  <caption>\"��Ӱ��Ϣ\"</caption>";
        //echo "  <tr><th>\"��Ӱ��Ϣ\"</th></tr>";
		echo "  <tr class=\"altrow\"> <td algin=right>";
		echo "<p>";
		echo "֧���ܼ۸� :";
		echo "<td><p>����$topay</td>";
		echo "<p>";
		echo " </td></tr></table>";
		echo " <br/>";


	echo "<form action=\"index.php?page=checkout&action=checkout_ok\" method=\"post\">";
	echo "<table width=\"100%\" border=\"1\" cellspcing=8 align=\"center\">";
	echo "<tr><td class=\"boderless\" align=\"center\">";
	echo "<p>";
	echo "<center><font size=3 ><b>��ѡ��֧������</b></font></center>";
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
		echo "<input type=submit value=\"ȷ��\">";
		//echo "<input type=reset value=\"ȡ��\">";
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
				exit(PutWindow ("֧���ɹ�", "���ν��׳ɹ�", "notify.gif", "50"));
				exit(include("includes/exit.inc.php"));
			}
		}
		else
		{
			echo "errorѡ��֧����ʽû������";
		}
	
}
?>

