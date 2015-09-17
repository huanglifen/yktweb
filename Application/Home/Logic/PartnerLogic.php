<?php namespace Home\Logic;

class PartnerLogic extends BaseLogic {
    /**
     * 获取合作伙伴
     *
     * @return \Model|\Think\Model
     */
    public function getPartners() {
        $partner = M("partner");
        $partner = $partner->where("display=" . self::STATUS_OPEN)->order("sort asc")->field("id,name,picture,url")->select();
        return $partner;
    }
}