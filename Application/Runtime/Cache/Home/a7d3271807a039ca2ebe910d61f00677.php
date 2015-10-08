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
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo ($cssUrl); ?>/business.css">

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
                    <div class="business_left">

                        <div class="right_block_title_1">
<span class="white">查找商户</span>
</div>
<div class="right_block_title_2"></div>
<div class="font01">
    <div class="text_wrap">
     <form id="searchBusiness" action="javascript:;">
    <div class="input">
        <label>商家名称：</label>
        <input type="text" name="name"/>
    </div>
    <div class="input">
        <label>所属行业：</label>
        <select name="industry">
            <option value="0">-所有行业-</option>
            <?php if(is_array($industry)): $i = 0; $__LIST__ = $industry;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><option value="<?php echo ($in['id']); ?>"><?php echo ($in['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="input">
        <label>商家地址：</label>
        <input type="text" name="address"/>
    </div>
    <div class="input">
        <label>选择城市：</label>
        <select name="city" id="cityId" autocomplete="off">
            <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ci): $mod = ($i % 2 );++$i;?><option <?php if($cityId == $ci['id']): ?>selected="selected"<?php endif; ?> value="<?php echo ($ci['id']); ?>"><?php echo ($ci['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="input">
        <label>选择区县：</label>
        <select name="district" id="districtId">
            <option value="0">所有区县</option>
            <?php if(is_array($district)): $i = 0; $__LIST__ = $district;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dis): $mod = ($i % 2 );++$i;?><option value="<?php echo ($dis['id']); ?>"><?php echo ($dis['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="input">
        <label>所属商圈：</label>
        <select name="circle" id="circleId">
            <option value="0">所有商圈</option>
            <?php if(is_array($circles)): $i = 0; $__LIST__ = $circles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cir): $mod = ($i % 2 );++$i;?><option value="<?php echo ($cir['id']); ?>"><?php echo ($cir['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
        <div class="input">
            <div class="sou" id="JsSearchSiteBtn"></div>
        </div>
     </form>
    </div>
</div>
<div class="right_title_bottom">

</div>
                        <div class="mt1">
                        <div class="right_block_title_1">
    <span class="white">商户景区</span>
</div>
<div class="right_block_title_2"></div>
<div class="font01" style="min-height: 200px;">
    <img  style="padding-top:10px;padding-bottom:7px;"width="225" height="225" alt="商户图片" src="<?php echo ($baseUrl); ?>/<?php echo ($business["picture"]); ?>"></div>
<div class="right_title_bottom">
</div>
                        </div>
                        <div class="mt1">
                        <div class="right_block_title_1">
    <span class="white">商户地图</span>
</div>
<div class="right_block_title_2"></div>
<div class="font01" style="min-height: 200px;">
    <div id="allmap" class="span10" style="height: 300px;padding-top:10px;padding-bottom:7px;"></div>

</div>
<div class="right_title_bottom">

</div>
                        </div>
                    </div>
                    <div class="business_right">
                        <div class="business_head">
    <div class="business_pic">
        <img src="<?php echo ($baseUrl); ?>/<?php echo ($business['picture']); ?>" width="70px" height="70px"/>

    </div>
    <div class="business_base">
        <div class="line_base">商户名称：<?php echo ($business['name']); ?></div>
        <div class="line_base">河北一卡通推荐消费商家</div>
        <div class="line_base">被访问次数：</div>
    </div>
    <div class="business_contact oranger">
        <a href="javascript:;" onclick="return alert('功能暂未开通')">我要咨询</a>
        <a href="javascript:;" onclick="return alert('功能暂未开通')">我要反馈</a>
        <a href="javascript:;" onclick="return alert('功能暂未开通')">我要收藏</a>
    </div>
</div>
<div class="business_hr"></div>
<div class="business_detail">
    <div class="business_industry">
<span class="oranger">所属行业：</span><span style="color:#666;margin-left:2px;"> <?php echo ($business['industryStr']); ?></span>
    </div>
    <div class="business_hr dot"></div>
    <div class="business_desc">
        <div class="business_industry">
           <?php if(!$business['discount']): ?><span class="oranger">商家折扣：</span><span style="color:#666;margin-left:2px;"> <?php echo ($business['discount']); ?></span><?php endif; ?>
        </div>
        <div class="business_industry">
                <span class="oranger">详细地址：</span><span style="color:#666;margin-left:2px;"> <?php echo ($business['address']); ?></span>
        </div>
        <div class="business_industry">
                <span class="oranger">联系方式：</span><span style="color:#666;margin-left:2px;"> <?php echo ($business['tel']); ?></span><span style="color:#666;margin-left:2px;"> <?php echo ($business['phone']); ?></span>
        </div>
        <div class="business_industry">
            <?php if($business['content']): ?><span class="oranger">商户简介：</span><span style="color:#666;margin-left:2px;"> <?php echo ($business['content']); ?></span><?php endif; ?>
        </div>
        <div class="title_content">
            <?php echo ($business["description"]); ?>
        </div>
    </div>
</div>

                        <div class="business_foot_hr"></div>
<div class="business_foot_table">
    <table cellspacing="1" cellpadding="0" border="0" bgcolor="#FFFFFF">
        <tr class="head">
            <td height="30" bgcolor="#dcdddd">网点名称</td>
            <td height="30" bgcolor="#dcdddd">位置</td>
            <td height="30" bgcolor="#dcdddd">地址</td>
            <td height="30" bgcolor="#dcdddd">联系方式</td>
            <td height="30" bgcolor="#dcdddd">QQ</td>
        </tr>
        <?php if(is_array($businessSites)): $i = 0; $__LIST__ = $businessSites;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$site): $mod = ($i % 2 );++$i;?><tr class="title_fujia">
                <td  height="30" bgcolor="#EFEFEF" align="center">
                    <a href="<?php echo ($baseUrl); ?>/business/site?id=<?php echo ($site["id"]); ?>&cityId=<?php echo ($globalCityId); ?>" ><?php echo ($site["name"]); ?>
                    </a>
                </td>
                <td  height="30" bgcolor="#EFEFEF" align="center">
                    <a href="<?php echo ($baseUrl); ?>/business/site?id=<?php echo ($site["id"]); ?>&cityId=<?php echo ($globalCityId); ?>" target="_blank">打开地图</a>
                </td>
                <td  height="30" bgcolor="#EFEFEF" align="center"><?php echo ($site["address"]); ?></td>
                <td  height="30" bgcolor="#EFEFEF" align="center" ><?php echo ($site["mobile"]); ?></td>
                <td  height="30" bgcolor="#EFEFEF" align="center"><?php echo ($site["qq"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<div class="business_foot_hr"></div>
                    </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="lat" value="<?php echo ($business["lat"]); ?>"/>
    <input type="hidden" id="lng" value="<?php echo ($business["lng"]); ?>"/>

    

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

    
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=<?php echo C('MAP_AK') ?>" ></script>
    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/common.js"></script>
    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/business.js"></script>
    <script type="text/javascript">
        $(function() {
            var x = $("#lng").val() ;
            var y = $("#lat").val();

            var pointX = x ? x : false;
            var pointY = y ? y : false;
            Common.bindMap(pointX, pointY);

        });

    </script>

</div>
</body>