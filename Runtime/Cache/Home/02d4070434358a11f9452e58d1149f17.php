<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/libraryso/Public/css/Floorlist/floorlist.css">
	<title>楼层页面</title>
</head>

<body>
<div class="wrap">
	<!--<div class="d1">楼层信息</div>-->
	<div class="d2">
		<a href="#"><img class="photo stu-pic" src="/libraryso/Public/img/people1.png"></a>
	</div>
	<div class="d3"><!-- <img class="line" src="/libraryso/Public/img/up-line.png"> -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
			    <div class="item active">
			    	<img src="/libraryso/Public/img/hd1.jpg">
			    </div>
			    <div class="item">
			    	<img src="/libraryso/Public/img/hd2.jpg">
			    </div>
			    <div class="item">
			    	<img src="/libraryso/Public/img/hd3.jpg">
			    </div>
			</div>
	  <!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<div class="all-floor">
		<div class="left-floor">
			<div class="floor">
				<a href="/libraryso/index.php/home/seatselection/seatselection02">
				<h4>二楼自习室</h4>
				<img src="/libraryso/Public/img/开.png" ><br/>
				<p>开放时间：7:00~21:00</p>
				</a>
			</div>
			<div class="floor">
				<a href="#">
				<h4>六楼自习室</h4>
				<img src="/libraryso/Public/img/开.png" ><br/>
				<p>开放时间：7:00~21:00</p>
				</a>
			</div>
		</div>
		<div class="right-floor">
			<div class="floor">
				<a href="/libraryso/index.php/home/seatselection/seatselection04">
				<h4>四楼自习室</h4>
				<img src="/libraryso/Public/img/开.png" ><br/>
				<p>开放时间：7:00~21:00</p>
				</a>
			</div>
			<div class="floor">
				<a href="#">
				<h4>八楼自习室</h4>
				<img src="/libraryso/Public/img/开.png" ><br/>
				<p>开放时间：7:00~21:00</p>
				</a>
			</div>
		</div>
	</div>
	<nav>
		<div class="user">
			<img src="/libraryso/Public/img/people1.png">
				<div class="user-info">
					<p class="school-num">14051506</p>
					<p class="stu-name">徐君仪</p>
				</div>
		</div>
		<ul class="slide-ul">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span>个人资料</a></li>
			<li><a href="/libraryso/index.php/home/seatinfo/seatinfoyuyue"><span class="glyphicon glyphicon-inbox"></span>我的座位</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-remove"></span>违规记录</a></li>
			<li><a href="/libraryso/index.php/home/feedback/report"><span class="glyphicon glyphicon-search"></span>监督占座</a></li>
			<li><a href="/libraryso/index.php/home/feedback/report"><span class="glyphicon glyphicon-transfer"></span>问题反馈</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-list"></span>关于我们</a></li>
		</ul>
	</nav>
	<div class="zz"></div>
</div>


</body>
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/libraryso/Public/js/Floorlist/floorlist.js"></script>
</html>