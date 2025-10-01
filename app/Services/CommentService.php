<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class CommentService
{
    public function createPostComment(Post $post, User $user, string $content): Comment
    {
        return DB::transaction(fn() => $post->comments()->create([
            'user_id' => $user->id,
            'content' => $content,
        ]));
    }

    public function createCommentReply(Comment $parentComment, User $user, string $content): Comment
    {
        return DB::transaction(fn() => $parentComment->replies()->create([
            'user_id' => $user->id,
            'content' => $content,
            'commentable_type' => $parentComment->commentable_type,
            'commentable_id' => $parentComment->commentable_id,
        ]));
    }
}
