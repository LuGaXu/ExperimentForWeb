<?php
/* if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  } */
  $length=sizeof($_FILES["file"]["name"]);
  session_start();
  $id=$_SESSION['id'];
  
  include 'db.php';
  require_once 'reader.php';
  
  for($i=0;$i<$length;$i++){
	  if (file_exists("upload/" . $_FILES["file"]["name"][$i]))
	  {
	  	$path="F:/nju/study/web/ExperimentForWeb/upload/" . $_FILES["file"]["name"][$i];
	  }
	  else
	  {
	  	move_uploaded_file($_FILES["file"]["tmp_name"][$i],
	  			"F:/nju/study/web/ExperimentForWeb/upload/" . $_FILES["file"]["name"][$i]);
	  	//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	  	$path="F:/nju/study/web/ExperimentForWeb/upload/" . $_FILES["file"]["name"][$i];
	  }
	  echo $path;
	  if(strrchr($path,".xml")==".xml"){
		  	header("content-type:text/html; charset=utf-8"); //设置编码
		  	$doc = new DOMDocument();
		  	$doc->load( $path);
		  	$advices = $doc->getElementsByTagName( "advice" );
		  	foreach( $advices as $advice )
		  	{
		  		$authors = $advice->getElementsByTagName( "author" );
		  		$author = $authors->item(0)->nodeValue;
		  	
		  		$contents = $advice->getElementsByTagName( "content" );
		  		$content = $contents->item(0)->nodeValue;
		  	
		  		$sql="insert into importAdvice(uid,author,content) values ($id,'$author','$content');";
// 		   	    echo $sql;
		  		$db->exec($sql);
// 		  		echo $author."-".$content.'<br/>';
		  	}
		  	unset($advice); 
	  }else if(strrchr($path,".xls")==".xls"){
	  	// ExcelFile($filename, $encoding);
	  	$data = new Spreadsheet_Excel_Reader();
	  	
	  	// Set output Encoding.
	  	$data->setOutputEncoding('UTF-8');
	  	
	  	$data->read($path);
	  	
	  	error_reporting(E_ALL ^ E_NOTICE);
	  	
	  	for ($m = 1; $m <= $data->sheets[0]['numRows']; $m++) {
	  			$author=$data->sheets[0]['cells'][$m][1];
	  			$content=$data->sheets[0]['cells'][$m][2];
	  			if($author==''||$content=='')
	  				continue;
	  			$sql="insert into importAdvice(uid,author,content) values ($id,'$author','$content');";
	  			$db->exec($sql);
	  	}
	  }
  }
 header("location:advice_import.php"); 
?>