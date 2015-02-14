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
  <form method="post" enctype="multipart/form-data" name="form">
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >可信企业</th>
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
				<legend>可信企业</legend>
					  <table border="0" cellpadding="2" cellspacing="1" style="width:100%">
					   
                                           <tr>
					    <td nowrap align="right" width="10%">关联企业:</td>
					    <td width="30%">
                                            <?php if(0 == $obj['company_id']): ?>未关联
                                            <?php else: ?>
                                            <?php echo ($company_list[$obj['company_id']]); endif; ?>
				           </td>
                                            <td nowrap align="right" width="10%">会员昵称:</td>
					    <td width="30%">                                           
                                            <?php echo ($obj["nickname"]); ?>
				           </td>
					   </tr>
				        
                                          <tr>
					    <td nowrap align="right" width="10%">企业性质:</td>
					    <td width="30%">
                                             <?php if('003001' == $obj['nature']): ?>公司
                                            <?php else: ?>
                                                平台<?php endif; ?>
				           </td>
                                            <td nowrap align="right" width="10%">所属行业:</td>
					    <td width="30%">
                                             <?php if('004001' == $obj['trade']): ?>贵金属
                                                <?php elseif('004002' == $obj['trade']): ?>
                                                外汇
                                                <?php elseif('004003' == $obj['trade']): ?>
                                                石油
                                                <?php elseif('004004' == $obj['trade']): ?>
                                                大宗商品
                                                <?php elseif('004005' == $obj['trade']): ?>
                                                其他<?php endif; ?>
				           </td>
					   </tr>
						
					   <tr>
					    <td nowrap align="right" width="10%">公司全称:</td>
					    <td width="30%">
                                            <?php echo ($obj["company_name"]); ?>
				           </td>
                                           <td nowrap align="right" width="10%">公司简称:</td>
					    <td width="30%">
                                            <?php echo ($obj["corporation"]); ?>
				           </td>
					   </tr>                                           
						
                                            <tr>
					    <td nowrap align="right" width="10%">注册地址:</td>
					    <td width="30%">
                                            <?php echo ($obj["reg_address"]); ?>
				           </td>
                                           <td nowrap align="right" width="10%"></td>
					    <td width="30%">
                                            
				           </td>
					   </tr>
                                           
                                           <tr>
					    <td nowrap align="right" width="10%">营业执照:</td>
					    <td width="30%">
                                            <img src="<?php echo ($obj["busin_license_url"]); ?>" width="25px" height="25px"/>
				           </td>
                                            <td nowrap align="right" width="10%">机构代码证:</td>
					    <td width="30%">
                                            <img src="<?php echo ($obj["code_certificate_url"]); ?>" width="25px" height="25px"/>
				           </td>
					   </tr>
                                          
                                          
                                           <tr>
					    <td nowrap align="right" width="10%">公司电话:</td>
					    <td width="30%">
                                            <?php echo ($obj["telephone"]); ?>
				           </td>
                                           <td nowrap align="right" width="10%">官方网址:</td>
					    <td width="30%">
                                            <?php echo ($obj["website"]); ?>
				           </td>
					   </tr>
                                                                                           
                                            <tr>
					    <td nowrap align="right" width="10%">官网备案:</td>
					    <td width="30%">
                                            <?php echo ($obj["record"]); ?>
				            </td>
                                            <td nowrap align="right" width="10%">
                                            <?php if('003001' == $obj['nature']): ?>代理平台:<?php endif; ?>
                                            </td>
					    <td width="30%">
                                            <?php if('003001' == $obj['nature']): echo ($obj["agent_platform"]); endif; ?>
				           </td>
					   </tr>
                                           
                                           <tr>
					    <td nowrap align="right" width="10%" >
                                            <?php if('003001' == $obj['nature']): ?>会员编码:<?php endif; ?>
                                            </td>
					    <td width="30%">
                                            <?php if('003001' == $obj['nature']): echo ($obj["mem_sn"]); endif; ?>
				            </td>
                                            <td nowrap align="right" width="10%">
                                            <?php if('003001' == $obj['nature']): ?>资质证明:<?php endif; ?>
                                            </td>
					    <td width="30%">
                                            <?php if('003001' == $obj['nature']): ?><img src="<?php echo ($obj["certificate_url"]); ?>" width="25px" height="25px"/><?php endif; ?>
				            </td>
					   </tr>
                                           
                                           
                                            <tr>
					    <td nowrap align="right" width="10%" >
                                            <?php if('003001' == $obj['nature']): ?>查询网址:<?php endif; ?>
                                            </td>
					    <td width="30%">
                                            <?php if('003001' == $obj['nature']): echo ($obj["find_website"]); endif; ?>
				           </td>
                                           <td width="10%"></td><td width="30%"></td>
					   </tr>
                                           
                                           <tr>
					    <td nowrap align="right" width="10%">联系人:</td>
					    <td width="30%">
                                            <?php echo ($obj["contact"]); ?>
				           </td>
                                           <td nowrap align="right" width="10%">联系电话:</td>
                                           <td width="30%"><?php echo ($obj["mobile"]); ?></td>
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