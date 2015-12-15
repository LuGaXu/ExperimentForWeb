<?php
		require 'base.php';
		include 'db.php';
		session_start();
		$id=$_SESSION['id'];
	?>
	  <div class="container">
    	<div class="row" >
    		<div class="col-md-4" style="height:300px;">
             <!--nav-pill begin-->
            <div id="pill">
            	<ul class="nav nav-pills nav-stacked">
    			<h3>健康管理</h3>
                <li role="presentation"><a href="exercise.php">我的运动</a></li>
                <li role="presentation"><a href="exercise_sleep.php">睡眠质量</a></li>
                <li role="presentation" class="active"><a href="exercise_health.php">身体健康</a></li>
			</ul>
            </div>
             <!--nav-pill end-->
            </div>
     		<div class="col-md-8" style="" id="content">
            	<div id="date">
                	<p>
                	<select name="year" id="yearId"  onChange="updateDay()">
                    	<option value="2015" selected>2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                    </select>
                    年
                    <select name="month" id="monthId" onChange="updateDay()">
                    	<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>月
                    <select name="day" id="dayId">
                        
                    </select>日 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="btn btn-primary" id="btn" type="submit" value="查看当日健康状况"></p>
                </div>
                <!--
                <div id="data">
                	<img style="padding-top:100px;" src="picture/warn.png" class="img-responsive center-block" alt="暂无数据"/>
                </div>-->
                <div class="btn-group" role="group" id="ex" style="width:100%;padding-left:65%;">
  					<button type="button" id="btn1" class="btn btn-default active">心率</button>
  					<button type="button" id="btn2" class="btn btn-default">血压</button>
				</div>
                <canvas id="myChart"></canvas>
            </div>
    	</div>
 	</div>
    <script>
    	var type='heartrate';
    	$("#btn").click(function(){
			var year=$("#yearId").find("option:selected").text();
			var month=$("#monthId").find("option:selected").text();
			var day=$("#dayId").find("option:selected").text();
		
		//查询心率
		if($("#btn1").hasClass("active")){
			type='heartrate';
		}else{
		//查询血压
			type='bloodpressure';
		}
		drawPicture(year,month,day);
	})
	$("#btn1").click(function(){
			$("#btn1").addClass("active");
			$("#btn2").removeClass("active");
			type='heartrate';
			var year=$("#yearId").find("option:selected").text();
			var month=$("#monthId").find("option:selected").text();
			var day=$("#dayId").find("option:selected").text();
			drawPicture(year,month,day);
			
		})
		$("#btn2").click(function(){
			$("#btn2").addClass("active");
			$("#btn1").removeClass("active");
			type='bloodpressure';
			var year=$("#yearId").find("option:selected").text();
			var month=$("#monthId").find("option:selected").text();
			var day=$("#dayId").find("option:selected").text();
			drawPicture(year,month,day);
		})
	function drawPicture(year,month,day){
    		arr=getArray(year,month,day);
    		$("#myChart").remove();
    		var canvas = $(" <canvas id='myChart'></canvas>");
    		canvas.insertAfter("#ex");
			var data = {
					labels : ["0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20",
								"21","22","23","24"],
					datasets : [
							
							{

								fillColor : "rgba(220,220,220,0.5)",
								strokeColor : "rgba(220,220,220,1)",
								pointColor : "rgba(220,220,220,1)",
								pointStrokeColor : "#fff",
								data : arr[0],
								
							},
							{
								fillColor : "rgba(151,187,205,0.5)",
								strokeColor : "rgba(151,187,205,1)",
								pointColor : "rgba(151,187,205,1)",
								pointStrokeColor : "#fff",
								data : arr[1],
								
							}
							
							
						]
					}
// 				alert( getArray(year,month));
			
	    		var ctx = $("#myChart").get(0).getContext("2d");
				var myNewChart = new Chart(ctx).Line(data);
	
		}
    	function getArray(year,month,day){
			var data;
			var xmlHttp=GetXmlHttpObject();

			if (xmlHttp==null){
		 		alert ("Browser does not support HTTP Request")
		 		return
		 	}
		 	var arr=[];
		 	xmlHttp.onreadystatechange = function(){
		 		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
					
					if (xmlHttp.status == 200) {
						data=xmlHttp.responseText;
						//alert(data);
						data=$.parseJSON(data);
						var type=data.type;
						arr.push(data.data1);
						arr.push(data.data2)
						//arr=arr.split(",");
						//alert(typeof(arr));
					//window.location.href="advice.php";
						return arr;
					}
				}
		 	}
			xmlHttp.open("POST", "getExerciseData.php", false);
			xmlHttp.setRequestHeader("Content-Type",
					"application/x-www-form-urlencoded");
// 			type='distance';
			xmlHttp.send("type="+type+"&uid="+<?php echo $id?>+"&year="+year+"&month="+month+"&day="+day);
			return arr;
		}
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
		
	$("#btn1").click(function(){
		$("#btn1").addClass("active");
		$("#btn2").removeClass("active");
	})
	$("#btn2").click(function(){
		$("#btn2").addClass("active");
		$("#btn1").removeClass("active");
	})
		window.onload=function(){
			var year=$("#yearId").find("option:selected").text();
			var month=$("#monthId").find("option:selected").text();
			var day=$("#dayId").find("option:selected").text();
			drawPicture(year,month,day);
			$("#tag2").hover(function(){
				 $("#tag2").addClass("active");
			 });
			 $("#tag2").mouseleave(function(){
					  $("#tag2").removeClass("active");
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
		}
		var date=new Date();
		$("#monthId").val(date.getMonth()+1);
		updateDay();
		$("#dayId").val(date.getDate());
			function updateDay(){
				var year=jQuery("#yearId").val();
				var month=jQuery("#monthId").val();
				jQuery("#dayId").empty();
				var day;
				switch(month){
				case "1":
					day=31;
					break;
				case "2":
					if(year%4==0&&year%100!=0||year%400==0){
						day=29;
					}else{
						day=28;	
					}
					break;
				case "3":
					day=31;
					break;	
				case "4":
					day=30;
					break;
				case "5":
					day=31;
					break;
				case "6":
					day=30;
					break;
				case "7":
					day=31;
					break;
				case "8":
					day=31;
					break;
				case "9":
					day=30;
					break;
				case "10":
					day=31;
					break;
				case "11":
					day=30;
					break;
				case "12":
					day=31;
					break;
				default:
					day=0;
				}
			
				for(var j=0;j<day;j++){
					jQuery("#dayId").append("<option value=\""+(j+1)+"\">"+(j+1)+"</option>")	
				}
			}

    </script>
</body>
</html>
	