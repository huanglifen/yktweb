<?php namespace Home\Logic;

/**
 * 公共部分逻辑层
 *
 * @package Home\Logic
 */
class CommonLogic extends BaseLogic {
    const PROVINCE_HB = 13;

    /**
     * 获取站点基本信息
     *
     * @return mixed
     */
    public function getWebInfo() {
        $web = M("web");
        $webInfo = $web->limit(1)->field("id, name, site, abbr, filling_number, title, keyword, weibo, describe,head_logo")->select();
        return $webInfo[0];
    }

    /**
     * 获取河北所有市级城市
     *
     * @param $parentId
     * @return mixed
     */
    public function getCities($parentId = self::PROVINCE_HB) {
        $area = M("area");
        return $area->where("parent = " .$parentId )->field("id, name")->select();
    }

    /**
     * 按主键获取城市信息
     *
     * @param $cityId
     * @return mixed
     */
    public function getCityById($cityId) {
        $area = M('area');
        $city = $area->where("id = " . $cityId)->field("id, name")->limit(1)->select();
        return $city[0];
    }

    /**
     * 按城市获取商圈
     *
     * @param $cityId
     * @return mixed
     */
    public function getCircleByCityId($cityId) {
        $circle = M("business_district");
        return $circle->where("city_id=$cityId")->field("id, name")->limit(500)->select();
    }

    /**
     * 获取所有行业
     * @return mixed
     */
    public function getIndustry() {
        $industry = M("industry");
        return $industry->field("id, name")->limit(500)->select();
    }
}