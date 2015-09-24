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
                $whereStr = " a.city_id=$cityId and b.status =" .self::STATUS_OPEN . " and b.start_time <= " . $now . " and b.end_time >=".$now . " and a.status = " . self::STATUS_OPEN;
                $whereStr .= " and ( " . $likeStr . ")";
                $type['business'] = $business->alias("a")->where($whereStr)->limit(self::NUM_PER_PROMOTION)->field("a.id as bid, b.title,b.id,a.picture")->join(self::ACTIVITY_TABLE . " b on b.business_id = a.id")->select();
            }
        }
        return $businessTypes;
    }

    /**
     * 获取商户信息
     *
     * @param $id 商户id
     * @param $aid 活动id
     * @return \Model|\Think\Model
     */
    public function getBusinessById($id, $aid) {
        $business = M("business");
        $business = $business->alias("a")->where("a.id=$id and a.status = '" . self::STATUS_OPEN . "'")->join("left join business_district b on a.business_district_id = b.id")->join("left join activity c on (c.business_id = a.id and c.id=$aid)")->field("c.content, a.name, a.tel, a.phone, a.industry, b.name as circle, a.lat, a.lng, a.address, a.discount, a.description,picture")->find();
        return $business;
    }

    /**
     * 按主键获取活动信息
     *
     * @param $id
     * @return mixed
     */
    public function getActivityById($id) {
        $activity = M("activity");
        return $activity->where("id=$id and status = '" .self::STATUS_OPEN ."'")->field("content")->find();
    }

    /**
     * 按商户获取该商户网点
     *
     * @param $businessId
     * @return mixed|\Model|\Think\Model
     */
    public function getBusinessSites($businessId) {
        $site = M("business_site");
        $site = $site->where("business_id=$businessId and status='" .self::STATUS_OPEN."'")->field("")->order("sort asc")->find();
        return $site;
    }

    /**
     * 按主键获取商户网点
     *
     * @param $id
     * @return mixed
     */
    public function getBusinessSiteById($id) {
        $site = M("site");
        return $site->where("id=$id and status = '" .self::STATUS_OPEN. "'")->field("")->find();
    }

    public function getBusinessList() {

    }

    public static function getBusinessIndustry(&$business) {
        $industry = M('industry');
        $industry = $industry->field("id,name")->select();
        $business['industryStr'] = "";
        $flag = false;
        $result = preg_match_all('/\d+/', $business['industry'], $matches);
        if ($result != false) {
            $businessIndustry = $matches[0];
            foreach ($businessIndustry as $bi) {
                foreach ($industry as $i) {
                    if ($i['id'] == $bi) {
                        if ($flag) {
                            $business['industryStr'] .= " / ";
                        } else {
                            $flag = true;
                        }
                        $business['industryStr'] .= $i['name'];
                        break;
                    }
                }
            }
        }
        return $business;
    }
}