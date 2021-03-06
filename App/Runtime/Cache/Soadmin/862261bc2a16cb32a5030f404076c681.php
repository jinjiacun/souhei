<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <style type="text/css">
    *{ padding: 0; margin: 0; }
    body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
    .message{width: 400px;height: 150px;margin:auto;border:1px solid #1B8F24;margin-top: 30px;}
    .head{width: 100%;height: 30px;background: rgb(222,245,194);text-align: center;padding-top: 5px;}
    .content{height: 120px;width: 100%;}
    .success ,.error{text-align: center;margin-top: 30px;}
    .jump{text-align: center;margin-top: 20px;}
    </style>
    <style>
    /*弹窗用的到CSS*/
    /*弹窗函数样式*/
    #wstatus { position:fixed; left:200px; top:400px; width:auto; height:38px; line-height:38px; background:#fff; border:solid 4px #e5e5e5; padding:5px; z-index:9999 }
    #wstatus .wstatus_s { width:38px; height:38px; float:left; }
    #wstatus .wstatus_s1 {  background:url(ico.png) no-repeat left top; }
    #wstatus .wstatus_s2 {  background:url(ico.png) no-repeat left bottom; }
    #wstatus .wstatus_s3 {  background:url(loading.gif) no-repeat center; }
    #wstatus .wstatus_s4 {  background:url(ico.png) no-repeat left -38px; }
    #wstatus .wstatus_f { padding:0 6px 0 6px; text-align:left; font-size:14px; color:#333; font-family:"微软雅黑"; }
    /*遮照*/
    #bremove { width:100%; height:100%; background:#000; opacity:0.3; filter:alpha(opacity=30); z-index:900; position:fixed; left:0; top:0; }
    /*CSS结束*/
    body .span { display:block; width:120px; height:34px; line-height:34px;  background:#390; margin:20px 0 0 100px; color:#fff; text-align:center; font-family:"微软雅黑"; font-size:14px; }
    body .span:hover { background:#360; cursor:pointer; }
    </style>
    <script src="/yms/Public/Soadmin/js/jquery.min.js" type="text/javascript"></script>
    <script src="/yms/Public/Soadmin/js/common.js" type="text/javascript"></script>
    </head>
    <body>
    <div class="message">
    <div class="head"><span>Ace Admin提示信息:</span></div>
    <div class="content">
    <?php if(isset($message)) {?>
    <p class="success">:) <?php echo($message); ?></p>
    <?php }else{?>
    <p class="error">:( <?php echo($error); ?></p>
    <?php }?>
    <p class="detail"></p>
    <p class="jump">
    <a id="href" href="<?php echo($jumpUrl); ?>">如果你的浏览器没有自动跳转，请点击这里...</a>
    <br />
    等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
    </p>
    </div>
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