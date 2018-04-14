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

    /**
     * use mail to inform article author if has new comment
     *
     * @param  Request  $request
     * @param  int  $articleId
     * @return Response
     */
    public function ship(Request $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        // 处理订单...

        Mail::to($request->user())->send(new NewComment($comment));
    }
}
