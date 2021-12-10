<?php
/*  shippingadmin.php
    Copyright 2006 Elmar Wenners
    Support site: http://www.chaozz.nl

    This file is part of FreeWebshop.org.

    FreeWebshop.org is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    FreeWebshop.org is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with FreeWebshop.org; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
?>
<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php include ("checklogin.php"); ?>
<?php
     // admin check
    if (IsAdmin() == false) {
	  PutWindow ($txt['general12'], $txt['general2'], "warning.gif", "50");
	  exit(include("includes/exit.inc.php"));
    }
     // ok, let's do the updating/deleting/moving here
     
     // add a payment method
     if ($action == "add_payment") {
	      if (!empty($_POST['description'])) {
	          $description=$_POST['description'];
          }
	      if (!empty($_POST['code'])) {
	          $code=$_POST['code'];
          }
          if ($description != "") {
	          $query="INSERT INTO `payment` (`description`, `code`) VALUES ('".$description."', '".$code."')";
	          $sql = mysql_query($query) or die(mysql_error());
	          PutWindow ($txt['general13'], $txt['paymentadmin1'], "notify.gif", "50");
          }
     }
     
     // edit a shipping method
     if ($action == "update_payment") {
	      if (!empty($_POST['pid'])) {
	          $pid=$_POST['pid'];
          }
	      if (!empty($_POST['description'])) {
	          $description=$_POST['description'];
          }
  	      if (!empty($_POST['code'])) {
	          $code=$_POST['code'];
          }
          
          if ($description != "") {
	          // shipping data
	          $query="UPDATE `payment` SET `description`='".$description."', `code`='".$code."' WHERE `id`=".$pid;
	          $sql = mysql_query($query) or die(mysql_error());
              
	          PutWindow ($txt['general13'], $txt['paymentadmin3'], "notify.gif", "50");
          }
      }      

     // delete a shipping method
     if ($action == "delete_payment") {
	     if (!empty($_GET['pid'])) {
	          $pid=$_GET['pid'];
          }
          // remove shipping method
          $query="DELETE FROM `payment` WHERE `id`=".$pid;
          $sql = mysql_query($query) or die(mysql_error());
          
          PutWindow ($txt['general13'], $txt['paymentadmin2'], "notify.gif", "50");
      } 
      // show a shipping method for editing
      if ($action == "show_payment") {
	     if (!empty($_GET['pid'])) {
	          $pid=$_GET['pid'];
          }
         $query="SELECT * FROM `payment` WHERE `id`=".$pid;
         $sql = mysql_query($query) or die(mysql_error());
         
         while ($row = mysql_fetch_row($sql)) {	
	          if ($row[3] == 1) { PutWindow ($txt['general13'], $txt['paymentadmin12'], "warning.gif", "50"); }   // part of system!
	          echo "<table width=\"100%\" class=\"datatable\">";
	          echo "<caption>".$txt['paymentadmin6']."</caption>";
	          echo "<form method=\"POST\" action=\"index.php?page=paymentadmin&action=update_payment\">";
	          echo "<input name=\"pid\" type=\"hidden\" value=\"".$row[0]."\">";
	          echo "<tr><td>";
	          echo $txt['paymentadmin5']."<br />";
	          echo "<input name=\"description\" type=\"text\" value=\"".$row[1]."\" size=\"30\" maxlength=\"150\"><br /><br />";
	          echo $txt['paymentadmin7']."<br />";
	          echo "<textarea rows=\"30\" cols=\"65\" name=\"code\">".$row[2]."</textarea>";
		      echo "</td></tr>";    
		      echo "<tr class=\"altrow\"><td>";
	          echo "<h4><input type=\"submit\" value=\"".$txt['shippingadmin8']."\"></h4>";
	          echo "</td></tr>";
              echo "</form>";
              echo "</table>";
     	      exit(include("includes/exit.inc.php"));
         }
      }
     
         echo "<table width=\"100%\" class=\"datatable\">";
         echo "  <caption>".$txt['paymentadmin4']."</caption>";
         echo "  <tr><th>".$txt['paymentadmin5']."</th><th>".$txt['paymentadmin11']."</th></tr>";
         // add a payment method
         echo "  <form method=\"POST\" action=\"index.php?page=paymentadmin&action=add_payment\">";
         echo "  <tr class=\"altrow\">";
         echo "    <td><input name=\"description\" type=\"text\" value=\"\" size=\"30\" maxlength=\"150\"></td>";
         echo "    <td><input type=\"submit\" value=\"".$txt['paymentadmin10']."\"></td>";
         echo "  </tr>";
         echo "  </form>";
         
         $query="SELECT * FROM `payment` ORDER BY `id`";
         $sql = mysql_query($query) or die(mysql_error());
         
         while ($row = mysql_fetch_row($sql)) {
	            echo "  <tr>";
	            echo "    <td>".$row[1]."</td>";
	            echo "    <td><a class=\"plain\" href=\"?page=paymentadmin&pid=".$row[0]."&action=show_payment\">".$txt['paymentadmin8']."</a><br />";
                if ($row[3] <> 1) {echo "    <a class=\"plain\" href=\"?page=paymentadmin&pid=".$row[0]."&action=delete_payment\">".$txt['paymentadmin9']."</a></td>"; }
	            echo "  </tr>";
         }    
         echo "</table>";
?>