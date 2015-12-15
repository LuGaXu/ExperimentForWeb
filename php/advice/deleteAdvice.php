<?php
	$id=$_POST['id'];
	include 'db.php';
	$sql="delete from importAdvice where id=$id;";
	$db->exec($sql);
	$arr = array('message' =>"delete success");
	exit(json_encode($arr));
?>