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

    <link rel="stylesheet" href="/Public/Home/css/center.css"/>
    <link rel="stylesheet" href="/Public/static/uploadify/uploadify.css"/>
    <link rel="stylesheet" href="/Public/static/uptx/css/style.css"/>
    <style>
        .content{
            margin: 5px auto;
        }
        .new-job{
            background: #FFFFFF;
            padding: 10px 0 15px 50px;
        }
        .back{
            width: 50px;
            margin: 10px 0 0 20px;
            line-height: 32px;
            background: rgba(0,102,204,.5);
            color: #ffffff;
            cursor: pointer;
            text-align: center;
        }
        .back:hover{
            background: rgba(0,102,204,.9);
        }
        .top-title{
            width: 500px;
            margin: 10px 0 0 130px;
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
                    <form action="" class="clearfix" method="post">
                        <!--选择-->
                        <div class="search-type fl clickFather">
                            <span title="全职">全职</span>
                            <i class="fa fa-caret-down fa-lg"></i>
                            <div class="clickChild">
                                <div class="child">兼职</div>
                                <div class="child">普工</div>
                            </div>
                        </div>
                        <input type="hidden" name="jobType" id="jobType" value="全职"/>
                        <!-- 输入框 -->
                        <div class="search-box clearfix">
                            <input type="text" class="search-input fl" placeholder="想搜索什么，输入关键词试试" name="search_input"/>
                        </div>
                        <!-- 输入框 -->
                    </form>
                    <!-- 按钮 -->
                    <div class="search-btn fl">
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
                            <a href="<?php echo U('userp/logout');?>"><li class="last"><i class="fa fa-sign-out fa-lg"></i></i>&emsp;退出</li></a>
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
        
    <script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" src="/Public/static/uptx/cropbox.js"></script>

    <section class="top clearfix">
        <div class="back fl js-url" data-url="<?php echo U('user/center');?>">
            <span>返回</span>
        </div>
        <div class="top-title fl">
            <h2>职位编辑</h2>
            <span style="color:#009C63;"><?php echo ($jobInfo["jobname"]); ?></span>
        </div>
    </section>
    <section class="content">
        <div class="mask"></div>
        <div class="input-tip"><span></span></div>

        <!-- 新建job -->
        <div class="zw-item-4 new-job">
            <!-- base -->
            <form data-action="<?php echo U('user/quanZhi');?>" data-actionj="<?php echo U('user/jianZhi');?>" method="post" id="job" data-url="">
                <input type="hidden" name="type" value="2" index="0">
                <input type="hidden" name="id"  value="<?php echo ($jobInfo["id"]); ?>" index="0"/>
                <div class="job-base">
                    <h3>基础属性</h3>
                    <ul class="content-group">

                        <li class="input-group radio">
                            <label>职位类别：</label>
                            <input type="hidden" name="model_id" class="jobCate" value="<?php echo ($jobInfo["model_id"]); ?>" index="0">
                            <span class="radio-item  radio-selected" data-id="1" data-value="5" data-menu="1">全职</span>
                            <span class="radio-item" data-id="2" data-value="15" data-menu="-1">兼职</span>
                        </li>

                        <li class="input-group input-pos clearfix">
                            <label class="fl" for="jobHy">所属行业：</label>
                            <input type="hidden" class="detection-name" id="jobHy" name="category_id" index="0" value="<?php echo ($jobInfo["category_id"]); ?>" />
                            <span class="fl c_1"><p style="color:#AAAAAA;"><?php echo (get_category_title($jobInfo["category_id"])); ?></p></span>
                            <i class="fa fa-pencil-square-o fa-lg fl"></i>
                            <div class="hy-cate"></div>
                            <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                        </li>

                        <li class="input-group pos-r">
                            <label for="jobName">职位名称：</label>
                            <input type="text" class="detection-name" id="jobName" name="jobname" index="0" value="<?php echo ($jobInfo["jobname"]); ?>" />
                            <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                        </li>

                        <li class="input-group pos-r">
                            <label for="put-time">发布时间：</label>
                            <input id="put-time" type="text" name="put_time" class="text date detection-name" index="0" value="<?php echo (date('Y-m-d',$jobInfo["update_time"])); ?>" placeholder="请选择日期" />
                            <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                        </li>

                        <li class="input-group">
                            <label for="deadline">截止时间：</label>
                            <?php if($jobInfo["deadline"] == 0): ?><input id="deadline" type="text" name="deadline" class="text date" index="0" value="" placeholder="请选择日期，不选择就是长期有效" />
                            <?php else: ?>
                                <input id="deadline" type="text" name="deadline" class="text date" index="0" value="<?php echo (date('Y-m-d',$jobInfo["deadline"])); ?>" placeholder="请选择日期，不选择就是长期有效" /><?php endif; ?>

                        </li>
                    </ul>
                </div>

                <!-- 全职 -->
                <div class="pos-diff diff-item-1">
                    <h3>全职信息</h3>
                    <ul class="content-group">

                        <li class="input-group pos-r">
                            <label for="recruit">招聘人数：</label>
                            <input type="text" id="recruit" class="detection-name" name="recruit_people_num" index="1" value="<?php echo ($jobInfo["recruit_people_num"]); ?>" placeholder="eg：10-20"/>
                            <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                        </li>

                        <li class="input-group">
                            <label for="jobSalary">薪&ensp;&ensp;&ensp;&ensp;资：</label>
                            <select name="salary_range" id="jobSalary" index="1">
                                <option value="0" <?php if(($jobInfo["salary_range"]) == "0"): ?>selected<?php endif; ?>>面议</option>
                                <option value="1" <?php if(($jobInfo["salary_range"]) == "1"): ?>selected<?php endif; ?>>1000及以下</option>
                                <option value="2" <?php if(($jobInfo["salary_range"]) == "2"): ?>selected<?php endif; ?>>1000-2000</option>
                                <option value="3" <?php if(($jobInfo["salary_range"]) == "3"): ?>selected<?php endif; ?>>2000-4000</option>
                                <option value="4" <?php if(($jobInfo["salary_range"]) == "4"): ?>selected<?php endif; ?>>4000-8000</option>
                                <option value="5" <?php if(($jobInfo["salary_range"]) == "5"): ?>selected<?php endif; ?>>8K-10K</option>
                                <option value="6" <?php if(($jobInfo["salary_range"]) == "6"): ?>selected<?php endif; ?>>10K-15K</option>
                                <option value="7" <?php if(($jobInfo["salary_range"]) == "7"): ?>selected<?php endif; ?>>15K-20K</option>
                                <option value="8" <?php if(($jobInfo["salary_range"]) == "8"): ?>selected<?php endif; ?>>20K-30K</option>
                                <option value="9" <?php if(($jobInfo["salary_range"]) == "9"): ?>selected<?php endif; ?>>30K-40K</option>
                                <option value="10" <?php if(($jobInfo["salary_range"]) == "10"): ?>selected<?php endif; ?>>40K-50K</option>
                                <option value="11" <?php if(($jobInfo["salary_range"]) == "11"): ?>selected<?php endif; ?>>50K以上</option>
                            </select>
                        </li>

                        <li class="input-group clearfix">
                            <label class="fl" for="jobPlace">工作地点：</label>
                            <div id="city_2">
                                <select class="prov" name="prov" index="1" data-url=""></select>
                                <select class="city" name="work_place" index="1" data-url="" disabled="disabled"></select>
                            </div>
                        </li>

                        <li class="input-group">
                            <label for="work_experience">工作经验：</label>
                            <select name="work_experience" index="1" id="work_experience">
                                <option value="0" <?php if(($jobInfo["work_experience"]) == "0"): ?>selected<?php endif; ?>>不限</option>
                                <option value="1" <?php if(($jobInfo["work_experience"]) == "1"): ?>selected<?php endif; ?>>应届毕业生</option>
                                <option value="2" <?php if(($jobInfo["work_experience"]) == "2"): ?>selected<?php endif; ?>>1年以下</option>
                                <option value="3" <?php if(($jobInfo["work_experience"]) == "3"): ?>selected<?php endif; ?>>1-3年</option>
                                <option value="4" <?php if(($jobInfo["work_experience"]) == "4"): ?>selected<?php endif; ?>>3-5年</option>
                                <option value="5" <?php if(($jobInfo["work_experience"]) == "5"): ?>selected<?php endif; ?>>5-7年</option>
                                <option value="6" <?php if(($jobInfo["work_experience"]) == "6"): ?>selected<?php endif; ?>>7-10年</option>
                                <option value="7" <?php if(($jobInfo["work_experience"]) == "7"): ?>selected<?php endif; ?>>10年以上</option>
                            </select>
                        </li>

                        <li class="input-group skill-label">
                            <label for="drive">技能要求：</label>
                            <div class="showtagcheck input_check gs-label-box"></div>

                            <div class="clear"></div>
                            <i class="tagAdd fa fa-pencil-square-o" title="点击修改"></i>
                            <input type="hidden" name="skill" id="nature" class="nature" data-url="" index="1" value="" >
                            <div class="tagBox" id="tagBox">
                                <div class="resume_tc">
                                    <div class="resume_tc_header">
                                        <h3>请选择技能</h3>
                                        <a class="close wd_close" href="javascript:;" title="关闭"><i class="fa fa-times"></i></a>
                                    </div>
                                    <div class="sx-yx">
                                        <span class="fnt-b">已选: </span>
                                        <span id="box_checkedTag" class="box_checkedTag"></span>
                                    </div>
                                    <div class="showTag">
                                        <div class="sx-cnt sx-cnt2">
                                            <div style="padding-bottom: 0;" class="sx-normal">
                                                <ul style="width:760px;" class="cf label_0"></ul>
                                                <ul style="width:760px;" class="cf label_1"></ul>
                                                <ul style="width:760px;" class="cf label_2"></ul>
                                                <ul style="width:760px;" class="cf label_3"></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sx-action clearfix">
                                        <a id="btn_tagsave" class="btn-label">确定</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /全职 -->

                <!-- 兼职 -->
                <div class="pos-diff diff-item-2">
                    <h3>兼职信息</h3>
                    <ul class="content-group">
                        <li class="input-group">
                            <label for="settle">结算方式：</label>
                            <input type="hidden" id="settle" index="2" name="settle_type" class="settle" value="0" />
                            <span class='single-item single3 settle-item <?php if(($jobInfo["settle_type"]) == "0"): ?>settle-selected<?php endif; ?>' data-settle="0" data-unit="jzU" data-unitvalue="">面议</span>
                            <span class='single-item single3 settle-item <?php if(($jobInfo["settle_type"]) == "1"): ?>settle-selected<?php endif; ?>' data-settle="1" data-unit="jzU" data-unitvalue="元/天">日结</span>
                            <span class='single-item single3 settle-item <?php if(($jobInfo["settle_type"]) == "2"): ?>settle-selected<?php endif; ?>' data-settle="2" data-unit="jzU" data-unitvalue="元/周">周结</span>
                            <span class='single-item single3 settle-item <?php if(($jobInfo["settle_type"]) == "3"): ?>settle-selected<?php endif; ?>' data-settle="3" data-unit="jzU" data-unitvalue="元/月">月结</span>
                        </li>

                        <li class="input-group pos-r">
                            <label for="salary">薪&ensp;&ensp;&ensp;&ensp;资：</label>
                            <input type="text" id="salary" class="salary" index="2" name="salary" value="<?php echo ($jobInfo["salary"]); ?>" />
                            <span class="settle-unit jzU">
                                <?php if(($jobInfo["settle_type"]) == "0"): endif; ?>
                                <?php if(($jobInfo["settle_type"]) == "1"): ?>元/天<?php endif; ?>
                                <?php if(($jobInfo["settle_type"]) == "2"): ?>周/天<?php endif; ?>
                                <?php if(($jobInfo["settle_type"]) == "3"): ?>月/天<?php endif; ?>
                            </span>
                        </li>

                        <li class="input-group clearfix pos-r">
                            <label class="fl" for="jobPlace">工作地点：</label>
                            <input type="text" class="detection-name" id="jobPlace" index="2" name="work_place" value="<?php echo ($jobInfo["work_place"]); ?>" placeholder="eg:上海、北京、郑州、焦作..."/>
                            <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                        </li>

                        <li class="input-group clearfix pos-r">
                            <label class="fl" for="workDay">哪天工作：</label>
                            <input type="text" id="workDay" class="detection-name" index="2" name="work_day" value="<?php echo ($jobInfo["work_day"]); ?>" placeholder="eg：周一、周二、周三、周四..、双休"/>
                            <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                        </li>

                        <li class="input-group clearfix pos-r">
                            <label class="fl" for="workTime">工作时间：</label>
                            <input type="text" id="workTime" class="detection-name" index="2" name="work_time" value="<?php echo ($jobInfo["work_time"]); ?>" placeholder="eg：上午、下午、8:00-10:00、16:00-18:00.."/>
                            <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                        </li>

                    </ul>
                </div>
                <!-- /兼职 -->

                <!-- 职位描述 -->
                <div class="job-desc">
                    <h3>职位描述</h3>
                    <ul class="content-group">
                        <li class="input-group">
                            <label for="jobSex">性别要求：</label>
                            <input type="hidden" id="jobSex" name="sex" index="0" value="<?php echo ($jobInfo["sex"]); ?>" class="sex"  />
                            <span class='single-item single1 sex-item <?php if(($jobInfo["sex"]) == "2"): ?>sex-selected<?php endif; ?>' data-sex="2">不限&ensp;<i class="fa fa-circle-thin"></i></span>
                            <span class='single-item single1 sex-item <?php if(($jobInfo["sex"]) == "1"): ?>sex-selected<?php endif; ?>' data-sex="1">男&ensp;<i class="fa fa-mars"></i></span>
                            <span class='single-item single1 sex-item <?php if(($jobInfo["sex"]) == "0"): ?>sex-selected<?php endif; ?>' data-sex="0">女&ensp;<i class="fa fa-venus"></i></span>
                        </li>

                        <li class="input-group">
                            <label for="drive">驾照要求：</label>
                            <input type="hidden" id="drive" name="drive" index="0" value="<?php echo ($jobInfo["drive"]); ?>" class="drive"  />
                            <span class='single-item single2 drive-item <?php if(($jobInfo["settle_type"]) == "0"): ?>drive-selected<?php endif; ?>' data-drive="0">不限</span>
                            <span class='single-item single2 drive-item <?php if(($jobInfo["settle_type"]) == "1"): ?>drive-selected<?php endif; ?>' data-drive="1">A照</span>
                            <span class='single-item single2 drive-item <?php if(($jobInfo["settle_type"]) == "2"): ?>drive-selected<?php endif; ?>' data-drive="2">B照</span>
                            <span class='single-item single2 drive-item <?php if(($jobInfo["settle_type"]) == "3"): ?>drive-selected<?php endif; ?>' data-drive="3">C照</span>
                        </li>

                        <li class="input-group">
                            <label for="academic">学历要求：</label>
                            <select name="academic_career" index="0" id="academic">
                                <option value="0" <?php if(($jobInfo["academic_career"]) == "0"): ?>selected<?php endif; ?>>不限</option>
                                <option value="1" <?php if(($jobInfo["academic_career"]) == "1"): ?>selected<?php endif; ?>>初中</option>
                                <option value="2" <?php if(($jobInfo["academic_career"]) == "2"): ?>selected<?php endif; ?>>高中及同等</option>
                                <option value="3" <?php if(($jobInfo["academic_career"]) == "3"): ?>selected<?php endif; ?>>大专及同等</option>
                                <option value="4" <?php if(($jobInfo["academic_career"]) == "4"): ?>selected<?php endif; ?>>本科及同等</option>
                                <option value="5" <?php if(($jobInfo["academic_career"]) == "5"): ?>selected<?php endif; ?>>硕士及同等</option>
                                <option value="6" <?php if(($jobInfo["academic_career"]) == "6"): ?>selected<?php endif; ?>>博士及以上</option>
                                <option value="7" <?php if(($jobInfo["academic_career"]) == "7"): ?>selected<?php endif; ?>>其他</option>
                            </select>
                        </li>

                        <li class="input-group">
                            <label for="age">年龄要求：</label>
                            <select name="age" id="age" index="0">
                                <option value="0" <?php if(($jobInfo["age"]) == "0"): ?>selected<?php endif; ?>>不限</option>
                                <option value="1" <?php if(($jobInfo["age"]) == "1"): ?>selected<?php endif; ?>>18-25</option>
                                <option value="2" <?php if(($jobInfo["age"]) == "2"): ?>selected<?php endif; ?>>20-36</option>
                                <option value="3" <?php if(($jobInfo["age"]) == "3"): ?>selected<?php endif; ?>>24-60</option>
                                <option value="4" <?php if(($jobInfo["age"]) == "4"): ?>selected<?php endif; ?>>30-60</option>
                                <option value="5" <?php if(($jobInfo["age"]) == "5"): ?>selected<?php endif; ?>>50岁以下</option>
                            </select>
                        </li>

                        <li class="input-group input-textarea">
                            <label for="jobDesc">岗位职责：</label>
                            <div class="textarea-group">
                                <textarea id="jobDesc" class="text-area1" name="job_desc" index="0" cols="61" rows="10"><?php echo ($jobInfo["job_desc"]); ?></textarea>
                                <div class="num-limit"><span><?php echo (mb_strlen($jobInfo["job_desc"],'UTF8')); ?></span>/500</div>
                            </div>
                        </li>

                        <li class="input-group input-textarea">
                            <label for="job_condition">任职条件：</label>
                            <div class="textarea-group">
                                <textarea id="job_condition" class="text-area1" name="job_condition" index="0" cols="61" rows="10"><?php echo ($jobInfo["job_condition"]); ?></textarea>
                                <div class="num-limit"><span><?php echo (mb_strlen($jobInfo["job_condition"],'UTF8')); ?></span>/500</div>
                            </div>
                        </li>

                        <li class="input-group input-textarea">
                            <label for="other_information">其他条件：</label>
                            <div class="textarea-group">
                                <textarea id="other_information" class="text-area1" name="other_information" index="0" cols="61" rows="10"><?php echo ($jobInfo["other_information"]); ?></textarea>
                                <div class="num-limit"><span><?php echo (mb_strlen($jobInfo["other_information"],'UTF8')); ?></span>/500</div>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- /职位描述 -->

                <!-- 职位联系方式 -->
                <div class="job-link">
                    <h3>联系方式</h3>
                    <ul class="content-group">
                        <li class="input-group pos-r">
                            <label for="linkman">联&ensp;系&ensp;人：</label>
                            <input type="text" class="detection-name" id="linkman" index="0" name="linkman" value="<?php echo ($jobInfo['linkman']); ?>" />
                            <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                        </li>
                        <li class="input-group">
                            <label for="phone">电&ensp;&ensp;&ensp;&ensp;话：</label>
                            <input type="text" id="phone" index="0" name="phone" value="<?php echo ($jobInfo['phone']); ?>"/>
                        </li>

                        <li class="input-group">
                            <label for="qq">Q&ensp;&ensp;&ensp;&ensp;Q：</label>
                            <input type="text" id="qq" index="0" name="qq" value="<?php echo ($jobInfo['qq']); ?>"/>
                        </li>

                        <li class="input-group pos-r">
                            <label for="email">邮&ensp;&ensp;&ensp;&ensp;箱：</label>
                            <input type="text" class="detection-email" id="email" index="0" name="email" value="<?php echo ($jobInfo['email']); ?>" />
                            <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                        </li>

                        <li class="input-group">
                            <label for="weixin">微&ensp;&ensp;&ensp;&ensp;信：</label>
                            <input type="text" id="weixin" index="0" name="weixin" value="<?php echo ($jobInfo['weixin']); ?>"/>
                        </li>

                    </ul>

                </div>
                <!-- /职位联系方式 -->
                <div class="submit-group">
                    <input type="hidden" name="rocover" class="recover" index="0" value="1">
                    <span class="submit-item ok" data-form="job" data-value="1">确定</span>
                    <span class="submit-item cancel" data-form="job" data-value="0">待发布</span>
                </div>
            </form>
            <!-- /base -->
        </div>
        <!-- /新建job -->
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

    <script src="/Public/static/select/jquery.cityselect.js"></script>
    <link href="/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
    <script>
        $(document).ready(function(){
            var time1  = null;
            var show = function(name,val,data){
                clearTimeout(time1);
                if(typeof data == 'undefined'){
                    data = {
                        top : '200px',
                        left : '650px'
                    }
                }
                $('.input-tip').css(data).addClass('show');
                time1 = setTimeout(function(){
                    $('.input-tip').removeClass('show');
                },1000*2);
                $('.input-tip span').html(name+val);
            };
            var label = <?php echo ($label); ?>;
            $('.skill-label').labelSelect({
                url     : "/Public/static/label/zwLabel.min.js",
                required:false,
                data    :label,
                label   : ['互联网','金融','语言','专业']
            });

            /* 城市 */
            var place = {
                    prov : <?php if($jobInfo["prov"] != ''): ?>'<?php echo ($jobInfo["prov"]); ?>'<?php else: ?>'江苏'<?php endif; ?>,
                    city : <?php if($jobInfo["work_place"] != ''): ?>'<?php echo ($jobInfo["work_place"]); ?>'<?php else: ?>'南京'<?php endif; ?>
            };
            $("#city_2").citySelect({
                prov:place.prov,
                city:place.city,
                nodata: "none",
                required: false
            });
            /*全职函数
             * */
            function quanZhi(data){
                var str = '';
                for(key in data){
                    str += '<div class="hy-cate-1"><span class="cl-select" data-id="'+data[key]['id']+'">'+data[key]['title']+'</span><div class="hy-cate-2">';
                    //$oDiv.html('<span>'+data[key]['title']+'</span><div class="hy-cate-2"></div><div class="pad-bg"></div>');
                    for(i in data[key]['_']){
                        str += '<div class="hy-cate-3"><h3><span class="label-bg cl-select" data-id="'+data[key]['_'][i]['id']+'">'+data[key]['_'][i]['title']+'</span></h3><div class="hy-cate3-box">';
                        for(k in data[key]['_'][i]['_']){
                            str += '<span class="label-bg cl-select" data-id="'+data[key]['_'][i]['_'][k]['id']+'">'+data[key]['_'][i]['_'][k]['title']+'</span>';
                        }
                        str += '</div></div>';
                    }
                    //str ='<div class="hy-cate-1"><span>生活服务</span><div class="hy-cate-2"><div class="hy-cate-3"><h3><span class="label-bg">餐饮</span></h3><div class="hy-cate3-box"><span class="label-bg">123</span></div></div></div><div class="pad-bg"></div></div>';
                    str += '</div><div class="pad-bg"></div></div>';
                }
                //console.log($oDiv.length);
                $('.hy-cate').html(str).removeClass('hy-cate-j');
                $('.cl-select').on('click',function(){
                    var id = $(this).data('id');
                    var htmlStr = $(this).html();
                    $('.input-pos input').val(id);
                    $('.input-pos>span').html(htmlStr);
                });
            };
            /*兼职
             * */
            function jianZhi(data){
                var str = '';
                for(i in data){
                    str += '<div class="hy-cate-1"><span class="cl-select" data-id="'+data[i]['id']+'">'+data[i]['title']+'</span></div>';
                }
                $('.hy-cate').html(str).addClass('hy-cate-j');
                $('.cl-select').on('click',function(){
                    var id = $(this).data('id');
                    var htmlStr = $(this).html();
                    $('.input-pos input').val(id);
                    $('.input-pos>span').html(htmlStr);
                });
            }
            var $model = <?php echo ($jobInfo["model_id"]); ?>;
            if($model == 5){
                $.post("<?php echo U('user/getCate');?>",{'menu':1},quanZhi);
            }else{
                $.post("<?php echo U('user/getCate');?>",{'menu':-1},function(data){
                    jianZhi(data[0]['_']);
                });
            }
            $('.radio-item').on('click',function(){
                $('.radio-item').removeClass('radio-selected');
                $(this).addClass('radio-selected');
                var menu = $(this).data('menu');
                var value = $(this).data('value');
                $('.jobCate').val(value);
                $.post("<?php echo U('user/getCate');?>",{'menu':menu},function(data){
                    if(menu == -1){
                        jianZhi(data[0]['_']);
                    }else if(menu == 1){
                        quanZhi(data);
                    }
                    $('input[name="jobname"]').val('');
                    $('.c_1').html('');
                });
            });

            /* 切换类型 */
            /* 切换函数 */
            var tabBox =  function(listObj,contentStr1,contentStr2,idItem){
                $(listObj).each(function(i,item){
                    $(item).on('click',function(){
                        var tabId = $(this).data('id');
                        $(contentStr1).css('display','none');
                        $(contentStr2+tabId).css('display','block');
                    });
                });
                var firstTab = function(){
                    var self = $(listObj).eq(idItem);
                    $(listObj).removeClass('radio-selected');
                    self.addClass('radio-selected');
                    var tabId = self.data('id');
                    $(contentStr2+tabId).css('display','block');
                };
                firstTab();
            };
            var $isCate = <?php echo ($jobInfo["iscate"]); ?>;
            tabBox('.radio-item','.pos-diff','.diff-item-',$isCate-1);
            /* 公司行业 */
            $('.input-div~i,.input-pos i').on({
                click : function(e){
                    var evt = e || window.event;
                    evt.stopPropagation();

                    if($(this).siblings('.div-content,.hy-cate').css('display') == 'block'){
                        $(this).siblings('.div-content,.hy-cate').css('display','none');
                    }else{
                        $(this).siblings('.div-content,.hy-cate').css('display','block');
                    }
                }
            });
            $('.cate-content').on('click',function(e){
                var evt = e || window.event;
                evt.stopPropagation();
                var name = $(this).data('val');
                var value = $(this).data('cid');
                var className = $(this).data('class');
                var $obj = $('.'+className);
                $obj.val(name);
                var postName = $obj.attr('name');
                $obj.siblings('.c_2').html(name);
                $('.div-content').css('display','none');
                $.post("<?php echo U('user/upUcenterMember');?>",{name:postName,val:value},function(data){
                    if(data.status){
                        show('数据','更改成功');
                    }
                });
            });

            /* 职位提交 */
            $('.submit-item').on('click',function(){
                var name  = $(this).data('form');
                var value = $(this).data('value');
                var $self = $('#'+name);
                var type  = $self.find('input[name="model_id"]').val();
                var data  = '';
                var ajaxUrl = $self.data('action');
                var index = 1;
                $self.find('.recover').val(value);
                if(type == 5){
                    data  = $self.find('input[index="0"],input[index="1"],select[index="0"],select[index="1"],textarea[index="0"],textarea[index="1"]').serialize();
                }else if(type == 15){
                    ajaxUrl = $self.data('actionj');
                    index = 2;
                    data  = $self.find('input[index="0"],input[index="2"],select[index="0"],select[index="2"],textarea[index="0"],textarea[index="1"]').serialize();
                }
                //
                //alert(ajax_submit($self,index));ajax_submit($self,index)
                if(true){
                    $.post(ajaxUrl, data, function(data){
                        var time = null;
                        if(data.status == 1){
                            show('',data.info);
                            time = setTimeout(function(){
                                location.href="<?php echo U('user/center');?>";
                            },2*1000);
                        }else{
                            show('',data.info);
                        }
                        //clearTimeout(time);
                    });
                }
            });
        });
    </script>
    <script type="text/javascript" src="/Public/Home/js/user/user.js" charset="UTF-8"></script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>