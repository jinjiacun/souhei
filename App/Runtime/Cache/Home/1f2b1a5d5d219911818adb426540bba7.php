<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜黑平台查询_全国最大的查询曝光平台_搜黑</title>
<meta name="keywords" content="搜黑,黑平台,黑幕曝光平台"/>
<meta name="description" content="搜黑,全国性的交易市场曝光平台，携手每一位投资人共同揭开交易市场的层层黑幕，为投资者甄选安全可靠的交易平台，营造国内绿色透明的交易环境。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/lightbox.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/js/Validform_v5.3.2.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/lightbox.js" ></script>
<style type="text/css">
	a.num{
		margin-left: 5px;
		cursor:pointer;
	}
	span.current{
		margin-left: 5px;
		color: #3dafea;
	}
	a.num :hover{
		color: #3dafea;
	}
	.wysyij a.jp-current{
		color: #3dafea;
	}
	.wysyij a.jp-next:hover{
		color: #3dafea;
	}
	.undefined{display: none;}
  .bdshare-button-style0-16:after{display: inline-block !important;  zoom:1; *display: inline;}
</style>
</head>

<body>
<!--成功-->  
<div class="yzsbai1">
    <p id="tishi1"></p>
    <input name="" type="button" value="确 定" class="xigs1" />
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
     <div class="hptbox1 yrzbox1">
       <div class="dibubj">
              <h2><span><?php echo ($yrz_list["company_name"]); ?></span>的查询结果：</h2>
              <div class="hpt_box">
                  <dl>
                      <dt><img src="/yms/Public/Home/images/pic18.jpg" /></dt>
                      <dd>
                          <p class="wsr1">公司资料已通过合规认证</p>
                          <p class="wsr2">经监管机构核实，公司资料完整可信！</p>
                      </dd>
                  </dl>
             </div>
        </div>
     </div>
     <div class="hptbox2 yrzbox2">
        <dl>
        	<dt>
        	<?php if($yrz_list["logo_url"] != '' ): ?><img src="<?php echo ($yrz_list["logo_url"]); ?>" /><?php endif; ?>
        	</dt>
            <dd>
            	<h3><a><?php echo ($yrz_list["company_name"]); ?></a></h3>
                <p><span>其他名称</span>
                <?php if(is_array($bm_list)): $i = 0; $__LIST__ = $bm_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a><?php echo ($vo["name"]); ?></a><a <?php if($i == count($bm_list)): ?>class="last"<?php endif; ?>> 、</a><?php endforeach; endif; else: echo "" ;endif; ?>
                </p>
            </dd>
        </dl>
        <div class="gongsijs">
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="76"><span>代理平台</span></td>
                <td width="320">
                <?php if($yrz_list["agent_platform_n"] != '' ): ?><a style="color: #183e60;" href="/yms/index.php/Home/<?php echo ($rzjb_url); ?>" target="_blank"><em><?php echo ($yrz_list["agent_platform_n"]); ?></em></a>
                <?php else: ?>
                数据正在整理...<?php endif; ?>
                </td>
                <td width="76"><span>会员编号</span></td>
                <td width="230">
                <?php if($yrz_list["mem_sn"] != '' ): ?><em><?php echo ($yrz_list["mem_sn"]); ?></em>
                <?php else: ?>
                数据正在整理...<?php endif; ?>
                </td>
                <td width="76"><span>监管机构</span></td>
                <td>
                <?php if($yrz_list["regulators_id_n"] != '' ): echo ($yrz_list["regulators_id_n"]); ?>
                <?php else: ?>
                数据正在整理...<?php endif; ?>
                </td>
         </tr>
              <tr>
                <td><span>营业执照</span></td>
                <td>
	              <?php if($yrz_list["busin_license"] > 0 ): ?><img src="/yms/Public/Home/images/pic20b.jpg" width="44" height="42"/>
		            <?php else: ?>
		              <img src="/yms/Public/Home/images/pic20a.jpg" width="44" height="42"/><?php endif; ?>
                </td>
                <td><span>机构代码证</span></td>
                <td>
	              <?php if($yrz_list["code_certificate"] > 0 ): ?><img src="/yms/Public/Home/images/pic20b.jpg" width="44" height="42"/>
		            <?php else: ?>
		              <img src="/yms/Public/Home/images/pic20a.jpg" width="44" height="42"/><?php endif; ?>
		        </td>
                <td><span>资质证明</span></td>
                <td>
                <?php if($yrz_list["certificate"] > 0 ): ?><img src="/yms/Public/Home/images/pic20b.jpg" width="44" height="42"/>
		            <?php else: ?>
		              <img src="/yms/Public/Home/images/pic20a.jpg" width="44" height="42"/><?php endif; ?>
                </td>
              </tr>
              <tr>
         </tr>
              <tr>
                <td><span>联系电话</span></td>
                <td>
                <?php if($yrz_list["telephone"] != '' ): echo ($yrz_list["telephone"]); ?>
                <?php else: ?>
                数据正在整理...<?php endif; ?>
                </td>
                <td><span>官方网站</span></td>
                <td>
                <?php if($yrz_list["website"] != '' ): ?><a href="<?php echo ($yrz_list["website"]); ?>" target="_blank"><?php echo ($yrz_list["website"]); ?></a>
                <?php else: ?>
                数据正在整理...<?php endif; ?>
                </td>
                <td><span>官网备案</span></td>
                <td>
                <?php if($yrz_list["record"] != '' ): echo ($yrz_list["record"]); ?>
                <?php else: ?>
                数据正在整理...<?php endif; ?>
                </td>
              </tr>
              <tr>
                <td><span>联系地址</span></td>
                <td colspan="5">
                <?php if($yrz_list["reg_address"] != '' ): echo ($yrz_list["reg_address"]); ?>
                <?php else: ?>
                数据正在整理...<?php endif; ?>
                </td>
              </tr>
       </table>
        </div>
     </div>
     <div class="wybgbox_lt">
       <div class="mtbaod">
             <?php if($record_count_n > 0 ): ?><h3 class="titltes"><span>媒体报道</span>
                <?php if($record_count_n > 5 ): ?><a class="hyh" href="javascript:void(0)">换一换</a><?php endif; ?>
             </h3><?php endif; ?>
          <?php if($record_count_n > 2 ): ?><ul id="yhy_ul">
              <?php if(is_array($new_list)): $i = 0; $__LIST__ = $new_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new_list): $mod = ($i % 2 );++$i;?><li>
                  <a href="/yms/index.php/Home/Article/article/id/<?php echo ($new_list["id"]); ?>/company_id/<?php echo ($new_list["company_id"]); ?>/p/1/"><?php echo ($new_list["title"]); ?></a>
                  <span><?php echo (date('Y-m-d H:i',$new_list["add_time"])); ?></span>
               </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
          <?php else: ?>
          <?php if(is_array($new_list)): $i = 0; $__LIST__ = $new_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new_list): $mod = ($i % 2 );++$i;?><dl>
                <dt><a href="/yms/index.php/Home/Article/article/id/<?php echo ($new_list["id"]); ?>/company_id/<?php echo ($new_list["company_id"]); ?>/p/1/"><img src="<?php echo ($new_list["pic_url"]); ?>" width="175" height="130" /></a></dt>
                <dd>
                  <h4><a href="/yms/index.php/Home/Article/article/id/<?php echo ($new_list["id"]); ?>/company_id/<?php echo ($new_list["company_id"]); ?>/p/1/"><?php echo ($new_list["title"]); ?></a></h4>
                    <div class="new_list"><?php echo (subtext($new_list["content"],110)); ?></div>
                    <span><?php echo (date('Y-m-d H:i',$new_list["add_time"])); ?></span>
                </dd>
          </dl><?php endforeach; endif; else: echo "" ;endif; endif; ?>
       </div> 
       <div class="baoguan_pl">
            <h3 class="titltes">
	            <span>网友评论
	            <?php if($record_count < 999 ): ?><em>(<?php echo ($record_count); ?>)</em>
	            <?php else: ?>
	            <em>(999+)</em><?php endif; ?>
	            </span>
	        </h3>
            <div class="baoguan_pl2">
                <?php if(is_array($con_yrz)): $mm = 0; $__LIST__ = $con_yrz;if( count($__LIST__)==0 ) : echo "还没有人评论过此公司哦，赶紧去吐槽吧！" ;else: foreach($__LIST__ as $key=>$con_yrz): $mod = ($mm % 2 );++$mm;?><dl class="pinglubox">
                     <dt class="pinglubox_lt"><a><img src="<?php echo ($con_yrz["user_id"]); ?>" /></a></dt>
                     <dd class="pinglubox_rt">
                     	<?php if($con_yrz["is_anonymous"] == 0 ): ?><h3><?php echo ($con_yrz["nickname"]); ?></h3>
                        <?php else: ?>
                         <h3><?php echo ($con_yrz["suiji"]); ?></h3><?php endif; ?>
                       <p class="pinglubox_xs">
                        <?php if($con_yrz["type"] == '005001'): ?><em class="dinzan1"></em>
                        <?php elseif($con_yrz["type"] == '005002'): ?>
                          <em class="jiahei"></em>
                        <?php else: ?>
                          <em class="tiwen"></em><?php endif; ?>
                           <span><?php echo ($con_yrz["content"]); ?></span>
                       </p>
                       <div class="tubox">
                            <?php if($con_yrz["pic_1"] != ''): ?><a href="<?php echo ($con_yrz["pic_1_url"]); ?>" rel="lightbox[plants]"><img src="<?php echo ($con_yrz["pic_1_url"]); ?>"/></a><?php endif; ?>
                            <?php if($con_yrz["pic_2_url"] != ''): ?><a href="<?php echo ($con_yrz["pic_2_url"]); ?>" rel="lightbox[plants]"><img src="<?php echo ($con_yrz["pic_2_url"]); ?>"/></a><?php endif; ?>
                            <?php if($con_yrz["pic_3_url"] != ''): ?><a href="<?php echo ($con_yrz["pic_3_url"]); ?>" rel="lightbox[plants]"><img src="<?php echo ($con_yrz["pic_3_url"]); ?>"/></a><?php endif; ?>
                            <?php if($con_yrz["pic_4_url"] != ''): ?><a href="<?php echo ($con_yrz["pic_4_url"]); ?>" rel="lightbox[plants]"><img src="<?php echo ($con_yrz["pic_4_url"]); ?>"/></a><?php endif; ?>
                            <?php if($con_yrz["pic_5_url"] != ''): ?><a href="<?php echo ($con_yrz["pic_5_url"]); ?>" rel="lightbox[plants]"><img src="<?php echo ($con_yrz["pic_5_url"]); ?>"/></a><?php endif; ?>
                        </div>
                           <div class="hfpl_chd">
                             <div class="timens">
                                <span><?php echo ($con_yrz["add_time"]); ?></span>
                                <p>
                                <span class="bdsharebuttonbox">
                                  <a href="#" class="bds_more" data-cmd="more">分享</a>
                                </span>|
                                <a class="ding" id="<?php echo ($con_yrz["id"]); ?>" rel="<?php echo ($con_yrz["id"]); ?>" href="javascript:void(0)">顶 <em>(<?php echo ($con_yrz["top_num"]); ?>)</em></a>|
                            	<input type="hidden" class="hidd_company" value="<?php echo ($con_yrz["company_id"]); ?>">
		                        <script>
		                              window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
		                        </script>
                                <?php if($con_yrz['re_sub']['record_count'] > 0): ?><a class="huifu_btn hfusd" href="javascript:void(0)">收起回复</a>
                                <em class="emem1">(<?php echo ($con_yrz['re_sub']['record_count']); ?>)</em>
                                <?php else: ?>
                                <a class="huifu_btn" href="javascript:void(0)">回复</a>
                                <em class="emem">(<?php echo ($con_yrz['re_sub']['record_count']); ?>)</em><?php endif; ?>
                               </p>
                                <input type="hidden" class="p3" name="p3" value="<?php echo ($con_yrz["company_id"]); ?>">   
                             </div>
                             <?php if($con_yrz['re_sub']['record_count'] > 0): ?><div class="showhide" style="display:block">
                             <?php else: ?>
                             <div class="showhide" style="display:none"><?php endif; ?>
                             	<div id="itemContainer_<?php echo ($con_yrz["id"]); ?>"></div>
	                            <div class="wysyij">
	                           		<div class="pages" id="pages_<?php echo ($con_yrz["id"]); ?>" rel="<?php echo ($con_yrz["id"]); ?>"></div>
	                           		<a href="javascript:void(0)" class="wzsyiju">我也说一句</a>
	                            </div>
	                            <div class="fanbiaob">
	                                <textarea name="saytext" id="saytext<?php echo ($mm); ?>" class="saytext" autocomplete="off"></textarea>
	                            <div class="tisbox">
	                                <input class="fb" name="" type="button" value="发表" id="<?php echo ($con_yrz["id"]); ?>" />
	                                <a data-id="<?php echo ($mm); ?>" href="javascript:void(0)"  class="touxin emotion">&nbsp;</a>
                                    <input type="hidden" class="p3" name="p3" value="<?php echo ($con_yrz["company_id"]); ?>">  
	                            </div>
	                           </div>
	                        </div>
                           </div>
                     </dd>
                 </dl><?php endforeach; endif; else: echo "还没有人评论过此公司哦，赶紧去吐槽吧！" ;endif; ?>
		          <ul class="page" >
		          	   <li><?php echo ($page); ?></li>
		          </ul>
            </div>
       </div>
     </div>
     <div class="textbox_rt">
      <div  id="fixeds">
       <div class="rzpttj">
       <h3 class="titltes">我要评论</h3>
       <form id="theForm" name="theForm" method="post" enctype="multipart/form-data" onsubmit="return ValidateFile()">
         <p class="wypl_wypl1">
	         <span><input class="wypl" name="wypl" type="radio" value="005001" checked="checked" />点赞</span>
	         <!-- <span><input class="wypl" name="wypl" type="radio" value="005002" />提问</span> -->
	         <span><input class="wypl" name="wypl" type="radio" value="005003" />加黑</span>
         </p>
         <p class="wypl_wypl2">
            <textarea name="saytext" id="saytext0" class="saytext" autocomplete="off"></textarea>
         </p>
	         <p class="wypl_wypl3">
	         <a data-id="0" href="javascript:void(0)"  class="touxin emotion">&nbsp;</a>
	         <a href="javascript:void(0)" class="tupian">&nbsp;</a>
	         <span><input name="is_anonymous" id="checkbox-id" type="checkbox" value="1" />匿名评论</span>
         </p>
         <div class="filebox">
            <ul>
               <li><input name="N" id="N" type="file" autocomplete="off" /><a>删除</a></li> 
               <li style="display:none" > <input name="N1" id="N1" type="file" autocomplete="off"/><a>删除</a></li>
               <li style="display:none" ><input name="N2" id="N2" type="file" autocomplete="off" /><a>删除</a></li>
               <li style="display:none" ><input name="N3" id="N3" type="file" autocomplete="off" /><a>删除</a></li>
               <li style="display:none" ><input name="N4" id="N4" type="file" autocomplete="off" /><a>删除</a></li>  
           </ul>
         </div>
         <p class="wypl_wypl5">
           <img id="verifyImg" class="verify" name="verify" src="/yms/index.php/Home/Query/verify_c" title="点击刷新" onclick="this.src=this.src+'?'" />
           <input name="verify" id="verify" type="text" autocomplete="off" />
           <span style="display:none;" id="verify_ex" class="Validform_checktip">请输入验证码</span>
         </p>
         <p class="wypl_wypl4">
         	 <input name="submit" type="submit" value="发表评论" class="sub_btn" />
         	 <input type="hidden" id="hidden_id" name="company_id" value="<?php echo ($yrz_list["id"]); ?>">  
         </p>
         </form>
       </div>
       <div class="hgrzs wybg_a"><a href="/yms/index.php/home/Inexposure/authentication">合规认证</a></div>
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
<script type="text/javascript" src="/yms/Public/Home/js/jquery.qqFace.js" ></script>
<script type="text/javascript">
function ValidateFile() {
     var content = document.getElementById("saytext0").value;
     var tmp1 = document.getElementById("N").value; 
     var tmp2 = document.getElementById("N1").value;
     var tmp3 = document.getElementById("N2").value;
     var tmp4 = document.getElementById("N3").value;
     var tmp5 = document.getElementById("N4").value;
     var verify = document.getElementById("verify").value;
     var verify_ex = document.getElementById("verify_ex").innerHTML;
     var userid = '<?php echo ($userid); ?>';
     if (content == "") {
        $('#tishi').text("评论内容不能为空！");
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $(".yzsbai").show();
        return false;
     }else if(content.length > 400){
        $('#tishi').text("评论内容最多为400字符");
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $(".yzsbai").show();
        return false;
     }
     if (userid == "") {
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $("#tcwindows1").show();
        return false;
     } 
     if (verify == "") {
        $(".wypl_wypl5").show();
        if(verify == "" && verify_ex == '验证码不能为空'){
          $('#tishi').text("请输入验证码！");
          $(".bd_wd").css("width", $(document).width());
          $(".bd_wd").css("height", $(document).height());
          $(".bd_wd").show();
          $(".yzsbai").show();          
          return false;
        } 
        return false;
      }
     if(tmp1 != ""){
      if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp1)){
        $('#tishi').text("图片类型必须是.gif,jpeg,jpg,png中的一种！");
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $(".yzsbai").show();
        
        return false;
      }
    }
    if(tmp2 != ""){
      if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp2)){
        $('#tishi').text("图片类型必须是.gif,jpeg,jpg,png中的一种！");
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $(".yzsbai").show();
        
      }
    }
    if(tmp3 != ""){
      if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp3)){
        $('#tishi').text("图片类型必须是.gif,jpeg,jpg,png中的一种！");
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $(".yzsbai").show();
        return false;
      }
    }
    if(tmp4 != ""){
      if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp4)){
        $('#tishi').text("图片类型必须是.gif,jpeg,jpg,png中的一种！");
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $(".yzsbai").show();
        return false;
      }
    }
    if(tmp5 != ""){
      if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp5)){
        $('#tishi').text("图片类型必须是.gif,jpeg,jpg,png中的一种！");
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $(".yzsbai").show();
        return false;
      }
    } 
    //表单提交
    var fd = new FormData(document.getElementById("theForm"));
    fd.append("content", content);
    $.ajax({
      url: "/yms/index.php/Home/Query/comment_add",
      type: "POST",
      data: fd,
      enctype: 'multipart/form-data',
      processData: false,  // tell jQuery not to process the data
      contentType: false   // tell jQuery not to set contentType
    }).done(function( data ) {
      if (data) {
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        if (data == 0) {
          $('#tishi1').text("评论成功！");
          $(".yzsbai1").show();
          return false;
        }else if(data == -1){
          $('#tishi').text("评论失败！");
          $(".yzsbai").show();
          $('#verifyImg').click();
          $('#verify').val("");
          return false;
        }else if(data == 1){
          $('#tishi').text("图片上传失败！");
          $(".yzsbai").show();
          $('#verifyImg').click();
          $('#verify').val("");
          return false;
        }else if(data == 2){
          $('#tishi').text("没有文件上传！");
          $(".yzsbai").show();
          $('#verifyImg').click();
          $('#verify').val("");
          return false;
        }else if(data == 3){
          $('#tishi').text("文件上传错误！");
          $(".yzsbai").show();
          $('#verifyImg').click();
          $('#verify').val("");
          return false;
        }else if(data == 4){
          $('#tishi').text("上传文件不能大于350kb！");
          $(".yzsbai").show();
          $('#verifyImg').click();
          $('#verify').val("");
          return false;
        }else if(data == 5){
          $('#tishi').text("图片格式错误！");
          $(".yzsbai").show();
          $('#verifyImg').click();
          $('#verify').val("");
          return false;
        }else if(data == 6){
          $('#tishi').text("评论内容不能为空");
          $(".yzsbai").show();
          return false;
        }else if(data == 7){
          $('#tishi').text("验证码错误！");
          $(".yzsbai").show();
          return false;
        }

      }
    });
    return false;     
}
  $(function(){
	    //回复表情
	    $('.emotion').qqFace({
	        id : 'facebox', 
	        assign:'saytext', 
	        path:'/yms/Public/Home/arclist/' //表情存放的路径
	    });
        //评论回复
        $('.fb').click(function(){
	            var id        = $(this).attr('id');//获取企业id属性
	            var type      = '005001';
              var content_ex= $(this).parents('.fanbiaob').find('.saytext').val();
              var content   = urlencode(content_ex);
              var companyid = $(this).parents('.fanbiaob').find('.p3').val();
	            var userid    = '<?php echo ($userid); ?>';
	            if (content_ex == "") {
                $('#tishi').text("评论内容不能为空");
                $(".bd_wd").css("width", $(document).width());
                $(".bd_wd").css("height", $(document).height());
                $(".bd_wd").show();
                $(".yzsbai").show();
                return false;
	            }else if(content_ex.length > 400){
                $('#tishi').text("评论内容最多为400字符");
                $(".bd_wd").css("width", $(document).width());
                $(".bd_wd").css("height", $(document).height());
                $(".bd_wd").show();
                $(".yzsbai").show();
                return false;
	            }
	            if (userid == "") {
	                $(".bd_wd").css("width", $(document).width());
                  $(".bd_wd").css("height", $(document).height());
                  $(".bd_wd").show();
                  $("#tcwindows1").show();
                  return false; 
	            }
	            jQuery.ajax({  
	                type:"post",  
	                url:"<?php echo ($call_url); ?>",
	                timeout: 5000,  
	                dataType:"json",  
	                data:{"method":"Comment.add","type":"text",
	                "content":{"company_id":companyid,
				               "user_id":userid,
				               "type":type,
				               "content":content,
				               "parent_id":id}},
	                success: function aa(data) {  
	                     if (200 == data.status_code && 0 == data.content.is_success) {
                            $('#tishi1').text("评论成功！");
                            $(".bd_wd").css("width", $(document).width());
                            $(".bd_wd").css("height", $(document).height());
                            $(".bd_wd").show();
                            $(".yzsbai1").show();
                            return false;
	                     }else{
	                          $('#tishi').text("评论失败！");
                            $(".bd_wd").css("width", $(document).width());
                            $(".bd_wd").css("height", $(document).height());
                            $(".bd_wd").show();
                            $(".yzsbai").show();
                            return false;
	                     }
	                }  
	            })  
	    });
        //评论顶
        $('.ding').click(function(){
	            var id        = $(this).attr('id');//获取企业id属性
              var companyid = $(this).parents('.timens').find('.p3').val();
	            var userid    = '<?php echo ($userid); ?>';
	            if (userid == "") {
	                $(".bd_wd").css("width", $(document).width());
                  $(".bd_wd").css("height", $(document).height());
                  $(".bd_wd").show();
                  $("#tcwindows1").show();
                  return false;
	            }
	            jQuery.ajax({  
	                type:"post",  
	                url:"<?php echo ($call_url); ?>",
	                timeout: 5000,  
	                dataType:"json",  
	                data:{"method":"Comtop.add","type":"text",
	                "content":{"company_id":companyid,
				               "user_id":userid,
				               "comment_id":id}},
	                success: function aa(data) {  
	                     if (200 == data.status_code && 0 == data.content.is_success) {
	                          //alert('顶+1');//模拟异步数据加1
	                          window.location.reload();  
                            return false;
	                     }else{
                          $('#tishi').text("明天再来吧！");
                          $(".bd_wd").css("width", $(document).width());
                          $(".bd_wd").css("height", $(document).height());
                          $(".bd_wd").show();
                          $(".yzsbai").show();
                          return false;
	                     }
	                }  
	            })  
	    });
      //回复获取用户名
      $('.huifu').live('click',function(){
      	var nickname = $(this).attr('id');//获取企业id属性
        var gd       = " 回复 ";
        $(this).parents(".showhide").find('.fanbiaob').show();
        $(this).parents(".showhide").find('.saytext').val(gd+nickname+'：');
		  })
		  //我也说一句
      $('.wzsyiju').click(function(){
        if($(this).parents(".showhide").find('.fanbiaob').css('display') == 'none'){       
          $(this).parents(".showhide").find('textarea').select();
          $(this).parents(".showhide").find('textarea').val("");
          $(this).parents(".showhide").find('.fanbiaob').show();  
        }else{ 
          $(this).parents(".showhide").find('.fanbiaob').hide();
        }
      });
  });
  //urlencode数据转换
	function urlencode (str) {  
	    str = (str + '').toString();   
	    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').  
	    replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+');  
	}       
</script>
<!--评论回复动态加载-->
<script type="text/javascript">
///回复
    $(function (){
	    var dings=[];
		$(".ding").each(function(){
			dings.push($(this).attr('rel'));
		})
		var ids=$(".hidd_company").val();
	    for (var i = 0; i < dings.length; i++) {
	    	var id=dings[i];
    		var url="/yms/index.php/Home/Query/query_yrz_hf/parent_id/"+id+"/uId/"+ids;
    		getDate(url,id);
	    };
	    
	    //pages
	    $('.pages a').live('click',function(){
			var parentId = $(this).parents('.pages').attr('rel');
	        var href=$(this).attr("href");
	        getDate(href,parentId);
			return false;
		});
    });

    //ajax
       function getDate(url,ids){
        $.ajax({
          type: 'GET',
          url: url,
          dataType: 'json',
          contentType: "application/x-www-form-urlencoded; charset=utf-8",
          //data: {'pages':1},
          beforeSend: function () {              
          },
          success: function (data) {
          	if(data){
            $("#itemContainer_"+ids).empty();
            $("#pages_"+ids).empty();
            var lis="";
            var lists=data;
            $.each(lists,function (index,array){
               lis +='<dl class="'+array['id']+'"><dt><a href="#"><img src="'+array['user_id']+'" /></a></dt><dd><p><a href="#">'+array['nickname']+'：</a>'+array['content']+'</p><p class="timen"><span>'+array['add_time']+'</span><a class="huifu" id="'+array['nickname']+'" href="javascript:void(0)">回复</a></dd></dl>';
            });
             $("#itemContainer_"+ids).append(lis);
             $("#pages_"+ids).append(data.pages);
          }},
          complete: function () {
          },
          error: function () {
            alert("数据加载中......")
          }
        });
      }
</script>
<script type="text/javascript">
/**************新闻换一换*****************/
$(function(){
      var p=2;// 初始化页面，点击事件从第二页开始
      var companyid = '<?php echo ($yrz_list["id"]); ?>';
      var sign = 0;
      var flag=false;
      $(".hyh").click(function(){
          //初始状态，如果没数据return ,false;否则
          if($("#yhy_ul li").size()<5){
            window.location.reload(); 
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
              url:"/yms/index.php/Home/Query/news_hyh",
              dataType:"json", 
              contentType: "application/x-www-form-urlencoded; charset=utf-8",
              data:{
                k:p,
                comment_id:companyid,
                sign:sign},
              beforeSend:function(){
                   $("#yhy_ul").append("<div id='load'></div>");
              },
              success:function(data){
                $("#yhy_ul").empty();
                if(data!=null){
                  $.each(data,function(i){
                    $("#yhy_ul").append("<li><a href='/yms/index.php/Home/Article/article/id/"+data[i]['id']+"/company_id/"+data[i]['company_id']+"/p/1/'>"+data[i]['title']+"</a><span>"+data[i]['add_time']+"</span></li>");
                  })
                }else{
                    $(".hyh").val('已无更多数据');
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
</html>