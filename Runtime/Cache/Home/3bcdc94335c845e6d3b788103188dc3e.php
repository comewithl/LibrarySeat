<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="/libraryso/Public/js/jquery-2.2.1.min.js"></script>
    <link href="/libraryso/Public/css/loadingCss.css" rel="stylesheet" type="text/css"/>
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
        @media screen and (min-width: 376px) and (max-width: 750px){

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

        #input1{
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
        #input2{
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
        .union1{
            position: relative;
            width: 100%;
            height: 50px;
            background: white;
            color: white;
        }
        .union2{
            position: relative;
            margin-top: 2px;
            width: 100%;
            height: 50px;
            background: white;
            color: white;
        }
        #submit2{
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
    <div class="top">监督</div>
    <div class="logo">
        <!--头像和昵称后台直接获取添加到user Div里面-->
        <img src="/libraryso/Public/img/search.png" alt="head_img" class=" head_img">
        <div class="nick_name">查询</div>
    </div>
    <div class="register" >
        <div class="union1">
            <input type="text" name="input1" id="input1">
            <div id="no">
                <img src="/libraryso/Public/img/floor.png" alt="user_img" class=" no_img">
                <p1 style="border-right: 1px solid">楼层</p1>
            </div>
        </div>
        <div class="union2">
            <input type="text" name="input2" id="input2">
            <div id="password">
                <img src="/libraryso/Public/img/seat.png" alt="password_img" class=" password_img">
                <p2 style="border-right: 1px solid">座位</p2>
            </div>
        </div>
        <input type="submit" name="submit2" value="查询" id="submit2">
    </div>
</div>

</body>


<script>
    $(function() {
        submit();
    });
    //提交
    function submit(){
        var judge=false;//  表示可以向服务器提交数据
        $('#submit2').click(function(){
            if($('#input1').val()==''){
                alert('请输入楼层');
                $('#input1').focus();
                return false;
            }
            console.log(strlen($('#input1').val()));
            if(strlen($('#input1').val())>=15){
                alert('楼层最高为15层，请输入正确的楼层号');
                $('#input1').focus();
                return false;
            }
            if($('#input2').val()==''){
                alert('请输入座位号');
                $('#input2').focus();
                return false;
            }
            if(($('#input2').val())==1){
                alert('此座位主人暂离');
                $('#input2').focus();
                return false;
            }
            if(($('#input2').val())!=1){
                alert('此座位空闲');
                $('#input2').focus();
//                return false;
            }
            loading();
            if(judge){
                console.log('服务器正在处理,不要重复提交');
                return false;
            }
            judge=true;
            $.ajax({
                url:'/libraryso/index.php/home/feedback/check',
                type:'post',
                dataType:'json',
//                发送的数据,号码和验证码
                data:{
                    'telNum':$('#input1').val(),
                    'checkNum':$('#input2').val()
                },
//                提交成功
                success:function(a,b,c){
                    alert('恭喜,查询成功!');
                    $('.mask').fadeOut(1000);
                    judge=false;
                },
//                提交失败
                error:function(a,b,c){
                    console.log('服务器故障');
                    alert('服务器遇到些问题噢,请再试试');
                    $('.mask').fadeOut(1000);
                    judge=false;
                }
            });
            return false;
        });
    }
    //    加载动画效果
    function loading(){
        console.log('loading');
        var windowHeight = window.innerHeight;
        var windowWidth = window.innerWidth;
        $('body').prepend('\
            <div class="mask" style="position: fixed;top:' + (windowHeight / 2-100) + "px" + ' ;left:' + (windowWidth / 2 - 30) + "px" + ' ;z-index: 999">\
                <div class="spinner"></div>\
            </div>');
    }
    //计算字符串长度
    function strlen(str) {
        var realLength = 0, len = str.length, charCode = -1;
        for (var i = 0; i < len; i++) {
            charCode = str.charCodeAt(i);
            if (charCode >= 0 && charCode <= 128) realLength += 1;
            else realLength += 1;
        }
        return realLength;
    }
</script>
</body>