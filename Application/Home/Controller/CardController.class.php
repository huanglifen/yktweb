<?php namespace Home\Controller;

use Common\Controller\BaseController;
use Home\Logic\CardLogic;
use Home\Logic\ProductLogic;

class CardController extends BaseController {
    const BLUE_CARD = 1;
    const ORANGE_CARD = 2;
    const TOUR_CARD = 3;
    const ETC_CARD = 4;
    const CCB_CARD = 5;

    public $viewArr = array(
        self::BLUE_CARD => 'buy_common',
        self::ORANGE_CARD => 'buy_common',
        self::TOUR_CARD => 'buy_tour',
        self::ETC_CARD => 'buy_etc',
        self::CCB_CARD => 'buy_ccb'
    );

    /**
     * 显示购卡页面
     *
     * @param int $type
     */
    public function  Index($type = self::BLUE_CARD) {
        if(!in_array($type, array(self::BLUE_CARD, self::ORANGE_CARD, self::ETC_CARD, self::CCB_CARD, self::TOUR_CARD))) {
            $type = self::BLUE_CARD;
        }
        $productLogic = new ProductLogic();
        $product = $productLogic->getProductByUrl($type);
        if(empty($product)) {
            redirect("/");
        }
        $this->assign("product", $product);
        $this->assign("type", $type);
        $this->assign("pay", 0);

        $sesName = "order_id".$type;
        $sesName = "order_id".$type;
        session($sesName, null);
        $view = $this->viewArr[$type];
        $this->showView($view);
    }

    public function toPay($type = self::BLUE_CARD) {
        $sesName = "order_id".$type;
        if(! session($sesName)) {
            redirect("/card/index");
        }

        if(!in_array($type, array(self::BLUE_CARD, self::ORANGE_CARD, self::ETC_CARD, self::CCB_CARD, self::TOUR_CARD))) {
            $type = self::BLUE_CARD;
        }
        $productLogic = new ProductLogic();
        $product = $productLogic->getProductByUrl($type);
        if(empty($product)) {
            redirect("/");
        }

        $this->assign("product", $product);
        $this->assign("type", $type);
        $this->assign("pay", 1);

        $cardLogic = new CardLogic();
        $saleCard = $cardLogic->getSaleCardById(session("order_id"));
        $this->assign("saleCard", $saleCard);

        $view = $this->viewArr[$type];
        $this->showView($view);
    }

    public function getPay() {

    }

    public function postBuy() {
        if(! IS_POST) {
            $this->fail(self::RESPONSE_METHOD_ERROR);
        }
        $type = $this->getParam('type');
        $IAgree = $this->getParam('post.IAgree','required|equal:1', 0);
        $address = $this->getParam('post.address','required|maxmb:150');
        $email = $this->getParam('post.email','email');
        $idCard = $this->getParam('post.idcard', 'idcard');
        $mobile = $this->getParam('post.mobile', 'mobile');
        $name = $this->getParam('post.name', 'required|min:2|maxmb:20');
        $price = $this->getParam('post.price', 'required|number');
        $recommender = $this->getParam('recommender', 'max:20');
        $cardFee = $this->getParam('cardFee', 'required|number', 0);
        $productId = $this->getParam('productId', 'required|number');

        $this->outputErrorIfExist();

        $cardLogic = new CardLogic();
        $id = $cardLogic->addSaleCard($productId, $address, $email, $idCard, $mobile, $name, $price, $recommender, $cardFee);

        $sesName = "order_id".$type;
        session($sesName, $id);
        $url = 'card/topay?type='.$type;
        $this->ok($url);
    }

    public function getMessage() {

    }

    public function postOpenPay() {

    }

    public function Agree(){
        $this->showView();
    }
}