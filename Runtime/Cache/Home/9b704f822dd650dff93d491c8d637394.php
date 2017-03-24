<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<link rel="stylesheet" href="/Public/static/bootstrap/css/font-awesome.min.css"/>
<link href="/Public/Home/css/base.css" rel="stylesheet">
<link href="/Public/Home/css/header.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/Home/css/ad.css"/>
<link rel="stylesheet" href="/Public/Home/css/footer.css"/>
<link rel="shortcut icon" href="/Public/favicon.ico" />


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->

    <link rel="stylesheet" href="/Public/Home/css/user/register.css"/>

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/Public/Home/js/base.js"></script>
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
<!-- 头部 -->
<!-- 导航条
================================================== -->
<header class="header nav">
    <div class="content">
        <ul>
            <li style="margin-left: 0"><a href="<?php echo U('index/index');?>" style="color:#666666"><span>焦作市赛克尔网络科技</span></a></li>
            <?php if(is_login()): ?><li class="mgl">欢迎您,<a style="display: inline-block;" <?php if(session('user_type') == 1): ?>href="<?php echo U('userp/center');?>"<?php elseif(session('user_type') == 2): ?>href="<?php echo U('user/center');?>"<?php else: ?>href=""<?php endif; ?>><?php echo session('user_auth.nickname');?></a></li>
                <li><a href="<?php echo U('user/logout');?>">[退出]</a></li>
                <?php else: ?>
                <li class="mgl"><a href="<?php echo U('user/login');?>" title="请登录">请登录</a></li>
                <li><a href="<?php echo U('user/register');?>" title="免费注册">免费注册</a></li><?php endif; ?>
            <div class="head-bar fr">
                <li><a href="<?php echo U('index/index');?>" title="首页">首页</a></li>
                <li><span>|</span></li>
                <li><span></span></li>
                <li><span class="font" title="13203912762">服务热线:&ensp;13203912762</span></li>
            </div>
        </ul>
    </div>
</header>
<!-- /头部 -->

<!-- 主体 -->

<header class="jumbotron subhead" id="overview">
  <div class="container clearfix">
    <h2>用户注册</h2>
    <p><span><span class="pull-left"><span>已经有账号? <a href="<?php echo U('User/login');?>">点此登录</a> </span> </span></p>
  </div>
</header>

<div id="main-container" class="container" city="zhengzhou">
    <div class="row box clearfix">
        <!-- -->
        

<section class="main-wrap">
    <div class="form-bar">
        <div class="bar bar-left bar-checked" data-type="front">个人用户</div>
        <span>|</span>
        <div class="bar bar-right" data-type="back">企业用户</div>
    </div>
	<div class="container">
        <form autocomplete="off" class="login-form" actionp="<?php echo U('userp/register');?>" action="/index.php?s=/Home/user/register.html" method="post">
            <div class="register-box">
                <!-- 一般用户注册 -->
                <div class="scene-cell scene-front">
                    <div class="register-contents register-1">
                        <div class="control-group">
                            <label class="control-label" for="inputName">用户名</label>
                            <div class="controls">
                                <input type="text" id="inputName" tabindex="1" class="span3" placeholder="请输入用户名" ajaxurl="<?php echo U('userp/checkUserNameUnique');?>" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">密码</label>
                            <div class="controls">
                                <input type="password" id="inputPassword" tabindex="1" ajaxurl="<?php echo U('userp/checkPassword');?>" class="span3" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputRePassword">确认密码</label>
                            <div class="controls">
                                <input type="password" id="inputRePassword" tabindex="1" class="span3" ajaxurl="<?php echo U('userp/checkRePassword');?>" placeholder="请再次输入密码" recheck="password" errormsg="您两次输入的密码不一致" nullmsg="请填确认密码" datatype="*" name="repassword">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputEmail">邮箱</label>
                            <div class="controls">
                                <input type="text" id="inputEmail" class="span3" tabindex="1" placeholder="请输入电子邮件"  ajaxurl="<?php echo U('userp/checkEmail');?>" errormsg="请填写正确格式的邮箱" nullmsg="请填写邮箱" datatype="e" value="" name="email">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPhone">手机</label>
                            <div class="controls">
                                <input type="text" id="inputPhone" tabindex="1" class="span3" placeholder="请输入手机号码"  ajaxurl="<?php echo U('userp/checkMobile');?>" errormsg="请填写正确格式的手机号码" nullmsg="请填写手机号码" datatype="" value="" name="mobile">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group yzm">
                            <label class="control-label" for="inputYzm">验证码</label>
                            <div class="controls">
                                <input type="text" id="inputYzm" tabindex="1" class="span3" placeholder="请输入验证码"  errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
                            </div>
                            <div class="control-cap">
                                <div class="controls">
                                    <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('verify');?>" style="cursor:pointer;">
                                </div>
                                <div class="controls Validform_checktip text-warning" style="color:#EB2626; line-height: 40px;"></div>
                            </div>
                        </div>
                        <div class="login-switch">
                            <div class="button-wrap">
                                <a href="javascript:;" class="button" id="js-submit" data-type="1">注册</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /一般用户注册 -->

                <!-- 企业用户注册 -->
                <div class="scene-cell scene-back">
                    <div class="register-contents register-1">
                        <div class="control-group">
                            <label class="control-label" for="inputName1">用户名</label>
                            <div class="controls">
                                <input type="text" id="inputName1" class="span3" tabindex="2" placeholder="请输入用户名" ajaxurl="<?php echo U('user/checkUserNameUnique');?>" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword1">密码</label>
                            <div class="controls">
                                <input type="password" id="inputPassword1" tabindex="2"  class="span3" placeholder="请输入密码" ajaxurl="<?php echo U('user/checkPassword');?>"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputRePassword1">确认密码</label>
                            <div class="controls">
                                <input type="password" id="inputRePassword1" tabindex="2" class="span3" placeholder="请再次输入密码" ajaxurl="<?php echo U('user/checkRePassword');?>" recheck="password" errormsg="您两次输入的密码不一致" nullmsg="请填确认密码" datatype="*" name="repassword">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputCname">企业名称</label>
                            <div class="controls">
                                <input type="text" id="inputCname" class="span3" tabindex="2" placeholder="请输入企业名称" ajaxurl="<?php echo U('user/checkCname');?>" nullmsg="请填写企业名" datatype="*1-16" value="" name="c_name">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputEmail1">邮箱</label>
                            <div class="controls">
                                <input type="text" id="inputEmail1" class="span3" tabindex="2" placeholder="请输入电子邮件"  ajaxurl="<?php echo U('user/checkEmail');?>" errormsg="请填写正确格式的邮箱" nullmsg="请填写邮箱" datatype="e" value="" name="email">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputMobile">手机</label>
                            <div class="controls">
                                <input type="text" id="inputMobile" class="span3" tabindex="2" placeholder="请输入手机"  ajaxurl="<?php echo U('user/checkMobile');?>" errormsg="请填写正确格式的手机" nullmsg="请填写手机" datatype="e" value="" name="phone">
                            </div>
                            <div class="tips"></div>
                        </div>

                        <div class="control-group yzm">
                            <label class="control-label" for="inputYzm1">验证码</label>
                            <div class="controls">
                                <input type="text" id="inputYzm1" tabindex="2" class="span3" placeholder="请输入验证码"  errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
                            </div>
                            <div class="control-cap">
                                <div class="controls">
                                    <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('verify');?>" style="cursor:pointer;">
                                </div>
                                <div class="controls Validform_checktip text-warning" style="color: #EB2626;"></div>
                            </div>
                        </div>



                        <div class="login-switch">
                            <div class="button-wrap">
                                <a href="javascript:;" class="button" id="js-submit" data-type="2">注册</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /企业用户注册 -->
            </div>
        </form>
	</div>
</section>


    </div>
</div>

<script type="text/javascript">
    $(function(){
        $(window).resize(function(){
            $("#main-container").css("min-height", $(window).height() - 100);
        }).resize();



        var singleTab = function(objEvent,selectClass){
            $(objEvent).each(function(){
                $(this).on('click',function(){
                    var id = $(this).data(selectClass);
                    $('.'+selectClass+'-item').removeClass(selectClass+'-selected');
                    $(this).addClass(selectClass+'-selected');
                    $(this).siblings('.'+selectClass).val(id);
                });
            });
        };

        singleTab('.single1','sex');
        singleTab('.single2','drive');
        singleTab('.single3','settle');

        $('.single3').on('click',function(){
            $unit = $(this).data('unit');
            $unitValue = $(this).data('unitvalue');
            $id = $(this).data('settle');
            if($id == 0){
                $('.salary').val('面议');
            }else{
                $('.salary').val('');
            }
            $('.'+$unit).html($unitValue);
        });

    })
</script>
<!-- /主体 -->

<!-- 工具条 -->
<section id="top" class="tool toolbar2">
    <div class="toolbar2-box">
    <i class="fa fa-chevron-up fa-2x"></i>
    </div>
</section>
<script>
    $(document).ready(function(){
        var _scrollTop = $(this).scrollTop();
        this.addEventListener('scroll',function(){
            _scrollTop = $(this).scrollTop();
            backTop();
            return false;
        });
        $("#top").on('click',function(){
            $('html,body').animate({
                scrollTop : 0
            },'slow');
            return false;
        });
        var backTop = function(){
            if($(this).scrollTop() > 700){
                $("#top").css('display','block');
            }else{
                $("#top").css('display','none');
            }
        };
        backTop();
    });
</script>
<!-- /工具条 -->

<!-- 底部 -->

	<script type="text/javascript">
    	$(document)
	    	.ajaxStart(function(){
	    		$("button:submit").addClass("log-in").attr("disabled", true);
	    	})
	    	.ajaxStop(function(){
	    		$("button:submit").removeClass("log-in").attr("disabled", false);
	    	});

        $('input').on('blur',function(){
            var self = $(this);
            var oP   = self.parent().parent().find('.tips');
            var index = self.attr('tabindex');
            var url   = self.attr('ajaxurl');
            if(typeof url != 'undefined'){
                var data = {
                    'username' : self.val(),
                    'password' : $('#inputPassword').val()
                };
                $.post(url, data, success, "json");
            }
            return false;
            function success(data){
                switch (data.type){
                    case 1:
                        oP.css('color','#41B91E');
                        oP.html('<i class="fa fa-check-circle"></i>');
                        break;
                    default :
                        oP.css('color','#EB2626');
                        oP.html('<i class="fa fa-exclamation-circle"></i>'+data.info);
                        break;
                }
            }
        });

    	$(".button").click(function(){
            var index = $(this).data('type');

    		var self = $('form');
            var data = self.find('input[tabindex="'+index+'"]').serialize();
            if(index == 1){
                $.post(self.attr("actionp"), data, success, "json");
            }else if(index == 2){
                $.post(self.attr("action"), data, success, "json");
            }
    		return false;

    		function success(data){
    			if(data.status){
    				window.location.href = data.url;
    			} else {
    				self.find(".Validform_checktip").text(data.info);
    				//刷新验证码
    				$(".reloadverify").click();
    			}
    		}
    	});

		$(function(){
			var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });
		});

        $(function(){
            $('.bar').on('click',function(){
                var index = $(this).data('type');
                $(this).siblings().removeClass('bar-checked');
                $(this).addClass('bar-checked');
                $('.scene-front,.scene-back').css('display','none');
                $('.scene-'+index).css('display','block');
            });
        });
	</script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
    
</div>

<!-- /底部 -->
</body>
</html>