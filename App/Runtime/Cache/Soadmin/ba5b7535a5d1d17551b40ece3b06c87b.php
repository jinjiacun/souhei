<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>搜黑后台管理</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<style>
    /*弹窗用的到CSS*/
    /*弹窗函数样式*/
    #wstatus { position:fixed; left:200px; top:400px; width:auto; height:38px; line-height:38px; background:#fff; border:solid 4px #e5e5e5; padding:5px; z-index:9999 }
    #wstatus .wstatus_s { width:38px; height:38px; float:left; }
    #wstatus .wstatus_s1 {  background:url(/yms/Public/Soadmin/images/ico.png) no-repeat left top; }
    #wstatus .wstatus_s2 {  background:url(/yms/Public/Soadmin/images/ico.png) no-repeat left bottom; }
    #wstatus .wstatus_s3 {  background:url(/yms/Public/Soadmin/images/loading.gif) no-repeat center; }
    #wstatus .wstatus_s4 {  background:url(/yms/Public/Soadmin/images/ico.png) no-repeat left -38px; }
    #wstatus .wstatus_f { padding:0 6px 0 6px; text-align:left; font-size:14px; color:#333; font-family:"微软雅黑"; }
    /*遮照*/
    #bremove { width:100%; height:100%; background:#000; opacity:0.3; filter:alpha(opacity=30); z-index:900; position:fixed; left:0; top:0; }
    /*CSS结束*/
    body .span { display:block; width:120px; height:34px; line-height:34px;  background:#390; margin:20px 0 0 100px; color:#fff; text-align:center; font-family:"微软雅黑"; font-size:14px; }
    body .span:hover { background:#360; cursor:pointer; }
    </style>
<script type="text/javascript" src="/yms/Public/js/jquery-1.9.1.min.js"></script>
<script src="/yms/Public/Soadmin/js/common.js" type="text/javascript"></script>
<script src="/yms/Public/Soadmin/js/jquery.form.js"></script>
<link href="/yms/Public/Admin/css/css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" height="147" background="/yms/Public/Admin/images/top02.gif">
     
    </td>
  </tr>
</table>
<table width="562" border="0" align="center" cellpadding="0" cellspacing="0" class="right-table03">
  <tr>
    <td width="221"><table width="95%" border="0" cellpadding="0" cellspacing="0" class="login-text01">
      
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="login-text01">
          <tr>
            <td align="center"><img src="/yms/Public/Admin/images/ico13.gif" width="107" height="97" /></td>
          </tr>
          <tr>
            <td height="40" align="center">&nbsp;</td>
          </tr>
          
        </table></td>
        <td><img src="/yms/Public/Admin/images/line01.gif" width="5" height="292" /></td>
      </tr>
    </table></td>
    <td>
    <form name="myForm" id="myForm" method="post" action="/yms/index.php/Soadmin/Login/index">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="31%" height="35" class="login-text02">用户名称：<br /></td>
        <td width="69%"><input style="height:28px" name="admin_name" type="text" size="30" /></td>
      </tr>
      <tr>
        <td height="35" class="login-text02">密　码：<br /></td>
        <td><input style="height:28px" name="passwd" type="password" size="30" /></td>
      </tr>
      <tr style="display: none;">
        <td height="35" class="login-text02">验证图片：<br /></td>
        <td><img src="/yms/Public/Admin/images/pic05.gif" width="109" height="40" /> <a href="#" class="login-text03">看不清楚，换张图片</a></td>
      </tr>
      <tr style="display: none;">
        <td height="35" class="login-text02">验证码：</td>
        <td><input style="height:28px" name="textfield3" type="text" size="30" /></td>
      </tr>
      <tr>
        <td height="35">&nbsp;</td>
        <td><input name="submit" type="submit" class="right-button01" value="确认登陆" onClick="windows.location='index.html'" />
          <input name="Submit232" type="submit" class="right-button02" value="重 置" /></td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript">
$("document").ready(function(){ 
    var options = {
            success: function() 
            {
                
            },
            complete: function(response) 
            {
		var res_json = $.parseJSON(response.responseText);
                if(0 == res_json.status)
                {
                    popStatus(1, res_json.message, 2);
                    $("#myForm")[0].reset();
		    if ('' != res_json.jmp_url) {
		      location.href= res_json.jmp_url;
		    }
                }                
                else
                {
                    popStatus(4, res_json.status+','+res_json.message, 2);
                }
            },
            error: function()
            {
                popStatus(4, '执行失败', 1);
            }
          }; 
          $("#myForm").ajaxForm(options);
           //防止在frame里面出现登录页面 
           if(top.location!==self.location){ 
            //alert(top.location); 
            //alert(self.location); 
           top.location.href=self.location.href;
           }
});
</script>