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

    <link rel="stylesheet" href="/Public/Home/css/article/detail.css"/>

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
<!-- /头部 -->

<!-- 主体 -->

    <header class="jumbotron subhead" id="overview">
		<div class="container">
			<h2><?php echo ($info["title"]); ?></h2>
			<p class="nav-p clearfix">
				<span  class="pull-left">
					<span class="author"><?php echo (get_username($info["uid"])); ?></span>
					<span> 发表于 <?php echo (date('Y-m-d H:i',$info["create_time"])); ?></span>
				</span>
				<span class="pull-right">
					<?php $prev = D('Document')->prev($info); if(!empty($prev)): ?><a href="<?php echo U('?id='.$prev['id']);?>">上一篇</a><?php endif; ?>
                    <?php $next = D('Document')->next($info); if(!empty($next)): ?><a href="<?php echo U('?id='.$next['id']);?>">下一篇</a><?php endif; ?>
				</span>
			</p>
		</div>
	</header>

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
        
    <div class="span9 main-content">
        <!-- Contents
        ================================================== -->
        <section id="contents"><?php echo ($info["content"]); ?></section>
        <hr/>
    </div>
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