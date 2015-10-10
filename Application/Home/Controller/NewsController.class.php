<?php namespace Home\Controller;

use Common\Controller\BaseController;
use Home\Logic\ContentLogic;

/**
 * 新闻控制器
 *
 * @package Home\Controller
 */
class NewsController extends BaseController {
    public $defaultTypeId = 2;
    public $numPerPage = 10;

    /**
     * 显示新闻详细信息
     *
     * @param int $id
     * @param int $city
     */
    public function getNews($id = 0, $city = self::AREA_SJZ) {
        if(! $id) {
            redirect("/");
        }
        $contentLogic = new ContentLogic();
        $news = $contentLogic->getNewsById($id);
        $this->assign("news", $news);
        if(empty($news)) {
            redirect('/');
        }

        $newsType = $contentLogic->getNewsType();
        $this->assign("newsType", $newsType);

        $this->getCommon($city);
        $this->assign("title_block", '新闻中心');
        $this->showView("newsdetail");
    }

    /**
     * 获取新闻列表
     *
     * @param int $city
     * @param int $type
     * @param int $page
     */
    public function getList($city = self::AREA_SJZ, $type = 0, $page = 1) {
        $contentLogic = new ContentLogic();
        $newsType = $contentLogic->getNewsType();
        $this->assign("newsType", $newsType);
        if(! $type) {
            $type = $this->defaultTypeId;
        }
        $nowType = array();
        foreach($newsType as $nt) {
            if($nt['id'] == $type) {
                $nowType = $nt;
            }
        }
        $totalRecords = $contentLogic->countNewsListsByType($type);

        $totalPage = ceil($totalRecords/$this->numPerPage);
        $page = intval($page);
        $page = $page ? (($page > $totalPage && $totalPage > 0) ? $totalPage : $page) : 1;
        if($totalPage) {
            $offset = ($page - 1) * $this->numPerPage;
            $lists = $contentLogic->getNewsListsByType($type, $offset, $this->numPerPage);
        } else {
            $lists = array();
        }

        $this->assign("totalPage", $totalPage);
        $this->assign("totalRecords", $totalRecords);
        $this->assign("currentPage", $page);
        $this->assign("lists", $lists);
        $this->assign("nowType", $nowType);
        $this->assign("newType", $type);

        $this->getCommon($city);
        $this->assign("title_block", '新闻中心');
        $this->showView("newslist");
    }
}