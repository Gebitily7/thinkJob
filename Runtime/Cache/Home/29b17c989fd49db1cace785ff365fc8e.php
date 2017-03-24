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

    <link rel="stylesheet" href="/Public/Home/css/list.css"/>
    <link rel="stylesheet" href="/Public/Home/css/user/company.css"/>

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

                        <?php if($iscate1 == 2): ?><!--选择-->
                            <div class="search-type fl clickFather">
                                <span title="全职" data-val="2">兼职</span>
                                <i class="fa fa-caret-down fa-lg"></i>
                                <div class="clickChild">
                                    <div class="child" data-val="2">兼职</div>
                                    <div class="child" data-val="1">全职</div>
                                </div>
                            </div>
                            <input type="hidden" name="cate_id" id="jobType" value="2"/>
                            <?php else: ?>
                            <!--选择-->
                            <div class="search-type fl clickFather">
                                <span title="全职" data-val="1">全职</span>
                                <i class="fa fa-caret-down fa-lg"></i>
                                <div class="clickChild">
                                    <div class="child" data-val="2">兼职</div>
                                    <div class="child" data-val="1">全职</div>
                                </div>
                            </div>
                            <input type="hidden" name="cate_id" id="jobType" value="1"/><?php endif; ?>

                        <!-- 输入框 -->
                        <div class="search-box clearfix">
                            <input type="text" class="search-input fl" placeholder="想搜索什么，输入关键词试试" name="search_input" value="<?php echo ($inputTitle); ?>"/>
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
                            <a href="<?php echo U('userp/center');?>"><li><i class="fa fa-home fa-lg"></i>&emsp;用户中心</li></a>
                            <a href="<?php echo U('userp/resume');?>"><li><i class="fa fa-bar-chart fa-lg"></i></i>&emsp;简历中心</li></a>
                            <a href="<?php echo U('user/logout');?>"><li class="last"><i class="fa fa-sign-out fa-lg"></i></i>&emsp;退出</li></a>
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
                <strong>职位分类</strong>
                <i class="fr fa fa-caret-up fa-lg down" style="margin-top: 13px;"></i>
            </div>
            <div id="sidBarMain" class="sidbar_main">
                <ul>
                    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li>
                            <div class="bar_pad">
                                <div class="bar_tl">
                                    <a href="<?php echo U('home/zhaopin/index/pid/'.$cate['id']);?>"><strong><?php echo ($cate["title"]); ?></strong></a>
                                    <i class="fr fa fa-angle-right fa-lg" style="margin-top: 5px"></i>
                                </div>
                                <div class="bar_cal clearfix">
                                    <?php if(is_array($cate['_'])): $i = 0; $__LIST__ = array_slice($cate['_'],1,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_1): $mod = ($i % 2 );++$i;?><span><a href="<?php echo U('home/zhaopin/index/pid/'.$cate_1['id']);?>"><?php echo ($cate_1["title"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                            <div class="catynavlist clearfix">
                                <a href="javascript:void(0);" class="closenav">×</a>
                                <div class="catigoroy clearfix">
                                    <?php if(is_array($cate['_'])): $i = 0; $__LIST__ = $cate['_'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_1): $mod = ($i % 2 );++$i;?><div class="tinicatiy clearfix">
                                            <div class="leftincaty">
                                                <a href="<?php echo U('home/zhaopin/index/pid/'.$cate_1['id']);?>"><strong><?php echo ($cate_1["title"]); ?></strong></a>
                                            </div>
                                            <div class="letilistcaty">
                                                <?php if(is_array($cate_1['_'])): $i = 0; $__LIST__ = $cate_1['_'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_2): $mod = ($i % 2 );++$i;?><a href="<?php echo U('home/zhaopin/index/pid/'.$cate_2['id']);?>"><?php echo ($cate_2["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div style="padding: 3px 20px;">本分类由Gebitily7提供,若有疑问可联系：13203912762</div>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="gxs1" style="background-color: #006026; text-align: center; color: #ffffff;">Gebitily7</div>
            </div>
            <div class="sidbarnav clearfix fl">
                <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav1): $mod = ($i % 2 );++$i;?><span><a href="<?php echo U($nav1['url']);?>" data-id="<?php echo ($nav1['id']); ?>" ><?php echo ($nav1["title"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</section>


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
        
    <section class="content clearfix">
        <!-- 公司 -->
        <div class="content-item company-base">
            <figure class="c_picture">
                <img src="<?php echo (get_cover($userInfo["c_picture"],'path')); ?>" alt=""/>
            </figure>
            <div class="pos-r">
                <figure class="pos-a c_logo" data-bg="<?php echo (get_cover($userInfo["logo"],'path')); ?>">
                    <figcaption>logo</figcaption>
                </figure>
            </div>
            <div class="company-text">
                <div class="company_name"><span><?php echo ($userInfo["c_name"]); ?></span></div>
                <div class="company_link"><span><?php echo ($userInfo["link"]); ?></span></div>
                <div class="company_dy clearfix">
                    <span><i class="fa fa-flag-o"></i>&ensp;<?php echo (get_category_title($userInfo["industry"])); ?></span>
                    <span><i class="fa fa-line-chart">&ensp;</i><?php echo ($userInfo["step"]); ?></span>
                    <span><i class="fa fa-users"></i>&ensp;<?php echo ($userInfo["c_range"]); ?>人</span>
                </div>
            </div>
        </div>
        <!-- /公司 -->

        <div class="content-item company-intro">
            <h3 class="company-title">公司介绍</h3>
            <div class="intro-content">
            <?php echo (format_text($userInfo["intro"])); ?>
            </div>
            <div class="team-label">
                <?php echo (format_gs_label($userInfo["c_label"])); ?>
            </div>
        </div>

        <div class="job-nav">
            <h3 class="company-title">公司所有职位</h3>
            <div class="clearfix"></div>
            <span class="job-num">当前共有&ensp;<i><?php echo ($jobCount); ?></i>&ensp;个职位</span>
            <div class="fr page-ajax1">
                <a class="a-prev" href="">
                    <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                </a>
                <span class="s-num"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($pageAll); ?></span>
                <a class="a-next" href="">
                    <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                </a>
            </div>
        </div>

        <!-- 职位列表 -->
        <ul class="job-tab">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["iscate"]) == "1"): ?><li class="job-item">
                <a class="clearfix" href="<?php echo U('home/zhaopin/detail/id/'.$vo.id);?>">
                    <div class="job-left">
                        <div>
                            <span><i></i><?php echo ($vo["jobname"]); ?></span>
                            <span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo (get_salary_range($vo["salary_range"])); ?></span>
                            <span style="color: #666666;"><?php echo (get_put_time($vo["update_time"])); ?></span>
                        </div>
                        <div>
                            <span><i class="fa fa-map-marker"></i>&ensp;<?php echo (get_place($vo["work_place"])); ?></span>
                            <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["work_experience"])); ?></span>
                            <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                        </div>
                    </div>
                    <div class="job-right">
                        <div>
                            <span><i class="fa fa-building-o"></i>&ensp;<?php echo (get_company_name($vo["uid"])); ?></span>
                            <span class="job-fa" style="display: none;float: right; color: #008803; font-size: .8em;"><i class="fa fa-check-circle fa-lg"></i>已发送</span>
                        </div>
                        <div>
                            <span><?php echo (get_industry_name($vo["uid"])); ?></span>|
                            <span><?php echo (get_step($vo["uid"])); ?></span>|
                            <span><?php echo (get_company_range($vo["uid"])); ?>人</span>
                            <span>&emsp;<i class="fa fa-phone"></i>&ensp;<?php echo ($vo["phone_num"]); ?></span>
                        </div>
                    </div>
                    <div class="job-label">
                        <?php echo (format_zw_label($vo["skill"])); ?>
                    </div>
                </a>
                <div class="job-tip">
                    <div class="fl tip" data-ajax="0">
                        <i class="fa fa-heart-o fa-3x"></i>
                        <span>关注</span>
                    </div>
                    <div class="fl tip" data-ajax="0">
                        <i class="fa fa-send-o fa-3x"></i>
                        <span>发送简历</span>
                    </div>
                </div>
                <div class="job-type">
                    <div class="arrow arrow-right arrow-right-type"></div>
                    <span>全</span>
                </div>
            </li>
            <?php else: ?>
                <li class="job-item">
                    <a class="clearfix" href="<?php echo U('home/zhaopin/detail/id/'.$vo.id);?>">
                        <div class="job-left">
                            <div>
                                <span><i></i><?php echo ($vo["jobname"]); ?></span>
                                <span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo ($vo["salary"]); echo (get_settle_type_unit($vo["settle_type"])); ?></span>
                                <span style="color: #666666;"><?php echo (get_put_time($vo["update_time"])); ?></span>
                            </div>
                            <div>
                                <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                <span><i class="fa fa-credit-card"></i>&ensp;<?php echo (get_settle_type($vo["settle_type"])); ?></span>
                                <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                            </div>
                        </div>
                        <div class="job-right">
                            <div>
                                <span><i class="fa fa-building-o"></i>&ensp;<?php echo (get_company_name($vo["uid"])); ?></span>
                                <span class="job-fa" style="display: none;float: right; color: #008803; font-size: .8em;"><i class="fa fa-check-circle fa-lg"></i>已发送</span>
                            </div>
                            <div>
                                <span><?php echo (get_industry_name($vo["uid"])); ?></span>|
                                <span><?php echo (get_step($vo["uid"])); ?></span>|
                                <span><?php echo (get_company_range($vo["uid"])); ?>人</span>
                                <span>&emsp;<i class="fa fa-phone"></i>&ensp;13203912762</span>
                            </div>
                        </div>
                        <div class="">
                            <span>工作时间：<?php echo ($vo["work_day"]); ?></span>
                        </div>
                        <div class="job-type">
                            <div class="arrow arrow-right arrow-right-type"></div>
                            <span>兼</span>
                        </div>
                    </a>
                    <div class="job-tip">
                        <div class="fl tip" data-ajax="0">
                            <i class="fa fa-heart-o fa-3x"></i>
                            <span>关注</span>
                        </div>
                        <div class="fl tip" data-ajax="0">
                            <i class="fa fa-send-o fa-3x"></i>
                            <span>发送简历</span>
                        </div>
                    </div>
                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="page" data-class="page-ajax1">
            <?php echo ($page); ?>
        </div>
        <!-- /职位列表 -->

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
        $(document).scrollTop(localStorage.getItem('c_scroll'));
        $(document).ready(function(){

            $(document).on('scroll',function(){
                var scroll = $(this).scrollTop();
                localStorage.setItem('c_scroll',scroll);
            });

            var bg_url =  $('.c_logo').data('bg');
            $('.c_logo').css({
                background : 'url('+bg_url+') 53% 45%'
            });

            $('.page').each(function(){
                var className = $(this).data('class');
                var prev = $(this).find('.prev').attr('href');
                var next = $(this).find('.next').attr('href');
                var num  = $(this).find('.current').html();
                $('.'+className).find('.a-prev').attr('href',prev);
                $('.'+className).find('.a-next').attr('href',next);
                $('.'+className).find('.s-num i').html(num);
            });



            // 关注与发送的状态
            $('.job-tip div:first-child').each(function(){
                $(this).hover(function(){
                    if($(this).data('ajax') == 0) {
                        $(this).css('color', '#C80000');
                        $(this).children('i').removeClass('fa-heart-o');
                        $(this).children('i').addClass('fa-heart');
                    }
                },function(){
                    if($(this).data('ajax') == 0) {
                        $(this).css('color', '#FFFFFF');
                        $(this).children('i').removeClass('fa-heart');
                        $(this).children('i').addClass('fa-heart-o');
                    }
                });
                $(this).on('click',function(){
                    if($(this).data('ajax') == 0){
                        $(this).data('ajax','1');
                        $(this).css('color', '#C80000');
                        $(this).children('i').removeClass('fa-heart-o');
                        $(this).children('i').addClass('fa-heart');
                        $(this).children('span').html('已关注');
                    }else{
                        $(this).data('ajax','0');
                        $(this).css('color', '#FFFFFF');
                        $(this).children('i').removeClass('fa-heart');
                        $(this).children('i').addClass('fa-heart-o');
                        $(this).children('span').html('关注');
                    }
                });
            });
            $('.job-tip div:last-child').each(function(){
                $(this).hover(function(){
                    if($(this).data('ajax') == 0) {
                        $(this).css('color', '#FFA248');
                        $(this).children('i').removeClass('fa-send-o');
                        $(this).children('i').addClass('fa-send');
                    }
                },function(){
                    if($(this).data('ajax') == 0) {
                        $(this).css('color', '#FFFFFF');
                        $(this).children('i').removeClass('fa-send');
                        $(this).children('i').addClass('fa-send-o');
                    }
                });
                $(this).on('click',function(){
                    if($(this).data('ajax') == 0){
                        $(this).data('ajax','1');
                        $(this).css('color', '#FFA248');
                        $(this).children('i').removeClass('fa-heart-o');
                        $(this).children('i').addClass('fa-heart');
                        $(this).children('span').html('简历已发送');
                        $(this).parent().parent('.job-item').find('.job-fa').css('display','block');
                    }else{
                        $(this).data('ajax','0');
                        $(this).css('color', '#FFFFFF');
                        $(this).children('i').removeClass('fa-heart');
                        $(this).children('i').addClass('fa-heart-o');
                        $(this).children('span').html('发送简历');
                        $(this).parent().parent('.job-item').find('.job-fa').css('display','none');
                    }
                });
            });

            $(document).on('scroll',function(){
                console.log($(this).scrollTop());
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