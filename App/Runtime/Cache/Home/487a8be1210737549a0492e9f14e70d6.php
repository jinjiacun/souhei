<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心--搜黑</title>
<meta name="keywords" content="搜黑，黑平台查询，黑平台曝光，贵金属黑平台，外汇黑平台"/>
<meta name="description" content="搜黑是全国性的交易市场曝光平台,携手每一位投资人共同揭开交易市场的层层黑幕,为您提供全方位的贵金属、外汇、黄金、石油等行业交易黑幕的查询、曝光。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
<style type="text/css">
  .sr{color: red;font-size: 13px;width: 30px;}
  .shc{width: 190px; margin-top: 10px;}
  .shc .a1{ width: 145px;}
  .shc .a2{float: right; margin-right: 5px;}

</style>
</head>

<body>
<div class="bd_wd"></div> 
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
<div class="tcwindows_xgdlmm">
   <div class="close_xgdlmm"><a href="javascript:void(0)">关闭</a></div>
   <dl><dt>原登陆密码：</dt><dd><input name="old_pswd" type="password"  class="gr_txt old_pswd" /></dd></dl>
   <dl><dt>新登陆密码：</dt><dd><input name="new_pswd" type="password"  class="gr_txt new_pswd" /></dd></dl>
   <dl><dt>新登陆密码确认：</dt><dd><input name="new_pswd_ex" type="password"  class="gr_txt new_pswd_ex" /></dd></dl>

   <dl><dt>&nbsp;</dt><dd><input name="but1" type="button" value="确认修改" class="xigs but1" /></dd></dl>

</div>
<div class="tcwindows_grzx">
<?php if(is_array($us_list)): $i = 0; $__LIST__ = $us_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
     <dt>用户昵称：</dt>
     <dd><input name="nickname" type="text" class="gr_txt1 gr_txt" value="<?php echo ($vo["UI_NickName"]); ?>" /></dd>
  </dl>
  <dl>
    <dt>性别：</dt>
    <dd>
        <input name="sex" type="radio" id="checkbox-id" value="1" class="xinbie" <?php if($vo["UI_Sex"] == 1 ): ?>checked="checked"<?php endif; ?> />男&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="sex" type="radio" id="checkbox-id" value="0"  class="xinbie" <?php if($vo["UI_Sex"] == 0 ): ?>checked="checked"<?php endif; ?>/>女
        <input name="sex" type="radio" id="checkbox-id" value="-1"  class="xinbie" <?php if($vo["UI_Sex"] == -1 ): ?>checked="checked"<?php endif; ?>/>未知
    </dd>
  </dl>
  <dl>
    <dt>绑定手机：</dt>
    <dd><?php echo ($vo["UI_LoginNames"]); ?></dd>
  </dl>
  <dl>
    <dt>生日：</dt>
    <dd><input type="text" name="birthday" class="gr_txt2 gr_txt" value="<?php echo ($vo["UI_BirthDay"]); ?>"><br>
    <em class="sr">生日格式：1900-01-01</em>
    </dd>
  </dl>
  <dl>
    <dt>职业：</dt>
    <dd><input name="job" type="text" class="gr_txt3 gr_txt"  value="<?php echo ($vo["UI_Job"]); ?>" /></dd>
  </dl>
  <dl>
    <dt>所在地：</dt>
    <dd><input type="text" name="address" class="gr_txt4 gr_txt" value="<?php echo ($vo["UI_Address"]); ?>"></dd>
  </dl>
  <dl>
    <dt>&nbsp;</dt>
    <dd>
      <input name="button" type="button" id="<?php echo ($vo["UI_Id"]); ?>" value="修 改" class="xigs but2" />
      <a href="javascript:void(0)" class="qvxiao">取 消</a>
    </dd>
  </dl><?php endforeach; endif; else: echo "" ;endif; ?>
</div>



<div id="wrap">

<!--头部--Begin-->   
  <div class="header_zc">
    <div class="header_box">
      <div class="zhuce_logo">
        <a href="/yms/index.php/Home/Index/index" class="zhuce1"><img src="/yms/Public/Home/images/logo3.png"/></a>
        <a class="zhuce2">个人中心</a>
       </div>
      <div class="back_sy"><a href="/yms/index.php/Home/Index/index">搜黑首页</a></div>
    </div>
  </div>
  
  
  <!--头部--End--> 

<!--内容--Begin-->     
   <div id="content_ny">
    	 <div class="zhucebox">
           <div class="center_gr">
             <?php if(is_array($us_list)): $i = 0; $__LIST__ = $us_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="center_gr_lt">
                 <dl>
                     <dt><img src="<?php echo ($vo["UI_Avatar"]); ?>"/></dt>
                 </dl>
                 <dl class="shc">
                 <form name="theForm" method="post" id="theForm" enctype="multipart/form-data" onsubmit="return ValidateFile()">
                   <input class="a1" name="N" id="N" type="file" value="修改头像" autocomplete="off" />
                   <input class="a2" name="submit" type="submit" value="上传"/>
                 </form>
                 </dl>
               </div>
               
               <div class="center_gr_ct">
                 <dl><dt>用户昵称：</dt><dd><span><?php echo ($vo["UI_NickName"]); ?></span></dd></dl>
                 <dl><dt>性别：</dt>
                  <dd>
                    <?php if($vo["UI_Sex"] == 1 ): ?>男
                    <?php elseif($vo["UI_Sex"] == 0 ): ?>女
                    <?php else: ?> 未知<?php endif; ?>
                  </dd>
                 </dl>
                 <dl><dt>生日：</dt><dd><?php echo ($vo["UI_BirthDay"]); ?></dd></dl>
                 <dl><dt>职业：</dt><dd><?php echo ($vo["UI_Job"]); ?></dd></dl>
                 <dl><dt>所在地：</dt><dd><?php echo ($vo["UI_Address"]); ?></dd></dl>
                 <dl>
                   <dd style='width:150px;'><a href="javascript:void(0)" class="xggrxx">[ 修改个人信息 ]</a></dd>
                   <dd style='width:150px;'><a href="javascript:void(0)" class="xgmm">[ 修改密码 ]</a></dd>
                 </dl>
               </div>
               <div class="center_gr_rt"><img src="/yms/Public/Home/images/pic02.jpg" width="274" height="179" /></div><?php endforeach; endif; else: echo "" ;endif; ?>
           </div>
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
<script type="text/javascript">
function ValidateFile() {
      var tmp1 = document.getElementById("N").value; 
      if(tmp1 != ""){
        if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp1)){
          $('#tishi').text("图片类型必须是.gif,jpeg,jpg,png中的一种");
          $(".bd_wd").css("width", $(document).width());
          $(".bd_wd").css("height", $(document).height());
          $(".bd_wd").show();
          $(".yzsbai").show();
          return false;
        }
      }else{
        $('#tishi').text("请添加图片！");
        $(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $(".yzsbai").show();
        return false;
      }
      //表单提交
      var fd = new FormData(document.getElementById("theForm"));
      //fd.append("content", content);
      $.ajax({
        url: "/yms/index.php/Home/User/touxiang",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false,  // tell jQuery not to process the data
        contentType: false   // tell jQuery not to set contentType
      }).done(function( data ) {
          if (data == 1) {
            $('#tishi1').text("头像更新成功！");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai1").show();
            return false;
          }else if(data == 0){
            $('#tishi').text("头像更新失败！");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();
            return false;
          }else if(data == -1){
            $('#tishi').text("输入的参数存在空值！");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();
            return false;
          }else if(data == -2){
            $('#tishi').text("safekey参数不合法");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();
            return false;
          }else if(data == -3){
            $('#tishi').text("用户不存在");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();
            return false;
          }else if(data == -4){
            $('#tishi').text("头像文件保存失败");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();
            return false;
          }else if(data == -5){
            $('#tishi').text("上传文件不能大于350kb！");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();
            return false;
          }
      });
      return false;
}
  $(function(){
    //修改密码
    $('.but1').click(function(){
              var old_pswd = $(this).parents('.tcwindows_xgdlmm').find('.old_pswd').val();
              var new_pswd = $(this).parents('.tcwindows_xgdlmm').find('.new_pswd').val();
              var new_pswd_ex = $(this).parents('.tcwindows_xgdlmm').find('.new_pswd_ex').val();
              var userid   = '$userid';
              if (old_pswd == "") {
                alert('原密码不能为空');
                return false;
              }else if (old_pswd.length < 6){
                alert('原密码长度不能小于6位字符');
                return false;
              }
              else if(old_pswd.length > 16){
                alert('原密码长度最多为16位字符');
                return false;
              }
              if (new_pswd == "") {
                alert('新密码不能为空');
                return false;
              }else if (new_pswd.length < 6){
                alert('新密码长度不能小于6位字符');
                return false;
              }
              else if(new_pswd.length > 16){
                alert('新密码长度最多为16位字符');
                return false;
              }
              if (new_pswd_ex == "") {
                alert('确认新密码不能为空！');
                return false;
              }else if(new_pswd_ex != new_pswd){
                alert('新密码和确认新密码输入不一致！');
                return false;
              }
              if (userid == "") {
                 alert("请登录后在修改！"); 
                 return false; 
              }
              jQuery.ajax({  
                  type:"post",  
                  url:"/yms/index.php/Home/User/update_passwd/old_pswd/"+old_pswd+"/new_pswd/"+new_pswd+"",
                  timeout: 5000,  
                  dataType:"json",  
                  data:{old_pswd:old_pswd,
                        new_pswd:new_pswd
                        },
                  success: function aa(data) {  
                       if (0 == data) {
                            alert('修改成功！');
                            window.location.href="/yms/index.php/home/Index/index"; 
                            return false;
                       }else if(-1 == data){
                          alert('修改失败！');
                          return false;
                       }else if(-2 == data){
                          alert('用户不存在！');
                          return false;
                       }else if(-3 == data){
                          alert('原密码不正确！');
                          return false;
                       }
                  }  
              })  
    });
    //用户信息修改
    $('.but2').click(function(){
              var nickname = $(this).parents('.tcwindows_grzx').find('.gr_txt1').val();
              var sex      = $('input[name="sex"]:checked').val();
              var birthday = $(this).parents('.tcwindows_grzx').find('.gr_txt2').val();
              var job      = urlencode($(this).parents('.tcwindows_grzx').find('.gr_txt3').val());
              var address  = urlencode($(this).parents('.tcwindows_grzx').find('.gr_txt4').val());
              var userid   = $(this).attr('id');
              if (nickname == "") {
                alert('昵称不能为空');
                return false;
              }else if(nickname.length > 16){
                alert('昵称长度最多为16位字符');
                return false;
              }
              if (userid == "") {
                 alert("请登录后在修改！"); 
                 return false; 
              }
              jQuery.ajax({  
                  type:"post",  
                  url:"/yms/index.php/Home/User/information_modify/nickname/"+nickname+"/sex/"+sex+"/birthday/"+birthday+"/job/"+job+"/address/"+address+"/userid/"+userid+"",
                  timeout: 5000,  
                  dataType:"json",  
                  data:{nickname:nickname,
                        userid:userid,
                        sex:sex,
                        birthday:birthday,
                        job:job,
                        address:address},
                  success: function aa(data) {  
                       if (0 == data) {
                            alert('修改成功！');
                            window.location.reload();  
                       }else{
                          alert('修改失败！');
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