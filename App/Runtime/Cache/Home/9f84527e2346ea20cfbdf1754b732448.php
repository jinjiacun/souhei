<?php if (!defined('THINK_PATH')) exit();?><!--头部--Begin-->   
  <div class="header_fixbox">
      <div class="header_fix header_fixbox_ny">
          <div class="header_fix_lt">
                <a href="/yms/index.php/home" class="hd_fix_logo" ><img src="/yms/Public/Home/images/logo2.png" /></a>
                <input name="search_name" id="search_name" type="text" class="hd_fix_lt3" />
                <input name="button" type="button" class="hd_fix_lt4" />
          </div>
          <div class="header_fix_rt">
                <a href="#">软件下载</a>
                <a href="/yms/index.php/home/Inexposure/exposure">我要曝光</a>
                <a href="/yms/index.php/home/Inexposure/authentication">合规认证</a>
                <?php if($userid != '' ): ?><p class="jingru">您好，
                   <a href="/yms/index.php/home/user/user_center/d/<?php echo ($userid); ?>"><?php echo ($nickname); ?>&nbsp</a>
                   <a href="/yms/index.php/home/user/logout">退出</a>
                </p>
                <?php else: ?> 
                <a href="/yms/index.php/home/user/user_register" class="hd_fix_rt1" >注册</a>
                <a href="javascript:void(0)" class="hd_fix_rt2" >登录</a><?php echo ($aaa); endif; ?>
          </div>
      
      </div>
  </div> 
  <script type="text/javascript">
  $(function(){
    //搜索
    $('.hd_fix_lt4').click(function(){
          var search_name = $(this).parents('.header_fix_lt').find('.hd_fix_lt3').val();
          var usaa = '<?php echo ($userid); ?>';
          if(search_name == ""){ 
              alert("请输入搜索内容！"); 
              return false; 
          }
          if (usaa == "") {
            alert('请登录之后操作！');
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
                  usaa:usaa,
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
});
</script>
<!--头部--End-->