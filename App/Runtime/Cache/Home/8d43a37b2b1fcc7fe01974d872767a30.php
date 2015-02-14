<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>黄金,外汇,贵金属虚假交易曝光台_搜黑</title>
<meta name="keywords" content="曝光台,虚假交易曝光台"/>
<meta name="description" content="搜黑,全国性的交易市场曝光平台，携手每一位投资人共同揭开交易市场的层层黑幕，为投资者甄选安全可靠的交易平台，营造国内绿色透明的交易环境。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
<script type="text/javascript" id="bdshare_js" data="type=button&amp;uid=0" ></script>
<style type="text/css">
  .bdsharebuttonbox{ display:inline-block; *display:inline; float:right; margin-top:9px;}
  .bdsharebuttonbox .chare{ display:inline-block; *display:inline;font-size:14px; height: 24px; line-height: 24px; }
</style>
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
       <div class="baoguant_lt">
       <div class="wybaog">
          <span>“黑榜”排行</span>
          <div class="bdsharebuttonbox">
             <span class="chare">分享到：</span>
             <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
             <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
             <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
             <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
             <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
             <a href="#" class="bds_more" data-cmd="more"></a>
          </div>
          <script>
            window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
          </script>
       </div>
       <div class="dongtop">
               <ol>
                 <?php if(is_array($get_list)): $k = 0; $__LIST__ = $get_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($k % 2 );++$k;?><li class="to<?php echo ($k); ?>">
                     <dl>
                         <dt><?php echo ($k); ?></dt>
                         <dd>
                           <div class="txt">
                              <h4><p>被曝平台：
                              <a target='_blank' href="/yms/index.php/Home/Query/query_hpt/resid/<?php echo ($voo["id"]); ?>/p/1">
                                 <span><?php echo ($voo["company_name"]); ?></span>
                              </a></p></h4>
                           </div>
                           <div class="neirong"><p class="bordera">加黑人数：<em><?php echo ($voo["add_blk_amount"]); ?></em></p><p>最早曝光时间：<span><?php echo ($voo["last_time"]); ?></span></p></div>
                           <p class="bgdyh">曝光用户：
                           <?php if(is_array($voo['user_list'])): $i = 0; $__LIST__ = $voo['user_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span><?php echo ($vo["nickname"]); ?></span><span <?php if($i == count($voo['user_list'])): ?>class="last"<?php endif; ?>>、</span><?php endforeach; endif; else: echo "" ;endif; ?>
                           <a target='_blank' href="/yms/index.php/Home/Query/query_hpt/resid/<?php echo ($voo["id"]); ?>/p/1#basic_setting">(<?php echo ($voo["exp_amount"]); ?>)</a></p>
                         </dd>
                     </dl>
                 </li><?php endforeach; endif; else: echo "" ;endif; ?>
               </ol>
             <?php if($record_count > 5 ): ?><div class="djjzgd"><a href="#">点击加载更多</a></div><?php endif; ?>
       </div>
       </div>
       <div class="baoguant_rt">
            <div class="baoguant_rt1">
                  <a href="/yms/index.php/home/Inexposure/exposure" class="wybgs wybg_a">我要曝光</a>
                  <p>已有<span><?php echo ($user_amout); ?></span>名网友曝光了<span><?php echo ($record_count_ex); ?></span>个平台</p>
            </div>
         <div class="baoguant_rt2">
           <h3>最新曝光</h3>
           <div class="zxbaog">
             <ol>
             <?php if(is_array($list_zx)): $i = 0; $__LIST__ = $list_zx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_zx): $mod = ($i % 2 );++$i;?><li>
                     <dl>
                         <dt><?php echo (date("H:i:s",$list_zx["add_time"])); ?></dt>
                         <dd>
                           <div class="txt">
                               <h4><?php echo ($list_zx["nickname"]); ?></h4>
                           </div>
                           <p class="ybaogle">曝光了
                           <?php if($list_zx["auth_level"] == '006001'): ?><a target='_blank' href="/yms/index.php/Home/Query/query_hpt/resid/<?php echo ($list_zx["company_id"]); ?>/p/1#install_sql" title="<?php echo ($list_zx["company_name"]); ?>"><?php echo (subtext($list_zx["company_name"],12)); ?></a>
                           <?php elseif($list_zx["auth_level"] == '006002'): ?>
                           <a target='_blank' href="/yms/index.php/Home/Query/query_wrz/resid/<?php echo ($list_zx["company_id"]); ?>/p/1#install_sql" title="<?php echo ($list_zx["company_name"]); ?>"><?php echo (subtext($list_zx["company_name"],12)); ?></a>
                           <?php else: ?>
                           <a target='_blank' href="/yms/index.php/Home/Query/query_yrz/resid/<?php echo ($list_zx["company_id"]); ?>/p/1" title="<?php echo ($list_zx["company_name"]); ?>"><?php echo (subtext($list_zx["company_name"],12)); ?></a><?php endif; ?>
                           </p>
                         </dd>
                     </dl>
                 </li><?php endforeach; endif; else: echo "" ;endif; ?>
             </ol>
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
<script type="text/javascript">
  $(function(){
    var num='';
      var rel=$('.dongtop ol li').size();
      $('.dongtop ol li:gt(4)').hide();
      $('.djjzgd a').click(function(){
          num=$('.dongtop ol li:hidden').first().prev().index();
          if($('.dongtop ol li').is(':hidden'))
          {
              $('.dongtop ol li:lt('+(num+5)+')').show();
          }
          else
          {
             $(this).text('没有更多！');
                  return false;
          }
       
        return false;
       });
  })
</script>
</body>
</html>