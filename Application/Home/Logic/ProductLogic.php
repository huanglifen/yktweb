<?php namespace Home\Logic;
/**
 * 产品逻辑层
 *
 * @package Home\Logic
 */
class ProductLogic extends BaseLogic {
    const OP_TYPE_BUY = 1; //在线购买
    const OP_TYPE_RECHARGE = 2; //购买/充值
    const OP_TYPE_BIND = 3; //在线绑定

    /**
     * 获取产品类型
     *
     * @return mixed|\Model|\Think\Model
     */
    public function getProducts() {
        $product = M('product');
        $conditionStr = self::OP_TYPE_BUY ."," . self::OP_TYPE_RECHARGE . "," . self::OP_TYPE_BIND;
        $product = $product->where('op_type in (' . $conditionStr . ')')->field("id, picture, name, op_type")->select();
        return $product;
    }

}