<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Services\CommentService;
use Illuminate\Http\RedirectResponse;

final class CommentController extends Controller
{
    public function __construct(
        private readonly CommentService $commentService
    ) {}

    public function store(StoreCommentRequest $request, Post $post): RedirectResponse
    {
        $comment = $this->commentService->createPostComment(
            post: $post,
            user: auth()->user(),
            content: $request->validated()['content']
        );

        return redirect()->back()
            ->with('success', 'Comentário adicionado!')
            ->fragment('comment-'.$comment->id);
    }

    public function reply(StoreCommentRequest $request, Comment $comment): RedirectResponse
    {
        $reply = $this->commentService->createCommentReply(
            parentComment: $comment,
            user: auth()->user(),
            content: $request->validated()['content']
        );

        return redirect()->back()
            ->with('success', 'Resposta adicionada!')
            ->fragment('comment-'.$reply->id);
    }
}
