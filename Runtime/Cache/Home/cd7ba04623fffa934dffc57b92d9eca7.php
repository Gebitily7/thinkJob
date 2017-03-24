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
    <link rel="stylesheet" href="/Public/Home/css/userp/edit.css"/>

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
        
    <div class="mask"></div>
    <div class="delete-box">
        <div class="name-top">
            <span>删除提示</span>
        </div>
        <div class="name-body">
            确定要删除 <span class="delete-name"></span>
        </div>
        <div class="btn-group-name">
            <span class="btn-qr btn-delete" data-url="<?php echo U('userp/deleteEdit');?>" data-id="" data-sql="">确认</span>
            <span class="btn-fr">取消</span>
        </div>
    </div>
    <div class="ajax-tips">
        <span>更新失败</span>
    </div>
    <section class="content-box">
        <!-- 头部背景图 -->
        <div class="content-item content-top">
            <div class="top-bg">
                <div class="spin-mask">
                    <span class="top-back" onclick="self.location=document.referrer;"><i class="fa fa-angle-left"></i></span>
                    <span class="side-title">编辑简历</span>
                </div>
            </div>
            <div class="tx_box">
                <figure class="u_tx">
                    <img src="/Public/Home/images/user/01.jpg" alt=""/>
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



        <!-- 简介 -->
        <div class="content-body clearfix">
            <div class="body-item">
                <ul>
                    <li class="li-item">
                        <i class="fa fa-user"></i>
                        <div class="em-item">
                            <p>
                                <?php if(($userInfo["sex"]) == "1"): ?><em>男</em>
                                    <?php else: ?>
                                    <em>女</em><?php endif; ?>
                                <em><?php echo (get_age($userInfo["birthday"])); ?>岁</em>
                            </p>
                            <p>
                                <em>身高：<?php echo ($userInfo["height"]); ?>cm</em>
                                <?php if(($userInfo["marry"]) == "1"): ?><em>已婚</em>
                                    <?php else: ?>
                                    <em>未婚</em><?php endif; ?>
                            </p>
                        </div>
                    </li>
                    <li class="li-item">
                        <i class="fa fa-briefcase"></i>
                        <div class="em-item">
                            <p>
                                <em><?php echo (get_max_edu($userInfo["max_edu"])); ?></em>
                                <em><?php echo (get_user_experience($userInfo["work_experience"])); ?></em>
                            </p>
                            <p>
                                <em>驾照：<?php echo (get_user_drive($userInfo["driver"])); ?></em>
                            </p>
                        </div>
                    </li>
                    <li class="li-item">
                        <i class="fa fa-tags"></i>
                        <div class="skill-label-box">
                            <?php echo (format_zw_label($userInfo["skill"])); ?>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="body-item">
                <ul>
                    <li class="li-item">
                        <i class="fa fa-bookmark"></i>
                        <div class="em-item">
                            <p>
                                <em>状态：<?php echo (get_status($userInfo["now_status"])); ?></em>
                            </p>
                            <p>
                        </div>
                    </li>
                    <li class="li-item">
                        <i class="fa fa-map-marker"></i>
                        <div class="em-item">
                            <p>
                                <em>现居：<?php echo (format_place($userInfo["present_addr"])); ?></em>
                            </p>
                            <p>
                                <em>户口：<?php echo (format_place($userInfo["birth_place"])); ?></em>
                            </p>
                        </div>
                    </li>
                    <li class="li-item">
                        <i class="fa fa-mobile fa-lg"></i>
                        <div class="em-item">
                            <p>
                                <em><?php echo ($userInfo["phone"]); ?></em>
                            </p>
                        </div>
                    </li>
                    <li class="li-item">
                        <i class="fa fa-globe"></i>
                        <div class="em-item">
                            <p>
                                <em>Email：<?php echo ($userInfo["email"]); ?></em>
                            </p>
                            <p>
                                <em>QQ：<?php echo ($userInfo["u_qq"]); ?></em>
                            </p>
                            <p>
                                <em>微信：<?php echo ($userInfo["u_weixin"]); ?></em>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 简介 -->

        <!-- 工作经历 -->
        <div class="re-item work-exp">
            <!-- 分隔条 -->
            <div class="del">
                <div class="dashed"></div>
                <span>工作经历</span>
            </div>
            <!-- 分隔条 -->

            <!-- addBox -->
            <?php if(($workNum) == "0"): ?><div class="add-box add-btn" data-this="" data-class="work-exp-edit">
                    <i>+&ensp;</i>
                    <span>添加工作经历</span>
                </div>
                <?php else: ?>
                <div class="edit-add  clearfix">
                    <div class="add-left fl">
                        <span>最多添加5个工作经历</span>
                    </div>
                    <div class="fr add-right add-btn" data-this="" data-class="work-exp-edit">
                        <i>+</i>
                        <span>添加</span>
                    </div>
                </div><?php endif; ?>
            <!-- /addBox -->

            <!-- 新增 -->
            <div class="content-body-edit work-exp-edit">
                <div class="user-edit">
                    <form id="workExp" data-action="<?php echo U('home/userp/updateWork');?>">
                        <input type="hidden" name="uid" value="<?php echo ($base["id"]); ?>"/>
                        <ul class="from-box">
                            <li class="clearfix pos-r">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>时间段</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="start_time" value=""/>
                                    </div>
                                </div>
                                <span style="position: absolute;top:40px;"> 至 </span>
                                <div class="input-item">
                                    <div class="input-title">
                                        <em></em>
                                        <span></span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="end_time" value=""/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>公司名称</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="company" value=""/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>公司行业</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="industry" value=""/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <input type="hidden" class="range" name="range" value=""/>
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>公司规模</span>
                                    </div>
                                    <div class="i-mar select-box pos-r">
                                        <span class="ipt-span click-span" data-type="range">请选择</span>
                                        <ul class="select-content">
                                            <li class='select-item'  data-val="0" data-title="20人以下">20人以下</li>
                                            <li class='select-item' data-val="1" data-title="20-40人">20-40人</li>
                                            <li class='select-item' data-val="2" data-title="40-80人">40-80人</li>
                                            <li class='select-item' data-val="3" data-title="80-150人">80-150人</li>
                                            <li class='select-item' data-val="4" data-title="150-300人">150-300人</li>
                                            <li class='select-item' data-val="5" data-title="300-500人">300-500人</li>
                                            <li class='select-item' data-val="6" data-title="500人以上">500人以上</li>
                                        </ul>
                                        <i class="fa fa-angle-down select-down-icon"></i>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <input type="hidden" class="property" name="property" value=""/>
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>公司性质</span>
                                    </div>
                                    <div class="i-mar select-box pos-r">
                                        <span class="ipt-span degree click-span" data-type="property">请选择</span>
                                        <ul class="select-content">
                                            <li class='select-item' data-val="1" data-title="国企">国企</li>
                                            <li class='select-item' data-val="2" data-title="外商融资">外商融资</li>
                                            <li class='select-item' data-val="3" data-title="代表处">代表处</li>
                                            <li class='select-item' data-val="4" data-title="合资">合资</li>
                                            <li class='select-item' data-val="5" data-title="民营">民营</li>
                                            <li class='select-item' data-val="6" data-title="股份制">股份制</li>
                                            <li class='select-item' data-val="7" data-title="国家机关">:国家机关</li>
                                            <li class='select-item' data-val="8" data-title="事业单位">事业单位</li>
                                        </ul>
                                        <i class="fa fa-angle-down select-down-icon"></i>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>职位名称</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="u_pos" value=""/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>职位类别</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="pos_cate" value=""/>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>部门</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="department" value=""/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>月薪(税前)(5000或4000-5000或 保密)</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="salary" value=""/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-area">
                            <div class="input-title">
                                <em>&ensp;</em>
                                <span>工作内容描述</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="work_content" cols="66" rows="6"></textarea>
                                <div class="num-limit"><span>0</span>/1000</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="angle"></div>
                <div class="btn-group">
                    <span class="btn-item" data-type="submit" data-form="workExp" data-class1="work-exp-edit" data-class2="work-box">确定</span>
                    <span class="btn-item" data-type="qx" data-class1="work-exp-edit" data-class2="work-box">取消</span>
                </div>
            </div>
            <!-- /新增 -->
            <?php if(is_array($work)): $i = 0; $__LIST__ = $work;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- content -->
            <div class="exp-box work-box-<?php echo ($vo["id"]); ?>">
                <div class="minCir circle"></div>
                <div class="mods">
                    <div class="exp-content">
                        <div class="edit-group">
                            <span class="tool-item tool-edit edit-btn" data-this="work-box" data-class="work-exp-edit" data-type="<?php echo ($vo["id"]); ?>" title="编辑"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                            <span class="tool-item tool-delete" data-id="<?php echo ($vo["id"]); ?>" data-sql="sql_u_work" data-name="<?php echo ($vo["u_pos"]); ?>" title="删除"><i class="fa fa-trash fa-lg"></i></span>
                        </div>
                        <div class="title-name">
                            <h3><?php echo ($vo["u_pos"]); ?></h3>
                        </div>
                        <div class="detail-box">
                            <div class="maxCir">
                                <span class="circle"></span>
                            </div>
                            <div class="detail-content">
                                <div class="detail-time"><time><?php echo (date('Y.m.d',$vo["start_time"])); ?></time>&ensp;&ensp;-&ensp;&ensp;<time><?php echo (date('Y.m.d',$vo["end_time"])); ?></time></div>
                                <div class="detail-detail">
                                    <p class="bor-em">
                                        <em><?php echo ($vo["company"]); ?></em>
                                        <em><?php echo (get_work_property($vo["property"])); ?></em>
                                        <em><?php echo (get_work_range($vo["range"])); ?></em>
                                    </p>
                                    <p>
                                        <em>所属行业：<?php echo ($vo["industry"]); ?></em>
                                        <em><?php echo ($vo["pos_cate"]); ?></em>
                                    </p>
                                    <p class="bor-em">
                                        <em><?php echo ($vo["department"]); ?></em>
                                        <em><?php echo ($vo["u_pos"]); ?></em>
                                    </p>
                                    <p>
                                        <em>月薪：<?php echo ($vo["salary"]); ?></em>
                                    </p>
                                </div>
                                <div class="detail-desc">
                                    <?php echo ($vo["work_content"]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="minCir circle"></div>
            </div>
            <!-- /content -->

            <!-- 编辑 -->
            <div class="content-body-edit work-exp-edit-<?php echo ($vo["id"]); ?>">
                <div class="user-edit">
                    <form id="workExp-<?php echo ($vo["id"]); ?>" data-action="<?php echo U('userp/updateWork');?>">
                        <input type="hidden" name="uid" value="<?php echo ($base["id"]); ?>"/>
                        <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
                        <ul class="from-box">
                            <li class="clearfix pos-r">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>时间</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="start_time" value="<?php echo (date('Y-m-d',$vo["start_time"])); ?>"/>
                                    </div>
                                </div>
                                <span style="position: absolute;top:40px;"> 至 </span>
                                <div class="input-item">
                                    <div class="input-title">
                                        <em></em>
                                        <span></span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="end_time" value="<?php echo (date('Y-m-d',$vo["end_time"])); ?>"/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>公司名称</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="company" value="<?php echo ($vo["company"]); ?>"/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>公司行业</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="industry" value="<?php echo ($vo["industry"]); ?>"/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <input type="hidden" class="range" name="range" value="<?php echo ($vo["range"]); ?>"/>
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>公司规模</span>
                                    </div>
                                    <div class="i-mar select-box pos-r">
                                        <span class="ipt-span degree click-span" data-type="range"><?php echo (get_work_range($vo["range"])); ?></span>
                                        <ul class="select-content">
                                            <li class='select-item <?php if(($vo["range"]) == "0"): ?>item-on<?php endif; ?>' data-val="0" data-title="20人以下">20人以下</li>
                                            <li class='select-item <?php if(($vo["range"]) == "1"): ?>item-on<?php endif; ?>' data-val="1" data-title="20-40人">20-40人</li>
                                            <li class='select-item <?php if(($vo["range"]) == "2"): ?>item-on<?php endif; ?>' data-val="2" data-title="40-80人">40-80人</li>
                                            <li class='select-item <?php if(($vo["range"]) == "3"): ?>item-on<?php endif; ?>' data-val="3" data-title="80-150人">80-150人</li>
                                            <li class='select-item <?php if(($vo["range"]) == "4"): ?>item-on<?php endif; ?>' data-val="4" data-title="150-300人">150-300人</li>
                                            <li class='select-item <?php if(($vo["range"]) == "5"): ?>item-on<?php endif; ?>' data-val="5" data-title="300-500人">300-500人</li>
                                            <li class='select-item <?php if(($vo["range"]) == "6"): ?>item-on<?php endif; ?>' data-val="6" data-title="500人以上">500人以上</li>
                                        </ul>
                                        <i class="fa fa-angle-down select-down-icon"></i>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <input type="hidden" class="property" name="property" value="<?php echo ($vo["property"]); ?>"/>
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>公司性质</span>
                                    </div>
                                    <div class="i-mar select-box pos-r">
                                        <span class="ipt-span degree click-span" data-type="property"><?php echo (get_work_property($vo["property"])); ?></span>
                                        <ul class="select-content">
                                            <li class='select-item <?php if(($vo["property"]) == "0"): ?>item-on<?php endif; ?>' data-val="0" data-title="国企">国企</li>
                                            <li class='select-item <?php if(($vo["property"]) == "1"): ?>item-on<?php endif; ?>' data-val="1" data-title="外商融资">外商融资</li>
                                            <li class='select-item <?php if(($vo["property"]) == "2"): ?>item-on<?php endif; ?>' data-val="2" data-title="代表处">代表处</li>
                                            <li class='select-item <?php if(($vo["property"]) == "3"): ?>item-on<?php endif; ?>' data-val="3" data-title="合资">合资</li>
                                            <li class='select-item <?php if(($vo["property"]) == "4"): ?>item-on<?php endif; ?>' data-val="4" data-title="民营">民营</li>
                                            <li class='select-item <?php if(($vo["property"]) == "5"): ?>item-on<?php endif; ?>' data-val="5" data-title="股份制">股份制</li>
                                            <li class='select-item <?php if(($vo["property"]) == "6"): ?>item-on<?php endif; ?>' data-val="6" data-title="国家机关">国家机关</li>
                                            <li class='select-item <?php if(($vo["property"]) == "6"): ?>item-on<?php endif; ?>' data-val="7" data-title="事业单位">事业单位</li>
                                        </ul>
                                        <i class="fa fa-angle-down select-down-icon"></i>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>职位名称</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="u_pos" value="<?php echo ($vo["u_pos"]); ?>"/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>职位类别</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="pos_cate" value="<?php echo ($vo["pos_cate"]); ?>"/>
                                    </div>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>部门</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="department" value="<?php echo ($vo["department"]); ?>"/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>月薪(税前)</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="salary" value="<?php echo ($vo["salary"]); ?>"/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-area">
                            <div class="input-title">
                                <em>&ensp;</em>
                                <span>工作内容描述</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="work_content" cols="66" rows="5"><?php echo ($vo["work_content"]); ?></textarea>
                                <div class="num-limit"><span><?php echo (mb_strlen($vo["work_content"],'UTF8')); ?></span>/1000</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="angle"></div>
                <div class="btn-group">
                    <span class="btn-item" data-type="submit" data-form="workExp-<?php echo ($vo["id"]); ?>" data-class1="work-exp-edit-<?php echo ($vo["id"]); ?>" data-class2="work-box-<?php echo ($vo["id"]); ?>">确定</span>
                    <span class="btn-item" data-type="qx" data-class1="work-exp-edit-<?php echo ($vo["id"]); ?>" data-class2="work-box-<?php echo ($vo["id"]); ?>">取消</span>
                </div>
            </div>
            <!-- /编辑 --><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- /工作经历 -->

        <!-- 教育经历 -->
        <div class="re-item education-exp">
            <!-- 分隔条 -->
            <div class="del">
                <div class="dashed"></div>
                <span>教育经历</span>
            </div>
            <!-- 分隔条 -->

            <!-- addBox -->
            <?php if(($eduNum) == "0"): ?><div class="add-box add-btn" data-this="" data-class="education-exp-edit">
                    <i>+&ensp;</i>
                    <span>添加工作经历</span>
                </div>
                <?php else: ?>
                <div class="edit-add clearfix">
                    <div class="add-left fl">
                        <span>最多添加5个教育经历</span>
                    </div>
                    <div class="fr add-right add-btn" data-this="" data-class="education-exp-edit">
                        <i>+</i>
                        <span>添加</span>
                    </div>
                </div><?php endif; ?>


            <!-- /addBox -->

            <div class="content-body-edit education-exp-edit">
                <div class="user-edit">
                    <form id="eduExp" data-action="<?php echo U('userp/updateEdu');?>">
                        <input type="hidden" name="uid" value="<?php echo ($base["id"]); ?>"/>
                        <ul class="from-box">
                            <li class="clearfix pos-r">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>就读时间</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="start_time" value=""/>
                                    </div>
                                </div>
                                <span style="position: absolute;top:40px;"> 至 </span>
                                <div class="input-item">
                                    <div class="input-title">
                                        <em></em>
                                        <span></span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="end_time" value=""/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>学校名称</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="school" value="<?php echo ($userInfo["school"]); ?>"/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <input type="hidden" class="academic" name="academic" value=""/>
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>所修学历</span>
                                    </div>
                                    <div class="i-mar select-box pos-r">
                                        <span class="ipt-span degree click-span" data-type="academic"></span>
                                        <ul class="select-content">
                                            <li class='select-item' data-val="0" data-title="初中">初中</li>
                                            <li class='select-item' data-val="1" data-title="高中">高中</li>
                                            <li class='select-item' data-val="2" data-title="大专">大专</li>
                                            <li class='select-item' data-val="3" data-title="本科">本科</li>
                                            <li class='select-item' data-val="4" data-title="硕士">硕士</li>
                                            <li class='select-item' data-val="5" data-title="博士">博士</li>
                                            <li class='select-item' data-val="6" data-title="其他">其他</li>
                                        </ul>
                                        <i class="fa fa-angle-down select-down-icon"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>所修专业</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="major" value=""/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-area">
                            <div class="input-title">
                                <em>&ensp;</em>
                                <span>在校学习生活</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="school_exp" id="" cols="66" rows="5"><?php echo ($edu["school_exp"]); ?></textarea>
                                <div class="num-limit"><span>0</span>/1000</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="angle">

                </div>
                <div class="btn-group">
                    <span class="btn-item" data-type="submit" data-form="eduExp" data-class1="education-exp-edit" data-class2="education-box">确定</span>
                    <span class="btn-item" data-type="qx" data-class1="education-exp-edit" data-class2="education-box">取消</span>
                </div>
            </div>

            <?php if(is_array($edu)): $i = 0; $__LIST__ = $edu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- content -->
            <div class="exp-box education-box-<?php echo ($vo["id"]); ?>">
                <div class="minCir circle"></div>
                <div class="mods">
                    <div class="exp-content">
                        <div class="edit-group">
                            <span class="tool-item tool-edit add-btn" data-this="education-box" data-class="education-exp-edit-<?php echo ($vo["id"]); ?>" data-type="<?php echo ($vo["id"]); ?>" title="编辑"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                            <span class="tool-item tool-delete" data-id="<?php echo ($vo["id"]); ?>" data-sql="sql_u_work" data-name="<?php echo ($vo["school"]); ?>" title="删除"><i class="fa fa-trash fa-lg"></i></span>
                        </div>
                        <div class="title-name">
                            <h3><?php echo ($vo["school"]); ?></h3>
                        </div>
                        <div class="detail-box">
                            <div class="maxCir">
                                <span class="circle"></span>
                            </div>
                            <div class="detail-content">
                                <div class="detail-time"><time><?php echo (date('Y.m.d',$vo["start_time"])); ?></time>&ensp;&ensp;-&ensp;&ensp;<time><?php echo (date('Y.m.d',$vo["end_time"])); ?></time></div>
                                <div class="detail-detail">
                                    <p class="pad-em">
                                        <em><?php echo (get_max_edu($vo["academic"])); ?></em>
                                        <em><?php echo ($vo["major"]); ?></em>
                                    </p>
                                </div>
                                <div class="detail-desc">
                                    <?php echo ($vo["school_exp"]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="minCir circle"></div>
            </div>
            <!-- /content -->

            <div class="content-body-edit education-exp-edit-<?php echo ($vo["id"]); ?>">
                <div class="user-edit">
                    <form id="eduExp-<?php echo ($vo["id"]); ?>" data-action="<?php echo U('userp/updateEdu');?>">
                        <input type="hidden" name="uid" value="<?php echo ($base["id"]); ?>"/>
                        <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
                        <ul class="from-box">
                            <li class="clearfix pos-r">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>就读时间</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="start_time" value="<?php echo (date('Y-m-d',$vo["start_time"])); ?>"/>
                                    </div>
                                </div>
                                <span style="position: absolute;top:40px;"> 至 </span>
                                <div class="input-item">
                                    <div class="input-title">
                                        <em></em>
                                        <span></span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="end_time" value="<?php echo (date('Y-m-d',$vo["end_time"])); ?>"/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>学校名称</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="school" value="<?php echo ($vo["school"]); ?>"/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <input type="hidden" class="academic" name="academic" value="<?php echo ($vo["academic"]); ?>"/>
                                    <div class="input-title">
                                        <em>&ensp;</em>
                                        <span>所修学历</span>
                                    </div>
                                    <div class="i-mar select-box pos-r">
                                        <span class="ipt-span degree click-span" data-type="academic"><?php echo (get_max_edu($vo["academic"])); ?></span>
                                        <ul class="select-content">
                                            <li class='select-item <?php if(($vo["academic"]) == "0"): ?>item-on<?php endif; ?>' data-val="0" data-title="初中">初中</li>
                                            <li class='select-item <?php if(($vo["academic"]) == "1"): ?>item-on<?php endif; ?>' data-val="1" data-title="高中">高中</li>
                                            <li class='select-item <?php if(($vo["academic"]) == "2"): ?>item-on<?php endif; ?>' data-val="2" data-title="大专">大专</li>
                                            <li class='select-item <?php if(($vo["academic"]) == "3"): ?>item-on<?php endif; ?>' data-val="3" data-title="本科">本科</li>
                                            <li class='select-item <?php if(($vo["academic"]) == "4"): ?>item-on<?php endif; ?>' data-val="4" data-title="硕士">硕士</li>
                                            <li class='select-item <?php if(($vo["academic"]) == "5"): ?>item-on<?php endif; ?>' data-val="5" data-title="博士">博士</li>
                                            <li class='select-item <?php if(($vo["academic"]) == "6"): ?>item-on<?php endif; ?>' data-val="6" data-title="其他">其他</li>
                                        </ul>
                                        <i class="fa fa-angle-down select-down-icon"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>所修专业</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="major" value="<?php echo ($vo["major"]); ?>"/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-area">
                            <div class="input-title">
                                <em>&ensp;</em>
                                <span>在校学习生活</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="school_exp" cols="66" rows="5"><?php echo ($vo["school_exp"]); ?></textarea>
                                <div class="num-limit"><span><?php echo (mb_strlen($vo["school_exp"],'UTF8')); ?></span>/1000</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="angle">

                </div>
                <div class="btn-group">
                    <span class="btn-item" data-type="submit" data-form="eduExp-<?php echo ($vo["id"]); ?>" data-class1="education-exp-edit-<?php echo ($vo["id"]); ?>" data-class2="education-box-<?php echo ($vo["id"]); ?>">确定</span>
                    <span class="btn-item" data-type="qx" data-class1="education-exp-edit-<?php echo ($vo["id"]); ?>" data-class2="education-box-<?php echo ($vo["id"]); ?>">取消</span>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <!-- /教育经历 -->

        <!-- 项目经验 -->
        <div class="re-item project-exp">
            <!-- 分隔条 -->
            <div class="del">
                <div class="dashed"></div>
                <span>项目经验</span>
            </div>
            <!-- 分隔条 -->

            <!-- addBox -->
            <?php if(($proNum) == "0"): ?><div class="add-box add-btn" data-this="project-box" data-class="project-exp-edit" data-type="0">
                    <i>+&ensp;</i>
                    <span>添加项目经验</span>
                </div>
            <?php else: ?>
                <div class="edit-add clearfix">
                    <div class="add-left fl">
                        <span>最多添加5个项目经验</span>
                    </div>
                    <div class="fr add-right add-btn" data-this="project-box" data-class="project-exp-edit" data-type="0">
                        <i>+</i>
                        <span>添加</span>
                    </div>
                </div><?php endif; ?>
            <!-- /addBox -->

            <div class="content-body-edit project-exp-edit">
                <div class="user-edit">
                    <form id="proExp" data-action="<?php echo U('userp/updatePro');?>">
                        <input type="hidden" name="uid" value="<?php echo ($base["id"]); ?>"/>
                        <ul class="from-box">
                            <li class="clearfix pos-r">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>项目时间</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="start_time" value=""/>
                                    </div>
                                </div>
                                <span style="position: absolute;top:40px;"> 至 </span>
                                <div class="input-item">
                                    <div class="input-title">
                                        <em></em>
                                        <span></span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="end_time" value=""/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>项目名称</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="pro_name" value=""/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-area">
                            <div class="input-title">
                                <em>*</em>
                                <span>你的职责</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="pro_pos"  cols="66" rows="5"></textarea>
                                <div class="num-limit"><span>0</span>/1000</div>
                            </div>
                        </div>
                        <div class="text-area">
                            <div class="input-title">
                                <em>&ensp;</em>
                                <span>你的职责项目描述</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="pro_desc" cols="66" rows="5"></textarea>
                                <div class="num-limit"><span>0</span>/1000</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="angle"></div>
                <div class="btn-group">
                    <span class="btn-item" data-type="submit" data-form="proExp" data-class1="project-exp-edit" data-class2="project-box">确定</span>
                    <span class="btn-item" data-type="qx" data-class1="project-exp-edit" data-class2="project-box">取消</span>
                </div>
            </div>

            <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- content -->
            <div class="exp-box project-box-<?php echo ($vo["id"]); ?>">
                <div class="minCir circle"></div>
                <div class="mods">
                    <div class="exp-content">
                        <div class="edit-group">
                            <span class="tool-item tool-edit add-btn" data-this="project-box-<?php echo ($vo["id"]); ?>" data-class="project-exp-edit-<?php echo ($vo["id"]); ?>" data-type="<?php echo ($vo["id"]); ?>" title="编辑"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                            <span class="tool-item tool-delete" title="删除"><i class="fa fa-trash fa-lg"></i></span>
                        </div>
                        <div class="title-name">
                            <h3><?php echo ($vo["pro_name"]); ?></h3>
                        </div>
                        <div class="detail-box">
                            <div class="maxCir">
                                <span class="circle"></span>
                            </div>
                            <div class="detail-content">
                                <div class="detail-time"><time><?php echo (date('Y.m.d',$vo["start_time"])); ?></time>&ensp;&ensp;-&ensp;&ensp;<time><?php echo (date('Y.m.d',$vo["end_time"])); ?></time></div>
                                <div class="detail-desc">
                                    <?php echo ($vo["pro_pos"]); ?>
                                </div>
                                <div class="detail-desc">
                                    <?php echo ($vo["pro_desc"]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="minCir circle"></div>
            </div>
            <!-- /content -->

            <div class="content-body-edit project-exp-edit-<?php echo ($vo["id"]); ?>">
                <div class="user-edit">
                    <form id="proExp-<?php echo ($vo["id"]); ?>" data-action="<?php echo U('userp/updatePro');?>">
                        <input type="hidden" name="uid" value="<?php echo ($base["id"]); ?>"/>
                        <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
                        <ul class="from-box">
                            <li class="clearfix pos-r">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>项目时间</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="start_time" value="<?php echo (date('Y-m-d',$vo["start_time"])); ?>"/>
                                    </div>
                                </div>
                                <span style="position: absolute;top:40px;"> 至 </span>
                                <div class="input-item">
                                    <div class="input-title">
                                        <em></em>
                                        <span></span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="end_time" value="<?php echo (date('Y-m-d',$vo["end_time"])); ?>"/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>项目名称</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="pro_name" value="<?php echo ($vo["pro_name"]); ?>"/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-area">
                            <div class="input-title">
                                <em>*</em>
                                <span>你的职责</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="pro_pos" cols="66" rows="5"><?php echo ($vo["pro_pos"]); ?></textarea>
                                <div class="num-limit"><span><?php echo (mb_strlen($vo["pro_pos"],'UTF8')); ?></span>/1000</div>
                            </div>
                        </div>
                        <div class="text-area">
                            <div class="input-title">
                                <em>&ensp;</em>
                                <span>项目描述</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="signature" id="" cols="66" rows="5"><?php echo ($vo["pro_desc"]); ?></textarea>
                                <div class="num-limit"><span><?php echo (mb_strlen($vo["pro_desc"],'UTF8')); ?></span>/1000</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="angle"></div>
                <div class="btn-group">
                    <span class="btn-item" data-type="submit" data-form="proExp-<?php echo ($vo["id"]); ?>" data-class1="project-exp-edit-<?php echo ($vo["id"]); ?>" data-class2="project-box-<?php echo ($vo["id"]); ?>">确定</span>
                    <span class="btn-item" data-type="qx" data-class1="project-exp-edit-<?php echo ($vo["id"]); ?>" data-class2="project-box-<?php echo ($vo["id"]); ?>">取消</span>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- /项目经验 -->

        <!-- 培训经历 -->
        <div class="re-item train-exp">
            <!-- 分隔条 -->
            <div class="del">
                <div class="dashed"></div>
                <span>培训经历</span>
            </div>
            <!-- 分隔条 -->

            <!-- addBox -->
            <?php if(($trainNum) == "0"): ?><div class="add-box add-btn" data-this="train-box" data-class="train-exp-edit" data-type="0">
                    <i>+&ensp;</i>
                    <span>添加项目经验</span>
                </div>
                <?php else: ?>
                <div class="edit-add clearfix">
                    <div class="add-left fl">
                        <span>最多添加3个培训经历</span>
                    </div>
                    <div class="fr add-right add-btn" data-this="train-box" data-class="train-exp-edit" data-type="0">
                        <i>+</i>
                        <span>添加</span>
                    </div>
                </div><?php endif; ?>
            <!-- /addBox -->

            <div class="content-body-edit train-exp-edit" >
                <div class="user-edit">
                    <form id="trainExp" data-action="<?php echo U('userp/updateTrain');?>">
                        <input type="hidden" name="uid" value="<?php echo ($base["id"]); ?>"/>
                        <ul class="from-box">
                            <li class="clearfix pos-r">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>培训时间</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="start_time" value=""/>
                                    </div>
                                </div>
                                <span style="position: absolute;top:40px;"> 至 </span>
                                <div class="input-item">
                                    <div class="input-title">
                                        <em></em>
                                        <span></span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="end_time" value=""/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>培训课程</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="train_name" value="<?php echo ($vo["train_name"]); ?>"/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>培训机构</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="train_company" value="<?php echo ($vo["train_company"]); ?>"/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-area">
                            <div class="input-title">
                                <em>&ensp;</em>
                                <span>培训内容描述</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="train_content" cols="66" rows="5"></textarea>
                                <div class="num-limit"><span>0</span>/1000</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="angle"></div>
                <div class="btn-group">
                    <span class="btn-item" data-type="submit" data-form="trainExp" data-class1="train-exp-edit" data-class2="train-box">确定</span>
                    <span class="btn-item" data-type="qx" data-class1="train-exp-edit" data-class2="train-box">取消</span>
                </div>
            </div>

            <?php if(is_array($train)): $i = 0; $__LIST__ = $train;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- content -->
            <div class="exp-box train-box">
                <div class="minCir circle"></div>
                <div class="mods">
                    <div class="exp-content">
                        <div class="edit-group">
                            <span class="tool-item add-btn" data-this="train-box-<?php echo ($vo["id"]); ?>" data-class="train-exp-edit-<?php echo ($vo["id"]); ?>" data-type="<?php echo ($vo["id"]); ?>" title="编辑"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                            <span class="tool-item tool-delete" title="删除"><i class="fa fa-trash fa-lg"></i></span>
                        </div>
                        <div class="title-name">
                            <h3><?php echo ($vo["train_name"]); ?></h3>
                        </div>
                        <div class="detail-box">
                            <div class="maxCir">
                                <span class="circle"></span>
                            </div>
                            <div class="detail-content">
                                <div class="detail-time"><time><?php echo (date('Y-m-d',$vo["start_time"])); ?></time>&ensp;&ensp;-&ensp;&ensp;<time><?php echo (date('Y-m-d',$vo["end_time"])); ?></time></div>
                                <div class="detail-detail">
                                    <p>
                                        <em><?php echo ($vo["train_company"]); ?></em>
                                    </p>
                                </div>
                                <div class="detail-desc">
                                    <?php echo ($vo["train_content"]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="minCir circle"></div>
            </div>
            <!-- /content -->

            <div class="content-body-edit train-exp-edit-<?php echo ($vo["id"]); ?>" >
                <div class="user-edit">
                    <form id="trainExp-<?php echo ($vo["id"]); ?>" data-action="<?php echo U('userp/updateTrain');?>">
                        <input type="hidden" name="uid" value="<?php echo ($base["id"]); ?>"/>
                        <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
                        <ul class="from-box">
                            <li class="clearfix pos-r">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>培训时间</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="<?php echo ($vo["start_time"]); ?>" value="<?php echo (date('Y-m-d',$vo["start_time"])); ?>"/>
                                    </div>
                                </div>
                                <span style="position: absolute;top:40px;"> 至 </span>
                                <div class="input-item">
                                    <div class="input-title">
                                        <em></em>
                                        <span></span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" class="date" autocomplete="off" name="end_time" value="<?php echo (date('Y-m-d',$vo["end_time"])); ?>"/>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>培训课程</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="train_name" value="<?php echo ($vo["train_name"]); ?>"/>
                                    </div>
                                </div>

                                <div class="input-item">
                                    <div class="input-title">
                                        <em>*</em>
                                        <span>培训机构</span>
                                    </div>
                                    <div class="i-mar">
                                        <input type="text" name="train_company" value="<?php echo ($vo["train_company"]); ?>"/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="text-area">
                            <div class="input-title">
                                <em>&ensp;</em>
                                <span>详细描述</span>
                            </div>
                            <div class="textarea-group">
                                <textarea class="text-area1" name="train_content" cols="66" rows="5"><?php echo ($vo["train_content"]); ?></textarea>
                                <div class="num-limit"><span><?php echo (mb_strlen($vo["train_content"],'UTF8')); ?></span>/1000</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="angle"></div>
                <div class="btn-group">
                    <span class="btn-item" data-type="submit" data-form="trainExp-<?php echo ($vo["id"]); ?>" data-class1="train-exp-edit-<?php echo ($vo["id"]); ?>" data-class2="train-box-<?php echo ($vo["id"]); ?>">确定</span>
                    <span class="btn-item" data-type="qx" data-class1="train-exp-edit-<?php echo ($vo["id"]); ?>" data-class2="train-box-<?php echo ($vo["id"]); ?>">取消</span>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!-- /培训经历 -->

        <!-- 自我评价 -->
        <div class="re-item self-exp">
            <!-- 分隔条 -->
            <div class="del self-del">
                <div class="dashed"></div>
                <span>自我评价</span>
            </div>
            <!-- 分隔条 -->

            <!-- content -->
            <div class="exp-box self-box">
                <div class="mods">
                    <div class="exp-content">
                        <div class="edit-group">
                            <span class="tool-item tool-edit edit-btn" data-this="self-box" data-class="self-exp-edit" data-type="1" title="编辑"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                            <span class="tool-item tool-delete" title="删除"><i class="fa fa-trash fa-lg"></i></span>
                        </div>
                        <div class="detail-box">
                            <div class="detail-content" style="border-color: transparent;">
                                <div class="self-desc">
                                    <?php echo ($userInfo["self"]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content -->
        </div>
        <div class="content-body-edit self-exp-edit-1" >
            <div class="user-edit">
                <form id="userBase" data-action="<?php echo U('userp/updateInfo');?>">
                    <div class="text-area">
                        <div class="input-title">
                            <em>&ensp;</em>
                            <span>工作内容描述</span>
                        </div>
                        <div class="textarea-group">
                            <textarea class="text-area1" name="self" cols="66" rows="5"><?php echo ($userInfo["self"]); ?></textarea>
                            <div class="num-limit"><span><?php echo (mb_strlen($userInfo["self"],'UTF8')); ?></span>/1000</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="angle"></div>
            <div class="btn-group">
                <span class="btn-item" data-type="submit" data-form="userBase" data-class1="self-exp-edit-1" data-class2="self-box">确定</span>
                <span class="btn-item" data-type="qx" data-class1="self-exp-edit-1" data-class2="self-box">取消</span>
            </div>
        </div>
        <!-- /自我评价 -->

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
    <script src="/Public/Home/js/user/userp.js"></script>
    <script>
        /* 时间 */
        $('.date').datetimepicker({
            format: 'yyyy-mm-dd',
            language:"zh-CN",
            minView:2,
            autoclose:true
        });

        /* scroll */
        if(localStorage.getItem('editRS') != null){
            $(document).scrollTop(localStorage.getItem('editRS'));
        }

        $(document).on('scroll',function(){
            var resumeScroll = $(this).scrollTop();
            localStorage.setItem('editRS',resumeScroll);
        });

        /* 单选 */
        $('.select-box').each(function(){
            $(this).clickRadio();
        });
        $(".city_1").each(function(){
            $(this).citySelect({
                prov  : '北京',
                city  : '西城区',
                nodata: "none",
                required: false
            });
        });
        var label = <?php echo ($label); ?>;
        $('.skill-label').labelSelect({
            url     : "/Public/static/label/zwLabel.min.js",
            required:false,
            data    : label,
            length  : 5,
            label   : ['互联网','金融','语言','专业']
        });

        /* 城市 */
        $('.place').each(function(){
            var $self = $(this);
            var $box = $(this).siblings('.city-box');
            var $qr  = $box.find('.qr');
            var $qx  = $box.find('.qx');
            var $select = $box.find('select');
            var place = [];
            $(this).on('focus',function(e){
                var evt = e || window.event;
                evt.stopPropagation();
                $box.css('display','block');
            });
            $qx.on('click',function(e){
                var evt = e || window.event;
                evt.stopPropagation();
                $box.css('display','none');
            });
            $qr.on('click',function(e){
                var evt = e || window.event;
                evt.stopPropagation();
                $select.each(function(i,item){
                    if(item.value != ''){
                        place[i] = item.value;
                    }
                });
                var str = place.join(',');
                $self.val(str);
                $box.css('display','none');
            });
        });

        /* 单选 */
        $('.radio-box').each(function(){
            var $click = $(this).find('.radio-item');
            var input = $(this).data('class');
            $click.on('click',function(){
                var value = $(this).data('val');
                $('.'+input).val(value);
                $click.removeClass('radio-item-selected');
                $(this).addClass('radio-item-selected');
            });
        });

        /* 确认键 */
        $('.btn-item').on('click',function(){
            var hidden = $(this).data('class1');
            var display = $(this).data('class2');
            var type = $(this).data('type');

            if(type == 'submit'){
                var formId = $(this).data('form');
                var $form = $('#'+formId);
                var url = $form.data('action');
                var data = $form.serialize();
                $.post(url,data,function(data){
                    if(data == null ||data.status){
                        $('.'+hidden).css('display','none');
                        $('.'+display).css('display','block');
                        location.href = "<?php echo U('home/userp/editresume/id/'.$base['id']);?>";
                    }else{
                        alert('更改错误');
                    }
                });
            }else{
                $('.'+hidden).css('display','none');
                $('.'+display).css('display','block');
            }
        });

        /* teatarea */
        $('.textarea-group').find('.text-area1').on('click keydown keyup',function(){
            var self = $(this);
            var str = self.val();
            var $num = self.siblings('.num-limit').find('span');
            $num.html(str.length);

            if(str.length <= 80){
                $num.css('color','#0066CC');
                self.css('border-color','#0066CC');
            }else if(str.length <= 85 && str.length >= 95){
                $num.css('color','#F0D00B');
                self.css('border-color','#F0D00B');
            } else if(str.length >= 95 && str.length <= 100){
                $num.css('color','#EB2626');
                self.css('border-color','#EB2626');
            }else{
                str = self.val(str.substr(0,99));
            }
        }).blur(function(){
            var self = $(this);
            self.css('border-color','#CCCCCC');
            var str = self.val();
        });


        /* 新增页 */
        $('.add-btn').on('click',function(){
            var $self  = $(this);
            var show   = $self.data('class');
            var $add = $('.'+show);

            $('.'+show+'-1').css('display','none');
            $add.css('display','block');

        });
        /* 编辑页的显示与阴藏 */
        $('.edit-btn').on('click',function(){
            var $self  = $(this);
            var hidden = $self.data('this');
            var show   = $self.data('class');
            var type   = $self.data('type');
            var $edit = $('.'+show+'-'+type);
            var $hidden = $('.'+hidden+'-'+type);

            $('.'+show).css('display','none');
            $edit.css('display','block');
            $hidden.css('display','none');
        });

        /* 删除 */
        $('.tool-delete').on('click',function(){
            var id = $(this).data('id');
            var sql = $(this).data('sql');
            var name = $(this).data('name');
            var $del = $('.delete-box');
            $del.find('.btn-delete').data('id',id);
            $del.find('.btn-delete').data('sql',sql);
            $del.find('.delete-name').html(name);
            $del.css('display','block');
        });

        $('.btn-fr').on('click',function(){
            $('.delete-box').css('display','none');
        });
        $('.btn-delete').on('click',function(){
            var $self =$(this);
            var id = $self.data('id');
            var url = $self.data('url');
            var sql = $self.data('sql');
            if(url != ''){
                $.post(url,{id:id,sql:sql},function(data){
                    if(data.status != 1){
                        $('.ajax-tips span').html('删除失败');
                    }else{
                        $('.ajax-tips span').html('删除成功');
                    }
                    $self.parent().parent('.delete-box').css('display','none');
                    $('.ajax-tips').animate({
                        'opacity' : 1
                    },1000).delay(1000).animate({
                        'opacity' : 0
                    },1000);
                });
            }
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