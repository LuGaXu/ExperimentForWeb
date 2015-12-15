<?php
	$start=$_POST["start"];
	$stop=$_POST["stop"];
	$target=$_POST["target"];
	$theme=$_POST["theme"];
	$id=$_POST["uid"];

// 	$start="2015-12-12 23:22:33";
// 	$stop="2015-12-13 23:22:33";
// 	$target="target";
// 	$theme="theme";
// 	$author="1";

	include 'db.php';
	$sql = "insert into activity(start,stop,target,theme,uid)
    values ('".$start."','".$stop."','".$target."','".$theme."',".$id.");";
	
	$db->exec($sql);
	$arr = array('message' =>"publish success");
	exit(json_encode($arr));
?>