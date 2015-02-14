<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($new_list["title"]); ?>--搜黑</title>
<meta name="keywords" content="搜黑，黑平台查询，黑平台曝光，贵金属黑平台，外汇黑平台"/>
<meta name="description" content="搜黑是全国性的交易市场曝光平台,携手每一位投资人共同揭开交易市场的层层黑幕,为您提供全方位的贵金属、外汇、黄金、石油等行业交易黑幕的查询、曝光。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/jquery.cookie.js" ></script>
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
     <div class="textbox_lt">
         <h2><?php echo ($new_list["title"]); ?></h2>
         <p class="xinxis"><a>作者：<?php echo ($new_list["author"]); ?></a><a>来源：<?php echo ($new_list["source"]); ?></a><span><?php echo ($add_time); ?></span><em style="display:none;"><?php echo ($record_count); ?></em></p>
         <div class="text_nrbox">
            <?php echo (stripslashes(htmlspecialchars_decode($content))); ?>
           <div class="fenxbox">
               <div class="fenxbox_rt">
                 <div style="margin:auto;" class="bdsharebuttonbox">
                   <span class="chare" style="float: left;margin-top: 3px;" >分享到：</span>
                   <a href="#" class="bds_more" data-cmd="more"></a>
                   <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                   <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                   <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                   <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                   <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                 </div>
               </div>
               <script>
                  window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
               </script>
               <div class="dianzan">
                   <a class='z' id="<?php echo ($new_list["id"]); ?>">点赞</a>
                   <span><?php echo ($new_list["assist_num"]); ?></span>
               </div>

           </div>
         </div>
       <div class="hfubox" style="display:none">
         <h3>已有<span><?php echo ($record_count); ?></span>人回复</h3>
         <!-- <form class="registerform" name="theForm" method="post" enctype="multipart/form-data" onsubmit="return ValidateFile()"> -->
            <textarea name="saytext" id="saytext0" class="saytext" autocomplete="off"></textarea>
            <div class="huifub">
               <div class="huifub_lt">
                  <img data-id="0" class="emotion" src="/yms/Public/Home/images/btn17.png"/>
               </div>
               <input type="hidden" class="news_id" name="news_id" value="<?php echo ($new_list["id"]); ?>"> 
               <input type="hidden" class="company_id" name="company_id" value="<?php echo ($new_list["company_id"]); ?>"> 
               <input name="submit" type="submit" id="huifub_rt" class="huifub_rt" value="回  复"/>
            </div>
         <!-- </form> -->
       </div>
       <div class="hufunrbox" id="user" style="display:none">
          <?php if(is_array($comnews)): $i = 0; $__LIST__ = $comnews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comnews): $mod = ($i % 2 );++$i;?><dl>
              <dt><a href="#"><img src="<?php echo ($comnews["user_id"]); ?>"/></a></dt>
              <dd>
                  <h4><a href="#"><?php echo ($comnews["nickname"]); ?></a>说：</h4>
                  <p class="show" id="show"><?php echo ($comnews["content"]); ?></p>
                  <div class="dz_time">
                       <span class="times"><?php echo ($comnews["add_time"]); ?></span>
                       <span class="dianzas">
                       <a id="<?php echo ($comnews["id"]); ?>" href="javascript:void(0)">点赞</a><em><?php echo ($comnews["assist_num"]); ?></em>
                       <input type="hidden" class="companyid" value="<?php echo ($comnews["company_id"]); ?>"> 
                       <input type="hidden" class="newsid" value="<?php echo ($comnews["news_id"]); ?>">
                       </span>
                  </div>
              </dd>
          </dl><?php endforeach; endif; else: echo "" ;endif; ?>
          <ul class="page">
              <li><?php echo ($page); ?></li>
            </ul>
       </div>
     </div>
     <div class="textbox_rt">
       <div class="tex_gg"><a href="#"><img src="/yms/Public/Home/images/pic06.jpg" /></a></div>
       <div class="rzpttj">
       <h3 class="titltes"><span>合规公司推荐</span></h3>
         <ul>
          <?php if(is_array($list_tj)): $i = 0; $__LIST__ = $list_tj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_tj): $mod = ($i % 2 );++$i;?><li>
               <a href="#"><img src="<?php echo ($list_tj["logo_url"]); ?>"/></a>
               <h4><a href="#" title="<?php echo ($list_tj["company_name"]); ?>"><?php echo (subtext($list_tj["company_name"],13)); ?></a></h4>
               <p style="margin-top: 9px;"><span>认证时间：</span><?php echo (date("Y-m-d",$list_tj["add_time"])); ?></p>
               <p style="margin-top: 10px;" title="<?php echo ($list_tj["gszz"]); ?>"><span>公司资质：</span>
               <?php if(($list_tj["agent_platform_n"] != '') AND ($list_tj["mem_sn"] != '') ): echo (subtext($list_tj["gszz"],17)); ?>
               <?php else: ?> 
                暂无<?php endif; ?>               
               </p>
           </li><?php endforeach; endif; else: echo "" ;endif; ?>
         </ul>
       </div>
       <div class="hgrzs wybg_a"><a href="/yms/index.php/home/Inexposure/authentication">合规认证</a></div>
       
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
<script type="text/javascript" src="/yms/Public/Home/js/jquery.qqFace.js" ></script>
<script type="text/javascript">
$(function(){
  //用户评论
  $('.huifub_rt').click(function(){
      var saytext    = urlencode($(this).parents('.hfubox').find('.saytext').val());
      var newsid     = $(this).parents('.hfubox').find('.news_id').val();
      var companyid  = $(this).parents('.hfubox').find('.company_id').val();
      var userid     = '<?php echo ($userid); ?>';
      if(saytext == ""){ 
          alert("请输入评论内容！"); 
          return false; 
      }
      if (userid == "") {
         alert("请登录后在评论！"); 
         return false; 
      }
      jQuery.ajax({  
          type:"post",  
          url:"<?php echo ($call_url); ?>",
          timeout: 5000,  
          dataType:"json",  
          data:{"method":"Comnews.add","type":"text",
                "content":{"news_id":newsid,"user_id":userid,"company_id":companyid,"content":saytext}},
          success: function aa(data) {  
               if (200 == data.status_code && 0 == data.content.is_success) {
                alert('评论成功！');
                window.location.reload();
               }else{
                alert('评论失败');
               }
          }  
      })  
  })
  //表情
  $('.emotion').qqFace({
    id : 'facebox', 
    assign:'saytext', 
    path:'/yms/Public/Home/arclist/' //表情存放的路径
  });

  //文章点赞
   $(".z").live('click',function(){
          var Oa=$(this);
          var id=Oa.attr('id');//获取id属性
          var userid = '<?php echo ($userid); ?>';
          if (userid == "") {
             alert("请登录后在点赞！"); 
             return false; 
          }
          jQuery.ajax({  
              type:"post",  
              url:"<?php echo ($call_url); ?>",
              timeout: 5000,  
              dataType:"json",  
              data:{"method":"Newsassist.add","type":"text","content":{"news_id":id,"user_id":userid}},
              success: function aa(data) {  
                   if (200 == data.status_code && 0 == data.content.is_success) {
                    alert('点赞+1');//模拟异步数据加1
                    window.location.reload();
                   }else{
                    alert('您已经点过赞了,不要重复哦！');
                   }
              }  
          })  
  }) 
  //用户评论点赞
  $('div.hufunrbox dl a').click(function(){
          var id        = $(this).attr('id');//获取id属性
          var companyid = $(this).parents('dl').find('.companyid').val();
          var newsid    = $(this).parents('dl').find('.newsid').val();
          var userid    = '<?php echo ($userid); ?>';
          if (userid == "") {
             alert("请登录后在点赞！"); 
             return false; 
          }
          jQuery.ajax({  
              type:"post",  
              url:"<?php echo ($call_url); ?>",
              timeout: 5000,  
              dataType:"json",  
              data:{"method":"Comnewsassist.add","type":"text",
              "content":{"comment_id":id,"user_id":userid,"company_id":companyid,"news_id":newsid}},
              success: function aa(data) {  
                   if (200 == data.status_code) {
                      if (0 == data.content.is_success) {
                        alert('点赞+1');//模拟异步数据加1
                        window.location.reload();
                      }else if(-1 == data.content.is_success){
                        alert('您已经点过赞了,不要重复哦！');
                      }else if(-2 == data.content.is_success){
                        alert('您已经点过赞了,不要重复哦！');
                      }
                    
                   }else{
                    alert('您已经点过赞了,不要重复哦！');
                   }
              }  
          })  
  }) 
});
//urlencode数据转换
function urlencode (str) {  
    str = (str + '').toString();   
    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').  
    replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');  
} 
</script>
</html>