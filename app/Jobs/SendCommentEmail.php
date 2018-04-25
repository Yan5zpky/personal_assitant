<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

use App\Mail\NewComment;
use App\User;
use App\Comment;

class SendCommentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    protected $comment;

    /**
     * Create a new job instance.
     * @param $user
     * @param $comment
     * @return void
     */
    public function __construct(User $user, Comment $comment)
    {
        //
        $this->user = $user;
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $user = $this->user;
        $email = $user->email;
        $comment = $this->comment;

        Mail::to($email)->queue(new NewComment($comment));
    }
}
