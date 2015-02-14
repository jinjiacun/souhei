<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找回密码--搜黑</title>
<meta name="keywords" content="搜黑，黑平台查询，黑平台曝光，贵金属黑平台，外汇黑平台"/>
<meta name="description" content="搜黑是全国性的交易市场曝光平台,携手每一位投资人共同揭开交易市场的层层黑幕,为您提供全方位的贵金属、外汇、黄金、石油等行业交易黑幕的查询、曝光。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
<script type="text/javascript" src="/yms/Public/js/Validform_v5.3.2.js" ></script>
<style type="text/css">
  .yzm{height: 45px;
       margin-left: 5px;
       width: 100px;}
  .aa{display: none;}
  .Validform_wrong{ color:#FF3333 !important;}
  .Validform_right{ color:#66CC66 !important;}
</style>
</head>
<div class="yzsbai">
    <p id="tishi"></p>
    <input name="" type="button" value="确 定" class="xigs" />
</div>
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
        <a class="zhuce2">找回密码</a>
       </div>
      <div class="back_sy"><a href="/yms/index.php/home">搜黑首页</a></div>
    </div>
  </div>
  
  
  <!--头部--End--> 

<!--内容--Begin-->     
  <div id="content_ny">
    <div class="zhucebox">
      <div class="zhuce_lt">
        <h2>&nbsp;</h2>
        <form class="registerform">
        <dl>
          <dt>手机号码：</dt>
          <dd>
                <input name="mobile" type="text" class="text1 mobile" datatype="m" nullmsg="请输入手机号码！" errormsg="输入的手机号码有误" autocomplete="off" />
                <p class="Validform_checktip" id="mobile_ex">请填写注册的手机号</p>
          </dd>
        </dl>
        <dl>
          <dt>&nbsp;</dt>
          <dd>
                <input style="width:130px;float: left;margin-top: 3px; position: relative;width: 102px;" name="" type="button" value="获取验证码" class="hqyzm" />
                <img src="<?php echo ($yzm); ?>" class="yzm" id="index_01" title="点击刷新" onclick="this.src=this.src+'?'" />
          </dd>
        </dl>
        <dl>
          <dt>验证码：</dt>
          <dd>
               <input style="width:230px;position: absolute;" name="tyyzm" type="text" class="text1 tyyzm" datatype="s4-4" nullmsg="请输入验证码！" errormsg="输入的验证码有误" autocomplete="off"/>
               <p class="Validform_checktip">请填写验证码</p>
          </dd>
        </dl>        
        <dl>
          <dt>&nbsp;</dt>
          <dd>
                <input name="button" type="button" value="下一步" class="zhuce_bt1" />
          </dd>
        </dl>
        </form>
      </div>
      <div class="zhuce_rt">
       <p>想起密码，直接：</p>
       <a href="javascript:void(0)" class="yidel">登 录</a>
      </div>
    </div>
  </div>
<!--内容--End--> 

<!--底部--Begin-->     
   <div id="footer_zc">
                 <p>Copyright © 2014 souhei.com 搜黑 版权所有 复制必究</p> 
                 <p>沪ICP备13040259号-1</p>
   </div>
<!--底部--End--> 

</div>
<script type="text/javascript">
  $(function(){
    //表单验证
    $(".registerform").Validform({
        tiptype:function(msg,o,cssctl){
          if(!o.obj.is("form")){
            var objtip=o.obj.siblings(".Validform_checktip");
            cssctl(objtip,o.type);
            objtip.text(msg);
          }
        }
    });
    //获取验证码
    $(".yzm").hide(); 
    $('.hqyzm').click(function(){
      var mobile_ex = document.getElementById("mobile_ex").innerHTML;
      if (mobile_ex == "验证通过！") {
        $(".yzm").show(); 
      }else{
        $(".yzm").hide(); 
      }
    });
    //传递手机号码
    $('.mobile').blur(function(){
              var yzm    = "<?php echo ($yzm); ?>";
              var mobile = $(this).parents('.zhuce_lt').find('.mobile').val();
              
              var url = yzm + mobile;
              $("#index_01").attr("src",url)
    });
    //获取手机验证码
    $('.zhuce_bt1').click(function(){
              var mobile = $(this).parents('.zhuce_lt').find('.mobile').val();
              var imagecode = $(this).parents('.zhuce_lt').find('.tyyzm').val();
              if (mobile == "") {
                  $('#tishi').text("手机号码不能为空！");
                  $(".bd_wd").css("width", $(document).width());
                  $(".bd_wd").css("height", $(document).height());
                  $(".bd_wd").show();
                  $(".yzsbai").show();
                  return false;
              }
              if (imagecode == "") {
                  $('#tishi').text("验证码不能为空！");
                  $(".bd_wd").css("width", $(document).width());
                  $(".bd_wd").css("height", $(document).height());
                  $(".bd_wd").show();
                  $(".yzsbai").show();
                  return false;
              }
              jQuery.ajax({  
                  type:"post",  
                  url:"/yms/index.php/Home/User/find_password/mobile/"+mobile+"/imagecode/"+imagecode+"",
                  timeout: 5000,  
                  dataType:"json", 
                  contentType: "application/x-www-form-urlencoded; charset=utf-8",
                  data:{
                      mobile:mobile,
                      imagecode:imagecode,
                  },
                  success: function aa(data) { 
                      if (data == 0) {
                        window.location.href="/yms/index.php/home/User/find_password_ex"; 
                      }else if (data == -1) {
                        $('#tishi').text("手机验证码发送失败！");
                        $(".bd_wd").css("width", $(document).width());
                        $(".bd_wd").css("height", $(document).height());
                        $(".bd_wd").show();
                        $(".yzsbai").show();
                        return false;
                      } 
                  }  
              })      
      });
  });
//urlencode数据转换
  function urlencode (str) {  
      str = (str + '').toString();   
      return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').  
      replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');  
  } 
</script>
</body>
</html>