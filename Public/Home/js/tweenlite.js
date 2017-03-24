/*参数说明：
TweenLite( $target, $duration, $vars );
$target ---> 执行的目标对象
$duration ---> 动作持续的时间
$vars ---> 属性 + 功能函数 数据格式是Object
基本属性如：(opacity, left, top, width, height....等等)

功能函数如：
ease --> 具体缓动类型
onComplete --> 动作运行结束时调用
onUpdate --> 动作正在运行时调用
delay --> 动作延迟指定秒数后执行


用法如下：
TweenLite( target,1 ,{left:100, top:100, opacity:100, ease:Tween.Expo.easeOut, delay:2, onUpdate:Fun, onComplete:Fun});
*/

var TweenLite = function($target,$duration,$vars)
{
	var ease,onComplete,onUpdate,delay,vars = $vars,target = $target,speed = $duration;
	
	if(!target){return false;}
	if(vars.ease){ease = vars.ease;delete vars.ease;}else{ease = Tween.Linear;}
	if(vars.onComplete){onComplete = vars.onComplete;delete vars.onComplete;}
	if(vars.onUpdate){onUpdate = vars.onUpdate;delete vars.onUpdate;}
	if(vars.delay){delay = vars.delay;delete vars.delay;}
	var ifstop = false;
	var attrArr = [];
	var curArr = [];
	var initArr = [];
	for(var at in vars)
	{
		attrArr.push(at);
		curArr.push(vars[at]);
		var ato = 0;
		switch(at)
		{
			case "opacity":ato = parseInt(parseFloat(getStyle(target,'opacity'))*100);if(isNaN(ato)){ato = 100;}break;
			default:ato = parseInt(getStyle(target,at));break;	
		}
		initArr.push(ato);
	}
	if(delay)
	{
		if(target.delay){clearTimeout(target.delay);}
		target.delay = setTimeout(run,delay*1000);
	}else{run();}
	
	function run()
	{
		var s = (new Date()).getTime() / 1000;
		for(var attr in vars)
		{
			(
				function()
				{
					var t = (new Date()).getTime() / 1000 - s;
					for(var i=0;i<attrArr.length;i++)
					{
						var easeVars = ease(t,initArr[i],curArr[i]-initArr[i],speed);
						if(attrArr[i]=='opacity')
						{
							target.style["opacity"] = easeVars / 100;
							target.style["filter"] = "alpha(opacity:" + easeVars + ")";
							target.alpha = easeVars;
						}
						else
						{
							target.style[attrArr[i]] = attrArr[i]=="zIndex" ? Math.floor(easeVars) : Math.floor(easeVars) + "px";
						}
					}
					if(target.timer){clearTimeout(target.timer);}
					if(t<speed)
					{
						target.timer = setTimeout(arguments.callee, 10);
						if(onUpdate){onUpdate();}
					}
					else
					{
						if(!ifstop)
						{
							ifstop = true;
							clearTimeout(target.timer);
							if(onComplete){onComplete()};
						}
					}
				}
			)();
		}
	}
	function getStyle(ta, at){return ta.currentStyle?ta.currentStyle[at]:getComputedStyle(ta, false)[at];}
}