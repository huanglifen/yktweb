<?php namespace Home\Controller;

use Common\Controller\BaseController;
use Home\Logic\CardLogic;
use Home\Logic\ProductLogic;
use Home\Service\RechargeService;
use Home\Service\SendMsgService;

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
     * @param int $cityId
     */
    public function  Index($type = self::BLUE_CARD, $cityId = self::AREA_SJZ) {
        if(!in_array($type, array(self::BLUE_CARD, self::ORANGE_CARD, self::ETC_CARD, self::CCB_CARD, self::TOUR_CARD))) {
            $type = self::BLUE_CARD;
        }
        $this->getCommon($cityId);
        $productLogic = new ProductLogic();
        $product = $productLogic->getProductByUrl($type);
        if(empty($product)) {
            redirect("/");
        }
        $this->assign("product", $product);
        $this->assign("type", $type);
        $this->assign("pay", 0);

        $view = $this->viewArr[$type];
        $this->showView($view);
    }

    /**
     * 提交在线购卡用户信息
     */
    public function postBuy() {
        if(! IS_POST) {
            $this->fail('', self::RESPONSE_METHOD_ERROR);
        }
        $type = $this->getParam('type');
        $this->getParam('post.IAgree','required|equal:1', 0);
        $address = $this->getParam('post.address','required|maxmb:150');
        $email = $this->getParam('post.email','email');
        $idCard = $this->getParam('post.idcard', 'idcard');
        $mobile = $this->getParam('post.mobile', 'mobile');
        $name = $this->getParam('post.name', 'required|min:2|maxmb:20');
        $price = $this->getParam('post.price', 'required|number');
        $recommender = $this->getParam('recommender', 'max:20');
        $cardFee = $this->getParam('cardFee', 'required|number', 0);
        $productId = $this->getParam('productId', 'required|number');
        $id = $this->getParam('id');

        $this->outputErrorIfExist();

        $cardLogic = new CardLogic();
        $id = $cardLogic->addSaleCard($id, $productId, $address, $email, $idCard, $mobile, $name, $price, $recommender, $cardFee);
        $sesName = "order_id".$type;
        session($sesName, $id);

        $url = 'card/topay?type='.$type;
        $this->ok($url);
    }

    /**
     * 显示购卡预支付页面
     *
     * @param int $type
     * @param int $cityId
     */
    public function toPay($type = self::BLUE_CARD, $cityId= self::AREA_SJZ) {
        $this->getCommon($cityId);
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
        $saleCard = $cardLogic->getSaleCardById(session("order_id".$type));
        $this->assign("saleCard", $saleCard);

        $view = $this->viewArr[$type];
        $this->showView($view);
    }

    /**
     * 发短信
     */
    public function sendMessage() {
        if(! IS_POST) {
            $this->fail('', self::RESPONSE_METHOD_ERROR);
        }
        $mobile = $this->getParam('post.mobile', 'mobile');
        $this->outputErrorIfExist();

        $sendMsg = new SendMsgService($mobile);
        $sendMsg->sendMsg();
        $code = $sendMsg->getCode();
        session("msgCode", $code);
        $this->ok(array());
    }

    /**
     * 获取支付页面
     */
    public function postPayUrl() {
        if(! IS_POST) {
            $this->fail('', self::RESPONSE_METHOD_ERROR);
        }

        $this->getParam('code', 'required|msgCode{error_msg_code_error}');
        $this->getParam('yzCode', 'required|verifyCode{error_verify_code_error}');
        $type = $this->getParam('type', 'required');
        $payType = $this->getParam('payType', '',1);
        $this->outputErrorIfExist();

        $cardLogic = new CardLogic();
        $saleCard = $cardLogic->getSaleCardById(session("order_id".$type));
        if(! $saleCard || $saleCard->status != CardLogic::STATUS_SUBMIT) {
            $this->fail();
        }
        $saleSet = $cardLogic->getSaleCardSet($saleCard->card_fee, $saleCard->recharge_mount);
        if(! $saleSet) {
            $this->fail();
        }
        $unionPay = new PayService('', $saleSet, '', $payType);
        $url = $unionPay->getPayUrl();
        $this->ok($url);
    }

    /**
     * 显示同意获取卡的协议页面
     * @param $cityId
     */
    public function Agree($cityId = self::AREA_SJZ){
        $this->getCommon($cityId);
        $this->showView();
    }

    /**
     * 判断是否存在购买信息，存在则返回购买信息
     */
    public function getBuyInfo() {
        $name = $this->getParam('name', 'required');
        $mobile = $this->getParam('mobile', 'required|mobile');
        $productId = $this->getParam('productId', 'required');

        $this->outputErrorIfExist();

        $card = new CardLogic();
        $result = $card->checkBuyCardExist($name, $mobile, $productId);
        $this->outputFailIfExist($result);
        $this->ok($result);
    }

    public function getRecharge($cityId= self::AREA_SJZ) {
        $this->getCommon($cityId);
        $this->showView('recharge');
    }

    public function rechargeUrl() {
        $cardNum = $this->getParam("get.cardnum", 'required');
        $checkCode = $this->getParam('get.checkCode', 'required');
        $money = $this->getParam('get.money', 'required');
        $rechargeType = $this->getParam('get.rechargeType', '', 1);
        if($this->errorInfo) {
            $last = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : C("BASE_URL");
            redirect($last);
        }

        $money = 1;
        $rechargeService = new RechargeService($cardNum, $money, $checkCode, $rechargeType);
        $rechargeService->request();
        $status = $rechargeService->getStatus();
        if($status == 0) {
            $response = $rechargeService->getUrl();
            echo $response;
        } else {
            $errorMsg = $rechargeService->getMsg();
            $redirect = $_SERVER['HTTP_REFERER'];
            redirect($redirect);
        }
    }

    /**
     * 显示查询交易记录和卡余额页面
     * @param $cityId
     */
    public function getSearch($cityId = self::AREA_SJZ) {
        $this->getCommon($cityId);
        $this->showView('search');
    }

    /**
     * 请求卡交易记录
     */
    public function postSearchRecord() {
        if(! IS_POST) {
            $this->fail('', self::RESPONSE_METHOD_ERROR);
        }
        $cardNo = $this->getParam('post.cardno', 'required');
        $checkCode = $this->getParam('post.checkcode', 'required');
        $this->outputErrorIfExist();

        $cardLogic = new CardLogic();
        $result = $cardLogic->getCardRecord($cardNo, $checkCode);
        $this->outputFailIfExist($result);

        $this->ok($result);
    }

    /**
     * 请求查询卡余额操作
     */
    public function postSearchBalance() {
        if(! IS_POST) {
            $this->fail('', self::RESPONSE_METHOD_ERROR);
        }
        $cardNo = $this->getParam('post.cardno', 'required');
        $checkCode = $this->getParam('post.checkcode', 'required');
        $this->outputErrorIfExist();

        $cardLogic = new CardLogic();
        $result = $cardLogic->getCardBalance($cardNo, $checkCode);
        $this->outputFailIfExist($result);

        $this->ok($result);
    }

    public function notify() {
        echo '充值成功！';
    }
}