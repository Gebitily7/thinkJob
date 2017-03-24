(function($){

    var showList = function(obj){
        var _self = this;
        this.body   = $('body');

        this.father = $(obj);
        this.span   = $(obj).children('span');
        this.child  = $(obj).children('.clickChild');
        this.childs = $('.clickChild').not(this.child);
        this.liChild = this.child.children('li');

        this.icon   = $(obj).children('.fa');
        this.father.click(function(event){
            var e = event || window.event;
            e.stopPropagation();
            _self.tabShow();
        });
        this.body.click(function(){
            _self.bodyClick();
        });
        this.liChild.each(function(){
            $(this).click(
                function(){
                    var span1 = _self.span.html();
                    var _this = $(this).html();
                    _self.span.html(_this);
                    _self.span.attr('title',_this);
                    //$(this).html(span1);
                    //$('#jobType').val(_this);
                }
            );
        });
    };
    showList.prototype = {
        tabShow : function(){
            this.childs.each(
                function(){
                    if($(this).css('display') == 'block'){
                        $(this).css('display','none');
                        $(this).parent().children('.fa').toggleClass('fa-caret-up','fa-caret-down');
                    }
                }
            );
            if(this.child.css('display') == 'none'){
                this.child.css('display','block');
            }else{
                this.child.css('display','none');
            }
            this.icon.toggleClass('fa-caret-up','fa-caret-down');
        },
        bodyClick : function(){
            if(this.child.css('display') == 'block'){
                this.child.css('display','none');
                this.icon.toggleClass('fa-caret-up','fa-caret-down');
            }
        }
    };

    showList.init = function(obj){
        var _this = this;
        obj.each(function(){
            new _this(this);
        });
    };


    window['showList'] = showList;
})(jQuery);

$(function(){
	//图标隐藏菜单
	$(".entrance").hover(function(){
		$(this).children(".user-menu").show();
	},function(){
		$(this).children(".user-menu").hide();
	});

	$('.action .detailed').each(function(){
		$(this).click(function() {
        	detailed_content();
        	return false;
        });
  	});

    //$(document).scroll(
    //    function(){
    //        console.log(document.getElementsByTagName('body'));
    //    }
    //);
    // 点击显示和隐藏
    $('.clickFather').each(function(){
        $(this).click(
            function(event){
                var e = event || window.event;
                e.stopPropagation();
                if($(this).children('.clickChild').css('display') == 'none'){
                    $(this).children('.clickChild').css('display','block');
                }else{
                    $(this).children('.clickChild').css('display','none');
                }
                $(this).children('.fa').toggleClass('fa-caret-up','fa-caret-down');
            }
        );
    });
    $('body').click(
        function(){
            if($('.clickChild').css('display') == 'block'){
                $('.clickChild').css('display','none');
                $('.clickFather').children('.fa').toggleClass('fa-caret-up','fa-caret-down');
            }
        }
    );
    $('.child').each(
        function(){
            $(this).click(
                function(){
                    var span = $('.clickFather span').html();
                    var _this = $(this).html();
                    var data = $(this).data('val');
                    $('.clickFather span').html(_this);
                    $('.clickFather span').attr('title',_this);
                    $('.clickFather span').data('val',data);
                    $('#jobType').val(data);
                }
            );
        }
    );

    $('.search-btn').on('click',function(){
        var form = $(this).data('form');
        var $form = $('#'+form);
        var data = $form.serialize();
        var url = "index.php?s=/home/index/search"+'&'+data;
        location.href = url;
    });

    /* 菜单边框显示问题 */
    $('.sidbar_main li').each(function(){
        $(this).hover(
            function(){
                $(this).children('.bar_pad').css({
                    'border-bottom' : "1px solid #006026"
                });
                $(this).children('.catynavlist').css('display','block');
                $(this).prev().children('.bar_pad').css('border-bottom','1px solid #006026');
            },
            function(){
                $(this).children('.bar_pad').css({
                    'border-bottom': '1px dotted #CCCCCC'
                });
                $(this).children('.catynavlist').css('display','none');
                $(this).prev().children('.bar_pad').css('border-bottom','1px dotted #CCCCCC');
            }
        );
    });

    /* 关闭 */
    $('.closenav').each(function(){
        $(this).click(
            function(){
                $(this).parent().css('display','none');
            }
        );
    });

	$('.action .thinkbox-image').each(function(){
		$(this).click(function() {
        	thinkbox_image();
        	return false;
        });
  	});

    /* tab */
    //var idBox = ['live','man','market','marketplace','industry','science','arts','money','safety','house'];
    var idBox = $('.xxxBox').size();


    var classHover = function(id){
        $('#tab-'+id+' .tab .tab-item').each(function(i){
            var $_this = $(this),
            width = $_this.children('a').get(0).clientWidth,
            index = i;

            $_this.css({
                width: width+"px"
            });

            if(index == 0){
                $_this.addClass('tab-selected');
            }
            $_this.hover(function(event){
                var e = event || window.event;
                e.stopPropagation();
                e.preventDefault();

                var dataId = $(this).data('id');
                $_this.siblings().each(function(){
                    $(this).removeClass('tab-selected');
                }).delay(1000);
                hoverTab(id,index);
                $_this.addClass('tab-selected');
            });
        });
    };
    var hoverTab = function(id,index){
        $("#tab-"+id+" .mc .main").each(function(i){
            $(this).css('display','none');
            if(i == index){
                $(this).css('display','block');
            }
        });
    };
    for(var i = 45,j = 0; i < 55; i++,j++){
        hoverTab(i,0);
        classHover(i);
    }
    //

    /* input表单检测验证 */
    $('.detection-name').on('keyup blur',function(){
        var name = $(this).val();
        var parent = $(this).parent();
        var data = empty(name,1,20);
        if(data.status == 0){
            $(this).css('color','#EB2626');
            parent.find('.tips1 span').html(data.info);
        }else{
            $(this).css('color','#666666');
            parent.find('.tips1 span').html('');
        }
    });
    $('.detection-password').on('keyup blur',function(){
        var name = $(this).val();
        var parent = $(this).parent();
        var data = password(name);
        if(data.status == 0){
            $(this).css('color','#EB2626');
            parent.find('.tips1 span').html(data.info);
        }else{
            $(this).css('color','#666666');
            parent.find('.tips1 span').html('');
        }
    });
    $('.detection-email').on('keyup blur',function(){
        var name = $(this).val();
        var parent = $(this).parent();
        var data = email(name);
        if(data.status == 0){
            $(this).css('color','#EB2626');
            parent.find('.tips1 span').html(data.info);
        }else{
            $(this).css('color','#666666');
            parent.find('.tips1 span').html('');
        }
    });

    /* hoverLOGO */
    $('.gsH').each(function(){
        var $_this = $(this);
        $(this).children('.gsTx').on('mouseover',function(){
            $_this.children('.job-mask').css('display','block');
            return false;
        });
        $_this.children('.job-mask').on('mouseleave',function(){
            $(this).css('display','none');
            return false;
        })
    });

    /* a标签激活 */
    $('.sidbarnav span a').each(function(){
        $(this).on('click',function(){
            $(this).parent('span').siblings().find('a').removeClass('on');
            $(this).addClass('on');
            var id = $(this).attr('data-id');
            setCookie('dataId',id);
        });
    });

    var tabNav =function(){
        $('.sidbarnav span a').each(function(i){
            var id = getCookie('dataId');
            if(id == null) {
                id = 1;
            }
            if($(this).attr('data-id') == id){
                $(this).addClass('on');
            }
        });
    };
    tabNav();

	(function(){
		var $nav = $("#nav"), $current = $nav.children("[data-key=" + $nav.data("key") + "]");
		if($nav.length){
			$current.addClass("current");
		} else {
			$("#nav").children().first().addClass("current");
		}
	})();

    Fix.init({'fixBox':'document'});

    /* 全局js跳转 */
    $('.js-url').on('click',function(){
        var url = $(this).data('url');
        location.href = url;
    });
    $('.js-url-bank').on('click',function(){
        var url = $(this).data('url');
        window.open(url);
    });
});
/* 固定头部 */
(function(){
    var Fix = function(obj,setting,callback){
        var self          = this;
        // 父级需要scrollbar的盒子
        this.ofixBox      = obj || document.getElementsByClassName('fixBox')[0] || document;
        // 内容盒子
        this.ofixContent  = this.ofixBox.getElementsByClassName('fixContent')[0] || this.ofixBox.getElementsByTagName('body')[0];
        // 内容盒子如果是obj不为document的话就是obj为的话是body或其他
        var _this         = obj || this.ofixContent;
        // 需要固定的元素
        this.ofixed       = this.ofixContent.getElementsByClassName('fixed')[0];
        // 撑开div
        this.oreplace     = this.ofixContent.getElementsByClassName('replace')[0];
        // 默认设置
        this.setting      = setting ||{top:0,width:this.ofixed.clientWidth,height:this.ofixed.height,clientHeight:this.ofixed.clientHeight,background:'rgba(255,255,255,.9)',opacity:1,clientTop:_this.clientTop,zindex:999};
        // 回调函数
        var callback      = callback || function(){
                var scrollTop = _this.scrollTop || document.documentElement.scrollTop;
                self.setting.atop = scrollTop + self.setting.top;
                if(self.oreplace.offsetTop - scrollTop < self.setting.clientTop){
                    self.ofixed.style.cssText = "position:absolute;top:"+self.setting.atop+"px;width:"+self.setting.width+"px;height:"+self.setting.height+"px;background:"+self.setting.background+";opacity:"+self.setting.opacity+";z-index:"+self.setting.zindex+";border-bottom:1px solid #cccccc;box-shadow: 0 2px 15px -4px #333333;";
                    self.oreplace.style.cssText = "height:"+self.setting.clientHeight+"px;";
                    //console.log(self.oreplace.style.cssText);
                }else{
                    self.ofixed.style.cssText = "position:static;";
                    self.oreplace.style.cssText = "height:0";
                }
            };
        // 添加滚动事件
        addEvent(this.ofixBox,'scroll',callback);
    };

    var addEvent = function(obj,type,callback,flag){
        var flag = flag || false;
        obj.addEventListener(type,callback,flag);
    }

    var $ = function(id){
        return document.querySelectorAll(id);
    };

    Fix.init = function(obj,callback,setting){
        var _this_ = this;
        for(var i = 0,length = $(obj.fixBox).length; i < length; i++){
            new _this_($(obj.fixBox)[i],callback,setting);
        }
        if($(obj.fixBox).length == 0 && obj.fixBox == 'document'){
            new _this_(0,setting,callback);
        }
    };
    window['Fix'] = Fix;
})();
