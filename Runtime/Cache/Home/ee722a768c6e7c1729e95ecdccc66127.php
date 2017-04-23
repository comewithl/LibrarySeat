<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-widht initial-scale=1.0">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/libraryso/Public/css/Login/login.css">
	<title>注册页面</title>
</head>

<body>
	<div class="head-photo">
		<img src="/librarySo/Public/img/hd3.jpg" alt=""></img>
	</div>
	<div class="center login-form-wrap">
		<form name="form" action=""  class="form" method="post">
		<div class="input idDiv">
			<span class="glyphicon glyphicon-user"></span><input class="userId" name="userId" type="text" placeholder="学号">
		</div>
		<div class="input keyDiv">
			<span class="glyphicon glyphicon-lock"></span><input class="userKey" name="userKey" type="password" placeholder="密码">
		</div>
		</form>
	</div>
	<div class="btn-div">

	<p class="resultP">
		
	</p>
		<button class="btn btn-info" type="button" onclick="infoSubmit()">登录</button>
	</div>
</body>
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>
<script src="/librarySo/Public/js/Login/login.js" type="application/javascript"></script>
</html>