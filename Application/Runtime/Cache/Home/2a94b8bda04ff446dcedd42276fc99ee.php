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
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo ($cssUrl); ?>/flash.css">

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
                    <div id="row1">
                        <div class="wal">
                            <div class="indexFlashDiv">
                                <div class="indexFlash">
                                    <ul>
                                        <?php if(is_array($carousels)): $i = 0; $__LIST__ = $carousels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carouseli): $mod = ($i % 2 );++$i;?><li >
                                                <a target="_blank" href="<?php echo ($carouseli["url"]); ?>">
                                                <img alt="" src="<?php echo ($baseUrl); ?>/<?php echo ($carouseli["picture"]); ?>">
                                            </a>
                                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div>
                                <div class="flashBtn">
                                    <ul>
                                        <?php if(is_array($carousels)): $key = 0; $__LIST__ = $carousels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carouseli): $mod = ($key % 2 );++$key; if($key == 1): ?><li style="padding-top: 0px;" class="liNow">
                                                    <img width="44" height="28" alt="" src="<?php echo ($baseUrl); ?>/<?php echo ($carouseli["picture"]); ?>"></li>
                                                <?php else: ?>
                                                    <li style="padding-top: 7px;" class="liNow">
                                                        <img width="44" height="28" alt="" src="<?php echo ($baseUrl); ?>/<?php echo ($carouseli["picture"]); ?>"></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="row2">
                        <div id="zsgun">
                            <div id="gundiv" class="container2">
                                <ul>
                                    <?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($baseUrl); ?>/card/index?type=<?php echo ($pro["url"]); ?>&cityId=<?php echo ($globalCityId); ?>" target="_blank">
                                            <img src="<?php echo ($baseUrl); ?>/<?php echo ($pro["picture"]); ?>" width="207" height="130" /></a>
                                            <p>
                                                <span style="float: left;"><?php echo ($pro["name"]); ?></span> <span style="float: right;">
                                                   <a href="<?php echo ($baseUrl); ?>/card/index?type=<?php echo ($pro["url"]); ?>&cityId=<?php echo ($globalCityId); ?>" target="_blank">

                                                       <?php switch($pro["op_type"]): case "3": ?><img src="<?php echo ($imgUrl); ?>/bd.png" style="margin-top: 7px; width: 91px; height: 26px;" /><?php break;?>
                                                          <?php case "2": ?><img src="<?php echo ($imgUrl); ?>/buy2.png" style="margin-top: 7px; width: 91px; height: 26px;" /><?php break;?>
                                                          <?php default: ?> <img src="<?php echo ($imgUrl); ?>/buy.png" style="margin-top: 7px; width: 91px; height: 26px;" /><?php endswitch;?>

                                                   </a>
                                                </span>
                                            </p>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="row3">
                        <div id="row3_title">
                            <div id="row3_title_img">
                            </div>
                        </div>
                        <div id="row3_list">
                            <ul id="row3_ul">
                                <li>
                                    <div>
                                        <a href="<?php echo ($baseUrl); ?>/card/recharge?cityId=<?php echo ($globalCityId); ?>" target="_blank">
                                            <img id="r3_img1" src="<?php echo ($imgUrl); ?>/127x117图标1.png" alt="在线充值" />
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <a href="<?php echo ($baseUrl); ?>/card/search" target="_blank">
                                            <img id="r3_img2" src="<?php echo ($imgUrl); ?>/117x127图标2.png" alt="mounseenter" />
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <a href="/CLIENT/common/New_CardBind.aspx" target="_blank">
                                            <img id="r3_img3" src="<?php echo ($imgUrl); ?>/117x127图标3.png" alt="通卡绑定" />
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <a href="/CLIENT/common/New_ChongZhiDan.aspx" target="_blank">
                                            <img id="r3_img4" src="<?php echo ($imgUrl); ?>/117x127图标4.png" alt="生活缴费" />
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <a href="/CarInsurance/CIIndex.aspx" target="_blank">
                                            <img id="r3_img5" src="<?php echo ($imgUrl); ?>/117x127图标5.png" alt="车险服务" />
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <a href="/duizhang/New_VipLogin.aspx" target="_blank">
                                            <img id="r3_imgnew" src="<?php echo ($imgUrl); ?>/117x127图标6.png" alt="商户对账" />
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                </div>
            </div>
                    <div id="row5">
                        <div id="row5_left">
                            <div id="row5_title1">
                                <div id="pro_title">
                                </div>
                                <?php if(is_array($businessTypes)): $key = 0; $__LIST__ = $businessTypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$businessType): $mod = ($key % 2 );++$key; if($key == 1): ?><div class="pro_head pro_head_hover pro_type" key="<?php echo ($key); ?>">
                                         <div><?php echo ($businessType["name"]); ?></div>
                                       </div>
                                           <?php else: ?>
                                        <div class="pro_other pro_type" key="<?php echo ($key); ?>">
                                            <div><?php echo ($businessType["name"]); ?></div>
                                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                <div id="pro_more">
                                    <a style="color: Orange;" target="_blank" href="../business/list?cityId=<?php echo ($globalCityId); ?>">更多商户&gt;&gt;
                                    </a>
                                </div>
                            </div>
                            <div id="row5_pro">
                                <?php if(is_array($businessTypes)): $keyPro = 0; $__LIST__ = $businessTypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$businessType): $mod = ($keyPro % 2 );++$keyPro; if($key == 0): ?><div class="store-wrapper show" id="div_p<?php echo ($keyPro); ?>">
                                    <?php else: ?>
                                    <div class="store-wrapper show" id="div_p<?php echo ($keyPro); ?>" style="display:none;"><?php endif; ?>
                                    <div class="left">
                                        <div style="width: 258px">
                                            <a target="_blank" href="<?php echo ($baseUrl); ?>/business/business?bid=<?php echo ($businessType['business'][0]['bid']); ?>&aid=<?php echo ($businessType['business'][0]['id']); ?>&cityId=<?php echo ($globalCityId); ?>"><img width="258" height="191"  id="Img<?php echo ($keyPro); ?>" src="<?php echo ($baseUrl); ?>/<?php echo ($businessType['business'][0]['picture']); ?>"/>
                                            </a>
                                        </div>

                                    </div>

                                    <div class="restaurant right">
                                        <div class="info-title">
                                            <strong>
                                                <?php echo ($businessType["name"]); ?><span class="title02"></span></strong></div>
                                        <ul class="info-list">
                                            <?php if(is_array($businessType["business"])): $i = 0; $__LIST__ = $businessType["business"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$business): $mod = ($i % 2 );++$i;?><li><a title="<?php echo ($business["title"]); ?>" target="_blank" href="<?php echo ($baseUrl); ?>/business/business?bid=<?php echo ($business["bid"]); ?>&aid=<?php echo ($businessType['business'][0]['id']); ?>&cityId=<?php echo ($globalCityId); ?>">
                                                <?php echo ($business["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </div>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>
                        <div id="row5_right">
                            <div id="row5_title2">
                                <div style="float: right; margin-top: 10px;">
                                    <a target="_blank" href="/client/newsshow/moreNews.aspx?city=1&amp;msgtype=01" style="color: Orange;">更多&gt;&gt;</a></div>
                            </div>
                            <div id="row5_news">
                                <div id="news_list">
                                    <ul id="news_ul">
                                        <?php if(is_array($newsList)): $i = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?><li><a title="<?php echo ($news["title"]); ?>" target="_blank" href="<?php echo ($baseUrl); ?>/news/news?city=<?php echo ($globalCityId); ?>&id=<?php echo ($news["id"]); ?>"><span class="date">[
                <?php echo (date("Y-m-d",strtotime($news["created_at"]))); ?>]</span>&nbsp<?php echo ($news["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="row6">
                        <div id="row6_title">
                        </div>
                        <div id="row6_list">
                            <ul id="row6_ul">
                                <?php if(is_array($partners)): $i = 0; $__LIST__ = $partners;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$partner): $mod = ($i % 2 );++$i;?><li>
                                        <div>
                                            <a target="_blank" href="<?php echo ($partner["url"]); ?>">
                                                <img alt="<?php echo ($partner["name"]); ?>" src="<?php echo ($baseUrl); ?>/<?php echo ($partner["picture"]); ?>" class="r6_img">
                                            </a>
                                        </div>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </div>
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

    
    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/scroll.js"></script>
    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/index.js"></script>
    <script>
        var imgUrl = "<?php echo ($imgUrl); ?>";
        $(function() {
            $("body").on("mouseenter", ".pro_type", function() {
                $(".pro_other").removeClass("pro_other_hover");
                if($(this).hasClass("pro_head")) {
                    $(this).addClass("pro_head_hover");
                }else{
                    $(".pro_head").removeClass("pro_head_hover");
                    $(this).addClass("pro_other_hover");
                }
                var key = $(this).attr("key");
                $(".store-wrapper").hide();
                $("#div_p"+key).show();
            });
        })

    </script>

</div>
</body>