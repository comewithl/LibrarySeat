<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-widht initial-scale=1.0">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>楼层页面</title>
</head>
<style>
*{margin:0px;padding:0px;}
.d1{
		background:rgb(35,40,40);
		height:40px;
		text-align:center;
		color:#fff;
		line-height:40px;
	}
	.d2{
		background:rgb(238,238,238);
		height:40px;
	}
	.d3{
		height:40px;
		border-bottom:solid 1px rgb(238,238,238);
	}
	.photo{
		width:60px;
		height:60px;
		border-radius:30px;
		margin:10px;
	}
	#myCarousel{
		height:250px;
	}
	.carousel-inner{
		height:250px !important;
	}
	.item img{
		height:250px !important;
		width:100% !important;
	}
	.lbt{
		width:100% !important;
		height:250px !important;
	}
	.floor{
		float:left;
		width:50%;
		height:90px;
		text-align:center;
	}
	.floor img{
		width:40px;
		height:40px;
	}
	.peo-slide{
		position:absolute;
		top:0px;
		left:0px;
		height:100%;
		width:300px;
		background:rgba(255,255,255,0.75);
		z-index:1000;
	}
	.peo-info{
		width:300px;
		height:100%;
	}
	.slide-head{
		height:20%;
		background:#272822;
		text-indent:20px;
	}
	.slide-main{
		height:80%;
		background:rgb(203,203,203);
	}
	.slide-peo-pic{
		width:100px;
		height:100px;
		border-radius:50px;
		margin:30px;
	}
	.slide-ul{
		list-style-type:none;
	}
	.slide-ul li a{
		display:block;
		text-decoration:none;
		height:100px;
		font-size:36px;
		font-weight:500;
		line-height:100px;
		text-indent:20px;
		font-family:Microsoft Yahei;
		vertical-align:left;
		letter-spacing:5px;
	}
	.slide-ul li a:hover{
		background:rgb(51,122,183);
		color:rgb(255,255,255);
	}
</style>
<body>
<div class="wrap">
	<div class="d1">座位信息</div>
	<div class="d2"><a href="#"><img class="photo stu-pic" src="/libraryso/Public/img/people1.png"></a></div>
	<div class="d3"><!-- <img class="line" src="/libraryso/Public/img/up-line.png"> --></div>
	<div id="myCarousel" class="carousel slide">
	<!-- 轮播（Carousel）指标 -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>   
	<!-- 轮播（Carousel）项目 -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="/libraryso/Public/img/hd1.jpg" alt="First slide">
		</div>
		<div class="item">
			<img src="/libraryso/Public/img/hd2.jpg">
		</div>
		<div class="item">
			<img src="/libraryso/Public/img/hd3.jpg">
		</div>
	</div>
	<!-- 轮播（Carousel）导航 -->
	<a class="carousel-control left" href="#myCarousel" 
	   data-slide="prev">&lsaquo;</a>
	<a class="carousel-control right" href="#myCarousel" 
	   data-slide="next">&rsaquo;</a>
</div> 
<div class="floor"><p>1楼自习室<br/>开放时间：7:00~21:00</p><img src="/libraryso/Public/img/开.png" alt=""></div>
	<div class="floor"><p><a href="../Seatselection/seatselection">2楼自习室<br/>开放时间：7:00~21:00</a></p><img src="/libraryso/Public/img/开.png" alt=""></div>
	<div class="floor"><p>3楼自习室<br/>开放时间：7:00~21:00</p><img src="/libraryso/Public/img/开.png" alt=""></div>
	<div class="floor"><p>4楼自习室<br/>开放时间：7:00~21:00</p><img src="/libraryso/Public/img/开.png" alt=""></div>
</div>


<div style="display:none" class="peo-slide" tabindex="1">
		<div class="peo-info">
			<div class="slide-head"><a href="#"><img class="slide-peo-pic" src="/libraryso/Public/img/people1.png" alt=""></a></div>
			<div class="slide-main">
				<ul class="slide-ul">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span>个人资料</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-remove"></span>违规记录</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-flag"></span>排行榜</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-list"></span>关于我们</a></li>
				</ul>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
		$(".stu-pic").click(function(){
			$(".peo-slide").show();
			$(".wrap").css("opacity","0.3");
		});
		$(".wrap").mouseover(function(){
			$(".peo-slide").css("display","none");
			$(".wrap").css("opacity","1");
		});
	})
</script>
</html>