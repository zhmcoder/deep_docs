<?php


namespace Andruby\DeepDocs\Services;

use Andruby\DeepBlog\Models\Article;
use Andruby\DeepBlog\Models\Category;

/**
 * @method static ArticleService instance()
 *
 * Class ArticleService
 * @package App\Api\Services
 */
class ArticleService
{
    public static function __callStatic($method, $params): ArticleService
    {
        return new self();
    }

    public function menus()
    {
        $pid_list = Category::query()->where('pid', 0)->get();
        $menu_list = [];
        foreach ($pid_list as $pid) {
            $menu['id'] = $pid['id'];
            $menu['title'] = $pid['title'];
            $sub_list = Category::query()->where('pid', $menu['id'])->get();
            $menu['sub_menu'] = [];
            foreach ($sub_list as $sub) {
                $sub_menu['id'] = $sub['id'];
                $sub_menu['title'] = $sub['title'];
                $menu['sub_menu'][] = $sub_menu;
            }
            $menu_list[] = $menu;
        }
        return $menu_list;
    }

    public function galleries()
    {
        $article_list = Article::query()
            ->orderBy('updated_at', 'desc')
            ->limit(6)->whereNotNull('thumb')
            ->get();
        $galleries = [];
        foreach ($article_list as $item) {
            $gallery['id'] = $item['id'];
            $gallery['category'] = rand(0, 1) ? ['id' => 1, 'title' => '美食'] : ['id' => 2, 'title' => '运动'];
            $gallery['updated_time'] = '2022-12-0' . rand(1, 9);
            $gallery['author']['id'] = '1';
            $gallery['author']['name'] = 'Admin';
            $gallery['title'] = $item['title'];
            $gallery['thumb'] = http_path($item['thumb']);
            $galleries[] = $gallery;
        }
        return $galleries;
    }

    public function recentArticles($num = 5)
    {
        $article_list = Article::query()
            ->orderBy('updated_at', 'desc')
            ->limit($num)
            ->get();
        $recents = [];
        foreach ($article_list as $item) {
            $article['id'] = $item['id'];
            $article['category'] = rand(0, 1) ? ['id' => 1, 'title' => '美食'] : ['id' => 2, 'title' => '运动'];
            $article['updated_time'] = '2022-12-0' . rand(1, 9);
            $article['author']['id'] = '1';
            $article['author']['name'] = 'Admin';
            $article['title'] = $item['title'];
            $article['thumb'] = http_path($item['thumb']);
            $recents[] = $article;
        }
        return $recents;
    }

    public function lists($pageIndex = 1, $pageSize = 20)
    {
        $article_list = Article::query()
            ->orderBy('updated_at', 'desc')
            ->with('author')
            ->with('category')
            ->forPage($pageIndex, $pageSize)
            ->get();
        $articles = [];
        foreach ($article_list as $item) {
            $article['id'] = $item['id'];
            $article['category'] = rand(0, 1) ? ['id' => 1, 'title' => '美食'] : ['id' => 2, 'title' => '运动'];
            $article['updated_time'] = date('Y-m-d', strtotime($item['updated_at']));
            $article['author'] = $item['author'];
            $article['title'] = $item['title'];
            $article['summary'] = '想要地道口语?来百度翻译app体验专业发音测评！想要地道口语?来百度翻译app体验专业发音测评！';
            $article['thumb'] = http_path($item['thumb']);
            $articles[] = $article;
            $articles[] = $article;
        }
        return $articles;
    }

    public function cat_lists($cat_id, $pageIndex = 1, $pageSize = 20)
    {
        $article_list = Article::query()
            ->with('author')
            ->where('category_id', $cat_id)
            ->orderBy('updated_at', 'desc')
            ->get();
        $articles = [];
        foreach ($article_list as $item) {
            $article['id'] = $item['id'];
            $article['category'] = rand(0, 1) ? ['id' => 1, 'title' => '美食'] : ['id' => 2, 'title' => '运动'];
            $article['updated_time'] = date('Y-m-d', strtotime($item['updated_at']));
            $article['author'] = $item['author'];
            $article['title'] = $item['title'];
            $article['summary'] = '想要地道口语?来百度翻译app体验专业发音测评！想要地道口语?来百度翻译app体验专业发音测评！';
            $article['thumb'] = http_path($item['thumb']);
            $articles[] = $article;
            $articles[] = $article;
        }
        return $articles;
    }

    public function totalPage($prePage = 15, $cat_id = null)
    {
        if ($cat_id) {
            $total = Article::query()->where('category_id', $cat_id)
                ->count('id');
        } else {
            $total = Article::query()->count('id');
        }

        return $total % $prePage > 0 ? (floor($total / $prePage) + 1) : $total / $prePage;
    }

}