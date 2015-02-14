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
  <form method="post" enctype="multipart/form-data" name="myForm" id="myForm">
<div class="MainDiv">
<table width="99%" border="0" cellpadding="0" cellspacing="0" class="CContent">
  <tr>
      <th class="tablestyle_title" >编辑企业</th>
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
				<legend>编辑企业</legend>
					  <table border="0" cellpadding="2" cellspacing="1" style="width:100%">
					 
					  <tr>
					    <td nowrap align="right" width="30%">性质:</td>
					    <td width="35%">
                                            <select id="nature" name="nature" onchange="nature_change()">
                                            <option value="003001" <?php if('003001' == $obj['nature']): ?>selected="selected"<?php endif; ?>>公司</option>
                                            <option value="003002" <?php if('003002' == $obj['nature']): ?>selected="selected"<?php endif; ?>>平台</option>
                                            </select>
                                            
				            <span class="red">*</span></td>
					  </tr>
                                        
                                          <tr>
					    <td nowrap align="right" width="30%">所属行业:</td>
					    <td width="35%">
                                            <select name="trade"  onchange="trade_change();" id="trade">
                                            <?php if(is_array($trade_list)): $i = 0; $__LIST__ = $trade_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$trade): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == $obj['trade']): ?>selected='selected'<?php endif; ?>><?php echo ($trade); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
				            <span class="red">*</span></td>
					   </tr>
                                           
                                            <tr>
					    <td nowrap align="right" width="30%">企业logo:</td>
					    <td width="35%"><input type="file" name="logo" style="width:154px" />
                                            <img src="<?php echo ($obj["logo_url"]); ?>" width="50px" height="50px"/>
                                            </td>
					   </tr>
					 
    					 <tr>
					    <td nowrap align="right" width="30%">公司名称:</td>
					    <td width="35%"><input name='company_name' type="text" class="text" style="width:154px" value="<?php echo ($obj["company_name"]); ?>" onblur="check_company_name()"/>
				            <span class="red">*</span></td>
					   </tr>
                                           
                                            <tr>
					    <td nowrap align="right" width="30%">公司别名:</td>
					    <td width="35%">
                                            <textarea id="company_alias" name='company_alias' cols="30" rows="3"><?php echo ($company_alias); ?></textarea>注:之间用逗号隔开
				            </td>
					   </tr>
                                           
                                           <tr>
					    <td nowrap align="right" width="30%">认证级别:</td>
					    <td width="35%">
                                            <select name="auth_level" id="auth_level" onchange="auth_level_change()">
                                            <option value="006002" <?php if('006002' == $obj['auth_level']): ?>selected="selected"<?php endif; ?>>未验证</option>
                                            <option value="006001" <?php if('006001' == $obj['auth_level']): ?>selected="selected"<?php endif; ?>>黑平台</option>
                                            <option value="006003" <?php if('006003' == $obj['auth_level']): ?>selected="selected"<?php endif; ?>>合规</option>
                                            </select>
				            </td>
					   </tr>
                                                                                      
                                           <tr>
					    <td nowrap align="right" width="30%">联系地址:</td>
					    <td width="35%"><input name='reg_address' type="text" class="text" style="width:154px" value="<?php echo ($obj["reg_address"]); ?>" />
				            </td>
					   </tr>
                                           
                                           <tr>
					    <td nowrap align="right" width="30%">营业执照:</td>
					    <td width="35%">
                                            <input id="control_busin_license" type="checkbox" onclick="is_file_upload();" <?php if(0 != $obj['busin_license']): ?>checked<?php endif; ?>/>
                                            <input name='busin_license' id="busin_license" type="file" <?php if(0 == $obj['busin_license']): ?>style="display:none;"<?php endif; ?> />                                            
                                            <img id="img_busin_license" src="<?php echo ($obj["busin_license_url"]); ?>" width="50px" height="50px" <?php if(0 == $obj['busin_license']): ?>style="display:none;"<?php endif; ?>/>
				            </td>
					   </tr>
                                           
                                           <tr>
					    <td nowrap align="right" width="30%">机构代码证:</td>
					    <td width="35%">
                                            <input id="control_code_certificate" type="checkbox" onclick="is_file_upload();" <?php if(0 != $obj['code_certificate']): ?>checked<?php endif; ?>/>
                                            <input name='code_certificate' id="code_certificate" type="file" <?php if(0 == $obj['code_certificate']): ?>style="display:none"<?php endif; ?>/>
                                            <img id="img_code_certificate" src="<?php echo ($obj["code_certificate_url"]); ?>" width="50px" height="50px" <?php if(0 == $obj['code_certificate']): ?>style="display:none;"<?php endif; ?>/>
				            </td>
					   </tr>
                                           
                                           <tr>
					    <td nowrap align="right" width="30%">联系电话:</td>
					    <td width="35%"><input name='telephone' type="text" class="text" style="width:154px" value="<?php echo ($obj["telephone"]); ?>" />
				            </td>
					   </tr>
                                           
                                           <tr>
					    <td nowrap align="right" width="30%">官方网址:</td>
					    <td width="35%"><input id="website" name='website' type="text" class="text" style="width:154px" value="<?php echo ($obj["website"]); ?>" />
				            </td>
					   </tr>
                                           
                                           <tr>
					    <td nowrap align="right" width="30%">官网备案:</td>
					    <td width="35%"><input name='record' type="text" class="text" style="width:154px" value="<?php echo ($obj["record"]); ?>" />
				            </td>
					   </tr>
                                           
                                            <tr id="id_regulators_id">
					    <td nowrap align="right" width="30%">监管机构:</td>
					    <td width="35%">
                                             <select name='regulators_id' id="regulators_id">
                                             <option value=0 <?php if(0 == $obj['regulators_id']): ?>selected="selected"<?php endif; ?>>---请选择监管机构---</option>
                                             <?php if(is_array($regulators_list)): $i = 0; $__LIST__ = $regulators_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$regulators): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == $obj['regulators_id']): ?>selected="selected"<?php endif; ?>><?php echo ($regulators); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                             </select>
				            </td>
					   </tr>
                                           
                                           <tr id="id_find_website">
					    <td nowrap align="right" width="30%">查询网址:</td>
					    <td width="35%"><input name='find_website' type="text" class="text" style="width:154px" value="" />
				            </td>
					   </tr>
                                           
                                           <tr id="id_agent_flatform">
					    <td nowrap align="right" width="30%">代理平台:</td>
					    <td width="35%"> 
                                            <select id="agent_platform" name='agent_platform'>
                                            <option value=0 <?php if(0 == $obj['agent_platform']): ?>selected="selected"<?php endif; ?>>暂无代理平台</option>
                                            <?php if(is_array($agent_platform_list)): $i = 0; $__LIST__ = $agent_platform_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$agent_platform): $mod = ($i % 2 );++$i;?><option value=<?php echo ($key); ?> <?php if(intval($key) == $obj['agent_platform']): ?>selected="selected"<?php endif; ?>><?php echo ($agent_platform); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
				            </td>
					   </tr>
                                           
                                           <tr id="id_mem_sn">
					    <td nowrap align="right" width="30%">会员编号:</td>
					    <td width="35%"><input name='mem_sn' type="text" class="text" style="width:154px" value="<?php echo ($obj["mem_sn"]); ?>" />
				            </td>
					   </tr>
                                           
                                           <tr id="id_certificate">
					    <td nowrap align="right" width="30%">资质证明:</td>
					    <td width="35%">
                                            <input id="control_certificate" type="checkbox" onclick="is_file_upload();" <?php if(0 != $obj['certificate']): ?>checked<?php endif; ?>/>
                                            <input id="certificate" name='certificate' type="file" <?php if(0 == $obj['certificate']): ?>style="display:none;"<?php endif; ?>/>
                                            <img id="img_certificate" src="<?php echo ($obj["certificate_url"]); ?>" width="50px" height="50px" <?php if(0 == $obj['certificate']): ?>style="display:none;"<?php endif; ?>/>
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
                        <input type="hidden" name="id" value="<?php echo ($obj["id"]); ?>"/>
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
function check_company_name() {
    var company_name = $('#company_name').val();
    var id = $('#id').val();
    company_name = encodeURI(company_name);
    jQuery.ajax({  
		        type:"post",  
		        url:"<?php echo ($call_url); ?>",
		        timeout: 5000,  
		        dataType:"json",  
		        data:{"method":"Company.exists_name_ex","type":"text","content":{"company_name":company_name,'id':id}},
		        success: function aa(data) {
                            if (200 == data.status_code
                            &&  0 == data.content.is_exists) {
                                $('#company_name').val("");
                                $('#company_name').focus();
                                alert('此企业名称已存在');
                            }
                        }
    });
}

//提交审核
function validate()
{
    var company_name = $('#company_name').val();
    var company_type = $('#company_type').val();
    var website      = $('#website').val();
    //公司名称
    if ('' == company_name) {
        alert('企业名称不为空');
        return false;
    }
    
    check_company_name();
    
    //验证企业网址
    //检查url
    if (!checkData.isEmpty(website)) {
        if(!checkData.isURLSpan('website'))  
        {
            alert('网址不合法');
            return false;
        }   
    }
    
    return true;
}

var is_first = 0;
function auth_level_change()
{
  var nature_val = $('#nature').val();
  var auth_level_val = $('#auth_level').val();
  if('003001' == nature_val)
  {
    var is_limit = 0;
    switch(auth_level_val)
    {
      case '006002':
      case '006003':
      {
        is_limit = 1;
      }
      break;
      case '006001'://all
      {
        is_limit = 0;
      }
      break;
    }
    var param_data = {};
    if(is_limit)
    {
      param_data = {"method":"Company.get_id_name_map",
                   "type":"text",
                   "content":{"where":{"nature":"003002","auth_level":["in",["006002","006003"]]}}};
    }
    else
    {
      param_data = {"method":"Company.get_id_name_map","type":"text","content":{"where":{"nature":"003002"}}};
    }
    jQuery.ajax({  
            type:"post",  
            url:"<?php echo ($call_url); ?>",
            async:false,
            timeout: 5000,  
            dataType:"json",  
            data:param_data,
            success: function aa(data) {
                            if (200 == data.status_code) {
                                var agent_platform_val = <?php echo ($obj['agent_platform']); ?>;
                                $('#agent_platform').empty();                                
                                $('#agent_platform').append("<option value=0>暂无代理平台</option>");
                                $.each(data.content, function(index, item){                                
                                  if(0 == is_first)
                                  {
                                    if(parseInt(index) == parseInt(agent_platform_val))
                                    {
                                      $('#agent_platform').append("<option value="+index+" selected='selected'>"+item+"</option>");
                                    }
                                    else                                      
                                    {
                                      $('#agent_platform').append("<option value="+index+">"+item+"</option>");
                                    }
                                  }
                                  else
                                  {
                                    $('#agent_platform').append("<option value="+index+">"+item+"</option>");
                                  }
                                });
                            }
                        }
      });
  }
}

//企业性质改变
function nature_change()
{
    var nature_val = $('#nature').val();
    if('003002' == nature_val)//平台
    {
        $('#id_find_website').hide();
        $('#id_agent_flatform').hide();
        $('#id_mem_sn').hide();
        $('#id_certificate').hide();
    }
    else
    {
        $('#id_agent_flatform').show();
        $('#id_find_website').show()
        $('#id_mem_sn').show();
        $('#id_certificate').show();;
    }
}

function is_file_upload()
{
    var control_busin_license    = document.getElementById('control_busin_license').checked;//营业执照
    var control_code_certificate = document.getElementById('control_code_certificate').checked;//组织代码证
    var control_certificate      = document.getElementById('control_certificate').checked;//资质证明
    
    //营业执照
    if (control_busin_license)
    {
        $('#busin_license').show();
        $('#img_busin_license').show();
    }
    else
    {
        $('#img_busin_license').hide();
        $('#busin_license').hide();
        $('#busin_license').val("");
    }
    
    //组织代码证
    if (control_code_certificate) {
        $('#code_certificate').show();
        $('#img_code_certificate').show();
    }else
    {
        $('#img_code_certificate').hide();
        $('#code_certificate').hide();
        $('#code_certificate').val("");
    }
    
    //资质证明
    if (control_certificate) {
        $('#certificate').show();
        $('#img_certificate').show();
    }
    else{
        $('#img_certificate').hide();
        $('#certificate').hide();
        $('#certificate').val("");
    }
}

function trade_change(){
    var trade = $('#trade').val();
    if ('004002' == trade)//外汇
    {
        $('#id_regulators_id').show();
    }
    else
    {
        $('#regulators_id').val(0);
        $('#id_regulators_id').hide();
    }
}

$(function(){
    nature_change();
    auth_level_change();
    trade_change();
});
</script>