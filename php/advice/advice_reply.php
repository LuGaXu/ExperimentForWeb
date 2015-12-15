	<?php 
		require 'base.php';
		session_start();
		$type=$_SESSION['type'];
		$id=$_SESSION['id'];
		include 'db.php';
		$sql="select count(*) from reply where toId=$id and read=0";
		$ret = $db->query($sql);
		$num1=0;
		while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
			$num1=$row['count(*)'];
		}
		$sql="select count(*) from message where toId=$id and read=0";
		$ret = $db->query($sql);
		$num2=0;
		while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
			$num2=$row['count(*)'];
		}	
	?>
	
	<div class="container">
    	<div class="row" >
    		<div class="col-md-4" style="height:300px;">
             <!--nav-pill begin-->
            <div id="pill">
            	<ul class="nav nav-pills nav-stacked">
    			<h3>建议管理</h3>
  		
                <li role="presentation"><a href="advice.php">提问</a></li>
                <li role="presentation" class="active"><a href="advice_reply.php">回复<span id="writen" class="badge"></span></a></li>
                <li role="presentation" id="special" style="display: none"><a href="advice_write.php">待回复<span id="unwrite" class="badge"></span></a></li>
                <li role="presentation"><a href="advice_import.php">导入</a></li>
			</ul>
            </div>
             <!--nav-pill end-->
            </div>
     		<div class="col-md-8" id="content" style="">
            	<div class="page-header">
     	 				<h1><span>回复</span></h1>
    			 </div>
     			<div class="content">  
     				
                	<?php 
                		$sql="select r.*,name,text from reply r,User u,message m where r.toId=$id and u.id=r.fromId and r.mid=m.id  order by r.id desc;";
                		$ret = $db->query($sql);
						while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
							$doctor=$row['name'];
							$question=$row['text'];
							$reply=$row['reply'];
							$read=$row['read'];
							$rid=$row['id'];
					?>
						<!--一条回复开始-->
	               		 <div class="reply">
	                        <p><span class="expert" style="color:#F50307;"><?php echo $doctor?></span>的回复：
	                        	<span class="answer"><?php echo $reply?></span></p>
	                     	<div class="question">
	                        	<p>我的问题：<span class="ask"><?php echo $question?></span></p>
	                        </div>
	                     </div>
	                     <!--一条回复结束-->
					<?php 
							if($read==0){
								$sql="update reply set read=1 where id=$rid;";
							    $db->exec($sql);
							}
						}
                	?>
            	</div>
            </div>
    	</div>
 	</div>
    
</body>
<script>
   $(document).ready(function() {
	   var type='<?php echo $type?>';
	   var num1=<?php echo $num1?>;
	   var num2=<?php echo $num2?>;
	   if(num1>0){
		   $("#writen").html(num1);
		}
	   if(num2>0){
			$("#unwrite").html(num2);
		}
	   if(type=='医生'||type=='教练'){
		   $("#special").show();
	   }
	   $("#tag1").hover(function(){
		     $("#tag1").addClass("active");
		 });
	 $("#tag1").mouseleave(function(){
		 	  $("#tag1").removeClass("active");
		 });
    
	$("#tag2").hover(function(){
		     $("#tag2").addClass("active");
		 });
	 $("#tag2").mouseleave(function(){
		 	  $("#tag2").removeClass("active");
		 });
	$("#tag4").hover(function(){
		     $("#tag4").addClass("active");
		 });
	 $("#tag4").mouseleave(function(){
		 	  $("#tag4").removeClass("active");
		 });
	$("#tag5").hover(function(){
		     $("#tag5").addClass("active");
		 });
	 $("#tag5").mouseleave(function(){
		 	  $("#tag5").removeClass("active");
		 });
	
});
</script>

</html>