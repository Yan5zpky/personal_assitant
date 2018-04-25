<?php

namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class QueryListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  QueryExecuted  $event
     * @return void
     */
    public function handle(QueryExecuted $event)
    {
        //
        if($event->sql){
            // 把sql  的日志独立分开
            $log = new Logger('sql');
            $fileName = storage_path('logs/sql/'.date('Y-m-d').'.log');
            $log->pushHandler(new StreamHandler($fileName, Logger::INFO));
            $sql = str_replace("?", "'%s'", $event->sql);
            $sql .= " execute time: ".$event->time."ms ";
            $log->info($sql);
        }
    }
}
