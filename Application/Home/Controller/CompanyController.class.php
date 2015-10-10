<?php namespace Home\Controller;

use Common\Controller\BaseController;
use Home\Logic\ContentLogic;

class CompanyController extends BaseController {
    /**
     * 显示详细信息
     *
     * @param int $id
     * @param int $city
     * @param $baseTitle
     */
    public function getDetail($id = 0, $city = self::AREA_SJZ, $baseTitle = '') {
        if(! $id) {
            redirect("/");
        }
        $contentLogic = new ContentLogic();
        $companyType = $contentLogic->getContentTypeByCatAndDefault();
        if(empty($companyType)) {
            redirect('/');
        }
        $companyType = $companyType[0];
        if(! $baseTitle) {
            $baseTitle = $companyType['name'];
        }

        $info = $contentLogic->getCompanyInfoById($id, $companyType['id']);

        $this->assign("info", $info);
        if(empty($info)) {
            redirect('/');
        }

        $companyType = $contentLogic->getCompanyList($companyType['id']);
        $this->assign("companyType", $companyType);

        $this->getCommon($city);
        $this->assign("title_block", $baseTitle);
        $this->showView("Help/companydetail");
    }
}