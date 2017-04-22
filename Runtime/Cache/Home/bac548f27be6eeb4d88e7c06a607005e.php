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
	.d4{
		border-bottom:1px solid rgb(238,238,238);
		padding:10px;
		font-weight:600;
	}
	.d5{
		padding:10px;
		color:rgb(238,238,238);
		border-bottom:10px solid rgb(238,238,238);
		font-weight:bold;
	}
	.d6{
		padding:10px;
		color:rgb(238,238,238);
		font-weight:bold;
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
		height:500px;
		width:500px;
		position:absolute;
		top:5px;
		left:-90px;
	} */
	.btn{
		width:150px;
		text-align:center;
		margin:0 80px;
	}
	.no-sign{
		width:80px;
		height:80px;
		position:absolute;
		top:240px;
		left:240px;
	}
</style>
<body>
	<div class="d1">座位信息</div>
	<div class="d2"><a href="#"><img class="photo" src="/libraryso/Public/img/people1.png"></a></div>
	<div class="d3"><!-- <img class="line" src="/libraryso/Public/img/up-line.png"> --></div>
	<div class="d4"><p>二楼自习室01座</p><p>预约时间：xx月xx号xx时xx分</p><p>签到截至时间:xx月xx号xx时xx分</p></div>
	<div class="d5"><p>预约者信息：</p><p>学号：14051506</p><p>姓名：徐君仪</p>
	<img class="no-sign" src="/libraryso/Public/img/no-sign.png" ></div>
	<div class="d6"><p>图书馆咨询电话：888888</p><p>工作时间：8:00-21:00</p>
	<div class="d7"><button class="btn btn-info btn-tz" type="button" value="退座">
			退座</div>
	</button>
	</div>
</body>
</html>