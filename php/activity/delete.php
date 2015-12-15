<?php
	$aid=$_POST["aid"];
	include 'db.php';
	$sql = "delete from activity where id=".$aid.";";
	$db->exec($sql);
	$sql = "delete from activity_member where aid=".$aid.";";
	$db->exec($sql);
	$arr = array('message' =>"delete success");
	exit(json_encode($arr));
?>