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
    <div class="ajax-tips">
        <span>更新失败</span>
    </div>
    <div class="delete-box">
        <div class="name-top">
            <span>删除提示</span>
        </div>
        <div class="name-body">
            确定要删除 <span class="delete-name"></span>
        </div>
        <div class="btn-group-name">
            <span class="btn-qr btn-delete" data-url="<?php echo U('userp/deleteById');?>" data-id="">确认</span>
            <span class="btn-fr">取消</span>
        </div>
    </div>
    <section class="content-box">
        <div class="content-item content-top">
            <div class="top-bg">
                <div class="spin-mask">
                    <span class="top-back" onclick="self.location=document.referrer;"><i class="fa fa-angle-left"></i></span>
                    <span class="side-title">我的简历</span>
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
        <div class="resume-content">
            <div class="resume-title clearfix pos-r">
                <div class="title-content fl"><span>已有简历</span></div>
                <div class="resume-num"><?php echo ($resumeCount); ?></div>
                <?php if(($resumeCount) == "5"): else: ?>
                    <div class="resume-add resume-add-top fr"><i class="fa fa-plus"></i></div><?php endif; ?>
            </div>
            <ul class="resume-box">
                <?php if(($resumeCount) == "1"): ?><li class="top-tips">暂无简历，创建一个吧</li>
                <?php else: ?>
                    <li class="top-tips">你当前有 <span style="color: #EB2626;"><?php echo ($resumeCount); ?></span> 个简历，一共能建立五个简历。你还能简历 <span style="color: #0066CC;"><?php echo (get_sy($resumeCount)); ?></span> 个</li><?php endif; ?>
                <?php if(is_array($base)): $i = 0; $__LIST__ = $base;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="resume-item">
                        <div class="list-top pos-r clearfix">
                            <div class="my-resume fl">
                                <span><?php echo ($vo["jname"]); ?></span>
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div id="time_<?php echo ($vo["id"]); ?>" class="update-time fl"><span>更新时间</span><time class="time"><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></time></div>
                            <div class="mo_ren fr clearfix">
                                <?php if(($vo["status"]) == "0"): ?><div class="switch" data-url="<?php echo U('userp/setDefault');?>" data-id="<?php echo ($vo["id"]); ?>" data-val='0'><span></span></div>
                                    <span>设为默认</span>
                                    <?php else: ?>
                                    <div class="switch switch-selected" data-url="<?php echo U('userp/setDefault');?>" data-id="<?php echo ($vo["id"]); ?>" data-val='1'><span></span></div>
                                    <span>取消默认</span><?php endif; ?>


                            </div>
                            <div class="edit-name">
                                <div class="name-top">
                                    <span>修改简历名称</span>
                                </div>
                                <div class="name-body">
                                    <label for="jname">名称：</label>
                                    <input type="text" id="jname" class="name-input" name="jname" value="<?php echo ($vo["jname"]); ?>"/>
                                </div>
                                <div class="btn-group-name">
                                    <span class="btn-ok" data-url="<?php echo U('userp/updateBase');?>" data-id="<?php echo ($vo["id"]); ?>" data-name="jname">确认</span>
                                    <span class="btn-qx">取消</span>
                                </div>
                            </div>
                        </div>
                        <div class="list-content">
                            <div class="circle-progress-wrapper ajax-circle" data-id="<?php echo ($vo["id"]); ?>" data-url="<?php echo U('userp/percent');?>">
                                <div class="wrapper left">
                                    <div class="circle-progress left-circle"></div>
                                </div>
                                <div class="wrapper right">
                                    <div class="circle-progress right-circle"></div>
                                </div>
                                <div class="percent">
                                    <p>完整度</p>
                                    <span style="color: #6BC5A4;">100%</span>
                                </div>
                            </div>
                            <div class="tool-box">
                                <span class="tool-item tool-update refresh" data-url="<?php echo U('userp/refresh');?>" data-id="<?php echo ($vo["id"]); ?>" title="刷新时间"><i class="fa fa-refresh"></i>刷新</span>
                                <span class="tool-item tool-edit js-url" data-url="<?php echo U('home/userp/editresume/id/'.$vo['id']);?>" title="编辑"><i class="fa fa-pencil-square-o fa-lg"></i>编辑</span>
                                <span class="tool-item tool-view js-url" data-url="<?php echo U('home/userp/viewj/id/'.$vo['id']);?>" title="预览"><i class="fa fa-eye fa-lg"></i>预览</span>
                                <span class="tool-item tool-delete" title="删除" data-url="<?php echo U('userp/deleteById');?>" data-id="<?php echo ($vo["id"]); ?>" data-name="<?php echo ($vo["jname"]); ?>"><i class="fa fa-trash fa-lg"></i>删除</span>
                            </div>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
            <?php if(($resumeCount) == "5"): else: ?>
                <div class="resume-add resume-add-content ajax-url" data-url="<?php echo U('userp/addBase');?>">
                    <span>+</span>
                </div><?php endif; ?>

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

        (function($){
            $('.ajax-circle').each(function(){
                var $self = $(this);
                var url = $self.data('url');
                var id  = $self.data('id');
                var $left = $self.find('.left-circle');
                var $right = $self.find('.right-circle');
                var $per    = $self.find(".percent span");
                var angle  = 0;
                var val    = 0;
                $.post(url,{id:id},function(data){
                    if(data > 0.5){
                        angle =Math.round(-data*360 + 135);
                        val = Math.round(data*100);
                        $right.css({
                            'transform' : 'rotate3D(0,0,1,45deg)'
                        });
                        $left.css({
                            'transform' : 'rotate3D(0,0,1,'+angle+'deg)'
                        });
                        $per.html(val+'%');
                    }else{
                        angle =Math.round(data*360-135);
                        val = Math.round(data*100);
                        $right.css({
                            'transform' : 'rotate3D(0,0,1,'+angle+'deg)'
                        });
                        $left.css({
                            'transform' : 'rotate3D(0,0,1,-135deg)'
                        });
                        $per.html(val+'%');
                    }
                });
            });
        }(jQuery));

        if(localStorage.getItem('resumeScroll') != null){
            $(document).scrollTop(localStorage.getItem('resumeScroll'));
        }

        $(document).on('scroll',function(){
            var resumeScroll = $(this).scrollTop();
            localStorage.setItem('resumeScroll',resumeScroll);
        });

        /* 删除数据 */
        /* 删除 */
        $('.tool-delete').on('click',function(){
            var id = $(this).data('id');
            var sql = $(this).data('sql');
            var name = $(this).data('name');
            var $del = $('.delete-box');
            $del.find('.btn-delete').data('id',id);
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
            alert(url);
            if(url != ''){
                $.post(url,{id:id},function(data){
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
                    },400,function(){
                        location.href = "<?php echo U('userp/resume');?>";
                    });
                });
            }
        });

        $('.switch').on('click',function(){
            var $self = $(this);
            var id = $self.data('id');
            var url = $self.data('url');
            var val = $self.data('val');
            var data = {
                'id' : id
            };
            if(val == 0){
                data['status'] = 1;
                $.post(url,data,function(data){
                    if(data.status != 1){
                        $('.ajax-tips span').html('设置失败');
                    }else{
                        $('.ajax-tips span').html('设置成功');
                        if(!$self.hasClass('switch-selected')){
                            $('.switch').removeClass('switch-selected');
                            $self.addClass('switch-selected');
                            $self.parent('.mo_ren').find('span').html('取消默认');
                        }
                        $self.data('val',1);
                    }
                    $('.ajax-tips').animate({
                        'opacity' : 1
                    },1000).delay(1000).animate({
                        'opacity' : 0
                    },400,function(){
                        location.href = "<?php echo U('');?>";
                    });
                });
            }else if(val == 1){
                data['status'] = 0;
                $.post(url,data,function(data){
                    if(data.status != 1){
                        $('.ajax-tips span').html('设置失败');
                    }else{
                        $('.ajax-tips span').html('设置成功');
                        if($self.hasClass('switch-selected')){
                            $self.removeClass('switch-selected');
                            $self.parent('.mo_ren').find('span').html('设为默认');
                        }
                        $self.data('val',0);
                    }
                    $('.ajax-tips').animate({
                        'opacity' : 1
                    },1000).delay(1000).animate({
                        'opacity' : 0
                    },400,function(){
                        location.href = "<?php echo U('');?>";
                    });
                });
            }
        });

        /* 更新时间 */
        $('.refresh').on('click',function(){
            var $self = $(this);
            var id = $self.data('id');
            var url = $self.data('url');
            $.post(url,{id : id},function(data){
                if(data.status != 1){
                    $('.ajax-tips span').html('更新失败');
                }else{
                    $('.ajax-tips span').html(data.info);
                    $("#time_"+id).find('.time').html(data['time']);
                }
                $('.ajax-tips').animate({
                    'opacity' : 1
                },1000).delay(1000).animate({
                    'opacity' : 0
                },400);
            });
        });

        /* 新增 */
        $('.ajax-url').on('click',function(){
            var url = $(this).data('url');
            $.post(url,{},function(data){
                $('.ajax-tips span').html(data.info);
                $('.ajax-tips').animate({
                    'opacity' : 1
                },1000).delay(1000).animate({
                    'opacity' : 0
                },400,function(){
                    location.href = "<?php echo U('');?>";
                });
            });
        });

        /* 修改简历名字 */
        $('.my-resume').on('click',function(e){
            e.stopPropagation();
            var $editBox = $(this).siblings('.edit-name');
            if($editBox.css('display') == 'block'){
                $editBox.css('display','none');
            }else{
                $editBox.css('display','block');
            }
        });

        $('.btn-qx').on('click',function(){
            $(this).parent().parent('.edit-name').css('display','none');
        });

        $('.btn-ok').on('click',function(){
            var $self = $(this);
            var input = $self.data('name');
            var value = $("input[name="+input+"]").val();
            var url = $self.data('url');
            var id = $self.data('id');
            $.post(url,{
                id    : id,
                jname : value
            },function(data){
                if(data.status != 1){
                    $('.ajax-tips span').html('更改出错');
                }else{
                    $('.ajax-tips span').html(data.info);
                }
                $('.ajax-tips').animate({
                    'opacity' : 1
                },1000).delay(1000).animate({
                    'opacity' : 0
                },400);
                $self.parent().parent('.edit-name').css('display','none');
            })
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