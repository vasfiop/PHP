<?php
$filename = "./pic/2.jpg";
header('Content-Type:image/jpeg');
header('Content-Disposition:attachment;filename="1.jpg"');
header('Content-Length:' . filesize($filename));
readfile($filename);
