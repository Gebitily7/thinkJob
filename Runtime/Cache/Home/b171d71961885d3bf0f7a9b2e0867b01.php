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

    <link href="/Public/Home/css/user/home.css" rel="stylesheet" type="text/css">

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

<div id="main-container" class="container" city="zhengzhou">
    <div class="row box clearfix">
        <!---->
        <!--&lt;!&ndash; 左侧 nav-->
        <!--================================================== &ndash;&gt;-->
            <!--<div class="span3 bs-docs-sidebar">-->
                <!---->
                <!--<ul class="nav nav-list bs-docs-sidenav">-->
                    <!--<?php echo W('Category/lists', array($category['id'], ACTION_NAME == 'index'));?>-->
                <!--</ul>-->
            <!--</div>-->
        <!---->
        
    <div class="main-wrap">
        <div class="container" id="js_container_box">
            <form autocomplete="off" actionp="<?php echo U('home/userp/login');?>"  action="/index.php?s=/Home/user/login.html" id="js-login_form" method="post" data-type="1">
                <div class="cloud-title"><span>job，全新的找工作方式</span></div>
                <div class="login-box">
                    <div id="js-login_box" class="login-scene">

                        <!-- !帐号登录 -->
                        <div class="scene-cell scene-front">
                            <div class="login-tab">
                                <a lgb-nav="login-scene" href="javascript:;" class="current">个人登录</a>
                                <a lgb-nav="login-scene scene-reversal" href="javascript:;"><s class="ilt-qrcode"></s><span>企业登录</span></a>
                            </div>
                            <div class="login-contents login-1">
                                <div id="" class="login-row lr-account">
                                    <div class="input-cell">
                                        <label for="js-account" style="">帐号</label>
                                        <input type="text" id="js-account" tabindex="1" ajaxurl="/member/checkUserNameUnique.html" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
                                    </div>
                                    <div class="controls Validform_checktip1 text-warning"><i class="fa fa-exclamation-circle"></i></div>
                                </div>
                                <div class="login-row lr-account">
                                    <div class="input-cell">
                                        <label for="js-passwd">密码</label>
                                        <input type="password" id="js-passwd" tabindex="1" errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
                                    </div>
                                    <div class="controls Validform_checktip2 text-warning"><i class="fa fa-exclamation-circle"></i></div>
                                </div>
                                <div class="login-row clearfix">
                                    <div class="input-cell fl">
                                        <label for="js-yzm">验证码</label>
                                        <input type="text" id="js-yzm" tabindex="1" errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
                                    </div>
                                    <div class="control-group fl">
                                        <div class="controls">
                                            <img class="verifyimg reloadverify" title="点击切换" src="<?php echo U('verify');?>" style="cursor:pointer;">
                                        </div>
                                    </div>
                                    <div class="controls Validform_checktip3 text-warning"><i class="fa fa-exclamation-circle"></i></div>
                                </div>
                                <div class="login-switch">
                                    <div class="button-wrap">
                                        <a href="javascript:;" class="button" id="js-submit">登录</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//帐号登录-->

                        <!-- !企业登陆 -->
                        <div class="scene-cell scene-back">
                            <div class="login-tab">
                                <a lgb-nav="login-scene" href="javascript:;" class="current"><s class="ilt-qrcode"></s>企业登陆</a>
                                <a lgb-nav="login-scene scene-reversal" href="javascript:;"><span>个人登录</span></a>
                            </div>
                            <div class="login-contents login-2">

                                <div class="login-row lr-account">
                                    <div class="input-cell">
                                        <label for="js-account" style="">企业帐号</label>
                                        <input type="text" name="username" id="js-account" tabindex="2" value="">
                                    </div>
                                    <div class="controls Validform_checktip1 text-warning"><i class="fa fa-exclamation-circle"></i></div>
                                </div>

                                <div class="login-row lr-account">
                                    <div class="input-cell">
                                        <label for="js-passwd">密码</label>
                                        <input type="password" name="password" id="js-passwd" tabindex="2">
                                    </div>
                                    <div class="controls Validform_checktip2 text-warning"><i class="fa fa-exclamation-circle"></i></div>
                                </div>

                                <div class="login-row clearfix">
                                    <div class="input-cell fl">
                                        <label for="js-yzm">验证码</label>
                                        <input type="text" name="verify" id="js-yzm" tabindex="2">
                                    </div>
                                    <div class="control-group fl">
                                        <div class="controls">
                                            <img class="verifyimg reloadverify" title="点击切换" src="<?php echo U('verify');?>" style="cursor:pointer;">
                                        </div>
                                    </div>
                                    <div class="controls Validform_checktip3 text-warning"><i class="fa fa-exclamation-circle"></i></div>
                                </div>

                                <div class="login-switch">
                                    <div class="button-wrap">
                                        <a href="javascript:;" class="button" id="js-submit">登录</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/企业登陆-->
                    </div>

                </div>
                <div class="login-status">
                    <input type="checkbox" id="js-remember_pwd" tabindex="5">
                    <label for="js-remember_pwd">5天内免登录</label>
                    <a href="<?php echo U('');?>" id="js-forgot_passwd" tabindex="6">无法登录?</a>
                </div>
                <div class="register-hint">还没有帐号？<a rel="register" href="<?php echo U('User/register');?>" target="_blank">免费注册</a></div>
            </form>
        </div>

        

</div>

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

    <script>
        $(document)
                .ajaxStart(function(){
                    $('.text-warning').each(function(){
                        $(this).css({
                            'visibility' : 'hidden',
                            'zIndex'     : '0'
                        });
                    });
                })
                .ajaxStop(function(){
                    $("button:submit").removeClass("log-in").attr("disabled", false);
                });
        $(document).ready(function(){
            /* 初始化高度 */
            $(window).resize(function(){
                var height = $(window).height() > 641 ? $(window).height() : 673;
                $('.main-wrap').css('height',height+"px");
            }).resize();

            $("a[lgb-nav='login-scene scene-reversal']").each(function(){
                $(this).on('click',function(){
                   $('.login-scene').toggleClass('scene-reversal');
                   if($('.login-scene').hasClass('scene-reversal')){
                       $("form").data('type','2');
                   }else{
                       $("form").data('type','1');
                   }
                });
            });
            /**/
            $('.input-cell').each(function(){
                var label = $(this).children('label');
                var text = label.html();
                $(this).find('input').on('focus',function(){
                    label.html('');
                });
                $(this).find('input').on('blur',function(){
                    if($(this).val() == ''){
                        label.html(text);
                    }
                });
            });
        });

        $(document).on('keydown',function(e){
            if(e.keyCode == 13){
                var self = $("form");
                var index = self.data('type');
                var data = self.find('input[tabindex="'+index+'"]').serialize();
                if(index == 1){
                    $.post(self.attr("actionp"), data, success, "json");
                }else{
                    $.post(self.attr("action"), data, success, "json");
                }
                return false;

                function success(data){
                    if(data.status){
                        window.location.href = data.url;
                    } else {
                        self.find(".login-"+index+" .Validform_checktip"+data.info[0]).css({
                            'visibility' : 'visible',
                            'zIndex'     : '1'
                        });
                        self.find(".login-"+index+" .Validform_checktip"+data.info[0]).attr('title',data.info[1]);
                        //刷新验证码
                        $(".reloadverify").click();
                    }
                }
            }
        });

        $('.button').click(function(){
            var self = $("form");
            var index = self.data('type');
            var data = self.find('input[tabindex="'+index+'"]').serialize();
            var time = self.find('input:checked').attr('tabindex');
            if(index == 1){
                $.post(self.attr("actionp"), data, success, "json");
            }else if(index == 2){
                $.post(self.attr("action"), data, success, "json");
            }
            return false;

            function success(data){
                if(data.status){
                    if(typeof time != 'undefined'){
                        console.log(data);
                    }
                    window.location.href = data.url;
                } else {
                    self.find(".login-"+index+" .Validform_checktip"+data.info[0]).css({
                        'visibility' : 'visible',
                        'zIndex'     : '1'
                    });
                    self.find(".login-"+index+" .Validform_checktip"+data.info[0]).attr('title',data.info[1]);
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
    </script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
    
</div>

<!-- /底部 -->
</body>
</html>