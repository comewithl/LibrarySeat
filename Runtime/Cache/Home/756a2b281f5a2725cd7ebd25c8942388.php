<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-widht initial-scale=1.0">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>座位信息</title>
</head>
<style>
*{margin:0px;padding:0px;font-family:Microsoft Yohei;font-size:20px;}
body{overflow:hidden;}
	p {
		font-size: 17px;
		font-weight: 100;
	}
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
		border-bottom:1px solid rgb(238,238,238);
	}
	.d4{
		border-bottom:1px solid rgb(238,238,238);
		padding-top: 30px;
		padding-left:30px;
		padding-bottom: 30px;
	}
	.d5{
		padding-top: 20px;
		padding-left:30px;
		padding-bottom: 5px;
		color:rgb(238,238,238);
		border-bottom:20px solid rgb(238,238,238);
	}
	.d5 p {
		color: rgb(205,205,205);
	}
	.d6{
		padding-left:30px;
		color:rgb(238,238,238);
	}
	.d7{
		text-align:center;
	}
	.photo{
		width:60px;
		height:60px;
		border-radius:30px;
		margin:10px;
	}
	/* .line{
		height:170px;
		width:100%;
		top:5px;
		left:-90px;
	} */
	.btn{
		width:80%;
		height: 45px;
		font-size:17px;
		color:#fff;
		letter-spacing:15px;
		outline: none;
	}
	.no-sign{
		float: right;
		margin-right: 10px;
		width:80px;
		height:80px;
		transform:translateY(-163px);
	}
	.lib-tel {
		margin-top: 10px;
		color:rgb(0,0,0);
		margin-bottom: 5px;
	}
	.lib-time {
		font-size: 15px;
	}
	.btn-info {
		background-color: rgb(126,210,245);
		border-style: none;
		outline: none;
	}
	
	.menu {
		float: right;
		display: inline-block;
		width: 80px;
		height: 40px;
	}

	.more {
		margin-top: 5px;
		margin-left: 50%;
		width: 30px;
		cursor: pointer;
	}
	.menu ul {
		list-style: none;
		display: none;
		background-color: white;
		margin-top: 5px;
	}
	.menu ul li a {
		font-size: 15px;
		text-decoration: none;
		color: black;
	}
	.menu ul li {
		padding: 9px;
		margin-bottom: 0;
		border-bottom:1px solid rgb(238,238,238);
		border-left:1px solid rgb(238,238,238);
	}
</style>
<body>

	<!--<div class="d1">座位信息</div>-->
	<div class="d2">
		<a href="#"><img class="photo" src="/Public/img/people1.png"></a>
		<div class="menu">
			<img class="more" src="/Public/img/更多.png">
			<ul class="more-ul">
				<li><a href="/index.php/home/floorlist/floorlist">查看座位</a></li>
				<li><a href="/index.php/home/feedback/report">监督占座</a></li>
			</ul>	
		</div>
	</div>
	<div class="d3"><!-- <img class="line" src="/Public/img/up-line.png"> --></div>
	<div class="d4">
		<p><span class="classroom_num"></span>楼自习室<span class="seat_id"></span>座</p><p>入座时间：<span class="start_time"></span></p><p>已学习时长:<span class="end_time"></p>
	</div>
	<div class="d5">
		<p>预约者信息：</p><p>学号：<span class="number"></p><p>姓名：<span class="name"></span></p>
		<img class="no-sign" src="/Public/img/正在使用图章.png" >
	</div>
	<div class="d6">
		<p class="lib-tel">图书馆咨询电话：888888</p><p class="lib-time">工作时间：8:00-21:00</p>
	</div>
	<div class="d7">
		<button disabled="disabled" class="btn btn-info btn-tz" type="button" value="退座">退座</button>
	</div>

</body>
<script type="text/javascript">

	$(".more").mouseover(function(){
		$(this).css("opacity","0.6")
	})
	$(".more").mouseleave(function(){
		$(this).css("opacity","1")
	})
	$(".more").click(function(){
		$(".more-ul").toggle()
	})
	$(document).ready(function(){
		$.ajax({
			type:"GET",
			url:"/index.php/home/seatinfo/zhanyonginfo",
			datatype:"json",
			success:function(data){
				info=data;
				reFresh(data);
			},
			error:function(XMLHTTPRequest,status,errorThrown){
				alert(XMLHTTPRequest.statusText+status);
			}
		});
	})
	function  reFresh(data){
		for(var key in data){
			$("."+key).html(data[key]);
		};
	}
</script>
</html>