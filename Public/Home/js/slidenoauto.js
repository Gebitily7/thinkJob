/**
 * Created by Gebitily7 on 2016/4/17.
 */
;(function($){

    var noSlide = function(obj){
        var self       = this;
        this.tips      = $(obj).children('.gstips');
        this.tipsSpan  = this.tips.children('span');
        this.ul        = $(obj).children('ul');
        this.li        = this.ul.children('li');
        this.count     = this.li.length;
        this.liWidth   = parseInt(this.li.css('width'));
        this.margin    = parseInt(this.li.css('margin-right')) + parseInt(this.li.css('margin-left'));
        this.liW       = this.liWidth + this.margin;

        this.now       = $('.gsCard #now');
        this.total     = $('.gsCard #total');

        this.prevBtn   = $(obj).children('.gsBtnL');
        this.nextBtn   = $(obj).children('.gsBtnR');

        this.ul.css('width',this.liW*this.count+"px");
        this.index = 0;
        this.flag = true;


        /* 初始化 */
        this.now.html(3);
        this.total.html(this.count);

        this.prevBtn.on('click',function(){
            if(self.flag && self.index <= 0){
                self.move(0);
                self.flag = 0;
            }else if(self.index > 0){
                self.move(0);
            }
        });
        this.nextBtn.on('click',function(){
            if(self.flag && self.index >= self.count-3){
                self.move(1);
                self.flag = false;
                console.log(self.index);
            }else if(self.index < self.count-3){
                self.move(1);
            }
        });

    };
    noSlide.prototype = {
        move:function(dir){
            var _this = this;
            if(dir == 0){
                if(this.index > 0){
                    this.index--;
                    this.ul.css({
                        left : -this.liW*this.index + 'px'
                    });
                    this.now.html(this.index+3);
                }else{
                    this.tipsSpan.html('已经是首个');
                    this.tips.animate({
                        zIndex   : 2,
                        opacity   : "1"
                    },100).animate({
                        opacity   : "0",
                        zIndex   : -1
                    },1000,function(){
                        _this.flag = true;
                    });
                }
            }else{
                if(this.index < this.count - 3){
                    this.index++;
                    this.ul.css({
                        left : -this.liW*this.index + 'px'
                    });
                    this.now.html(this.index+3);
                }else{
                    this.tipsSpan.html('已经是最后');
                    this.tips.animate({
                        zIndex   : 2,
                        opacity   : "1"
                    },100).animate({
                        opacity   : "0",
                        zIndex   : -1
                    },1000,function(){
                        _this.flag = true;
                    });
                }
            }
            //console.log(this.index);
        }
    };
    noSlide.init = function(obj){
        var _this = this;
        obj.each(function(){
            new _this(this);
        });
    };

    window['noSlide'] = noSlide;
    $(document).ready(function(){
        noSlide.init($('.gsCardBox'));
    });
})(jQuery);