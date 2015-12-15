<?php
	include 'db.php';
	$id=$_POST["id"];
	$sql="update message set read=1 where id=$id;";
	$db->exec($sql);
	$arr = array('message' =>"update success");
	//$arr = array('message' =>$sql);
	exit(json_encode($arr));
	
?>