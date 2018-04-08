<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Searchable;
    //
    public function index()
    {
        $articles = Article::where('id', '>', 10)->where('id', '<', 20)->orderBy('updated_at', 'desc')->get();

        foreach ($articles as $article) {

            echo $article->title;

        }
    }

    public function hasManyComments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }

    /**
     * 获取模型的索引名称
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'articles_index';
    }
}
