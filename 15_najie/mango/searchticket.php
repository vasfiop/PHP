<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php include ("checklogin.php"); ?>

<?php
    if (IsAdmin() == false) {
	  PutWindow ($txt['general12'], $txt['general2'], "warning.gif", "50");
	  exit(include("includes/exit.inc.php"));
    }
?>
<?php

         echo "<table width=\"100%\" class=\"datatable\">";
         echo "  <caption>".$txt['admin7']."</caption>";
         echo "  <tr><th>".$txt['admin26'] ."</th><th>".$txt['paymentadmin11']."</th></tr>";
         // add a payment method
         echo "  <form method=\"POST\" action=\"index.php?page=searchticket&action=showticket\">";
         echo "  <tr class=\"altrow\">";
         echo "    <td><input name=\"cusid\" type=\"text\" value=\"\" size=\"30\" maxlength=\"150\"></td>";
         echo "    <td><input type=\"submit\" value=\"".$txt['admin27']."\"></td>";
	 echo "  </tr>";
	 echo "  </form>";
	 echo "</table>";
?>



<?php
if($action == "showticket")
{
	if(!empty($_POST['cusid']))
	{
		$cus= $_POST['cusid'];
	}
    $query = "SELECT * FROM `customer` WHERE `CITY` = '".$cus."'ORDER BY ID ASC";
    $sql = mysql_query($query) or die(mysql_error());
    $num = mysql_num_rows($sql);
    if($num != 0){
    ?>
    
    <table width="100%" class="datatable">
      <caption>会员信息</caption>
     <tr> 
      <th><?php echo $txt['customeradmin1']; ?></th>
      <th><?php echo $txt['customeradmin2']; ?></th>
      <th><?php echo $txt['customeradmin3']; ?></th>
      <th><?php echo $txt['customeradmin4']; ?></th>
      <th><?php echo"购票车"; ?></th>
     </tr>

    <?php
    $color = $tb_pricelist_color2;
    while ($row = mysql_fetch_row($sql)) {
	   echo "<tr>";
	   echo "<td>".$row[3]."</td>";
	   echo "<td>".$row[9]."</td>";
	   echo "<td><a href=\"mailto:".$row[11]."\">".$row[11]."</a></td>";
	   echo "<td>".$row[15]."</td>";
	   echo "<td>"; 
	   echo "<a href=\"index.php?page=cart&action=show&id=".$row[0]."\"><img src=\"".$gfx_dir."/admin_cart.gif\" width=\"16\" height=\"16\" alt=\"查看用户购票车\"></a>";
	   echo "</td></tr>";
    }
?>
    </table>
    <?php
    }
    else
    {PutWindow("提示","该用户不存在","warning.gif",50);}
}
?>
