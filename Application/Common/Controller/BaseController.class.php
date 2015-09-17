<?php namespace Common\Controller;

use Home\Logic\CommonLogic;
use Think\Controller\RestController;

/**
 * 基类控制器
 *
 * @package Common\Controller
 */
class BaseController extends RestController{
    public $data = array();

    /**
     * 显示视图
     *
     * @param string $view
     */
    protected function showView($view = '') {
        $baseUrl = C("BASE_URL");

        $cssUrl = $baseUrl ."/" . C("CSS_URL");
        $jsUrl = $baseUrl ."/" . C("JS_URL");
        $imgUrl = $baseUrl ."/" . C("IMG_URL");
        $dataUrl = $baseUrl . "/" . C("DATA_URL");

        $this->assign("dataUrl", $dataUrl);
        $this->assign('imgUrl', $imgUrl);
        $this->assign('jsUrl', $jsUrl);
        $this->assign('cssUrl', $cssUrl);
        $this->assign('baseUrl', $baseUrl);
        $this->assign('data', $this->data);
        $this->display($view);
    }

    /**
     * 获取页面公共内容，如站点基本信息，地区
     *
     * @param $cityId
     * @return mixed
     */
    protected function getCommon($cityId) {
        $common = new CommonLogic();
        $webInfo = $common->getWebInfo();
        $this->assign("webInfo", $webInfo);

        $area = $common->getCities();
        $this->assign("area", $area);

        $city = $common->getCityById($cityId);
        $this->assign("city", $city);
    }

}