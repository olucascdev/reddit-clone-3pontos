<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\View\View;

final class HomeController extends Controller
{
    public function __construct(
        private readonly PostService $postService
    ) {}

    public function index(): View
    {
        $posts = $this->postService->getHomePosts(perPage: 15);

        return view('home', ['posts' => $posts]);
    }
}
