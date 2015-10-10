<?php namespace Home\Service;

/**
 * 发短信服务接口
 *
 * @package Home\Service
 */
class SendMsgService {
    protected $Cardnum = '';
    protected $smstype = '';
    protected $code = '';

    public function _construct($cardNum, $smsType = 0, $plantFormId = 0) {
        $this->Cardnum = $cardNum;
        $this->smstype = $smsType;
        $this->Plantformid = $plantFormId;
        $this->url = C("INTERFACE_URL")."SendSMS";
    }

    public function sendMsg() {
        $postFields = array(
            'Cardnum' => $this->Cardnum,
            'smstype' => $this->smstype,
            'Plantformid' => C("PLANTFORMID")
        );
        $http = new HttpService($this->url);
        $http->setPost($postFields);
        $http->createCurl();
        $this->code = $http->getResult();
    }

    public function getCode() {
        return $this->code;
    }
}