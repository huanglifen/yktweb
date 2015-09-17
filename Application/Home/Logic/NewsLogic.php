<?php namespace Home\Logic;

class NewsLogic extends BaseLogic {
    const CATEGORY_NEWS = 2;
    const CATEGORY_HELP = 1;
    const INDEX_NEWS = 1;

    public function getIndexNewsList() {
        $news = M("content");
        $newsList = $news->where("category=" . self::CATEGORY_NEWS . " and display=" . self::STATUS_OPEN  . " and site like '%[" . self::INDEX_NEWS ."]%'")->order("sort asc")->field("id,title,created_at")->select();
        return $newsList;
    }
}