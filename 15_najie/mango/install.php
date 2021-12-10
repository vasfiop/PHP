<?php
    // public error printer
    error_reporting(0);
    function PrintError ($message) {
	    echo "<br /><br />";
	    echo "<table border=\"5\" bordercolor=\"red\" cellpadding=\"4\" cellspacing=\"0\"><tr><td><strong>Error:</strong>&nbsp;";
	    echo $message;
	    echo "<br /><br /><a href=\"install.php\">Try again</a>";
	    echo "</td></tr></table>";
	    exit;
    }
    function parse_mysql_dump($url, $ignoreerrors = false) {
        $file_content = file($url);
        //print_r($file_content);
        $query = "";
        foreach($file_content as $sql_line) {
          $tsl = trim($sql_line);
          if (($sql_line != "") && (substr($tsl, 0, 2) != "--") && (substr($tsl, 0, 1) != "#")) {
            $query .= $sql_line;
            if(preg_match("/;\s*$/", $sql_line)) {
              $result = mysql_query($query);
              if (!$result && !$ignoreerrors) die(mysql_error());
              $query = "";
            }
          }
        }
    }
    // header printer
    function PrintPageHeader ($header) {
	    echo "<h1><img src=\"gfx/logo_about.gif\" align=\"right\" alt=\"\" />".$header."<hr size=\"5\" noshade color=\"#001894\" width=\"100%\"></h1>";
    }


    // read post values
    $step = 1;
    if (!empty($_POST['step'])) { $step=$_POST['step']; }
    // database values
    if (!empty($_POST['dblocation'])) { $dblocation=$_POST['dblocation']; }
    else { $dblocation = ""; }
    if (!empty($_POST['dbname'])) { $dbname=$_POST['dbname']; }
    else { $dbname = ""; }
    if (!empty($_POST['dbuser'])) { $dbuser=$_POST['dbuser']; }
    else { $dbuser = ""; }
    if (!empty($_POST['dbpass'])) { $dbpass=$_POST['dbpass']; }
    else { $dbpass = ""; }


    // header
    ?>
    <html>
     <head>
	  <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	  <META HTTP-EQUIV="Expires" CONTENT="-1">
      <title>Mango installation</title>
     </head>
     <body bgcolor="white">
     <font face="verdana,arial">
    <?php

    if ($step == 1) {
	    // display welcome
	    PrintPageHeader("��ӭʹ��mango��ӰԺ������Ʊϵͳ");
	    ?>
	    ���ǽ�ʹ��һ���ǳ��򵥵ķ����������ݱ�.<br />
	    <br />
	    <b>ע��:</b> ����ϸ�Ķ�mango�ļ����е�readme.txt�ļ�, �Ի�ø���İ�װ��Ϣ��<br />
	    <br />
	    �ڵ�������һ����֮ǰ��������������׼��:
		<ul>
	     <li><font color=red>�����ݿ������һ���û�</font> </li>
	     <li><font color=red>����ȷ�Ű���includes\settings.inc.php�ļ�</font></li>
	    </ul>
	    ����������׼��֮ǰ����������һ��������..<br />
	    <br />
	    <form method="post" action="install.php">
	          <input type="hidden" name="step" value="2">
	          <input type="submit" value="Next step">
	    </form>
	    <?php
    }

    if ($step == 2) {
	    // show form in which database values must be filled in
	    PrintPageHeader("����1 - ��д�������ݱ��ʼ��������Ļ�����Ϣ");
	    ?>
	     ���ȣ����Ǳ��봴��һ�����ݿ�. �����û������,����Ҳ���Դ���! ��ΪҪ�����ݱ��е����ݱ��浽���ݿ���.<br />
	    <br />
	    <form method="post" action="install.php">
	          <strong>���ݿ�����</strong><br />
	          ���ݿ��������ַ:<br />
	          <input type="text" name="dblocation" value="localhost"><br />
	          ���ݿ������:<br />
	          <input type="text" name="dbname" value="webmovie"><br />
	          ���ݿ���û���:<br />
	          <input type="text" name="dbuser" value="root"><br />
	          ���ݿ��û�������:<br />
	          <input type="password" name="dbpass" value="root">
	          <input type="hidden" name="step" value="3">
	          <input type="submit" value="Next step">
	    </form>
	    <?php
    }

    if ($step == 3) {
       PrintPageHeader("����2 -�����ñ��浽settings�ļ���");
	   // try to connect to database before writing them to the settings file
	   $db = mysql_connect($dblocation,$dbuser,$dbpass) or die(PrintError ("Could not connect to the database ".$dbname." with the data supplied. Please check the data!"));
 	   mysql_select_db($dbname,$db) or die(PrintError ("Could not connect to the database ".$dbname." with the data supplied. Please check the data!"));
	   echo "�ɹ��������ݿ⣡<br />";
	        // save values to settings.php
	        $nothing = "";
            @chmod("includes/settings.inc.php", 0777);
	        $f=@fopen("includes/settings.inc.php","a");
	        if ($f) {
			fwrite($f,"<?php\n");
		        fwrite($f,"    // database values\n");
		        fwrite($f,"    $".$nothing."dblocation = \"".$dblocation."\";\n");
		        fwrite($f,"    $".$nothing."dbname = \"".$dbname."\";\n");
		        fwrite($f,"    $".$nothing."dbuser = \"".$dbuser."\";\n");
		        fwrite($f,"    $".$nothing."dbpass = \"".$dbpass."\";\n");
		        fwrite($f,"?>");
		        fclose($f);
		        echo "���û���������ݶ������浽settings.php�ļ��С�";
		        ?>
	            <br />
	            <form method="post" action="install.php">
	                 <input type="hidden" name="dblocation" value="<?php echo $dblocation; ?>">
	                 <input type="hidden" name="dbname" value="<?php echo $dbname; ?>">
	                 <input type="hidden" name="dbuser" value="<?php echo $dbuser; ?>">
	                 <input type="hidden" name="dbpass" value="<?php echo $dbpass; ?>">
	                 <input type="hidden" name="step" value="4">
	                 <input type="submit" value="Next step">
	            </form>
	            <?php
            }
            else {
		    // settings.php is not writable
		    PrintError ("includes/settings.inc.php is not writable. Change it's permissions to 777 and try again!");
	    }
    }

    if ($step == 4 ) {
	   PrintPageHeader("����3 -�������ݱ�ɹ� ");
	   // connect to database
	   $db = mysql_connect($dblocation,$dbuser,$dbpass) or die(PrintError ("Could not connect to the database ".$dbname." with the data supplied. Please check the data!"));
 	   mysql_select_db($dbname,$db) or die(PrintError ("Could not connect to the database ".$dbname." with the data supplied. Please check the data!"));

 	   echo "Filling database <strong>".$dbname."</strong> with the correct tables and values..<br /><br />";
       // fill database with correct structure
       parse_mysql_dump('webmovie.sql', FALSE);
       echo "<br><b>���!</b><br><br>";
       echo "�Ѿ��ɹ�������webmovie�е����ݱ�.����������֮ǰ������ɾ�����޸�<b>install.php</b>�ļ�!<br><br>";
       echo "�����ڿ��Ե�¼<a href=index.php>mango��ӰԺ������Ʊϵͳ</a>ʹ�øմ������û��������룡����<br><br>";
       echo "<b>����Ա�û���:</b> admin<br><b>����Ա����:</b> admin<br><br>";
       echo "<font color=red><b>��Ҫ�����޸�admin�û��������EMAIL��ַ!!</b></font><br><br>";

    }

   // footer
?>
   </font>
   </body>
  </html>
