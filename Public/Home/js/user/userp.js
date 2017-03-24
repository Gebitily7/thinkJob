/**
 * Created by Gebitily7 on 2016/5/17.
 */
(function($){
    $.fn.clickRadio = function(settings){
        if(this.length < 1){
            return ;
        }

        var setting = $.extend({
            clickObj     : '.click-span',
            clickList : '.select-item',
            hidden    : '.select-content',
            input     : 'type',
            val       : 'val',
            title     : 'title',
            body      : 'body',
            active    : 'item-on'
        },settings);

        var $body = $(setting.body);
        var $obj = this;
        var $clickObj = $obj.find(setting.clickObj);
        var $hidden    = $obj.find(setting.hidden);
        var $clickList = $hidden.find(setting.clickList);
        var $input     = null;
        //console.log($clickObj);
        var init = function(){
            $clickObj.on('click',function(e){
                var evt = e || window.event;
                evt.stopPropagation();
                var dis = $hidden.css('display');
                var input = $(this).data(setting.input);
                $input = $('.'+input);
                if(dis == 'block'){
                    $hidden.css('display','none');
                }else{
                    $hidden.css('display','block');
                }
            });

            $clickList.on('click',function(e){
                var evt = e || window.event;
                evt.stopPropagation();
                var val = $(this).data(setting.val);
                var title = $(this).data(setting.title);
                var dis = $hidden.css('display');
                $input.val(val);
                $clickObj.html(title);
                $clickList.removeClass(setting.active);
                $(this).addClass(setting.active);
                if(dis == 'block'){
                    $hidden.css('display','none');
                }else{
                    $hidden.css('display','block');
                }
            });

            $body.on('click',function(){
                var dis = $hidden.css('display');
                if(dis == 'block'){
                    $hidden.css('display','none');
                }
            });
        };
        init();
    };
}(jQuery));

(function($){
    $.fn.labelSelect = function(settings){
        if(this.length < 1){
            return ;
        };
        // 默认值
        settings = $.extend({
            url: "__STATIC__/label/gsLabel.min.js",
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

