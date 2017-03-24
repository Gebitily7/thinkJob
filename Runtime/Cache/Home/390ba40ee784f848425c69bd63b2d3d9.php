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

    <link rel="stylesheet" href="/Public/Home/css/userp/userp.css"/>
    <link rel="stylesheet" href="/Public/Home/css/userp/resume.css"/>
    <style>
        .item-content{
            margin-top: 12px;
            padding: 35px 30px;
            background-color: #fff;
        }
        .gs-identify,.fr-identify,
        .job-link,
        .job-base{
            margin: 10px 10px 0 10px;
        }
        .job-desc{
            margin: 0 10px;
        }
        .content-group{
            margin-left: 85px;
        }
        /* input */
        .input-group{
            width: 467px;
            padding: 0 20px;
            margin: 0 0 10px 0;
            line-height: 36px;
            border: 1px solid #CCCCCC;
            border-radius: 5px;
            color: #666666;
            font-size: 1.1em;
        }
        .input-group input{
            width: 377px;
            border: none;
            line-height: 36px;
            background: #ffffff;
            color: #666666;
        }
        .input-group label{
            color: #999999;
        }
        /* 提交 */
        .submit-group{
            line-height: 28px;
            font-size: 1.2em;
            color: #ffffff;
            margin-top: 2px;
            margin-left: 257px;
        }
        .submit-group .submit-item {
            display: inline-block;
            padding: 3px 5px;
            width: 60px;
            margin-right: 30px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }
    </style>

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
<!--<section class="ad"></section>-->
<section class="replace"></section>
<section class="top-search clearfix fixed" id="topSearch">
    <div class="content clearfix">
        <!-- logo区域 -->
        <div class="logo fl clearfix">
            <img src="/Public/Home/images/job/logo.png" alt="logo"/>
        </div>
        <!-- 城市选择区域 -->
        <div class="city fl clearfix">
            <span>[<a href="javascript:void(0);">全国站</a>]</span>
            <input type="hidden" name="c_city" value=""/>
        </div>
        <!-- 搜索区域 -->
        <div class="fr pt_10">
            <div class="clearfix fl">
                <div class="search clearfix">
                    <form action="" id="search" class="clearfix" method="post">
                        <?php if($iscate1 == 1 or ''): ?><!--选择-->
                            <div class="search-type fl clickFather">
                                <span title="全职" data-val="1">全职</span>
                                <i class="fa fa-caret-down fa-lg"></i>
                                <div class="clickChild">
                                    <div class="child" data-val="2">兼职</div>
                                    <div class="child" data-val="1">全职</div>
                                </div>
                            </div>
                            <input type="hidden" name="cate_id" id="jobType" value="1"/>
                            <?php else: ?>
                            <!--选择-->
                            <div class="search-type fl clickFather">
                                <span title="全职" data-val="2">兼职</span>
                                <i class="fa fa-caret-down fa-lg"></i>
                                <div class="clickChild">
                                    <div class="child" data-val="2">兼职</div>
                                    <div class="child" data-val="1">全职</div>
                                </div>
                            </div>
                            <input type="hidden" name="cate_id" id="jobType" value="2"/><?php endif; ?>
                        <!-- 输入框 -->
                        <div class="search-box clearfix">
                            <input type="text" class="search-input fl" placeholder="想搜索什么，输入关键词试试" name="search_input"/>
                        </div>
                        <!-- 输入框 -->
                    </form>
                    <!-- 按钮 -->
                    <div class="search-btn fl" data-form="search">
                        <button>
                            <i class="fa fa-search fa-lg"></i>
                        </button>
                    </div>
                    <!-- 按钮 -->
                </div>

            </div>
            <!-- 用户区域 -->
            <?php if(is_login() and session('user_type') == 1): ?><div class="logintool entrance fl clearfix">
                    <div class="user-detail user-menu">
                        <ul>
                            <a href=""><li><i class="fa fa-home fa-lg"></i>&emsp;用户中心</li></a>
                            <a href=""><li><i class="fa fa-home fa-lg"></i>&emsp;简历中心</li></a>
                            <a href="<?php echo U('user/logout');?>"><li class="last"><i class="fa fa-home fa-lg"></i>&emsp;退出</li></a>
                        </ul>
                    </div>
                    <a href="">
                        <figure class="userpic">
                            <img src="/Public/Home/images/user/defalheid.jpg" alt=""/>
                        </figure>
                    </a>
                    <a href="" class="fl"><span class="fl" title="Gebitily7" style="width: 100px; height: 42px;overflow:hidden;line-height: 42px;font-size: .9em;"><?php echo session('user_auth.username');?></span><i style="margin-top: 15px;" class="fl fa fa-caret-down fa-lg"></i></a>
                </div>

                <?php elseif(is_login() and session('user_type') == 2): ?>
                <div class="logintool entrance fl clearfix">
                    <div class="user-detail user-menu">
                        <ul>
                            <a href="<?php echo U('user/center');?>"><li><i class="fa fa-home fa-lg"></i>&emsp;企业中心</li></a>
                            <a href=""><li><i class="fa fa-home fa-lg"></i>&emsp;职位中心</li></a>
                            <a href="<?php echo U('user/logout');?>"><li class="last"><i class="fa fa-home fa-lg"></i>&emsp;退出</li></a>
                        </ul>
                    </div>
                    <a href="">
                        <figure class="userpic">
                            <?php if($user["id"] != ''): ?><img src="<?php echo (get_cover($user["u_tx"],'path')); ?>" alt=""/>
                                <?php else: ?>
                                <img src="/Public/Home/images/user/defalheid.jpg" alt=""/><?php endif; ?>


                        </figure>
                    </a>
                    <a href="" class="fl"><span class="fl" title="Gebitily7" style="width: 100px; height: 42px;overflow:hidden;line-height: 42px;font-size: .9em;"><?php echo session('user_auth.username');?></span><i style="margin-top: 15px;" class="fl fa fa-caret-down fa-lg"></i></a>
                </div>
                <?php else: ?>
                <div class="logintool fl clearfix">
                    <a href="">
                        <figure class="userpic">
                            <img src="/Public/Home/images/user/defalheid.jpg" alt=""/>
                        </figure>
                    </a>
                    <a href="<?php echo U('user/login');?>" class="fl">用户/企业登陆</a>
                </div><?php endif; ?>


        </div>

    </div>
</section>


<section class="navbox clearfix">
    <div class="headbox">
        <div class="headnav">
            <div id="sidBar" class="sidbar clearfix fl">
                <strong><?php echo C('WEB_NAME');?></strong>
            </div>
            <div class="sidbarnav clearfix fl">
                <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav1): $mod = ($i % 2 );++$i;?><span><a href="<?php echo U($nav1['url']);?>" data-id="<?php echo ($nav1['id']); ?>" ><?php echo ($nav1["title"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</section>


<script src="/Public/Home/js/common.js"></script>




<!-- /头部 -->

<!-- 主体 -->

<div id="main-container" class="container" city="zhengzhou">
    <div class="row box clearfix">
        <section class="side-bar">
            <div class="user-base">
                <div class="base-media js-url" data-url="">
                    <figure>
                        <?php if(($user["u_tx"]) != ""): ?><img src="<?php echo (get_cover($user["u_tx"],'path')); ?>" alt=""/>
                        <?php else: ?>
                            <img src="/Public/Home/images/user/01.jpg" alt=""/><?php endif; ?>
                    </figure>
                    <div class="media-item">
                        <span class="d-b">昵称：Gebitily7</span>
                        <span class="d-b">性别：<?php if(($userInfo["sex"]) == "1"): ?>男<?php else: ?>女<?php endif; ?></span>
                        <span class="d-b">年龄：<?php echo (get_age($userInfo["birthday"])); ?>岁</span>
                    </div>
                </div>
                <div  class="base-info clearfix">
                    <div class="info-item">
                        <span>已投简历</span>
                        <span><?php echo ($resumeCount1); ?></span>
                    </div>
                    <div class="info-item">
                        <span>收到回复</span>
                        <span><?php echo ($treatedCount1); ?></span>
                    </div>
                    <div class="info-item">
                        <span>关注</span>
                        <span><?php echo ($likeNum1); ?></span>
                    </div>
                </div>
            </div>
            <!-- user-list -->
            <div class="user-list">
                <div>
                    <ul class="list-setting">
                        <li class="side-item js-url" data-url="<?php echo U('center');?>"><i class='fa fa-street-view <?php if(($leftId) == "1"): ?>i-active<?php endif; ?>'></i>个人中心</li>
                        <li class="side-item js-url" data-url="<?php echo U('resume');?>"><i class='fa fa-pencil-square-o <?php if(($leftId) == "2"): ?>i-active<?php endif; ?>'></i>我的简历</li>
                        <li class="side-item js-url" data-url="<?php echo U('progress');?>"><i class='fa fa-line-chart <?php if(($leftId) == "3"): ?>i-active<?php endif; ?>'></i></i>求职进展</li>
                        <li class="side-item js-url" data-url="<?php echo U('collect');?>"><i class='fa fa-file-text-o <?php if(($leftId) == "4"): ?>i-active<?php endif; ?>'></i>收藏记录</li>
                        <li class="side-item js-url" data-url="<?php echo U('setting');?>"><i class='fa fa-cog <?php if(($leftId) == "5"): ?>i-active<?php endif; ?>'></i>帐号设置</li>
                    </ul>
                </div>
            </div>
            <!-- user-list -->
        </section>
        
    <div class="ajax-tips">
        <span>更新失败</span>
    </div>
    <section class="content-box">
        <!-- 头部背景图 -->
        <div class="content-item content-top">
            <div class="top-bg">
                <div class="spin-mask">
                    <span class="top-back" onclick="self.location=document.referrer;"><i class="fa fa-angle-left"></i></span>
                    <span class="side-title">帐号设置</span>
                </div>
            </div>
            <div class="tx_box">
                <figure class="u_tx">
                    <img src="<?php echo (get_cover($user["u_tx"],'path')); ?>" alt=""/>
                    <figcaption>
                        <span>更改头像</span>
                    </figcaption>
                </figure>
                <div class="u-tx-name">
                    <span><?php echo ($userInfo["uname"]); ?></span>
                </div>
            </div>
            <div class="gx_bq">
                <span><?php echo ($userInfo["signature"]); ?></span>
            </div>
        </div>
        <!-- /头部背景图 -->

        <div class="item-content">
            <form data-action="" id="user-info">
                <div class="gs-identify">
                    <h3>个人设置</h3>
                    <ul class="content-group">

                        <li class="input-title"><span>用户帐号</span></li>
                        <li class="input-group">
                            <label for="username">用户帐号：</label>
                            <input type="text" id="username" name="username" index="0" value="<?php echo ($userInfo["username"]); ?>"/>
                        </li>

                        <li class="input-title"><span>昵称</span></li>
                        <li class="input-group">
                            <label for="nickname">昵&ensp;&ensp;&ensp;&ensp;称：</label>
                            <input type="text" id="nickname" name="nickname" index="0" value="<?php echo (get_nickname_now($userInfo["id"])); ?>"/>
                        </li>

                    </ul>
                    <div class="submit-group">
                        <input type="hidden" name="id" value="<?php echo ($userInfo["id"]); ?>"/>
                        <span class="submit-item ok" data-form="user-info" data-url="<?php echo U('userp/mod');?>">确定</span>
                        <span class="submit-item cancel" onclick="javascript:location.href='<?php echo U("");?>';return false;" >取消</span>
                    </div>
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

<!-- 底部 ================================================== -->

<footer class="footer">
    <section class="foot-head">
        <div class="box clearfix">
            <div class="ft-end">
                <p>---------------------&ensp;END&ensp;---------------------</p>
            </div>
            <div class="yq clearfix">
                <div class="fl"><h2>友情链接</h2></div>
                <div class="fl yq-line"></div>
            </div>
            <ul>
                <li><a href="">企业名录</a></li>
                <li><a href="">中国人才热线</a></li>
                <li><a href="">企业名录</a></li>
                <li><a href="">企业名录</a></li>
                <li><a href="">企业名录</a></li>
                <li><a href="">焦作人才招聘网</a></li>
                <li><a href="">厦门招生信息网</a></li>
                <li><a href="">南阳培训网</a></li>
                <li><a href="">南阳培训网</a></li>
                <li><a href="">南阳培训网</a></li>
                <li><a href="">南阳培训网</a></li>
            </ul>
        </div>
    </section>
    <section class="foot-body">
        <div class="box">
            <ul class="clearfix">
                <li>
                    <h2><a href="">关于我们</a></h2>
                    <a href="">公司简介</a>
                    <a href="">加入我们</a>
                    <a href="">联系我们</a>
                </li>
                <li>
                    <h2><a href="">找工作</a></h2>
                    <a href="">创建简历</a>
                    <a href="">搜索职位</a>
                    <a href="">实习生招聘</a>
                    <a href="">全部招聘</a>
                </li>
                <li>
                    <h2><a href="">招人才</a></h2>
                    <a href="">发布职位</a>
                    <a href="">招聘管理</a>
                    <a href="">招聘职位大全</a>
                    <a href="">英才企业名录</a>
                </li>
                <li>
                    <h2><a href="">帮助</a></h2>
                    <a href="">网站声明</a>
                    <a href="">使用条款</a>
                    <a href="">安全中心</a>
                </li>
                <li>
                    <h2><a href="">联系我们</a></h2>
                    <a>联系方式:&emsp;<span style="color: #009C63;">13203912762</span></a>
                    <a>QQ:&emsp;1805786345</a>
                    <a>地址:&emsp;河南焦作河南理工兰园5号楼3层313室</a>
                </li>
            </ul>
        </div>
    </section>
    <section class="foot-footer">
        <div class="box">
            <span>
                <a href="">首页</a>|
                <a href="">联系方式</a>|
                <a href="">客服中心</a>|
                <a href="">我也要合作</a>|
                <a href="">公司资质</a>
            </span>
            <div>
                <span style="color: #999999; font-size: .9em;">Copyright&emsp;©&emsp;2016-2017&emsp;www.Gebitily7.com&emsp;焦作市赛克尔网络科技有限公司版权所有&emsp;备案:&emsp;<?php echo C('WEB_SITE_ICP');?>&emsp;站长统计</span>
            </div>
        </div>
    </section>
</footer>



























<script src="/Public/Home/js/common.js"></script>
<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "/index.php?s=", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	};
})();
</script>

    <script>
        $(document).ready(function(){
            $('.ok').on('click',function(){
                var $self = $(this);
                var formId = $self.data('form');
                $form = $('#'+formId);
                var url = $self.data('url');
                var data = $form.serialize();
                $.post(url,data,function(data){
                    if(data.status != 1){
                        $('.ajax-tips span').html('更改出错'+data.info);
                    }else{
                        $('.ajax-tips span').html(data.info);
                    }
                    $('.ajax-tips').animate({
                        'opacity' : 1
                    },1000).delay(1000).animate({
                        'opacity' : 0
                    },400,function(){
                        //location.href = "<?php echo U('userp/setting');?>";
                    });
                });
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