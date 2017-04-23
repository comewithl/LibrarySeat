<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-widht initial-scale=1.0">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/libraryso/Public/css/Floorlist/floorlist.css">
	<link rel="stylesheet" href="/libraryso/Public/js/Seatinfo/seatInfoyuyue.css">
	<title>座位信息</title>
</head>

<body>

	<!--<div class="d1">座位信息</div>-->
	<div class="d2">
		<a href="#"><img class="photo stu-pic" src="/libraryso/Public/img/people1.png"></a>
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
</body>
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=PZNez9C0E6GX0Z425hgTrE3ari8y33O2"></script>
<script src="/libraryso/Public/js/Floorlist/floorlist.js"></script>

<script type="text/javascript">
	var info;
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
			url:"/libraryso/index.php/home/seatinfo/yuyueinfo",
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
			$('.'+key).html(data[key]);
		};
	}
	function seatConfirm() {
        var geolocation = new BMap.Geolocation();
        var userPositon;
        geolocation.getCurrentPosition(function(r){
            if(this.getStatus() == BMAP_STATUS_SUCCESS){
                $.ajax({
                    type:"POST",
                    url:"/libraryso/index.php/home/seatinfo/seatConfirm",
                    data:{
                        userPosition:r.point
                    },
                    async:false,
                    success:function(data){
                        debugger;
                        if(data.successflag){
                            window.location.href='/libraryso/index.php/home/seatinfo/seatinfozhanyong';
						}
						else{
                            alert(data.imf);
						}
                    },
                    error:function(XMLHTTPRequest,statusText,errorThrown){
                        alert(XMLHTTPRequest.statusText+status);
                    }
                })
            }
            else {
                alert('failed'+this.getStatus());
            }
        },{enableHighAccuracy: true})

    }
	$("#seatConfirm").click(seatConfirm);
	$(".btn-tz").click(function(){
		$.ajax({
			type:"POST",
			url:"/libraryso/index.php/home/seatinfo/yuyuetuizuo",
			success:function(data){
				alert(data);
				window.location.href="/libraryso/index.php/home/floorlist/floorlist?userId="+info["number"];
			},
			error:function(XMLHTTPRequest,statusText,errorThrown){
				alert(XMLHTTPRequest.statusText+status);
			}
		})
	})
</script>
</html>