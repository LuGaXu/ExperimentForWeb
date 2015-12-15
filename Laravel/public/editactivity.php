<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd";>
<html>
	<head>
		<title>editactivity</title>
		<link rel="stylesheet" type="text/css" href="../background.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
	</head>
	<body id="back_ground">     
	    <div class="menu">
		  <ul>
			  <li><a href="../center/center.html" id="leftmost" class="upchoice" onclick="change_page(this)">个人中心</a></li> 
			  <li><a href="../follow/friends.html" class="upchoice" onclick="change_page(this)">关注</a></li>
			  <li><a href="../situation/situation.html" class="upchoice" onclick="change_page(this)">动态</a></li>
			  <li><a href="../healthy/health.html" class="upchoice" onclick="change_page(this)">健康</a></li>
			  <li><a href="../activity/activity.html" class="upchoice" onclick="change_page(this)">活动</a></li>
			  <li id="userlocation"><p id="loginusername"></p>
			      <p id="usertype"></p>
			  </li>
			  <li><a href="../login/login.html" id="logout" onclick="change_page(this)">退出登录</a></li>
		  </ul>
	    </div>
        

        <div class="leftmenu">
            <ul>
                <li><a href="center.html" class="leftchoice">我 的 账 户</a></li>
                <li><a href="myactivity.html" class="leftchoice" onclick="change_page(this)">我 的 活 动</a></li>
                <li><a href="myadvice.html" class="leftchoice" onclick="change_page(this)">我 的 建 议</a></li>
                <li><a href="#" id="activityrelease" class="leftchoice">活 动 发 布</a></li>
                <li><a href="authority.html" class="leftchoice" onclick="change_page(this)">权 限 管 理</a></li>            
            </ul>
        </div>
		
		<div class="detail">
			<p class="accountset">活 动 管 理</p>
			<div class="userselect">
				<button type="button" value="release" onclick="change_page('activityrelease.html')">发 布</button>
				<button type="button" value="check" onclick="change_page('activitycheck.html')">查 看</button>
			</div>
			<hr id="line" color="#D2691E"/>
			<?php
				$aid=(int)$_GET['aid'];				
				
				class MyDB extends SQLite3
				{
					function __construct()
					{
						$this->open('../db/health.s3db');
					}
				}
   
				$db = new MyDB();
				if(!$db){
					echo $db->lastErrorMsg();
					return 0;
				}else{
					$ret=$db->query("select * from activity where activityid=$aid");
					$result = $ret->fetchArray(SQLITE3_ASSOC);
			?>
					<div class="activitydetail">
						<p>活动名称&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input id="activityname" type="text" value="<?php echo $result['activityname'];?>"/>
						</p>
						<p>活动地点&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input id="activityprovince" type="text" value="<?php echo trim($result['province']);?>"/>省&nbsp;&nbsp;&nbsp;&nbsp;
							<input id="activitycity" type="text" value="<?php echo trim($result['city']);?>"/>市
						</p>
						<p>详细地址&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<textarea id="activitylocation" wrap="soft"><?php echo trim($result['location']);?></textarea>
						</p>
						<p>
							开始时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input id="startdate" type="date" value="<?php echo trim($result['startdate']);?>"/>&nbsp;&nbsp;&nbsp;&nbsp;
							结束时间&nbsp;&nbsp;&nbsp;&nbsp;
							<input id="finishdate" type="date" value="<?php echo trim($result['finishdate']);?>"/>
						</p>
						<p>详细内容<br/>
							<textarea id="activitycontent" wrap="soft"><?php echo trim($result['info']);?>
							</textarea>
						</p>
						<button id="ensurerelease" onclick="ensurerelease()">保 存</button>
						<button id="cancelrelease" onclick="cancelrelease()">取 消</button>

					</div>
		<?php   }?>
		</div>
	<script src="centerjs.js"></script>
	<script src="../normal.js"></script>
	</body>
</html>