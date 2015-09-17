<?php namespace Home\Controller;

use Common\Controller\BaseController;

class CardController extends BaseController {
    const BLUE_CARD = 1;
    const ORANGE_CARD = 2;
    const TRAVEL_CARD = 3;
    const ETC_CARD = 4;
    const CCB_CARD = 5;

    public function index() {
        echo 'index';
    }
    public function  card($type = self::BLUE_CARD) {
        echo 'haha2';
    }

}