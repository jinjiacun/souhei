<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(/yms/Public/Admin/images/left.gif);
}
-->
</style>
<link href="/yms/Public/Admin/css/css.css" rel="stylesheet" type="text/css" />
</head>
<SCRIPT language=JavaScript>
function tupian(idt){
    var nametu="xiaotu"+idt;
    var tp = document.getElementById(nametu);
    tp.src="/yms/Public/Admin/images/ico05.gif";
	
	for(var i=1;i<30;i++)
	{
	  
	  var nametu2="xiaotu"+i;
	  if(i!=idt*1)
	  {
	    var tp2=document.getElementById('xiaotu'+i);
		if(tp2!=undefined)
	    {tp2.src="/yms/Public/Admin/images/ico06.gif";}
	  }
	}
}

function list(idstr){
	var name1="subtree"+idstr;
	var name2="img"+idstr;
	var objectobj=document.all(name1);
	var imgobj=document.all(name2);
	
	
	//alert(imgobj);
	
	if(objectobj.style.display=="none"){
		for(i=1;i<10;i++){
			var name3="img"+i;
			var name="subtree"+i;
			var o=document.all(name);
			if(o!=undefined){
				o.style.display="none";
				var image=document.all(name3);
				//alert(image);
				image.src="/yms/Public/Admin/images/ico04.gif";
			}
		}
		objectobj.style.display="";
		imgobj.src="/yms/Public/Admin/images/ico03.gif";
	}
	else{
		objectobj.style.display="none";
		imgobj.src="/yms/Public/Admin/images/ico04.gif";
	}
}

</SCRIPT>

<body>
<table width="198" border="0" cellpadding="0" cellspacing="0" class="left-table01">
  <tr>
    <TD>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td width="207" height="55" background="/yms/Public/Admin/images/nav01.gif">
				<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="25%" rowspan="2"><img src="/yms/Public/Admin/images/ico02.gif" width="35" height="35" /></td>
					<td width="75%" height="22" class="left-font01">您好，<span class="left-font02"><?php echo ($admin_name); ?></span></td>
				  </tr>
				  <tr>
					<td height="22" class="left-font01">
						[&nbsp;<a href="../login.html" target="_top" class="left-font01">退出</a>&nbsp;
						&nbsp;<a href="/yms/index.php/Soadmin/Admin/edit_ex/admin_name/<?php echo ($admin_name); ?>" target="mainFrame">修改密码</a>]</td>
				  </tr>
				</table>
			</td>
		  </tr>
		</table>
	 
		<!--  入库管理开始    -->
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img8" id="img8" src="/yms/Public/Admin/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('8');" >入库管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree8" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu20" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="/yms/index.php/Soadmin/Inexposal/get_list" target="mainFrame" class="left-font03" onClick="tupian('20');">曝光申请</a></td>
				</tr>
				<tr>
				  <td width="9%" height="21" ><img id="xiaotu21" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%"><a href="/yms/index.php/Soadmin/Inexposal/get_list_ex" target="mainFrame" class="left-font03" onClick="tupian('21');">可信企业申请</a></td>
				</tr>
      </table>
		<!--  入库管理结束    -->
	 

	 	<!--  企业管理开始    -->
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img7" id="img7" src="/yms/Public/Admin/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('7');" >企业管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree7" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu17" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="/yms/index.php/Soadmin/Company/add" target="mainFrame" class="left-font03" onClick="tupian('17');">添加企业</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu18" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="/yms/index.php/Soadmin/Company/get_list" target="mainFrame" class="left-font03" onClick="tupian('18');">企业管理</a></td>
				</tr>
      </table>
		<!--  企业管理结束    -->
	
	<!--  评价管理开始    -->
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img6" id="img6" src="/yms/Public/Admin/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('6');" >评论管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree6" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu16" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="/yms/index.php/Soadmin/Comment/get_list" target="mainFrame" class="left-font03" onClick="tupian('16');">评论管理</a></td>
				</tr>
				<!--
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu15" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="/yms/index.php/Soadmin/Comment/get_news_list" target="mainFrame" class="left-font03" onClick="tupian('15');">评论(新闻)管理</a></td>
				</tr>
				-->
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu14" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="/yms/index.php/Soadmin/Comment/get_exposal_list" target="mainFrame" class="left-font03" onClick="tupian('14');">评论(曝光)管理</a></td>
				</tr>
      </table>
		<!--  评价管理结束    -->	
		

		<!--  新闻管理开始    -->
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img5" id="img5" src="/yms/Public/Admin/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('5');" >新闻管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree5" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu13" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="/yms/index.php/Soadmin/News/add" target="mainFrame" class="left-font03"  onClick="tupian('13');">添加企业新闻</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu12" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="/yms/index.php/Soadmin/News/get_list" target="mainFrame" class="left-font03" onClick="tupian('12');">企业新闻管理</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu11" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="/yms/index.php/Soadmin/News/add_ex" target="mainFrame" class="left-font03" onClick="tupian('11');">添加系统新闻</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu10" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
						<a href="/yms/index.php/Soadmin/News/get_list_ex" target="mainFrame" class="left-font03" onClick="tupian('10');">系统新闻管理</a></td>
				</tr>
				
      </table>
		<!--  新闻管理结束    -->
		
		<!--  监管机构管理开始    -->
		<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img4" id="img5" src="/yms/Public/Admin/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('4');" >监管机构管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree4" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu9" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
				  <a href="/yms/index.php/Soadmin/Regulators/add" target="mainFrame" class="left-font03"  onClick="tupian('9');">添加监管机构</a></td>
				</tr>
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu8" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
				  <a href="/yms/index.php/Soadmin/Regulators/get_list" target="mainFrame" class="left-font03"  onClick="tupian('8');">管理监管机构</a></td>
				</tr>
      </table>
		<!--  监管机构管理结束    -->
      
      <?php if(1 == $is_show): ?><!-- 媒体管理开始-->
		 <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img1" id="img1" src="/yms/Public/Admin/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('1');" >媒体管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree1" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu1" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
				  <a href="/yms/index.php/Soadmin/Media/get_list"  target="mainFrame" class="left-font03" onClick="tupian('1');">图片管理</a>
				  </td>
				</tr>
      </table>
		<!-- 媒体管理结束 -->
		
		<!-- 会员管理开始-->
		 <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img2" id="img2" src="/yms/Public/Admin/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('2');" >会员管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>
		<table id="subtree2" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu2" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
				  <a href="/yms/index.php/Soadmin/User/get_list"  target="mainFrame" class="left-font03" onClick="tupian('2');">会员管理</a>
				  </td>
				</tr>
      </table>
		<!-- 会员管理结束 -->

		<if condition="true eq $display">
		
				<!-- 会员管理开始-->
		 <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" class="left-table03">
          <tr>
            <td height="29">
				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="8%"><img name="img100" id="img2" src="/yms/Public/Admin/images/ico04.gif" width="8" height="11" /></td>
						<td width="92%">
								<a href="javascript:" target="mainFrame" class="left-font03" onClick="list('100');" >系统管理</a></td>
					</tr>
				</table>
			</td>
          </tr>		  
        </TABLE>	
		<table id="subtree100" style="DISPLAY: none" width="80%" border="0" align="center" cellpadding="0" 
				cellspacing="0" class="left-table02">
				<tr>
				  <td width="9%" height="20" ><img id="xiaotu100" src="/yms/Public/Admin/images/ico06.gif" width="8" height="12" /></td>
				  <td width="91%">
				  <a href="/yms/index.php/Soadmin/Admin/get_list"  target="mainFrame" class="left-font03" onClick="tupian('100');">帐号管理</a>
				  </td>
				</tr>
      </table>
		<!-- 会员管理结束 --><?php endif; ?>
	  </TD>
  </tr>
  
</table>
</body>
</html>