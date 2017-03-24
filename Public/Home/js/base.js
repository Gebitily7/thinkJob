/**
 * Created by Gebitily7 on 2016/4/20.
 */
/*
 *function:����cookie����
 *name��
 *valueֵ
 *expires����ʱ��
 *path·������
 *domain��������
 *secure��ȫ����
 *return null��
 */
function setCookie(name,value,expires,path,domain,secure){
    var cookieName=encodeURIComponent(name)+"="+encodeURIComponent(value);
    if (expires instanceof Date){
        cookieName+=";expires="+expires;
    }
    if (path){
        cookieName+=";"+path;
    }
    if (domain){
        cookieName+=";"+domain;
    }
    if (secure){
        cookieName+=";"+secure;
    }
    document.cookie=cookieName;
}
/*
 *function:����ʱ�亯��
 *day����ʱ��
 *return date;
 */
function setCookieDate(day){
    var date=null;
    if (typeof day=='number'&&day>0){
        date=new Date();
        date.setDate(date.getDate()+day);
    } else{
        throw new Error('�㴫�ݵ��������Ϸ�');
    }
    return date;
}
/*
 *function:��ȡcookie
 *name��Ҫ��ȡcookie��name(��);
 *return cookieValue;
 */
function getCookie(name){
    var cookieName=encodeURIComponent(name)+"=";
    var cookieStart=document.cookie.indexOf(cookieName);
    var cookieValue=null;
    if (cookieStart>-1) {
        var cookieEnd=document.cookie.indexOf(';',cookieStart);
        if (cookieEnd==-1) {
            cookieEnd=document.cookie.length;
        }
        cookieValue=decodeURIComponent(document.cookie.substring(cookieStart+cookieName.length,cookieEnd));
    }
    return cookieValue;
}

/**
 * 长度和为空检测
 * $str 数字,字符串
 * min 限制的最低字数
 * max 限制的最高字数
 * */
function empty($str,min,max){
    var str1 = $str.toString();
    var str = str1.replace(/[\s]+/g,'');
    var minLen = min || 0;
    var maxLen = max || 0;
    var data = {
        status : 1,
        info   : ''
    };
    if(minLen != 0){
        if(str.length < minLen){
            data.status = 0;
            data.info   = '长度不能小于'+minLen;
        }
    }
    if(maxLen!=0){
        if(str.length > maxLen){
            data.status = 0;
            data.info   = '长度不能大于'+maxLen;
        }
    }
    if(str.length <= 0){
        data.status = 0;
        data.info   = '不能为空';
    }
    return data;
}

/*
* 空字符过滤
* return string  过滤后的字符串
* */
function empty_filter($str){
    var str1 = $str.toString();
    return str1.replace(/[\s]+/g,'');
}

/*
* 检测邮箱是否符合标准
* */
function email($email){
    var data = {
        status : 1,
        info   : ''
    };
    if(!/^[a-zA-Z\d]+(\.[a-z\d]+)*@([\da-z](-[\da-z])?)+(\.{1,2}[a-z]+)+$/.test($email)){
        data.status = 0;
        data.info   = '邮箱格式不正确!';
    }
    return data;
}

/**
 * 检测IP地址
 * */
function IP($ip){
    return /^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test($ip);
}

/**
 * 过滤用户名
 * */
function user_name($name){
    return /^[\w]{3,20}$/.test($name);
}

/**
 * 过滤密码
 * */
function password($password){
    var data = {
        status : 1,
        info   : ''
    };
    if(!/^[a-z0-9_-]{6,18}$/.test($password)){
        data.status = 0;
        data.info   = '密码格式不正确!';
    }
    return data;
}

/* 提交时的总检验 */
function ajax_submit($obj,index){
    var status = true;
    $obj.find('.detection-name[index="0"],.detection-name[index="'+index+'"]').each(function(){
        var name = $(this).val();
        var data = empty(name,0,20);
        if(data.status == 0){
            $(this).css('color','#EB2626');
            $(this).parent().find('.tips1 span').html(data.info);
            status = false;
        }else{
            $(this).parent().find('.tips1 span').html('');
        }
    });
    $obj.find('.detection-password[index="0"],.detection-password[index="'+index+'"]').each(function(){
        var name = $(this).val();
        var data = password(name);
        if(data.status == 0){
            $(this).css('color','#EB2626');
            $(this).parent().find('.tips1 span').html(data.info);
            status = false;
        }
    });
    $obj.find('.detection-email[index="0"],.detection-email[index="'+index+'"]').each(function(){
        var name = $(this).val();
        var data = email(name);
        if(data.status == 0){
            $(this).css('color','#EB2626');
            $(this).parent().find('.tips1 span').html(data.info);
            status = false;
        }
    });
    return status;
}
