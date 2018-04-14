<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Mail\NewComment;
use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Jobs\SendCommentEmail;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        if ($comment = Comment::create($request->all())) {
            $article = Article::findOrFail($request->article_id);
            $user = User::findOrFail($article->user_id);
            $this->dispatch(new SendCommentEmail($user, $comment));
            return redirect()->back();
        } else {
            return redirect()->back()->withInput()->withErrors('评论发表失败！');
        }
    }
    
}
