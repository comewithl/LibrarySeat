<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="/libraryso/Public/css/Feedback/report.css" rel="stylesheet" type="text/css"/>
    <title>监督</title>

</head>

<body>
<!--监督-->
<div id="container">
   <!-- <div class="top">监督</div>-->
    <div class="d2">
        <div class="menu">
            <img class="more" src="/libraryso/Public/img/更多.png">
            <ul class="more-ul">
                <li><a href="/libraryso/index.php/home/floorlist/floorlist">查看座位</a></li>
            </ul>
        </div>
    </div>


    <div class="logo">
        <!--头像和昵称后台直接获取添加到user Div里面-->
        <img src="/libraryso/Public/img/search.png" alt="head_img" class=" head_img">
        <div class="nick_name">查询</div>
    </div>
    <div class="register" >
        <div class="floor">
            <input type="text" name="floor-input" id="floor-input" onblur="flootCheck()" placeholder="请输入楼层号02或04"></input>
            <div id="no">
                <img src="/libraryso/Public/img/floor.png" alt="user_img" class=" no_img">
                <p1 style="border-right: 1px solid">楼层</p1>
            </div>
        </div>
        <div class="seat">
            <input type="text" name="seat-input" id="seat-input"  placeholder="请输入三位座位号，例如：001">
            <div id="password">
                <img src="/libraryso/Public/img/seat.png" alt="password_img" class=" password_img">
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
<script type="text/javascript" src="/libraryso/Public/js/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="/libraryso/Public/js/Feedback/report.js"></script>
</html>>