<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>合规认证平台--搜黑</title>
<meta name="keywords" content="合规认证平台,搜黑,贵金属机构合规认证"/>
<meta name="description" content="搜黑,黄金、外汇、贵金属合规认证平台，为投资者甄选安全可靠的交易平台。"/>
<link rel="icon" href="/yms/Public/s.ico" type="image/x-icon" />
<link type="text/css" rel="stylesheet" href="/yms/Public/Home/css/main.css"/>
<script type="text/javascript" src="/yms/Public/js/jquery-1.8.3.min.js" ></script>
<script type="text/javascript" src="/yms/Public/js/Validform_v5.3.2.js" ></script>
<script type="text/javascript" src="/yms/Public/Home/js/main.js" ></script>
</head>

<body>
<!--成功-->  
<div class="yzsbai3">
    <p id="tishi3"></p>
    <input name="" type="button" value="确 定" class="xigs3" />
</div>
<!--失败-->
<div class="yzsbai">
    <p id="tishi"></p>
    <input name="" type="button" value="确 定" class="xigs" />
</div>
<!--提交成功-->
<div class="tj_box" style="display:none; top:45%">
  <div class="tj_box_close"><a href="javascript:void(0)">关闭</a></div>
  <div class="tj_box_nr">
     <h3>提交成功，稍后会有相关负责人员联系您。</h3>
     <p>如有疑问，请联系：021-31063666-2017</p>
     <input name="" type="button" value="确认" />
  </div>
</div>

<!--没有查询到相关认证机构-->
<div class="tjsb_box" style="display:none; top:15%">
  <div class="tj_box_close"><a href="javascript:void(0)">关闭</a></div>
  <div class="tjsb_box_nr">
     <h3>没有查询到相关认证机构</h3>
  </div>
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
     <div class="renzheng">
       <h2>申请搜黑可信企业认证</h2>
       <div class="txneirong">
   		 <p class="txnr_ts">请如实填写申请企业或机构的相关信息后，提交认证。</p>
        <form class="registerform" name="theForm" id="theForm" method="post" enctype="multipart/form-data" onsubmit="return ValidateFile()">
         <div class="xzqyxz">
                <span>企业性质：</span>
                <select name="nature" id="nature">
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
         <div class="txkuang">
            <h3><span>基本信息</span></h3>
            <dl>
              <dt>公司全称：</dt>
              <dd>
                <input name="company_name" type="text" class="text1" datatype="s" nullmsg="不能为空！" /><span>*</span>
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
            <dl>
              <dt>公司简称：</dt>
              <dd>
                <input name="corporation" type="text" class="text1"/>
              </dd>
            </dl>
            <dl>
              <dt>联系地址：</dt>
              <dd>
                <input name="reg_address" type="text" class="text1" datatype="s" nullmsg="不能为空！" /><span>*</span>
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
            <dl>
              <dt>营业执照：</dt>
              <dd>
                <input type="file" name="busin_license" id="busin_license" class="file" /><span>*</span>
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
            <dl>
              <dt>机构代码证：</dt>
              <dd>
                <input type="file" name="code_certificate" id="code_certificate"  class="file" /><span>*</span>
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
            <dl>
              <dt>公司电话：</dt>
              <dd>
                <input name="telephone" type="text" class="text1" datatype="n5-13" nullmsg="请输入公司电话！" errormsg="输入的电话有误" /><span>*</span>
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
            <dl>
              <dt>官方网站：</dt>
              <dd>
                <input name="website" type="text" class="text1" datatype="url"  ignore="ignore" />
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
            <dl>
              <dt>官网备案：</dt>
              <dd>
                <input name="record" type="text" class="text1" />
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
         </div>
         <div class="txkuang nobian" style="border-bottom: 1px dashed #d89393;">
            <h3><span>联系人信息</span></h3> 
            <dl>
              <dt>联系人：</dt>
              <dd>
                <input name="contact" type="text" class="text1" datatype="*" nullmsg="输入联系人！" errormsg="输入的联系人有误" /><span>*</span>
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
            <dl>
              <dt>联系电话：</dt>
              <dd>
                <input name="mobile" type="text" class="text1" datatype="n5-13" nullmsg="输入电话号码！" errormsg="输入的电话有误" /><span>*</span>
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
         </div>
         <div class="txkuang nobian">
          <div class="zixx">
            <h3><span>资质信息</span></h3>
            <dl>
              <dt>代理平台：</dt>
              <dd>
                <input name="agent_platform" type="text" class="text1" datatype="* , /^(([^\^\.<>%&',;=?$':#@!~\]\[{}\\/`\|])*)$/" ignore="ignore" />
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
            <dl>
              <dt>会员编号：</dt>
              <dd>
                <input name="mem_sn" type="text" class="text1" datatype="* , /^(([^\^\.<>%&',;=?$':#@!~\]\[{}\\/`\|])*)$/" ignore="ignore" />
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
            <dl>
              <dt>资质证明：</dt>
              <dd>
                <input type="file" name="certificate" id="certificate" class="file"/>
              </dd>
            </dl>
            <dl>
              <dt>查询网址：</dt>
              <dd>
                <input name="find_website" type="text" class="text1" datatype="url" ignore="ignore" />
                <em class="Validform_checktip"></em>
              </dd>
            </dl>
          </div>
            <dl>
              <dt>&nbsp;</dt><dd><input name="submit" type="submit" value="提交认证" class="textn1" /></dd>
            </dl>     
         </div>
        </form>
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
    //表单验证插件
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
      $(".yzsbai3 .xigs3").click(function(){
        $(".yzsbai3").hide();
        $(".bd_wd3").hide();  
        window.location.href="/yms/index.php/Home/Index/index"; 
      });
      $('#nature').change(function(){ 
        var aa = $("#nature").val();
        if (aa == '003001') {
           $(".zixx").show();
        }else{
           $(".zixx").hide();
        } 
      })
      var bb = $("#nature").val(); 
      if (bb == '003001') {
          $(".zixx").show();
      }else{
          $(".zixx").hide();
      }
    })
    //图片上传验证
    function ValidateFile(){ 
        var tmp     = document.getElementById("busin_license").value; 
        var tmp1    = document.getElementById("code_certificate").value;
        var tmp2    = document.getElementById("certificate").value;
        var tmpStr  = tmp.substring(tmp.lastIndexOf('.')+1,tmp.length).toLowerCase(); 
        var tmpStr1 = tmp1.substring(tmp1.lastIndexOf('.')+1,tmp1.length).toLowerCase();
        var tmpStr2 = tmp2.substring(tmp2.lastIndexOf('.')+1,tmp2.length).toLowerCase();
        var userid  = '<?php echo ($userid); ?>';
        if(tmpStr == ""){
            $('#tishi').text("请上传营业执照！");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();  
            return false; 
        }else if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp)){
            $('#tishi').text("营业执照类型必须是.gif,jpeg,jpg,png中的一种");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();  
            return false; 
    	  }
        if (tmpStr1 == "") {
            $('#tishi').text("请上传机构代码证！");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();  
            return false; 
        }else if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp1)){
            $('#tishi').text("资质证明类型必须是.gif,jpeg,jpg,png中的一种");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();  
            return false; 
    	  }
        if (userid == '') {
          $(".bd_wd").css("width", $(document).width());
          $(".bd_wd").css("height", $(document).height());
          $(".bd_wd").show();
          $("#tcwindows1").show();
          return false;
        }
    	  if(tmpStr2 != ""){
    		  if(!/.(gif|jpg|jpeg|png|GIF|JPG|png)$/.test(tmp2)){
            $('#tishi').text("资质证明类型必须是.gif,jpeg,jpg,png中的一种");
            $(".bd_wd").css("width", $(document).width());
            $(".bd_wd").css("height", $(document).height());
            $(".bd_wd").show();
            $(".yzsbai").show();  
            return false; 
    		  }
    	  }
        //表单提交
      var fd = new FormData(document.getElementById("theForm"));
      //fd.append("content", content);
      $.ajax({
        url: "/yms/index.php/Home/Inexposure/authentication_ex",
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
          $('#tishi3').text("合规认证添加成功！");
          $(".yzsbai3").show();
          return false;
        }else if(data == -1){
          $('#tishi').text("合规认证添加失败！");
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
          $('#tishi').text("必填项没有填写！");
          $(".yzsbai").show();
          return false;
        }
      }
      });
      return false;
    }
</script>

</html>