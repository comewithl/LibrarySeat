<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- <meta name="viewport" content="width=device-widht initial-scale=1.0"> -->
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<title>楼层页面</title>
</head>
<style>
@media screen and (min-width: 320px) and (max-width : 375px){
	*{margin:0px;padding:0px;}
	.d1{
		background:rgb(35,40,40);
		height:35px;
		text-align:center;
		color:#fff;
		line-height:35px;
	}
	.d2{
		background:rgb(238,238,238);
		height:35px;
	}
	.d3{
		margin-top: 35px;
	}
	.photo{
		width:50px;
		height:50px;
		border-radius:30px;
		margin:10px;
	}
	.carousel-inner{
		height:170px !important;
	}
	.item img{
		height:170px !important;
		width:100% !important;
	}
	.lbt{
		width:100% !important;
		height:170px !important;
	}
	.floor{
		padding: 15px;
		height:75px;
		text-align: center;
		margin-bottom: 20px; 
	}
	.floor p {
		width: 106%;
		display: inline-block;
		font-size: 12px;
		color: rgb(148,146,146);
		border-bottom:solid 2px rgb(238,238,238);
	}
	.floor h4 {
		font-size: 14px;
		margin-top: 10px;
		display: inline-block;
		color: rgb(148,146,146);
		font-weight: 400;
	}
	.floor img{
		transform:translateY(-10px);
		margin-left: 10px;
		width:25px;
		height:25px;
	}
	.peo-slide{
	  display: none;
      width: 220px;
      padding: 20px;
      background-color: #333;
      color: #fff;
      box-shadow: inset 0 0 5px 5px #222;

	}
	.peo-info{
		width:300px;
		height:100%;
	}
	.slide-ul{
		list-style-type:none;
	}
	.slide-ul li a{
		display:block;
		text-decoration:none;
		height:80px;
		font-size:20px;
		font-weight:100;
		line-height:50px;
		text-indent:20px;
		font-family:Microsoft Yahei;
		vertical-align:left;
		letter-spacing:3px;
		color: white;
	}
	.slide-ul li a:hover{
		background:rgb(51,122,183);
		color:rgb(255,255,255);
	}
	.slide-ul li a span {
		margin-top: 25px;
	}
	.all-floor {
		padding-top: 20px;
		width: 100%;
		height: 300px;
	}
	.left-floor {
		width: 50vw;
		height: 45vh;
		display: inline-block;
		border-right:solid 2px rgb(238,238,238);
	}
	.right-floor {
		width: 48vw;
		display: inline-block;
		transform:translateY(50px);
	}
	nav {	
		z-index: 16;
		position: fixed;
		top:0;
		width:250px;
		height: 100%;
		left:-250px;
		transition: all 0.3s linear;
		background: rgb(35,40,40);
	}
	.zz {
		position: fixed;
		top:0;
		width:100vw;
		height:100vh;
		background: grey;
		opacity: 0;
		z-index:-2;

	}
	.user {
		padding-left: 20px;
		padding-top: 40px;
		padding-bottom: 15px;
	}
	.user img {
		display: inline-block;
		width: 80px;
		height: 80px;
		border-radius:40px;
	}
	.user-info {
		display: inline-block;
		color: white;
		font-size: 15px;
		padding-left: 10px;
		transform:translateY(19px);
	}
}
@media screen and (min-width: 375px) and (max-width : 414px) {
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
		margin-top: 40px;
	}
	.photo{
		width:60px;
		height:60px;
		border-radius:30px;
		margin:10px;
	}
	.carousel-inner{
		height:200px !important;
	}
	.item img{
		height:200px !important;
		width:100% !important;
	}
	.lbt{
		width:100% !important;
		height:200px !important;
	}
	.floor{
		padding: 22px;
		height:90px;
		text-align: center;
		margin-bottom: 20px; 
	}
	.floor p {
		display: inline-block;
		font-size: 12px;
		color: rgb(148,146,146);
		border-bottom:solid 2px rgb(238,238,238);
	}
	.floor h4 {
		font-size: 17px;
		margin-top: 10px;
		display: inline-block;
		color: rgb(148,146,146);
		font-weight: 400;
	}
	.floor img{
		transform:translateY(-10px);
		margin-left: 10px;
		width:35px;
		height:35px;
	}
	.peo-slide{
	  display: none;
      width: 220px;
      padding: 20px;
      background-color: #333;
      color: #fff;
      box-shadow: inset 0 0 5px 5px #222;

	}
	.peo-info{
		width:300px;
		height:100%;
	}
	.slide-ul{
		list-style-type:none;
	}
	.slide-ul li a{
		display:block;
		text-decoration:none;
		height:80px;
		font-size:20px;
		font-weight:100;
		line-height:50px;
		text-indent:20px;
		font-family:Microsoft Yahei;
		vertical-align:left;
		letter-spacing:3px;
		color: white;
	}
	.slide-ul li a:hover{
		background:rgb(51,122,183);
		color:rgb(255,255,255);
	}
	.slide-ul li a span {
		margin-top: 25px;
	}
	.all-floor {
		padding-top: 20px;
		width: 100%;
		height: 300px;
	}
	.left-floor {
		width: 50vw;
		height: 300px;
		display: inline-block;
		border-right:solid 2px rgb(238,238,238);
	}
	.right-floor {
		width: 48vw;
		height: 300px;
		display: inline-block;
		transform:translateY(50px);
	}
	nav {	
		z-index: 16;
		position: fixed;
		top:0;
		width:250px;
		height: 100%;
		left:-250px;
		transition: all 0.3s linear;
		background: rgb(35,40,40);
	}
	.zz {
		position: fixed;
		top:0;
		width:100vw;
		height:100vh;
		background: grey;
		opacity: 0;
		z-index:-2;

	}
	.user {
		padding-left: 20px;
		padding-top: 40px;
		padding-bottom: 15px;
	}
	.user img {
		display: inline-block;
		width: 80px;
		height: 80px;
		border-radius:40px;
	}
	.user-info {
		display: inline-block;
		color: white;
		font-size: 15px;
		padding-left: 10px;
		transform:translateY(19px);
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

}
@media screen and (min-width: 414px) and (max-width : 768px){

}
@media screen and (min-width: 768px) and (max-width : 1024px) {
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
		margin-top: 40px;
	}
	.photo{
		width:60px;
		height:60px;
		border-radius:30px;
		margin:10px;
	}
	.carousel-inner{
		height:200px !important;
	}
	.item img{
		height:200px !important;
		width:100% !important;
	}
	.lbt{
		width:100% !important;
		height:200px !important;
	}
	.floor{
		padding: 220px;
		height:90px;
		text-align: center;
		margin-bottom: 20px; 
	}
	.floor p {
		display: inline-block;
		font-size: 12px;
		color: rgb(148,146,146);
		border-bottom:solid 2px rgb(238,238,238);
	}
	.floor h4 {
		margin-top: 10px;
		display: inline-block;
		color: rgb(148,146,146);
		font-weight: 400;
	}
	.floor img{
		transform:translateY(-10px);
		margin-left: 10px;
		width:35px;
		height:35px;
	}
	.peo-slide{
	  display: none;
      width: 220px;
      padding: 20px;
      background-color: #333;
      color: #fff;
      box-shadow: inset 0 0 5px 5px #222;

	}
	.peo-info{
		width:300px;
		height:100%;
	}
	.slide-ul{
		list-style-type:none;
	}
	.slide-ul li a{
		display:block;
		text-decoration:none;
		height:80px;
		font-size:20px;
		font-weight:100;
		line-height:50px;
		text-indent:20px;
		font-family:Microsoft Yahei;
		vertical-align:left;
		letter-spacing:3px;
		color: white;
	}
	.slide-ul li a:hover{
		background:rgb(51,122,183);
		color:rgb(255,255,255);
	}
	.slide-ul li a span {
		margin-top: 250px;
	}
	.all-floor {
		padding-top: 20px;
		width: 100%;
		height: 300px;
	}
	.left-floor {
		width: 49%;
		height: 300px;
		display: inline-block;
		border-right:solid 2px rgb(238,238,238);
	}
	.right-floor {
		width: 49%;
		height: 300px;
		display: inline-block;
		transform:translateY(50px);
	}
	nav {	
		z-index: 16;
		position: fixed;
		top:0;
		width:250px;
		height: 100%;
		left:-250px;
		transition: all 0.3s linear;
		background: rgb(35,40,40);
	}
	.zz {
		position: fixed;
		top:0;
		width:100vw;
		height:100vh;
		background: grey;
		opacity: 0;
		z-index:-2;

	}
	.user {
		padding-left: 20px;
		padding-top: 40px;
		padding-bottom: 150px;
	}
	.user img {
		display: inline-block;
		width: 80px;
		height: 80px;
		border-radius:40px;
	}
	.user-info {
		display: inline-block;
		color: white;
		font-size: 150px;
		padding-left: 10px;
		transform:translateY(19px);
	}
	.menu{
		z-index:10000;
	}
	.menu ul {
		z-index:10000;
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
}
</style>
<body>
<div class="wrap">
	<!--<div class="d1">楼层信息</div>-->
	<div class="d2">
		<a href="#"><img class="photo stu-pic" src="/Public/img/people1.png"></a>
		<div class="menu">
			<img class="more" src="/Public/img/更多.png">
			<ul class="more-ul">
				<li><a href="/index.php/home/feedback/report">监督占座</a></li>
			</ul>
		</div>
	</div>
	<div class="d3"><!-- <img class="line" src="/Public/img/up-line.png"> -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
			    <div class="item active">
			    	<img src="/Public/img/hd1.jpg">
			    </div>
			    <div class="item">
			    	<img src="/Public/img/hd2.jpg">
			    </div>
			    <div class="item">
			    	<img src="/Public/img/hd3.jpg">
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
				<a href="/index.php/home/seatselection/seatselection02">
				<h4>二楼自习室</h4>
				<img src="/Public/img/开.png" ><br/>
				<p>开放时间：7:00~21:00</p>
			</div>
			<div class="floor">
				<a href="#">
				<h4>六楼自习室</h4>
				<img src="/Public/img/开.png" ><br/>
				<p>开放时间：7:00~21:00</p>
			</div>
		</div>
		<div class="right-floor">
			<div class="floor">
				<a href="/index.php/home/seatselection/seatselection04">
				<h4>四楼自习室</h4>
				<img src="/Public/img/开.png" ><br/>
				<p>开放时间：7:00~21:00</p>
			</div>
			<div class="floor">
				<a href="#">
				<h4>八楼自习室</h4>
				<img src="/Public/img/开.png" ><br/>
				<p>开放时间：7:00~21:00</p>
			</div>
		</div>
	</div>
	<nav>
		<div class="user">
			<img src="/Public/img/people1.png">
				<div class="user-info">
					<p class="school-num">14051506</p>
					<p class="stu-name">徐君仪</p>
				</div>
		</div>
		<ul class="slide-ul">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span>个人资料</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-remove"></span>违规记录</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-flag"></span>排行榜</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-list"></span>关于我们</a></li>
		</ul>
	</nav>
	<div class="zz"></div>
</div>


</body>
<script>

var pullFlag = true;
var zz = document.querySelector(".zz");
var more = document.querySelector(".more");
var moreul = document.querySelector(".more-ul");
var tanchuzz = document.querySelector(".stu-pic")
tanchuzz.addEventListener("click", function() {
	var nav = document.querySelector("nav");
	if(!pullFlag) {
		nav.style.left = "-250px";
		zz.style.opacity = "0";
		zz.style.zIndex = "-2";
		pullFlag = true;
	} else {
		nav.style.left = "0px";
		zz.style.opacity = "0.5";
		zz.style.zIndex = "1";

		pullFlag = false;
	}
})
zz.addEventListener("click", function() {
	tanchuzz.click();			
})
$(".more").mouseover(function(){
	$(this).css("opacity","0.6")
})
$(".more").mouseleave(function(){
	$(this).css("opacity","1")
})
$(".more").click(function(){
	$(".more-ul").toggle()
})

</script>
</html>