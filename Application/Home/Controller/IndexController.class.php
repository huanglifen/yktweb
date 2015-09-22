<?php namespace Home\Controller;

use Common\Controller\BaseController;
use Home\Logic\BusinessLogic;
use Home\Logic\CarouselLogic;
use Home\Logic\NewsLogic;
use Home\Logic\PartnerLogic;
use Home\Logic\ProductLogic;

/**
 * 首页控制器
 *
 * @package Home\Controller
 */
class IndexController extends BaseController {
    const AREA_SJZ  = 1301;

    /**
     * 首页
     */
    public function index( ){
        $cityId = I("get.cityId");
        if(! $cityId) {
            $cityId = self::AREA_SJZ;
        }
        $carousel = new CarouselLogic();
        $carousels = $carousel->getIndexCarousel();
        $this->assign("carousels", $carousels);

        $product = new ProductLogic();
        $products = $product->getProducts();
        $this->assign("products", $products);

        $businessLogic = new BusinessLogic();
        $businessTypes = $businessLogic->getBusinessType();
        $businessTypes =$businessLogic ->getBusinessInfoByBusinessType($businessTypes, $cityId);
        $this->assign("businessTypes", $businessTypes);

        $news = new NewsLogic();
        $newsList = $news->getIndexNewsList($cityId);
        $this->assign("newsList", $newsList);

        $partner = new PartnerLogic();
        $partners = $partner->getPartners();
        $this->assign("partners", $partners);

        $this->getCommon($cityId);

        $this->showView();
    }
}