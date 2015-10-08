<?php namespace Home\Controller;

use Common\Controller\BaseController;
use Home\Logic\BusinessLogic;
use Home\Logic\CommonLogic;

/**
 * 商户控制器
 *
 * @package Home\Controller
 */
class BusinessController extends BaseController {
    const NUM_PER_PAGE_LIST = 5;
    const NUM_PER_PAGE_SEARCH = 10;

    /**
     * 显示商户详情页
     *
     * @param $bid
     * @param $aid
     * @param $cityId
     */
    public function getBusiness($bid, $aid = 0, $cityId=self::AREA_SJZ) {
        $business = new BusinessLogic();
        $businessInfo = $business->getBusinessById($bid, $aid);
        if(empty($businessInfo)) {
            redirect("/");
        }
        $businessInfo = $business->getBusinessIndustry($businessInfo);
        $sites = $business->getBusinessSites($bid);

        $this->getCommon($cityId);
        $this->getSearchCommon($cityId, false);
        $this->assign("business", $businessInfo);
        $this->assign("businessSites", $sites);
        $this->showView('businessdetail');
    }

    /**
     * 商户网点
     *
     * @param $id
     * @param int $cityId
     */
    public function getSite($id, $cityId = self::AREA_SJZ) {
        $this->getCommon($cityId);
        $business = new BusinessLogic();
        $lasts = $business->getLastSite($cityId);
        $hots = $business->getHotBusiness($cityId);
        $this->assign("lasts", $lasts);
        $this->assign("hots", $hots);

        $this->getSearchCommon($cityId, false);
        $this->getCommon($cityId);
        $this->showView('businesssite');
    }

    /**
     * 获取商户列表
     *
     * @param $cityId
     * @param $page
     */
    public function getList($cityId = self::AREA_SJZ, $page = 1) {
        $this->getCommon($cityId);
        $this->getSearchCommon($cityId, true);

        $business = new BusinessLogic();

        $total = $business->countBusinessList($cityId);
        $totalPage = ceil($total/self::NUM_PER_PAGE_LIST);

        $page = intval($page) ? intval($page) : 1;
        $page = $page > $totalPage ? $totalPage : $page;

        $offset = ($page - 1) * self::NUM_PER_PAGE_LIST;
        $lists = $business->getBusinessList($cityId, $offset, self::NUM_PER_PAGE_LIST);

        $this->assign("lists", $lists);
        $this->assign("totalRecords", $total);
        $this->assign("totalPage", $totalPage);
        $this->assign("currentPage", $page);

        $this->showView('businesslist');
    }

    /**
     * 查找商户记录
     *
     * @param int $city
     * @param int $page
     */
    public function getSearch($city= self::AREA_SJZ, $page = 1) {
        $name = $this->getParam('get.name');
        $address = $this->getParam('get.address');
        $districtId = $this->getParam('district');
        $circleId = $this->getParam('circle');
        $industry = $this->getParam('industry');
        $orderBy = $this->getParam('get.orderby', '', 1);
        $sort = $this->getParam('get.sort', '', 1);

        $business = new BusinessLogic();
        $total = $business->countBusinessList($city, $name, $address, $districtId, $circleId, $industry);
        $totalPage = ceil($total/self::NUM_PER_PAGE_SEARCH);

        $page = intval($page) ? intval($page) : 1;
        $page = $page > $totalPage ? $totalPage : $page;

        $offset = ($page - 1) * self::NUM_PER_PAGE_SEARCH;
        $lists = $business->getBusinessList($city, $offset, self::NUM_PER_PAGE_SEARCH, $name, $address, $districtId, $circleId, $industry, $orderBy, $sort);

        $this->assign("lists", $lists);
        $this->assign("totalRecords", $total);
        $this->assign("totalPage", $totalPage);
        $this->assign("currentPage", $page);

        $url = $this->getUrl();
        $url = preg_replace("/&{0,1}?page=.*&{0,1}?/","", $url);
        $this->assign("currentUrl", $url);
        $this->getCommon($city);
        $this->getSearchCommon($city, true);
        $this->showView('businesssearch');
    }

    /**
     * 查询商户公共部分
     *
     * @param $cityId
     * @param $tag
     * $tag为true，则显示所有市，为false,则显示主键为cityId的市信息
     */
    protected function getSearchCommon($cityId, $tag) {
        $common = new CommonLogic();
        if($tag) {
            $city = $common->getCities();
        }else {
            $city = array($common->getCityById($cityId));
        }
        $district = $common->getCities($cityId);
        $circles = $common->getCircleByCityId($cityId);
        $industry = $common->getIndustry();

        $this->assign("city", $city);
        $this->assign("cityId", $cityId);
        $this->assign("district", $district);
        $this->assign("circles", $circles);
        $this->assign("industry", $industry);
    }

    /**
     * 查找网点
     *
     * @param int $cityId
     * @param int $page
     */
    public function getSites($cityId = self::AREA_SJZ, $page = 1) {
        $circleId = $this->getParam('get.circle');
        $industryId = $this->getParam('get.industry');
        $name = $this->getParam('get.name');;

        $business = new BusinessLogic();
        $totalRecords = $business->countSites($cityId, $name, '', $circleId, $industryId);

        $totalPage = ceil($totalRecords / self::NUM_PER_PAGE_SEARCH);
        $page = intval($page) ? intval($page) : 1;
        $page = $page > $totalPage ? $totalPage : $page;
        $offset = ($page - 1) * self::NUM_PER_PAGE_SEARCH;

        $lists = $business->getSites($cityId, $name,'', $circleId, $industryId, $offset, self::NUM_PER_PAGE_SEARCH);

        $this->assign("lists", $lists);
        $this->assign("totalRecords", $totalRecords);
        $this->assign("totalPage", $totalPage);
        $this->assign("currentPage", $page);

        $url = $this->getUrl();
        $url = preg_replace("/&{0,1}?page=.*&{0,1}?/","", $url);
        $this->assign("currentUrl", $url);

        $lasts = $business->getLastSite($cityId);
        $this->assign("lasts", $lasts);
        $this->getCommon($cityId);
        $this->getSearchCommon($cityId, false);

        $this->showView('sitelist');
    }
}