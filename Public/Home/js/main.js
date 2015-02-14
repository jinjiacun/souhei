// JavaScript Document

$(function(){
	//密码修改显示
	$(".xgmm").click(function(){
		$(".tcwindows_xgdlmm").show();		
	});
	//关闭
	$(".close_xgdlmm a").click(function(){
		$(".tcwindows_xgdlmm").hide();
	});
	//失败关闭
	$(".yzsbai .xigs").click(function(){
		$(".yzsbai").hide();
		$(".bd_wd").hide();	
		//window.location.reload();
	});	
	//成功关闭
	$(".yzsbai1 .xigs1").click(function(){
		$(".yzsbai1").hide();
		$(".bd_wd1").hide();	
		window.location.reload();
	});		
//首页搜索
    $(".searchbox ul li").click(function(){
	   var test =$(this).attr("alt");
	   $(".searchbox ul li").removeClass("active");
	   $(this).addClass("active");
	   $(this).parents('.searchbox').find(".chuax1").val(test);
	   inputTipText(); 
	   
	   });

//头部fix
   $(window).scroll(function(){
	   if ($(window).scrollTop()>44){
	   $(".header_fixbox").addClass("fixbox");
	   }
	   else{
		    $(".header_fixbox").removeClass("fixbox");
		   
		   }
		   });
		   
//头部fix
   $(window).scroll(function(){
	   if ($(window).scrollTop()>372){
	   $(".cont_lta").addClass("fixboxs");
	   }
	   else{
		    $(".cont_lta").removeClass("fixboxs");
		   
		   }
		   });	   
		   

//上传照片_弹窗 Begin

	$(".tupian").click(function(){
        $(".filebox").show();
		$(".filebox ul li:eq(0)").show();
	});
	
	document.onclick = function (e) {
        var e = e ? e : window.event;
        var tar = e.srcElement || e.target;
        if (tar.type != "file"&&tar.className!="tupian"&&tar.tagName.toLocaleLowerCase()!="a") {
           $(".filebox").hide();
        }
    }
	
	$(".filebox ul li a").click(function(){
		var m=$(".filebox ul li a").index($(this))
		if(m!=4){
			$(this).parent("li").hide();
		}
		$(this).parent("li").find("input").val("");
	});	
	
	$(".filebox ul li input").change(function(){
		var texts = $(this).val();
		var i=$(".filebox ul li input").index($(this));
		if(texts != ""){
			$(".filebox ul li").eq(i+1).show();
			}
	});	

	$(".liulan").click(function(){
        $("#tcwindows_tp").show();
	});
	
	$(".close_tp a").click(function(){
		$(this).parents("#tcwindows_tp").hide();
	});
	
    $(".tipbox_tp ul li").hover(function(){ 
	
			$(this).children("span").css("display","block");
		 
		},function(){
			
			$(this).children("span").hide();
			
			}
		);
		
	 $(".tipbox_tp ul li span").click(function(){
		 
		 $(this).parent("li").remove();
		
		 });
		 
 $(".add").click(function(){
	
	var lengthbox = $(".tipbox_tp ul li").length;
	
		if(lengthbox<=5){	
			 $(this).parents("ul").children("li.last").before('<li class="filebox" ><input name="N' + ( lengthbox ++) + '" type="file"/><p>开始上传</p></li>');	
		}else{
				
			alert("对不起！您最多只能传5张。")
		}		 
	});	 
///////////////////////////////////////上传照片_弹窗 End	
	
//平台查询	
    $(".ptcx").click(function(){
	    $(".chuax1").select();
		$(".chuax1").val("")
		});
//打开登陆
	$(".hd_fix_rt2, .yidel").click(function(){
		$(".bd_wd").css("width", $(document).width());
        $(".bd_wd").css("height", $(document).height());
        $(".bd_wd").show();
        $("#tcwindows1").show();
	});

 //关闭弹出窗口	
	$(".close").click(function(){
		$(".input1").val(''); 
		$(".post2").val(''); 
		$(this).parents("#tcwindows1").hide();
		$(".bd_wd").hide();	
	});
	
 //查询最多
		$(".zuiduo li").hover(function(){
		$(this).children("a").stop(true,true).animate({"top": "-63"}, 300);
		},function(){
		$(this).children("a").stop(true,true).animate({"top": "0"}, 300);
		})


/////////////////////////////////////////////////曝光动态
 //   var le_height = $(".dongtai ol").height();
 //   if(le_height>798){
 //    var index = 0;
 //    var adtimer;
 //    var _wrap = $(".dongtai ol"); //
 //    var len = $(".dongtai ol li").length;
 //    //len=1;
 //    if (len > 1) {
 //        $(".dongtai").hover(function() {
 //            clearInterval(adtimer);
 //        },
 //        function() {
 //            adtimer = setInterval(function() {

 //                var _field = _wrap.find('li:first'); //此变量不可放置于函数起始处,li:first取值是变化的
 //                var _h = _field.height(); //取得每次滚动高度(多行滚动情况下,此变量不可置于开始处,否则会有间隔时长延时)
 //                _field.animate({
 //                    marginTop: -_h + 'px'
 //                },
 //                500,
 //                function() { //通过取负margin值,隐藏第一行
 //                    _field.css('marginTop', 0).appendTo(_wrap); //隐藏后,将该行的margin值置零,并插入到最后,实现无缝滚动
 //                })

 //            },
 //            3000);
 //        }).trigger("mouseleave");
 //        function showImg(index) {
 //            var Height = $(".dongtai").height();
 //            $(".dongtai ol").stop().animate({
 //                marginTop: -_h + 'px'
 //            },
 //            1000);
 //        }


 //    }
	
 // }
	
	});
	
//查询动态		
$(function(){
	var le_height = $("#demo ol").height();
	if(le_height>278){
    var index = 0;
    var adtimer;
    var _wrap = $("#demo ol"); //
    var len = $("#demo ol li").length;
    //len=1;
    if (len > 1) {
        $("#demo").hover(function() {
            clearInterval(adtimer);
        },
        function() {
            adtimer = setInterval(function() {

                var _field = _wrap.find('li:first'); //此变量不可放置于函数起始处,li:first取值是变化的
                var _h = _field.height(); //取得每次滚动高度(多行滚动情况下,此变量不可置于开始处,否则会有间隔时长延时)
                _field.animate({
                    marginTop: -_h + 'px'
                },
                500,
                function() { //通过取负margin值,隐藏第一行
                    _field.css('marginTop', 0).appendTo(_wrap); //隐藏后,将该行的margin值置零,并插入到最后,实现无缝滚动
                })

            },
            2000);
        }).trigger("mouseleave");
        function showImg(index) {
            var Height = $("#demo").height();
            $("#demo ol").stop().animate({
                marginTop: -_h + 'px'
            },
            500);
        }

      }
    }
	
//企业认证	
	$(".tj_box_close").click(function(){		
		$(".tj_box, .tjsb_box").hide();		
	});	
	
//监管机构
	$(".yis1 ul li:last").css("border","none");
	$(".yis2 ul li:last").css("border","none");
	$(".tit li").hover(function(){
		$(this).parents("ul").children("li").removeClass("activ");
		$(this).addClass("activ");
		for(var i = 0; i < $(this).parents("ul").children("li").length; i++)
	{
		if($(this).parents("ul").children("li").eq(i).attr("class") == "activ")
	{
		$(this).parents("div.jigou").children("div.jg_nr").removeClass("show").addClass("hide");
		$(this).parents("div.jigou").children("div.jg_nr").eq(i).removeClass("hide").addClass("show");
			}
		}
	});		
	
//个人中心-- 修改个人信息 
	$(".xggrxx").click(function(){
		$(".tcwindows_grzx").show();
		});
	$(".qvxiao").click(function(){
		$(".tcwindows_grzx").hide();
		});	
		
//帮助中心--全部品种切换			
		
	$(".helps ul li").click(function(){
			$(".helps ul li").removeClass("actives");
			$(this).addClass("actives")
			$(this).children("div").show();
			
		});
		
	$(".helps ul li h3:last").css("border","none");
	
	
	
//找回密码--登录		
	$(".yidel").click(function(){		
		$("#longgin").show(); 	 
	})		
		
//认证平台推荐		
	$(".rzpttj ul li:last").css("border","none");		
//我要评论		
	$(window).scroll(function(){
		if ($(window).scrollTop()>655){
			$("#fixeds").addClass("fixeds");
		}else{
		    $("#fixeds").removeClass("fixeds");		 
		}
	});					 				 
//展开收起回复评论					 			 
$(".baoguan_pl2 dl.pinglubox dd.pinglubox_rt .hfpl_chd .timens p a.huifu_btn").each(function(){
	
	$(this).click(function(){
	 var val_tit = $(this).text();
		if(val_tit == "收起回复"){
			$(this).text("回复");
			$(this).removeClass("hfusd");
			$(this).parents(".hfpl_chd").children(".showhide").hide();
			$(this).parents(".hfpl_chd").find(".emem").show();
			$(this).parents(".hfpl_chd").find(".emem1").show();
			}else{
			$(this).text("收起回复");
			$(this).addClass("hfusd");
			$(this).parents(".hfpl_chd").children(".showhide").show();
			//$(this).parents(".hfpl_chd").children(".showhide").children('.fanbiaob').show();
			$(this).parents(".hfpl_chd").find(".emem").hide();
			$(this).parents(".hfpl_chd").find(".emem1").hide();
			}		
		});
	});	
});
/*失焦获焦*/
function inputTipText(){
	$("input[class*=common_text]") 
	.each(function(){
	   var oldVal=$(this).val();     
	   $(this)
	   .css({"color":"#c4c4c4"})    
	   .focus(function(){
	    	if($(this).val()!=oldVal){$(this).css({"color":"#c4c4c4"})}else{$(this).val("").css({"color":"#000"})}
		//$(this).css({"border":"1px solid #3b5998"})
	   })
	   .blur(function(){
	    	if($(this).val()==""){$(this).val(oldVal).css({"color":"#c4c4c4"})}
		//$(this).css({"border":"1px solid #dfdfdf"})
	   })
	   .keydown(function(){$(this).css({"color":"#000"})})	  	
	})
}

$(function(){
	inputTipText();    
})

function out(){ 
$('#bb').animate({top:'0'}, 500, function(){ 
$(this).css({display:'none', top:'-25px'}); 
}); 
} 
 

/*返回顶部*/
$(document).ready(function(){
	//首先将#back-to-top隐藏
	$("#back-to-top").hide();
	//当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
	$(function () {
	$(window).scroll(function(){
		if ($(window).scrollTop()>300){
			$("#back-to-top").fadeIn(1500);
		}
		else
		{
			$("#back-to-top").fadeOut(1500);
		}
	});
	//当点击跳转链接后，回到页面顶部位置
	$("#back-to-top").click(function(){
		$('body,html').animate({scrollTop:0},1000);
			return false;
		});
	});
});	