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
    <link rel="stylesheet" href="/Public/Home/css/userp/center.css"/>
    <link rel="stylesheet" href="/Public/static/uptx/css/style.css"/>

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
        
    <script type="text/javascript" src="/Public/static/uptx/cropbox.js"></script>
    <div class="mask"></div>
    <div class="upload-content">
        <div class="container_tx pos-r" id="up-picture">
            <div class="imageBox">
                <div class="thumbBox"></div>
                <div class="spinner" style="display: none">Loading...</div>
            </div>
            <div class="action">
                <!-- <input type="file" id="file" style=" width: 200px">-->
                <div class="new-contentarea tc"> <a href="javascript:void(0)" class="upload-img">
                    <label for="upload-file">上传图像</label>
                </a>
                    <input type="file" class="upload-file" name="upload-file" id="upload-file" />
                </div>
                <input type="button" id="btnCrop"  class="Btnsty_peyton btnCrop" value="裁切">
                <input type="button" id="btnZoomIn" class="Btnsty_peyton btnZoomIn" value="+"  >
                <input type="button" id="btnZoomOut" class="Btnsty_peyton btnZoomOut" value="-" >
                <input type="button" class="Btnsty_peyton ajax-post" value="确定">
                <input type="button" class="Btnsty_peyton p-cancel" value="取消">
            </div>
            <div class="cropped"></div>
        </div>
    </div>
    <section class="content-box">
        <div class="content-item content-top">
            <div class="top-bg">
                <div class="spin-mask">
                    <span class="top-back js-url" data-url="<?php echo U('userp/center');?>"><i class="fa fa-angle-left"></i></span>
                    <span class="side-title">个人中心</span>
                </div>
            </div>
            <div class="tx_box">
                <figure class="u_tx">
                    <?php if(($user["u_tx"]) != ""): ?><img src="<?php echo (get_cover($user["u_tx"],'path')); ?>" alt=""/>
                    <?php else: ?>
                        <img src="/Public/Home/images/user/01.jpg" alt=""/><?php endif; ?>

                    <figcaption class = "g_tx_item">
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
            <div class="edit-tool" data-class="content-body-edit"  title="点击修改">
                <i class="fa fa-pencil-square-o btn-item" data-type="qx" data-class1="content-body" data-class2="content-body-edit"></i>
            </div>
        </div>
        <div class="content-body-edit">
            <div class="user-edit">
                <form id="userBase" data-action="<?php echo U('userp/updateInfo');?>">
                    <ul class="from-box">
                        <li class="clearfix">
                            <div class="input-item">
                                <div class="input-title">
                                    <em>*</em>
                                    <span>姓名</span>
                                </div>
                                <div class="i-mar">
                                    <input type="text" name="uname" value="<?php echo ($userInfo["uname"]); ?>"/>
                                </div>
                            </div>
                            <div class="input-item">
                                <input type="hidden" class="sex" name="sex" value="<?php echo ($userInfo["sex"]); ?>"/>
                                <div class="input-title">
                                    <em>*</em>
                                    <span>性别</span>
                                </div>
                                <div class="i-mar radio-box" data-class="sex">
                                    <span class='radio-item <?php if(($userInfo["sex"]) == "1"): ?>radio-item-selected<?php endif; ?>' data-val="1"><i class="fa fa-mars"></i>&ensp;男</span>
                                    <span class='radio-item <?php if(($userInfo["sex"]) == "0"): ?>radio-item-selected<?php endif; ?>' data-val="0"><i class="fa fa-venus"></i>&ensp;女</span>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="input-item">
                                <div class="input-title">
                                    <em>*</em>
                                    <span>出生日期</span>
                                </div>
                                <div class="i-mar">
                                    <input type="text" class="date" autocomplete="off" name="birthday" value="<?php echo (date('Y-m-d',$userInfo["birthday"])); ?>"/>
                                </div>
                            </div>
                            <div class="input-item">
                                <div class="input-title">
                                    <em>&ensp;</em>
                                    <span>身高</span>
                                </div>
                                <div class="i-mar">
                                    <input type="text" name="height" autocomplete="off" value="<?php echo ($userInfo["height"]); ?>"/>
                                    <i class="cm">CM</i>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="input-item">
                                <input type="hidden" class="max_edu" name="max_edu" value="<?php echo ($userInfo["max_edu"]); ?>"/>
                                <div class="input-title">
                                    <em>*</em>
                                    <span>最高学历</span>
                                </div>
                                <div class="i-mar select-box pos-r">
                                    <span class="ipt-span degree click-span" data-type="max_edu"><?php echo (get_max_edu($userInfo["max_edu"])); ?></span>
                                    <ul class="select-content">
                                        <li class='select-item <?php if(($userInfo["max_edu"]) == "0"): ?>item-on<?php endif; ?>' data-val="0" data-title="初中">初中</li>
                                        <li class='select-item <?php if(($userInfo["max_edu"]) == "1"): ?>item-on<?php endif; ?>' data-val="1" data-title="高中">高中及同等</li>
                                        <li class='select-item <?php if(($userInfo["max_edu"]) == "2"): ?>item-on<?php endif; ?>' data-val="2" data-title="大专">大专及同等</li>
                                        <li class='select-item <?php if(($userInfo["max_edu"]) == "3"): ?>item-on<?php endif; ?>' data-val="3" data-title="本科">本科及同等</li>
                                        <li class='select-item <?php if(($userInfo["max_edu"]) == "4"): ?>item-on<?php endif; ?>' data-val="4" data-title="硕士">硕士及同等</li>
                                        <li class='select-item <?php if(($userInfo["max_edu"]) == "5"): ?>item-on<?php endif; ?>' data-val="5" data-title="博士">博士及以上</li>
                                        <li class='select-item <?php if(($userInfo["max_edu"]) == "6"): ?>item-on<?php endif; ?>' data-val="6" data-title="其他">其他</li>
                                    </ul>
                                    <i class="fa fa-angle-down select-down-icon"></i>
                                </div>
                            </div>
                            <div class="input-item">
                                <input type="hidden" class="marry" name="marry" value="<?php echo ($userInfo["marry"]); ?>"/>
                                <div class="input-title">
                                    <em>*</em>
                                    <span>婚姻状况</span>
                                </div>
                                <div class="i-mar radio-box" data-class="marry">
                                    <span class='radio-item <?php if(($userInfo["marry"]) == "0"): ?>radio-item-selected<?php endif; ?>' data-val="0">未婚</span>
                                    <span class='radio-item <?php if(($userInfo["marry"]) == "1"): ?>radio-item-selected<?php endif; ?>' data-val="1">已婚</span>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="input-item">
                                <div class="input-title">
                                    <em>*</em>
                                    <span>目前居住地</span>
                                </div>
                                <div class="i-mar pos-r">
                                    <input type="text" class="place" name="present_addr" value="<?php echo ($userInfo["present_addr"]); ?>"/>
                                    <div class="city-box">
                                        <div class="city_1 city-content">
                                            <select class="prov"  index="1" data-url=""></select>
                                            <select class="city"  index="1" data-url="" disabled="disabled"></select>
                                            <select class="dist"  index="1" data-url="" disabled="disabled"></select>
                                        </div>
                                        <div class="btn_city">
                                            <span class="qr">确定</span>
                                            <span class="qx">取消</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-item">
                                <div class="input-title">
                                    <em>&ensp;</em>
                                    <span>户口所在地</span>
                                </div>
                                <div class="i-mar pos-r">
                                    <input type="text" class="place" name="birth_place" value="<?php echo ($userInfo["birth_place"]); ?>"/>
                                    <div class="city-box">
                                        <div class="city_1 city-content">
                                            <select class="prov"  index="1" data-url=""></select>
                                            <select class="city"  index="1" data-url="" disabled="disabled"></select>
                                            <select class="dist"  index="1" data-url="" disabled="disabled"></select>
                                        </div>
                                        <div class="btn_city">
                                            <span class="qr">确定</span>
                                            <span class="qx">取消</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="input-item">
                                <input type="hidden" class="work_experience" name="work_experience" value="<?php echo ($userInfo["work_experience"]); ?>"/>
                                <div class="input-title">
                                    <em>*</em>
                                    <span>工作经验</span>
                                </div>
                                <div class="i-mar select-box pos-r">
                                    <span class="ipt-span degree click-span" data-type="work_experience"><?php echo (get_user_experience($userInfo["work_experience"])); ?></span>
                                    <ul class="select-content">
                                        <li class='select-item <?php if(($userInfo["work_experience"]) == "0"): ?>item-on<?php endif; ?>' data-val="0" data-title="暂无工作经验">暂无工作经验</li>
                                        <li class='select-item <?php if(($userInfo["work_experience"]) == "1"): ?>item-on<?php endif; ?>' data-val="1" data-title="应届毕业生">应届毕业生</li>
                                        <li class='select-item <?php if(($userInfo["work_experience"]) == "2"): ?>item-on<?php endif; ?>' data-val="2" data-title="1年">1年</li>
                                        <li class='select-item <?php if(($userInfo["work_experience"]) == "3"): ?>item-on<?php endif; ?>' data-val="3" data-title="1-3年">1-3年</li>
                                        <li class='select-item <?php if(($userInfo["work_experience"]) == "4"): ?>item-on<?php endif; ?>' data-val="4" data-title="3-5年">3-5年</li>
                                        <li class='select-item <?php if(($userInfo["work_experience"]) == "5"): ?>item-on<?php endif; ?>' data-val="5" data-title="7年">5-7年</li>
                                        <li class='select-item <?php if(($userInfo["work_experience"]) == "6"): ?>item-on<?php endif; ?>' data-val="6" data-title="10年">7-10年</li>
                                        <li class='select-item <?php if(($userInfo["work_experience"]) == "7"): ?>item-on<?php endif; ?>' data-val="7" data-title="10年以上">10年以上</li>
                                    </ul>
                                    <i class="fa fa-angle-down select-down-icon"></i>
                                </div>
                            </div>

                            <div class="input-item">
                                <input type="hidden" class="overseas" name="overseas" value="<?php echo ($userInfo["overseas"]); ?>"/>
                                <div class="input-title">
                                    <em>&ensp;</em>
                                    <span>海外工作经验</span>
                                </div>
                                <div class="i-mar radio-box" data-class="overseas">
                                    <span class='radio-item <?php if(($userInfo["overseas"]) == "0"): ?>radio-item-selected<?php endif; ?>' data-val="0">无</span>
                                    <span class='radio-item <?php if(($userInfo["overseas"]) == "1"): ?>radio-item-selected<?php endif; ?>' data-val="1">有</span>
                                </div>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="input-item">
                                <input type="hidden" class="driver" name="driver" value="<?php echo ($userInfo["driver"]); ?>"/>
                                <div class="input-title">
                                    <em>&ensp;</em>
                                    <span>驾驶证</span>
                                </div>
                                <div class="i-mar select-box pos-r">
                                    <span class="ipt-span driver click-span" data-type="driver"><?php echo (get_user_drive($userInfo["driver"])); ?></span>
                                    <ul class="select-content">
                                        <li class='select-item <?php if(($userInfo["driver"]) == "0"): ?>item-on<?php endif; ?>' data-val="0" data-title="暂无">暂无</li>
                                        <li class='select-item <?php if(($userInfo["driver"]) == "1"): ?>item-on<?php endif; ?>' data-val="1" data-title="A照">A照</li>
                                        <li class='select-item <?php if(($userInfo["driver"]) == "2"): ?>item-on<?php endif; ?>' data-val="2" data-title="B照">B照</li>
                                        <li class='select-item <?php if(($userInfo["driver"]) == "3"): ?>item-on<?php endif; ?>' data-val="3" data-title="C照">C照</li>
                                    </ul>
                                    <i class="fa fa-angle-down select-down-icon"></i>
                                </div>
                            </div>

                            <div class="input-item">
                                <input type="hidden" class="now_status" name="now_status" value="<?php echo ($userInfo["now_status"]); ?>"/>
                                <div class="input-title">
                                    <em>*</em>
                                    <span>现在状态</span>
                                </div>
                                <div class="i-mar select-box pos-r">
                                    <span class="ipt-span degree click-span" data-type="now_status"><?php echo (get_status($userInfo["now_status"])); ?></span>
                                    <ul class="select-content">
                                        <li class='select-item <?php if(($userInfo["now_status"]) == "0"): ?>item-on<?php endif; ?>' data-val="0" data-title="应届毕业">应届毕业</li>
                                        <li class='select-item <?php if(($userInfo["now_status"]) == "1"): ?>item-on<?php endif; ?>' data-val="1" data-title="在职考虑其他">在职考虑其他</li>
                                        <li class='select-item <?php if(($userInfo["now_status"]) == "2"): ?>item-on<?php endif; ?>' data-val="2" data-title="离职">离职</li>
                                        <li class='select-item <?php if(($userInfo["now_status"]) == "3"): ?>item-on<?php endif; ?>' data-val="3" data-title="在职不考虑">在职不考虑</li>
                                    </ul>
                                    <i class="fa fa-angle-down select-down-icon"></i>
                                </div>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="input-item">
                                <div class="input-title">
                                    <em>*</em>
                                    <span>电话</span>
                                </div>
                                <div class="i-mar">
                                    <input type="text" name="phone" value="<?php echo ($userInfo["phone"]); ?>"/>
                                </div>
                            </div>
                            <div class="input-item">
                                <div class="input-title">
                                    <em>*</em>
                                    <span>邮箱</span>
                                </div>
                                <div class="i-mar">
                                    <input type="text" name="email" value="<?php echo ($userInfo["email"]); ?>"/>
                                </div>
                            </div>
                        </li>

                        <li class="clearfix">
                            <div class="input-item">
                                <div class="input-title">
                                    <em>&ensp;</em>
                                    <span>QQ</span>
                                </div>
                                <div class="i-mar">
                                    <input type="text" name="u_qq" value="<?php echo ($userInfo["u_qq"]); ?>"/>
                                </div>
                            </div>
                            <div class="input-item">
                                <div class="input-title">
                                    <em>&ensp;</em>
                                    <span>微信</span>
                                </div>
                                <div class="i-mar">
                                    <input type="text" name="u_weixin" value="<?php echo ($userInfo["u_weixin"]); ?>"/>
                                </div>
                            </div>
                        </li>
                        <div class="clearfix skill-label pos-r">
                            <div class="input-title">
                                <em>&ensp;</em>
                                <span>技能标签</span>
                            </div>
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
                        </div>
                    </ul>
                    <div class="text-area">
                        <div class="input-title">
                            <em>&ensp;</em>
                            <span>一句话介绍自己</span>
                        </div>
                        <div class="textarea-group">
                            <textarea class="text-area1" name="signature" id="" cols="66" rows="5"><?php echo ($userInfo["signature"]); ?></textarea>
                            <div class="num-limit"><span><?php echo (mb_strlen($userInfo["signature"],'UTF8')); ?></span>/100</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="angle">

            </div>
            <div class="edit-tool" data-class="content-body" title="点击修改">
                <i class="fa fa-pencil-square-o btn-item" data-type="qx" data-class1="content-body-edit" data-class2="content-body"></i>
            </div>
            <div class="btn-group">
                <span class="btn-item" data-type="submit" data-form="userBase" data-class1="content-body-edit" data-class2="content-body">确定</span>
                <span class="btn-item" data-type="qx" data-class1="content-body-edit" data-class2="content-body">取消</span>
            </div>
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

    <script src="/Public/static/select/jquery.cityselect.js"></script>
    <link href="/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
    <script src="/Public/Home/js/user/userp.js"></script>
    <script>
        (function($){
            $.fn.uploadPic = function(settings){
                if(this.length < 1){
                    return ;
                }
                // 默认值
                var options = $.extend({
                    thumbBox: '.thumbBox',
                    spinner: '.spinner',
                    imgSrc: "/Public/static/uptx/images/avatar.png",
                    gUrl  : "<?php echo U('user/upPicture');?>",
                    urlPost: "<?php echo U('userp/upUser');?>",
                    uName  : 'u_tx',
                    refresh : false,
                    imgClass  : '.u_tx'
                }, settings);

                var box = this;
                var imgBox = box.find('.imageBox');
                var action = box.find('.action');
                var cropped = box.find('.cropped');

                var uploadFile = action.find('.upload-file');
                var btnCrop = action.find('.btnCrop');
                var btnZoomIn = action.find('.btnZoomIn');
                var btnZoomOut = action.find('.btnZoomOut');
                var ajaxPost   = action.find('.ajax-post');

                var img = '';

                var cropper = imgBox.cropbox(options);

                /* 初始化 */
                var init = function(){
                    uploadFile.on('change',function(){
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            options.imgSrc = e.target.result;
                            cropper = $('.imageBox').cropbox(options);
                        };
                        reader.readAsDataURL(this.files[0]);
                        $(this).files = [];
                    });
                    btnCrop.on('click', function(){
                        img = cropper.getDataURL();
                        cropped.html('');
                        cropped.append('<img src="'+img+'" align="absmiddle" style="width:64px;margin-top:4px;border-radius:64px;box-shadow:0px 0px 12px #7E7E7E;" ><p>64px*64px</p>');
                        cropped.append('<img src="'+img+'" align="absmiddle" style="width:80px;margin-top:4px;border-radius:80px;box-shadow:0px 0px 12px #7E7E7E;"><p>80px*80px</p>');
                        cropped.append('<img src="'+img+'" align="absmiddle" style="width:128px;margin-top:4px;border-radius:128px;box-shadow:0px 0px 12px #7E7E7E;"><p>128px*128px</p>');
                    });
                    btnZoomIn.on('click', function(){
                        cropper.zoomIn();
                    });
                    btnZoomOut.on('click', function(){
                        cropper.zoomOut();
                    });
                    ajaxPost.on('click',function(){
                        if(img == ''){
                            alert('还没有裁剪');
                        }else{
                            $.post(options.gUrl,{'img':img},function(data){
                                if(data.status != 0){
                                    $.post(options.urlPost,{name : options.uName,val : data.id});
                                    box.parent('.upload-content').css('display','none');

                                    $(options.imgClass).find('img').attr('src',data.path);

//                                    if(options.refresh){
//                                        location.href = "<?php echo U('');?>";
//                                    }
                                }
                            });
                        }
                    });
                };
                init();
            }
        })(jQuery);
    </script>
    <script>

        /* 时间 */
        $('.date').datetimepicker({
            format: 'yyyy-mm-dd',
            language:"zh-CN",
            minView:2,
            autoclose:true
        });

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

        /* 单选 为input赋值 */
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
                        location.href = "<?php echo U('');?>";
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

        /* 上传头像 */
        $('#up-picture').uploadPic();
        $('.p-cancel').on('click',function(e){
            e.stopPropagation();
            $('.upload-content').css('display','none');
        });
        $('.g_tx_item').on('click',function(){
            $('.upload-content').css('display','block');
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