<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\User;
use App\Mail\ArticleNotification;

class AutoArticleNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-article-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        $article = Article::latest()->first();

  

        if ($users->count() > 0) {

            foreach ($users as $user) {

                Mail::to($user)->send(new ArticleNotification($article));

            }

        }

  

        return 0;
    }
}
