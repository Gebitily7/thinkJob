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
    <link rel="stylesheet" href="/Public/Home/css/zhaopin/detail.css"/>

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
        
    <section class="fl detail detail-left">
        <!-- top -->
        <div class="job-detail">
            <div class="base-info">
                <div class="job-name"><h2><?php echo ($info["jobname"]); ?></h2></div>
                <div class="job-salary">
                    <span style="color: #C80000;"><i class="fa fa-rmb" style="color: #C80000;"></i>&ensp;<?php echo (get_salary_range($vo["salary_range"])); ?></span>
                    <span><i class="fa fa-bookmark-o"></i>&ensp;<?php echo ($info["jobname"]); ?></span>
                </div>
                <div class="job-require">
                    <span><i class="fa fa-map-marker"></i>&ensp;<?php echo (get_place($info["work_place"])); ?></span>
                    <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($info["work_experience"])); ?></span>
                    <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($info["academic_career"])); ?></span>
                </div>
            </div>
            <div class="job-label">
                <?php echo (format_zw_label($info["skill"])); ?>
            </div>
            <p class="update-time">更新时间:&ensp;<time><?php echo (date("Y/m/d",$info["update_time"])); ?></time></p>

            <div class="like">
                <div>
                    <i class="fa fa-heart-o fa-2x"></i>
                    <span>关注</span>
                </div>
                <div>
                    <i class="fa fa-send-o fa-2x"></i>
                    <span>发送简历</span>
                </div>
            </div>
            <div class="nips">
                <div class="arrow arrow-right">

                </div>
                <span class="fr">聘</span>
            </div>
        </div>
        <!-- /top -->

        <!-- link -->
        <div class="link_man clearfix">
            <div class="fl l-tx">
                <img src="<?php echo (get_cover($userInfo["u_tx"],'path')); ?>" alt=""/>
            </div>
            <div class="fl nick">
                <p><?php echo ($userInfo["username"]); ?></p>
                <p><?php echo ($userInfo["pos"]); ?>&ensp;|&ensp;<?php echo ($userInfo["c_name"]); ?>&ensp;|&ensp;<?php echo (get_category_title($userInfo["industry"])); ?></p>
                <p>
                    <span>联系电话:<?php echo ($userInfo["linkman_phone"]); ?></span>&ensp;
                    <span>QQ:<?php echo ($userInfo["c_qq"]); ?></span>
                </p>
            </div>
            <div class="more-job">
                <span><a href="<?php echo U('home/user/company/id/'.$userInfo['id']);?>">共有<?php echo ($jobCount); ?>个职位</a></span>
            </div>
        </div>
        <!-- /link -->

        <!-- job-desc -->
        <div class="job-desc">
            <div class="jd-top">
                <i class="fa fa-file-text-o"></i>
                <span>职位描述</span>
            </div>
            <div class="jb-yq"><span>性别:<?php echo (get_sex_title($info["sex"])); ?></span>&ensp;|&ensp;<span>驾照:<?php echo (get_drive($info["drive"])); ?></span></div>
            <div class="jd-body">
                <span>岗位职责</span>
                <div class="duty">
                    <?php echo (format_text($info["job_desc"])); ?>
                </div>
                <span>任职条件</span>
                <div class="pre-job">
                    <?php echo (format_text($info["job_condition"])); ?>
                </div>
            </div>
        </div>
        <!-- /job-desc -->

        <!-- team -->
        <div class="team">
            <div class="team-top">
                <i class="fa fa-flag-o"></i>
                <span>公司介绍</span>
            </div>
            <div class="team-body">
                邮箱: <?php echo ($userInfo["email"]); ?><br/>
                <?php echo ($userInfo["intro"]); ?>
            </div>
            <div class="team-label">
                <?php echo (format_gs_label($userInfo["c_label"])); ?>
            </div>
        </div>
        <!-- /team -->

    </section>

    <section class="fl detail detail-right">
        <div class="gs-desc">
            <div class="re-mid clearfix">
                <a href="<?php echo U('home/user/company/id/'.$userInfo['id']);?>">
                    <div>
                        <img src="<?php echo (get_cover($userInfo["logo"],'path')); ?>" alt=""/>
                    </div>
                    <?php if(($userInfo["identify"]) == "2"): ?><span class="cert"><i class="fa fa-diamond"></i>已认证</span>
                    <?php else: ?>
                        <span class="uncert"><i class="fa fa-diamond"></i>未认证</span><?php endif; ?>

                    <div>
                        <p><?php echo ($userInfo["c_name"]); ?></p>
                        <p><?php echo ($userInfo["username"]); ?><span>&ensp;|&ensp;</span><?php echo ($userInfo["pos"]); ?></p>
                        <p>公司规模:&ensp;<?php echo ($userInfo["c_range"]); ?>人</p>
                    </div>
                </a>
            </div>
            <ul>
                <li><i class="fa fa-bars"></i><span><?php echo ($userInfo["c_range"]); ?>人</span></li>
                <li><i class="fa fa-globe"></i><a href="<?php echo ($userInfo["link"]); ?>"><?php echo ($userInfo["link"]); ?></a></li>
                <li><i class="fa fa-map-marker"></i><span><?php echo ($userInfo["c_place_detail"]); ?></span></li>
                <li><i class="fa fa-play-circle-o"></i><a href="<?php echo ($userInfo["c_link"]); ?>">公司视频宣传</a></li>
            </ul>
        </div>
    </section>
    <div class="clearfix"></div>
    <div class="comment">
        <?php echo hook('documentDetailAfter',$info);?>
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