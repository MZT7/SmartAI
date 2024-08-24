<?php

namespace App\Console\Commands;

use App\Events\AutobotCreated;
use App\Models\Autobot;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CreateAutobots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-autobots';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create 500 unique Autobots';

    /**
     * Execute the console command.
     */

    private $usedTitles = [];

    public function handle()
    {
        for ($i = 0; $i < 500; $i++) {
            $this->createAutobot();
        }
        $this->info('500 Autobots created successfully.');
    }

    private function createAutobot()
    {
        $userData = Http::get('https://jsonplaceholder.typicode.com/users/1')->json();
        $autobot = Autobot::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
        ]);
        // dd($autobot);

        event(new AutobotCreated(Autobot::count()));

        for ($i = 0; $i < 10; $i++) {
            $this->createPost($autobot);
        }
    }

    private function createPost($autobot)
    {

        $postData = Http::get('https://jsonplaceholder.typicode.com/posts/1')->json();
        $postExists = Post::where('title', $postData['title'])->exists();
        $title = $postData['title'];
        if ($postExists) {
            $title = Str::random(15);
        }


        $post = Post::create([
            'autobot_id' => $autobot->id,
            'title' => $title,
            'body' => $postData['body'],
        ]);

        for ($i = 0; $i < 10; $i++) {
            $this->createComment($post);
        }
    }

    private function createComment($post)
    {
        $commentData = Http::get('https://jsonplaceholder.typicode.com/comments/1')->json();
        Comment::create([
            'post_id' => $post->id,
            'name' => $commentData['name'],
            'email' => $commentData['email'],
            'body' => $commentData['body'],
        ]);
    }
}
