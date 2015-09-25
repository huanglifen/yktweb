<?php namespace Home\Controller;

use Common\Controller\BaseController;
use Home\Logic\CommonLogic;
use Think\Verify;

class UtilsController extends BaseController{

    /**
     * 生成验证码
     */
    public function code() {
        $Verify = new Verify(array("codeSet" => '1234567890'));
        $Verify->fontSize = 20;
        $Verify->length = 5;
        $Verify->useNoise = true;
        $Verify->userCurve = false;
        $Verify->expire = 120;
        $Verify->fontttf = "5.ttf";
        $Verify->entry();
    }

    /**
     * 按市获取区县
     *
     * @param int $cityId
     */
    public function city($cityId = self::AREA_SJZ) {
        $common = new CommonLogic();
        $district = $common->getCities($cityId);
        $circle = $common->getCircleByCityId($cityId);
        $this->ok(array('district' => $district, 'circle' => $circle));
    }
}