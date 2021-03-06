<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

use App\Article;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return view('article/index')->withArticles(Article::all());
    }

    public function create()
    {
        return view('article/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;
        $article->is_available = 1;
        $article->is_active = 1;

        if ($article->save()) {
            Cache::flush();
            return redirect('articles-lists');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function edit($id)
    {
        return view('article/edit')->withArticle(Article::find($id));
    }

    public function show($id)
    {
        return view('article/show')->withArticle(Article::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles,title,'.$id.'|max:255',
            'body' => 'required',
        ]);
        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->is_available = 1;
        $article->is_aCtive = 1;
        if ($article->save()) {
            return redirect('articles-lists');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        Cache::flush();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }

    public function search(Request $request)
    {
//        $builder = Article::query();
//        if($request->has('titlesearch')){
//            $builder->leftjoin('users', 'user_id', '=', 'users.id');
//            $builder->where('title', 'LIKE', "%$request->titlesearch%");
//            $builder->where('user_id', '=', $request->user()->id);
//            $articles = $builder->paginate(6);
//            $articles->appends(['titlesearch' => $request->titlesearch]); // add params to paginate links
//        }
        if ($request->has('contentsearch')) {
            $articles = Article::search($request->contentsearch)->paginate(6);
            $articles->appends(['contentsearch' => $request->contentsearch]); // add params to paginate links
        } else {
            if ($request->has('page')) { // page cached
                if (!Cache::has('articles'.'-'.$request->page)) {
                    $articles = Cache::remember('articles'.'-'.$request->page, '14400', function () {
                        return  Article::paginate(6);
                    });
                } else {
                    $articles = Cache::get('articles'.'-'.$request->page);
                }
            } else {
                if (!Cache::has('articles')) {
                    $articles = Cache::remember('articles', '14400', function () {
                        return  Article::paginate(6);
                    });
                } else {
                    $articles = Cache::get('articles');
                }
            }
        }
        return view('article/search',compact('articles'));
    }

    /**
     * 获取模型的索引数据数组
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body
        ];
    }
}
