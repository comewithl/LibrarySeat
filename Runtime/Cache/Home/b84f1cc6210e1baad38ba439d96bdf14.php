<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/js/jquery-2.2.1.min.js"></script>
    <link href="/Public/css/loadingCss.css" rel="stylesheet" type="text/css"/>
    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <title>监督</title>
    <style>
        *{
            box-sizing: border-box;
            outline: none;
            margin: 0;
        }
        body{
            background-color: #eeeeee;
            overflow:hidden;
        }
        #container{
            width: 100%;
            height: 521px;
            background-color:#eeeeee;
        }
        @media screen and (max-width: 320px){

        }
        @media screen and (min-width: 321px) and (max-width: 375px){

        }
        @media screen and (min-width: 320px) and (max-width: 420px){
            *{
                margni:0;
                padding:0;
            }
            .illegal {
                display:none;
                width:85%;
                height:30%;
                border-radius:5px;
                background-color: #fff;
                text-align:center;
                position:absolute;
                top:30%;
                left:7.5%;
                padding:20px;
                font-family:SimHei;
            }
            .leave{
                display:none;
                width:85%;
                height:30%;
                border-radius:5px;
                background-color: #fff;
                text-align:center;
                position:absolute;
                top:30%;
                left:7.5%;
                padding:20px;
                font-family:SimHei;
            }
            .report{
                margin:25px;
            }
            .btn-info{
                width:70%;
                height:20%;
                font-weight:bold;
                font-size:18px;
                background-color: rgb(127,211,248);
            }
            .cancel-leave{
                margin:50px;
            }
            .d2{
                background:rgb(230,230,230);
                height:40px;
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
        @media screen and (min-width: 751px) {

        }
        .top{
            background:rgb(35,40,40);
            height:40px;
            text-align:center;
            color:#fff;
            line-height:40px;
        }

        .logo{
            margin-top: 5%;
            width: 100%;
            text-align: center;
        }
        .head_img{
            border-radius: 100px;
            width: 100px;
            height: 100px;
        }
        .password_img{
            width: 20px;
            height: 20px;
        }
        .no_img{
            width: 20px;
            height: 20px;
        }
        .nick_name{
            font-size: 30px;
            color: black;
        }
        .register{
            margin-top: 10%;
            width: 100%;
            text-align: center;
        }

      #seat-input{
            position: absolute;
            display: inline-block;
            width: 75%;
            height: 50px;
            border:none;
            background: white;
            color: black;
            line-height: 30px;
            right: 0px;

        }


        #no{
            position: absolute;
            width: 25%;
            height: 100%;
            background: white;
            text-align: center;
            color: gray;
            line-height: 50px;
            left: 0px;
        }
        #floor-input{
            position: absolute;
            display: inline-block;
            background-color: white;
            width: 75%;
            height: 50px;
            border:none;
            color: black;
            line-height: 30px;
            right: 0px;
        }
        #password{
            position: absolute;
            width: 25%;
            height: 100%;
            background: white;
            text-align: center;
            color: gray;
            line-height: 50px;
            left: 0px;
        }
        .floor{
            position: relative;
            width: 100%;
            height: 50px;
            background: white;
            color: white;
        }
        .seat{
            position: relative;
            margin-top: 2px;
            width: 100%;
            height: 50px;
            background: white;
            color: white;
        }
        #submit{
            width: 90%;
            height: 45px;
            border:none;
            background: #5bb9ee;
            text-align: center;
            color: white;
            margin-top:30px ;
        }
    </style>
</head>

<body>
<!--监督-->
<div id="container">
   <!-- <div class="top">监督</div>-->
    <div class="d2">
        <div class="menu">
            <img class="more" src="/Public/img/更多.png">
            <ul class="more-ul">
                <li><a href="/index.php/home/floorlist/floorlist">查看座位</a></li>
            </ul>
        </div>
    </div>


    <div class="logo">
        <!--头像和昵称后台直接获取添加到user Div里面-->
        <img src="/Public/img/search.png" alt="head_img" class=" head_img">
        <div class="nick_name">查询</div>
    </div>
    <div class="register" >
        <div class="floor">
            <input type="text" name="floor-input" id="floor-input" onblur="flootCheck()" placeholder="请输入楼层号02或04"></input>
            <div id="no">
                <img src="/Public/img/floor.png" alt="user_img" class=" no_img">
                <p1 style="border-right: 1px solid">楼层</p1>
            </div>
        </div>
        <div class="seat">
            <input type="text" name="seat-input" id="seat-input"  placeholder="请输入三位座位号，例如：001">
            <div id="password">
                <img src="/Public/img/seat.png" alt="password_img" class=" password_img">
                <p2 style="border-right: 1px solid">座位</p2>
            </div>
        </div>
        <input type="submit" name="submit" value="查询" id="submit">
    </div>
</div>

<div class="illegal">
     <h3 class="text-center">此座位已经有人使用！</h3>
    <button type="button" class="btn btn-info report">举报</button><br/>
    <button type="button" class="btn btn-info cancel">取消</button>
</div>
<div class="leave">
    <h3 class="text-center">此座位主人暂离！</h3>
    <button type="button" class="btn btn-info cancel cancel-leave">取消</button>
</div>
</body>
<script>
    var floor;
    var seat;
    var floorArray=["02","04"];
    $(".more").mouseover(function(){
        $(this).css("opacity","0.6")
    })
    $(".more").mouseleave(function(){
        $(this).css("opacity","1")
    })
    $(".more").click(function(){
        $(".more-ul").toggle()
    })
    function flootCheck(){
        if(floorArray.toString().indexOf(String($("#floor-input").val()))<0){``
            alert("请输入02或04");
        }
    }

    $("#submit").click(function(){

         floor=$("#floor-input").val();
         seat=$("#seat-input").val();
        $.ajax({
           type:"POST",
            url:"/index.php/home/feedback/check",
            data:{"floor":floor,"seat":seat},
            success:function(data){
               if(!data){
                   $(".illegal").show();
               }else{
                   $(".leave").show();
               }
            },
            error:function(XMLHTTPRequest,status,errorThrown){
                alert(XMLHTTPRequest.statusText+status);
            }
        });
    })

    $(".cancel").click(function(){
        $(this).parent().hide();
    });
    $(".report").click(function(){

        $.ajax({
            type:"POST",
            url:"/index.php/home/feedback/sreport",
            data:{"floor":floor,"seat":seat},
            success:function($data){
                if(!$data) {
                    alert("举报成功，现在该座位可以正常选座了！");
                    window.location.href = "/index.php/home/floorlist/floorlist";
                }else{
                    alert("举报失败，请检查重试！");
                    window.location.href = "/index.php/home/feedback/report";
                }
            },
            error:function(XMLHTTPRequest,status,errorThrown){
                alert(XMLHTTPRequest.statusText+status);
            }
        });
    })
</script>
</body>