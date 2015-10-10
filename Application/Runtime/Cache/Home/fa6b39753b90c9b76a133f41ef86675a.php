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
            <div style="width: 980px; word-wrap: break-word; border: solid 0px black;">
                <br>
                <h1 style="text-align: center;font-size:20px;margin-bottom:15px;">
                    自助申请协议
                </h1>
                <br>
                <div class="pt_sp">
                    河北一卡通电子支付服务有限公司客户服务协议</div>
                <div class="pt_sp">
                    甲方：河北一卡通卡产品持卡人</div>
                <div class="pt_sp">
                    乙方：河北一卡通电子支付服务有限公司 </div>
                <ul class="pt_ul">
                    <li>根据国家相关法律法规的规定，为维护双方利益，规范双方行为，甲乙双方本着自愿、平的、互利的原则，就河北一卡通卡产品持卡人（以下简称“甲方”）使用河北一卡通电子支付服务有限公司（以下简称“乙方”）河北一卡通虚拟卡业务（以下简称“虚拟卡”）签订如下协议：</li>
                    <li><b>第一条</b> 乙方提供的河北一卡通虚拟卡服务是指甲方向乙方申请并经乙方批准后，在其已持有的一卡通卡（实体卡）账户下建立的虚拟卡，该虚拟卡设定的卡号、生效日期、失效日期、累计交易限额与实体卡一致。甲方通过移动终端、互联网络等向乙方发出支付指令，实现虚拟卡账户下的金额支付。</li>
                    <li><b>第二条</b> 甲方申请使用乙方的虚拟卡相关服务功能无需首先成功申请乙方实体卡产品。可只选择虚拟卡业务，也可后续再申请实体卡。已持有实体卡用户可后续增加虚拟卡业务。
                    </li>
                    <li><b>第三条</b> 甲方可通过移动终端、互联网等渠道申请虚拟卡业务。开通虚拟卡业务之后，甲方可使用虚拟卡卡号、安全校验码、登记手机号码等信息办理乙方的电子支付业务以及第三方公司的无卡支付业务。</li>
                    <li><b>第四条</b> 甲方使用虚拟卡业务办理第三方公司的无卡支付业务，乙方仅验证支付指令中的虚拟卡卡号、安全验证码、登记手机号码获取的验证短信。经验证上述三项要素相符的交易，乙方视为甲方亲自办理，甲方不得要求变更或撤销已经提交的支付指令。甲方应妥善保管虚拟卡卡号、安全校验码、登记手机号码等相关信息，如上述信息被盗或遗失，甲方应及时拨打乙方客户服务热办理相应的注销、变更等手续。</li>
                    <li><b>第五条</b> 甲方使用虚拟卡进行支付，将直接占用甲方申请该虚拟卡时对应的实体卡内的资金，甲方应保证该实体卡的支付能力，并严格遵守支付结算业务的相关法律法规，不得利用网上支付业务服务或账户从事任何欺诈、洗钱、恐怖融资等违反法律、法规、监管规定的行为。如甲方违反上述约定，乙方有权中止或终止虚拟卡业务，因此给乙方造成损失的，甲方应予赔偿。</li>
                    <li><b>第六条</b> 如因甲方实体卡账户或虚拟卡已销户或账户状态不正常（挂失、冻结、逾期）、卡片状态不正常（未激活、挂失、销卡）、余额不足等原因，导致乙方无法履行本协议的，乙方不承担任何责任。</li>
                    <li><b>第七条</b> 甲方已申请的虚拟卡在过期或进行注销后，如虚拟卡未进行过交易，乙方有权在虚拟卡过期或注销后，对乙方的虚拟卡卡号进行永久性删除。如甲方所申请的虚拟卡进行过交易，则乙方将在虚拟卡过期或甲方进行注销后，保留虚拟卡卡号180天后再对虚拟卡卡号进行永久性删除。</li>
                    <li><b>第八条</b> 甲方在使用虚拟卡进行支付后，交易金额将在甲方办理虚拟卡时对应的实体卡账户内记账。 </li>
                    <li><b>第九条</b> 甲方与除甲乙双方之外的任何第三方机构之间的交易纠纷与乙方无关。乙方不受理甲方对上述第三方的投诉。</li>
                    <li><b>第十条</b> 乙方可以根据业务发展的需要以及与电子支付商户合作情况增加、删除或变更合作的商户。 </li>
                    <li><b>第十一条</b> 本协议作为甲乙双方已经签署的一卡通卡领用合约及其他既有协议和约定的补充部分而非替代文件，与其具有相同的法律效力。甲方在使用乙方提供的服务时应遵守相关一卡通卡领用合约、章程和已签署的其他所有相关协议及约定。</li>
                    <li><b>第十二条</b> 甲方发现自身未按规定操作，或由于自身其他原因造成支付指令未执行、未适当执行、延迟执行的，应及时通过拨打乙方服务热线或到营业网点通知乙方。乙方应积极调查并告知甲方调查结果。乙方官网、移动终端等服务提供账户余额、交易记录等查询功能，甲方可随时登陆乙方官网、移动终端进行查询。一方发现支付错误或账户款项差错的，应及时与另一方核实处理。</li>
                    <li><b>第十三条</b> 非乙方原因（通讯线路故障、网络故障及断电、停电等）造成电子支付指令未执行、未适当执行、延迟执行的，不属乙方责任，甲方可选择其他途径进行相关支付交易。因不可抗力造成电子支付指令未执行、未适当执行、延迟执行的，各方应采取积极措施防止损失扩大。</li>
                    <li><b>第十四条</b> 乙方应依法对甲方的资料信息、交易记录等保密。除国家法律、行政法规另有规定或甲方授权外，乙方有权拒绝除甲方本人以外的任何单位或个人查询。</li>
                    <li><b>第十五条</b> 甲乙双方在履行本协议的过程中，如发生争议应协商解决，协商不成的，任何一方均可向乙方所在地人民法院提起诉讼。</li>
                    <li><b>第十六条</b> 本协议的成立、生效、履行和解释，均适用于中华人民共和国法律；法律无明文规定的，可适用通行的金融惯例。 </li>
                    <li><b>第十七条</b> 本协议自甲方通过官网、移动终端等渠道同意并经过认证后开通虚拟卡服务之时起生效；本协议自撤销虚拟卡功能服务之时起终止。所有时点均以乙方业务系统记录的时间为准。协议终止并不意味着终止前所发生的未完成交易指令的撤销，也不能消除因终止前的交易所带来的法律后果。</li>
                    <li><b>第十八条</b> 如因系统升级、业务变化，或根据业务发展需要修改本协议，乙方将提前进行公告。若甲方有异议，有权选择注销相关服务，若甲方未注销相关服务或继续接受相关服务，即视为甲方同意并接受该变更或修改，相关业务或规则按变更或修改后的内容执行。</li>
                </ul>
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

    


</div>
</body>