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
    <link rel="stylesheet" href="/Public/Home/css/userp/progress.css"/>

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
        
    <section class="content-box">
        <!-- 头部背景图 -->
        <div class="content-item content-top">
            <div class="top-bg">
                <div class="spin-mask">
                    <span class="top-back" onclick="self.location=document.referrer;"><i class="fa fa-angle-left"></i></span>
                    <span class="side-title">求职进展</span>
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

        <div class="item-box side-2">
            <div class="item-content">
                <ul class="ul-list zw-list clearfix">
                    <li class="li-item progress-item item-selected js-url" data-url="<?php echo U('');?>" data-id="1">全部状态</li>
                    <li class="li-item progress-item js-url" data-url="<?php echo U('');?>" data-id="2">投递成功</li>
                    <li class="li-item progress-item js-url" data-url="<?php echo U('');?>" data-id="3">已查看</li>
                    <li class="li-item progress-item js-url" data-url="<?php echo U('');?>" data-id="4">不合适</li>
                </ul>
            </div>

            <!-- 全部状态 -->
            <div class="zw-content progress-item-1">
                <div class="job-nav clearfix num-1">
                    <span class="job-num">全部状态共有&ensp;<i><?php echo ($resumeCount); ?></i>&ensp;个</span>
                    <div class="fr">
                        <a href="">
                            <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                        </a>
                        <span class="all-page"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($resumeAllPage); ?></span>
                        <a href="">
                            <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                        </a>
                    </div>
                </div>

                <ul class="all">
                    <?php if(is_array($resumeList)): $i = 0; $__LIST__ = $resumeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="job-item">
                            <a class="clearfix" target="_blank" <?php if(($vo["iscate"]) == "1"): ?>href="<?php echo U('home/zhaopin/detail/id/'.$vo['jid']);?>"<?php else: ?>href="<?php echo U('home/jianzhi/detail/id/'.$vo['jid']);?>"<?php endif; ?>>
                                <div class="job-left">
                                    <div>
                                        <span><i></i><?php echo ($vo["title"]); ?></span>
                                        <?php if(($vo["iscate"]) == "1"): ?><span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo (get_salary_range($vo["salary_range"])); ?></span>
                                            <?php else: ?>
                                            <span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo ($vo["salary"]); echo (get_settle_type_unit($vo["settle_type"])); ?></span><?php endif; ?>
                                    </div>
                                    <div>
                                        <?php if(($vo["iscate"]) == "1"): ?><span><i class="fa fa-map-marker"></i>&ensp;<?php echo (get_place($vo["work_place"])); ?></span>
                                            <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["y_experience"])); ?></span>
                                            <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                            <?php else: ?>
                                            <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                            <span><i class="fa fa-credit-card"></i>&ensp;<?php echo (get_settle_type($vo["settle_type"])); ?></span>
                                            <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span><?php endif; ?>
                                    </div>
                                </div>
                                <div class="job-right">
                                    <div>
                                        <span><i class="fa fa-building-o"></i>&ensp;<?php echo ($vo["c_name"]); ?></span>
                                        <span class="job-fa" style="display: none;float: right; color: #008803; font-size: .8em;"><i class="fa fa-check-circle fa-lg"></i>已发送</span>
                                    </div>
                                    <div>
                                        <span><?php echo (get_category_title($vo["industry"])); ?></span>|
                                        <span><?php echo ($vo["step"]); ?></span>|
                                        <span><?php echo ($vo["c_range"]); ?>人</span>
                                        <span>&emsp;<i class="fa fa-phone"></i>&ensp;<?php echo ($vo["phone_num"]); ?></span>
                                    </div>
                                </div>
                                <div class="job-label">
                                    <?php echo (format_zw_label($vo["job_skill"])); ?>
                                </div>
                                <div class="reply">
                                    <span class="time"><?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
                                    <?php if(($vo['is_read']) == "0"): ?><span class="reason">未读</span>
                                    <?php else: ?>
                                        <span class="reason"><?php echo (get_cj_ustatus($vo["cj_status"])); ?></span><?php endif; ?>
                                </div>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="pagej" data-id="1">
                    <?php echo ($resumePage); ?>
                </div>
            </div>
            <!-- /全部状态 -->

            <!-- 投递成功 -->
            <div class="zw-content progress-item-2">
                <div class="job-nav clearfix num-2">
                    <span class="job-num">投递成功了&ensp;<i><?php echo ($treatedCount); ?></i>&ensp;个职位</span>
                    <div class="fr">
                        <a href="">
                            <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                        </a>
                        <span class="all-page"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($treatedAllPage); ?></span>
                        <a href="">
                            <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                        </a>
                    </div>
                </div>

                <ul class="all">
                    <?php if(is_array($treatedList)): $i = 0; $__LIST__ = $treatedList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="job-item">
                        <a class="clearfix" target="_blank" <?php if(($vo["iscate"]) == "1"): ?>href="<?php echo U('home/zhaopin/detail/id/'.$vo['jid']);?>"<?php else: ?>href="<?php echo U('home/jianzhi/detail/id/'.$vo['jid']);?>"<?php endif; ?>>
                            <div class="job-left">
                                <div>
                                    <span><i></i><?php echo ($vo["title"]); ?></span>
                                    <?php if(($vo["iscate"]) == "1"): ?><span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo (get_salary_range($vo["salary_range"])); ?></span>
                                        <?php else: ?>
                                        <span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo ($vo["salary"]); echo (get_settle_type_unit($vo["settle_type"])); ?></span><?php endif; ?>
                                </div>
                                <div>
                                    <?php if(($vo["iscate"]) == "1"): ?><span><i class="fa fa-map-marker"></i>&ensp;<?php echo (get_place($vo["work_place"])); ?></span>
                                        <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["y_experience"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                        <?php else: ?>
                                        <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                        <span><i class="fa fa-credit-card"></i>&ensp;<?php echo (get_settle_type($vo["settle_type"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span><?php endif; ?>
                                </div>
                            </div>
                            <div class="job-right">
                                <div>
                                    <span><i class="fa fa-building-o"></i>&ensp;<?php echo ($vo["c_name"]); ?></span>
                                    <span class="job-fa" style="display: none;float: right; color: #008803; font-size: .8em;"><i class="fa fa-check-circle fa-lg"></i>已发送</span>
                                </div>
                                <div>
                                    <span><?php echo (get_category_title($vo["industry"])); ?></span>|
                                    <span><?php echo (get_step_list($vo["step"])); ?></span>|
                                    <span><?php echo ($vo["c_range"]); ?>人</span>
                                    <span>&emsp;<i class="fa fa-phone"></i>&ensp;<?php echo ($vo["phone_num"]); ?></span>
                                </div>
                            </div>
                            <div class="job-label">
                                <?php echo (format_zw_label($vo["job_skill"])); ?>
                            </div>
                            <div class="reply">
                                <span class="time"><?php echo (date('Y-m-d',$vo["reply_time"])); ?></span>
                                <span class="reason btn-ck" data-class="success-<?php echo ($vo["id"]); ?>">查看</span>
                            </div>
                            <div class="reply-box success-<?php echo ($vo["id"]); ?>">
                                <div class="reply-top pos-r">
                                    来自<b>&ensp;<?php echo ($vo["c_name"]); ?></b>&ensp;公司
                                    <i class="close-r" data-class="success-<?php echo ($vo["id"]); ?>">X</i>
                                </div>
                                <div class="reply-body">
                                    <p>回复时间：<?php echo (date('Y-m-d',$vo["reply"])); ?></p>
                                    <p>面试地点：<?php echo ($vo["place"]); ?></p>
                                    <p>面试时间：<?php echo (date('Y-m-d',$vo["ms_time"])); ?></p>
                                    <p>附加内容：<?php echo ($vo["content"]); ?></p>
                                </div>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="pagej" data-id="2">
                    <?php echo ($treatedPage); ?>
                </div>
            </div>
            <!-- /投递成功 -->

            <!-- 已查看 -->
            <div class="zw-content progress-item-3">
                <div class="job-nav clearfix num-3">
                    <span class="job-num">已被查看的有&ensp;<i><?php echo ($readCount); ?></i>&ensp;个职位</span>
                    <div class="fr">
                        <a href="">
                            <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                        </a>
                        <span class="all-page"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($readAllPage); ?></span>
                        <a href="">
                            <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                        </a>
                    </div>
                </div>

                <ul class="all">
                    <?php if(is_array($readList)): $i = 0; $__LIST__ = $readList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="job-item">
                        <a class="clearfix" target="_blank" <?php if(($vo["iscate"]) == "1"): ?>href="<?php echo U('home/zhaopin/detail/id/'.$vo['jid']);?>"<?php else: ?>href="<?php echo U('home/jianzhi/detail/id/'.$vo['jid']);?>"<?php endif; ?> >
                            <div class="job-left">
                                <div>
                                    <span><i></i><?php echo ($vo["title"]); ?></span>
                                    <?php if(($vo["iscate"]) == "1"): ?><span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo (get_salary_range($vo["salary_range"])); ?></span>
                                        <?php else: ?>
                                        <span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo ($vo["salary"]); echo (get_settle_type_unit($vo["settle_type"])); ?></span><?php endif; ?>
                                </div>
                                <div>
                                    <?php if(($vo["iscate"]) == "1"): ?><span><i class="fa fa-map-marker"></i>&ensp;<?php echo (get_place($vo["work_place"])); ?></span>
                                        <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["y_experience"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                        <?php else: ?>
                                        <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                        <span><i class="fa fa-credit-card"></i>&ensp;<?php echo (get_settle_type($vo["settle_type"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span><?php endif; ?>
                                </div>
                            </div>
                            <div class="job-right">
                                <div>
                                    <span><i class="fa fa-building-o"></i>&ensp;<?php echo ($vo["c_name"]); ?></span>
                                    <span class="job-fa" style="display: none;float: right; color: #008803; font-size: .8em;"><i class="fa fa-check-circle fa-lg"></i>已发送</span>
                                </div>
                                <div>
                                    <span><?php echo (get_category_title($vo["industry"])); ?></span>|
                                    <span><?php echo ($vo["step"]); ?></span>|
                                    <span><?php echo ($vo["c_range"]); ?>人</span>
                                    <span>&emsp;<i class="fa fa-phone"></i>&ensp;<?php echo ($vo["phone_num"]); ?></span>
                                </div>
                            </div>
                            <div class="job-label">
                                <?php if(($vo["iscate"]) == "1"): echo (format_zw_label($vo["job_skill"])); ?>
                                    <?php else: ?>
                                    <?php echo (format_gs_label($vo["c_label"])); endif; ?>
                            </div>
                            <div class="reply">
                                <span class="time"><?php echo (date('Y-m-d',$vo["reply_time"])); ?></span>
                                <span class="reason">已查看</span>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="pagej" data-id="3">
                    <?php echo ($readPage); ?>
                </div>
            </div>
            <!-- /已查看 -->

            <!-- 不适合 -->
            <div class="zw-content progress-item-4">
                <div class="job-nav clearfix num-4">
                    <span class="job-num">不合适的有&ensp;<i><?php echo ($rejectCount); ?></i>&ensp;个职位</span>
                    <div class="fr">
                        <a href="">
                            <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                        </a>
                        <span class="all-page"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($rejectAllPage); ?></span>
                        <a href="">
                            <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                        </a>
                    </div>
                </div>

                <ul class="all">
                    <?php if(is_array($rejectList)): $i = 0; $__LIST__ = $rejectList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="job-item">
                        <a class="clearfix" target="_blank" <?php if(($vo["iscate"]) == "1"): ?>href="<?php echo U('home/zhaopin/detail/id/'.$vo['jid']);?>"<?php else: ?>href="<?php echo U('home/jianzhi/detail/id/'.$vo['jid']);?>"<?php endif; ?>>
                            <div class="job-left">
                                <div>
                                    <span><i></i><?php echo ($vo["title"]); ?></span>
                                    <?php if(($vo["iscate"]) == "1"): ?><span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo (get_salary_range($vo["salary_range"])); ?></span>
                                        <?php else: ?>
                                        <span style="font-weight: 600;"><i class="fa fa-rmb"></i>&ensp;<?php echo ($vo["salary"]); echo (get_settle_type_unit($vo["settle_type"])); ?></span><?php endif; ?>
                                </div>
                                <div>
                                    <?php if(($vo["iscate"]) == "1"): ?><span><i class="fa fa-map-marker"></i>&ensp;<?php echo (get_place($vo["work_place"])); ?></span>
                                        <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["y_experience"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                        <?php else: ?>
                                        <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                        <span><i class="fa fa-credit-card"></i>&ensp;<?php echo (get_settle_type($vo["settle_type"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span><?php endif; ?>
                                </div>
                            </div>
                            <div class="job-right">
                                <div>
                                    <span><i class="fa fa-building-o"></i>&ensp;<?php echo ($vo["c_name"]); ?></span>
                                    <span class="job-fa" style="display: none;float: right; color: #008803; font-size: .8em;"><i class="fa fa-check-circle fa-lg"></i>已发送</span>
                                </div>
                                <div>
                                    <span><?php echo (get_category_title($vo["industry"])); ?></span>|
                                    <span><?php echo ($vo["step"]); ?></span>|
                                    <span><?php echo ($vo["c_range"]); ?>人</span>
                                    <span>&emsp;<i class="fa fa-phone"></i>&ensp;<?php echo ($vo["phone_num"]); ?></span>
                                </div>
                            </div>
                            <div class="job-label">
                                <?php echo (format_zw_label($vo["job_skill"])); ?>
                            </div>
                            <div class="reply">
                                <span class="time"><?php echo (date('Y-m-d',$vo["reply_time"])); ?></span>
                                <span class="reason btn-ck" data-class="success-<?php echo ($vo["id"]); ?>">查看</span>
                            </div>
                            <div class="reply-box success-<?php echo ($vo["id"]); ?>">
                                <div class="reply-top pos-r">
                                    来自<b>&ensp;<?php echo ($vo["c_name"]); ?></b>&ensp;公司
                                    <i class="close-r" data-class="success-<?php echo ($vo["id"]); ?>">X</i>
                                </div>
                                <div class="reply-body">
                                    <p>回复时间：<?php echo (date('Y-m-d',$vo["reply"])); ?></p>
                                    <p>被拒理由：<?php echo ($vo["content"]); ?></p>
                                </div>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="pagej" data-id="4">
                    <?php echo ($rejectPage); ?>
                </div>
            </div>
            <!-- /不适合 -->
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
        if(localStorage.getItem('scroll') != ''){
            $(document).scrollTop(localStorage.getItem('scroll'));
        }
        (function($){
            if(localStorage.getItem('proList') == null){
                localStorage.setItem('proList',-1);
            }
            $(document).on('scroll',function(){
                var scroll = $(this).scrollTop();
                localStorage.setItem('scroll',scroll);
            });
            /* 切换函数 */
            var tabBox =  function(listObj,contentStr1,contentStr2,idItem){
                $(listObj).each(function(i,item){
                    $(item).on('click',function(){
                        var tabId = $(this).data('id');
                        if(listObj == '.progress-item'){
                            $(listObj).removeClass('item-selected');
                            localStorage.setItem('proList',tabId-1);
                            $(this).addClass('item-selected');
                        }
                        $(contentStr1).css('display','none');
                        $(contentStr2+tabId).css('display','block');
                    });
                });
                var firstTab = function(){
                    var self = $(listObj).eq(idItem);
                    if(listObj == '.progress-item'){
                        $(listObj).removeClass('item-selected');
                        self.addClass('item-selected');
                    }
                    var tabId = self.data('id');
                    $(contentStr2+tabId).css('display','block');
                };
                firstTab();
            };
            if(localStorage.getItem('proList') == -1){
                tabBox('.progress-item','.zw-content','.progress-item-',0);
            }else{
                tabBox('.progress-item','.zw-content','.progress-item-',localStorage.getItem('proList'));
            }

            /* 关闭函数 */
            $('.close-r').on('click',function(e){
                e.stopPropagation();
                e.preventDefault();
                var className = $(this).data('class');
                $('.'+className).css('display','none');
            });
            $('.btn-ck').on('click',function(e){
                e.stopPropagation();
                e.preventDefault();
                var className = $(this).data('class');
                $('.'+className).css('display','block');
            });

        }(jQuery));

        $(document).ready(function(){

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