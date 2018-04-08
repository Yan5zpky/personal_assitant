<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        DB::table('articles')->delete();

        for ($i=35; $i < 10000; $i++) {
            \App\Article::create([
                'title'   => 'Title '.$i,
                'body'    => 'Body '.$i,
                'user_id' => 4,
                'is_available' => 1,
                'is_active' => 1,
            ]);
        }
    }
}
