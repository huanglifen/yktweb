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
    const AREA_SJZ = 1301;
    public $orderBy = array(
        1 => 'created_at',
        2 => 'created_at',
        3 => 'click'
    );
    public $sort = array(
        1 => 'desc',
        2 => 'asc'
    );

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
        if($aid) {
            $onStr = "c.business_id = a.id and c.id=$aid";
        } else {
            $onStr = "c.business_id = a.id";
        }
        $business = $business->alias("a")->where("a.id=$id and a.status = '" . self::STATUS_OPEN . "'")->join("left join business_district b on a.business_district_id = b.id")->join("left join activity c on ($onStr)")->field("c.content, a.name, a.tel, a.phone, a.industry, b.name as circle, a.lat, a.lng, a.address, a.discount, a.description,picture")->find();
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
        $site = $site->where("business_id=$businessId and status='" .self::STATUS_OPEN."'")->field("id, name, address, qq, mobile")->order("sort asc")->select();
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

    /**
     * 按条件获取商户记录
     *
     * @param $name
     * @param $address
     * @param int $cityId
     * @param int $districtId
     * @param int $circleId
     * @param int $industryId
     * @param int $offset
     * @param int $limit
     * @param $orderBy
     * @param $sort
     * @return mixed
     */
    public function getBusinessList($cityId = self::AREA_SJZ, $offset = 0, $limit = 10, $name = '', $address = '', $districtId = 0, $circleId = 0, $industryId = 0, $orderBy = 1, $sort =1 ) {
        $business = M("business");
        $condition = new \stdClass();
        if($name) {
            $condition->name = array("like", "%$name%");
        }
        if($address) {
            $condition->address = array("like", "%$address%");
        }
        if($cityId) {
            $condition->city_id = $cityId;
        }
        if($districtId) {
            $condition->district_id = $districtId;
        }
        if($circleId) {
            $condition->business_district_id = $circleId;
        }
        if($industryId) {
            $condition->industry = "%[$industryId]%";
        }
        $order = $this->orderBy[$orderBy];
        $sort = $this->sort[$sort];

        $business->where($condition);
        $business->limit("$offset,$limit");
        $business->field("id,name, address,picture,tel");
        $business->order("$order $sort");

        $result =  $business->select();
        return $result;
    }

    /**
     * 按条件统计商户记录
     *
     * @param $name
     * @param $address
     * @param int $cityId
     * @param int $districtId
     * @param int $circleId
     * @param int $industryId
     * @return mixed
     */
    public function countBusinessList($cityId = self::AREA_SJZ, $name = '', $address = '', $districtId = 0, $circleId = 0, $industryId = 0 ) {
        $business = M("business");
        $condition = new \stdClass();
        if($name) {
            $condition->name = "%$name%";
        }
        if($address) {
            $condition->address = "%$address%";
        }
        if($cityId) {
            $condition->city_id = $cityId;
        }
        if($districtId) {
            $condition->district_id = $districtId;
        }
        if($circleId) {
            $condition->business_district_id = $circleId;
        }
        if($industryId) {
            $condition->industry = "%[$industryId]%";
        }
        $business->where($condition);
        return $business->count("id");
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

    /**
     * 获取热门商户
     *
     * @param $cityId
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function getHotBusiness($cityId, $offset = 0, $limit = 10) {
        $business = M("business");
        return $business->where("city_id=$cityId and hot=1")->field("id, name")->limit($offset, $limit)->select();
    }

    public function getLastSite($cityId, $offset =0, $limit = 10) {
        $site = M("business_site");
        return $site->where("district_id like '%$cityId%'")->field("id, name")->limit($offset, $limit)->select();
    }

    public function countSites($cityId, $name = '', $address = '', $circleId = 0) {
        $site = M("business_site");
        $condition = new \stdClass();
        if($name) {
            $condition->name = "%$name%";
        }
        if($address) {
            $condition->address = "%$address%";
        }
        if($cityId) {
            $condition->district_id = array("like", "%$cityId%");
        }
        if($circleId) {
            $condition->business_district = $circleId;
        }
        $site->where($condition);
        return $site->count("id");
    }

    public function getSites($cityId, $name = '', $address = '', $circleId = 0, $industryId = 0, $offset = 0 , $limit = 10) {
        $site = M("business_site");
        $condition = new \stdClass();
        if($name) {
            $condition->name = "%$name%";
        }
        if($address) {
            $condition->address = "%$address%";
        }
        if($cityId) {
            $condition->district_id = array("like", "%$cityId%");
        }
        if($circleId) {
            $condition->business_district = $circleId;
        }
        if($industryId) {
            $condition->industry = "%[$industryId]%";
        }
        $site->where($condition);
        $site->limit("$offset, $limit");
        $site->field("id, name, tel, address, discount_type");
        return $site->select();

    }
}