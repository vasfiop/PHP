<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php include ("checklogin.php"); ?>
<?php
	if (!empty($_POST['pid'])) {
	    $pid=$_POST['pid'];
	}

		echo "  <table width=\"100%\" class=\"datatable\">";
  		echo "  <caption>".$pid."</caption>";
        echo "  <tr><th>".$txt['seatmap1']."</th><th>".$txt['seatmap2']."</th></tr>";
		echo "  <form method=\"POST\" action=\"index.php?page=seatmap&action=showmap\">";
		echo "  <tr class=\"altrow\">";
		echo "  <td><select name=\"playroom\">";
		$query = "SELECT `ID` FROM `product` WHERE `PRODUCTID` = '".$pid."'";
                $sq = mysql_query($query) or die(mysql_error());
		while ($row = mysql_fetch_row($sq)) {
			$productid = $row[0];
		}
		$query="SELECT DISTINCT CINEMA, ROOM, TIME FROM seat, ticket WHERE PRODUCTID='".$productid."' AND SEATID=seat.ID AND TIME>now()";
		$sql = mysql_query($query) or die(mysql_error());
	    while ($row = mysql_fetch_row($sql)) {
		    echo "<option value=\"".$row[0]."&".$row[1]."*".$row[2]."\">".$row[0]." ".$row[1]." ".$row[2]." ";
		}
        echo " </select></td>";
		echo "  <input type=\"hidden\" name=\"pid\" value=\"".$pid."\">";
		echo " <td><input type=\"submit\" value=\"".$txt['seatmap3']."\"></td>";
        echo " </tr>";
        echo " </form>";
		echo " </table>";
		echo " <br/>";

?>


<?php
    if ($action == "showmap") {
        echo "<p>";
		echo "<font size=3><center><b>��λͼ</b></center><p></font>";
		echo "<table border=1 width=\"90%\" cellspcing=8 align=\"center\">";
        echo "<tr><td class=\"borderless\" align=\"center\">";

        	if (!empty($_POST['playroom'])) {
		    $playroom = $_POST['playroom'];
		}
		if (!empty($_POST['pid'])) {
		    $pid = $_POST['pid'];
		}
		$u = strpos($playroom, "&");
		$v = strpos($playroom, "*");
	   	$cinema = substr($playroom, 0, $u);
	   	$room = substr($playroom, $u+1, $v-$u-1);
		$time = substr($playroom, $v+1);

		$result=mysql_query("SELECT SEATNUM FROM seat WHERE CINEMA = '".$cinema."' AND ROOM = '".$room."' AND SEATNUM != 0") or die(mysql_error());
		$query="UPDATE ticket SET FLAG=0 ,CUSTOMERID = '0',ORDERTIME =NULL WHERE  FLAG=1 AND TIMESTAMPDIFF(HOUR,  ORDERTIME ,now()) >5";//�������ݿ�
		$sql = mysql_query($query) or die(mysql_error());

		$query = "SELECT `ID` FROM `product` WHERE `PRODUCTID` = '".$pid."'";
                $sq = mysql_query($query) or die(mysql_error());
		while ($row = mysql_fetch_row($sq)) {
			$productid = $row[0];
		}

		$sseatnum=mysql_query("SELECT seat.SEATNUM FROM seat, ticket WHERE seat.ID=ticket.SEATID AND ticket.PRODUCTID='".$productid."' AND ticket.TIME='".$time."' AND  ticket.FLAG!='0'") or die(mysql_error());

		$row_seat_num=10;//������������������������ÿ����λ�����ڴ��޸ģ�������������������
		//global $lines;
		$lines=mysql_num_rows($result);//��λ����
		//global $row;
		$i = 0;
		while($row2=mysql_fetch_row($sseatnum))
		{
			$row[$i] = $row2[0];
			$i++;
		}//��־Ϊ1����λ
		//global $max_lines;
	
		$max_lines=mysql_num_rows($sseatnum)-1;//��־Ϊ1����λ�ĸ���
		//echo "$lines";//�ж�����λ
		//echo "$max_lines";//��־Ϊ1����λ�ĸ���-1
		//echo "�Ѿ���������λ��$row[0]";//��־Ϊ1����λ���롪���Ѿ�����
		$n = 0;
		function draw_seat($start_num, $end_num, $row, $max_lines, $lines, $row_seat_num)
		{
			$row_num = intval($start_num / $row_seat_num) + 1;
			if($end_num>$lines)
			{
				$end_num=$lines;
			}
			for($num=$start_num; $num<$end_num+1; $num++)
			{
				$line_num = $num % $row_seat_num;
				if($line_num == 0)
				{
					$line_num = $row_seat_num;
				}
				$success = 0;
				for($numj=0; $numj<$max_lines+1; $numj++)
				{
					if($row[$numj]==$num)
					{
						echo"<input type=checkbox name=seat[] value=\"$num\" disabled><font color=\"red\">$row_num-$line_num</font>";

						$n++;
						$success =1;
					//	break;
					}
					
				}
				if($success == 0)
				{
					echo"<input type=checkbox name=seat[] value=\"$num\">$row_num-$line_num";
				}
			}
		}

		echo "<center><font size=2 color=green><marquee scrollAmount=4 width=100>��������Ļ</marquee></font></center>";
		echo "  <form method=\"POST\" action=\"index.php?page=cart&action=add\">";
		echo "  <input type=\"hidden\" name=\"cinema\" value=\"".$cinema."\">";
		echo "  <input type=\"hidden\" name=\"room\" value=\"".$room."\">";
		echo "  <input type=\"hidden\" name=\"time\" value=\"".$time."\">";
		echo "  <input type=\"hidden\" name=\"totalnum\" value=\"".$lines."\">";
		$seat_row = intval($lines/$row_seat_num);
		$seat_line = $row_seat_num;
		for($i=0; $i<$seat_row+1; $i++)
		{
			draw_seat($i*$row_seat_num+1, ($i+1)*$row_seat_num, $row, $max_lines, $lines, $row_seat_num);
			echo "<br>";
		}
		if($n == $lines)
		{
			echo "<center><font size = 3 color = green>�˳���ӰƱ��ȫ���۳�</font></center>";
		}
		else
		{
			echo "<center><font size=1 color=red>��ɫ��λ���ѱ�����</font></center>";
		}
		echo "
		<center>
		<input type=submit value=\"ȷ��\">
		<input type=reset value=\"ȡ��\"></br>
		</center>
		</form>
		</td></tr>
        </table>";
	}
?>
