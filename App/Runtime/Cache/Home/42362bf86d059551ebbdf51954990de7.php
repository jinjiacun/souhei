<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>黑平台曝光_贵金属交易市场黑幕曝光平台_搜黑</title>
<meta name="keywords" content="搜黑，黑平台查询，黑平台曝光，贵金属黑平台，外汇黑平台"/>
<meta name="description" content="搜黑,全国性的交易市场曝光平台，携手每一位投资人共同揭开交易市场的层层黑幕，为投资者甄选安全可靠的交易平台，营造国内绿色透明的交易环境。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/js/Validform_v5.3.2.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
</head>

<body>
<!--成功-->  
<div class="yzsbai2">
    <p id="tishi2"></p>
    <input name="" type="button" value="确 定" class="xigs2" />
</div>
<!--失败-->
<div class="yzsbai">
    <p id="tishi"></p>
    <input name="" type="button" value="确 定" class="xigs" />
</div>
<!--Begin--登录-->   
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
           <input type="password" title="请输入密码" placeholder="请输入密码" class="post2" autocomplete="off"/></p>
         <p class="clears"></p>   
      <span style="height:1px; overflow:hidden">&nbsp;</span>
      <input name="" type="checkbox" value="" class="check" autocomplete="off"/>下次自动登录
      <a class="wangji" target='_blank' href="/yms/index.php/home/user/find_password">忘记密码</a>
      <p class="clears"></p>   
         <span>&nbsp;</span><input name="submit" type="submit" value="登录" id="but2" class="but2"  />
      <p class="clears"></p>           
          <p class="mfzcs">什么！还没有搜黑网账号？<a target='_blank' href="/yms/index.php/home/user/user_register" target='_blank'>免费注册</a></p>
    </div>
</div>
<!--登录--End--> 
<script type="text/javascript">
  $(function(){ 
    // document.onkeydown = function (e) {  
    //   var code = document.all ? window.event : e;  
    //   if (code.keyCode == 13) { 
    //     $("#but2").click(); 
    //   } 
    // }
    //用户登录
    $('#but2').click(function(){
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
          $.ajax({  
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
                    window.location.reload(); 
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
    })
});
</script>
<!--End--登录--> 
<div id="wrap">

<!--头部--Begin-->   
  <!--头部--Begin-->   
  <div class="header_fixbox">
      <div class="header_fix header_fixbox_ny">
          <div class="header_fix_lt">
                <a href="/yms/index.php/home" class="hd_fix_logo" ><img src="/yms/Public/Home/images/logo2.png" /></a>
                <input name="search_name" id="search_name" type="text" class="hd_fix_lt3" />
                <input name="button" type="button" class="hd_fix_lt4" />
          </div>
          <div class="header_fix_rt">
                <!-- <a href="/yms/index.php/home/Download/download_app">软件下载</a> -->
                <a href="/yms/index.php/home/Inexposure/exposure" class="wybg_a" target='_blank'>我要曝光</a>
                <a href="/yms/index.php/home/Inexposure/authentication" class="wybg_a" target='_blank'>合规认证</a>
                <?php if($userid != '' ): ?><p class="jingru">您好，
                   <a target='_blank' href="/yms/index.php/home/user/user_center"><?php echo ($nickname); ?>&nbsp</a>
                   <a href="/yms/index.php/home/user/logout">退出</a>
                </p>
                <?php else: ?> 
                <a href="/yms/index.php/home/user/user_register" class="hd_fix_rt1" >注册</a>
                <a href="javascript:void(0)" class="hd_fix_rt2" >登录</a><?php echo ($aaa); endif; ?>
          </div>
      
      </div>
  </div> 
  <script type="text/javascript">
  // document.onkeydown = function (e) { 
  //   var theEvent = window.event || e; 
  //   var code = theEvent.keyCode || theEvent.which; 
  //   if (code == 13) { 
  //     $(".hd_fix_lt4").click(); 
  //   } 
  // }
  // $(document).ready(function () {
    
  // });
  $(function(){
      //搜索
      $('.hd_fix_lt4').click(function(){
          var search_name = $(this).parents('.header_fix_lt').find('.hd_fix_lt3').val();
          var usaa = '<?php echo ($userid); ?>';
          if(search_name == ""){ 
              $('#tishi').text("请输入搜索内容！");
              $(".bd_wd").css("width", $(document).width());
              $(".bd_wd").css("height", $(document).height());
              $(".bd_wd").show();
              $(".yzsbai").show();
              return false;
          }
          if (usaa == "") {
              $(".bd_wd").css("width", $(document).width());
              $(".bd_wd").css("height", $(document).height());
              $(".bd_wd").show();
              $("#tcwindows1").show();
              return false;
          }
          $.ajax({  
              type:"post",  
              url:"/yms/index.php/Home/Index/search_ex/search_name/"+search_name+"/usaa/"+usaa+"",
              timeout: 5000,  
              dataType:"json", 
              contentType: "application/x-www-form-urlencoded; charset=utf-8",
              data:{
                  search_name:search_name,
                  usaa:usaa
              },
              success: function aa(data) {
                if(data != 0){
                  if (data[0].auth_level == '006001') {
                     window.location.href="/yms/index.php/Home/Query/query_hpt/resid/"+data[0].id+"/p/1";
                  }else if(data[0].auth_level == '006002'){
                     window.location.href="/yms/index.php/Home/Query/query_wrz/resid/"+data[0].id+"/p/1";
                  }else if(data[0].auth_level == '006003'){
                     window.location.href="/yms/index.php/Home/Query/query_yrz/resid/"+data[0].id+"/p/1";
                  }
                }else{
                  window.location.href="/yms/index.php/Home/Query/query_wsl/wsl/"+search_name+"";
                }
              }  
          })   
      })
      //判断是否登录
      $('.wybg_a').click(function(){
         var usaa = '<?php echo ($userid); ?>';
         if (usaa == "") {
              $(".bd_wd").css("width", $(document).width());
              $(".bd_wd").css("height", $(document).height());
              $(".bd_wd").show();
              $("#tcwindows1").show();
              return false;
          }
      });
      // $('.wybg_a').click(function(){
      //    var usaa = '<?php echo ($userid); ?>';
      //    if (usaa == "") {
      //         $(".bd_wd").css("width", $(document).width());
      //         $(".bd_wd").css("height", $(document).height());
      //         $(".bd_wd").show();
      //         $("#tcwindows1").show();
      //         return false;
      //     }
      // });
});
</script>
<!--头部--End--> 
<!--头部--End--> 

<!--内容--Begin-->     
   <div id="content">
     <div class="renzheng feifas">
       <h2 class="bians">非法平台曝光台</h2>
       <div class="txneirong">
   		 <p class="txnr_ts">请如实填写申请企业或机构的相关信息后，提交认证。</p>
       <form class="registerform" name="theForm" id="theForm" method="post" enctype="multipart/form-data" onsubmit="return ValidateFile()">
         <div class="xzqyxz">
                <span>企业性质：</span>
                <select name="nature">
                  <option value="003001">公司</option>
                  <option value="003002">平台</option>
                </select>
                <span>所属行业：</span>
                <select name="trade" class="gjshu">
                  <option value="004001">贵金属</option>
                  <option value="004002">外汇</option>
                  <option value="004003">石油</option>
                  <option value="004004">大宗商品</option>
                  <option value="004005">其他</option>
                </select>
         </div>
         <div class="txkuang  nobian">
                <dl style="margin-top:20px;">
                  <dt>公司名称：</dt>
                  <dd>
                    <input name="company_name" type="text" class="text1" datatype="s" nullmsg="不能为空！" /><span>*</span>
                    <div class="Validform_checktip"></div>
                  </dd>
                </dl>
                <dl>
                  <dt>涉及金额：</dt>
                  <dd>
                    <input name="amount" type="text" class="text1" datatype="n | /^(\-)*(\d+)\.(\d\d).*$/"  ignore="ignore"  /><span>元</span>
                    <div class="Validform_checktip"></div>
                  </dd>
                </dl>
                <dl>
                  <dt>公司网址：</dt>
                  <dd>
                    <input name="website" type="text" class="text1" datatype="url" ignore="ignore" />
                    <div class="Validform_checktip"></div>
                  </dd>
                </dl>
                <dl>
                  <dt>曝光内容：</dt>
                  <dd>
                    <textarea name="content" class="textn" nullmsg="不能为空！" datatype="*" ></textarea><span>*</span>
                    <div class="Validform_checktip"></div>
                  </dd>
                </dl>
                <dl>
                  <dt>附件上传：</dt>
                  <dd><input name="pic_1" type="file" id="pic_1" />
                  <p>图片格式： .gif .jpg .jpeg .png </p></dd>
                </dl>
                <dl>
                  <dt>&nbsp;</dt><dd><input name="submit" type="submit" value="我要曝光" class="textn1" /></dd>
                </dl>
              </form>
         </div>       
       </div>   
     </div>
  </div>
<!--内容--End--> 

<!--底部--Begin-->     
<!--底部--Begin-->     
   <div id="footer">
     <div class="footerbox">
          <dl class="copys">
              <dt><a><img src="/yms/Public/Home/images/logo.png"/></a></dt>
              <dd>
                 <p>Copyright © 2015 souhei.com 搜黑 版权所有 复制必究</p> 
                 <p>沪ICP备15004957号-1</p>
                 <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254396040'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1254396040%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
              </dd>
          </dl>
       <div class="zcjg">
         <a target='_blank' href="/yms/index.php/home/About/about_us">关于我们</a>|<a target='_blank' href="/yms/index.php/home/About/contact_us">联系我们</a>|<a target='_blank' href="/yms/index.php/home/About/help_center">帮助中心</a></div>
     </div>
   </div>
   <p id="back-to-top"><a href="#top"><span></span></a></p>
<!--底部--End--> 


<!--底部--End--> 
</div>
</body>
<script type="text/javascript">
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
      //表单提交成功关闭
      $(".yzsbai2 .xigs2").click(function(){
          $(".yzsbai2").hide();
          $(".bd_wd2").hide();  
          window.location.href="/yms/index.php/Home/Ranking/machine"; 
      });
    })
    //验证图片格式大小
    function ValidateFile(){
      var tmp     = document.getElementById("pic_1").value; 
	    if(tmp != ""){
        if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp)){
          $(".bd_wd").css("width", $(document).width());
          $(".bd_wd").css("height", $(document).height());
          $(".bd_wd").show();
          $('#tishi').text("资质证明类型必须是.gif,jpeg,jpg,png中的一种");
          $(".yzsbai").show();
        }
      }
      //表单提交
      var fd = new FormData(document.getElementById("theForm"));
      //fd.append("content", content);
      $.ajax({
        url: "/yms/index.php/Home/Inexposure/exposure_ex",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,  // tell jQuery not to process the data
        contentType: false   // tell jQuery not to set contentType
      }).done(function( data ) {
      if(data){
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        if (data == 0) {
          $('#tishi2').text("曝光成功！");
          $(".yzsbai2").show();
          return false;
        }else if(data == -1){
          $('#tishi').text("曝光失败！");
          $(".yzsbai").show();
          return false;
        }else if(data == 1){
          $('#tishi').text("图片上传失败！");
          $(".yzsbai").show();
          return false;
        }else if(data == 2){
          $('#tishi').text("没有文件上传！");
          $(".yzsbai").show();
          return false;
        }else if(data == 3){
          $('#tishi').text("文件上传错误！");
          $(".yzsbai").show();
          return false;
        }else if(data == 4){
          $('#tishi').text("上传文件不能大于400kb！");
          $(".yzsbai").show();
          return false;
        }else if(data == 5){
          $('#tishi').text("图片格式错误！");
          $(".yzsbai").show();
          return false;
        }else if(data == 6){
          $('#tishi').text("还有必填项没有填写！");
          $(".yzsbai").show();
          return false;
        }
      }
      });
      return false;
	  }
</script>
</html>