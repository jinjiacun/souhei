<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册--搜黑</title>
<meta name="keywords" content="搜黑，黑平台查询，黑平台曝光，贵金属黑平台，外汇黑平台"/>
<meta name="description" content="搜黑是全国性的交易市场曝光平台,携手每一位投资人共同揭开交易市场的层层黑幕,为您提供全方位的贵金属、外汇、黄金、石油等行业交易黑幕的查询、曝光。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/js/Validform_v5.3.2.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
</head>

<body>
<!--登录弹窗Begin-->
             <!--登录--Begin-->   
<div class="bd_wd"></div> 
<div class="tcwindows1" id="tcwindows1">
  <div class="close"><a>关闭</a></div>
    <h3 class="shwang">登录搜黑</h3>
    <div style="float: left;height: 20px;line-height: 20px;width: 325px; text-align:right; color:red;">
    <span id='span_ex'></span></div>
    <div class="tipbox1">
         <span>账号：</span><input name="" type="text" class="input1" autocomplete="off" title="请输入手机号码" placeholder="请输入手机号码"/>
         <p class="clears"></p>   
         <span>密码：</span>
          <p class="posti">
           <input type="password" title="请输入密码" placeholder="请输入密码" class="post2" autocomplete="off"/>
          </p>
         <p class="clears"></p>   
      <span style="height:1px; overflow:hidden">&nbsp;</span>
      <input name="" type="checkbox" value="" class="check" />下次自动登录
      <a class="wangji" target='_blank' href="/yms/index.php/home/user/find_password">忘记密码</a>
      <p class="clears"></p>   
         <span>&nbsp;</span><input name="" type="button" value="登录" class="but2"  />
      <p class="clears"></p>           
          <p class="mfzcs">什么！还没有搜黑网账号？<a target='_blank' href="/yms/index.php/home/user/user_register">免费注册</a></p>
    </div>
</div>
<!--登录--End-->
<script>
  // document.onkeydown = function (e) { 
  //   var theEvent = window.event || e; 
  //   var code = theEvent.keyCode || theEvent.which; 
  //   if (code == 13) { 
  //     $(".but2").click(); 
  //   } 
  // } 
  
  $(document).ready(function () { 
      //用户登录
      $('.but2').click(function(){
          var mobile     = $(this).parents('.tipbox1').find('.input1').val();
          var password   = $(this).parents('.tipbox1').find('.post2').val();
          if(mobile == ""){ 
              $('#span_ex').text("请输入登录账号！");
              return false; 
          }
          if (password == "") {
            $('#span_ex').text("请输入登录密码");
            return false;
          }
          jQuery.ajax({  
              type:"post",  
              url:"/yms/index.php/Home/User/login",
              timeout: 5000,  
              dataType:"json", 
              contentType: "application/x-www-form-urlencoded; charset=utf-8",
              data:{
                  mobile:mobile,
                  password:password
              },
              success: function aa(data) { 
                  if (data == 0) {
                    window.location.href="/yms/index.php/home/Index/index"; 
                  }else if (data == -1) {
                    $('#span_ex').text("登录失败！");
                    return false;
                  }else if (data == -2) {
                    $('#span_ex').text("用户名不存在或密码错误");
                    return false;
                  }else if (data == -3) {
                    $('#span_ex').text("用户被限制登录");
                    return false;
                  }else if (data == -4) {
                    $('#span_ex').text("用户访问的IP被限制");
                    return false;
                  } 
              }  
          })  
      });
    });
</script>

             <!--登录弹窗end-->
<div id="wrap">

<!--头部--Begin-->   
  <div class="header_zc">
    <div class="header_box">
      <div class="zhuce_logo">
        <a href="/yms/index.php/home" class="zhuce1"><img src="/yms/Public/Home/images/logo3.png"/></a>
        <a class="zhuce2">用户注册</a>
       </div>
      <div class="back_sy"><a href="/yms/index.php/home">搜黑首页</a></div>
    </div>
  </div>
  
  
  <!--头部--End--> 

<!--内容--Begin-->     
   <div id="content_ny">
    	 <div class="zhucebox">
             <div class="zhuce_lt">
             <h2>欢迎注册搜黑</h2>
             <form class="registerform" action="/yms/index.php/Home/User/user_register" name="theForm" method="post" enctype="multipart/form-data" onsubmit="return ValidateFile()" autocomplete="off">
                <dl>
                  <dt>用户昵称：</dt>
                  <dd>
                        <input name="nickname" type="text" class="text1" autocomplete="off" datatype="/^([\u4e00-\u9fa5]{1,8}|[0-9a-zA-Z]{1,16})$/g" errormsg="用户昵称不能大于16个字符" ignore="ignore"/>
                        <div class="Validform_checktip">用户昵称不输入系统会自动生成一个</div>
                  </dd>
                </dl>
                <dl>
                  <dt>手机号码：</dt>
                  <dd>
                        <input name="mobile" id="mobile" type="text" class="text1" autocomplete="off" datatype="m" ajaxurl="./../user/check_mobile" nullmsg="请输入手机号码！" errormsg="输入的手机号码有误" />
                        <span>*</span>
                        <div class="Validform_checktip" id="mobile_ex">仅作登陆和找回密码使用，不会公开</div>
                  </dd>
                </dl>
                <dl id="verify_but_y" style="display: none;">
                  <dt>&nbsp;</dt>
                  <dd>
                        <input name="verify_but" id="verify_but" type="button" value="获取验证码" class="hqyzm" onclick="btn()" />
                        <img id="verifyImg" class="verify" name="verify" src="/yms/index.php/Home/User/verify_c" title="点击刷新" onclick="this.src=this.src+'?'" />
                  </dd>
                </dl>
                <dl>
                  <dt>验证码：</dt>
                  <dd>
                        <input name="verify" type="text" class="text1" datatype="s" ajaxurl="./../user/check_verify_ex" nullmsg="验证码不能为空" errormsg="请输入验证码" autocomplete="off" /><span>*</span>
                        <div class="Validform_checktip">请输入验证码</div>
                  </dd>
                </dl>
                <dl>
                  <dt>登录密码：</dt>
                  <dd>
                        <input type="password" name="pswd" class="text1" id="pswd" datatype="*6-16" nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！" autocomplete="off"/><span>*</span>
                        <div class="Validform_checktip">密码范围在6~16位之间</div>
                  </dd>
                </dl>
                <dl>
                  <dt>重复密码：</dt>
                  <dd>
                        <input type="password" name="repassword" class="text1" id="repassword" autocomplete="off" datatype="s" recheck="pswd" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！"/><span>*</span>
                        <div class="Validform_checktip">两次输入密码需一致</div>
                  </dd>
                </dl>
                <dl>
                  <dt>&nbsp;</dt>
                  <dd>
                        <input name="" type="checkbox" id="checkbox_ok" checked="checked" value="" class="tongyi" />同意&nbsp<a target='_blank' href="/yms/index.php/Home/Public/xieyi" class="xieyi1">服务条款和保密协议</a></dd>
                </dl>
                <dl>
                  <dt>&nbsp;</dt>
                  <dd>
                        <input name="submit" type="submit" value="注 册" class="zhuce_bt" />
                  </dd>
                </dl>
             </form>
             </div>
             <div class="zhuce_rt"><p>已有搜黑账号，可直接：</p>
             <a href="javascript:void(0)" class="yidel">登 录</a></div>
         </div>
  </div>
<!--内容--End--> 

<!--底部--Begin-->     
   <div id="footer_zc">
                 <p>Copyright © 2015 souhei.com 搜黑 版权所有 复制必究</p> 
                 <p>沪ICP备15004957号-1</p>
                 <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254396040'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1254396040%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
   </div>
<!--底部--End--> 

</div>
</body>
<script type="text/javascript">
    //表单验证
    $(function(){
      $(".registerform").Validform({
        tiptype:function(msg,o,cssctl){
          if(!o.obj.is("form")){
            var objtip=o.obj.siblings(".Validform_checktip");
            cssctl(objtip,o.type);
            objtip.text(msg);
          }
        }
      });
      //验证码
      $("#mobile").blur(function(){
        var mobile =document.getElementById("mobile").value;
        if (mobile != "") {
          $("#verify_but_y").show()
        }else{
          $("#verify_but_y").hide()
        }
      });
      //点击显示验证码
      $('#verify_but').click(function(){
        var mobile_ex = document.getElementById("mobile_ex").innerHTML;
        if (mobile_ex == "可以注册") {
          $("#verifyImg").show(); 
        }else{
          $("#verifyImg").hide(); 
        }
      });
    });
    //图片上传验证
    function ValidateFile(){ 
      var checkbox_ok  = document.getElementById("checkbox_ok").checked;
      if(checkbox_ok == false){ 
          alert("您还没有没有同意服务条款和保密协议！"); 
          return false; 
      }
    }
</script>
</html>