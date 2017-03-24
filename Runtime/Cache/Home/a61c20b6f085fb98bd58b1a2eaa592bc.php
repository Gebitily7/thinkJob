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
    <link rel="stylesheet" href="/Public/Home/css/zhaopin/index.css"/>
    <link rel="stylesheet" href="/Public/Home/css/jianzhi/index.css"/>
    <style>
        .like-o{
            color: #C80000;
        }
        .send-o{
            color: #FFA248;
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
                <strong>兼职分类</strong>
                <i class="fr fa fa-caret-up fa-lg down" style="margin-top: 13px;"></i>
            </div>

            <div class="sidbarnav clearfix fl">
                <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav1): $mod = ($i % 2 );++$i;?><span><a href="<?php echo U($nav1['url']);?>" data-id="<?php echo ($nav1['id']); ?>" ><?php echo ($nav1["title"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</section>


<!-- /头部 -->

<!-- 主体 -->

    <!-- 当前位置 -->
    <section class="now-pos">
        <div class="box">
            <span>
                <b>当前位置:&emsp;</b>
                <a href="http://www.job.com">首页</a>
                <i class="fa fa-angle-right fa-lg"></i>
                <a href="<?php echo U('home/jianzhi/index');?>">兼职</a>
            </span>
        </div>
    </section>
    <!-- /当前位置 -->

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
        
    <!-- 筛选 -->
    <section class="filtrate">
        <div class="filtrate-box">
            <div class="industry select-del clearfix">
                <span>类&emsp;&emsp;别&ensp;:</span>
                <ul class="fl clearfix">
                    <li class='radio-item js-url <?php if(($cid) == ""): ?>radio-selected<?php endif; ?>' data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'acm'=>$acm,'time'=>$time));?>">全部</li>
                    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li class='js-url <?php if($cate["id"] == $cid): ?>radio-selected<?php endif; ?>' data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cate['id'],'acm'=>$acm,'time'=>$time));?>"><?php echo ($cate["title"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="sel-else select-del clearfix">
                <span>其&emsp;&emsp;他&ensp;:</span>
                <div class="clearfix sel-else-box">

                    <div class="fl">学历要求</div>
                    <div class="fl father">
                        <span><?php if(($acm) == ""): ?>不限<?php else: echo (get_academic_career($acm)); endif; ?></span><i class="fa fa-caret-down"></i>
                        <ul class="clickChild">
                            <li class='js-url' data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'time'=>$time));?>">不限</li>
                            <li class="js-url" data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>1,'time'=>$time));?>">初中</li>
                            <li class="js-url" data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>2,'time'=>$time));?>">高中及同等</li>
                            <li class="js-url" data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>3,'time'=>$time));?>">大专及同等</li>
                            <li class="js-url" data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>4,'time'=>$time));?>">本科及同等</li>
                            <li class="js-url" data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>5,'time'=>$time));?>">硕士及同等</li>
                            <li class="js-url" data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>6,'time'=>$time));?>">博士及以上</li>
                            <li class="js-url" data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>7,'time'=>$time));?>">其他</li>
                        </ul>
                    </div>
                    <div class="fl">发布时间</div>
                    <div class="fl father">
                        <span><?php if(($time) == ""): ?>不限<?php else: echo (get_time_list($time)); endif; ?></span><i class="fa fa-caret-down"></i>
                        <ul class="clickChild">
                            <li class='js-url' data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>$acm));?>">不限</li>
                            <li class='js-url' data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>$acm,'time'=>0));?>">今天</li>
                            <li class='js-url' data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>$acm,'time'=>1));?>">3天内</li>
                            <li class='js-url' data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>$acm,'time'=>2));?>">1周内</li>
                            <li class='js-url' data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>$acm,'time'=>3));?>">2周内</li>
                            <li class='js-url' data-url="<?php echo U('Jianzhi/index',array('pid'=>$pid,'cid'=>$cid,'acm'=>$acm,'time'=>4));?>">1个月内</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /筛选 -->

    <!-- 职位列表详情 -->
    <section class="job-list clearfix">
        <!-- 职位大概数量和分页 -->
        <div class="job-top">
            <div class="fl job-nav num-1">
                <span class="job-num">为你找到&ensp;<i><?php echo ($pageNum); ?></i>&ensp;个职位</span>
                <div class="fr">
                    <a href="">
                        <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                    </a>
                    <span class="all-page"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($pageCount); ?></span>
                    <a href="">
                        <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                    </a>
                </div>
            </div>
            <div class="fl re-job">
                <span>推荐职位</span>
            </div>
        </div>
        <!-- /职位大概数量和分页 -->

        <!-- 职位列表 -->
        <ul class="job-tab">
            <?php if(is_array($job)): $i = 0; $__LIST__ = $job;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="job-item">
                <a class="clearfix" href="<?php echo U('home/jianzhi/detail/id/'.$vo['id']);?>">
                    <div class="job-left">
                        <div>
                            <span><i></i><?php echo ($vo["title"]); ?></span>
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
                            <span><i class="fa fa-building-o"></i>&ensp;<?php echo ($vo["c_name"]); ?></span>
                            <?php if(($vo["is_send"]) == "1"): ?><span class="job-fa" style="float: right; color: #008803; font-size: .8em;"><i class="fa fa-check-circle fa-lg"></i>已发送</span><?php endif; ?>
                        </div>
                        <div>
                            <span><?php echo (get_category_title($vo["industry"])); ?></span>|
                            <span><?php echo (get_step_list($vo["step"])); ?></span>|
                            <span><?php echo ($vo["c_range"]); ?>人</span>
                            <span>&emsp;<i class="fa fa-phone"></i>&ensp;<?php echo ($vo["linkman_phone"]); ?></span>
                        </div>
                    </div>
                    <div class="job-label">
                        <?php echo (format_gs_label($vo["c_label"])); ?>
                    </div>
                </a>

                <?php if(is_login() and session('user_type') == 1): ?><div class="job-tip">
                    <?php if($vo["is_like"] == 1): ?><div class="fl tip like" data-ajax="1" data-jid="<?php echo ($vo["id"]); ?>" data-gid="<?php echo ($vo["uid"]); ?>" data-name="<?php echo ($vo["title"]); ?>" data-status="0">
                            <i class="fa fa-heart fa-3x like-o"></i>
                            <span style="color: #C80000">已关注</span>
                        </div>
                        <?php else: ?>
                        <div class="fl tip like" data-ajax="0" data-jid="<?php echo ($vo["id"]); ?>" data-gid="<?php echo ($vo["uid"]); ?>" data-name="<?php echo ($vo["title"]); ?>" data-status="1">
                            <i class="fa fa-heart-o fa-3x"></i>
                            <span>关注</span>
                        </div><?php endif; ?>
                    <?php if($vo["is_send"] == 1): ?><div class="fl tip send-o" data-ajax="1">
                            <i class="fa fa-send fa-3x" style="color: #FFA248;"></i>
                            <span style="color: #FFA248;">已发送</span>
                        </div>
                        <?php else: ?>
                        <div class="fl tip send" data-ajax="0"  data-jid="<?php echo ($vo["id"]); ?>" data-gid="<?php echo ($vo["uid"]); ?>" data-name="<?php echo ($vo["title"]); ?>" data-status="0">
                            <i class="fa fa-send-o fa-3x"></i>
                            <span>发送简历</span>
                        </div><?php endif; ?>

                </div><?php endif; ?>

            </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
            <li class="page" data-id="1">
                <?php echo ($page); ?>
            </li>
            <script>
                $(document).ready(function(){
                    $('.page').each(function(){
                        var num    = $(this).find('.current').html();
                        var selfId = $(this).data('id');
                        var prev   = $(this).find('.prev').attr('href');
                        var next   = $(this).find('.next').attr('href');
                        var $num   = $('.num-'+selfId);
                        $num.find('.all-page i').html(num);
                        $num.find('.next-ajax').parent('a').attr('href',next);
                        $num.find('.prev-ajax').parent('a').attr('href',prev);
                    });
                });
            </script>
        </ul>
        <!-- /职位列表 -->

        <!-- 职位推荐 -->
        <ul class="gs-tab">
            <li class="gs-item" data-src="http://www.baidu.com">
                <div class="re-top">
                    <h3>Web前段研发工程师</h3>
                    <span style="color: #C80000;"><i class="fa fa-rmb" style="color: #C80000;"></i>&ensp;3K-5K</span>
                    <span><i class="fa fa-map-marker"></i>&ensp;上海</span>
                    <span><i class="fa fa-briefcase"></i>&ensp;应届生</span>
                    <span><i class="fa fa-graduation-cap"></i>&ensp;本科</span>
                </div>
                <div class="re-mid clearfix">
                    <div>
                        <img src="/Public/Home/images/user/01.jpg" alt=""/>
                    </div>
                    <span class="cert"><i class="fa fa-diamond"></i>已认证</span>
                    <div>
                        <p>焦作市赛克尔网络科技</p>
                        <p>Gebitily7<span>&ensp;|&ensp;</span>CEO</p>
                        <p>公司规模0-20人</p>
                    </div>
                </div>
                <div class="re-bottom">
                    <span>发布日期:&ensp;</span><time>04/07</time>
                </div>
            </li>
            <li class="gs-item" data-src="http://www.baidu.com">
                <div class="re-top">
                    <h3>Web前段研发工程师</h3>
                    <span style="color: #C80000;"><i class="fa fa-rmb" style="color: #C80000;"></i>&ensp;3K-5K</span>
                    <span><i class="fa fa-map-marker"></i>&ensp;上海</span>
                    <span><i class="fa fa-briefcase"></i>&ensp;应届生</span>
                    <span><i class="fa fa-graduation-cap"></i>&ensp;本科</span>
                </div>
                <div class="re-mid clearfix">
                    <div>
                        <img src="/Public/Home/images/user/01.jpg" alt=""/>
                    </div>
                    <span class="cert"><i class="fa fa-diamond"></i>已认证</span>
                    <div>
                        <p>焦作市赛克尔网络科技</p>
                        <p>Gebitily7<span>&ensp;|&ensp;</span>CEO</p>
                        <p>公司规模0-20人</p>
                    </div>
                </div>
                <div class="re-bottom">
                    <span>发布日期:&ensp;</span><time>04/07</time>
                </div>
            </li>
            <li class="gs-item" data-src="http://www.baidu.com">
                <div class="re-top">
                    <h3>Web前段研发工程师</h3>
                    <span style="color: #C80000;"><i class="fa fa-rmb" style="color: #C80000;"></i>&ensp;3K-5K</span>
                    <span><i class="fa fa-map-marker"></i>&ensp;上海</span>
                    <span><i class="fa fa-briefcase"></i>&ensp;应届生</span>
                    <span><i class="fa fa-graduation-cap"></i>&ensp;本科</span>
                </div>
                <div class="re-mid clearfix">
                    <div>
                        <img src="/Public/Home/images/user/01.jpg" alt=""/>
                    </div>
                    <span class="cert"><i class="fa fa-diamond"></i>已认证</span>
                    <div>
                        <p>焦作市赛克尔网络科技</p>
                        <p>Gebitily7<span>&ensp;|&ensp;</span>CEO</p>
                        <p>公司规模0-20人</p>
                    </div>
                </div>
                <div class="re-bottom">
                    <span>发布日期:&ensp;</span><time>04/07</time>
                </div>
            </li>
            <li class="gs-item" data-src="http://www.baidu.com">
                <div class="re-top">
                    <h3>Web前段研发工程师</h3>
                    <span style="color: #C80000;"><i class="fa fa-rmb" style="color: #C80000;"></i>&ensp;3K-5K</span>
                    <span><i class="fa fa-map-marker"></i>&ensp;上海</span>
                    <span><i class="fa fa-briefcase"></i>&ensp;应届生</span>
                    <span><i class="fa fa-graduation-cap"></i>&ensp;本科</span>
                </div>
                <div class="re-mid clearfix">
                    <div>
                        <img src="/Public/Home/images/user/01.jpg" alt=""/>
                    </div>
                    <span class="cert"><i class="fa fa-diamond"></i>已认证</span>
                    <div>
                        <p>焦作市赛克尔网络科技</p>
                        <p>Gebitily7<span>&ensp;|&ensp;</span>CEO</p>
                        <p>公司规模0-20人</p>
                    </div>
                </div>
                <div class="re-bottom">
                    <span>发布日期:&ensp;</span><time>04/07</time>
                </div>
            </li>
            <li class="gs-item" data-src="http://www.baidu.com">
                <div class="re-top">
                    <h3>Web前段研发工程师</h3>
                    <span style="color: #C80000;"><i class="fa fa-rmb" style="color: #C80000;"></i>&ensp;3K-5K</span>
                    <span><i class="fa fa-map-marker"></i>&ensp;上海</span>
                    <span><i class="fa fa-briefcase"></i>&ensp;应届生</span>
                    <span><i class="fa fa-graduation-cap"></i>&ensp;本科</span>
                </div>
                <div class="re-mid clearfix">
                    <div>
                        <img src="/Public/Home/images/user/01.jpg" alt=""/>
                    </div>
                    <span class="uncert"><i class="fa fa-diamond"></i>未认证</span>
                    <div>
                        <p>焦作市赛克尔网络科技</p>
                        <p>Gebitily7<span>&ensp;|&ensp;</span>CEO</p>
                        <p>公司规模0-20人</p>
                    </div>
                </div>
                <div class="re-bottom">
                    <span>发布日期:&ensp;</span><time>04/07</time>
                </div>
            </li>
            <li class="gs-item" data-src="http://www.baidu.com">
                <div class="re-top">
                    <h3>Web前段研发工程师</h3>
                    <span style="color: #C80000;"><i class="fa fa-rmb" style="color: #C80000;"></i>&ensp;3K-5K</span>
                    <span><i class="fa fa-map-marker"></i>&ensp;上海</span>
                    <span><i class="fa fa-briefcase"></i>&ensp;应届生</span>
                    <span><i class="fa fa-graduation-cap"></i>&ensp;本科</span>
                </div>
                <div class="re-mid clearfix">
                    <div>
                        <img src="/Public/Home/images/user/01.jpg" alt=""/>
                    </div>
                    <span class="cert"><i class="fa fa-diamond"></i>已认证</span>
                    <div>
                        <p>焦作市赛克尔网络科技</p>
                        <p>Gebitily7<span>&ensp;|&ensp;</span>CEO</p>
                        <p>公司规模0-20人</p>
                    </div>
                </div>
                <div class="re-bottom">
                    <span>发布日期:&ensp;</span><time>04/07</time>
                </div>
            </li>
            <li class="gs-item" data-src="http://www.baidu.com">
                <div class="re-top">
                    <h3>Web前段研发工程师</h3>
                    <span style="color: #C80000;"><i class="fa fa-rmb" style="color: #C80000;"></i>&ensp;3K-5K</span>
                    <span><i class="fa fa-map-marker"></i>&ensp;上海</span>
                    <span><i class="fa fa-briefcase"></i>&ensp;应届生</span>
                    <span><i class="fa fa-graduation-cap"></i>&ensp;本科</span>
                </div>
                <div class="re-mid clearfix">
                    <div>
                        <img src="/Public/Home/images/user/01.jpg" alt=""/>
                    </div>
                    <span class="cert"><i class="fa fa-diamond"></i>已认证</span>
                    <div>
                        <p>焦作市赛克尔网络科技</p>
                        <p>Gebitily7<span>&ensp;|&ensp;</span>CEO</p>
                        <p>公司规模0-20人</p>
                    </div>
                </div>
                <div class="re-bottom">
                    <span>发布日期:&ensp;</span><time>04/07</time>
                </div>
            </li>
            <li class="gs-item" data-src="http://www.baidu.com">
                <div class="re-top">
                    <h3>Web前段研发工程师</h3>
                    <span style="color: #C80000;"><i class="fa fa-rmb" style="color: #C80000;"></i>&ensp;3K-5K</span>
                    <span><i class="fa fa-map-marker"></i>&ensp;上海</span>
                    <span><i class="fa fa-briefcase"></i>&ensp;应届生</span>
                    <span><i class="fa fa-graduation-cap"></i>&ensp;本科</span>
                </div>
                <div class="re-mid clearfix">
                    <div>
                        <img src="/Public/Home/images/user/01.jpg" alt=""/>
                    </div>
                    <span class="cert"><i class="fa fa-diamond"></i>已认证</span>
                    <div>
                        <p>焦作市赛克尔网络科技</p>
                        <p>Gebitily7<span>&ensp;|&ensp;</span>CEO</p>
                        <p>公司规模0-20人</p>
                    </div>
                </div>
                <div class="re-bottom">
                    <span>发布日期:&ensp;</span><time>04/07</time>
                </div>
            </li>
        </ul>
        <!-- /职位推荐 -->
    </section>
    <!-- /职位列表详情 -->

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
            $('#sidBar,#sidBarMain').hover(function(){
                $('#sidBarMain').css('display','block');
            },function(){
                $('#sidBarMain').css('display','none');
            });

            // 选择框的显示与否(common.js)
            showList.init($('.father'));

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
                    }
                });
            });

            /* like */

            $('.like').on('click',function(){
                var $self = $(this);
                var jid   = $self.data('jid');
                var gid   = $self.data('gid');
                var name  = $self.data('name');
                var status= $self.data('status');
                var url   = "<?php echo U('home/userp/ulike');?>";
                $.post(url,{jid:jid,gid:gid,status:status},function(data){
                    if(data.status == 1){
                        location.reload();
                    }
                });
            });

            $('.send').on('click',function(){
                var $self = $(this);
                var jid   = $self.data('jid');
                var gid   = $self.data('gid');
                var name  = $self.data('name');
                var status= $self.data('status');
                var url   = "<?php echo U('home/userp/usend');?>";
                $.post(url,{jid:jid,cid:gid,status:status},function(data){
                    if(data.status == 1){
                        location.reload();
                    }
                });
            });

            // 推荐职位
            $('.gs-item').each(function(){
                $(this).on('click',function(){
                    var src = $(this).data('src');
                    location.href=src;
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