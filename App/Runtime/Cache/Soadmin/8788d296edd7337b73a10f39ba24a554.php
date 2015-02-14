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
    <script type="text/javascript" charset="utf-8" src="/yms/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/yms/Public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/yms/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

    <style type="text/css">
        div{
            width:100%;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8">
        window.UEDITOR_HOME_URL = "/yms/Public/ueditor/";  //UEDITOR_HOME_URL、config、all这三个顺序不能改变
        window.onload=function(){
            window.UEDITOR_CONFIG.initialFrameHeight=300;//编辑器的高度
            window.UEDITOR_CONFIG.imageUrl="<?php echo U('admin/Category/checkPic');?>";          //图片上传提交地址
            window.UEDITOR_CONFIG.imagePath=' /Uploads/thumb/';//编辑器调用图片的地址
            UE.getEditor('editor');//里面的contents是我的textarea的id值
           
            }
    </script>
  <form method="post" enctype="multipart/form-data" name="form">
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >添加新闻</th>
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
				<legend>添加新闻</legend>
					  <table border="0" cellpadding="2" cellspacing="1" style="width:100%">
					 
					  <tr>
					    <td nowrap align="right" width="30%">标题:</td>
					    <td width="35%"><input id="title" name='title' type="text" class="text" style="width:154px" value="<?php echo ($news["title"]); ?>" />
				            <span class="red">*</span></td>
					  </tr>

					 <tr>
					    <td nowrap align="right" width="30%">来源:</td>
					    <td width="35%"><input id="source" name='source' type="text" class="text" style="width:154px" value="<?php echo ($news["source"]); ?>" />
				            <span class="red">*</span></td>
					  </tr>

                                        <tr>
					    <td nowrap align="right" width="30%">作者:</td>
					    <td width="35%"><input id="author" name='author' type="text" class="text" style="width:154px" value="<?php echo ($news["author"]); ?>" />
				            <span class="red">*</span></td>
					  </tr>
                                        
                                        <tr>
					    <td nowrap align="right" width="30%">匹图(pc):</td>
					    <td width="35%"><input id="pic"  name='pic' type="file" class="file" style="width:154px" />
                                            <img src="<?php echo ($news["pic_url"]); ?>" width="50px" height="50px"/>
				            <span class="red">*</span></td>
					  </tr>
                    
                                         <tr>
					    <td width="35%" colspan="2">
                                           
                                                 <textarea id="editor" name="content" style="width:100%;height:300px;"><?php echo ($news["content"]); ?></textarea>
				            </td>
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
                        <input type="hidden" name="id" value="<?php echo ($news["id"]); ?>"/>
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
//提交审核
function validate()
{
    var title      = $('#title').val();
    var source     = $('#source').val();
    var author     = $('#author').val();
    var content    = $('#content').val();
    
    if('' == title)
    {
    	alert('标题不为空');
    	return false;
    }
    
    if('' == source)
    {
    	alert('来源不为空');
    	return false;
    }
   
    if('' == author)
    {
    	alert('作者不为空');
    	return false;
    }
    
    return true;
}
</script>