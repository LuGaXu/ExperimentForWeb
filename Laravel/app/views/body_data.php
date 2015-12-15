<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge"/>
	<title>Health+&nbsp;健康管理</title>
	<meta name="description" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
	<!-- Place favicon.ico in the root directory -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../css/materialize.css"/>

	<style type="text/css">
		#BMI{
			color: #009688;
			font-size: 24px;
		}
		.chart-div{
			margin-top: 60px;
			margin-bottom: 40px;
		}
		#blood-pressuer-div{
			margin-top:80px;
		}
	</style>

</head>

<body>

	<?php require 'header.php'; ?>

	<main class="container">
		<div class="row">

			<aside class="col s12 l3">
				<h4>健康管理</h4>
				<div class="collection">
					<a href="bodydata" class="collection-item active">身体数据</a>
					<a href="sportsdata" class="collection-item">运动数据</a>
					<a href="sleepdata" class="collection-item">睡眠分析</a>
				</div>
			</aside>
			<div class="col s12 l9">
				<section class="health-item">
					<h4>身高体重</h4>
					<form id="height-weight">
						<div class="row">
							<div class="input-field col s12 l6 m6">
								<input class="validate" id="height" name="height" type="text" value="156">
								<label for="height">身高（cm）</label>
							</div>
							<div class="input-field col s12 l6 m6">
								<input class="validate" id="weight" name="weight" type="text" value="52">
								<label for="height">体重（kg）</label>
							</div>
						</div>
					</form>
					<p>
						<span id="BMI">21.4</span>
					</p>
					<button onclick="get_weight_data(-30)" class="waves-effect waves-light btn left">查看前30天数据</button>
					<button onclick="get_weight_data(30)" class="waves-effect waves-light btn right">查看后30天数据</button>
					<div class="chart-div" id="weight-div">
						<label for="weight-chart">体重变化</label>
						<canvas id="weight-chart" height="450" width="600"></canvas>
					</div>
				</section>
				<section class="health-item">
					<h4>三围</h4>
					<form id="BWH">
						<div class="row">
							<div class="input-field col s12 l4 m4">
								<input class="validate" id="bust" name="bust" type="text" value="90">
								<label for="bust">胸围（cm）</label>
							</div>
							<div class="input-field col s12 l4 m4">
								<input class="validate" id="waist" name="waist" type="text" value="72">
								<label for="waist">腰围（kg）</label>
							</div>
							<div class="input-field col s12 l4 m4">
								<input class="validate" id="hip" name="hip" type="text" value="90">
								<label for="hip">臀围（kg）</label>
							</div>
						</div>
					</form>
					<button onclick="get_bwh_data(-30)" class="waves-effect waves-light btn left">查看前30天数据</button>
					<button onclick="get_bwh_data(30)" class="waves-effect waves-light btn right">查看后30天数据</button>
					<div class="chart-div" id="BWH-div">
						<label for="BWH-chart">三围变化</label>
						<canvas id="BWH-chart" height="450" width="600"></canvas>
					</div>
				</section>
				<section class="health-item">
					<h4>心率血压</h4>
					<form id="heart-rate">
						<div class="row">
							<div class="input-field col s12 l6 m6">
								<input class="validate" id="heart-rate" name="heart-rate" type="text" value="80" active="active">
								<label for="heart-rate" data-success="正常">心率</label>
							</div>
							<div class="input-field col s12 l3 m3">
								<input class="validate" id="systolic" name="systolic" type="text" value="120">
								<label for="systolic" data-success="正常">收缩压</label>
							</div>
							<div class="input-field col s12 l3 m3">
								<input id="diastolic" name="diastolic" type="text" value="80">
								<label for="diastolic" data-success="正常">舒张压</label>
							</div>
						</div>
					</form>
					<button onclick="get_heart_rate_data(-30)" class="waves-effect waves-light btn left">查看前30天数据</button>
					<button onclick="get_heart_rate_data(30)" class="waves-effect waves-light btn right">查看后30天数据</button>
					<div class="chart-div" id="heart-rate-div">
						<label for="heart-rate-chart">心率变化</label>
						<canvas id="heart-rate-chart" height="450" width="600"></canvas>
					</div>
					<button onclick="get_blood_pressure_data(-30)" class="waves-effect waves-light btn left">查看前30天数据</button>
					<button onclick="get_blood_pressure_data(30)" class="waves-effect waves-light btn right">查看后30天数据</button>
					<div class="chart-div" id="blood-pressure-div">
						<label for="blood-pressure-chart">血压变化</label>
						<canvas id="blood-pressure-chart" height="450" width="600"></canvas>
					</div>
				</div>
			</section>
		</div>

</main>

<footer class="page-footer">
	<div class="footer-copyright">
		<div class="container">
			© 2014 Copyright Text
			<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
		</div>
	</div>
</footer>

<?php if(!$checked){require 'login_modal.php';} ?>

<script src="../js/Chart.js"></script>

<script>
		var weightData = {

			labels : [<?php
				$length=count($weight);

				for($i=0;$i<$length;$i++){
					echo '"'.substr($measureTime[$i],2,8).'",';
				}
			?>],
			datasets : [
				{
					label: "体重",
					fillColor : "rgba(1,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [<?php 

						for($i=0;$i<$length;$i++){
							echo $weight[$i].',';
						}
					  ?>]
				}
			]

		}

		var BWHData = {
			labels : [<?php
				for($i=0;$i<$length;$i++){
					echo '"'.substr($measureTime[$i],2,8).'",';
			}?>],

			datasets : [
				{
					label: "胸围",
					fillColor : "rgba(1,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data :[<?php 

						for($i=0;$i<$length;$i++){
							echo $bust[$i].',';
						}
					  ?>]
				},
				{
					label: "腰围",
					fillColor : "rgba(11,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [<?php 

						for($i=0;$i<$length;$i++){
							echo $waist[$i].',';
						}
					  ?>]
				},
				{
					label: "臀围",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [<?php 

						for($i=0;$i<$length;$i++){
							echo $hip[$i].',';
						}
					  ?>]
				}
			]

		}

		var heartRateData = {
			labels : [<?php
				for($i=0;$i<$length;$i++){
					echo '"'.substr($measureTime[$i],2,8).'",';
			}?>],
			datasets : [
				{
					label: "心率",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data:[<?php 

						for($i=0;$i<$length;$i++){
							echo $heartRate[$i].',';
						}
					  ?>]
				}
			]
		}

		var bloodPressureData = {
			labels : [<?php
				for($i=0;$i<$length;$i++){
					echo '"'.substr($measureTime[$i],2,8).'",';
			}?>],
			datasets : [
				{
					label: "收缩压",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [<?php 

						for($i=0;$i<$length;$i++){
							echo $systolic[$i].',';
						}
					  ?>]
				},
				{
					label: "舒张压",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [<?php 

						for($i=0;$i<$length;$i++){
							echo $diastolic[$i].',';
						}
					  ?>]
				}
			]
		}
		
	window.onload = function(){
		var ctx1 = document.getElementById("weight-chart").getContext("2d");
		window.myLine = new Chart(ctx1).Line(weightData, {
			scaleOverride :true , //是否用硬编码重写y轴网格线 
			scaleSteps : 30,//y轴刻度的个数
			scaleStepWidth : 6, //y轴每个刻度的宽度
			scaleStartValue : 0,//y轴的起始值
			responsive: true
		});

		var ctx2 = document.getElementById("BWH-chart").getContext("2d");
		window.myLine = new Chart(ctx2).Line(BWHData,{
			scaleOverride :true , //是否用硬编码重写y轴网格线 
			scaleSteps : 20,//y轴刻度的个数
			scaleStepWidth : 5, //y轴每个刻度的宽度
			scaleStartValue : 0,//y轴的起始值
			responsive: true			
		});

		var ctx3 = document.getElementById("heart-rate-chart").getContext("2d");
		window.myLine = new Chart(ctx3).Line(heartRateData,{
			scaleOverride :true , //是否用硬编码重写y轴网格线 
			scaleSteps : 12,//y轴刻度的个数
			scaleStepWidth : 10, //y轴每个刻度的宽度
			scaleStartValue : 0,//y轴的起始值
			responsive: true
		})

		var ctx4 = document.getElementById("blood-pressure-chart").getContext("2d");
		window.myLine = new Chart(ctx4).Line(bloodPressureData,{
			scaleOverride :true , //是否用硬编码重写y轴网格线 
			scaleSteps : 18,//y轴刻度的个数
			scaleStepWidth : 10, //y轴每个刻度的宽度
			scaleStartValue : 0,//y轴的起始值
			responsive: true
		})

	}
	
	</script>

<!--JavaScript-->
<script src="../js/bodydata.js"></script>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/materialize.js"></script>

</body>
</html>