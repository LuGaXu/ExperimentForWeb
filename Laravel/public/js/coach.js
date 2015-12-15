
function get_all_coaches(){

	var coach_container=document.getElementById('coach-container');

	var url="/api/v1/coaches";

	$.getJSON(url,function (data) {   
		var coaches= data['coaches'];
		var length=coaches.length;
		for(var i=0;i<length;i++){
			var id = coaches[i]['id'];
			var nickname = coaches[i]['nickname'];
			var gender = coaches[i]['gender'];
			var job = coaches[i]['job'];
			var profession = coaches[i]['profession'];

			var link=document.createElement('a');

			var node=document.createElement("div");
			node.className='col s12 m6';

			if(window.addEventListener){ // Mozilla, Netscape, Firefox
        		link.addEventListener('click',function(){get_coach(id)}, false);
    		} else { // IE
        		link.attachEvent('onclick',  function(){get_coach(id)});
    		}

			var card=document.createElement("div");
			card.className='card medium hoverable';
			var card_image=document.createElement('div');
			card_image.className='card-image';
			var img=document.createElement("img");
			img.src='../img/sample-1.jpg';
			var span=document.createElement('span');
			span.className='card-title';
			var nickname_text=document.createTextNode(nickname);

			span.appendChild(nickname_text);

			card_image.appendChild(img);
			card_image.appendChild(span);

			var card_content=document.createElement('div');
			card_content.className='card-content';
			var job_p=document.createElement('p');
			var job_text=document.createTextNode(job);
			job_p.appendChild(job_text);

			var profession_p=document.createElement('p');
			var profession_text=document.createTextNode(profession);
			profession_p.appendChild(profession_text);

			card_content.appendChild(job_p);
			card_content.appendChild(profession_p);

			card.appendChild(card_image);
			card.appendChild(card_content);

			node.appendChild(card);

			link.appendChild(node);

			coach_container.appendChild(link);
		}
	});

}

function get_coach(id){


	//首先删除coach-container的所有子节点
	var coach_container=document.getElementById('coach-container');

	while(coach_container.hasChildNodes()) //当div下还存在子节点时 循环继续
    {
        coach_container.removeChild(coach_container.firstChild);
    }

	var url="/api/v1/coaches/"+id;

	$.getJSON(url,function (data) {   

		var coach=data['coach'][0];

		var id=coach['id'];
		var nickname=coach['nickname'];
		var gender=coach['gender'];
		var address=coach['address']
		var job=coach['job']
		var profession=coach['profession']
		var birthday=coach['birthday']
		var articles=data['articles'];

		//生成左边的个人资料
		var card_img=document.createElement('div');

		var img=document.createElement('img');
		img.className="circle responsive-img";
		img.src='../img/wangxiaochui.jpg';

		card_img.appendChild(img);

		var card_content=document.createElement('div');
		card_content.className='card-content';

		var label_name=document.createElement('label');
		var laben_name_text=document.createTextNode('昵称 ');
		label_name.appendChild(laben_name_text);

		var span_name=document.createElement('span');
		var name_text=document.createTextNode(nickname);
		span_name.appendChild(name_text);

		var label_gender=document.createElement('label');
		var laben_gender_text=document.createTextNode('性别 ');
		label_gender.appendChild(laben_gender_text);

		var span_gender=document.createElement('span');
		var gender_text=document.createTextNode(gender);
		span_gender.appendChild(gender_text);

		var label_job=document.createElement('label');
		var laben_job_text=document.createTextNode('工作 ');
		label_job.appendChild(laben_job_text);

		var span_job=document.createElement('span');
		var job_text=document.createTextNode(job);
		span_job.appendChild(job_text);

		var label_profession=document.createElement('label');
		var laben_profession_text=document.createTextNode('擅长方向 ');
		label_profession.appendChild(laben_profession_text);

		var span_profession=document.createElement('span');
		var profession_text=document.createTextNode(profession);
		span_profession.appendChild(profession_text);

		var br_1=document.createElement('br');
		var br_2=document.createElement('br');
		var br_3=document.createElement('br');

		card_content.appendChild(label_name);
		card_content.appendChild(span_name);
		card_content.appendChild(br_1);
		card_content.appendChild(label_gender);
		card_content.appendChild(span_gender);
		card_content.appendChild(br_2);
		card_content.appendChild(label_job);
		card_content.appendChild(span_job);
		card_content.appendChild(br_3);
		card_content.appendChild(label_profession);
		card_content.appendChild(span_profession);

		var card_action=document.createElement('div');
		card_action.className='card-action';
		var modal_link=document.createElement('a');
		modal_link.className='waves-effect waves-light btn';
		modal_link.href='ask_for_advice.html';
		var link_text=document.createTextNode('向我咨询');

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

		var length=articles.length;

		var ul=document.createElement('ul');
		ul.className='collapsible';

		//生成右边的文章
		for(var i=0;i<length;i++){
			var article_title=articles[i]['title'];
			var article_id=articles[i]['id'];
			var created_at=articles[i]['created_at'];
			var content=articles[i]['content'];

			var li=document.createElement('li');

			var collapsible_header=document.createElement('div');
			collapsible_header.className='collapsible-header active';

			var title=document.createElement('h5');
			title.className='center-align';
			var title_text=document.createTextNode(article_title);
			title.appendChild(title_text);

			var time=document.createElement('time');
			time.datetime=created_at;

			var time_text=document.createTextNode(created_at);

			time.appendChild(time_text);

			collapsible_header.appendChild(title);
			collapsible_header.appendChild(time);

			var content_p=document.createElement('p');
			var content_text=document.createTextNode(content);

			content_p.appendChild(content_text);

			collapsible_header.appendChild(content_p);

			li.appendChild(collapsible_header);
			ul.appendChild(li);

			

		}

		var right=document.createElement('div');
		right.className="col s12 l9";

		right.appendChild(ul);

		coach_container.appendChild(left);
		coach_container.appendChild(right);
		

	});


    $('.collapsible').collapsible({
      accordion : false 
    });




}