/**
 * Created by Gebitily7 on 2016/4/8.
 */
(function(){

    var $ = function(id){
        return document.getElementById(id);
    };
    var Slide = function(id){

        var variable = {
            section  : null,  //�������ĸ��ڵ�
            parent   : null,  // ������
            picList  : null,  // ͼƬ����
            pics     : null,  // ÿһ��ͼƬ�ĸ�����li
            picSrc   : [],    // ͼƬ�����ӵ�ַ
            links    : null,  // ����
            titleBar : null,  // ���ͼƬ���͵�����
            titleLink: null,  // ���ӽ���
            count    : 0,     // ͼƬ����
            flag     : "",    // ȫ�ּ�ʱ��
            playTime : 0,     // ����ʱ��
            duration : 0,     // ���
            slideNum : [],    // ������ְ�ť���������
            direction: 0,     // ����0<-,1->
            index    : 0,     // ÿһ��ͼƬ������ֵ
            nextBtn  : null,
            prevBtn  : null
        };


        var init = function(){
            variable.parent  = $(id).getElementsByTagName('div');
            variable.section = $(id).parentNode.parentNode.tagName == 'SECTION' ? $(id).parentNode.parentNode : '';

            variable.picList = variable.parent[0].getElementsByTagName('ul')[0];
            variable.pics    = variable.picList.getElementsByTagName('li');
            variable.links   = variable.picList.getElementsByTagName('a');

            variable.titleBar= variable.parent[1];
            variable.count   = variable.pics.length;
            variable.playTime= .4;
            variable.duration= 4;
            variable.picList.style.width = 788 * variable.count + "px";

            variable.nextBtn = $(id).getElementsByTagName('button')[1];
            variable.prevBtn = $(id).getElementsByTagName('button')[0];

            variable.titleLink = document.createElement('h3');
            variable.titleLink.innerHTML = '<a href = "'+variable.links[0].href+'">'+variable.links[0].title+'</a>';
            variable.titleBar.appendChild(variable.titleLink);

            var cdf = document.createDocumentFragment();
            for(var i = 1, size = variable.count; (size - 1) >= 0; size--,i++){
                var span = document.createElement('span');
                span.index = i - 1;
                var src  = variable.pics[span.index].getElementsByTagName('img')[0].src;
                i == 1 && (span.className = 'active');
                span.style.right = ((size - 1) * 25 + 350) + "px";
                span.innerHTML = i;
                cdf.appendChild(span);
                variable.slideNum.push(span);
                variable.picSrc.push(src);
                hover(span);
            }
            if(variable.section != ''){
                variable.section.style.background = "url("+variable.picSrc[0]+") 50% 0";
            }
            variable.titleBar.appendChild(cdf);
            clickEvent();
            autoPlay();
            hover(variable.titleLink);
            hover(variable.picList);
            hover(variable.prevBtn);
            hover(variable.nextBtn);
            variable.prevBtn.onclick= function(){
                move(2);
            };
            variable.nextBtn.onclick     = function(){
                move(1);
            }
        };

        var hover = function(obj){
            obj.onmouseover = function(){
                clearInterval(variable.flag);
            };
            obj.onmouseout = function(){
                autoPlay();
            };
        };

        var clickEvent = function(){
            for(var i = 0,j = variable.count; i < j; i++){
                variable.slideNum[i].onclick = function(){
                    var _this = this;
                    variable.index = _this.index;
                    for(var k = 0; k < j; k++){
                        variable.slideNum[k].className = '';
                    }
                    variable.titleLink.innerHTML = '<a href = "'+variable.links[this.index].href+'">'+variable.links[this.index].title+'</a>';
                    variable.section.style.background = "url("+variable.picSrc[this.index]+") 50% 0";
                    this.className = 'active';
                    TweenLite(
                        variable.picList,
                        variable.playTime,
                        {
                            marginLeft : 0 - this.index * 788,
                            ease       : Tween.Elastic.easeOut,
                            onComplete : function(){
                                variable.picList.style.marginLeft = (0 - _this.index * 788) + "px";
                            }
                        }
                    );
                }
            }
        };

        var autoPlay = function(){
            variable.flag = setInterval(move,(variable.duration * 1000 + variable.playTime * 1000));
        };
        var move = function(dir){
           if(variable.count > 1){
               var dir1 = dir || 0;
               for(var k = 0; k < variable.count; k++){
                   variable.slideNum[k].className = '';
               }
               if(dir1 == 0){
                   if(variable.direction == 0){
                       if(variable.index < variable.count - 1){
                           variable.index++;
                       }else{
                           variable.direction = 1;
                           variable.index --;
                       }
                   } else {
                       if(variable.index > 0){
                           variable.index --;
                       }else{
                           variable.direction = 0;
                           variable.index ++;
                       }
                   }
               } else if(dir1==1) {
                   if(variable.index < variable.count - 1){
                       variable.index++;
                   }else{
                       variable.index = 0;
                   }
               } else if(dir1==2) {
                   if(variable.index > 0){
                       variable.index--;
                   }else{
                       variable.index = variable.count - 1;
                   }
               }
               variable.titleLink.innerHTML = '<a href = "'+variable.links[variable.index].href+'">'+variable.links[variable.index].title+'</a>';
               variable.section.style.background = "url("+variable.picSrc[variable.index]+") 50% 0";
               variable.slideNum[variable.index].className = 'active';
               TweenLite(
                   variable.picList,
                   variable.playTime,
                   {
                       marginLeft : 0 - variable.index * 788,
                       ease       : Tween.Circ.easeOut,
                       onComplete : function(){
                           variable.picList.style.marginLeft = (0 - variable.index * 788) + "px";
                       }
                   }
               );
           }
        };
        init();
    };
    window.Slide = Slide;
})();

window.onload = function(){
    var b = document.getElementsByClassName('slide');
    for(var i = 1; i <= b.length; i++){
        new Slide('slide'+i);
    }
};/**
 * Created by Gebitily7 on 2016/4/13.
 */
