
function get_all_activities(){

	var activity_container=document.getElementById('activity-container');

	var url="/api/v1/activities";

	$.getJSON(url,function (data) {   
		var activities= data['activities'];
		var length=activities.length;
		for(var i=0;i<length;i++){
			var id = activities[i]['id'];
			var name = activities[i]['name'];
			var activityStartTime = activities[i]['startTime'];
			var activityStopTime = activities[i]['stopTime'];
			var signupStartTime = activities[i]['signupStartTime'];
			var signupStopTime = activities[i]['signupStopTime'];
			var posterURL = activities[i]['posterURL'];

			var link=document.createElement('a');

			var node=document.createElement("div");
			node.className='col s12 m6';

			if(window.addEventListener){ // Mozilla, Netscape, Firefox
        		link.addEventListener('click',function(){get_activity(id)}, false);
    		} else { // IE
        		link.attachEvent('onclick',  function(){get_activity(id)});
    		}

			var card=document.createElement("div");
			card.className='card medium hoverable';
			var card_image=document.createElement('div');
			card_image.className='card-image';
			var img=document.createElement("img");
			img.src='../img/sample-1.jpg';
			var span=document.createElement('span');
			span.className='card-title';
			var name_text=document.createTextNode(name);

			span.appendChild(name_text);

			card_image.appendChild(img);
			card_image.appendChild(span);

			var signup_time_label=document.createElement('label');
			var signup_time_text=document.createTextNode('报名时间：');
			signup_time_label.appendChild(signup_time_text);

			var signup_start_time=document.createElement('time');
			signup_start_time.datetime=signupStartTime;
			var signup_start_time_text=document.createTextNode(signupStartTime);
			signup_start_time.appendChild(signup_start_time_text);

			var span_1=document.createElement('span');
			span_1.innerHTML=' - ';

			var signup_stop_time=document.createElement('time');
			signup_stop_time.datetime=signupStopTime;
			var signup_stop_time_text=document.createTextNode(signupStopTime);
			signup_stop_time.appendChild(signup_stop_time_text);

			var signup_time=document.createElement('div');
			signup_time.appendChild(signup_time_label);
			signup_time.appendChild(signup_start_time);
			signup_time.appendChild(span_1);
			signup_time.appendChild(signup_stop_time);


			var activity_time_label=document.createElement('label');
			var activity_time_text=document.createTextNode('活动时间：');
			activity_time_label.appendChild(activity_time_text);

			var activity_start_time=document.createElement('time');
			activity_start_time.datetime=activityStartTime;
			var activity_start_time_text=document.createTextNode(activityStartTime);
			activity_start_time.appendChild(activity_start_time_text);

			var span_2=document.createElement('span');
			span_2.innerHTML=' - ';

			var activity_stop_time=document.createElement('time');
			activity_stop_time.datetime=activityStopTime;
			var activity_stop_time_text=document.createTextNode(activityStopTime);
			activity_stop_time.appendChild(activity_stop_time_text);

			var activity_time=document.createElement('div');
			activity_time.appendChild(activity_time_label);
			activity_time.appendChild(activity_start_time);
			activity_time.appendChild(span_2);
			activity_time.appendChild(activity_stop_time);

			var card_content=document.createElement('div');
			card_content.className="card-content";
			card_content.appendChild(signup_time);
			card_content.appendChild(activity_time);

			card.appendChild(card_image);
			card.appendChild(card_content);

			node.appendChild(card);

			link.appendChild(node);

			activity_container.appendChild(link);
		}
	});

}

function get_activity(id){


	//首先删除activity-container的所有子节点
	var activity_container=document.getElementById('activity-container');

	while(activity_container.hasChildNodes()) //当div下还存在子节点时 循环继续
    {
        activity_container.removeChild(activity_container.firstChild);
    }

	var url="/api/v1/activities/"+id;

	$.getJSON(url,function (data) {   

		var activity=data['activity'][0];

		var id = activity['id'];
		var name = activity['name'];
		var activityStartTime = activity['startTime'];
		var activityStopTime = activity['stopTime'];
		var signupStartTime = activity['signupStartTime'];
		var signupStopTime = activity['signupStopTime'];
		var location = activity['location'];
		var detail = activity['detail'];
		var posterURL = activity['posterURL'];
		var members = data['members'];

		//生成左边的活动信息
		var card_img=document.createElement('div');
		card_img.className='card-image';

		var img=document.createElement('img');
		img.src='../img/wangxiaochui.jpg';

		card_img.appendChild(img);

		var card_content=document.createElement('div');
		card_content.className='card-content';

		var span_name=document.createElement('span');
		var name_text=document.createTextNode(name);
		span_name.appendChild(name_text);

		var signup_time_label=document.createElement('label');
		var signup_time_text=document.createTextNode('报名时间');
		signup_time_label.appendChild(signup_time_text);

		var signup_start_time=document.createElement('time');
		signup_start_time.datetime=signupStartTime;
		var signup_start_time_text=document.createTextNode(signupStartTime);
		signup_start_time.appendChild(signup_start_time_text);

		var span_1=document.createElement('br');
		var span_2=document.createElement('br');

		var signup_stop_time=document.createElement('time');
		signup_stop_time.datetime=signupStopTime;
		var signup_stop_time_text=document.createTextNode(signupStopTime);
		signup_stop_time.appendChild(signup_stop_time_text);

		var signup_time=document.createElement('div');
		signup_time.appendChild(signup_time_label);
		signup_time.appendChild(span_1);
		signup_time.appendChild(signup_start_time);
		signup_time.appendChild(span_2);
		signup_time.appendChild(signup_stop_time);


		var activity_time_label=document.createElement('label');
		var activity_time_text=document.createTextNode('活动时间');
		activity_time_label.appendChild(activity_time_text);

		var activity_start_time=document.createElement('time');
		activity_start_time.datetime=activityStartTime;
		var activity_start_time_text=document.createTextNode(activityStartTime);
		activity_start_time.appendChild(activity_start_time_text);

		var span_3=document.createElement('br');
		var span_4=document.createElement('br');

		var activity_stop_time=document.createElement('time');
		activity_stop_time.datetime=activityStopTime;
		var activity_stop_time_text=document.createTextNode(activityStopTime);
		activity_stop_time.appendChild(activity_stop_time_text);

		var activity_time=document.createElement('div');
		activity_time.appendChild(activity_time_label);
		activity_time.appendChild(span_3);
		activity_time.appendChild(activity_start_time);
		activity_time.appendChild(span_4);
		activity_time.appendChild(activity_stop_time);


		var location_label=document.createElement('label');
		var location_text=document.createTextNode('活动地点');
		location_label.appendChild(location_text);

		var location_span=document.createElement('span');
		location_span.innerHTML=location;

		var br_4=document.createElement('br');

		var location_div=document.createElement('div');
		location_div.appendChild(location_label);
		location_div.appendChild(br_4);
		location_div.appendChild(location_span);

		var br_1=document.createElement('br');
		var br_2=document.createElement('br');
		var br_3=document.createElement('br');

		card_content.appendChild(span_name);
		card_content.appendChild(br_1);
		card_content.appendChild(signup_time);
		card_content.appendChild(br_2);
		card_content.appendChild(activity_time);
		card_content.appendChild(br_3);
		card_content.appendChild(location_div);


		var card_action=document.createElement('div');
		card_action.className='card-action';
		var modal_link=document.createElement('a');
		modal_link.className='waves-effect waves-light btn';
		modal_link.href='sign_up_activity.html';
		var link_text=document.createTextNode('我要参加');

		modal_link.appendChild(link_text);
		card_action.appendChild(modal_link);

		var card=document.createElement('div');
		card.className='card';
		card.appendChild(card_img);
		card.appendChild(card_content);
		card.appendChild(card_action);

		var left=document.createElement('div');
		left.className="col s12 l3";

		left.appendChild(card);

		var li=document.createElement('li');
		var collapsible_header=document.createElement('div');
		collapsible_header.className='collapsible-header active';

		var title=document.createElement('h5');
		title.className='center-align';
		title.innerHTML='活动详情';

		var content_p=document.createElement('p');
		content_p.innerHTML=detail;

		collapsible_header.appendChild(title);
		collapsible_header.appendChild(content_p);

		li.appendChild(collapsible_header);
		var ul=document.createElement('ul');
		ul.appendChild(li);

		var right=document.createElement('div');
		right.className="col s12 l9";
		right.appendChild(ul);

		activity_container.appendChild(left);
		activity_container.appendChild(right);
		

	});



}