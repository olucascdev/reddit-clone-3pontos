<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subreddit;
use App\Services\PostService;
use Illuminate\View\View;

final class PostController extends Controller
{
    public function __construct(
        private readonly PostService $postService
    ) {}

    public function show(Subreddit $subreddit, Post $post): View
    {

        abort_unless($post->subreddit_id === $subreddit->id, 404);

        $post = $this->postService->getPostWithDetails($post);

        return view('post', ['post' => $post, 'subreddit' => $subreddit]);
    }
}
