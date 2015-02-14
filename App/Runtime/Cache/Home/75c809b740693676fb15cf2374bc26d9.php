<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>帮助中心_搜黑</title>
<meta name="keywords" content="搜黑，黑平台查询，黑平台曝光，贵金属黑平台，外汇黑平台"/>
<meta name="description" content="搜黑是全国性的交易市场曝光平台,携手每一位投资人共同揭开交易市场的层层黑幕,为您提供全方位的贵金属、外汇、黄金、石油等行业交易黑幕的查询、曝光。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
</head>

<body>
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
                <!-- <a href="#">软件下载</a> -->
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
   <div id="content_ny">
     <div class="cont_lt">
              <div class="cont_lta neye_lt">
                <ul>
                   <li><a href="about_us.html">关于我们</a></li>
                   <li><a href="contact_us.html">联系我们</a></li>
                   <li><a href="help_center.html" class="activ">帮助中心</a></li>
                 </ul>
          </div>
               
     </div>
     <div class="content_ny_lt">
       <div class="helpbox">
         <h3 class="title_ct"><span>帮助中心</span></h3>
         <div class="helps">
           <ul>
             <li class="actives">
                <h3>搜黑能做什么？</h3>
                <div class="help_hide">
                  <p>搜黑是一家专业的公司资质查询平台，用户注册后可以查询公司资质，曝光黑平台，更可以寻找“同伴”，进行维权。</p>
                </div>
             </li>
             <li>
                <h3>搜黑能查询哪些公司？</h3>
                <div class="help_hide">
                  <p>搜黑数据库已涵盖了<?php echo ($w_list); ?>家公司、平台，目前仅支持国内外贵金属和外汇企业的查询，将来会扩充到其他行业。</p>
                </div>
             </li>
             <li>
                <h3>合规企业一定是可靠的吗？会不会倒闭跑路？</h3>
                <div class="help_hide">
                  <p>搜黑合规企业认证及其严格，全部由公司提供认证资料，搜黑工作人员多方考察过后，才会授予。所以请投资者放心投资！</p>
                </div>
             </li>
             <li>
                <h3>为什么我曝光了，曝光动态里没有？</h3>
                <div class="help_hide">
                  <p>所有用户的曝光信息，会由于搜黑工作人员核实以后，在进行显示，确保不放过一家“黑平台”，但也不“冤枉”良心企业。</p>
                </div>
             </li>
             <li>
                <h3>如何有效识别黑平台？</h3>
                <div class="help_hide">
                  <p>用户可以从如下几个方面：注册牌照、监管机构、入金帐户名称及属性，简单识别是否黑平台。</p>
                </div>
             </li>
             <li>
                <h3>受到黑平台的毒害，搜黑能帮忙维权吗？</h3>
                <div class="help_hide">
                  <p>搜黑将来会集合同公司的受害者，组织乃至帮助大家维权。但目前，搜黑尚未推出此项服务。</p>
                </div>
             </li>
           </ul>
         </div>
       </div>
     </div>
     <div class="clear"></div>
  </div>
<!--内容--End--> 

<!--底部--Begin-->     
<!--底部--Begin-->     
   <div id="footer">
     <div class="footerbox">
          <dl class="copys">
              <dt><a><img src="/yms/Public/Home/images/logo.png"/></a></dt>
              <dd>
                 <p>Copyright © 2014 souhei.com 搜黑 版权所有 复制必究</p> 
                 <p>沪ICP备15004957号-1</p>
              </dd>
          </dl>
       <div class="zcjg">
         <a target='_blank' href="/yms/index.php/home/About/about_us">关于我们</a>|<a target='_blank' href="/yms/index.php/home/About/contact_us">联系我们</a>|<a target='_blank' href="/yms/index.php/home/About/help_center">帮助中心</a></div>
     </div>
   </div>
<!--底部--End--> 


<!--底部--End--> 

</div>
</body>
</html>