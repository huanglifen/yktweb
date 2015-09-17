<?php namespace Home\Logic;

/**
 * 商户、商户促销类型逻辑层
 *
 * @package Home\Logic
 */
class BusinessLogic extends BaseLogic {
    const BUSINESS_TYPE_NUM = 4; //首页促销类型显示至多4个
    const NUM_PER_PROMOTION = 8;
    const ACTIVITY_TABLE = 'activity';

    /**
     * 按状态、排序获取促销类型
     *
     * @return \Model|\Think\Model
     */
    public function getBusinessType() {
        $businessType = M('BusinessType');
        $businessType = $businessType->where('status='. self::STATUS_OPEN)->field("id,name,industry")->order("sort asc")->limit(self::BUSINESS_TYPE_NUM)->select();
        return $businessType;
    }

    /**
     * 按促销类型获取商户活动记录
     *
     * @param $businessTypes
     * @param $cityId
     * @return mixed
     */
    public function getBusinessInfoByBusinessType(&$businessTypes, $cityId) {
        $business = M("business");
        foreach($businessTypes as &$type) {
            $industryStr = explode(",", $type['industry']);
            $likeStr = "";
            foreach($industryStr as $key => $value) {
                if(empty($value)) {
                    continue;
                }
                if(! empty($likeStr)) {
                    $likeStr .= " or ";
                }
                $likeStr .= " a.industry like '%" . $value . "%' ";
            }
            if($likeStr) {
                $now = time();
                $whereStr = $likeStr . " and a.status = " . self::STATUS_OPEN;
                $whereStr .= " and a.city_id=$cityId and b.status =" .self::STATUS_OPEN . " and b.start_time <= " . $now . " and b.end_time >=".$now;
                $type['business'] = $business->alias("a")->where($whereStr)->limit(self::NUM_PER_PROMOTION)->field("b.title,b.id,a.picture")->join(self::ACTIVITY_TABLE . " b on b.business_id = a.id")->select();
            }
        }
        return $businessTypes;
    }
}