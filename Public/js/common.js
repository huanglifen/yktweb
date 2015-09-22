var RESPONSE_FAIL = 1001;
var RESPONSE_PARAM_ERROR = 1002;
var RESPONSE_CHECK_FAIL = 1003;
var RESPONSE_USER_NOT_LOGIN = 1004;
var RESPONSE_PRIVILEGE = 1005;
var RESPONSE_OK = 1000;
var RESPONSE_METHOD_ERROR = 1006;

var Validate = function() {
    var required = function(obj) {
        if(typeof obj === 'undefined' || obj == null || obj == '' || ! obj) {
            return false;
        }
        return true;
    }

    var maxLength = function(obj, max) {
        return obj.length > max ? false : true;
    }

    var minLength = function(obj, min) {
        return obj.length < min ? false : true;
    }

    var number = function(obj) {
        return $.isNumeric(obj)
    }

    var phone = function(obj) {
        if(Mobile(obj) || HousePhone(obj)) {
            return true;
        }
        return false;
    }

    var mobile = function(obj) {
        var isMob=/^\d{11}$/;
        return isMob.test(obj);
    }
    var housePhone = function(obj) {
        var isPhone = /^([0-9]{3,4}-)?[0-9]{7,8}$/;
        return isPhone.test(obj);
    }

    var email = function(obj) {
        var reg = /^[a-z0-9]+@[a-z0-9]+.[a-z0-9]+$/;
        return reg.test(obj);
    }

    var idCard = function(obj) {
        return IdCardValidate(obj);
    }

    var check = function(obj) {
        var errorNum = 0;
        $.each(obj, function(i, item) {
            $(item.targetError).text("");
            var check = true;
            if(check && item.hasOwnProperty('required')) {
                if(item.required.flag) {
                    check = required(item.target);
                    if(! check){
                        if(item.required.hasOwnProperty('warning')&& item.required.warning == 'alert') {
                            alert(item.required.msg);
                        }else{
                            console.log(item.required.msg);
                            $(item.targetError).text(item.required.msg);
                        }
                        errorNum++;
                    }
                }
            }
            if(check && item.hasOwnProperty('mobile')&&item.target) {
                if(item.mobile.flag) {
                    check = mobile(item.target);
                    if(! check){
                        $(item.targetError).text(item.mobile.msg);
                        errorNum++;
                    }
                }
            }
            if(check && item.hasOwnProperty('maxLength')&&item.target) {
                if(item.maxLength.flag) {
                    check = maxLength(item.target, item.maxLength.max);
                    if(! check){
                        $(item.targetError).text(item.maxLength.msg);
                        errorNum++;
                    }
                }
            }
            if(check && item.hasOwnProperty('minLength')&&item.target) {
                if(item.minLength.flag) {
                    check = minLength(item.target, item.minLength.min);
                    if(! check){
                        $(item.targetError).text(item.minLength.msg);
                        errorNum++;
                    }
                }
            }
            if(check && item.hasOwnProperty('idCard')&&item.target) {
                if(item.idCard.flag) {
                    check = idCard(item.target);
                    if(! check){
                        $(item.targetError).text(item.idCard.msg);
                        errorNum++;
                    }
                }
            }
            if(check && item.hasOwnProperty('email')&&item.target) {
                if(item.email.flag) {
                    check = email(item.target);
                    if(! check){
                        $(item.targetError).text(item.email.msg);
                        errorNum++;
                    }
                }
            }
        });
        return errorNum;
    }
    return {
        validate : function(obj) {
            return check(obj)
        }
    }
}();

var Common = function() {
    var serializeToJson = function(target) {
        var array = $(target).serializeArray();
        var jsonStr = "";
        $.each(array, function(i, item) {
            if(i != 0 ) {
                jsonStr +=",";
            }
            jsonStr += "\""+item.name+"\":\""+item.value+"\"";
        });
        var obj ="{"+jsonStr+"}";
        obj = $.parseJSON(obj);
        return obj;
    }

    var request = function(param, callback) {
        var property = {
            'data' : "",
            "url" : "",
            'dataType' : 'json',
            "type" : 'post'
        };
        $.extend(property, param);
        $.ajax({
            'data' : property.data,
            'url' : property.url,
            'dataType' : property.dataType,
            'type' : property.type,
            'success' : function(obj) {
                callback(obj);
            }
        })
    }
    return {
        toJson : function(target) {
            return serializeToJson(target);
        },
        request : function(param, callback) {
            return request(param, callback);
        }
    }
}();

var Wi = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2, 1 ];    // 加权因子
var ValideCode = [ 1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2 ];            // 身份证验证位值.10代表X
function IdCardValidate(idCard) {
    idCard = trim(idCard.replace(/ /g, ""));               //去掉字符串头尾空格
    if (idCard.length == 15) {
        return isValidityBrithBy15IdCard(idCard);       //进行15位身份证的验证
    } else if (idCard.length == 18) {
        var a_idCard = idCard.split("");                // 得到身份证数组
        if(isValidityBrithBy18IdCard(idCard)&&isTrueValidateCodeBy18IdCard(a_idCard)){   //进行18位身份证的基本验证和第18位的验证
            return true;
        }else {
            return false;
        }
    } else {
        return false;
    }
}
/**
 * 判断身份证号码为18位时最后的验证位是否正确
 * @param a_idCard 身份证号码数组
 * @return
 */
function isTrueValidateCodeBy18IdCard(a_idCard) {
    var sum = 0;                             // 声明加权求和变量
    if (a_idCard[17].toLowerCase() == 'x') {
        a_idCard[17] = 10;                    // 将最后位为x的验证码替换为10方便后续操作
    }
    for ( var i = 0; i < 17; i++) {
        sum += Wi[i] * a_idCard[i];            // 加权求和
    }
    valCodePosition = sum % 11;                // 得到验证码所位置
    if (a_idCard[17] == ValideCode[valCodePosition]) {
        return true;
    } else {
        return false;
    }
}
/**
 * 验证18位数身份证号码中的生日是否是有效生日
 * @param idCard 18位书身份证字符串
 * @return
 */
function isValidityBrithBy18IdCard(idCard18){
    var year =  idCard18.substring(6,10);
    var month = idCard18.substring(10,12);
    var day = idCard18.substring(12,14);
    var temp_date = new Date(year,parseFloat(month)-1,parseFloat(day));
    // 这里用getFullYear()获取年份，避免千年虫问题
    if(temp_date.getFullYear()!=parseFloat(year)
        ||temp_date.getMonth()!=parseFloat(month)-1
        ||temp_date.getDate()!=parseFloat(day)){
        return false;
    }else{
        return true;
    }
}
/**
 * 验证15位数身份证号码中的生日是否是有效生日
 * @param idCard15 15位书身份证字符串
 * @return
 */
function isValidityBrithBy15IdCard(idCard15){
    var year =  idCard15.substring(6,8);
    var month = idCard15.substring(8,10);
    var day = idCard15.substring(10,12);
    var temp_date = new Date(year,parseFloat(month)-1,parseFloat(day));
    // 对于老身份证中的你年龄则不需考虑千年虫问题而使用getYear()方法
    if(temp_date.getYear()!=parseFloat(year)
        ||temp_date.getMonth()!=parseFloat(month)-1
        ||temp_date.getDate()!=parseFloat(day)){
        return false;
    }else{
        return true;
    }
}
//去掉字符串头尾空格
function trim(str) {
    return str.replace(/(^\s*)|(\s*$)/g, "");
}