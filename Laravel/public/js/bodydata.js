var current_weight_offset=-30;
var current_bwh_offset=-30;
var current_blood_pressure_offset=-30;
var current_heart_rate_offset=-30;

function get_weight_data(offset){

	var url="bodydata/weightdata";

	current_weight_offset+=offset;

	$.getJSON(url,{'from_date':current_weight_offset,'to_date':current_weight_offset+30},function (data) {  
		
		var chart=document.getElementById('weight-chart');
		var div=document.getElementById('weight-div');

		div.removeChild(chart);

		var new_chart=document.createElement('canvas');
		div.appendChild(new_chart);
		new_chart.id='weight-chart';

		
		var weightData = {

			labels : data['measureTime'],
			datasets : [
				{
					label: "体重",
					fillColor : "rgba(1,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : data['weight']
				}
			]

		}

		var ctx = new_chart.getContext("2d");
		window.myLine = new Chart(ctx).Line(weightData, {
			scaleOverride :true , //是否用硬编码重写y轴网格线 
			scaleSteps : 30,//y轴刻度的个数
			scaleStepWidth : 6, //y轴每个刻度的宽度
			scaleStartValue : 0,//y轴的起始值
			responsive: true
		});

	});

}

function get_bwh_data(offset){
	var url="bodydata/bwhdata";

	current_bwh_offset+=offset;

	$.getJSON(url,{'from_date':current_bwh_offset,'to_date':current_bwh_offset+30},
		function (data) {  
		
			var chart=document.getElementById('BWH-chart');
			var div=document.getElementById('BWH-div');

			div.removeChild(chart);

			var new_chart=document.createElement('canvas');
			div.appendChild(new_chart);
			new_chart.id='BWH-chart';

			var BWHData = {
			labels :data['measureTime'],

			datasets : [
				{
					label: "胸围",
					fillColor : "rgba(1,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data :data['bust']
				},
				{
					label: "腰围",
					fillColor : "rgba(11,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : data['waist']
				},
				{
					label: "臀围",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : data['hip']
				}
			]

		}

		var ctx = new_chart.getContext("2d");
		window.myLine = new Chart(ctx).Line(BWHData,{
			scaleOverride :true , //是否用硬编码重写y轴网格线 
			scaleSteps : 20,//y轴刻度的个数
			scaleStepWidth : 5, //y轴每个刻度的宽度
			scaleStartValue : 0,//y轴的起始值
			responsive: true			
		});


	});
}

function get_blood_pressure_data(offset){

	var url="bodydata/bloodpressuredata";

	current_blood_pressure_offset+=offset;

	$.getJSON(url,{'from_date':current_blood_pressure_offset,'to_date':current_blood_pressure_offset+30},
		function (data) {  
		
		var chart=document.getElementById('blood-pressure-chart');
		var div=document.getElementById('blood-pressure-div');

		div.removeChild(chart);

		var new_chart=document.createElement('canvas');
		div.appendChild(new_chart);
		new_chart.id='blood-pressure-chart';

		
		var bloodPressureData = {
			labels : data['measureTime'],
			datasets : [
				{
					label: "收缩压",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : data['systolic']
				},
				{
					label: "舒张压",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : data['diastolic']
				}
			]
		}

		var ctx = new_chart.getContext("2d");
		window.myLine = new Chart(ctx).Line(bloodPressureData,{
			scaleOverride :true , //是否用硬编码重写y轴网格线 
			scaleSteps : 18,//y轴刻度的个数
			scaleStepWidth : 10, //y轴每个刻度的宽度
			scaleStartValue : 0,//y轴的起始值
			responsive: true
		})

	});
}

function get_heart_rate_data(offset){

var url="bodydata/heartratedata";

	current_heart_rate_offset+=offset;

	$.getJSON(url,{'from_date':current_heart_rate_offset,'to_date':current_heart_rate_offset+30},
		function (data) {  
		
		var chart=document.getElementById('heart-rate-chart');
		var div=document.getElementById('heart-rate-div');

		div.removeChild(chart);

		var new_chart=document.createElement('canvas');
		div.appendChild(new_chart);
		new_chart.id='heart-rate-chart';

		
		var heartRateData = {
			labels : data['measureTime'],
			datasets : [
				{
					label: "心率",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data:data['heartRate']
				}
			]
		}

		var ctx = new_chart.getContext("2d");
		window.myLine = new Chart(ctx).Line(heartRateData, {
			scaleOverride :true , //是否用硬编码重写y轴网格线 
			scaleSteps : 12,//y轴刻度的个数
			scaleStepWidth : 10, //y轴每个刻度的宽度
			scaleStartValue : 0,//y轴的起始值
			responsive: true
		});

	});
}