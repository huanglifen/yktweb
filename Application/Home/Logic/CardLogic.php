<?php namespace Home\Logic;

/**
 * 卡操作逻辑层
 *
 * @package Home\Logic
 */
class CardLogic extends BaseLogic {
    const STATUS_SUBMIT = 1; //已提交
    const STATUS_DEALING = 2; //未支付
    const STATUS_SUCCESS = 3; //交易成功
    const STATUS_FAIL = 4; //交易失败

    const POST_STATUS_NON_DELIVERY = 1; //未发货
    const POST_STATUS_DELIVERY = 2; //已发货，邮寄中
    const POST_STATUS_RECEIVED = 3; //已收件
    const POST_STATUS_RECALL = 4; //已退货
    const POST_STATUS_RECALLING = 5; //退货中

    /**
     * 增加一条在线售卡记录
     *
     * @param $type
     * @param $address
     * @param $email
     * @param $idCard
     * @param $mobile
     * @param $name
     * @param $price
     * @param $recommender
     * @param $cardFee
     * @return mixed
     */
    public function addSaleCard($type, $address, $email, $idCard, $mobile, $name, $price, $recommender, $cardFee) {
        $sale = M("sale_card");
        $sale->order_no = $this->generateOrderNo();
        $sale->cardno = '';
        $sale->customer_name = $name;
        $sale->tel = $mobile;
        $sale->card_fee = $cardFee;
        $sale->deposit = 0;
        $sale->recharge_mount = $price - $cardFee;
        $sale->discount = 0;
        $sale->pay_mount = 0;
        $sale->post_order = '';
        $sale->delivery = '';
        $sale->post_status = self::POST_STATUS_NON_DELIVERY;
        $sale->address = $address;
        $sale->status = self::STATUS_SUBMIT;
        $sale->email = $email;
        $sale->idcard = $idCard;
        $sale->product_id = $type;
        $sale->recommender = $recommender;
        $sale->created_at = date("Y-m-d H:i:s", time());
        $sale->updated_at = date("Y-m-d H:i:s", time());
        $result = $sale->add();
        return $result;
    }

    /**
     * 按主键获取在线售卡记录
     *
     * @param $id
     * @return mixed
     */
    public function getSaleCardById($id) {
        $saleCard = M("sale_card");
        $result = $saleCard->where("id=$id")->field("id, order_no, customer_name, tel, card_fee, recharge_mount, pay_mount, post_order, delivery, post_status, address, status, idcard, email, product_id, recommender")->limit(1)->select();
        return $result[0];
    }

    public function getCardRecode($cardNo, $checkCode) {

    }

    public function getCardBalance($cardNo, $checkCode) {

    }

    /**
     * 生成订单编号
     *
     * @return string
     */
    protected function generateOrderNo() {
        return date("ymdHis") . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }

}