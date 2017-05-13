<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 48px;  width: 80%}
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
.font-larger{
    font-size: 2em;
}
.div-center{
    margin: 0 auto;
}
.text-center{
    text-align: center;
}
.error-wrapper{
    width: 50%;
    height: 400px;

}
.error-content{
    width: 32%;
    height: 300px;
    margin-bottom: 2em;
}

</style>
</head>
<body>
<div class="system-message ">
    <img src="" alt="">
<?php if(isset($message)) {?>
<div class="error-content div-center">
    <img class='error-content-img'src="/libraryso/Public/img/success.png" width ="300" height='300'alt=":)">
</div>
<p class="success"><?php echo($message); ?></p>
<?php }else{?>
<div class="error-content div-center">
    <img src="/libraryso/Public/img/error.png" width ="300" height='300' alt=":(">
</div>

<p class="error text-center"><?php echo($error); ?></p>
<?php }?>
<p class="detail"></p>
<p class="jump text-center font-larger">
页面自动 <a class="" id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>