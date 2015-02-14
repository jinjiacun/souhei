<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>搜黑管理</title>
<link rel="stylesheet" rev="stylesheet" href="/yms/Public/Admin/css/style.css" type="text/css" media="all" />
<script type="text/javascript" src="/yms/Public/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="/yms/Public/js/comment.js"></script>
<script type="text/javascript" src="/yms/Public/js/validate.js"></script>
<script language="JavaScript" type="text/javascript">
function tishi()
{
  var a=confirm('数据库中保存有该人员基本信息，您可以修改或保留该信息。');
  if(a!=true)return false;
  window.open("冲突页.htm","","depended=0,alwaysRaised=1,width=800,height=400,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
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
</head>


<body class="ContentBody">
  <form method="post" enctype="multipart/form-data" name="form">
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >添加企业别名</th>
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
				<legend>添加企业别名</legend>
					  <table border="0" cellpadding="2" cellspacing="1" style="width:100%">
					
										 
    					 <tr>
					    <td nowrap align="right" width="30%">公司名称:</td>
					    <td width="35%">
                                            <?php echo ($company_list[$company_id]); ?>
                                            <input name='company_id' type="hidden" value="<?php echo ($company_id); ?>"/>
				            <span class="red">*</span></td>
					   </tr>
                                          
                                           
                                           <tr>
					    <td nowrap align="right" width="30%">别名:</td>
					    <td width="35%"><input id="name" name='name' type="text" class="text" style="width:154px" value="" onblur="check_name()"/>
				            <span class="red">*</span></td>
					   </tr>
                                           
					  </table>
			  <br />
				</fieldset>			</TD>
		</TR>
		</TABLE>
	 </td>
  </tr>
		
		<TR>
			<TD colspan="2" align="center" height="50px">
			<input type="submit" name="submit" value="保存" class="button" onclick="return validate()"/>　
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
//检查企业名称是否存在
function check_name() {
    var name = $('#name').val();
    name = encodeURI(name);
    jQuery.ajax({  
		        type:"post",  
		        url:"<?php echo ($call_url); ?>",
		        timeout: 5000,  
		        dataType:"json",  
		        data:{"method":"Companyalias.exists_name","type":"text","content":{"name":name}},
		        success: function aa(data) {
                            if (200 == data.status_code
                            &&  0 == data.content.is_exists) {
                                $('#name').val("");
                                $('#name').focus();
                                alert('此企业别名已存在');
                            }
                        }
    });
}
//提交审核
function validate()
{
    var name = $('#name').val();

    check_name();

    //公司名称
    if ('' == name) {
        alert('企业别名不为空');
        return false;
    }
    
    return true;
}
</script>