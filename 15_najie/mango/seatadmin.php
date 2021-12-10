<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php include ("checklogin.php"); ?>
<?php
     // admin check
    if (IsAdmin() == false) {
	  PutWindow ($txt['general12'], $txt['general2'], "warning.gif", "50");
	  exit(include("includes/exit.inc.php"));
    }
     // ok, let's do the updating/deleting/moving here

     // add a room method
     if ($action == "add_room") {
	      if (!empty($_POST['cinema'])) {
	          $cinema=$_POST['cinema'];
          }
	      if (!empty($_POST['room'])) {
	          $room=$_POST['room'];
          }
		  $seats=0;
		  if (!empty($_POST['seats'])) {
		      $seats = $_POST['seats'];
		  }

          if ($cinema != "" && $room != "" && $seats != 0) {
		      for ($i=1; $i<=$seats; $i++) {
	              $query="INSERT INTO `seat` (`CINEMA`, `ROOM`, `SEATNUM`) VALUES ('".$cinema."', '".$room."',".$i.")";
	              $sql = mysql_query($query) or die(mysql_error());
			  }
	          PutWindow ($txt['general13'], $txt['seatadmin1'], "notify.gif", "50");
          }
     }

     // delete a room method
     if ($action == "delete_room") {
	      if (!empty($_GET['cinema'])) {
	          $cinema=$_GET['cinema'];
          }
		  if (!empty($_GET['room'])) {
		      $room=$_GET['room'];
		  }
          // remove room method
          $query="DELETE FROM `seat` WHERE `CINEMA`='".$cinema."' AND `ROOM`='".$room."'";
          $sql = mysql_query($query) or die(mysql_error());

          PutWindow ($txt['general13'], $txt['seatadmin2'], "notify.gif", "50");
      }

       // update a room method
	   if ($action == "update_room") {
		  if (!empty($_POST['cinema'])) {
	          $cinema=$_POST['cinema'];
          }
	      if (!empty($_POST['room'])) {
	          $room=$_POST['room'];
          }
		  $seats=0;
		  if (!empty($_POST['seats'])) {
		      $seats = $_POST['seats'];
		  }
		  if (!empty($_POST['oldcinema'])) {
		      $oldcinema = $_POST['oldcinema'];
		  }
		  if (!empty($_POST['oldroom'])) {
		      $oldroom = $_POST['oldroom'];
		  }
		  if (!empty($_POST['oldseats'])) {
		      $oldseats = $_POST['oldseats'];
		  }

          if ($cinema != "" && $room != "" && $seats != 0) {
		      $query="UPDATE `seat` SET `CINEMA`='".$cinema."', `ROOM`='".$room."' WHERE `CINEMA`='".$oldcinema."' AND `ROOM`='".$oldroom."'";
	          $sql = mysql_query($query) or die(mysql_error());
			  if ($oldseats > $seats) {
			      for ($i=$seats+1; $i <= $oldseats; $i++) {
				      $query="DELETE FROM `seat` WHERE `CINEMA`='".$cinema."' AND `ROOM`='".$room."' AND `SEATNUM`=".$i;
                      $sql = mysql_query($query) or die(mysql_error());
				  }
			  }
			  else if ($oldseats < $seats) {
	              for ($i=$oldseats+1; $i<=$seats; $i++) {
	                  $query="INSERT INTO `seat` (`CINEMA`, `ROOM`, `SEATNUM`) VALUES ('".$cinema."', '".$room."', ".$i.")";
	                  $sql = mysql_query($query) or die(mysql_error());
				  }
			  }

			  PutWindow ($txt['general13'], $txt['seatadmin3'], "notify.gif", "50");
	      }
	   }

	  // show a room method
      if ($action == "show_room") {
		  if (!empty($_GET['oldcinema'])) {
	          $oldcinema=$_GET['oldcinema'];
          }
		  if (!empty($_GET['oldroom'])) {
		      $oldroom=$_GET['oldroom'];
		  }
		  if (!empty($_GET['oldseats'])) {
		      $oldseats=$_GET['oldseats'];
		  }

         PutWindow ($txt['general13'], $txt['seatadmin12'], "warning.gif", "50");
		 echo "<table width=\"100%\" class=\"datatable\">";
         echo "  <caption>".$txt['seatadmin4']."</caption>";
		 echo "  <tr><th>".$txt['seatadmin5']."</th><th>".$txt['seatadmin6']."</th><th>".$txt['seatadmin7']."</th><th>".$txt['seatadmin11']."</th></tr>";
         echo "  <form method=\"POST\" action=\"index.php?page=seatadmin&action=update_room\">";
		 echo "<input name=\"oldcinema\" type=\"hidden\" value=\"".$oldcinema."\">";
		 echo "<input name=\"oldroom\" type=\"hidden\" value=\"".$oldroom."\">";
		 echo "<input name=\"oldseats\" type=\"hidden\" value=\"".$oldseats."\">";
         echo "  <tr class=\"altrow\">";
         echo "    <td><input name=\"cinema\" type=\"text\" value=\"".$oldcinema."\" size=\"25\" maxlength=\"50\"></td>";
         echo "    <td><input name=\"room\" type=\"text\" value=\"".$oldroom."\" size=\"10\" maxlength=\"20\"></td>";
         echo "    <td><input name=\"seats\" type=\"text\" value=\"".$oldseats."\" size=\"4\" maxlength=\"5\"></td>";
         echo "    <td><input type=\"submit\" value=\"".$txt['seatadmin13']."\"></td>";
         echo "  </tr>";
         echo "  </form>";
         echo "</table>";
		 exit(include("includes/exit.inc.php"));
      }

         echo "<table width=\"100%\" class=\"datatable\">";
         echo "  <caption>".$txt['seatadmin4']."</caption>";
         echo "  <tr><th>".$txt['seatadmin5']."</th><th>".$txt['seatadmin6']."</th><th>".$txt['seatadmin7']."</th><th>".$txt['seatadmin11']."</th></tr>";
         // add a room method
         echo "  <form method=\"POST\" action=\"index.php?page=seatadmin&action=add_room\">";
         echo "  <tr class=\"altrow\">";
         echo "    <td><input name=\"cinema\" type=\"text\" value=\"\" size=\"20\" maxlength=\"30\"></td>";
         echo "    <td><input name=\"room\" type=\"text\" value=\"\" size=\"15\" maxlength=\"20\"></td>";
         echo "    <td><input name=\"seats\" type=\"text\" size=\"5\" maxlength=\"5\"></td>";
         echo "    <td><input type=\"submit\" value=\"".$txt['seatadmin10']."\"></td>";
         echo "  </tr>";
         echo "  </form>";

         $query="SELECT `CINEMA`, `ROOM`, COUNT(*) FROM `seat` GROUP BY `CINEMA`, `ROOM`";
         $sql = mysql_query($query) or die(mysql_error());

         while ($row = mysql_fetch_row($sql)) {
	            echo "  <tr>";
	            echo "    <td>".$row[0]."</td>";
	            echo "    <td>".$row[1]."</td>";
	            echo "    <td>".$row[2]."</td>";
	            echo "    <td><a class=\"plain\" href=\"?page=seatadmin&oldcinema=".$row[0]."&oldroom=".$row[1]."&oldseats=".$row[2]."&action=show_room\">".$txt['seatadmin8']."</a><br />";
                echo "    <a class=\"plain\" href=\"?page=seatadmin&cinema=".$row[0]."&room=".$row[1]."&action=delete_room\">".$txt['seatadmin9']."</a></td>";
	            echo "  </tr>";
         }
         echo "</table>";
?>
