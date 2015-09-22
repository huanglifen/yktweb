<?php namespace Home\Controller;

use Think\Verify;

class UtilsController {

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
}