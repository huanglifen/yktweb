<?php namespace Home\Logic;
/**
 * 内容逻辑层
 *
 * 内容分为新闻和帮助
 * 帮助信息中默认的信息，如本站声明
 *
 * @package Home\Logic
 */
class ContentLogic extends BaseLogic {
    const CATEGORY_NEWS = 2;
    const CATEGORY_HELP = 1;
    const INDEX_NEWS = 1;
    const DEFAULT_COMPANY = 2;

    /**
     * 获取首页新闻类别
     *
     * @param $category
     * @return mixed
     */
    public function getIndexNewsList($category = self::CATEGORY_NEWS) {
        $news = M("content");
        $newsList = $news->where("category=$category and display=" . self::STATUS_OPEN  . " and site like '%[" . self::INDEX_NEWS ."]%'")->order("sort desc")->field("id,title,created_at")->select();
        return $newsList;
    }

    /**
     * 按类型获取新闻列表
     *
     * @param $type
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public function getNewsListsByType($type, $offset = 0, $limit = self::NUM_PER_PAGE) {
        $news = M("content");
        $newsList = $news->where("category=" . self::CATEGORY_NEWS . " and display=" . self::STATUS_OPEN  . " and type=$type")->order("sort desc,created_at desc")->limit("$offset,$limit")->field("id,title,created_at")->select();
        return $newsList;
    }

    /**
     * 按条件统计新闻纪录
     *
     * @param $type
     * @return mixed
     */
    public function countNewsListsByType($type) {
        $news = M("content");
        $newsList = $news->where("category=" . self::CATEGORY_NEWS . " and display=" . self::STATUS_OPEN  . " and type=$type")->count();
        return $newsList;
    }

    /**
     * 按主键获取新闻
     *
     * @param $id
     * @return mixed
     */
    public function getNewsById($id) {
        $news = M("content");
        return $news->where("category=" . self::CATEGORY_NEWS . " and display=" . self::STATUS_OPEN . " and id = $id")->field("id, title, url, brief, content, cover, source, author, created_at, source, author")->find();
    }

    /**
     * 获取所有新闻类型
     *
     * @return \Model|\Think\Model
     */
    public function getNewsType() {
        $newsType = M("content_type");
        $newsType = $newsType->where("category=" . self::CATEGORY_NEWS )->order("sort desc")->field("id, name")->select();
        return $newsType;
    }

    /**
     * 按主键获取新闻类型或者获取默认新闻类型
     *
     * @param int $id
     * @return \Model|\Think\Model
     */
    public function getNewsTypeByIdOrDefault($id = 0) {
        $newsType = M("content_type");
        $condition = new \stdClass();
        $condition->category = self::CATEGORY_NEWS;
        if($id) {
            $condition->id = $id;
        }
        $newsType = $newsType->where($condition)->order("sort asc")->field("id, name")->find();
        return $newsType;
    }

    /**
     * 获取一条本站声明信息
     *
     * @param $id
     * @param $type
     * @return mixed
     */
    public function getCompanyInfoById($id, $type) {
        $content = M("content");
        return $content->where("category=" . self::CATEGORY_HELP . " and type=" . $type . " and id=$id")->field("id, title, url, brief, content, cover, source, author, created_at, source, author")->find();
    }

    /**
     * 获取本站声明信息列表
     *
     * @param $type
     * @return mixed
     */
    public function getCompanyList($type) {
        $content = M("content");
        return $content->where("category=" . self::CATEGORY_HELP . " and type=" . $type)->field("id, title as name")->select();
    }

    /**
     * 获取本站声明类型
     *
     * @param int $cat
     * @param int $default
     * @return mixed
     */
    public function getContentTypeByCatAndDefault($cat = self::CATEGORY_HELP, $default = self::DEFAULT_COMPANY, $display = self::STATUS_OPEN) {
        $contentType = M("content_type");
        return $contentType->where("category=" . $cat ." and is_default=" . $default . " and display=" . $display )->field("id, name")->select();
    }

    /**
     * 获取帮助中心菜单
     *
     * @return mixed
     */
    public function getHelpMenu() {
        $menus = M("help_menu");
        $menus =  $menus->field("id,name,url,parent_id")->select();
        $menuArr = array();
        foreach($menus as $key => $m) {
            if($m['parent_id'] == 0) {
                $menuArr[$m['id']] = $m;
                unset($menus[$key]);
            }
        }
        foreach($menus as $menu) {
            if(array_key_exists($menu['parent_id'], $menuArr)) {
                $menuArr[$menu['parent_id']]['child'][] = $menu;
            }
        }
        return $menuArr;
    }

    /**
     * 获取一个帮组信息
     *
     * @param $id
     * @return mixed
     */
    public function getHelpInfoById($id) {
        $content = M("content");
        return $content->where("category=" . self::CATEGORY_HELP . " and id=$id")->field("id, title, url, brief, content, cover, source, author, created_at, source, author")->find();
    }

    /**
     * 获取帮助信息列表
     *
     * @param $type
     * @param int $offset
     * @param int $limit
     * @return \Model|\Think\Model
     */
    public function getHelpListByType($type, $offset = 0, $limit = 10) {
        $content = M("content");
        $content = $content->where("category=" . self::CATEGORY_HELP . " and type=$type")->field("id, title");
        if($limit) {
            $content = $content->limit("$offset, $limit")->select();
        }
        return $content;
    }

    /**
     * 统计帮助信息列表
     *
     * @param $type
     * @return \Model|\Think\Model
     */
    public function countHelpListByType($type) {
        $content = M("content");
        $content = $content->where("category=" . self::CATEGORY_HELP . " and type=$type")->count();
        return $content;
    }
}