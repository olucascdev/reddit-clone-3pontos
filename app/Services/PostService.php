<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use App\Models\Subreddit;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

final class PostService
{
    public function getHomePosts(int $perPage = 15): LengthAwarePaginator
    {
        return Cache::remember('home_posts', 300, fn() => Post::with(['user', 'subreddit'])
            ->withCount('comments')
            ->withSum('votes', 'value')
            ->latest()
            ->paginate($perPage));
    }

    public function getSubredditPosts(Subreddit $subreddit, int $perPage = 15): LengthAwarePaginator
    {
        return $subreddit->posts()
            ->with(['user'])
            ->withCount('comments')
            ->withSum('votes', 'value')
            ->latest()
            ->paginate($perPage);
    }

    public function getPostWithDetails(Post $post): Post
    {
        return $post->load([
            'user',
            'subreddit',
            'comments' => function ($query): void {
                $query->whereNull('parent_comment_id')
                    ->with(['user', 'replies.user'])
                    ->withCount('replies')
                    ->withSum('votes', 'value')
                    ->latest();
            },
        ])->loadSum('votes', 'value')->loadCount('comments');
    }
}
