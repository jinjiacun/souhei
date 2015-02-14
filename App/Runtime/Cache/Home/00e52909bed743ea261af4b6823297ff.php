<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜黑—全国最大的查询曝光平台</title>
<meta name="keywords" content="搜黑，黑平台查询，黑平台曝光，贵金属黑平台，外汇黑平台"/>
<meta name="description" content="搜黑是全国性的交易市场曝光平台,携手每一位投资人共同揭开交易市场的层层黑幕,为您提供全方位的贵金属、外汇、黄金、石油等行业交易黑幕的查询、曝光。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/js/Validform_v5.3.2.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
<script src="/yms/Public/Home/js/scrolling.js" type="text/javascript"></script> 
</head>

<body style="overflow-x:hidden;">
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
  <div class="sy_headerbox">
    <div class="sy_header">
              <div class="sy_header_logo"><a><img src="/yms/Public/Home/images/logo1.png" /></a></div>
              <div class="searchbox">
                    <ul>
                      <li class="active" alt="请输入公司或平台名称、网站">全部</li>
                      <li alt="请输入公司名称">公司</li>
                      <li alt="请输入平台名称">平台</li>
                      <li alt="请输入公司或平台网址">网址</li>
                    </ul>
                    <div class="chaxun">
                      <form class="registerform" action="/yms/index.php/Home/Index/search" name="theForm" method="post" onsubmit="return ValidateFile()">
                       <input style="color:#333" name="search_name" id="search_name_ex" type="text" class="chuax1 common_text" placeholder="请输入公司或平台名称、网站" title="请输入公司或平台名称、网站"/>
                       <input name="submit" type="submit" class="chuax2" value="立即查询" />
                      </form>
                    </div>
              </div>
      </div>
  </div>
  
  <!--头部--End--> 

<!--内容--Begin-->     
   <div id="content">
     <div class="cont_lt">
              <div class="cont_lta">
                <h2 class="titles"><a href="/yms/index.php/home">首页</a></h2>
                <ul>
                   <li><a href="javascript:void(0)" class="ptcx">平台查询</a></li>
                   <li><a class="wybg_a" href="/yms/index.php/home/Inexposure/exposure" target='_blank'>我要曝光</a></li>
                   <li><a class="wybg_a" href="/yms/index.php/home/Inexposure/authentication" target='_blank'>合规认证</a></li>
                   <li><a href="/yms/index.php/home/Ranking/machine" target='_blank'>曝光台</a></li>
                   <li><a href="/yms/index.php/home/Regulators/regulators" target='_blank'>监管机构</a></li>
                 </ul>
                 <div class="ewm"><img src="/yms/Public/Home/images/pic01.jpg" width="104" height="140" /></div>
                <div class="wybg wybg_a"><a target='_blank' href="/yms/index.php/home/Inexposure/exposure">我要曝光</a></div>
          </div> 
     </div>
     <div class="cont_rt">
         
         
       <div class="centbox">
           <div class="centbox_lt">
              <div class="bgls">
                  <h3>曝光动态</h3>
                  <p>已有<span><?php echo ($user_amout); ?></span>名网友曝光了<span><?php echo ($record_count); ?></span>个平台</p>
              </div>
              <div class="dongtaibox">
                <div id="content_ex">
                  <?php if(is_array($bgdt)): $k = 0; $__LIST__ = $bgdt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bgdt): $mod = ($k % 2 );++$k;?><div class="room_show_item">
                      <dl>
                         <dt>
                         <?php if($bgdt["add_time"] > $news): echo ($bgdt["add_time_ex"]); ?>
                         <?php else: ?>
                         <?php echo ($bgdt["add_time_exx"]); endif; ?>
                         </dt>
                         <dd>
                           <div class="txt">
                               <h4 title="<?php echo ($bgdt["nickname"]); ?>">
                                <?php echo (subtext($bgdt["nickname"],8)); ?>
                               </h4>
                               <p>被曝平台：<span title='<?php echo ($bgdt["company_name"]); ?>'>
                                <?php if($bgdt["auth_level"] == '006001' ): ?><a target='_blank' href="/yms/index.php/Home/Query/query_hpt/resid/<?php echo ($bgdt["company_id"]); ?>/p/1"><?php echo (subtext($bgdt["company_name"],13)); ?></a>
                                <?php else: ?>
                                <a target='_blank' href="/yms/index.php/Home/Query/query_wrz/resid/<?php echo ($bgdt["company_id"]); ?>/p/1"><?php echo (subtext($bgdt["company_name"],13)); ?></a><?php endif; ?>
                               </span></p>
                           </div>
                           <div class="neirong">
                                <em class="em1"></em><p title="<?php echo ($bgdt["content"]); ?>"><?php echo (subtext($bgdt["content"],55)); ?><em class="em2"></em></p>
                           </div>
                         </dd>
                      </dl>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?> 
                </div>
                <?php if($record_count_ex > 10): ?><div id="btn-more">
                  <input type='button' name='btn' id='btn' value='查看更多'>
                </div><?php endif; ?>
              </div> 
           </div>
           <div class="centbox_rt">
             <ul class="zuiduo">
               <li class="zuiduoa"><a target='_blank' href="/yms/index.php/<?php echo ($pl_url); ?>"><img src="/yms/Public/Home/images/btn10.png"/></a></li>
               <li class="zuiduob"><a target='_blank' href="/yms/index.php/Home/Query/query_hpt/resid/<?php echo ($bg_max); ?>/p/1#basic_setting"><img src="/yms/Public/Home/images/btn11.png"/></a></li>
               <li class="zuiduoc"><a target='_blank' href="/yms/index.php/Home/Query/query_hpt/resid/<?php echo ($jh_max); ?>/p/1"><img src="/yms/Public/Home/images/btn12.png"/></a></li>
             </ul>
             <div class="jgous">
               <h3>查询动态</h3>
                   <div id="demo">
                    <ol>
                    <?php if(is_array($cx_list)): $i = 0; $__LIST__ = $cx_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cx_list): $mod = ($i % 2 );++$i;?><li>
                        <p><span><?php echo (date("H:i:s",$cx_list["add_time"])); ?></span><?php echo ($cx_list["nickname"]); ?></p>
                        <p>查询了<a class="cx" id="<?php echo ($cx_list["keyword"]); ?>" href="javascript:void(0)" title="<?php echo ($cx_list["keyword"]); ?>"><?php echo (subtext($cx_list["keyword"],15)); ?></a></p>
                      </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ol>
                </div>
               <h3>监管机构<span>正规来自有效合法的监管</span></h3>
               <ul class="jgjg">
                 <li><a target='_blank'><img src="/yms/Public/Home/images/lg01.jpg" /></a></li>
                 <li><a target='_blank'><img src="/yms/Public/Home/images/lg02.jpg" /></a></li>
                 <li><a target='_blank'><img src="/yms/Public/Home/images/lg03.jpg" /></a></li>
                 <li><a target='_blank'><img src="/yms/Public/Home/images/lg04.jpg" /></a></li>
                 <li><a target='_blank'><img src="/yms/Public/Home/images/lg09.jpg" /></a></li>
                 <li><a target='_blank'><img src="/yms/Public/Home/images/lg10.jpg" /></a></li>
                 <li><a target='_blank'><img src="/yms/Public/Home/images/lg11.jpg" /></a></li>
                 <li><a target='_blank'><img src="/yms/Public/Home/images/lg12.jpg" /></a></li>
               </ul>
               <h3>支持机构</h3>
               <ul class="jgjg">
                 <!-- <li><a href="http://www.cngold.com.cn" target='_blank'><img src="/yms/Public/Home/images/lg05.jpg"/></a></li> -->
                 <li><a href="http://www.fx678.com" target='_blank'><img src="/yms/Public/Home/images/lg06.jpg"/></a></li>
                 <li><a href="http://www.eastmoney.com" target='_blank'><img src="/yms/Public/Home/images/lg07.jpg"/></a></li>
                 <li><a href="http://www.xinhuanet.com" target='_blank'><img src="/yms/Public/Home/images/lg08.jpg"/></a></li>
                </ul>
             </div>
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
</body>
<script type="text/javascript">
  function ValidateFile(){ 
      var checkbox_ok = document.getElementById("search_name_ex").value;
      var userid      = '<?php echo ($userid); ?>'; 
      if(checkbox_ok == "请输入公司名称、平台名称或网址" 
         || checkbox_ok == ""){ 
          $('#tishi').text("请输入搜索内容！");
          $(".bd_wd").css("width", $(document).width());
          $(".bd_wd").css("height", $(document).height());
          $(".bd_wd").show();
          $(".yzsbai").show();
          return false;
      }
      if (userid == "") {
      	  //alert('请登录后搜索！');
      	  $(".bd_wd").css("width", $(document).width());
          $(".bd_wd").css("height", $(document).height());
          $(".bd_wd").show();
          $("#tcwindows1").show();
      	  return false;
      }
  }
  $(function(){
      var news = "<?php echo ($news); ?>";
      var p=2;// 初始化页面，点击事件从第二页开始
      var flag=false;
      $("input[name=btn]").click(function(){
          //初始状态，如果没数据return ,false;否则
          if($("#content_ex .room_show_item").size()<=0){
            return false;
          }else{
            send();
          }
      })
      function send(){
          if(flag){
            return false;
          }
          $.ajax({
              type:'post',
              url:"<?php echo U('Index/send');?>",
              data:{k:p},
              beforeSend:function(){
                   $("#content_ex").append("<div id='load'>加载中……</div>");
              },
              success:function(data){
                if(data!=null){
                  $.each(data,function(i){
                    var picContent = "<div class='room_show_item'><dl>";
                        if (data[i]['add_time'] > news) {
                        picContent += "<dt>"+data[i]['add_time_ex']+"</dt>";
                        }else{
                        picContent += "<dt>"+data[i]['add_time_exx']+"</dt>";
                        }
                        picContent += "<dd><div class='txt'><h4 title="+data[i]['nickname']+">"+data[i]['nickname_ex']+"</h4>";
                        picContent += "<p>被曝平台：<span title='"+data[i]['company_name']+"'>";
                        if (data[i]['auth_level'] == '006001') {
                        picContent += "<a target='_blank' href='/yms/index.php/Home/Query/query_hpt/resid/"+data[i]['company_id']+"/p/1'>"+data[i]['company_name_ex']+"</a>"; 
                        }else{
                        picContent += "<a target='_blank' href='/yms/index.php/Home/Query/query_wrz/resid/"+data[i]['company_id']+"/p/1'>"+data[i]['company_name_ex']+"</a>";
                        }
                        picContent += "</span></p></div><div class='neirong'><em class='em1'></em><p title='"+data[i]['content']+"'>"+data[i]['content_ex']+"<em class='em2'></em></p></div></dd></dl></div>";
                    $("#content_ex").append(picContent);
                  })
                }else{
                    $("input[name=btn]").val('已无更多数据');
                    flag=true;  
                }
              },
              complete:function(){
                     $("#load").remove();
              },
              dataType:'json'});
            p++;
      }
  })
</script>
<script type="text/javascript">
  //搜索
      $('.cx').click(function(){
          var cx   = $(this).attr('id');
          var usaa = '<?php echo ($userid); ?>';
          if (usaa == "") {
              $(".bd_wd").css("width", $(document).width());
              $(".bd_wd").css("height", $(document).height());
              $(".bd_wd").show();
              $("#tcwindows1").show();
              return false;
          }
          $.ajax({  
              type:"post",  
              url:"/yms/index.php/Home/Index/search_ex",
              timeout: 5000,  
              dataType:"json", 
              contentType: "application/x-www-form-urlencoded; charset=utf-8",
              data:{
                  search_name:cx,
                  usaa:usaa
              },
              success: function aa(data) {
                if(data != 0){
                  if (data[0].auth_level == '006001') {
                    window.location.href="/yms/index.php/Home/Query/query_hpt/resid/"+data[0].id+"/p/1";
                    return false;
                  }else if(data[0].auth_level == '006002'){
                    window.location.href="/yms/index.php/Home/Query/query_wrz/resid/"+data[0].id+"/p/1";
                    return false;
                  }else if(data[0].auth_level == '006003'){
                    window.location.href="/yms/index.php/Home/Query/query_yrz/resid/"+data[0].id+"/p/1";
                    return false;
                  }
                }else{
                  window.location.href="/yms/index.php/Home/Query/query_wsl/wsl/"+cx+"";
                  return false;
                }
              }  
          })   
      })
</script> 
</html>