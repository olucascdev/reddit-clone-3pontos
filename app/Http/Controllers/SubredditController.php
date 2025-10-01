<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Subreddit;
use App\Services\PostService;
use Illuminate\View\View;

final class SubredditController extends Controller
{
    public function __construct(
        private readonly PostService $postService
    ) {}

    public function show(Subreddit $subreddit): View
    {
        $posts = $this->postService->getSubredditPosts($subreddit, perPage: 15);

        $subreddit->loadCount('users')->loadCount('posts');

        return view('subreddit', ['subreddit' => $subreddit, 'posts' => $posts]);
    }
}
