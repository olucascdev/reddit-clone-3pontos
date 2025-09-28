<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Subreddit;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        User::factory(10)->create()->each(function ($user): void {

            $subreddit = Subreddit::factory()->create();

            $user->subreddits()->attach($subreddit);

            $extraUsers = User::query()->inRandomOrder()->where('id', '!=', $user->id)->take(4)->get();
            foreach ($extraUsers as $extraUser) {
                $extraUser->subreddits()->attach($subreddit);
            }

            $posts = Post::factory(3)->create([
                'subreddit_id' => $subreddit->id,
                'user_id' => $user->id,
            ]);

            $otherPosts = Post::query()
                ->inRandomOrder()
                ->where('user_id', '!=', $user->id)
                ->take(2)
                ->get();

            foreach ($otherPosts as $post) {
                Comment::factory(2)->create([
                    'user_id' => $user->id,
                    'commentable_id' => $post->id,
                    'commentable_type' => Post::class,
                ]);
            }

            foreach ($posts->random(min(3, $posts->count())) as $post) {
                Vote::factory()->create([
                    'user_id' => $user->id,
                    'votable_id' => $post->id,
                    'votable_type' => Post::class,
                ]);
            }

            $comments = Comment::query()->inRandomOrder()->take(2)->get();
            foreach ($comments as $comment) {
                Vote::factory()->create([
                    'user_id' => $user->id,
                    'votable_id' => $comment->id,
                    'votable_type' => Comment::class,
                ]);
            }
        });
    }
}
