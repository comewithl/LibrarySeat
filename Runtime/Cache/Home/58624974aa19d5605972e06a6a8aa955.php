<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-widht initial-scale=1.0">
<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/libraryso/Public/css/Floorlist/floorlist.css">
<link rel="stylesheet" href="/libraryso/Public/css/Seatinfo/seatInfoyuyue.css">
<link rel="stylesheet" href="/libraryso/Public/css/global.css">
	<title>座位信息</title>
</head>

<body data-userState="ORDER">
	<div class="box">
		<!--<div class="d1">座位信息</div>-->
		<div class="d2">
			<a href="#"><img class="photo stu-pic" src="/libraryso/Public/img/
			people.jpg"></a>
			<div class="menu">
				<img class="more" src="/libraryso/Public/img/更多.png">
				<ul class="more-ul">
					<li><a href="/libraryso/index.php/home/floorlist/floorlist">查看座位</a></li>
					<li><a href="/libraryso/index.php/home/feedback/report">监督占座</a></li>
				</ul>
			</div>
		</div>
		<div class="d3"><!-- <img class="line" src="/libraryso/Public/img/up-line.png"> --></div>
		<div class="d4">
			<p><span class="classroom_num"></span>楼自习室<span class="seat_id"></span>座</p><p>预约时间：<span class="start_time"></span></p><p>签到截至时间:<span class="end_time"></span></p>
		</div>
		<div class="d5">
			<p>预约者信息：</p><p>学号：<span class="number"></span></p><p>姓名：<span class="name"></span></p>
			<img class="no-sign" src="/libraryso/Public/img/no-sign.png" >
		</div>
		<div class="d6">
			<p class="lib-tel">图书馆咨询电话：888888</p><p class="lib-time">工作时间：8:00-21:00</p>
		</div>
		<div class="d7">
			<button class="btn btn-info " id="seatConfirm" type="button" >就座</button>
			<button class="btn btn-info btn-tz" id="seatReturn" type="button" value="退座">退座</button>
		</div>
		<nav>
    <div class="user">
        <img src="/libraryso/Public/img/people.jpg">
        <div class="user-info">
            <p class="school-num number"><?php echo ($number); ?></p>
            <p class="stu-name name"><?php echo ($name); ?></p>
        </div>
    </div>
    <ul class="slide-ul">
        <li><a href="/libraryso/index.php/home/floorlist/floorlist"><span class="glyphicon glyphicon glyphicon-eye-open"></span>楼层信息</a></li>
        <li><a href="/libraryso/index.php/home/seatinfo/seatinfo"><span class="glyphicon glyphicon-inbox"></span>我的座位</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-remove"></span>违规记录</a></li>
        <li><a href="/libraryso/index.php/home/feedback/report"><span class="glyphicon glyphicon-search"></span>监督占座</a></li>
        <li><a href="/libraryso/index.php/home/login/loginout"><span class="glyphicon glyphicon-log-out"></span>登出</a></li>
        <!--<li><a href="/libraryso/index.php/home/feedback/report"><span class="glyphicon glyphicon-transfer"></span>问题反馈</a></li>-->
        <!--<li><a href="#"><span class="glyphicon glyphicon-list"></span>关于我们</a></li>-->
    </ul>
</nav>
		<div class="zz"></div>
	</div>
	<div class="loading">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>  
</body>
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"  type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=	PZNez9C0E6GX0Z425hgTrE3ari8y33O2"></script>
<script src="/libraryso/Public/js/Floorlist/floorlist.js" type="text/javascript"></script>
<script src="/libraryso/Public/js/Seatinfo/seatInfo.js"type="text/javascript"></script>
</html>