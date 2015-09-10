<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" >
    <title>河北一卡通</title>
    
        <link rel="stylesheet" href="<?php echo ($cssUrl); ?>/common.css" type="text/css"/>
        <link href="http://v3.jiathis.com/code/css/jiathis_share.css" rel="stylesheet" type="text/css">
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo ($cssUrl); ?>/flash.css">

</head>
<body>
<div class="wrap">

    <div class="wrap_header">
        <div class="header_outer">
            <div class="header_logo"></div>
            <div class="city">
                <div class="tip"></div>
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
            <a href="<?php echo ($baseUrl); ?>"><div class="nav_in">河北交通一卡通</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>"><div class="nav_in">淘友网</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>"><div class="nav_in">积分联盟</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>"><div class="nav_in">ETC高速通</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>"><div class="nav_in">京津冀旅游通</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>"><div class="nav_in">商家合作</div></a></div>
    </li>
    <li class="nav_li">
        <div class="nav_block">
            <a href="<?php echo ($baseUrl); ?>"><div class="nav_in">帮助中心</div></a></div>
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
                                        <?php if(is_array($carousel)): $i = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carouseli): $mod = ($i % 2 );++$i;?><li ><a target="_blank" href="<?php echo ($carouseli["url"]); ?>">
                                                <img alt="" src="<?php echo ($baseUrl); ?>/<?php echo ($carouseli["picture"]); ?>">
                                            </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div>
                                <div class="flashBtn">
                                    <ul>
                                        <?php if(is_array($carousel)): $key = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carouseli): $mod = ($key % 2 );++$key; if($key == 1): ?><li style="padding-top: 0px;" class="liNow">
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
                                    <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><li><a href="/CLIENT/common/new_selltk.aspx" target="_blank">
                                            <img src="<?php echo ($baseUrl); ?>/<?php echo ($pro["picture"]); ?>" width="207" height="130" /></a>
                                            <p>
                                                <span style="float: left;"><?php echo ($pro["name"]); ?></span> <span style="float: right;">
                                                   <a href="/CLIENT/common/new_selltk.aspx" target="_blank">

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
                                        <a href="/client/common/New_CZ_Test2.aspx" target="_blank">
                                            <img id="r3_img1" src="<?php echo ($imgUrl); ?>/127x117图标1.png" alt="在线充值" />
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <a href="/CLIENT/common/New_Query.aspx" target="_blank">
                                            <img id="r3_img2" src="<?php echo ($imgUrl); ?>/117x127图标2.png" alt="查询系统" />
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
                                <div id="pro_cyms" style="background-image: url(&quot;../common/new_img/商户促销/未选中/未选中_04.png&quot;);">
                                </div>
                                <div id="pro_xxyl" style="background-image: url(&quot;../common/new_img/商户促销/未选中/商家促销_05.png&quot;);">
                                </div>
                                <div id="pro_qcjy" style="background-image: url(&quot;../common/new_img/商户促销/未选中/商家促销_06.png&quot;);">
                                </div>
                                <div id="pro_zhsc" style="background-image: url(&quot;../common/new_img/商户促销/选中状态/未选中_07.png&quot;);">
                                </div>
                                <div id="pro_more">
                                    <a style="color: Orange;" target="_blank" href="../business/hd_search.aspx?city=1">更多商户&gt;&gt;
                                    </a>
                                </div>
                            </div>
                            <div id="row5_pro">

                                <div class="store-wrapper show" id="div_p1" style="display: none;">

                                    <div class="left">
                                        <div style="width: 258px">
                                            <img width="258" height="191" onclick="imgclick('../../tradeimg/20150821113902799.jpg','../../tradeimg/20150806144727256.jpg','gwbh');" id="Img1" src="http://www.966009.com/tradeimg/20150821113902799.jpg"></div>
                                        <!--代码结束-->
                                    </div>

                                    <div class="restaurant right">
                                        <div class="info-title">
                                            <strong>
                                                餐饮美食<span class="title02"></span></strong></div>
                                        <ul class="info-list">

                                            <li><a title="圣马丁海鲜自助" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=圣马丁海鲜自助">
                                                圣马丁海鲜自助可持河北一卡通消费</a></li>

                                            <li><a title="太空舱烤吧" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=太空舱烤吧">
                                                太空舱烤吧可持河北一卡通消费</a></li>

                                            <li><a title="好利来（谈固店）" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=好利来（谈固店）">
                                                石家庄好利来（谈固店）可持一卡通消费！</a></li>

                                            <li><a title="西贝海鲜汇" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=西贝海鲜汇">
                                                西贝海鲜汇（谈固店）可持河北一卡通消费</a></li>

                                            <li><a title="全聚德（建设店）" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=全聚德（建设店）">
                                                石家庄全聚德（建设店）可持河北一卡通消费！</a></li>

                                            <li><a title="全聚德怀特店" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=全聚德怀特店">
                                                石家庄全聚德（怀特店）可持河北一卡通消费！</a></li>

                                            <li><a title="羊大爷涮肉" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=羊大爷涮肉">
                                                羊大爷涮肉持河北一卡通享9折优惠</a></li>

                                            <li><a title="全聚德和平店" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=全聚德和平店">
                                                石家庄全聚德（和平店）可持河北一卡通消费！</a></li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="store-wrapper" id="div_p2" style="display: none;">
                                    <!--代码开始-->
                                    <div class="left">
                                        <div style="width: 258px">
                                            <img width="258" height="191" onclick="imgclick('../../tradeimg/20150821114309861.jpg','../../tradeimg/20150806145006111.jpg','mscy');" id="mscy" src="http://www.966009.com/tradeimg/20150821114309861.jpg"></div>
                                    </div>

                                    <!--代码结束-->
                                    <div class="restaurant right">
                                        <div class="info-title">
                                            <strong>
                                                休闲娱乐<span class="title02"></span></strong></div>
                                        <ul class="info-list">

                                            <li><a title="白鹿温泉" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=白鹿温泉">
                                                白鹿温泉可持河北一卡通消费享8.3折优惠</a></li>

                                            <li><a title="新闻国际旅行社" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=新闻国际旅行社">
                                                新闻国际旅行社可持河北一卡通消费</a></li>

                                            <li><a title="金棕榈盛世影城" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=金棕榈盛世影城">
                                                金棕榈盛世影城持河北一卡通享7折优惠</a></li>

                                            <li><a title="钱隆KTV(盛世店)" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=钱隆KTV(盛世店)">
                                                钱隆KTV（盛世店）刷河北一卡通乐享会员优惠</a></li>

                                            <li><a title="洪顺曲艺社" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=洪顺曲艺社">
                                                石家庄洪顺曲艺社开通刷河北一卡通消费！</a></li>

                                            <li><a title="金棕榈世纪影城" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=金棕榈世纪影城">
                                                金棕榈世纪影城持河北一卡通享7折优惠</a></li>

                                            <li><a title="想唱就唱（中山店）" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=想唱就唱（中山店）">
                                                石家庄想唱就唱（中山店）可持河北一卡通消费！</a></li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="store-wrapper" id="div_p3" style="display: none;">
                                    <!--代码开始-->
                                    <div class="left">
                                        <div style="width: 258px">
                                            <img width="258" height="191" onclick="imgclick('../../tradeimg/20150821114815852.jpg','../..','mscy');" id="mscy" src="http://www.966009.com/tradeimg/20150821114815852.jpg"></div>
                                    </div>

                                    <!--代码结束-->
                                    <div class="restaurant right">
                                        <div class="info-title">
                                            <strong>
                                                汽车加油<span class="title02"></span></strong></div>
                                        <ul class="info-list">

                                            <li><a title="庞达汽车维修养护" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=庞达汽车维修养护">
                                                庞达汽车维修养护可持河北一卡通消费</a></li>

                                            <li><a title="益通驾校" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=益通驾校">
                                                益通驾校可用河北一卡通消费</a></li>

                                            <li><a title="石家庄党家庄（91）" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=石家庄党家庄（91）">
                                                中石油党家庄加油站（91）可持河北一卡通消费</a></li>

                                            <li><a title="车友之家汽车养护" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=车友之家汽车养护">
                                                车友之家汽车养护可持河北一卡通刷卡消费 </a></li>

                                            <li><a title="汇通路（159）加油站" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=汇通路（159）加油站">
                                                中石油汇通加油站（159）可持河北一卡通消费</a></li>

                                            <li><a title="石家庄裕西" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=石家庄裕西">
                                                中石油裕西加油站（2）可持河北一卡通消费</a></li>

                                            <li><a title="洪8汽车快捷护理" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=洪8汽车快捷护理">
                                                洪8汽车快捷护理可持一卡通消费！</a></li>

                                            <li><a title="建华加油站（147）" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=建华加油站（147）">
                                                中石油建华加油站（147）可持河北一卡通消费</a></li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="store-wrapper" id="div_p4" style="display: block;">
                                    <!--代码开始-->
                                    <div class="left">
                                        <div style="width: 258px">
                                            <img width="258" height="191" onclick="imgclick('../../tradeimg/20150821115036204.jpg','../../tradeimg/20140923145449436.jpg','mscy');" id="mscy" src="http://www.966009.com/tradeimg/20150821115036204.jpg"></div>
                                    </div>

                                    <!--代码结束-->
                                    <div class="restaurant right">
                                        <div class="info-title">
                                            <strong>
                                                综合商场<span class="title02"></span></strong></div>
                                        <ul class="info-list">

                                            <li><a title="国美电器(西里店)" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=国美电器(西里店)">
                                                国美电器(西里店)可持河北一卡通消费</a></li>

                                            <li><a title="北国东尚" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=北国东尚">
                                                北国商城（东尚Mall）可持河北一卡通消费</a></li>

                                            <li><a title="北国超市新石店" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=北国超市新石店">
                                                石家庄北国超市（新石店)可持一卡通消费！</a></li>

                                            <li><a title="先天下购物广场" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=先天下购物广场">
                                                石家庄先天下购物广场可持一卡通消费！</a></li>

                                            <li><a title="新百广场" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=新百广场">
                                                新百广场享刷河北一卡通消费</a></li>

                                            <li><a title="东购" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=东购">
                                                石家庄银座商城（东购店）可持河北一卡通消费！</a></li>

                                            <li><a title="国美电器(华阳店)" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=国美电器(华阳店)">
                                                国美电器(华阳店)可持河北一卡通消费</a></li>

                                            <li><a title="国美电器(谈固店)" target="_blank" href="../business/BusinessShow.aspx?city=1&amp;accname=国美电器(谈固店)">
                                                国美电器(谈固店)可持河北一卡通消费</a></li>

                                        </ul>
                                    </div>
                                </div>

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

                                        <li><a title="高速ETC实现全国25个省区市联" target="_blank" href="../newsshow/ViewNews.aspx?city=1&amp;msgid=2591"><span class="date">[
                2015-09-09]</span>&nbsp;高速ETC实现全国25个省区市联</a></li>

                                        <li><a title="【立减优惠】金秋出游嗨不停！充值" target="_blank" href="../newsshow/ViewNews.aspx?city=1&amp;msgid=2590"><span class="date">[
                2015-09-07]</span>&nbsp;【立减优惠】金秋出游嗨不停！充值</a></li>

                                        <li><a title="金融知识普及月：警惕洗钱陷阱  " target="_blank" href="../newsshow/ViewNews.aspx?city=1&amp;msgid=2570"><span class="date">[
                2015-09-01]</span>&nbsp;金融知识普及月：警惕洗钱陷阱  </a></li>

                                        <li><a title="【车主优惠】9月洗车仅9元，还你" target="_blank" href="../newsshow/ViewNews.aspx?city=1&amp;msgid=2551"><span class="date">[
                2015-08-28]</span>&nbsp;【车主优惠】9月洗车仅9元，还你</a></li>

                                        <li><a title="便捷生活从微信充值开始，非一般的" target="_blank" href="../newsshow/ViewNews.aspx?city=1&amp;msgid=2550"><span class="date">[
                2015-08-26]</span>&nbsp;便捷生活从微信充值开始，非一般的</a></li>

                                        <li><a title="【招贤纳士】虚位以待，期待着你的" target="_blank" href="../newsshow/ViewNews.aspx?city=1&amp;msgid=2530"><span class="date">[
                2015-08-19]</span>&nbsp;【招贤纳士】虚位以待，期待着你的</a></li>

                                        <li><a title="【石家庄车友集结招募第二季】浪漫" target="_blank" href="../newsshow/ViewNews.aspx?city=1&amp;msgid=2512"><span class="date">[
                2015-08-07]</span>&nbsp;【石家庄车友集结招募第二季】浪漫</a></li>

                                        <li><a title="1元洗鞋风暴来袭！你会拒绝吗？" target="_blank" href="../newsshow/ViewNews.aspx?city=1&amp;msgid=2511"><span class="date">[
                2015-08-06]</span>&nbsp;1元洗鞋风暴来袭！你会拒绝吗？</a></li>

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

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.cnpc.com.cn/cn/">
                                            <img alt="中石油" src="http://www.966009.com/tradeimg/20141016161259643.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.sgcc.com.cn/">
                                            <img alt="国家电网" src="http://www.966009.com/tradeimg/20141016161333498.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.xinaogas.com/">
                                            <img alt="新奥燃气" src="http://www.966009.com/tradeimg/20141016161439508.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.yinzuo.cn/shou.asp">
                                            <img alt="银座" src="http://www.966009.com/tradeimg/20141016161609204.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.dodopal.com/">
                                            <img alt="都都宝" src="http://www.966009.com/tradeimg/20141016161418744.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.carrefour.com.cn/">
                                            <img alt="家乐福保龙仓" src="http://www.966009.com/tradeimg/20141016161551899.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.holiland.com.cn/">
                                            <img alt="好利来" src="http://www.966009.com/tradeimg/20141016161509802.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.966009.com/client/newsshow/ViewNews.aspx?city=1&amp;msgid=2210">
                                            <img alt="京津冀旅游通" src="http://www.966009.com/tradeimg/20150325140825129.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://vm.vbopay.com/">
                                            <img alt="广智微营销" src="http://www.966009.com/tradeimg/20150325135826704.png" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.wdds.com.cn/">
                                            <img alt="万达百货" src="http://www.966009.com/tradeimg/20141016155758828.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="http://www.gome.com.cn/">
                                            <img alt="国美电器" src="http://www.966009.com/tradeimg/20141119163514796.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div>
                                        <a target="_blank" href="">
                                            <img alt="北国超市" src="http://www.966009.com/tradeimg/20150325140757138.jpg" class="r6_img">
                                        </a>
                                    </div>
                                </li>

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
                    <a target="_blank" href="http://weibo.com/hebeiyikatong">
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
                        <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=undefined"
                                charset="utf-8"></script>
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
                            var _kxs = document.createElement('script');
                            _kxs.id = 'kx_script';
                            _kxs.async = true;
                            _kxs.setAttribute('cid', 'kx_verify');
                            _kxs.src = ('https:' == document.location.protocol ? 'https://ss.knet.cn' : 'http://rr.knet.cn') + '/static/js/icon3.js?sn=e13111511010043455fmwq000000&tp=icon3';
                            _kxs.setAttribute('size', 0);
                            var _kx = document.getElementById('kx_verify');
                            _kx.parentNode.insertBefore(_kxs, _kx); })();
                    </script>
                </div>
                <div class="copyright_wrap">
                    <div class="copyright">
                        Copyright©2014河北一卡通电子支付服务有限公司
                    </div>
                   <div class="number">
                       <script type="text/javascript">
                           var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                           document.write(decodeURIComponent("%3Cspan id='cnzz_stat_icon_1000205784'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1000205784%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
                        冀ICP备06000578 &nbsp;冀ICP证B2-20130050
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/jquery-1.11.3.min.js" ></script>
    <script type="text/javascript">
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
        });
    </script>

    
    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/scroll.js"></script>
    <script type="text/javascript" src="<?php echo ($jsUrl); ?>/index.js"></script>
    <script>
        var imgUrl = "<?php echo ($imgUrl); ?>";
    </script>

</div>
</body>