<?php namespace Home\Logic;

/**
 * 卡操作逻辑层
 *
 * @package Home\Logic
 */
class CardLogic extends BaseLogic {
    const STATUS_SUBMIT = 1; //已提交
    const STATUS_PAYED = 2; //已支付
    const STATUS_DEALING = 3; //处理中
    const STATUS_SUCCESS = 4; //交易成功
    const STATUS_FAIL = 5; //交易失败

    const POST_STATUS_NON_DELIVERY = 1; //未发货
    const POST_STATUS_DELIVERY = 2; //已发货，邮寄中
    const POST_STATUS_RECEIVED = 3; //已收件
    const POST_STATUS_RECALL = 4; //已退货
    const POST_STATUS_RECALLING = 5; //退货中

    /**
     * 增加或者更新一条在线售卡记录
     *
     * @param $id
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
    public function addSaleCard($id, $type, $address, $email, $idCard, $mobile, $name, $price, $recommender, $cardFee) {
        $saleCard = M("sale_card");
        if($id) {
            $sale = $saleCard->where("id=$id and status=".self::STATUS_SUBMIT . " and product_id=$type")->find();
        }
        if(! $id || ! $sale) {
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
        } else {
            $data['customer_name'] = $name;
            $data['tel'] = $mobile;
            $data['card_fee'] = $cardFee;
            $data['recharge_mount'] = $price - $cardFee;
            $data['address'] = $address;
            $data['email'] = $email;
            $data['idcard'] = $idCard;
            $data['product_id'] = $type;
            $data['recommender'] = $recommender;
            $data['updated_at'] = date("Y-m-d H:i:s", time());
            $result = $saleCard->where("id=$id and status=".self::STATUS_SUBMIT . " and product_id=$type")->save($data);
        }

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

    public function getSaleCardSet($cardFee, $rechargeMount) {
        $set = M("sale_card_setting");
        $set = $set->where("card_fee=$cardFee and recharge_mount=$rechargeMount")->field("id")->find();
        return $set ? $set['id'] : 0;
    }

    public function getCardRecord($cardNo, $checkCode) {

    }

    public function getCardBalance($cardNo, $checkCode) {

    }

    public function checkBuyCardExist($name, $mobile, $productId) {
        $saleCard = M("sale_card");
        $saleCard = $saleCard->where("customer_name='$name' and tel='$mobile' and product_id=$productId")->field("id, order_no, customer_name, tel, card_fee, recharge_mount, pay_mount, post_order, delivery, post_status, address, status, idcard, email, product_id, recommender")->find();
        if(! $saleCard) {
            return array('status' => false);
        }
        return array('status' => true, 'result' => $saleCard);
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