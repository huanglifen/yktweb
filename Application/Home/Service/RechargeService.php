<?php namespace Home\Service;

/**
 * 购卡充值服务接口
 *
 * @package Home\Service
 */
class BuyRechargeService {
    protected $url = "";
    protected $cardNum;
    protected $money;
    protected $checkCode;
    protected $result;
    protected $payType;

    public function __construct($cardNum, $money, $checkCode, $payType) {
        $this->url = C("INTERFACE_URL")."CommonBuyRecharge.aspx";
        $this->cardNum = $cardNum;
        $this->money = $money;
        $this->checkCode = $checkCode;
        $this->payType = $payType;
    }

    /**
     * 获取支付地址
     */
    public function getPayUrl() {
        $postFields = array(
            'cardnum' => $this->Cardnum,
            'money' => $this->money,
            'checkcode' => $this->checkCode,
            'rechargetype' => $this->payType,
            'Plantformid' => C("PLANTFORMID"),
        );
        $http = new HttpService($this->url);
        $http->setPost($postFields);
        $http->createCurl();
        $this->result = $http->getResult();
    }
}

/**
 * 充值服务接口
 *
 * @package Home\Service
 */
class RechargeService {
    protected $url = "";
    protected $cardNum;
    protected $money;
    protected $checkCode;
    protected $result;
    protected $payType;

    public function __construct($cardNum, $money, $checkCode, $payType) {
        $this->url = C("INTERFACE_URL")."CommonRecharge.aspx";
        $this->cardNum = $cardNum;
        $this->money = $money;
        $this->checkCode = $checkCode;
        $this->payType = $payType;
    }

    /**
     * 获取支付地址
     */
    public function request() {
        $postFields = array(
            'cardnum' => $this->cardNum,
            'money' => $this->money,
            'checkcode' => $this->checkCode,
            'rechargetype' => $this->payType,
            'Plantformid' => C("PLANTFORMID"),
        );
        $http = new HttpService($this->url);
        $http->setPost($postFields);
        $http->createCurl();
        $result = $http->getResult();var_dump($result);exit;
        $this->result = json_decode($result, true);
    }

    public function getStatus() {
        return $this->result['result'];
    }

    public function getUrl() {
        return $this->result['paypageurl'];
    }

    public function getMsg() {
        return $this->result['errormsg'];
    }
}

