<?php namespace Home\Controller;

use Common\Controller\BaseController;
use Home\Logic\ContentLogic;
/**
 * 帮助中心控制器
 *
 * @package Home\Controller
 */
class HelpController extends BaseController {
    public $defaultTypeId = 2;
    public $numPerPage = 10;

    /**
     * 显示帮助信息详情
     *
     * @param int $id
     * @param int $city
     */
    public function getDetail($id = 0, $city = self::AREA_SJZ) {
        if(! $id) {
            redirect("/");
        }
        $contentLogic = new ContentLogic();
        $helpType = $contentLogic->getContentTypeByCatAndDefault(ContentLogic::CATEGORY_HELP, 0);
        $this->assign("helpType", $helpType);

        $help = $contentLogic->getHelpInfoById($id);
        $this->assign("help", $help);
        if(empty($help)) {
            redirect('/');
        }

        $helpType = $contentLogic->getContentTypeByCatAndDefault(ContentLogic::CATEGORY_HELP, 0);
        $this->assign("helType", $helpType);

        $this->getCommon($city);
        $this->assign("title_block", '帮助中心');
        $this->showView("helpdetail");
    }

    /**
     * 获取帮助中心列表
     *
     * @param int $city
     * @param int $type
     * @param int $page
     */
    public function getList($city = self::AREA_SJZ, $type = 0, $page = 1) {
        $contentLogic = new ContentLogic();
        $helpType = $contentLogic->getContentTypeByCatAndDefault(ContentLogic::CATEGORY_HELP, 0);
        $this->assign("helpType", $helpType);
        $menus = $contentLogic->getHelpMenu();
        $this->assign("menus", $menus);

        $nowType = array();
        if(! $type && count($helpType)) {
            $nowType = $helpType[0];
            $type = $nowType['id'];
        } else {
            foreach($helpType as $nt) {
                if($nt['id'] == $type) {
                    $nowType = $nt;
                }
            }
        }
        $totalRecords = $contentLogic->countHelpListByType($type);

        $totalPage = ceil($totalRecords/$this->numPerPage);
        $page = intval($page);
        $page = $page ? (($page > $totalPage && $totalPage > 0) ? $totalPage : $page) : 1;
        if($totalPage) {
            $offset = ($page - 1) * $this->numPerPage;
            $lists = $contentLogic->getHelpListByType($type, $offset, $this->numPerPage);
        } else {
            $lists = array();
        }

        $this->assign("totalPage", $totalPage);
        $this->assign("totalRecords", $totalRecords);
        $this->assign("currentPage", $page);
        $this->assign("lists", $lists);
        $this->assign("nowType", $nowType);
        $this->assign("hType", $type);

        $this->getCommon($city);
        $this->assign("title_block", '帮助中心');
        $this->showView("helplist");
    }
}