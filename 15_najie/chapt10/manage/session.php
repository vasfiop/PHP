<?php
if($_SESSION["user_name"]=="" or $_SESSION["user_tag"]=="" or $_SESSION["user_id"]==""){
	header("location:../index.php");
}
?>