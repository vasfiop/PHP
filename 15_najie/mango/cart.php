<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php include ("checklogin.php"); ?>
<?php




//获取post方法的值，浏览者已经登录，所以直接进行-------------------------------------------- the visitor is logged in, so proceed
if (!empty($_POST['cinema'])) {
	$cinema=$_POST['cinema'];
      }
if (!empty($_POST['room'])) {
      	$room=$_POST['room'];
}
if (!empty($_POST['time'])) {
      	$time=$_POST['time'];
}
if (!empty($_POST['totalnum'])) {
	$totalnum=$_POST['totalnum'];
}
if (!empty($_POST['ticketid'])) {
	$ticketid=$_POST['ticketid'];
}

$selectednum = 0;
for($i = 0; $i < $totalnum; $i++)
{
	if (!empty($_POST['seat'][$i]))
	{
		if($_POST['seat'][$i] != 0)
		{
			$selectednum++;
		}
	}
}

// 获取当前时间--------------------------------------------current date
$ordertime = date($date_format);

if (IsAdmin() == true) 
{
	if (!empty($_GET['id']))
	{ 
		$customerid = intval($_GET['id']);
       	}
}


//添加-----------------------------------------------------------------
if($action == "add")
{
	   if($selectednum == 0)
   	   {
		   PutWindow ($txt['cart14'], $txt['cart15'], "warning.gif", "80");
		   exit(include("includes/exit.inc.php"));
    	   }
	   else
	   {
		   for($j = 0; $j < $totalnum; $j++)
		   {
			   if (!empty($_POST['seat'][$j]))
			   {
				   if($_POST['seat'][$j] != 0)
				   {
					   $query = "UPDATE TICKET SET FLAG = '1',CUSTOMERID = '".$customerid."',ORDERTIME = '".$ordertime."' WHERE( SEATID IN (SELECT ID FROM SEAT WHERE (CINEMA = '".$cinema."' AND ROOM = '".$room."' AND SEATNUM = '".$_POST['seat'][$j]."')) AND TIME = '".$time."')";
					   $sql = mysql_query($query) or die(mysql_error());
				   }
			   }
		   }
	   }
}





//删除----------------------------------------------------------------
if ($action=="delete")
{
	$query = "UPDATE `TICKET` SET `FLAG` = '0',`CUSTOMERID` = '0',ORDERTIME = NULL WHERE ID='".$ticketid."'";
	$sql = mysql_query($query) or die(mysql_error());
}




//清空-------------------------------------------------------------------------
if ($action=="empty")
{
	$query = "UPDATE `TICKET` SET `FLAG` = '0',`CUSTOMERID` = '0',ORDERTIME = NULL WHERE CUSTOMERID = '".$customerid."' and FLAG = '1'";
	$sql = mysql_query($query) or die(mysql_error());
}


//--------------------------------------------------已购电影票---------------------------------------------------------------------
   $query = "SELECT * FROM ticket WHERE CUSTOMERID = ".$customerid." ORDER BY ID";
   $sql = mysql_query($query) or die(mysql_error());
   $count1 = mysql_num_rows($sql);

//如果购票车为空显示--------------------------------------------------
   if ($count1 == 0) {
	   PutWindow ($txt['cart1'], $txt['cart2'], "carticon.gif", "50");
	   exit(include("includes/exit.inc.php"));
   }

//如果购票车不为空-----------------------------------------------
   else {
   ?>
<?php //表格的显示--------------------------------------------------------------------------
?>
   <table width="100%" class="datatable">
     <caption><?php echo $txt['cart3'] ?></caption>

<?php //表头的显示---------------------------------------------------------------------------
?>
     <tr>
       <th><?php echo $txt['cart13']; ?></th>
       <th><?php echo $txt['cart5']; ?></th>
       <th><?php echo $txt['cart6']; ?></th>
       <th><?php echo $txt['cart7']; ?></th>
       <th><?php echo $txt['cart16']; ?></th>
    </tr>
<?php
  // $optel = 0;

   while ($row = mysql_fetch_row($sql))
   {
	if($row[5] == 2)
	{
         $query = "SELECT * FROM product where ID='" . $row[2] . "'";
	 $sql_details = mysql_query($query) or die(mysql_error());
	 while ($row_details = mysql_fetch_row($sql_details))
	 {
		 $print_description = $row_details[1];
?>

<?php//显示表格内容---------------------------------------------------------------------
?>
               <tr<?php// echo $kleur; ?>>
		   <td><a href="index.php?page=details&prod=<?php echo $row_details[0]; ?>"><?php echo $print_description; ?></a>
		   </td>
                   <td><?php 
			echo $currency_symbol;
			
                         $subtotaal = $row_details[4];
                         //if ($no_vat == 0 && $db_prices_including_vat == 0) { $subtotaal = $subtotaal * $vat; }
                         $printprijs = myNumberFormat($subtotaal, $number_format);
                         echo $printprijs;
                       ?>
                   </td>
                   <td>
			<?php echo $ordertime;?>
		   </td>
		   <td>
<?php $query1 = "SELECT * FROM SEAT WHERE ID = '".$row[1]."'";
$sql1 = mysql_query($query1);
while($row1 = mysql_fetch_row($sql1)){
	 echo $row1[1]." ".$row1[2]." ".$row[4];?>
		   </td>
<?php $u = intval(($row1[3]-1)/10+1);
      $v = $row1[3]%10;
      if ($v == 0) $v = 10;
?>
		   <td><?php echo "$u-$v";}?></ td>
               </tr>
               <?php
               $totaal = $totaal + $subtotaal;
         }//while
	}//if
   }//while
   if ($no_vat == 0 ) {
      $totaal_ex = $totaal / $vat;
      $totaal_ex = myNumberFormat($totaal_ex,$number_format);
   }
   $totaal = myNumberFormat($totaal,$number_format);

   //“总计”-----------------------------------------------------------------------------------------------的显示
	?>
	<tr><td colspan="5"><div style="text-align:right;"><strong><?php echo $txt['cart10']; ?></strong> <?php echo $currency_symbol . $totaal ?><br />
	<?php 
	if ($no_vat == 0) { echo "<small>(".$currency_symbol.$totaal_ex." ".$txt['general6']." ".$txt['general5'].")</small>"; }
	?></div></td></tr>
   </table>
   <br />
   <br />


<?php
   }//else
?>













<?php
//-------------------------------------------------未结算影票---------------------------------------------
   $query = "SELECT * FROM ticket WHERE CUSTOMERID = " . $customerid . " ORDER BY ID";
   $sql = mysql_query($query) or die(mysql_error());
   $count = mysql_num_rows($sql);
//如果购票车为空显示--------------------------------------------------
   if ($count == 0) {
	   PutWindow ($txt['cart1'], $txt['cart2'], "carticon.gif", "50");
	   exit(include("includes/exit.inc.php"));
   }

//如果购票车不为空-----------------------------------------------
   else {
   ?>
<?php //表格的显示--------------------------------------------------------------------------
?>
   <table width="100%" class="datatable">
     <caption><?php echo $txt['cart4'] ?></caption>

<?php //表头的显示---------------------------------------------------------------------------
?>
     <tr>
       <th><?php echo $txt['cart13']; ?></th>
       <th><?php echo $txt['cart5']; ?></th>
       <th><?php echo $txt['cart6']; ?></th>
       <th><?php echo $txt['cart7']; ?></th>
       <th><?php echo $txt['cart16']; ?></th>
       <th><?php echo $txt['cart8']; ?></th>
    </tr>
<?php
   $optel = 0;

   while ($row = mysql_fetch_row($sql))
   {
	if($row[5] == 1)
	{
         $query = "SELECT * FROM product where ID='" . $row[2] . "'";
	 $sql_details = mysql_query($query) or die(mysql_error());
	 while ($row_details = mysql_fetch_row($sql_details))
	 {
		 $print_description = $row_details[1];
?>

<?php//显示表格内容---------------------------------------------------------------------
?>
               <tr<?php echo $kleur; ?>>
		   <td><a href="index.php?page=details&prod=<?php echo $row_details[0]; ?>"><?php echo $print_description; ?></a>
		   </td>
                   <td><?php 
			echo $currency_symbol;
			
                         $subtotaal2 = $row_details[4];
                         //if ($no_vat == 0 && $db_prices_including_vat == 0) { $subtotaal = $subtotaal * $vat; }
                         $printprijs = myNumberFormat($subtotaal2, $number_format);
                         echo $printprijs;
                       ?>
                   </td>
                   <td>
			<?php echo $ordertime;?>
		   </td>
		   <td>
<?php $query2 = "SELECT * FROM SEAT WHERE ID = '".$row[1]."'";
$sql2 = mysql_query($query2);
while($row2 = mysql_fetch_row($sql2)){
	 echo $row2[1]." ".$row2[2]."<br />".$row[4];?>
		   </td>
<?php $u = intval(($row2[3]-1)/10+1);
      $v = $row2[3]%10;
      if ($v == 0) $v = 10;
?>
		   <td><?php echo "$u-$v";}?>
		   </ td>
	     	   <td>
                   <form method="POST" action="index.php?page=cart&action=delete">
                    <input type="hidden" name="ticketid" value="<?php echo $row[0] ?>">
                    <div style="text-align:right;"><input type="submit" value="<?php echo $txt['cart9']; ?>" name="sub">
                   </form>
		   </td>

               </tr>
               <?php
               $totaal2 = $totaal2 + $subtotaal2;
         }//while
	}//if
   }//while
   if ($no_vat == 0 ) {
      $totaal_ex2 = $totaal2 / $vat;
      $totaal_ex2 = myNumberFormat($totaal_ex2,$number_format);
   }
   $totaal2 = myNumberFormat($totaal2,$number_format);

   //“总计”-----------------------------------------------------------------------------------------------的显示
	?>
	<tr><td colspan="6"><div style="text-align:right;"><strong><?php echo $txt['cart10']; ?></strong> <?php echo $currency_symbol . $totaal2 ?><br />
	<?php 
	if ($no_vat == 0) { echo "<small>(".$currency_symbol.$totaal_ex2." ".$txt['general6']." ".$txt['general5'].")</small>"; }
	?></div></td></tr>
   </table>
   <br />
   <br />


<?php //“清空-----------------------------------------结算”的显示
?>
   <div style="text-align:center;">
    <table class="borderless" width="50%">
     <tr><td nowrap>
           <form method="post" action="index.php?page=cart&action=empty">
            <input type="submit" value="<?php echo $txt['cart11']; ?>">
           </form>
         </td>
         <td>
<?php
               // if the conditions page is disabled, then we might as well skip it ;)
	if ($conditions_page == 1) 
	{
		echo "<form method=\"post\" action=\"index.php?page=conditions&action=checkout\">";
		echo "<input type=\"hidden\" name=\"total\" value=".$totaal2.">";
	}
	else
       	{
	       	echo "<form method=\"post\" action=\"index.php?page=checkout\">";
		echo "<input type=\"hidden\" name=\"total\" value=".$totaal2.">";
	}
?>  
            <input type="submit" value="<?php echo $txt['cart12']; ?>">
           </form>
         </td>
     </tr>
    </table>
   </div>
   <?php
   }
   ?>
