<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>搜黑管理</title>
<link rel="stylesheet" rev="stylesheet" href="/yms/Public/Admin/css/style.css" type="text/css" media="all" />
<script type="text/javascript" src="/yms/Public/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/yms/Public/js/comment.js"></script>
<script type="text/javascript" src="/yms/Public/js/validate.js"></script>
<script src="/yms/Public/Soadmin/js/common.js" type="text/javascript"></script>
<script src="/yms/Public/Soadmin/js/jquery.form.js"></script>
<script language="JavaScript" type="text/javascript">
function tishi()
{
	
}

function check()
{
  document.getElementById("aa").style.display="";
}
</script>
<style type="text/css">
<!--
.atten {font-size:12px;font-weight:normal;color:#F00;}
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
    <script>
        $(document).ready(function()
        {
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
        });
    </script>
</head>


<body class="ContentBody">    
  <form method="post" enctype="multipart/form-data" id="myForm" name="myForm">
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >会员信息</th>
  </tr>
  <tr>
    <td class="CPanel">
		
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
		
		<tr align="center">
			<td class="TablePanel">&nbsp;</td>
		</tr>
			<TR>
			<TD width="100%">
				<fieldset style="height:100%;">
				<legend>会员信息</legend>
					  <table border="0" cellpadding="2" cellspacing="1" style="width:100%">                                          
                                          <tr>
					    <td nowrap align="right" width="30%">用户id:</td>
					    <td width="35%">
                                            <input type="text" name="user_id" id="user_id" onblur="get_info();"/>
				            <span class="red">*</span></td>
					  </tr>
					 
                                          <tr>
					    <td nowrap align="right" width="30%">会员昵称:</td>
					    <td width="35%">
                                            <span id="nickname"></span>
				            <span class="red">*</span></td>
					  </tr>
                                          
                                          <tr>
					    <td nowrap align="right" width="30%">状态:</td>
					    <td width="35%">
                                            <input type="radio" name="status" id="status1" value=1 />打开
                                            <input type="radio" name="status" id="status2" value=0 />关闭
				            <span class="red">*</span></td>
					  </tr>
                                          
                                          <tr>
					    <td nowrap align="right" width="30%">ip:</td>
					    <td width="35%">
                                            <input type="text" id="ip" name="ip" />                                            
				            <span class="red">注:多个ip之间用'|'隔开,不填为ip解封</span></td>
					  </tr>
                                          
					  </table>
			  <br />
				</fieldset>			</TD>
		</TR>
		</TABLE>
	 </td>
  </tr>
		
		<TR id="id_tr" style="display: none">
			<TD colspan="2" align="center" height="50px">
			<input type="submit" name="submit" value="封号/解封" class="button"/>　
      <input type="submit" name="submit1" value="封ip/解封ip" class="button" conclick="return validate()"/>
			<input type="button" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/>
			</TD>
		</TR>
		</TABLE>	
	 </td>
  </tr>
  </table>
</div> 
</form>
</body>
</html>
<script type="text/javascript">
//查询会员信息
function get_info() {
    var user_id = $('#user_id').val();
    if (0>= user_id) {
        alert('用户id不合法');
        return ;
    }
}
function get_info()
{
    var user_id = $('#user_id').val();
    jQuery.ajax({  
                type:"post",  
                url:"<?php echo ($call_url); ?>",
                timeout: 5000,  
                dataType:"json",  
                data:{"method":"User.get_info","type":"text","content":{"uid":user_id}},
                success: function aa(data) {
                    if (200 == data.status_code) {
                        $('#nickname').html(data.content[0].UI_NickName);
                        if (1 == data.content[0].UI_State) {
                            $('#status1').attr('checked','checked');
                        }
                        else if(0 == data.content[0].UI_State)
                        {
                            $('#status2').attr('checked','checked');
                        }
                        $('#ip').val(data.content[0].UI_StrBak1);
                        $('#id_tr').show();
                    }
                }
    });
}
</script>