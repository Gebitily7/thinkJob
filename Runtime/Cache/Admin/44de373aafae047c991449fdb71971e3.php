<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|OneThink管理平台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="/Public/static/select/jquery.cityselect.js"></script>
    <!--<![endif]-->
    
<style type="text/css">
	.upload-pre-item{
		width:400px;
		cursor: pointer;
	}
	.mask{
		display: none;
		position: fixed;
		left: 0;
		top: 0;
		width: 100%;
		background: rgba(0,0,0,.5);
		z-index: 999;
		overflow: hidden;
		cursor: pointer;
	}
	.mask img{
		display: block;
		width: 1000px;
        height: 650px;
		margin: 52px auto; 
	}
	.no-pass{
		display: none;
		position: fixed;
		padding: 20px 10px;
		width: 580px;
		height: 300px;
		top: 50%;
		left: 50%;
		transform: translate3D(-50%,-50%,0);
		background: rgba(0,0,0,.8);
		text-align: center;
	}
</style>	

</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <li><a href="<?php echo get_index_url();?>" target="_blank">前台</a></li>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
    <div class="main-title">
        <h2>认证详情页</h2>
    </div>
    <div class="mask">
    	<img src="<?php echo (get_cover($userDetail['licence'],'path')); ?>" alt="">
    </div>
    <form action="<?php echo U();?>" method="post" class="form-horizontal">
        <div class="form-item">
            <label class="item-label">公司名称<span class="check-tips">（用于验证查询）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="username" disabled value="<?php echo ($userDetail["c_name"]); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">公司规模<span class="check-tips">（公司规模即认证方式）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="username" disabled value="<?php echo ($userDetail["c_range"]); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">公司行业<span class="check-tips">（公司所处行业）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="username" disabled value="<?php echo (get_category_title($userDetail["industry"])); ?>">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">公司性质<span class="check-tips">（0:国企 1:外商融资 2:代表处 3:合资 4:民营 5:股份制企业 6:事业单位 7:国家机关 8:其他）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="username" disabled value="<?php echo ($userDetail["property"]); ?>">
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">公司详细地址<span class="check-tips">（河南省焦作市创业园3楼202室）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="username" disabled value="<?php echo ($userDetail["c_place_detail"]); ?>">
            </div>
        </div>
		
		<div class="form-item">
            <label class="item-label">法人姓名<span class="check-tips">（实名认证）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="username" disabled value="<?php echo ($userDetail["corporation"]); ?>">
            </div>
        </div>
		
		<div class="form-item">
            <label class="item-label">法人身份证号(18位)<span class="check-tips">（验证身份证号）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="username" disabled value="<?php echo ($userDetail["identity_num"]); ?>">
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">法人联系方式(电话)<span class="check-tips">（最好是手机）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="cor_phone" disabled value="<?php echo ($userDetail["cor_phone"]); ?>">
            </div>
        </div>

        <div class="form-item">
            <label class="item-label">法人手持身份证照片<span class="check-tips">（正面）</span></label>
            <?php if($userDetail['identity_x'] != ''): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($userDetail['identity_x'],'path')); ?>"/></div><?php endif; ?>
        </div>

        <div class="form-item">
            <label class="item-label">法人手持身份证照片<span class="check-tips">（反面）</span></label>
            <?php if($userDetail['identity_y'] != ''): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($userDetail['identity_y'],'path')); ?>"/></div><?php endif; ?>
        </div>
		
		<div class="form-item">
            <label class="item-label">营业执照照片<span class="check-tips">（正面）</span></label>
            <?php if($userDetail['licence'] != ''): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($userDetail['licence'],'path')); ?>"/></div><?php endif; ?>
        </div>

        <div class="form-item">
            <label class="item-label">邮箱<span class="check-tips">（用户邮箱，用于返回验证是否正确）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="email" disabled value="<?php echo ($userDetail["c_email"]); ?>">
            </div>
        </div>
    </form>

    <form action="<?php echo U('user/pre_identify');?>" method="post" class="form-identify">
    	<input type="hidden" name="cid" value="<?php echo ($userDetail["id"]); ?>">
    	<input type="hidden" name="identify" value="2">
    </form>
	
	<div class="no-pass">
		<form action="<?php echo U('user/pre_identify');?>" method="post" class="form-identify-no">
			<input type="hidden" name="cid" value="<?php echo ($userDetail["id"]); ?>">
	    	<input type="hidden" name="identify" value="3">
	    	<label class="item-label" style="font-size:16px; color:#fff;">不通过的理由<span class="check-tips"></span></label>
            <div class="controls">
                <textarea name="reason" cols="61" rows="12"></textarea>
            </div>
	    	<div class="form-item">
		        <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-identify-no">确定</button>
		        <div class="btn btn-return div-return">返 回</div>
		    </div>
	    </form>
	</div>

	<div class="form-item">
        <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-identify">通过</button>
        <div class="btn btn-return div-return-show">未通过</div>
        <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
    </div>


        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.job.com" target="_blank">JOB--by Gebitly7</a>管理平台</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/admin.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            //alert(url);
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <script type="text/javascript">
        //导航高亮
        highlight_subnav('<?php echo U("user/identify/id/$tid");?>');

        $(document).ready(function(){
        	var $window = $(window);
            $window.resize(function(){
                $(".mask").css("min-height", $window.height()+60);
            }).resize();

            $('.upload-pre-item').on('click',function(){
            	var src = $(this).find('img').attr('src');
            	$('.mask').find('img').attr('src',src);
            	$('.mask').css('display','block');
            });

            $('.mask').on('click',function(){
            	$(this).css('display','none');
            });

            $('.div-return').on('click',function(){
            	$('.no-pass').css('display','none');
            });

            $('.div-return-show').on('click',function(){
            	$('.no-pass').css('display','block');
            });

        });

    </script>

</body>
</html>