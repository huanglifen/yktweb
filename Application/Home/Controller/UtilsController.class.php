<?php namespace Home\Controller;

use Think\Verify;

class UtilsController {

    public function code() {
        $Verify = new Verify();
        $Verify->fontSize = 30;
        $Verify->length = 4;
        $Verify->useNoise = false;
        $Verify->userCurve = false;
        $Verify->expire = 60;
        $Verify->fontttf = "5.ttf";
        $Verify->useImgBg = true;
        $Verify->entry();
    }
}