<?php
		//"uid="+uid+"&did="+did+"&gender="+gender+"&age="+age+"&text="+text
		$fromId=$_POST["uid"];
		$toId=$_POST["did"];
		$gender=$_POST["gender"];
		$age=$_POST["age"];
		$text=$_POST["text"];
// 		$from=3;
// 		$to=4;
// 		$gender='男';
// 		$age=17;
// 		$text="hahahahahaah";
		
		include 'db.php';
		$sql="insert into message ('fromId','toId',gender,age,text) values($fromId,$toId,'".$gender."',$age,'".$text."');";
// 		echo $sql;
		$db->exec($sql);
		$arr = array('message' =>"send success");
		//$arr = array('message' =>$sql);
		exit(json_encode($arr));
?>