<?php namespace Home\Controller;

use Common\Controller\BaseController;
use Home\Logic\BusinessLogic;

/**
 * 商户控制器
 *
 * @package Home\Controller
 */
class BusinessController extends BaseController {

    /**
     * 显示商户详情页
     *
     * @param $bid
     * @param $aid
     * @param $cityId
     */
    public function getBusiness($bid, $aid, $cityId=self::AREA_SJZ) {
        $business = new BusinessLogic();
        $businessInfo = $business->getBusinessById($bid, $aid);
        if(empty($businessInfo)) {
            redirect("/");
        }
        $businessInfo = $business->getBusinessIndustry($businessInfo);
        $sites = $business->getBusinessSites($bid);

        $this->getCommon($cityId);
        $this->assign("business", $businessInfo);
        $this->assign("sites", $sites);
        $this->showView('businessdetail');
    }

    public function getList($cityId) {

    }

    public function getSites($bid) {

    }

    public function getSite($id) {

    }
}