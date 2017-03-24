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
        
    <script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" src="/Public/static/uptx/cropbox.js"></script>
    <!-- 左侧目录 -->
    <section class="sid-bar fl">
        <div class="user-base">
            <!-- 公司基本 -->
            <div class="gs-desc">
                <div class="re-mid clearfix">
                    <a href="<?php echo U('home/user/company/id/'.$userInfo['id']);?>" target="_blank">
                        <div>
                            <?php if($userInfo["id"] != ''): ?><img src="<?php echo (get_cover($userInfo["u_tx"],'path')); ?>" alt=""/>
                                <?php else: ?>
                                <img src="/Public/Home/images/user/01.jpg" alt=""/><?php endif; ?>
                        </div>
                        <?php if($userInfo["identify"] == 2): ?><span class="cert"><i class="fa fa-diamond"></i>已认证</span>
                        <?php else: ?>
                            <span class="uncert"><i class="fa fa-diamond"></i>未认证</span><?php endif; ?>
                        <div>
                            <p><?php echo ($userInfo["c_name"]); ?></p>
                            <p><?php echo ($userInfo["username"]); ?><span>&ensp;|&ensp;</span><?php echo ($userInfo["pos"]); ?></p>
                            <p>公司规模:&ensp;<?php echo ($userInfo["c_range"]); ?>人</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="gs-base clearfix">
                <div>
                    <p>职位数</p>
                    <span><?php echo ($nowAll); ?></span>
                </div>
                <div>
                    <p>收到的简历</p>
                    <span><?php echo ($resumeCount); ?></span>
                </div>
                <div>
                    <p>已回复</p>
                    <span><?php echo ($treatedCount); ?></span>
                </div>
            </div>
        </div>

        <!-- user-list -->
        <div class="user-list">
            <div>
                <ul class="list-setting">
                    <li class="side-item" data-side="1" data-title="公司管理"><i class="fa fa-building-o"></i>公司管理</li>
                    <li class="side-item" data-side="2" data-title="职位管理"><i class="fa fa-pencil-square-o"></i>职位管理</li>
                    <li class="side-item" data-side="3" data-title="简历管理"><i class="fa fa-file-text-o"></i>简历管理</li>
                    <li class="side-item" data-side="4" data-title="企业认证"><i class="fa fa-diamond"></i>企业认证</li>
                    <li class="side-item" data-side="5" data-title="个人设置"><i class="fa fa-cog"></i>个人设置</li>
                </ul>
            </div>
        </div>
        <!-- user-list -->

    </section>
    <!-- /左侧目录 -->

    <!-- 右侧内容 -->
    <section class="content fl">
        <div>
            <div class="item-top">
                <div class="item-top-mask item-title">
                    <span>公司管理</span>
                </div>
            </div>
            <div class="mask"></div>
            <div class="input-tip"><span></span></div>

            <div class="replay-box">
                <div class="rep-top">
                    处理<span class="rep-name"></span>简历
                </div>
                <div class="rep-1">
                    <form action="" id="repF">
                        <div class="input-group">
                            <label for="">面试地点：</label>
                            <input type="text" class="" name="palce" placeholder="如果拒绝不填" value=""/>
                        </div>
                        <div class="input-group">
                            <label for="">面试时间：</label>
                            <input type="text" class="date" name="ms_time" placeholder="如果拒绝不填" value=""/>
                        </div>
                        <div class="texta">
                            <span>回复理由或拒绝理由</span>
                        </div>
                        <div class="textarea-group">
                            <textarea id="jobDesc" class="text-area1" name="content" cols="57" rows="7"></textarea>
                            <div class="num-limit"><span>0</span>/500</div>
                        </div>
                    </form>
                </div>
                <div class="rep-group">
                    <span class="deal-btn btn-td" data-url="<?php echo U('user/replay');?>" data-id="">回复</span>
                    <span class="deal-btn btn-rj" data-url="<?php echo U('user/reject');?>" data-id="">拒绝</span>
                </div>
            </div>

            <!-- 企业管理 -->
            <div class="item-box side-1">
                <div class="item-content">
                    <form action="">
                        <ul class="input-list">
                            <li class="input-item">
                                <label for="">公司名称:</label>
                                <input class="input-content" type="text" value="<?php echo ($userInfo['c_name']); ?>" disabled name="c_name" data-url="<?php echo U('user/upUcenterMember');?>" />
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>
                            </li>
                            <li class="input-item">
                                <label for="">公司规模:</label>
                                <input class="input-content" type="text" name="c_range" value="<?php echo ($userInfo['c_range']); ?>" data-url="<?php echo U('user/upUcenterMember');?>" disabled/>
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>
                            </li>
                            <li class="input-item">
                                <label for="">公司行业:</label>
                                <input type="text" class="input-div input-hy" name="industry" value="<?php echo (get_cate_title($userInfo['industry'])); ?>" disabled/>
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>

                                <div class="cate div-content">
                                    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><div class="cate-1">
                                            <div class="cate-list cate-content" data-class="input-hy" data-cid="<?php echo ($cate["id"]); ?>" data-val="<?php echo ($cate["title"]); ?>" data-url="<?php echo U('user/');?>">
                                                <span><?php echo ($cate["title"]); ?></span> <i class="fa fa-angle-right"></i>
                                            </div>
                                            <div class="cate-2">
                                                <?php if(is_array($cate['_'])): $i = 0; $__LIST__ = $cate['_'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_1): $mod = ($i % 2 );++$i;?><span class="cate-content" data-class="input-hy" data-cid="<?php echo ($cate_1["id"]); ?>" data-val="<?php echo ($cate_1["title"]); ?>"><?php echo ($cate_1["title"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </li>
                            <li class="input-item">
                                <label for="">公司性质:</label>
                                <input type="text" class="input-div input-property" name="property" value="<?php echo (get_work_property($userInfo['property'])); ?>" disabled/>
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>

                                <ul class="cate div-content property-list"></ul>
                            </li>
                            <li class="input-item">
                                <label for="">公司阶段:</label>
                                <input type="text" class="input-div input-step" name="step" value="<?php echo (get_step_list($userInfo['step'])); ?>" disabled/>
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>

                                <ul class="cate div-content step-list"></ul>
                            </li>
                            <li class="input-item gs-label check_tag">
                                <label for="">公司标签:</label>
                                <input class="" type="text" disabled/>
                                <div class="showtagcheck input_check gs-label-box"></div>

                                <div class="clear"></div>
                                <i class="tagAdd fa fa-pencil-square-o" title="点击修改"></i>
                                <input type="hidden" name="c_label" id="nature" class="nature" data-url="<?php echo U('user/upUcenterMember');?>" value="" >
                                <div class="tagBox" id="tagBox">
                                    <div class="resume_tc">
                                        <div class="resume_tc_header">
                                            <h3>请选择公司亮点</h3>
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

                            <li class="input-item input-city clearfix">
                                <label for="">公司地址:</label>
                                <div id="city_1">
                                    <select class="prov" name="c_place" data-url="<?php echo U('user/upUcenterMember');?>"></select>
                                    <select class="city" name="c_city" data-url="<?php echo U('user/upUcenterMember');?>" disabled="disabled"></select>
                                </div>
                            </li>

                            <li class="input-item">
                                <label for="">公司环境照片:</label>
                                <input type="text" value="" disabled/>
                                
                                <div class="controls pos-r">
                                    <div class="controls">
                                        <input type="file" id="upload_picture_cover_id">
                                        <input type="hidden" name="cover_id" id="cover_id_cover_id" value="<?php echo ($userInfo['c_picture']); ?>"/>
                                        <div class="upload-img-box">
                                            <?php if($userInfo['c_picture'] != ''): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($userInfo['c_picture'],'path')); ?>"/></div><?php endif; ?>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        //上传图片
                                        /* 初始化上传插件 */
                                        $("#upload_picture_cover_id").uploadify({
                                            "height"          : 30,
                                            "swf"             : "/Public/static/uploadify/uploadify.swf",
                                            "fileObjName"     : "download",
                                            "buttonText"      : "上传图片",
                                            "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                                            "width"           : 120,
                                            'removeTimeout'	  : 1,
                                            'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
                                            "onUploadSuccess" : uploadPicturecover_id,
                                            'onFallback' : function() {
                                                alert('未检测到兼容版本的Flash.');
                                            }
                                        });
                                        function uploadPicturecover_id(file, data){
                                            var data = $.parseJSON(data);
                                            var src = '';
                                            if(data.status){
                                                $("#cover_id_cover_id").val(data.id);
                                                src = data.url || '' + data.path
                                                $("#cover_id_cover_id").parent().find('.upload-img-box').html(
                                                        '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                                );
                                                $.post("<?php echo U('user/upUcenterMember');?>",{name : 'c_picture',val : data.id});
                                            } else {
                                                updateAlert(data.info);
                                                setTimeout(function(){
                                                    $('#top-alert').find('button').click();
                                                    $(that).removeClass('disabled').prop('disabled',false);
                                                },1500);
                                            }
                                        }
                                    </script>

                                </div>
                            </li>

                            <li class="input-item">
                                <label for="">联系电话:</label>
                                <input class="input-content" type="text" value="<?php echo ($userInfo['mobile']); ?>" disabled name="mobile" data-url="<?php echo U('user/upUcenterMember');?>" />
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>
                            </li>

                            <li class="input-item gs-jj">
                                <label for="">公司简介:</label>
                                <input type="text" value="" disabled/>
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>
                                <div class="text-group">
                                    <div class="btn-group">收起</div>
                                    <textarea class="text-area gsjj-content" name="intro" id="intro" cols="30" rows="10" data-url="<?php echo U('user/upUcenterMember');?>" placeholder="公司简介，500字以内"><?php echo ($userInfo['intro']); ?></textarea>
                                    <div class="zi"><span><?php echo (mb_strlen($userInfo['intro'],'UTF8')); ?></span>/500</div>
                                </div>
                            </li>

                            <li class="input-item">
                                <label for="">职位默认联系人:</label>
                                <input class="input-content" type="text" value="<?php echo ($userInfo['linkman']); ?>" disabled name="linkman" data-url="<?php echo U('user/upUcenterMember');?>" />
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>
                            </li>

                            <li class="input-item">
                                <label for="">公司官网:</label>
                                <input class="input-content" type="text" value="<?php echo ($userInfo['link']); ?>" disabled name="link" data-url="<?php echo U('user/upUcenterMember');?>" />
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>
                            </li>

                            <li class="input-item">
                                <label for="">公司宣传视频:</label>
                                <input class="input-content" type="text" value="<?php echo ($userInfo['c_link']); ?>" disabled name="c_link" data-url="<?php echo U('user/upUcenterMember');?>" />
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>
                            </li>

                            <li class="input-item">
                                <label for="">官方邮箱:</label>
                                <input class="input-content" type="text" value="<?php echo ($userInfo['c_email']); ?>" disabled name="c_email" data-url="<?php echo U('user/upUcenterMember');?>" />
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>
                            </li>
                            <li class="input-item">
                                <label for="">QQ号码:</label>
                                <input class="input-content" type="text" value="<?php echo ($userInfo['c_qq']); ?>" disabled name="c_qq" data-url="<?php echo U('user/upUcenterMember');?>" />
                                <i class="fa fa-pencil-square-o" title="点击修改"></i>
                            </li>
                        </ul>

                    </form>
                </div>
            </div>
            <!-- /企业管理 -->

            <!-- 职位管理 -->
            <?php if(($userInfo["identify"]) == "2"): ?><div class="item-box side-2">
                <div class="item-content">
                    <ul class="ul-list zw-list clearfix">
                        <li class="li-item zw-item item-selected js-url" data-url="<?php echo U('user/center');?>" data-id="1">已发布</li>
                        <li class="li-item zw-item js-url" data-url="<?php echo U('user/center');?>" data-id="2">待发布</li>
                        <li class="li-item zw-item js-url" data-url="<?php echo U('user/center');?>" data-id="3">已过期</li>
                        <li class="li-item zw-item" data-id="4">新建</li>
                    </ul>
                    <!-- 已发布 -->
                    <div class="zw-content zw-item-1">
                        <div class="fl job-nav clearfix num-1">
                            <span class="job-num">共发布了&ensp;<i><?php echo ($nowAll); ?></i>&ensp;个职位</span>
                            <div class="fr">
                                <a href="">
                                    <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                                </a>
                                <span class="all-page"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($nowPage); ?></span>
                                <a href="">
                                    <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="zw-box">
                            <?php if(is_array($listNow)): $i = 0; $__LIST__ = $listNow;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if( $vo["iscate"] == 1): ?><li>
                                    <div class="zw-base">
                                        <span style="color: #009C63;"><?php echo ($vo["jobname"]); ?></span>
                                        <span style="width: 150px; color: #EB2626;"><i style="color: #EB2626;" class="fa fa-rmb"></i>&ensp;<?php echo (get_salary_range($vo["salary_range"])); ?></span>
                                        <span><?php echo (get_put_time($vo["update_time"])); ?></span>
                                    </div>
                                    <div class="zw-status">
                                        <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                        <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["work_experience"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                    </div>
                                    <div class="edit-tool">
                                        <span class="delete" data-id="<?php echo ($vo["id"]); ?>" data-name="<?php echo ($vo["jobname"]); ?>" data-url="<?php echo U('home/user/delete');?>"><i class="fa fa-trash fa-lg"></i></span>
                                        <span class="js-url" data-url="<?php echo U('home/user/edit/id/'.$vo['id']);?>"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                                        <span class="js-url-bank" data-url="<?php echo U('home/zhaopin/detail/id/'.$vo['id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                    </div>
                                    <div class="job-type">
                                        <div class="arrow arrow-right arrow-right-type"></div>
                                        <span>全</span>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li>
                                    <div class="zw-base">
                                        <span style="color: #009C63;"><?php echo ($vo["jobname"]); ?></span>
                                        <span style="width: 150px; color: #EB2626;"><i style="color: #EB2626;" class="fa fa-rmb"></i>&ensp;<?php echo ($vo["salary"]); echo (get_settle_type_unit($vo["settle_type"])); ?></span>
                                        <span><?php echo (get_put_time($vo["update_time"])); ?></span>
                                    </div>
                                    <div class="zw-status">
                                        <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                        <span><i class="fa fa-credit-card"></i>&ensp;<?php echo (get_settle_type($vo["settle_type"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                    </div>
                                    <div class="edit-tool">
                                        <span class="delete" data-id="<?php echo ($vo["id"]); ?>" data-name="<?php echo ($vo["jobname"]); ?>" data-url="<?php echo U('home/user/deleteJ');?>"><i class="fa fa-trash fa-lg"></i></span>
                                        <span class="js-url" data-url="<?php echo U('home/user/edit/id/'.$vo['id']);?>"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                                        <span class="js-url-bank" data-url="<?php echo U('home/jianzhi/detail/id/'.$vo['id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                    </div>
                                    <div class="job-type">
                                        <div class="arrow arrow-right arrow-right-type"></div>
                                        <span>兼</span>
                                    </div>
                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="page" data-id="2">
                            <?php echo ($pageNow); ?>
                        </div>
                    </div>
                    <!-- /已发布 -->
                    
                    <!-- 待发布 -->
                    <div class="zw-content zw-item-2">
                        <div class="fl job-nav clearfix num-2">
                            <span class="job-num">有&ensp;<i><?php echo ($waitAll); ?></i>&ensp;个职位待发布</span>
                            <div class="fr">
                                <a href="">
                                    <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                                </a>
                                <span class="all-page"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($waitPage); ?></span>
                                <a href="">
                                    <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="zw-box">
                            <?php if(is_array($listWait)): $i = 0; $__LIST__ = $listWait;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if( $vo["iscate"] == 1): ?><li>
                                    <div class="zw-base">
                                        <span style="color: #009C63;"><?php echo ($vo["jobname"]); ?></span>
                                        <span style="width: 150px; color: #EB2626;"><i style="color: #EB2626;" class="fa fa-rmb"></i>&ensp;<?php echo (get_salary_range($vo["salary_range"])); ?></span>
                                        <span><?php echo (get_put_time($vo["update_time"])); ?></span>
                                    </div>
                                    <div class="zw-status">
                                        <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                        <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["work_experience"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                    </div>
                                    <div class="edit-tool">
                                        <span class="delete" data-id="<?php echo ($vo["id"]); ?>" data-name="<?php echo ($vo["jobname"]); ?>" data-url="<?php echo U('home/user/delete');?>"><i class="fa fa-trash fa-lg"></i></span>
                                        <span class="js-url" data-url="<?php echo U('home/user/edit/id/'.$vo['id']);?>"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                                        <span class="js-url-bank" data-url="<?php echo U('home/zhaopin/detail/id/'.$vo['id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                    </div>
                                    <div class="job-type">
                                        <div class="arrow arrow-right arrow-right-type"></div>
                                        <span>全</span>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li>
                                    <div class="zw-base">
                                        <span style="color: #009C63;"><?php echo ($vo["jobname"]); ?></span>
                                        <span style="width: 150px; color: #EB2626;"><i style="color: #EB2626;" class="fa fa-rmb"></i>&ensp;<?php echo ($vo["salary"]); echo (get_settle_type_unit($vo["settle_type"])); ?></span>
                                        <span><?php echo (get_put_time($vo["update_time"])); ?></span>
                                    </div>
                                    <div class="zw-status">
                                        <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                        <span><i class="fa fa-credit-card"></i>&ensp;<?php echo (get_settle_type($vo["settle_type"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                    </div>
                                    <div class="edit-tool">
                                        <span class="delete" data-id="<?php echo ($vo["id"]); ?>" data-name="<?php echo ($vo["jobname"]); ?>" data-url="<?php echo U('home/user/deleteJ');?>"><i class="fa fa-trash fa-lg"></i></span>
                                        <span class="js-url" data-url="<?php echo U('home/user/edit/id/'.$vo['id']);?>"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                                        <span class="js-url-bank" data-url="<?php echo U('home/jianzhi/detail/id/'.$vo['id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                    </div>
                                    <div class="job-type">
                                        <div class="arrow arrow-right arrow-right-type"></div>
                                        <span>兼</span>
                                    </div>
                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="page" data-id="2">
                            <?php echo ($pageWait); ?>
                        </div>
                    </div>
                    <!-- /待发布 -->

                    <!-- 已过期 -->
                    <div class="zw-content zw-item-3">
                        <div class="fl job-nav clearfix num-3">
                            <span class="job-num">共过期了&ensp;<i><?php echo ($deadAll); ?></i>&ensp;个职位</span>
                            <div class="fr">
                                <a href="">
                                    <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                                </a>
                                <span class="all-page"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($deadPage); ?></span>
                                <a href="">
                                    <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <ul class="zw-box">
                            <?php if(is_array($listDeadline)): $i = 0; $__LIST__ = $listDeadline;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["iscate"] == 1): ?><li>
                                    <div class="zw-base">
                                        <span style="color: #009C63;"><?php echo ($vo["jobname"]); ?></span>
                                        <span style="width: 150px; color: #EB2626;"><i style="color: #EB2626;" class="fa fa-rmb"></i>&ensp;<?php echo (get_salary_range($vo["salary_range"])); ?></span>
                                        <span><?php echo (get_put_time($vo["update_time"])); ?></span>
                                    </div>
                                    <div class="zw-status">
                                        <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                        <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["work_experience"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                    </div>
                                    <div class="edit-tool">
                                        <span class="delete" data-id="<?php echo ($vo["id"]); ?>" data-name="<?php echo ($vo["jobname"]); ?>" data-url="<?php echo U('home/user/delete');?>"><i class="fa fa-trash fa-lg"></i></span>
                                        <span class="js-url" data-url="<?php echo U('home/user/edit/id/'.$vo['id']);?>"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                                        <span class="js-url-bank" data-url="<?php echo U('home/zhaopin/detail/id/'.$vo['id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                    </div>
                                    <div class="job-type">
                                        <div class="arrow arrow-right arrow-right-type"></div>
                                        <span>全</span>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li>
                                    <div class="zw-base">
                                        <span style="color: #009C63;"><?php echo ($vo["jobname"]); ?></span>
                                        <span style="width: 150px; color: #EB2626;"><i style="color: #EB2626;" class="fa fa-rmb"></i>&ensp;<?php echo ($vo["salary"]); echo (get_settle_type_unit($vo["settle_type"])); ?></span>
                                        <span><?php echo (get_put_time($vo["update_time"])); ?></span>
                                    </div>
                                    <div class="zw-status">
                                        <span><i class="fa fa-map-marker"></i>&ensp;<?php echo ($vo["work_place"]); ?></span>
                                        <span><i class="fa fa-credit-card"></i>&ensp;<?php echo (get_settle_type($vo["settle_type"])); ?></span>
                                        <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_academic_career($vo["academic_career"])); ?></span>
                                    </div>
                                    <div class="edit-tool">
                                        <span class="delete" data-id="<?php echo ($vo["id"]); ?>" data-name="<?php echo ($vo["jobname"]); ?>" data-url="<?php echo U('home/user/deleteJ');?>"><i class="fa fa-trash fa-lg"></i></span>
                                        <span class="js-url" data-url="<?php echo U('home/user/edit/id/'.$vo['id']);?>"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                                        <span class="js-url" data-url="<?php echo U('home/jianzhi/detail/id/'.$vo['id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                    </div>
                                    <div class="job-type">
                                        <div class="arrow arrow-right arrow-right-type"></div>
                                        <span>兼</span>
                                    </div>
                                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="page" data-id="3">
                            <?php echo ($pageDeadline); ?>
                        </div>
                        <script>
                        $(document).ready(function(){
                            $('.page').each(function(){
                                var num    = $(this).find('.current').html();
                                var selfId = $(this).data('id');
                                var prev   = $(this).find('.prev').attr('href');
                                var next   = $(this).find('.next').attr('href');
                                $('.num-'+selfId).find('.all-page i').html(num);
                                $('.num-'+selfId).find('.next-ajax').parent('a').attr('href',next);
                                $('.num-'+selfId).find('.prev-ajax').parent('a').attr('href',prev);
                            });
                        });
                        </script>
                    </div>
                    <!-- 已过期 -->

                    <!-- 新建job -->
                    <div class="zw-content zw-item-4 new-job">
                        <!-- base -->
                        <form data-action="<?php echo U('user/quanZhi');?>" data-actionj="<?php echo U('user/jianZhi');?>" method="post" id="job" data-url="">
                            <input type="hidden" name="type" value="2" index="0">
                            <div class="job-base">
                                <h3>基础属性</h3>
                                <ul class="content-group">

                                    <li class="input-group radio">
                                        <label for="">职位类别：</label>
                                        <input type="hidden" name="model_id" class="jobCate" value="5" index="0">
                                        <span class="radio-item  radio-selected" data-id="1" data-value="5" data-menu="1">全职</span>
                                        <span class="radio-item" data-id="2" data-value="15" data-menu="-1">兼职</span>
                                    </li>

                                    <li class="input-group input-pos clearfix">
                                        <label class="fl" for="jobHy">所属行业：</label>
                                        <input type="hidden" class="detection-name" id="jobHy" name="category_id" index="0" value="" />
                                        <span class="fl c_1"><p style="color:#AAAAAA;">点击右侧图标修改</p></span>
                                        <i class="fa fa-pencil-square-o fa-lg fl"></i>
                                        <div class="hy-cate"></div>
                                        <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                                    </li>

                                    <li class="input-group pos-r">
                                        <label for="jobName">职位名称：</label>
                                        <input type="text" class="detection-name" id="jobName" name="jobname" index="0" />
                                        <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                                    </li>

                                    <li class="input-group pos-r">
                                        <label for="put-time">发布时间：</label>
                                        <input id="put-time" type="text" name="put_time" class="text date detection-name" index="0" value="<?php echo (date('Y-m-d',$time)); ?>" placeholder="请选择日期" />
                                        <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                                    </li>

                                    <li class="input-group">
                                        <label for="deadline">截止时间：</label>
                                        <input id="deadline" type="text" name="deadline" class="text date" index="0" value="" placeholder="请选择日期，不选择就是长期有效" />
                                    </li>
                                </ul>
                            </div>

                            <!-- 全职 -->
                            <div class="pos-diff diff-item-1">
                                <h3>全职信息</h3>
                                <ul class="content-group">

                                    <li class="input-group pos-r">
                                        <label for="recruit">招聘人数：</label>
                                        <input type="text" id="recruit" class="detection-name" name="recruit_people_num" index="1" placeholder="eg：10-20"/>
                                        <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                                    </li>

                                    <li class="input-group">
                                        <label for="jobSalary">薪&ensp;&ensp;&ensp;&ensp;资：</label>
                                        <select name="salary_range" id="jobSalary" index="1">
                                            <option value="0" selected>面议</option>
                                            <option value="1">1000及以下</option>
                                            <option value="2">1000-2000</option>
                                            <option value="3">2000-4000</option>
                                            <option value="4">4000-8000</option>
                                            <option value="5">8K-10K</option>
                                            <option value="6">10K-15K</option>
                                            <option value="7">15K-20K</option>
                                            <option value="8">20K-30K</option>
                                            <option value="9">30K-40K</option>
                                            <option value="10">40K-50K</option>
                                            <option value="11">50K以上</option>
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
                                            <option value="0" selected>不限</option>
                                            <option value="1">应届毕业生</option>
                                            <option value="2">1年以下</option>
                                            <option value="3">1-3年</option>
                                            <option value="4">3-5年</option>
                                            <option value="5">5-7年</option>
                                            <option value="6">7-10年</option>
                                            <option value="7">10年以上</option>
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
                                        <span class="single-item single3 settle-item settle-selected" data-settle="0" data-unit="jzU" data-unitvalue="">面议</span>
                                        <span class="single-item single3 settle-item" data-settle="1" data-unit="jzU" data-unitvalue="元/天">日结</span>
                                        <span class="single-item single3 settle-item" data-settle="2" data-unit="jzU" data-unitvalue="元/周">周结</span>
                                        <span class="single-item single3 settle-item" data-settle="3" data-unit="jzU" data-unitvalue="元/月">月结</span>
                                    </li>
                                    
                                    <li class="input-group pos-r">
                                        <label for="salary">薪&ensp;&ensp;&ensp;&ensp;资：</label>
                                        <input type="text" id="salary" class="salary" index="2" name="salary" value="面议" />
                                        <span class="settle-unit jzU"></span>
                                    </li>

                                    <li class="input-group clearfix pos-r">
                                        <label class="fl" for="jobPlace">工作地点：</label>
                                        <input type="text" class="detection-name" id="jobPlace" index="2" name="work_place" placeholder="eg:上海、北京、郑州、焦作..."/>
                                        <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                                    </li>

                                    <li class="input-group clearfix pos-r">
                                        <label class="fl" for="workDay">哪天工作：</label>
                                        <input type="text" id="workDay" class="detection-name" index="2" name="work_day" placeholder="eg：周一、周二、周三、周四..、双休"/>
                                        <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                                    </li>

                                    <li class="input-group clearfix pos-r">
                                        <label class="fl" for="workTime">工作时间：</label>
                                        <input type="text" id="workTime" class="detection-name" index="2" name="work_time" placeholder="eg：上午、下午、8:00-10:00、16:00-18:00.."/>
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
                                        <input type="hidden" id="jobSex" name="sex" index="0" class="sex" value="2" />
                                        <span class="single-item single1 sex-item sex-selected" data-sex="2">不限&ensp;<i class="fa fa-circle-thin"></i></span>
                                        <span class="single-item single1 sex-item" data-sex="1">男&ensp;<i class="fa fa-mars"></i></span>
                                        <span class="single-item single1 sex-item" data-sex="0">女&ensp;<i class="fa fa-venus"></i></span>
                                    </li>

                                    <li class="input-group">
                                        <label for="drive">驾照要求：</label>
                                        <input type="hidden" id="drive" name="drive" index="0" class="drive" value="0" />
                                        <span class="single-item single2 drive-item drive-selected" data-drive="0">不限</span>
                                        <span class="single-item single2 drive-item" data-drive="1">A照</span>
                                        <span class="single-item single2 drive-item" data-drive="2">B照</span>
                                        <span class="single-item single2 drive-item" data-drive="3">C照</span>
                                    </li>

                                    <li class="input-group">
                                        <label for="academic">学历要求：</label>
                                        <select name="academic_career" index="0" id="academic">
                                            <option value="0" selected>不限</option>
                                            <option value="1">初中</option>
                                            <option value="2">高中及同等</option>
                                            <option value="3">大专及同等</option>
                                            <option value="4">本科及同等</option>
                                            <option value="5">硕士及同等</option>
                                            <option value="6">博士及以上</option>
                                            <option value="7">其他</option>
                                        </select>
                                    </li>

                                    <li class="input-group">
                                        <label for="age">年龄要求：</label>
                                        <select name="age" id="age" index="0">
                                            <option value="0" selected>不限</option>
                                            <option value="1">18-25</option>
                                            <option value="2">20-36</option>
                                            <option value="3">24-60</option>
                                            <option value="4">30-60</option>
                                            <option value="5">50岁以下</option>
                                        </select>
                                    </li>

                                    <li class="input-group input-textarea">
                                        <label for="jobDesc">岗位职责：</label>
                                        <div class="textarea-group">
                                            <textarea id="jobDesc" class="text-area1" name="job_desc" index="0" cols="61" rows="10"></textarea>
                                            <div class="num-limit"><span>0</span>/500</div>
                                        </div>
                                    </li>

                                    <li class="input-group input-textarea">
                                        <label for="drive">任职条件：</label>
                                        <div class="textarea-group">
                                            <textarea id="jobDesc" class="text-area1" name="job_condition" index="0" cols="61" rows="10"></textarea>
                                            <div class="num-limit"><span>0</span>/500</div>
                                        </div>
                                    </li>

                                    <li class="input-group input-textarea">
                                        <label for="jobElse">其他条件：</label>
                                        <div class="textarea-group">
                                            <textarea id="jobElse" class="text-area1" name="other_information" index="0" cols="61" rows="10"></textarea>
                                            <div class="num-limit"><span>0</span>/500</div>
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
                                        <input type="text" class="detection-name" id="linkman" index="0" name="linkman" value="<?php echo ($userInfo['linkman']); ?>" />
                                        <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                                    </li>
                                    <li class="input-group">
                                        <label for="phone">电&ensp;&ensp;&ensp;&ensp;话：</label>
                                        <input type="text" id="phone" index="0" name="phone" value="<?php echo ($userInfo['linkman_phone']); ?>"/>
                                    </li>

                                    <li class="input-group">
                                        <label for="qq">Q&ensp;&ensp;&ensp;&ensp;Q：</label>
                                        <input type="text" id="qq" index="0" name="qq"/>
                                    </li>

                                    <li class="input-group pos-r">
                                        <label for="email">邮&ensp;&ensp;&ensp;&ensp;箱：</label>
                                        <input type="text" class="detection-email" id="email" index="0" name="email" value="<?php echo ($userInfo['c_email']); ?>" />
                                        <div class="tips1" style="position:absolute;top:5px;left:200px;top:0px;left:390px;color:#EB2626;"><span></span></div>
                                    </li>

                                    <li class="input-group">
                                        <label for="weixin">微&ensp;&ensp;&ensp;&ensp;信：</label>
                                        <input type="text" id="weixin" index="0" name="weixin"/>
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

                </div>
            </div>
            <?php else: ?>
                <div class="item-box side-2">
                    <div class="item-content">
                        <span>你还没有认证</span>
                    </div>
                </div><?php endif; ?>
            <!-- /职位管理 -->
            
            <!-- 简历管理 -->
            <?php if(($userInfo["identify"]) == "2"): ?><div class="item-box side-3">
                    <div class="item-content">
                        <ul class="ul-list zw-list clearfix">
                            <li class="li-item jl-item item-selected js-url" data-url="<?php echo U('user/center');?>" data-id="1">全部</li>
                            <li class="li-item jl-item js-url" data-url="<?php echo U('user/center');?>" data-id="2">未处理</li>
                            <li class="li-item jl-item js-url" data-url="<?php echo U('user/center');?>" data-id="3">已回复</li>
                            <li class="li-item jl-item js-url" data-url="<?php echo U('user/center');?>" data-id="4">已拒绝</li>
                        </ul>

                        <!-- 全部 -->
                        <div class="jl-content jl-item-1">
                            <div class="fl jl-nav clearfix jnum-1">
                                <span class="jl-num">共有&ensp;<i><?php echo ($resumeCount); ?></i>&ensp;个简历发来</span>
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
                            <div class="clearfix"></div>
                            <ul class="zw-box">
                                <?php if(is_array($resumeList)): $i = 0; $__LIST__ = $resumeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                            <div class="zw-base">
                                                <span style="color: #009C63;"><?php echo ($vo["title"]); ?></span>
                                            </div>
                                            <div class="zw-status">
                                                <span><i class="fa fa-user"></i>&ensp;<?php echo ($vo["uname"]); ?></span>
                                                <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["work_experience"])); ?></span>
                                                <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_max_edu($vo["max_edu"])); ?></span>
                                            </div>
                                            <div class="info-tips fr">
                                                <span>收到时间：<?php echo (date('Y.m.d',$vo["time"])); ?></span>&ensp;|
                                                <span><?php echo (get_cj_status($vo["cj_status"])); ?></span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="edit-tool">
                                                <span class="ajax-read js-url-bank" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('home/userp/gsview/uid/'.$vo['uid'].'/id/'.$vo['jian_id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                            </div>
                                            <div class="job-type">
                                                <div class="arrow arrow-right arrow-right-type"></div>
                                                <?php if( $vo["iscate"] == 1): ?><span>全</span>
                                                    <?php else: ?>
                                                    <span>兼</span><?php endif; ?>
                                            </div>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <div class="pagej" data-id="1">
                                <?php echo ($resumePage); ?>
                            </div>
                        </div>
                        <!-- /全部 -->

                        <!-- 未处理 -->
                        <div class="jl-content jl-item-2">
                            <div class="fl jl-nav clearfix jnum-2">
                                <span class="jl-num">共有&ensp;<i><?php echo ($untdCount); ?></i>&ensp;个简历发来</span>
                                <div class="fr">
                                    <a href="">
                                        <span class="prev-ajax"><i class="fa fa-angle-left fa-lg"></i></span>
                                    </a>
                                    <span class="all-page"><i style="color: #CB0000;font-style: normal;">1</i>&ensp;/&ensp;<?php echo ($untdAllPage); ?></span>
                                    <a href="">
                                        <span class="next-ajax"><i class="fa fa-angle-right fa-lg"></i></span>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ul class="zw-box">
                                <?php if(is_array($untdList)): $i = 0; $__LIST__ = $untdList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                        <div class="zw-base">
                                            <span style="color: #009C63;"><?php echo ($vo["jobname"]); ?></span>
                                        </div>
                                        <div class="zw-status">
                                            <span><i class="fa fa-user"></i>&ensp;<?php echo ($vo["uname"]); ?></span>
                                            <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["work_experience"])); ?></span>
                                            <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_max_edu($vo["max_edu"])); ?></span>
                                        </div>
                                        <div class="info-tips fr">
                                            <span>收到时间：<?php echo (date('Y.m.d',$vo["time"])); ?></span>&ensp;|
                                            <span class="deal" data-id="<?php echo ($vo["id"]); ?>" data-title="<?php echo ($vo["uname"]); ?>">处理</span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="edit-tool">
                                            <span class="ajax-read js-url-bank" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('home/userp/gsview/uid/'.$vo['uid'].'/id/'.$vo['jian_id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                        </div>
                                        <div class="job-type">
                                            <div class="arrow arrow-right arrow-right-type"></div>
                                            <?php if( $vo["iscate"] == 1): ?><span>全</span>
                                                <?php else: ?>
                                                <span>兼</span><?php endif; ?>
                                        </div>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <div class="pagej" data-id="2">
                                <?php echo ($untdPage); ?>
                            </div>
                        </div>
                        <!-- /未处理 -->

                        <!-- 已回复 -->
                        <div class="jl-content jl-item-3">
                            <div class="fl jl-nav clearfix jnum-3">
                                <span class="jl-num">共回复了&ensp;<i><?php echo ($treatedCount); ?></i>&ensp;个简历</span>
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
                            <div class="clearfix"></div>
                            <ul class="zw-box">
                                <?php if(is_array($treatedList)): $i = 0; $__LIST__ = $treatedList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                        <div class="zw-base">
                                            <span style="color: #009C63;"><?php echo ($vo["jobname"]); ?></span>
                                            <span style="width: 10%;"></span>
                                            <span style="color:#999999;">处理时间：<?php echo (date('Y.m.d',$vo["reply_time"])); ?></span>
                                        </div>
                                        <div class="zw-status">
                                            <span><i class="fa fa-user"></i>&ensp;<?php echo ($vo["uname"]); ?></span>
                                            <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["work_experience"])); ?></span>
                                            <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_max_edu($vo["max_edu"])); ?></span>
                                        </div>
                                        <div class="info-tips fr">
                                            <span>收到时间：<?php echo (date('Y.m.d',$vo["time"])); ?></span>&ensp;|
                                            <span><?php echo (get_cj_status($vo["cj_status"])); ?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="edit-tool">
                                            <span class="ajax-read js-url-bank" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('home/userp/gsview/uid/'.$vo['uid'].'/id/'.$vo['jian_id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                        </div>
                                        <div class="job-type">
                                            <div class="arrow arrow-right arrow-right-type"></div>
                                            <?php if( $vo["iscate"] == 1): ?><span>全</span>
                                                <?php else: ?>
                                                <span>兼</span><?php endif; ?>
                                        </div>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <div class="pagej" data-id="3">
                                <?php echo ($treatedPage); ?>
                            </div>
                        </div>
                        <!-- /已回复 -->

                        <!-- 已过期 -->
                        <div class="jl-content jl-item-4">
                            <div class="fl jl-nav clearfix jnum-4">
                                <span class="jl-num">共拒绝了&ensp;<i><?php echo ($rejectCount); ?></i>&ensp;个简历</span>
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
                            <div class="clearfix"></div>
                            <ul class="zw-box">
                                <?php if(is_array($rejectList)): $i = 0; $__LIST__ = $rejectList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                                        <div class="zw-base">
                                            <span style="color: #009C63;"><?php echo ($vo["jobname"]); ?></span>
                                            <span style="width: 10%;"></span>
                                            <span style="color:#999999;">处理时间：<?php echo (date('Y.m.d',$vo["reply_time"])); ?></span>
                                        </div>
                                        <div class="zw-status">
                                            <span><i class="fa fa-user"></i>&ensp;<?php echo ($vo["uname"]); ?></span>
                                            <span><i class="fa fa-briefcase"></i>&ensp;<?php echo (get_work_experience($vo["work_experience"])); ?></span>
                                            <span><i class="fa fa-graduation-cap"></i>&ensp;<?php echo (get_max_edu($vo["max_edu"])); ?></span>
                                        </div>
                                        <div class="info-tips fr">
                                            <span>收到时间：<?php echo (date('Y.m.d',$vo["time"])); ?></span>&ensp;|
                                            <span><?php echo (get_cj_status($vo["cj_status"])); ?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="edit-tool">
                                            <span class="js-url-bank" data-url="<?php echo U('home/userp/gsview/uid/'.$vo['uid'].'/id/'.$vo['jian_id']);?>"><i class="fa fa-eye fa-lg"></i></span>
                                        </div>
                                        <div class="job-type">
                                            <div class="arrow arrow-right arrow-right-type"></div>
                                            <?php if( $vo["iscate"] == 1): ?><span>全</span>
                                                <?php else: ?>
                                                <span>兼</span><?php endif; ?>
                                        </div>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <div class="pagej" data-id="4">
                                <?php echo ($rejectPage); ?>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $('.pagej').each(function(){
                                    var num    = $(this).find('.current').html();
                                    var selfId = $(this).data('id');
                                    var prev   = $(this).find('.prev').attr('href');
                                    var next   = $(this).find('.next').attr('href');
                                    var $num   = $('.jnum-'+selfId);
                                    $num.find('.all-page i').html(num);
                                    $num.find('.next-ajax').parent('a').attr('href',next);
                                    $num.find('.prev-ajax').parent('a').attr('href',prev);
                                });
                            });
                        </script>
                        <!-- 已过期 -->
                    </div>
                </div>
                <?php else: ?>
                <div class="item-box side-3">
                    <div class="item-content">
                        <span>你还没有认证</span>
                    </div>
                </div><?php endif; ?>
            <!-- /简历管理 -->

            
            <!-- 企业认证 -->

            <div class="item-box side-4">
                <?php if(($userInfo["identify"]) == "0"): ?><div class="item-content identify">
                    <from data-action="<?php echo U('user/gsIdentify');?>" id="qy-indentify">

                        <div class="gs-identify">
                            <h3>公司相关信息(此页必须填写，否则会影响认证)</h3>
                            <ul class="content-group">

                                <li class="input-title"><span>公司名称,要全称</span></li>
                                <li class="input-group">
                                    <label for="c_name1">公司名称：</label>
                                    <input type="text" id="c_name1" name="c_name" index="0" value="<?php echo ($userInfo['c_name']); ?>"/>
                                </li>

                                <li class="input-title"><span>公司行业或公司主要从事行业</span></li>
                                <li class="input-group input-pos clearfix">
                                    <label class="fl" for="c_name1">公司行业：</label>
                                    <input type="hidden" id="c_name1" class="input-industry" name="industry" value=""/>
                                    <span class="fl c_2"><p style="color:#AAAAAA;"><?php echo (get_cate_title($userInfo['industry'])); ?></p></span>
                                    <i class="fa fa-pencil-square-o fa-lg fl"></i>
                                    <div class="cate div-content">
                                        <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><div class="cate-1">
                                                <div class="cate-list cate-content" data-class="input-industry" data-cid="<?php echo ($cate["id"]); ?>" data-val="<?php echo ($cate["title"]); ?>" data-url="<?php echo U('user/');?>">
                                                    <span><?php echo ($cate["title"]); ?></span> <i class="fa fa-angle-right"></i>
                                                </div>
                                                <div class="cate-2">
                                                    <?php if(is_array($cate['_'])): $i = 0; $__LIST__ = $cate['_'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_1): $mod = ($i % 2 );++$i;?><span class="cate-content" data-class="input-industry" data-cid="<?php echo ($cate_1["id"]); ?>" data-val="<?php echo ($cate_1["title"]); ?>"><?php echo ($cate_1["title"]); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </div>
                                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </li>

                                <li class="input-title"><span>公司规模即人数,格式为(xx-yy)eg:10-20</span></li>
                                <li class="input-group">
                                    <label for="c_range">公司规模：</label>
                                    <input type="text" id="c_range" name="c_range" index="0" value="<?php echo ($userInfo['c_range']); ?>"/>
                                </li>

                                <li class="input-title"><span>公司性质,默认为国企</span></li>
                                <li class="input-group">
                                    <label for="property">公司性质：</label>
                                    <select name="property" index="0" id="property">
                                        <option value="0" selected>国企</option>
                                        <option value="1">外商融资</option>
                                        <option value="2">代表处</option>
                                        <option value="3">合资</option>
                                        <option value="4">民营</option>
                                        <option value="5">股份制企业</option>
                                        <option value="6">国家机关</option>
                                        <option value="7">事业单位</option>
                                        <option value="8">其他</option>
                                    </select>
                                </li>

                                <li class="input-title"><span>公司地址,XX省XX市XX区XX街道XX室</span></li>
                                <li class="input-group">
                                    <label for="c_place_detail">详细地址：</label>
                                    <input type="text" id="c_place_detail" index="0" name="c_place_detail" value="<?php echo ($userInfo['c_place_detail']); ?>"/>
                                </li>

                                <li class="input-title"><span>公司邮箱(用于反馈认证消息)</span></li>
                                <li class="input-group">
                                    <label for="c_email">公司邮箱：</label>
                                    <input type="text" id="c_email" index="0" name="c_email" value="<?php echo ($userInfo['c_email']); ?>"/>
                                </li>

                            </ul>
                        </div>

                        <div class="fr-identify">
                            <h3>法人及营业执照相关信息</h3>

                            <ul class="content-group">

                                <li class="input-title"><span>公司法人</span></li>
                                <li class="input-group">
                                    <label for="corporation">法人姓名：</label>
                                    <input type="text" id="corporation" name="corporation" index="0" value="<?php echo ($userInfo['corporation']); ?>"/>
                                </li>

                                <li class="input-title"><span>法人电话(最好为手机)</span></li>
                                <li class="input-group">
                                    <label for="cor_phone">法人电话：</label>
                                    <input type="text" id="cor_phone" name="cor_phone" index="0" value="<?php echo ($userInfo['cor_phone']); ?>"/>
                                </li>

                                <li class="input-title"><span>法人身份证号(18位)</span></li>
                                <li class="input-group">
                                    <label for="identity_num">身份证号：</label>
                                    <input type="text" id="identity_num" name="identity_num" index="0" value="<?php echo ($userInfo['identity_num']); ?>"/>
                                </li>

                                <li class="input-title"><span>营业执照号码(13位)</span></li>
                                <li class="input-group">
                                    <label for="licence">营业执照：</label>
                                    <input type="text" id="licence_num" name="licence_num" index="0" value="<?php echo ($userInfo['licence_num']); ?>"/>
                                </li>

                            </ul>
                        </div>

                        <div class="fr-identify">
                            <h3>上传文件</h3>

                            <ul class="content-group">

                                <li class="input-title"><span>法人手持身份证照片(正面)</span></li>
                                <li class="input-group">
                                    <label for="identity_x">身份证正面：</label>
                                    <div class="controls  pos-r">
                                        <div class="controls">
                                            <input type="file" id="upload_identity_x">
                                            <input type="hidden" name="identity_x" id="identity_x_identity_x" value="<?php echo ($userInfo['identity_x']); ?>"/>
                                            <div class="upload-img-box">
                                                <?php if($userInfo['identity_x'] != ''): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($userInfo['identity_x'],'path')); ?>"/></div><?php endif; ?>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            //上传图片
                                            /* 初始化上传插件 */
                                            $("#upload_identity_x").uploadify({
                                                "height"          : 30,
                                                "swf"             : "/Public/static/uploadify/uploadify.swf",
                                                "fileObjName"     : "download",
                                                "buttonText"      : "上传身份证正面",
                                                "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                                                "width"           : 120,
                                                'removeTimeout'   : 1,
                                                'fileTypeExts'    : '*.jpg; *.png; *.gif;',
                                                "onUploadSuccess" : uploadPicturecover_id1,
                                                'onFallback' : function() {
                                                    alert('未检测到兼容版本的Flash.');
                                                }
                                            });
                                            function uploadPicturecover_id1(file, data){
                                                //console.log($.parseJSON(data));
                                                var data = $.parseJSON(data);
                                                var src = '';
                                                if(data.status){
                                                    $("#identity_x_identity_x").val(data.id);
                                                    src = data.url || '' + data.path
                                                    $("#identity_x_identity_x").parent().find('.upload-img-box').html(
                                                            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                                    );
                                                    $.post("<?php echo U('user/upUcenterMember');?>",{name : 'identity_x',val : data.id});
                                                } else {
                                                    updateAlert(data.info);
                                                    setTimeout(function(){
                                                        $('#top-alert').find('button').click();
                                                        $(that).removeClass('disabled').prop('disabled',false);
                                                    },1500);
                                                }
                                            }
                                        </script>
                                    </div>
                                </li>

                                <li class="input-title"><span>法人手持身份证照片(反面)</span></li>
                                <li class="input-group">
                                    <label for="identity_y">身份证反面：</label>
                                    <div class="controls  pos-r">
                                        <div class="controls">
                                            <input type="file" id="upload_identity_y">
                                            <input type="hidden" name="cover_id" id="identity_y_identity_y" value=""/>
                                            <div class="upload-img-box">
                                                <?php if($userInfo['identity_y'] != ''): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($userInfo['identity_y'],'path')); ?>"/></div><?php endif; ?>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            //上传图片
                                            /* 初始化上传插件 */
                                            $("#upload_identity_y").uploadify({
                                                "height"          : 30,
                                                "swf"             : "/Public/static/uploadify/uploadify.swf",
                                                "fileObjName"     : "download",
                                                "buttonText"      : "上传身份证反面",
                                                "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                                                "width"           : 120,
                                                'removeTimeout'   : 1,
                                                'fileTypeExts'    : '*.jpg; *.png; *.gif;',
                                                "onUploadSuccess" : uploadPicturecover_id2,
                                                'onFallback' : function() {
                                                    alert('未检测到兼容版本的Flash.');
                                                }
                                            });
                                            function uploadPicturecover_id2(file, data){
                                                //console.log($.parseJSON(data));
                                                var data = $.parseJSON(data);
                                                var src = '';
                                                if(data.status){
                                                    $("#identity_y_identity_y").val(data.id);
                                                    src = data.url || '' + data.path
                                                    $("#identity_y_identity_y").parent().find('.upload-img-box').html(
                                                            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                                    );
                                                    $.post("<?php echo U('user/upUcenterMember');?>",{name : 'identity_y',val : data.id});
                                                } else {
                                                    updateAlert(data.info);
                                                    setTimeout(function(){
                                                        $('#top-alert').find('button').click();
                                                        $(that).removeClass('disabled').prop('disabled',false);
                                                    },1500);
                                                }
                                            }
                                        </script>
                                    </div>
                                </li>


                                <li class="input-title"><span>公司或企业营业执照</span></li>
                                <li class="input-group">
                                    <label for="licence">营业执照：</label>
                                    <div class="controls  pos-r">
                                        <div class="controls">
                                            <input type="file" id="upload_licence_id">
                                            <input type="hidden" name="cover_id" id="licence_id_licence_id" value=""/>
                                            <div class="upload-img-box">
                                                <?php if($userInfo['licence'] != ''): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($userInfo['licence'],'path')); ?>"/></div><?php endif; ?>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            //上传图片
                                            /* 初始化上传插件 */
                                            $("#upload_licence_id").uploadify({
                                                "height"          : 30,
                                                "swf"             : "/Public/static/uploadify/uploadify.swf",
                                                "fileObjName"     : "download",
                                                "buttonText"      : "上传营业执照",
                                                "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                                                "width"           : 120,
                                                'removeTimeout'   : 1,
                                                'fileTypeExts'    : '*.jpg; *.png; *.gif;',
                                                "onUploadSuccess" : uploadPicturecover_id3,
                                                'onFallback' : function() {
                                                    alert('未检测到兼容版本的Flash.');
                                                }
                                            });
                                            function uploadPicturecover_id3(file, data){
                                                //console.log($.parseJSON(data));
                                                var data = $.parseJSON(data);
                                                var src = '';
                                                if(data.status){
                                                    $("#licence_id_licence_id").val(data.id);
                                                    src = data.url || '' + data.path
                                                    $("#licence_id_licence_id").parent().find('.upload-img-box').html(
                                                            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                                    );
                                                    $.post("<?php echo U('user/upUcenterMember');?>",{name : 'licence',val : data.id});
                                                } else {
                                                    updateAlert(data.info);
                                                    setTimeout(function(){
                                                        $('#top-alert').find('button').click();
                                                        $(that).removeClass('disabled').prop('disabled',false);
                                                    },1500);
                                                }
                                            }
                                        </script>
                                    </div>
                                </li>

                            </ul>

                        </div>
                        <div class="submit-group">
                            <input type="hidden" name="model_id" value="5">
                            <input type="hidden" name="identify" index="0" value="1">
                            <span class="submit-item ok" data-form="qy-indentify">确定</span>
                            <span class="submit-item cancel" onclick="javascript:location.href='<?php echo U("");?>';return false;" >取消</span>
                        </div>
                    </from>
                </div>
                <?php else: ?>
                    <div class="item-content identify">
                        <?php if(($userInfo["identify"]) == "1"): ?><span>正在认证中（一般从认证提交到认证结束只需要5个小时）。。。</span><?php endif; ?>
                        <?php if(($userInfo["identify"]) == "2"): ?><span>认证通过^0^</span><?php endif; ?>
                        <?php if(($userInfo["identify"]) == "3"): ?><span>认证失败^-^,点击重新认证</span><?php endif; ?>
                    </div><?php endif; ?>
            </div>
            <!-- 企业认证 -->
            

            <!-- 个人设置 -->
            <div class="item-box side-5">
                <div class="item-content">
                    <form data-action="<?php echo U('user/userCenter');?>" id="user-info">
                        <div class="gs-identify">
                            <h3>个人设置</h3>
                            <ul class="content-group">

                                <li class="input-title"><span>用户名</span></li>
                                <li class="input-group">
                                    <label for="username">用户名称：</label>
                                    <input type="text" id="username" name="username" index="0" value="<?php echo ($userInfo["username"]); ?>"/>
                                </li>

                                <li class="input-title"><span>昵称</span></li>
                                <li class="input-group">
                                    <label for="nickname">昵&ensp;&ensp;&ensp;&ensp;称：</label>
                                    <input type="text" id="nickname" name="nickname" index="0" value="<?php echo (get_nickname_now($userInfo["id"])); ?>"/>
                                </li>

                                <li class="input-title"><span>联系方式</span></li>
                                <li class="input-group">
                                    <label for="linkman_phone">联系方式：</label>
                                    <input type="text" id="linkman_phone" name="linkman_phone" index="0" value="<?php echo ($userInfo["linkman_phone"]); ?>"/>
                                </li>

                                <li class="input-title"><span>所处职位</span></li>
                                <li class="input-group">
                                    <label for="pos">所处职位：</label>
                                    <input type="text" id="pos" name="pos" index="0" value="<?php echo ($userInfo["pos"]); ?>"/>
                                </li>

                            </ul>

                            <h3>个人头像以及公司LOGO</h3>
                            <ul class="content-group">
                                <li class="input-title"><span>个人头像（点击修改）</span></li>
                                <li class="input-group">
                                    <label for="pos">个人头像：（点击修改）</label>
                                    <div class="u_tx_box">
                                        <?php if($userInfo['u_tx'] != ''): ?><figure class="u_tx_item qy_tx" title="点击修改头像"><img src="<?php echo (get_cover($userInfo['u_tx'],'path')); ?>"/>
                                            <figcaption></figcaption></figure>
                                        <?php else: ?> 
                                            <figure class="u_tx_item" title="点击修改头像"><img src="/Public/home/images/user/01.jpg"/><figcaption></figcaption></figure><?php endif; ?>
                                    </div>
                                </li>

                                <li class="input-title"><span>公司LOGO图片(最好是，80*80、100*100、120*120)</span></li>
                                <li class="input-group">
                                    <label for="logo">公司LOGO：</label>
                                    <div class="controls  pos-r">
                                        <div class="controls">
                                            <input type="file" id="upload_logo_id">
                                            <input type="hidden" name="logo" id="logo_id_logo_id" value=""/>
                                            <div class="upload-img-box">
                                                <?php if($userInfo['logo'] != ''): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($userInfo['logo'],'path')); ?>"/></div><?php endif; ?>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            //上传图片
                                            /* 初始化上传插件 */
                                            $("#upload_logo_id").uploadify({
                                                "height"          : 30,
                                                "swf"             : "/Public/static/uploadify/uploadify.swf",
                                                "fileObjName"     : "download",
                                                "buttonText"      : "上传LOGO",
                                                "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
                                                "width"           : 120,
                                                'removeTimeout'   : 1,
                                                'fileTypeExts'    : '*.jpg; *.png; *.gif;',
                                                "onUploadSuccess" : uploadPicturecover_id3,
                                                'onFallback' : function() {
                                                    alert('未检测到兼容版本的Flash.');
                                                }
                                            });
                                            function uploadPicturecover_id3(file, data){
                                                //console.log($.parseJSON(data));
                                                var data = $.parseJSON(data);
                                                var src = '';
                                                if(data.status){
                                                    $("#logo_id_logo_id").val(data.id);
                                                    src = data.url || '' + data.path
                                                    $("#logo_id_logo_id").parent().find('.upload-img-box').html(
                                                            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                                                    );
                                                    $.post("<?php echo U('user/upUcenterMember');?>",{name : 'logo',val : data.id});
                                                } else {
                                                    updateAlert(data.info);
                                                    setTimeout(function(){
                                                        $('#top-alert').find('button').click();
                                                        $(that).removeClass('disabled').prop('disabled',false);
                                                    },1500);
                                                }
                                            }
                                        </script>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="upload-content">
                            <div class="container_tx pos-r" id="up-picture1">
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
                        <div class="submit-group">
                            <input type="hidden" name="model_id" value="5">
                            <span class="submit-item ok" data-form="user-info">确定</span>
                            <span class="submit-item cancel" onclick="javascript:location.href='<?php echo U("");?>';return false;" >取消</span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /个人设置 -->

        </div>



    </section>
    <!-- /右侧内容 -->


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
    <script src="/Public/static/select/jquery.cityselect.js"></script>
    <link href="/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
    <script>
        if(localStorage.getItem('scroll') != ''){
            $(document).scrollTop(localStorage.getItem('scroll'));
        }


        $(document).ready(function(){

            $(document).on('scroll',function(){
                var scroll = $(this).scrollTop();
                localStorage.setItem('scroll',scroll);
            });


            /* 简历回复 */
            $('.deal').on('click',function(){
                var $self = $(this);
                var id = $self.data('id');
                var name = $self.data('title');
                var $replay = $('.replay-box');
                $replay.find('.rep-name').html(name);
                $replay.find('.btn-td').data('id',id);
                $replay.find('.btn-rj').data('id',id);
                $replay.css('display','block');
            });

            $('.deal-btn').on('click',function(){
                var $self = $(this);
                var url   = $self.data('url');
                var id    = $self.data('id');
                var $form = $('#repF');
                var place = $form.find('input[name="place"]').val();
                var msTime= $form.find('input[name="ms_time"]').val();
                var content = $form.find('textarea[name="content"]').val();;
                $.post(url,{id:id,place:place,ms_time:msTime,content:content},function(data){
                    if(data.status == 1){

                    }else{
                        alert('回复失败');
                    }
                    location.href = "<?php echo U('home/user/center');?>";
                });
                $self.parent().parent('.replay-box').css('display','none');
            });

            /*yidu*/
            $('.ajax-read').on('click',function(){
                var id = $(this).data('id');
                $.post("<?php echo U('home/user/isRead');?>",{id:id});
            });


            /* 动画 */
            /*TweenLite($('.item-content')[0],1.5,{
                top: 0,
                ease:Tween.Elastic.easeOut
            });

            $('.item-box').css('height',$('.item-content')[0].clientHeight);*/

            /* 点击实现切换tab */

            // 边栏
            var firstSide = function(idItem){
                var self = $('.side-item').eq(idItem);
                var sideId = self.data('side');
                var title  = self.data('title');
                self.find('i').addClass('i-active');
                $('.side-'+sideId).css('display','block');
                if(localStorage.getItem('list') < 0){
                    localStorage.setItem('list',-1);
                    localStorage.setItem('jlist',-1);
                    localStorage.setItem('leftlist',-1);
                }
            };
            $('.side-item').on('click',function(){
                var self = $(this);
                var sideId = self.data('side');
                var title  = self.data('title');
                $('.item-title span').html(title);
                $('.side-item i').removeClass('i-active');
                self.find('i').addClass('i-active');
                $('.item-box').css('display','none');
                $('.side-'+sideId).css('display','block');
                localStorage.setItem('leftlist',sideId-1);
            });
            /* end */

            /* 切换函数 */
            var tabBox =  function(listObj,contentStr1,contentStr2,idItem){
                $(listObj).each(function(i,item){
                    $(item).on('click',function(){
                        var tabId = $(this).data('id');
                        if(listObj == '.zw-item'){
                            $(listObj).removeClass('item-selected');
                            localStorage.setItem('list',tabId-1);
                            $(this).addClass('item-selected');
                        }
                        if(listObj == '.jl-item'){
                            $(listObj).removeClass('item-selected');
                            localStorage.setItem('jlist',tabId-1);
                            $(this).addClass('item-selected');
                        }
                        $(contentStr1).css('display','none');
                        $(contentStr2+tabId).css('display','block');

                    });
                });
                var firstTab = function(){
                    var self = $(listObj).eq(idItem);
                    if(listObj == '.zw-item'){
                        $(listObj).removeClass('item-selected');
                        self.addClass('item-selected');
                    }
                    if(listObj == '.jl-item'){
                        $(listObj).removeClass('item-selected');
                        self.addClass('item-selected');
                    }
                    var tabId = self.data('id');
                    $(contentStr2+tabId).css('display','block');
                };
                firstTab();
            };
            /*
            * a1,点击的li
            * a2,显示内容的公共class
            * a3,显示内容不同的的class
            * */
            if(localStorage.getItem('list') < 0 || localStorage.getItem('jlist') < 0 ) {
                firstSide(0);
                tabBox('.zw-item','.zw-content','.zw-item-',0);
                tabBox('.jl-item','.jl-content','.jl-item-',0);
            }else {
                firstSide(localStorage.getItem('leftlist'));
                tabBox('.zw-item','.zw-content','.zw-item-',localStorage.getItem('list'));
                tabBox('.jl-item','.jl-content','.jl-item-',localStorage.getItem('jlist'));
            }


            tabBox('.radio-item','.pos-diff','.diff-item-',0);


            /* input获得焦点失去焦点的li的状态 */
            $('.input-group input').on({
                focus : function(){
                    $(this).parent('li').css({
                        border : "1px solid #009C63"
                    });
                },
                blur : function(){
                    $(this).parent('li').css({
                        border : "1px solid #CCCCCC"
                    });
                }
            });

            /* 时间 */
            $('.date').datetimepicker({
                format: 'yyyy-mm-dd',
                language:"zh-CN",
                minView:2,
                autoclose:true
            });

            /* 单选切换 */

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
            $.post("<?php echo U('user/getCate');?>",{'menu':1},quanZhi);
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


            /* 标签 */
            var label = <?php echo ($label); ?>;

            $('.gs-label').labelSelect({
                required:false,
                data    :label,
                label   : ['薪资','行业','制度','特色']
            });

            $('.skill-label').labelSelect({
                url     : "/Public/static/label/zwLabel.min.js",
                required:false,
                data    :label,
                label   : ['互联网','金融','语言','专业']
            });

            /* 上传头像 */
            $('#up-picture1').uploadPic();
            $('.p-cancel').on('click',function(e){
                e.stopPropagation();
                $('.upload-content').css('display','none');
            });
            $('.u_tx_item').on('click',function(){
                $('.upload-content').css('display','block');
            });



            /* 城市 */
            var place = {
                        prov : <?php if($userInfo["c_place"] != ''): ?>'<?php echo ($userInfo["c_place"]); ?>'<?php else: ?>'江苏'<?php endif; ?>,
                        city : <?php if($userInfo["c_city"] != ''): ?>'<?php echo ($userInfo["c_city"]); ?>'<?php else: ?>'南京'<?php endif; ?>
                };
            $("#city_1").citySelect({
                prov:place.prov,
                city:place.city,
                nodata: "none",
                required: false
            });
            $("#city_2").citySelect({
                prov:place.prov,
                city:place.city,
                nodata: "none",
                required: false
            });

        });
        /* input */

        (function($){
            var step = {0:'初创性', 1:'未融资', 2:'A轮', 3:'B轮', 4:'C轮', 5:'D轮', 6:'E轮', 7:'已上市', 8:'其他'};
            var step1 = {0:'国企',1:'外商融资',2:'代表处',3:'合资',4:'民营',5:'股份制企业',6:'国家机关',7:'事业单位',8:'其他'};
            var oldVal = null;
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

            $('.input-item').on('click',function(){
                $(this).children('.input-content').removeAttr('disabled');
                $(this).children('.input-content').focus();
            });

            $('.input-content').on({
                blur : function(){
                    var self = $(this);
                    var url = $(this).data('url'),
                        nowVal = $(this).val().replace(/[\s]+/g,''),
                        name   = $(this).attr('name'),
                        tipName = $(this).parent('.input-item').find('label').html().replace(/[:]/g,'');
                    $(this).attr('disabled','disabled');

                    if(nowVal.length == 0){
                        show(tipName,'值为空，将不会更改');
                        return false;
                    }
                    var data = {
                        name : name,
                        val : nowVal
                    };
                    if(oldVal != nowVal){
                        $.post(url,data,success);
                    }
                    function success(data){
                        if(data.status){
                            self.css('color','#666666');
                            show(tipName,'更改成功');
                        }else if(data.info == -14){
                            self.css('color','#EB2626');
                            show(tipName,'改名字已被占用,换一个试试');
                        }
                    }
                },
                focus : function(){
                    if($(this).val().replace(/[\s]+/g,'') != ''){
                        oldVal = $(this).val().replace(/[\s]+/g,'');
                    }
                }
            });

            var $li = '';
            for(index in step){
                $li +='<li class="cate-content" data-class="input-step" data-val="'+step[index]+'" data-cid="'+index+'">'+step[index]+'</li>';
            }
            /* 公司阶段 */

            $('.step-list').append($li);

            /* 公司性质 */
            var $li1 = '';
            for(var i in step1){
                $li1 +='<li class="cate-content" data-class="input-property" data-val="'+step1[i]+'" data-cid="'+i+'">'+step1[i]+'</li>';
            }
            $('.property-list').append($li1);
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

            /* 全局点击 */
            $(document).on('click',function(e){
                $('.div-content,.hy-cate').css('display','none');
                if($('.input-hy').val() == ''){
                    show('公司行业','不能为空，否则将为默认');
                }
            });


            /* 公司简介 */
            $('.gs-jj').find('i').on('click',function(){
                TweenLite($('.text-group')[0],1.5,{
                    height: 250,
                    overflow: 'visible',
                    ease:Tween.Elastic.easeOut
                });
            });
            $('.btn-group').on('click',function(){
                $('.text-group').animate({
                    height : 0,
                    overflow : 'hidden'
                },500);
            });
            /* 公司介绍 */

            $('.text-group').find('.text-area').on('click keydown keyup',function(){
                var self = $(this);
                var str = self.val();
                var $zi = self.siblings('.zi').find('span');
                $zi.html(str.length);
                if(str.length <= 400){
                    $zi.css('color','#009C63');
                    self.css('border-color','#009C63');
                }else if(str.length <= 450 && str.length >= 400){
                    $zi.css('color','#F0D00B');
                    self.css('border-color','#F0D00B');
                } else if(str.length >= 460 && str.length <= 500){
                    $zi.css('color','#EB2626');
                    self.css('border-color','#EB2626');
                }else{
                    str = self.val(str.substr(0,499));
                }
            }).blur(function(){
                var self = $(this);
                var str = self.val(),
                    name = self.attr('name'),
                    url  = self.data('url');
                $(this).css('border-color','#CCCCCC');
                $.post(url,{name:name,val:str});
            });


            /* 公司介绍 */
            $('.textarea-group').find('.text-area1').on('click keydown keyup',function(){
                var self = $(this);
                var str = self.val();
                var $num = self.siblings('.num-limit').find('span');
                $num.html(str.length);
                if(str.length <= 400){
                    $num.css('color','#0066CC');
                    self.css('border-color','#0066CC');
                }else if(str.length <= 450 && str.length >= 400){
                    $num.css('color','#F0D00B');
                    self.css('border-color','#F0D00B');
                } else if(str.length >= 450 && str.length <= 500){
                    $num.css('color','#EB2626');
                    self.css('border-color','#EB2626');
                }else{
                    str = self.val(str.substr(0,499));
                }
            }).blur(function(){
                var self = $(this);
                self.css('border-color','#CCCCCC');
                var str = self.val();
            });

            /* 公司地址 */
            $('#city_1 select').on('blur',function(){
                var self = $(this);
                var value = self.val(),
                        name = self.attr('name'),
                        url  = self.data('url');
                $.post(url,{name:name,val:value});
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
                if(ajax_submit($self,index)){
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

        })(jQuery);



        (function($){
            $.fn.labelSelect = function(settings){
                if(this.length < 1){
                    return ;
                };
                // 默认值
                settings = $.extend({
                    url: "/Public/static/label/gsLabel.min.js",
                    data : null,
                    length : 10,
                    label  : null,
                    required: true
                }, settings);

                var box_obj = this; // 父级区域
                var mask = $(".mask"); // 遮罩
                var showLabel = box_obj.find(".showtagcheck"); // 显示的地方
                var input = box_obj.find(".nature"); // 提交的隐藏表单
                var tagBox = box_obj.find(".tagBox"); // 弹框
                var wdClose = tagBox.find(".wd_close"); // 关闭
                var ulCf    = tagBox.find(".cf");
                var boxCheckedTag = tagBox.find(".box_checkedTag"); // 暂时显示列表
                var showTag = tagBox.find(".showTag"); // 总标签显示地方
                var list    = null;
                var label_json;
                var tagAdd = box_obj.find('.tagAdd');
                var btnOk = tagBox.find('.btn-label');
                var inputName  = input.attr('name');
                var urlAjax    = input.data('url');
                var labelList  = settings.label;

                var closeI = function(){
                    boxCheckedTag.find('a').each(function(i,item){
                        var _this = $(item);
                        var id = _this.attr('class');
                        //alert('i#child_value_'+id);
                        _this.find('i.'+id).bind('click',function(){
                            _this.remove();
                            showTag.find('input.'+id).prop('checked',false);
                        });
                    });
                };

                var closeD = function(){
                    var arr1 = [];
                    showLabel.find('div').each(function(i,item){
                        var _this = $(item);
                        arr1[i] = _this.children("span").attr('rel');
                        _this.children("span").bind('click',function(){
                            var id = $(this).attr('rel');
                            _this.remove();
                            boxCheckedTag.find('a.child_value_'+id).remove();
                            showTag.find('input.child_value_'+id).prop('checked',false);
                            btnSave();
                        });
                    });
                };

                var btnSave = function(){
                    var arr = [];
                    showLabel.find('span').remove();
                    boxCheckedTag.find('a').each(function(i,item){
                        var _this = $(item);
                        var id = _this.attr('class');
                        var name = _this.attr('title');
                        arr[i] = $('a.'+id+' span').attr('rel');
                        var oDiv = '<span rel="'+arr[i]+'">'+name+'</span>';
                        showLabel.append(oDiv);
                    });
                    closeD();
                    var value = arr.sort().join(',');
                    input.val(value);
                    if(value != '' && typeof value != 'undefined' && urlAjax !=''){
                        var data ={
                            name : inputName,
                            val  : value
                        };
                        $.post(urlAjax,data,success);
                        function success(){
                            if(data.status){
                                show('数据','更改成功');
                            }
                        }
                    }
                    close();
                };

                /* 初始化 */
                var init = function(){
                    for(k in label_json){
                        var $li = '<li class="label-head">'+labelList[k]+'：</li>';
                        for(i in label_json[k]){
                            $li += '<li class="li-css"><label><input type="checkbox" class="child_value_'+label_json[k][i].index+'" value="'+label_json[k][i].index+'" title="'+label_json[k][i].value+'">'+label_json[k][i].value+'</label></li>';
                        }
                        showTag.find('.label_'+k).html($li);
                    }

                    // 福利标签
                    var listF = function(){
                        var _this = $(this);
                        var id = _this.attr('class');
                        var value = _this.val();
                        var name  = _this.attr('title');
                        var oHtml = '<a href="javascript:;" id="oa" class="'+id+'" title="'+name+'"><span rel = "'+value+'">'+name+'</span><i class="'+id+' fa fa-times" rel="'+value+'"></i></a>';
                        if(_this.prop('checked') == true){
                            boxCheckedTag.append(oHtml);
                            closeI();
                        }else{
                            boxCheckedTag.find('.'+id).remove();
                        }
                        if(boxCheckedTag.find('a').length < settings.length){
                            ulCf.find('li input:not(:checked)').prop('disabled','');
                        }else{
                            ulCf.find('li input:not(:checked)').prop('disabled','disabled');
                        }
                    };
                    list = showTag.find('.li-css input');
                    list.on('click',listF);

                    var save = function(){
                        var arr = [];
                        showLabel.find('span').remove();
                        boxCheckedTag.find('a').each(function(i,item){
                            var _this = $(item);
                            var id = _this.attr('class');
                            var name = _this.attr('title');
                            arr[i] = $('a.'+id+' span').attr('rel');
                            var oDiv = '<span rel="'+arr[i]+'">'+name+'</span>';
                            showLabel.append(oDiv);
                        });
                        closeD();
                        var value = arr.sort().join(',');
                        input.val(value);
                    };
                    for(i in settings.data){
                        var list1 =showTag.find('input.child_value_'+settings.data[i][0]+'-'+settings.data[i][1]);
                        list1.prop('checked',true);
                        listF.call(list1);
                    }
                    save();


                    var height = getStyle($('body')[0],'height');
                    var width  = getStyle($('body')[0],'width');
                    var mH     = height.substr(0,height.indexOf('p'));
                    var minH = mH < window.innerHeight ? window.innerHeight : mH;
                    mask.on('click',close);
                    wdClose.on('click',close);
                    tagAdd.on('click',function(){
                        mask.css({
                            'display' : 'block',
                            'height'  : minH+"px",
                            'width'   : width
                        });
                        tagBox.css('display','block');
                    });
                    btnOk.on('click',btnSave);
                };

                // 设置json数据
                if (typeof (settings.url) == "string") {
                    //alert(settings.url);
                    $.getJSON(settings.url, function(json) {
                        label_json = json;
                        init();
                    });
                } else {
                    //alert(settings.url);
                    label_json = settings.url;
                    init();
                }

                var close = function(){
                    mask.css('display','none');
                    tagBox.css('display','none');
                };
                // 获取样式
                var getStyle = function(obj,name){
                    return window.getComputedStyle ? getComputedStyle(obj,false)[name] : obj.currentStyle[name];
                };
            }
        })(jQuery);

        (function($){
            $.fn.uploadPic = function(settings){
                if(this.length < 1){
                    return ;
                };
                // 默认值
                var options = $.extend({
                    thumbBox: '.thumbBox',
                    spinner: '.spinner',
                    imgSrc: "/Public/static/uptx/images/avatar.png",
                    gUrl  : "<?php echo U('user/upPicture');?>",
                    urlPost: "<?php echo U('user/upUcenterMember');?>",
                    uName  : 'u_tx',
                    refresh : false,
                    imgClass  : '.qy_tx'
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

                                        if(options.refresh){
                                            location.href = "<?php echo U('');?>";
                                        }
                                }
                            });
                        }
                    });
                };
                init();
            }
        })(jQuery);

    </script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>