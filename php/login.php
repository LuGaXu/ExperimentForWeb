<?php
 	    session_start();
	 	$name=$_POST["name"];
	 	$password=$_POST["password"];
// 	 	$name="sharpay";
// 	 	$password="123456";
	 	include 'db.php';
	 	//$hash= password_hash($password, PASSWORD_DEFAULT);
	 	$sql="select count(*),* from User where name='$name';";
	 	$ret = $db->query($sql);
	 	while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
	 		$id=$row['id'];
	 		$pass=$row['password'];
	 		$num=$row['count(*)'];
	 		$type=$row['type'];
	 		$email=$row['email'];
	 		$gender=$row['gender'];
	 		$birthmonth=$row['birthmonth'];
	 		$birthday=$row['birthday'];
	 		$location=$row['location'];
	 		$interest=$row['interest'];
	 		$motto=$row['motto'];
	 		$position=$row['position'];
	 		if ($num==0){
	 			$arr = array('message' => "login failed");
	 			exit(json_encode($arr));
	 		}else if(password_verify($password, $pass)){
	 			$_SESSION['id']=$id;
	 			$_SESSION['name']=$name;
	 			$_SESSION['type']=$type;
	 			$_SESSION['email']=$email;
	 			$_SESSION['gender']=$gender;
	 			$_SESSION['birthmonth']=$birthmonth;
	 			$_SESSION['birthday']=$birthday;
	 			$_SESSION['location']=$location;
	 			$_SESSION['interest']=$interest;
	 			$_SESSION['motto']=$motto;
	 			$_SESSION['position']=$position;
	 			
	 			$arr = array('message' =>"login success");  
            	exit(json_encode($arr));  
	 		}else{
	 			$arr = array('message' => "login failed");
	 			exit(json_encode($arr));
// 	 			echo  "login failed";
	 	}
	 }
?>
