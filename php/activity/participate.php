<?php
	
	$uid=$_POST["uid"];
	$id=$_POST["id"];
	$isIn=$_POST["isIn"];
// 	$arr = array('message' =>$name.$isIn);
// 	exit(json_encode($arr));
// 	$name="sharon";
// 	$id="1";
// 	$isIn=0;
	include 'db.php';
	if($isIn==1){
		//exitActivity($name,$id);
		$sql="delete from activity_member where uid=$uid and aid=$id;";
		$db->exec($sql);
		$arr = array('message' =>"exit success");
		// 		$arr = array('message' =>$sql);
		exit(json_encode($arr));
	}else{
		//participate($name,$id);
		$sql="insert into activity_member (uid,aid) values(".$uid.",".$id.");";
// 		$arr = array('message' =>$sql);
		//exit(json_encode($arr));
		$db->exec($sql);
		
		$arr = array('message' =>"enter success");
		exit(json_encode($arr));
	}
?>