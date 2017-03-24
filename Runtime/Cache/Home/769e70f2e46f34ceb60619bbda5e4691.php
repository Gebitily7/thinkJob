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

    <link rel="stylesheet" href="/Public/Home/css/index/slide.css"/>

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
	
    <section class="hotnav">
        <div class="hotBox">
            <div class="hoTitle clearfix fl"><strong>热门搜索:</strong></div>
            <ul>
                <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/zhaopin/index/pid/'.$vo['id']);?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </section>
    <section class="slideBox">
        <div class="slideContent">
            <div id="slide1" class="slide">
                <div id="picList">
                    <ul class="cl">
                        <?php if(is_array($slide)): $i = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                <a href="http://www.baidu.com" title="情感化移动应用设计"><img src="<?php echo (get_cover($vo["icon"],'path')); ?>" alt="情感化移动应用设计"/></a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <i id="titleBg"></i>
                <button class="btn1">1</button>
                <button class="btn2">2</button>
                <div id="titleBar"></div>
            </div>
            <!-- 公告 -->
            <div class="noticeBox">
                <div class="noticeContent">
                    <div class="notice">
                        <div class="ntheader">
                            <i class="fa fa-bullhorn fa-lg fl" style="margin: 12px 20px 0 40px;"></i><span>最新公告</span>
                        </div>
                        <ul class="ntList">
                            <?php if(is_array($notice)): $i = 0; $__LIST__ = array_slice($notice,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notice): $mod = ($i % 2 );++$i;?><a href="<?php echo U('home/article/detail/id/'.$notice['id']);?>" title="<?php echo ($notice["title"]); ?>"><li><i class="fa fa-bell-o"></i>&emsp;<?php echo (msubstr($notice["title"],0,9)); ?><time><?php echo (time_format($notice["update_time"],'m/d')); ?></time></li></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="fr" style="padding-right: 15px;">
                            <a href=""><span>更多...</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hotJob">
        <div class="hotJobBox">
            <div class="hotLeft fl">
                <div class="hotHead"><span>热招职位</span></div>
                <ul>
                    <?php if(is_array($hot1)): $i = 0; $__LIST__ = $hot1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["iscate"]) == "1"): ?><li><a href="<?php echo U('home/zhaopin/detail/id/'.$vo['id']);?>">
                                <span style="width: 30%;"><?php echo ($vo["title"]); ?></span>
                                <span style="width: 35%;">赛克尔网络</span>
                                <span style="width: 15%;">上海</span>
                                <span style="width: 20%;"><?php echo (date('m/d',$vo["update_time"])); ?></span>
                            </a></li>
                            <?php else: ?>
                            <li><a href="<?php echo U('home/jianzhi/detail/id/'.$vo['id']);?>">
                                <span style="width: 30%;"><?php echo ($vo["title"]); ?></span>
                                <span style="width: 35%;">赛克尔网络</span>
                                <span style="width: 15%;">上海</span>
                                <span style="width: 20%;"><?php echo (date('m/d',$vo["update_time"])); ?></span>
                            </a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>


                </ul>
                <a href="" class="fr" style="margin-right: 15px;color: #009C63;">更多...</a>
            </div>
            <div class="hotRight fl">
                <div class="hotHead"><span>急聘职位</span></div>
                <ul>
                    <?php if(is_array($very)): $i = 0; $__LIST__ = $very;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["iscate"]) == "1"): ?><li><a href="<?php echo U('home/zhaopin/detail/id/'.$vo['id']);?>">
                                <span style="width: 30%;"><?php echo ($vo["title"]); ?></span>
                                <span style="width: 35%;">赛克尔网络</span>
                                <span style="width: 15%;">上海</span>
                                <span style="width: 20%;"><?php echo (date('m/d',$vo["update_time"])); ?></span>
                            </a></li>
                            <?php else: ?>
                            <li><a href="<?php echo U('home/jianzhi/detail/id/'.$vo['id']);?>">
                                <span style="width: 30%;"><?php echo ($vo["title"]); ?></span>
                                <span style="width: 35%;">赛克尔网络</span>
                                <span style="width: 15%;">上海</span>
                                <span style="width: 20%;"><?php echo (date('m/d',$vo["update_time"])); ?></span>
                            </a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                </ul>
                <a href="" class="fr" style="margin-right: 15px;color: #009C63;">更多...</a>
            </div>
        </div>
    </section>
    <!-- 公司循环 -->
    <section class="gsCard">
        <div class="gsCardPos">
            <div class="hotGs"><span>热门公司</span>
                <span class="fr" style="margin-right:10px; font-size: 1.3em;">
                    <span id="now">1</span>
                    <span>/</span>
                    <span id="total">6</span>
                </span>
            </div>
            <div class="gsCardBox">
                <ul class="gsCardDel clearfix">
                    <?php if(is_array($companyList)): $i = 0; $__LIST__ = $companyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('home/user/company/id/'.$vo['id']);?>">
                                <img src="<?php echo (get_cover($vo["c_picture"],'path')); ?>" alt=""/>

                                <div class="gstext clearfix">
                                    <div class="fl gsLogo"><img src="<?php echo (get_cover($vo["logo"],'path')); ?>" alt=""/></div>
                                    <div class="fl gsDel">
                                        <p><?php echo ($vo["c_name"]); ?></p>
                                        <p><?php echo (get_category_title($vo["industry"])); ?>&ensp;|&ensp;<?php echo (get_step_list($vo["step"])); ?>&ensp;|&ensp;<?php echo ($vo["c_range"]); ?>人</p>
                                        <p>联系电话:
                                            <span>&ensp;<?php echo ($vo["linkman_phone"]); ?></span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    <li>
                        <a href="">
                            <img src="/Public/Home/images/job/gs.jpg" alt=""/>
                            <div class="mask">1</div>
                            <div class="gstext clearfix">
                                <div class="fl gsLogo"><img src="/Public/Home/images/job/gslogo.jpg" alt=""/></div>
                                <div class="fl gsDel">
                                    <p>上海宏达</p>
                                    <p>互联网&ensp;|&ensp;A轮&ensp;|&ensp;100-499人</p>
                                    <p>热招职位:
                                        <span>&ensp;PHP</span>
                                        <span>&ensp;PHP程序</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/Public/Home/images/job/gs.jpg" alt=""/>
                            <div class="mask">1</div>
                            <div class="gstext clearfix">
                                <div class="fl gsLogo"><img src="/Public/Home/images/job/gslogo.jpg" alt=""/></div>
                                <div class="fl gsDel">
                                    <p>上海宏达</p>
                                    <p>互联网&ensp;|&ensp;A轮&ensp;|&ensp;100-499人</p>
                                    <p>热招职位:
                                        <span>&ensp;PHP</span>
                                        <span>&ensp;PHP程序</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/Public/Home/images/job/gs.jpg" alt=""/>
                            <div class="mask">1</div>
                            <div class="gstext clearfix">
                                <div class="fl gsLogo"><img src="/Public/Home/images/job/gslogo.jpg" alt=""/></div>
                                <div class="fl gsDel">
                                    <p>上海宏达</p>
                                    <p>互联网&ensp;|&ensp;A轮&ensp;|&ensp;100-499人</p>
                                    <p>热招职位:
                                        <span>&ensp;PHP</span>
                                        <span>&ensp;PHP程序</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="gsBtnL fl"><i class="fa fa-chevron-left fa-lg"></i></div>
                <div class="gsBtnR fr"><i class="fa fa-chevron-right fa-lg"></i></div>
                <div class="gstips"><span>123</span></div>
            </div>
        </div>
    </section>


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
        
    <section class="ad">
    <ul class="adContent">
        <li><a href="">广告位</a></li>
        <li><a href="">广告位</a></li>
        <li><a href="">广告位</a></li>
        <li><a href="">广告位</a></li>
        <li><a href="">广告位</a></li>
    </ul>
</section>
    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><section class="xxxBox" data-title="<?php echo ($vo["title"]); ?>">
            <div id="tab-<?php echo ($vo["id"]); ?>" class="m">
                <div class="mt clearfix">
                    <h2 class="fl"><i class="fa fa-server"><?php echo (getI($vo["id"])); ?>F</i><?php echo ($vo["title"]); ?></h2>
                    <ul class="tab">
                        <?php if(is_array($vo['_'])): $i = 0; $__LIST__ = $vo['_'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate1): $mod = ($i % 2 );++$i;?><li class="tab-item" data-id="<?php echo ($cate1["id"]); ?>" data-url="<?php echo U('index/getJobByCateId');?>"><a href=""><?php echo ($cate1["title"]); ?></a><span>◆</span></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>

                <div class="mc clearfix">
                    <div class="side">
                        <div class="side-inner">
                            <div class="banner">
                                <a href=""><img src="/Public/Home/images/job/pink.jpg" alt=""/></a>
                            </div>
                            <ul>
                                <?php if(is_array($vo['_'])): $i = 0; $__LIST__ = array_slice($vo['_'],0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate1): $mod = ($i % 2 );++$i;?><li><i class="fa fa-cutlery"></i><a href="<?php echo U('home/zhaopin/index/pid/'.$vo['id']);?>"><?php echo ($cate1["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
                    <?php if(is_array($vo['_'])): $i = 0; $__LIST__ = $vo['_'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate1): $mod = ($i % 2 );++$i;?><div class="main" data-id="<?php echo ($cate1["id"]); ?>">
                            <div class="main-inner">
                                <ul id="main-<?php echo ($cate1["id"]); ?>">

                                </ul>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </section><?php endforeach; endif; else: echo "" ;endif; ?>


    <section class="ad">
    <ul class="adContent">
        <li><a href="">广告位</a></li>
        <li><a href="">广告位</a></li>
        <li><a href="">广告位</a></li>
        <li><a href="">广告位</a></li>
        <li><a href="">广告位</a></li>
    </ul>
</section>
    <section id="proBar" class="tool toolbar1">
    <ul id="tool-list" class="tool-nav">
        <li>
            <a>1F</a>
            <span>生活服务</span>
        </li>
        <li>
            <a>2F</a>
            <span>人力行政</span>
        </li>
        <li>
            <a>3F</a>
            <span>销售客服</span>
        </li>
        <li>
            <a>4F</a>
            <span>市场媒介</span>
        </li>
        <li>
            <a>5F</a>
            <span>生产物流</span>
        </li>
        <li>
            <a>6F</a>
            <span>网络通信</span>
        </li>
        <li>
            <a>7F</a>
            <span>法律教育</span>
        </li>
        <li>
            <a>8F</a>
            <span>才会金融</span>
        </li>
        <li>
            <a>9F</a>
            <span>医疗制药</span>
        </li>
        <li>
            <a>10F</a>
            <span>建筑装修</span>
        </li>
    </ul>
</section>
<script>
    $(document).ready(function(){
        var scroll1 = [];
        var _thisTop = $(this).scrollTop();
        for(var i = 0,j=45; i < 10; i++,j++){
            scroll1[i] = $('#tab-'+j).position();
        }
        var $toolList = $("#tool-list").children();
        $toolList.each(function(i){
            $(this).on('click',function(){
                $('body,html').animate({
                    scrollTop : scroll1[i].top-1500
                },'slow');
            });
//            $(this).hover(function(){
//                $(this).children('a').html('<i class="fa fa-home"></i>');
//            },function(){
//                $(this).children('a').html((i+1)+'F');
//            });
        });
        this.addEventListener('scroll',function(){
            _thisTop = $(this).scrollTop();
            tabList();
            return false;
        });

        var forList =function(index){
            for(var i = 0; i < 10; i++){
                $toolList.eq(i).children('a').html((i+1)+'F');
            }
            if(index<10){
                $toolList.eq(index).children('a').html('<i class="fa fa-home"></i>');
            }
        };
        var tabList = function(){
            if(_thisTop >= scroll1[0].top-1520){
                $("#proBar").css('display','block');
            }else{
                $("#proBar").css('display','none');
            }

            if(_thisTop >= scroll1[0].top-1510&&_thisTop < scroll1[1].top-1510){
                forList(0);
            }else if(_thisTop >= scroll1[1].top-1510&&_thisTop < scroll1[2].top-1510){
                forList(1);
            }else if(_thisTop >= scroll1[2].top-1510&&_thisTop < scroll1[3].top-1510){
                forList(2);
            }else if(_thisTop >= scroll1[3].top-1510&&_thisTop < scroll1[4].top-1510){
                forList(3);
            }else if(_thisTop >= scroll1[4].top-1510&&_thisTop < scroll1[5].top-1510){
                forList(4);
            }else if(_thisTop >= scroll1[5].top-1510&&_thisTop < scroll1[6].top-1510){
                forList(5);
            }else if(_thisTop >= scroll1[6].top-1510&&_thisTop < scroll1[7].top-1510){
                forList(6);
            }else if(_thisTop >= scroll1[7].top-1510&&_thisTop < scroll1[8].top-1510){
                forList(7);
            }else if(_thisTop >= scroll1[8].top-1510&&_thisTop < scroll1[9].top-1510){
                forList(8);
            }else if(_thisTop >= scroll1[9].top-1510){
                forList(9);
            }else{
                forList(10);
            }
        }
        tabList();

    });
</script>

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

    <script src="/Public/Home/js/tweenlite.js"></script>
    <script src="/Public/Home/js/tween.js"></script>
    <script src="/Public/Home/js/slide.js"></script>
    <script src="/Public/Home/js/slidenoauto.js"></script>
    <script>
        $(document).ready(function(){
            $('.tab-item').each(function(){
                var $self  = $(this);
                var dataId = $self.data('id');
                var url    = $self.data('url');
                var $ul    = $('#main-'+dataId);
                $.post(url,{id:dataId},function(data){
                    $ul.html(data);
                    console.log(data);
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