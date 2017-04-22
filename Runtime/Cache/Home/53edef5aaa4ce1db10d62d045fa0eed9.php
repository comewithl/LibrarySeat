<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-widht initial-scale=1.0">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
	<title>注册页面</title>
</head>
<style>
	*{
		margin:0px;
		padding:0px;
	}
	body,html{
		overflow:hidden;
	}
	.head{
		height:40px;
		text-align:center;
		line-height:40px;
		background:rgb(35,40,40);
		color:#fff;
		letter-spacing:5px;
		font-weight:14px;
	}
	.btn-div{
		height:1000px;
		background:rgb(238,238,238);
	}
	input{
		border:none;
		width:240px;
		height:48px;
	}
	.idDiv{
		border-bottom:1px solid rgb(238,238,238);
	}
	.input{
		height:50px;
		line-height:50px;
		padding-left:10px;
		vertical-align:top;
		letter-spacing:5px;
		color:rgb(146,146,146);
	}
	.photo img{
		height:100px;
		width:100px;
		border-radius:50px;
	}
	.photo{
		text-align:center;
		padding-top:50px;
		height:200px;
		background:rgb(238,238,238);
	}
	.btn{
		width:200px;
		font-weight:18px;
		color:#fff;
		letter-spacing:10px;
	}
	.btn-div{
		text-align:center;
		padding-top:50px;
	}
	.resultP{
		text-align:center;
		color:red;
	}
</style>
<body>
	<div class="head">注册</div>
	<div class="photo">
		<img src="/libraryso/Public/img/people1.png" alt="">
	</div>
	<div>
		<form class="form" name="form" action="" method="post">
		<div class="input idDiv">
		<span class="glyphicon glyphicon-user">学号</span><input class="userId" name="userId" type="text"></div>
		<div class="input keyDiv">
		<span class="glyphicon glyphicon-lock">密码</span><input class="userKey" name="userKey" type="password"></div>
		</form>
	</div>
	<div class="btn-div">
	<p class="resultP">
		
	</p>
		<button class="btn btn-info" type="button" onclick="infoSubmit()">
			绑定
		</button>
	</div>
</body>
<script>
	$(document).ready(function(){
		$(".userId").blur(function(){
			var reg=/^\d{8}$/;
			if(this.value.match(reg)==null){
			$(".resultP").html("学号应为8位数字");
			}else{
				$(".resultP").html("");
			}
		})
	})
	function infoSubmit(){
		$(".form").submit();
	}
</script>
</html>