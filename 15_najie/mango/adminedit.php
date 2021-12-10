<?php
/*  conditions.php
    Copyright 2006 Elmar Wenners
    Support site: http://www.chaozz.nl

    This file is part of UltraShop.

    UltraShop is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    UltraShop is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with UltraShop; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
?>
<?php if ($index_refer <> 1) { exit(include("includes/exit.inc.php")); } ?>
<?php 
  $wysiwyg = $_GET['wysiwyg'];
  if (is_null($wysiwyg)) { $wysiwyg = 1; }
  if ($wysiwyg == 1) { include ("addons/tinymce/tinymce.inc"); }
    
      
  if (IsAdmin() == false) {
    PutWindow ($txt['general12'], $txt['general2'], "warning.gif", "50");
    exit(include("includes/exit.inc.php"));
  }
  
  if (!empty($_POST['text2edit'])) {
	  $text2edit=stripslashes($_POST['text2edit']);
	  
  }
  // name can be send via the form below
  if (!empty($_POST['filename'])) {
	  $filename=$_POST['filename'];
  }
  // but will be send in the url if opened from other parts of the webshop
  if (!empty($_GET['filename'])) {
	  $filename=$_GET['filename'];
  }
  $root = 0;
  $filename = stripslashes($filename); // hacking protection against ../../../ filenames
  
  // find out if the file is in the root or not.
   if (!empty($_POST['root'])) {
	  $root=$_POST['root'];
  }
 if (!empty($_GET['root'])) {
	  $root=$_GET['root'];
  }
  if ($root == NULL) { $root = 0; }
  if ($root == 0) { 
	  $fullfilename = $lang_dir."/".$lang."/".$filename;  // the file is not in the root of the shop, so it must be in the lang folder
  }
  else { $fullfilename = $filename; } // the fullfilename just the filename
  
  // if action == write_changes, then do so
  if ($action == "write_changes") {
	  $fp=fopen($fullfilename,"w") or die("Couldn't open ".$fullfilename.".. Make sure it exists and is writable (chmod 666 or 777).");
      fwrite($fp,$text2edit);
      fclose($fp);   
      PutWindow ($txt['general13'], $txt['adminedit2'], "notify.gif", "50");
  }
  
  // security check. you can only edit .txt files  	  
  list($name, $ext) = split('[.]', $filename);
  if (!$ext == "txt") {
      PutWindow ($txt['general12'], $txt['general2'], "warning.gif", "50");
      exit(include("includes/exit.inc.php"));
  }
  
  // try to open
  $fp = fopen($fullfilename, "rb") or die("Couldn't open ".$fullfilename.".. Make sure it exists and is readable.");
  if (filesize($fullfilename) > 0) { $text2edit = fread($fp, filesize($fullfilename)); }
  fclose($fp);
  echo "<strong>".$txt['adminedit3']." ".$fullfilename."</strong>";
?>
 <form method="post" action="index.php?page=adminedit&wysiwyg=<?php echo $wysiwyg; ?>">
   <textarea rows="30" cols="65" name="text2edit"><?php echo $text2edit ?></textarea><br />
   <input type="hidden" name="action" value="write_changes">
   <input type="hidden" name="filename" value="<?php echo $filename; ?>">
   <input type="hidden" name="root" value="<?php echo $root; ?>">
   <input type="submit" value="<?php echo $txt['adminedit1']; ?>">
 </form>