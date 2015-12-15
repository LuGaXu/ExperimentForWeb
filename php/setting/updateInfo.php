<?php
		//"name="+newname+"&gender="+newgender+"&birthmonth="+newmonth+"&birthday="+newday
// 						+"&interest="+newinterest+"&location="+newlocation+"&motto="+newmotto
		session_start();
		$name=$_POST["name"];
		$gender=$_POST["gender"];
		$birthmonth=$_POST["birthmonth"];
		$birthday=$_POST["birthday"];
		$interest=$_POST["interest"];
		$location=$_POST["location"];
		$motto=$_POST["motto"];
		$oldname=$_SESSION['name'];
		
		include 'db.php';
		if($oldname!=$name){
			$sql="select count(*) from User where name='".$name."';";
			$ret = $db->query($sql);
			while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
				$num=$row['count(*)'];
				if($num>=1){
					$arr = array('message' =>"name used");
					exit(json_encode($arr));
				}
			}
		}
		$sql="update User set name='".$name."',gender='".$gender."',birthmonth='".$birthmonth."',birthday='".$birthday."'
				,interest='".$interest."',location='".$location."',motto='".$motto."' where name='".$_SESSION['name']."';";
		$db->exec($sql);
		$_SESSION['name']=$name;
		$_SESSION['gender']=$gender;
		$_SESSION['birthmonth']=$birthmonth;
		$_SESSION['birthday']=$birthday;
		$_SESSION['interest']=$interest;
		$_SESSION['location']=$location;
		$_SESSION['motto']=$motto;
		$arr = array('message' =>"save success");
		//$arr = array('message' =>$sql);
		exit(json_encode($arr));
		
?>