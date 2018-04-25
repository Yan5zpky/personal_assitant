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
            foreach ($event->bindings as $i => $binding) {
                if ($binding instanceof \DateTime) {
                    $event->bindings[ $i ] = $binding->format('\'Y-m-d H:i:s\'');
                } else {
                    if (is_string($binding)) {
                        $event->bindings[ $i ] = "'$binding'";
                    }
                }
            }
            $boundSql = str_replace(['%', '?'], ['%%', '%s'], $event->sql);
            $boundSql = vsprintf($boundSql, $event->bindings);
            $log->info(
                "TIME - {$event->time}ms\n" .
                "BOUND QUERY: $boundSql;"
            );
        }
    }
}
