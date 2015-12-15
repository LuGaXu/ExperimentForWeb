	<?php 
		require 'base.php';
	?>
    <div class="container">
    	<div class="row" >
    		<div class="col-md-4" style="height:300px;">
             <!--nav-pill begin-->
            <div id="pill">
            	<ul class="nav nav-pills nav-stacked">
    			<h3>活动管理</h3>
  		
                <li role="presentation" class="pillElement"><a href="activity.php">参与活动</a></li>
                <li role="presentation" class="pillElement"><a href="activity_mine.php">我的活动</a></li>
                <li role="presentation" class="active pillElement"><a href="acitivity_publish.php">发布活动</a></li>
			</ul>
            </div>
             <!--nav-pill end-->
            </div>
     		<div class="col-md-8" id="content" style="top:100px;">
            	<div class="page-header">
     	 				<h1><span>已发布的活动</span></h1>
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" style="float:right;margin-top:-50px;margin-right:50px;">发布新活动</button>
    			 </div>
     			<div class="content">  
        
                	<!--活动内容-->
                	<?php 
                		session_start();
                		include 'db.php';
                		$name=$_SESSION['name'];
                		$uid=$_SESSION['id'];
                		$sql="select id,start,stop,start,stop,theme,target from activity where uid='$uid';";
                		$ret = $db->query($sql);
                		
                		if($ret){
	                		while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
								$id=$row['id'];
	                			$start=$row['start'];
	                			$startdate=explode(' ', $start)[0];
	                			$stop=$row['stop'];
	                			$target=$row['target'];
	                			$theme=$row['theme'];
	                			
	                ?>
	                <div class="activity" onClick="activityInfo(<?php echo $id ?>)">
                        <div class="theme">
                            <!--10个字，20byte-->
                            <p><?php echo $theme?></p>
                            
                        </div>
                        <div class="num">
                            <br/>
                            <p>参与人数</p>
                            <p style="font-size:2em">
                            <?php 
                            $sql1="select count(*) from activity_member where aid=".$id.";";
                            $ret1 = $db->query($sql1);
                            $num=0;
                            while ($row1 = $ret1->fetchArray(SQLITE3_ASSOC)) {
                            	$num=$row1['count(*)'];
                            }
                            echo $num;
                            ?>
                            </p>
                        </div>
                        <div class="start">
                            <br/>
                            <p>开始时间</p>
                            <p style="font-size:1.6em"><?php echo  $startdate?></p>
                        </div>
                        <div class="target">
                            <br/>
                            <p>目标</p>
                            <p style="font-size:1.5em"><?php echo $target?></p>
                        </div> 
                     </div>
                    <div style="margin-left:50px;">
                       <a onClick="updateActivity(<?php echo $id?>,'<?php echo $start?>','<?php echo $stop?>','<?php echo $target?>','<?php echo $theme?>')" href="#">修改</a>
                    
                       <a  onClick="deleteActivity(<?php echo $id ?>)" href="#">删除</a>
                       <!--activity end-->
                       </div>
	                <?php 
	                		}
                		}
                	?>
                 
                    </div>
                    <!--content end-->
            </div>
    	</div>
 	</div>
 	
  <div class="modal fade bs-example-modal-sm" id="delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="margin-top:70px;">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body"  id="deletebody">
      	<div class="form-group" style="text-align:center;font-family:'微软雅黑','宋体','新宋体';">
             <h2>&nbsp;是否确认删除</h2>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="submitdelete">确定</button>
      </div>
    </div>
  </div>
</div>

   <!-- 发布活动Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:70px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-size:2em;font-family:'宋体', '微软雅黑', '新宋体'"><strong>活动信息</strong></h4>
      </div>
      <div class="modal-body"  id="modalbody">
      	<div class="form-group">
        	
             <label class="col-sm-4 control-label">活动开始时间</label>
             <div class="col-sm-6">
                <input size="16" type="text" value="2015-12-4 14:45" readonly id="newstart" class="form_datetime form-control">
             </div>
             <div class="col-sm-2"></div>
         </div>
         <div class="form-group">           
             <label style="margin-top:30px;" class="col-sm-4 control-label">活动结束时间</label>
             <div style="margin-top:30px;" class="col-sm-6">
                <input size="16" type="text" value="2015-12-11 14:45" readonly id="newstop" class="form_datetime form-control">
             </div>
             <div class="col-sm-2"></div>
         </div>
         <div class="form-group">
         	<label style="margin-top:30px;" class="col-sm-4 control-label">活动目标</label>
             <div style="margin-top:30px;" class="col-sm-6">
                <input size="16" type="text" id="newtarget" class="form-control">
             </div>
         </div>
         <div class="form-group">
         	<label style="margin-top:30px;" class="col-sm-4 control-label">活动主题(不超过9个字)</label>
             <div style="margin-top:30px;" class="col-sm-6">
                <input  id="newtheme" size="16" type="text" class="form-control">
             </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" id="submit">发布</button>
      </div>
    </div>
  </div>
</div>

<!-- 修改活动信息MODAL -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:70px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-size:2em;font-family:'宋体', '微软雅黑', '新宋体'"><strong>活动信息</strong></h4>
      </div>
      <div class="modal-body"  id="modalbody">
      	<div class="form-group">
        	
             <label class="col-sm-4 control-label">活动开始时间</label>
             <div class="col-sm-6">
                <input size="16" type="text" value="2015-12-4 14:45" readonly id="newstart1" class="form_datetime form-control">
             </div>
             <div class="col-sm-2"></div>
         </div>
         <div class="form-group">           
             <label style="margin-top:30px;" class="col-sm-4 control-label">活动结束时间</label>
             <div style="margin-top:30px;" class="col-sm-6">
                <input size="16" type="text" value="2015-12-11 14:45" readonly id="newstop1" class="form_datetime form-control">
             </div>
             <div class="col-sm-2"></div>
         </div>
         <div class="form-group">
         	<label style="margin-top:30px;" class="col-sm-4 control-label">活动目标</label>
             <div style="margin-top:30px;" class="col-sm-6">
                <input size="16" type="text" id="newtarget1" class="form-control">
             </div>
         </div>
         <div class="form-group">
         	<label style="margin-top:30px;" class="col-sm-4 control-label">活动主题(不超过9个字)</label>
             <div style="margin-top:30px;" class="col-sm-6">
                <input  id="newtheme1" size="16" type="text" class="form-control">
             </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" id="update">更新</button>
      </div>
    </div>
  </div>
</div>
<script>
	  var aid;
	  var oldstart;
	  var oldstop;
	  var oldtarget;
	  var oldtheme;

	   $(document).ready(function() {
		   $("#tag1").hover(function(){
			     $("#tag1").addClass("active");
			 });
		 $("#tag1").mouseleave(function(){
			 	  $("#tag1").removeClass("active");
			 });
	    
		$("#tag3").hover(function(){
			     $("#tag3").addClass("active");
			 });
		 $("#tag3").mouseleave(function(){
			 	  $("#tag3").removeClass("active");
			 });
		$("#tag4").hover(function(){
			     $("#tag4").addClass("active");
			 });
		 $("#tag4").mouseleave(function(){
			 	  $("#tag4").removeClass("active");
			 });
	});

	   function activityInfo(id){
		   window.location.href="activity_participation.php?id="+id;
	   }
	  
	  $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

	  function deleteActivity(id){
		  $("#delete").modal();
		  aid=id;
	  }

	  function updateActivity(id,start,stop,target,theme){
		 $("#myModal1").modal();
		 $("#newstart1").val(start);
		 $("#newstop1").val(stop);
		 $("#newtarget1").val(target);
		 $("#newtheme1").val(theme);
		 aid=id;
		 oldstart=start;
		 oldstop=stop;
		 oldtarget=target;
		 oldtheme=theme;
	 }

	  $("#update").click(function(){
		  	
			var start=$("#newstart1").val();
			var stop=$("#newstop1").val();
			var target=$("#newtarget1").val();
			var theme=$("#newtheme1").val();
			
			if(start==oldstart&&stop==oldstop&&target==oldtarget&&theme==oldtheme){
				alert("亲，你没有任何修改哟~");
				return;
			}

			var author='<?php echo $_SESSION['name'] ?>';
			if(author==''){
				alert("请先登录");
				window.location.href="../../View/login.html";
			}
			var timeStamp_date_one = new Date(start).getTime() ; //1375077000000 
			var timeStamp_date_two = new Date(stop).getTime() ;//1375080600000 
			var now=new Date().getTime();
			
			if(timeStamp_date_one>=timeStamp_date_two){
				alert("开始时间不能晚于结束时间！");
				return;
			}
			if(now>=timeStamp_date_two){
				alert("结束时间不得早于当前时间");
				return;
			}
			if(target==''||theme==''){
				alert("内容不能为空！");
				return;
			}
			
			var xmlHttp=GetXmlHttpObject();
			if (xmlHttp==null){
		 		alert ("Browser does not support HTTP Request")
		 		return
		 	}
		 	
		 	xmlHttp.onreadystatechange = sign_up_callback;
			xmlHttp.open("POST", "update.php", false);
			xmlHttp.setRequestHeader("Content-Type",
					"application/x-www-form-urlencoded");
 			xmlHttp.send("id="+aid+"&start="+start+"&stop="+stop+"&target="+target+"&theme="+theme);
	  });
	  
	  $("#submitdelete").click(function(){
		   var xmlHttp=GetXmlHttpObject();

			if (xmlHttp==null){
		 		alert ("Browser does not support HTTP Request")
		 		return
		 	}
		 	xmlHttp.onreadystatechange = sign_up_callback;
			xmlHttp.open("POST", "delete.php", false);
			xmlHttp.setRequestHeader("Content-Type",
					"application/x-www-form-urlencoded");
			xmlHttp.send("aid="+aid);
	  });
	  
	  $("#submit").click(function(){
		    var start=$("#newstart").val()+":00";
			var stop=$("#newstop").val()+":00";
			var target=$("#newtarget").val();
			var theme=$("#newtheme").val();
			
			var author='<?php echo $_SESSION['name'] ?>';
			var uid=<?php echo $_SESSION['id']?>;
			if(author==''){
				alert("请先登录");
				window.location.href="../../View/login.html";
			}
			var timeStamp_date_one = new Date(start).getTime() ; //1375077000000 
			var timeStamp_date_two = new Date(stop).getTime() ;//1375080600000 
			var now=new Date().getTime();
			
			if(timeStamp_date_one>=timeStamp_date_two){
				alert("开始时间不能晚于结束时间！");
				return;
			}
			if(now>=timeStamp_date_two){
				alert("结束时间不得早于当前时间");
				return;
			}
			if(target==''||theme==''){
				alert("内容不能为空！");
				return;
			}
			
			var xmlHttp=GetXmlHttpObject();

			if (xmlHttp==null){
		 		alert ("Browser does not support HTTP Request")
		 		return
		 	}
		 	xmlHttp.onreadystatechange = sign_up_callback;
			xmlHttp.open("POST", "publish.php", false);
			xmlHttp.setRequestHeader("Content-Type",
					"application/x-www-form-urlencoded");
			xmlHttp.send("start="+start+"&stop="+stop+"&target="+target+"&theme="+theme+"&uid="+uid);
	  });
	  var xmlHttp=null;
	function GetXmlHttpObject(){
		xmlHttp=null;
		try{
		// Firefox, Opera 8.0+, Safari
			xmlHttp=new XMLHttpRequest();
		}catch (e){
		// Internet Explorer
			try{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			}catch (e){
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		return xmlHttp;
	}
	function sign_up_callback(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
			
			if (xmlHttp.status == 200) {
				var data=xmlHttp.responseText;
				//alert(data);
				data=$.parseJSON(data);
				data=data.message;
				if(data=="publish success"){
					alert("发布成功！");			
				}else if(data=="delete success"){
					alert("删除成功！");
				}else if(data=="update success"){
					alert("更新成功！");
				}
				window.location.href="acitivity_publish.php";
			}
		}
	}
</script>
</body>
</html>
