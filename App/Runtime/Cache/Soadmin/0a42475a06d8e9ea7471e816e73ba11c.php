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

<SCRIPT language=JavaScript>
function sousuo(){
	window.open("gaojisousuo.htm","","depended=0,alwaysRaised=1,width=800,height=510,location=0,menubar=0,resizable=0,scrollbars=0,status=0,toolbar=0");
}
function selectAll(){
	var obj = document.fom.elements;
	for (var i=0;i<obj.length;i++){
		if (obj[i].name == "delid"){
			obj[i].checked = true;
		}
	}
}

function unselectAll(){
	var obj = document.fom.elements;
	for (var i=0;i<obj.length;i++){
		if (obj[i].name == "delid"){
			if (obj[i].checked==true) obj[i].checked = false;
			else obj[i].checked = true;
		}
	}
}

function link(){
    document.getElementById("fom").action="addjihua.htm";
   document.getElementById("fom").submit();
}

function on_load(){
	var loadingmsg=document.getElementById("loadingmsg");
	var mainpage=document.getElementById("mainpage");
	loadingmsg.style.display="";
	mainpage.style.display="none";
	
	loadingmsg.style.display="none";
	mainpage.style.display="";
}
</SCRIPT>

<body onload="on_load()">
<form name="fom" id="fom" method="get">
<table id="mainpage" width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="62" background="/yms/Public/Admin/images/nav04.gif">
          
		   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="21"><img src="/yms/Public/Admin/images/ico07.gif" width="20" height="18" /></td>
			<td width="550">查看内容：
                         公司性质：<select name="nature" style="width:180px;">
                         <option value="0">---请选择公司性质---</option>
                         <option value="003001" <?php if('003001' == $nature): ?>selected="selected"<?php endif; ?>>公司</option>
                         <option value="003002" <?php if('003002' == $nature): ?>selected="selected"<?php endif; ?>>平台</option>
                         </select>
                         &nbsp;&nbsp;所属行业：<select name="trade" style="width:180px;">
                         <option value=0>---请选择所属行业---</option>
                         <?php if(is_array($trade_list)): $i = 0; $__LIST__ = $trade_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item_trade): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == $trade): ?>selected="selected"<?php endif; ?>><?php echo ($item_trade); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                         </select><br/>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         认证级别：<select name="auth_level" style="width:180px">
                         <option value=0>---请选择---</option>
                         <option value='006001' <?php if('006001' == $auth_level): ?>selected="selected"<?php endif; ?>>黑平台</option>
                         <option value='006002' <?php if('006002' == $auth_level): ?>selected="selected"<?php endif; ?>>未验证</option>
                         <option value='006003' <?php if('006003' == $auth_level): ?>selected="selected"<?php endif; ?>>合规</option>
                         </select>
                         &nbsp;&nbsp;公司名称：<input name="company_name" style="width:170px;" type="text" size="12" value="<?php echo ($company_name); ?>"/>
			                   &nbsp;&nbsp;<input name="submit" type="submit" class="right-button02" value="查 询" />
			 </td>
			 <td width="132" align="left">
       <a href="#" onclick="sousuo()">			   
         </a>
         </td>	
		  </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table id="subtree1" style="DISPLAY: " width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>
          <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">

          	 <tr>
               <td height="20"><span class="newfont07">选择：<a href="#" class="right-font08" onclick="selectAll();">全选</a>-<a href="#" class="right-font08" onclick="unselectAll();">反选</a></span>
	             
	             </td>
          	 </tr>
              <tr>
                <td height="40" class="font42"><table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#464646" class="newfont03">

                  <tr>
				    <td width="5%" align="center" bgcolor="#EEEEEE">选择</td>
                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE">公司性质</td>
                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE">所属行业</td>
                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE">公司名称</td>
                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE">认证等级</td>
                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE">加黑人数</td>
                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE">评论数</td>
                    <td width="10%" height="20" align="center" bgcolor="#EEEEEE">曝光人数</td>
                    <td width="14%" align="center" bgcolor="#EEEEEE">操作</td>
                  </tr>

                  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr align="center">
		    <td bgcolor="#FFFFFF"><input type="checkbox" name="delid"/><?php echo ($item["id"]); ?></td>
                    <td height="20" bgcolor="#FFFFFF">
                    <?php if('003001' == $item['nature']): ?>公司
                    <?php else: ?>
                    平台<?php endif; ?>
                    </td>
                    <td height="20" bgcolor="#FFFFFF"><?php echo ($trade_list[$item['trade']]); ?></td>
                    <td height="20" bgcolor="#FFFFFF"><?php echo ($item["company_name"]); ?></td>
                    <td height="20" bgcolor="#FFFFFF">
					<?php if('006001' == $item['auth_level']): ?>黑平台
					<?php elseif('006002' == $item['auth_level']): ?>
					未验证
					<?php else: ?>
					合规<?php endif; ?>
					</td>
                    <td height="20" bgcolor="#FFFFFF"><?php echo ($item["add_blk_amount"]); ?></td>
                    <td height="20" bgcolor="#FFFFFF"><?php echo ($item["com_amount"]); ?></td>
                    <td height="20" bgcolor="#FFFFFF"><?php echo ($item["exp_amount"]); ?></td>
                    <td bgcolor="#FFFFFF">
                        <a href="/yms/index.php/Soadmin/Company/edit/id/<?php echo ($item["id"]); ?>">编辑</a>|
                        <a href="javascript:request_get('/yms/index.php/Soadmin/Company/delete/id/<?php echo ($item["id"]); ?>');" onclick="return confirmdel('确定要删除吗')">删除</a>
                        <!--|
                        <a href="/yms/index.php/Soadmin/Company/get_list_ex/id/<?php echo ($item["id"]); ?>">别名管理</a>
                        -->
                     </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"><img src="/yms/Public/Admin/images/spacer.gif" width="1" height="1" /></td>
        </tr>
        <tr>
          <td colspan="5" align="right"><?php echo ($page); ?></td>
        </tr>
</table>
</form>

<div id="loadingmsg" style="width:100px; height:18px; top:0px; display:none;">
	<img src="file:///F|/项目管理相关资料/项目管理系统页面/images/loadon.gif" />
</div>

</body>
</html>