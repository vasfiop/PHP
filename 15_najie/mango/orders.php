
<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php include ("checklogin.php"); ?>
<?php
    if (!empty($_GET['id'])) { $id=intval($_GET['id']); }
    if (IsAdmin() == false && $customerid != $id) {
	    PutWindow ($txt['general12'], $txt['general2'], "warning.gif", "50");
	    exit(include("includes/exit.inc.php"));
    }

    if ($id != 0) { $customerid = $id; } //omdat een admin het via orders?id=xx kan aanroepen

    // door alle orders van deze klant lopen..
    $query = sprintf("SELECT * FROM `order` WHERE CUSTOMERID = %s ORDER BY ID DESC", quote_smart($customerid));
    $sql = mysql_query($query) or die(mysql_error());
?>

    <table width="100%" class="datatable">
      <caption><?php echo $txt['orders3']; ?></caption>
     <tr>
      <th><?php echo $txt['orders4']; ?></th>
      <th><?php echo $txt['orders5']; ?></th>
      <th><?php echo $txt['orders6']." (".$currency.")"; ?></th>
      <th><?php echo $txt['orders7']; ?></th>
      <th><?php echo $txt['orders8']; ?></th>
     </tr>

    <?php
       if (mysql_num_rows($sql) == 0) {
	      echo "<tr><td colspan=5>" . $txt['orders9'] . "</td></tr>";
       } else {
	       $sum = 0.0;
	       while ($row = mysql_fetch_row($sql)) {
		       $sum += $row[6];
             echo "<tr><td>".$row[0]."</td>";
             $pay_query = "SELECT * FROM `payment` WHERE `id` = ".$row[4];
             echo "<td>";
	         $pay_sql = mysql_query($pay_query) or die(mysql_error());
             while ($pay_row = mysql_fetch_row($pay_sql)) { echo $pay_row[1]; }
		     echo "</td>";
	      $totaal = myNumberFormat($row[6],$number_format);
             echo "<td>$currency_symbol $totaal</td>";
             echo "<td>".$row[1]."</td>";
             echo "<td>".$row[8]."</td></tr>";
	 }
	       $sum = myNumberFormat($sum,$number_format);
?>
	       	<tr><td colspan="5"><div style="text-align:right;"><strong><?php echo $txt['cart10']; ?></strong> <?php echo $currency_symbol . $sum ?><br /></div></td></tr>
<?php
       }
?>

    </table>
