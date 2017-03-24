/**
 * Created by Gebitily7 on 2016/5/16.
 */
$(document).ready(function(){
    /* 时间 */
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });

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


    /* teatarea */
    $('.textarea-group').find('.text-area1').on('click keydown keyup',function(){
        var self = $(this);
        var str = self.val();
        var $num = self.siblings('.num-limit').find('span');
        $num.html(str.length);
        console.log(str);
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
});

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

(function($){
    $.fn.uploadPic = function(settings){
        if(this.length < 1){
            return ;
        }
        // 默认值
        var options = $.extend({
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: "__STATIC__/uptx/images/avatar.png",
            gUrl  : "{:U('user/upPicture')}",
            urlPost: "{:U('user/upUcenterMember')}",
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
                                location.href = "{:U('')}";
                            }
                        }
                    });
                }
            });
        };
        init();
    }
})(jQuery);