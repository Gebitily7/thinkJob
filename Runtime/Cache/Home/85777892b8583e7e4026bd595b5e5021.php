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
    <link rel="stylesheet" href="/Public/Home/css/userp/edit.css"/>
    <style>
        .content-box{
            float: none;
            width: 750px;
            margin: 0 auto;
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
        
    <section class="content-box">
        <!-- 头部背景图 -->
        <div class="content-item content-top">
            <div class="top-bg">
                <div class="spin-mask">
                    <span class="top-back" onclick="self.location=document.referrer;"><i class="fa fa-angle-left"></i></span>
                    <span class="side-title">简历预览</span>
                </div>
            </div>
            <div class="tx_box">
                <figure class="u_tx">
                    <img src="<?php echo (get_cover($userInfo["u_tx"],'path')); ?>" alt=""/>
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

            <?php if(is_array($work)): $i = 0; $__LIST__ = $work;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- content -->
                <div class="exp-box work-box-<?php echo ($vo["id"]); ?>">
                    <div class="minCir circle"></div>
                    <div class="mods">
                        <div class="exp-content">

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
                <!-- /content --><?php endforeach; endif; else: echo "" ;endif; ?>
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

            <?php if(is_array($edu)): $i = 0; $__LIST__ = $edu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- content -->
                <div class="exp-box education-box-<?php echo ($vo["id"]); ?>">
                    <div class="minCir circle"></div>
                    <div class="mods">
                        <div class="exp-content">
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
                <!-- /content --><?php endforeach; endif; else: echo "" ;endif; ?>
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

            <?php if(is_array($pro)): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- content -->
                <div class="exp-box project-box-<?php echo ($vo["id"]); ?>">
                    <div class="minCir circle"></div>
                    <div class="mods">
                        <div class="exp-content">
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
                <!-- /content --><?php endforeach; endif; else: echo "" ;endif; ?>
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

            <?php if(is_array($train)): $i = 0; $__LIST__ = $train;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- content -->
                <div class="exp-box train-box">
                    <div class="minCir circle"></div>
                    <div class="mods">
                        <div class="exp-content">
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
                <!-- /content --><?php endforeach; endif; else: echo "" ;endif; ?>
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
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

<!-- /底部 -->
</body>
</html>