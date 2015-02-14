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
		      //location.href= res_json.jmp_url;
		       setTimeout("location.href= '"+res_json.jmp_url+"'; ",3000);//延时3秒 
		    }
                }                
                else
                {
                    //popStatus(4, res_json.status+','+res_json.message, 2);
		    popStatus(4, res_json.message, 2);
                }
            },
            error: function()
            {
                popStatus(4, '执行失败', 1);
            }
          }; 
          $("#myForm").ajaxForm(options);
        });
	
	function request_get(url) {
	    jQuery.ajax({  
		        type:"get",  
		        url:url,
		        timeout: 5000,  
		        dataType:"json",
		        success: function aa(data) {
                            if (0 == data.status) {
			       popStatus(1, data.message, 2);
			       if ('' != data.jmp_url) {
				//location.href= data.jmp_url;
				 setTimeout("location.href= '"+data.jmp_url+"'; ",3000);//延时3秒 
			       }
			    }
			    else
			    {
			      //popStatus(4, data.status+','+data.message, 2);
			      popStatus(4, data.message, 2);
			    }
                        },
			error:function my_error(data){
			    popStatus(4, data.status+','+data.message, 2);
			}
	    });
      }
    </script>
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
  <form method="post" enctype="multipart/form-data" name="myForm" id="myForm">
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
					    <td nowrap align="right" width="30%">企业:</td>
					    <td width="35%">
                                            <select name="company_id" id="company_id">
                                            <?php if(is_array($company_list)): $i = 0; $__LIST__ = $company_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$company): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == $news['company_id']): ?>selected="selected"<?php endif; ?>><?php echo ($company); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
				            <span class="red">*</span></td>
					  </tr>
                                         
                                         <tr>
                                            <td nowrap align="right" width="30%">正负面新闻:</td>
					    <td width="35%">
                                            <select name="sign" id="sign">
                                            <option value=0 <?php if(0 == $news['sign']): ?>selected="selected"<?php endif; ?>>正面</option>
                                            <option value=1 <?php if(1 == $news['sign']): ?>selected="selected"<?php endif; ?>>负面</option>
                                            </select>
                                         </tr>
                                         
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
					    <td width="35%"><input name='pic' type="file" class="file" style="width:154px" />
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
			<input type="submit" name="Submit2" value="返回" class="button" onclick="window.history.go(-1);"/>
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
    var company_id = $('#company_id').val();
    var title      = $('#title').val();
    var source     = $('#source').val();
    var author     = $('#author').val();
    var content    = $('#content').val();
    
    //公司
    if (0 >= company_id) {
        alert('请选择企业');
        return false;
    }
    
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