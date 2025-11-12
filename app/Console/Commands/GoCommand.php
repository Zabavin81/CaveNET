<?php

namespace App\Console\Commands;

use App\Http\Resources\Models\Comment;
use App\Http\Resources\Models\Group;
use App\Http\Resources\Models\Image;
use App\Http\Resources\Models\Post;
use App\Http\Resources\Models\Profile;
use App\Http\Resources\Models\Tag;
use App\Http\Resources\Models\View;
use Illuminate\Console\Command;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

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
        $post = Post::InRandomOrder()->first();


        $post->image()->create([
            'path' => fake()->filePath()
        ]);
//        $image = Image::first();
//        dump($image->imageable);


        $post->comments()->create([
            'body' => fake()->sentence(5),
            'profile_id' => 1
        ]);
        $comment = Comment::First();

        $post->likes()->attach(1);

        $post->views()->create([
            'profile_id' => 1
            ]
        );
        $comment->views()->create([
            'profile_id' => 1
        ]);

        $post->files()->create([
            'path' => fake()->filePath()
        ]);
        $profile = Profile::first();

        $profile->views()->create([
            'profile_id' => 1
        ]);

        $profile->tags()->create([
            'title' => fake()->word()
        ]);


        $post->tags()->create([
            'title' => fake()->word()
        ]);

        $group = Group::inRandomOrder()->first();

        $group->tags()->create([
            'title' => fake()->word()
        ]);

      $tag = Tag::first();
        dd($tag->taggable);
    }
}
