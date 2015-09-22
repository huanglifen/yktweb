<?php namespace Common\Controller;

use Home\Logic\CommonLogic;
use Home\Service\UtilsService;
use Think\Controller\RestController;

/**
 * 基类控制器
 *
 * @package Common\Controller
 */
class BaseController extends RestController{
    const RESPONSE_FAIL = 1001;
    const RESPONSE_PARAM_ERROR = 1002;
    const RESPONSE_CHECK_FAIL = 1003;
    const RESPONSE_USER_NOT_LOGIN = 1004;
    const RESPONSE_PRIVILEGE = 1005;
    const RESPONSE_OK = 1000;
    const RESPONSE_METHOD_ERROR = 1006;

    public $errorInfo = array();
    public $data = array();
    /**
     * 显示视图
     *
     * @param string $view
     */
    protected function showView($view = '') {
        $commonLogic = new CommonLogic();
        $webInfo = $commonLogic->getWebInfo();
        $this->assign("webInfo", $webInfo);
        $baseUrl = C("BASE_URL");

        $cssUrl = $baseUrl ."/" . C("CSS_URL");
        $jsUrl = $baseUrl ."/" . C("JS_URL");
        $imgUrl = $baseUrl ."/" . C("IMG_URL");
        $dataUrl = $baseUrl . "/" . C("DATA_URL");

        $this->assign("dataUrl", $dataUrl);
        $this->assign('imgUrl', $imgUrl);
        $this->assign('jsUrl', $jsUrl);
        $this->assign('cssUrl', $cssUrl);
        $this->assign('baseUrl', $baseUrl);
        $this->assign('data', $this->data);
        $this->display($view);
    }

    /**
     * 获取页面公共内容，如站点基本信息，地区
     *
     * @param $cityId
     * @return mixed
     */
    protected function getCommon($cityId) {
        $common = new CommonLogic();

        $area = $common->getCities();
        $this->assign("area", $area);

        $city = $common->getCityById($cityId);
        $this->assign("city", $city);
    }

    protected function fail($status = self::RESPONSE_FAIL, $result='') {
        $this->toJson($result, $status);
        exit;
    }

    protected function ok($result) {
        echo $this->toJson($result, self::RESPONSE_OK);
        exit;
    }

    protected function outputErrorIfExist() {
        if ($this->errorInfo) {
            echo $this->toJson($this->errorInfo, self::RESPONSE_CHECK_FAIL);
            exit;
        }
    }

    protected function toJson($result = '', $status) {
       return json_encode(array('status' => $status, 'result' => $result));
    }

    protected function getParam($value, $ruleString = '', $default = '') {
        $paramValue = I($value, $default, '');
        $target = explode(".", $value);
        if (count($target) == 2) {
            $valueName = $target[1];
        } else {
            $valueName = $value;
        }

        if (!empty($ruleString)) {
            $rules = explode('|', $ruleString);
            if (!count($rules)) {
                return true;
            }
            foreach ($rules as $rule) {
                $method = $rule;
                $msg = '';
                $data = '';

                preg_match('/(.+)\{(.+)\}/', $rule, $matches);
                if (count($matches)) {
                    $method = $matches[1];
                    $msg = $matches[2];
                }
                preg_match('/(.+)\:(.+)/', $method, $matches);
                if (count($matches)) {
                    $method = $matches[1];
                    $data = $matches[2];
                }
                if($msg == '') {
                    $msg = "error_".$method;
                }
                $method = "check" . ucfirst($method);
                if (method_exists($this, $method)) {
                    if($method != 'checkRequired' && !$this->checkRequired($paramValue)) {
                        break;
                    }
                    $result = $this->$method($paramValue, $data);
                    if (!$result) {
                        if($msg) {
                            $this->errorInfo[$valueName] = L($msg, array('data' => $data));
                        }else{
                            $this->errorInfo[$valueName] ='error';
                        }
                        break;
                    }
                }
            }
        }
        return $paramValue;
    }

    protected function checkRequired($paramValue) {
        return strlen(trim($paramValue)) > 0;
    }

    protected function checkMaxmb($paramValue, $max) {
        return mb_strlen($paramValue) <= $max ? true : false;
    }

    protected function checkEmail($paramValue) {
        return preg_match('/^.+\@.+\..+$/', $paramValue);
    }

    protected function checkIdcard($paramValue) {
        $utils = new UtilsService();
        return $utils->isCreditNo($paramValue);
    }
    protected function checkNumber($paramValue) {
        return is_numeric($paramValue) ? true : false;

    }

    protected function checkMax($paramValue, $max) {
        return strlen($paramValue) <= $max ? true : false;
    }

    protected function checkEqual($paramValue, $eq) {
        return $paramValue == $eq ? true : false;
    }

}