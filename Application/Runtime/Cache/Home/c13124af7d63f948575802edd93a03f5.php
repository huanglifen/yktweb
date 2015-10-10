<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" >
    <meta name="keywords" content="<?php echo ($webInfo['keyword']); ?>">
    <meta name="description" content="<?php echo ($webInfo['describe']); ?>">
    <title><?php echo ($webInfo['name']); ?></title>
    
        <link rel="stylesheet" href="<?php echo ($cssUrl); ?>/common.css" type="text/css"/>
       <!-- <link href="http://v3.jiathis.com/code/css/jiathis_share.css" rel="stylesheet" type="text/css">-->
    
    
<link rel="stylesheet" type="text/css" href="<?php echo ($cssUrl); ?>/card.css"/>

</head>
<body>
<div class="wrap">

    <div class="wrap_header">
        <div class="header_outer">
            <div class="header_logo"></div>
            <div id="city">
                <div class="tip">
                </div>
                <div id="city_list">
                    <span  href="#" class="city_nav" id="city_nav" onclick="this.className=&#39;city_nav city_hover&#39;;document.getElementById('city_link').className='city_link city_hovers'">[<?php echo (str_replace("市","",$globalCity['name'])); ?>]</span></div>
                <div class="city_link" id="city_link">
                    <div class="city_show">
                        <span title="关闭窗口" onclick="document.getElementById('city_nav').className='city_nav';document.getElementById('city_link').className='city_link';return !1;" href="javascript:void(0);" class="f_red f_r">[关闭]</span>
                    </div>
                    <?php if(is_array($globalArea)): $i = 0; $__LIST__ = $globalArea;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$citi): $mod = ($i % 2 );++$i;?><a href="<?php echo ($baseUrl); ?>?cityId=<?php echo ($citi['id']); ?>" class="city_links"><?php echo (str_replace("市","站",$citi['name'])); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="tel_img"></div>
        </div>
    </div>


<div class="navigation">
<div class="nav_outer">
<ul class="nav_ul">
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>"><div class="nav_in">首页</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>" target="_blank"><div class="nav_in">河北交通一卡通</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>" target="_blank"><div class="nav_in">淘友网</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>" target="_blank"><div class="nav_in">积分联盟</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>/card/index?type=4" target="_blank"><div class="nav_in">ETC高速通</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>/card/index?type=3" target="_blank"><div class="nav_in">京津冀旅游通</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>" target="_blank"><div class="nav_in">商家合作</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>/help/list" target="_blank"><div class="nav_in">帮助中心</div></a></div>
    </li>
</ul>
</div>
</div>


    <div id="div_body">
        <div id="body_outer">
            <div id="container">
                <div id="outer">
                    <div class="lang_img">
                        <?php if(!empty($product['pic_describe'])): ?><img alt="" src="<?php echo ($baseUrl); ?>/<?php echo ($product['pic_describe']); ?>">
                            <?php else: ?>
                            <img alt="" src="<?php echo ($imgUrl); ?>/在线购买蓝卡.jpg"><?php endif; ?>
                    </div>
                    <?php if($pay == 1): ?><style>
    .buy_input {
        line-height: 23px;
        clear : both;
    }
</style>
<div class="scent3">
    <div class="buy_left">
        <div class="buy_title">
        </div>
        <div class="buy_info">
            <form id="buyForm" action="javascript:void(0);">
                <input type="hidden" name="type" value="<?php echo ($type); ?>"/>
                <input type="hidden" name="productId" value="<?php echo ($product['id']); ?>"/>
                <div class="buy_input"><div class="buy_label"><label>姓名：</label></div>
                    <?php echo ($saleCard['customer_name']); ?>
                </div>
                <div class="buy_input"><div class="buy_label"><label>身份证号：</label></div>
                    <?php echo ($saleCard['idcard']); ?>
                </div>
                <div class="buy_input"><div class="buy_label"><label>手机号码：</label></div>
                    <span id="mobile"><?php echo ($saleCard['tel']); ?></span>
                </div>
                <div class="buy_input"><div class="buy_label"><label>短信验证：</label></div>
                    <input type="text" class="input_text" name="code">
                    <input type="submit" id="jsGetCode" class="buy_submit"value="免费获取" name="submit">
                </div>
                <div class="buy_input"><div class="buy_label"><label>邮寄地址：</label></div>
                    <?php echo ($saleCard['address']); ?>
                </div>
                <div class="buy_input"><div class="buy_label"><label>电子邮箱：</label></div>
                    <?php echo ($saleCard['email']); ?>
                </div>
                <div class="buy_input"><div class="buy_label"><label>推荐人：</label></div>
                    <?php echo ($saleCard['recommender']); ?>
                </div>
                <div class="buy_input"><div class="buy_label"><label>卡片售价：</label></div>
                    <?php echo ($saleCard['card_fee']); ?>
                </div>
                <div class="buy_input"><div class="buy_label"><label>充值金额：</label></div>
                    <?php echo ($saleCard['recharge_mount']); ?>
                </div>
                <div class="buy_input"><div class="buy_label"><label>验证码：</label></div>
                    <input type="text" class="input_text" name="yzCode">
                    <img src="<?php echo ($baseUrl); ?>/code" class="imgCode"/>
                </div>
                <div class="buy_input"><div class="buy_label"><label>支付方式：</label></div>
                    <input type="radio" checked value="1" name="payType"/><img style="height:28px;width:100px;" src="<?php echo ($baseUrl); ?>/public/img/ylzx.png" >
                </div>
                <div class="buy_input"><div class="buy_label"><label>合计：</label></div>
                    <span class="zhifu_mount"><?php echo ($saleCard['recharge_mount'] + $saleCard['card_fee']); ?></span>元
                </div>

                <div class="buy_input"><div class="buy_checkbox">
                    <input type="submit" id="jsPaySubmit" class="buy_submit"value="支付" name="submit">
                </div>
                </div>
            </form>
        </div>
    </div>
    <?php if($type == Home\Controller\CardController::ORANGE_CARD): ?><div class="cardImg" style="background-image: url('<?php echo ($baseUrl); ?>/public/img/橙卡卡样.png')">
        </div>
        <?php else: ?>
        <div class="cardImg"  style="background-image: url('<?php echo ($baseUrl); ?>/public/img/卡样2.png')">
        </div><?php endif; ?>
</div>
                    <?php else: ?>
                            <div class="scent3">
    <div class="buy_left">
        <div class="buy_title">
        </div>
        <div class="buy_info">
            <form id="buyForm" action="javascript:void(0);">
                <input type="hidden" name="type" value="<?php echo ($type); ?>"/>
                <input type="hidden" name="id" value="0"/>
                <input type="hidden" name="productId" value="<?php echo ($product['id']); ?>"/>
                <div class="buy_input"><div class="buy_label"><label>姓名：</label></div>
                    <input type="text" class="input_text" name="name"> *
                    <span id="nameError" class="buy_tip"></span>
                </div>
                <div class="buy_input"><div class="buy_label"><label>手机号码：</label></div>
                    <input type="text" class="input_text" name="mobile"> *
                    <span id="mobileError" class="buy_tip"></span>
                </div>
                <div class="buy_input"><div class="buy_label"><label>身份证号：</label></div>
                    <input type="text" class="input_text" name="idcard">
                    <span id="idcardError" class="buy_tip"></span>
                </div>
                <div class="buy_input"><div class="buy_label"><label>售价(元)：</label></div>
                    <div class="buy_radio">
                        <input id="radchongzhi_0" type="radio" value="210" name="price" checked data-fee="10">
                        <label for="radchongzhi_0">210(含卡费)</label>
                        <input id="radchongzhi_1" type="radio" value="310" name="price" data-fee="10">
                        <label for="radchongzhi_1">310(含卡费)</label>
                        <input id="radchongzhi_2" type="radio" value="500" name="price" data-fee="0">
                        <label for="radchongzhi_2">500(免卡费)</label>
                        <input id="radchongzhi_3" type="radio" value="800" name="price" data-fee="0">
                        <label for="radchongzhi_3">800(免卡费)</label>
                        <input id="radchongzhi_4" type="radio" value="1000" name="price" data-fee="0">
                        <label for="radchongzhi_4">1000(免卡费)</label>
                        <input type="hidden" name="cardFee" value="10" id="cardFee"/>
                    </div>
                </div>
                <div class="buy_input"><div class="buy_label"><label>邮寄地址：</label></div>
                    <textarea cols="17" name="address"></textarea> *
                    <span id="addressError" class="buy_tip"></span>
                </div>
                <div class="buy_input"><div class="buy_label"><label>电子邮箱：</label></div>
                    <input type="text" class="input_text" name="email">
                    <span id="emailError" class="buy_tip"></span>
                </div>
                <div class="buy_input"><div class="buy_label"><label>推荐人：</label></div>
                    <input type="text" class="input_text" name="recommender">
                    <span id="recommenderError" class="buy_tip"></span>
                </div>
                <div class="buy_input"><div class="buy_checkbox">
                    <input id="ckbIAgree" type="checkbox" value="1" name="IAgree">
                    我已看过并接受 《
                    <a target="_blank" href="/card/agree">用户协议</a>
                    》</div>
                </div>
                <div class="buy_input"><div class="buy_checkbox">
                    <input type="submit" id="jsBuySubmit" class="buy_submit"value="立即购买" name="submit">
                </div>
                </div>
            </form>
        </div>
    </div>
    <?php if($type == Home\Controller\CardController::ORANGE_CARD): ?><div class="cardImg" style="background-image: url('<?php echo ($baseUrl); ?>/public/img/橙卡卡样.png')">
        </div>
        <?php else: ?>
        <div class="cardImg"  style="background-image: url('<?php echo ($baseUrl); ?>/public/img/卡样2.png')">
        </div><?php endif; ?>
</div><?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    

        <div class="subuse" style="width: 270px;">
            <ul style="width: 270px;">
                <li>
                <span class="fr fl_img">
                    <a target="_blank" href="tencent://message/?Uin=1596902006&Site=www.966009.com&Menu=yes">
                        <img src="<?php echo ($imgUrl); ?>/QQ灰.png" alt="QQ 客服" class="out_img" />
                        <img src="<?php echo ($imgUrl); ?>/QQ彩.png" alt="QQ 客服" style="display: none;" class="hover_img" />
                    </a>
                </span>
                <span class="fl" style="width:230px;">
                    <a target="_blank" href="tencent://message/?Uin=1596902006&Site=www.966009.com&Menu=yes">业务咨询</a>
                    <a target="_blank" href="tencent://message/?Uin=3168132243&Site=www.966009.com&Menu=yes">售卡咨询1</a>

                </span>
                </li>
                <li>
                <span class="fr fl_img">
                    <a target="_blank" href="<?php echo ((isset($webInfo['weibo']) && ($webInfo['weibo'] !== ""))?($webInfo['weibo']):'http://weibo.com/hebeiyikatong'); ?>">
                        <img src="<?php echo ($imgUrl); ?>/icon_4.jpg" alt="新浪微博" class="out_img" />
                        <img src="<?php echo ($imgUrl); ?>/icon_44.jpg" alt="新浪微博" style="display: none;" class="hover_img" />
                    </a>
                </span>
                <span class="fl">
                    <a target="_blank" href="http://weibo.com/hebeiyikatong">新浪微博</a>
                </span>

                </li>
                <li>
                <span class="fr fl_img">
                    <a href="#">
                        <img src="<?php echo ($imgUrl); ?>/手机图标灰.png" alt="手机app" class="out_img" />
                        <img src="<?php echo ($imgUrl); ?>/手机图标彩.png" alt="手机app" style="display: none;" class="hover_img" />
                    </a>
                </span>
                <span class="fl no_bg" style="border: none;">
                    <img src="<?php echo ($imgUrl); ?>/APP二维码.png" width='110' alt="手机app" />
                </span>

                </li>
                <li>
                <span class="fr fl_img">
                    <a href="#">
                        <img src="<?php echo ($imgUrl); ?>/分享到灰.png" alt="手机app" class="out_img" />
                        <img src="<?php echo ($imgUrl); ?>/分享到彩.png" alt="手机app" style="display: none;" class="hover_img" />
                    </a>
                </span>
                <span class="fl" style="width: 235px;font-size:12px;">
                <div class="jiathis_style" style="border: none;margin-left:5px;">
                    <div style="float:left;">分享到：</div>
                    <div style="float:left;margin-top:8px;">
                        <a class="jiathis_button_qzone"></a><a class="jiathis_button_tsina"></a><a class="jiathis_button_tqq">
                    </a><a class="jiathis_button_weixin"></a><a class="jiathis_button_kaixin001"></a>
                        <a class="jiathis_button_renren"></a><a class="jiathis_button_tsohu"></a><a class="jiathis_button_douban">
                    </a>
                      <!--  <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=undefined"
                                charset="utf-8"></script>-->
                    </div>
                </div>
                </span>

                </li>
                <li id="wx">
                <span class="fr fl_img">
                    <a href="#">
                    <img src="<?php echo ($imgUrl); ?>/weixin11.png" alt="微信" class="out_img" />
                    <img src="<?php echo ($imgUrl); ?>/weixin1.png" alt="微信" style="display: none;" class="hover_img" />
                    </a>
                </span>
                <span id="wx_sp" class="fl no_bg" style="z-index: 9999; border: none;">
                    <img src="<?php echo ($imgUrl); ?>/微信二维码.png" width='110' alt="微信" />
                </span>
                </li>
                <li id="back-to-top">
                <span class="fr fl_img go_to_top">
                    <a href="">
                        <img src="<?php echo ($imgUrl); ?>/icon_7.jpg" alt="回到顶部" class="out_img" />
                        <img src="<?php echo ($imgUrl); ?>/icon_77.jpg" alt="回到顶部" style="display: none;" class="hover_img" />
                    </a>
                </span>
                    <span class="fl" style="cursor: pointer;">回到顶部</span>
                </li>
            </ul>
        </div>
    

    <div class="clearboth"></div>
    <div class="div_bottom">
        <div class="wrap_bottom">
        <div class="foot_nav">
            <span class="foot_span"><a class="link">公司简介</a></span>
            <span class="foot_span"><a class="link">商户合作</a></span>
            <span class="foot_span"><a class="link">合作伙伴</a></span>
            <span class="foot_span"><a class="link">人才招聘</a></span>
            <span class="foot_span"><a class="link">联系我们</a></span>
            <span class="foot_span"><a class="link">下载APP</a></span>
        </div>
            <div class="foot_agency">
                <div class="agency_img"></div>
                <div  class="mall_img"></div>
            </div>
            <div class="clearboth"></div>
            <div class="verify">
                <div class="verify_wrap">
                    <span id="kx_verify"></span>
                    <script type="text/javascript">
                        (function () {
                            //var _kxs = document.createElement('script');
                           // _kxs.id = 'kx_script';
                            //_kxs.async = true;
                           // _kxs.setAttribute('cid', 'kx_verify');
                           // _kxs.src = ('https:' == document.location.protocol ? 'https://ss.knet.cn' : 'http://rr.knet.cn') + '/static/js/icon3.js?sn=e13111511010043455fmwq000000&tp=icon3';
                            //_kxs.setAttribute('size', 0);
                            //var _kx = document.getElementById('kx_verify');
                           // _kx.parentNode.insertBefore(_kxs, _kx);
                           })();
                    </script>
                </div>
                <div class="copyright_wrap">
                    <div class="copyright">
                        Copyright©2014河北一卡通电子支付服务有限公司
                    </div>
                   <div class="number">
                       <script type="text/javascript">
                         //  var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                          // document.write(decodeURIComponent("%3Cspan id='cnzz_stat_icon_1000205784'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000205784%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
                       </script>
                        <?php echo ((isset($webInfo['filling_number']) && ($webInfo['filling_number'] !== ""))?($webInfo['filling_number']):"冀ICP备06000578 &nbsp;冀ICP证B2-20130050"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/jquery-1.11.3.min.js" ></script>
    <script type="text/javascript">
        var baseUrl = "<?php echo ($baseUrl); ?>";
        $(function () {
            $('body').on("mouseover", ".fl_img", function () {
                $(this).children().children('.out_img').hide();
                $(this).children().children('.hover_img').show();
                $(this).siblings('span.fl').show();
            });
            $('.subuse ul li').on("mouseout", function () {
                $(this).children('.fl_img').children().children('.out_img').show();
                $(this).children('.fl_img').children().siblings('.hover_img').hide();
                $(this).siblings().children('span.fl').hide();
            });

            $("#wx span.fl_img").find(".out_img").hide();
            $("#wx span.fl_img").find(".hover_img").show();
            $("#wx_sp").show();


            $("#back-to-top").click(function () {
                $('body,html').animate({ scrollTop: 0 }, 500);
                return false;
            });
            var headLogo = "<?php echo ($webInfo['head_logo']); ?>";
            if(headLogo) {
                $(".header_logo").css("background-image", "url('"+baseUrl+"/"+headLogo+"')");
            }
        });
    </script>

    
    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/card.js"></script>
    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/common.js"></script>
<script type="text/javascript">
    $(function() {
        $("#jsBuySubmit").on("click", function() {
            if($(this).hasClass("disable")) {
                return false;
            }
            var data = Common.toJson("#buyForm");
            var validate = [
                {
                    'target': data.name,
                    'required': {'flag': true, 'msg': '请输入姓名'},
                    'maxLength': {'flag':true, 'max': 20, 'msg': '不超过20个字符'},
                    'minLength': {'flag':true, 'min': 2, 'msg': '至少2个字符'},
                    'targetError': "#nameError"
                }, {
                    'target': data.mobile,
                    'required': {'flag': true, 'msg': '请输入手机号'},
                    'mobile': {'flag': true, 'msg': '手机号格式不正确'},
                    'targetError': "#mobileError"
                },{
                    'target': data.idcard,
                    'idCard': {'flag': true, 'msg': '身份证格式不正确'},
                    'targetError': "#idcardError"
                },{
                    'target': data.email,
                    'email': {'flag': true, 'msg': '邮箱格式不正确'},
                    'targetError': "#emailError"
                },{
                    'target': data.address,
                    'required': {'flag': true, 'msg': '邮寄地址必填'},
                    'maxLength' : {'flag' : true, 'msg' : '不能超过150个字符', 'max':150},
                    'targetError': "#addressError"
                },{
                    'target': data.recommender,
                    'maxLength': {'flag': true, 'msg': '不能超过20个字符', 'max':20},
                    'targetError': "#recommenderError"
                },{
                    'target': data.IAgree,
                    'required': {'flag': true, 'msg': '本网站只允许协议同意者注册', 'warning' : 'alert'}
                }
            ];
            var errorNum = Validate.validate(validate);
            if(errorNum > 0) {
                return false;
            }else{
                var param = {
                    'url' : baseUrl + "/" + "card/buy",
                    'data' : data
                }
                $(this).addClass("disable");
                Common.request(param, callback);
            }
        })
        var callback = function(obj) {
            $("#jsBuySubmit").removeClass("disable");
            if(obj.status == RESPONSE_OK) {
                window.location.href=baseUrl +"/" + obj.result;
            }else if(obj.status == RESPONSE_CHECK_FAIL) {
                alert('信息填写不正确！');
            }else{
                alert('网络错误，请重试！');
            }
        }
    })
</script>

</div>
</body>