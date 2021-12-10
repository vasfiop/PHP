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
		echo "<font size=3><center><b>座位图</b></center><p></font>";
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
		$query="UPDATE ticket SET FLAG=0 ,CUSTOMERID = '0',ORDERTIME =NULL WHERE  FLAG=1 AND TIMESTAMPDIFF(HOUR,  ORDERTIME ,now()) >5";//更新数据库
		$sql = mysql_query($query) or die(mysql_error());

		$query = "SELECT `ID` FROM `product` WHERE `PRODUCTID` = '".$pid."'";
                $sq = mysql_query($query) or die(mysql_error());
		while ($row = mysql_fetch_row($sq)) {
			$productid = $row[0];
		}

		$sseatnum=mysql_query("SELECT seat.SEATNUM FROM seat, ticket WHERE seat.ID=ticket.SEATID AND ticket.PRODUCTID='".$productid."' AND ticket.TIME='".$time."' AND  ticket.FLAG!='0'") or die(mysql_error());

		$row_seat_num=10;//！！！！！！！！！！！！每行座位个数在此修改！！！！！！！！！！
		//global $lines;
		$lines=mysql_num_rows($result);//座位个数
		//global $row;
		$i = 0;
		while($row2=mysql_fetch_row($sseatnum))
		{
			$row[$i] = $row2[0];
			$i++;
		}//标志为1的座位
		//global $max_lines;
	
		$max_lines=mysql_num_rows($sseatnum)-1;//标志为1的座位的个数
		//echo "$lines";//有多少座位
		//echo "$max_lines";//标志为1的座位的个数-1
		//echo "已经订购的座位号$row[0]";//标志为1的座位号码——已经订购
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

		echo "<center><font size=2 color=green><marquee scrollAmount=4 width=100>这里是屏幕</marquee></font></center>";
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
			echo "<center><font size = 3 color = green>此场次影票已全部售出</font></center>";
		}
		else
		{
			echo "<center><font size=1 color=red>红色座位号已被订购</font></center>";
		}
		echo "
		<center>
		<input type=submit value=\"确定\">
		<input type=reset value=\"取消\"></br>
		</center>
		</form>
		</td></tr>
        </table>";
	}
?>
