<?php
print_r($_FILES);
$filename=$_FILES["file"]["name"];
echo $filename;
move_uploaded_file($_FILES["file"]["tmp_name"],"./1.jpg");