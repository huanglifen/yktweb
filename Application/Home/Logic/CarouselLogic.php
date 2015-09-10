<?php namespace Home\Logic;
use Home\Model\CarouselModel;

class CarouselLogic extends BaseLogic{
    const TYPE_INDEX = 1; //首页轮播
    const TYPE_ETC = 2; //ETC
    const TYPE_TRAVEL = 3; //旅游

    public function getIndexCarousel() {
        $carousel = new CarouselModel();
        $carousel = $carousel->where('type=' . self::TYPE_INDEX . ' and display=' . self::STATUS_OPEN)->field("id,url,picture,type")->order("sort")->select();
        return $carousel;
    }
}