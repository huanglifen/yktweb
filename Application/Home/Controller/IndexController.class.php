<?php namespace Home\Controller;
use Common\Controller\BaseController;
use Home\Logic\CarouselLogic;
use Home\Logic\ProductLogic;

/**
 * 首页控制器
 *
 * @package Home\Controller
 */
class IndexController extends BaseController {
    /**
     * 首页
     */
    public function index(){
        $carousel = new CarouselLogic();
        $carousel = $carousel->getIndexCarousel();
        $this->assign("carousel", $carousel);

        $product = new ProductLogic();
        $product = $product->getIndexProducts();
        $this->assign("product", $product);

        $this->showView();
    }
}