<?php namespace Home\Logic;
use Home\Model\ProductModel;

class ProductLogic extends BaseLogic {
    const OP_TYPE_BUY = 1; //在线购买
    const OP_TYPE_RECHARGE = 2; //购买/充值
    const OP_TYPE_BIND = 3; //在线绑定

    public function getIndexProducts() {
        $product = new ProductModel();
        $conditionStr = self::OP_TYPE_BUY ."," . self::OP_TYPE_RECHARGE . "," . self::OP_TYPE_BIND;
        $product = $product->where('op_type in (' . $conditionStr . ')')->field("id, picture, name, op_type")->select();
        return $product;
    }

}