<?php
return array(
    'URL_CASE_INSENSITIVE' => true,
    'CSS_URL' => 'public/css',
    'JS_URL' => 'public/js',
    'IMG_URL' => 'public/img',
    'BASE_URL' => 'http://192.192.192.245:81',
    'DATA_URL' => 'data',
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => '192.192.192.145', // 服务器地址
    'DB_NAME' => 'ykt', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'URL_HTML_SUFFIX' => 'html',
    'LANG_SWITCH_ON'     =>     true,    //开启语言包功能
    'LANG_AUTO_DETECT'     =>     true, // 自动侦测语言
    'DEFAULT_LANG'         =>     'zh-cn', // 默认语言
    'LANG_LIST'            =>    'zh-cn', //必须写可允许的语言列表
    'VAR_LANGUAGE'     => 'l', // 默认语言切换变量
    'INTERFACE_URL'    => 'http://shop.966009.com/website/',
    'PLANTFORMID' => 0,

    'URL_ROUTER_ON' => true, //开启路由
    'URL_ROUTE_RULES' => array( //定义路由规则
        'card/buy' => 'Card/postBuy',
        'card/pay' => 'Card/getPay',
        'code' => 'Utils/Code',
        'card/msg' => 'Card/sendMessage',
        'card/search' => 'Card/getSearch',
        'card/record' => 'Card/postSearchRecord',
        'card/balance' => 'Card/postSearchBalance',
        'card/saleinfo' => 'Card/getBuyInfo',
        'card/payurl' => 'Card/postPayUrl',
        'card/recharge' => 'Card/getRecharge',
        'business/business' => 'Business/getBusiness',
        'business/site' => 'Business/getSite',
        'business/list' => 'Business/getList',
        'city' => 'Utils/city',
        'business/search' => 'Business/getSearch',
        'business/sites' => 'Business/getSites',
        'news/news' => 'News/getNews',
        'news/list' => 'News/getList',
        'company/detail' => 'Company/getDetail',
        'help/list' => 'Help/getList',
        'help/detail' => 'Help/getDetail',
    ),
    'MAP_AK'          => 'rGNbe9ttCWhnGExQHUsDWHRi',
);