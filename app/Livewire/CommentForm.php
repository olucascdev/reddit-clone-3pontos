<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use App\Models\Comment;
use App\Models\Post;
use App\Services\CommentService;
use Livewire\Component;

final class CommentForm extends Component
{
    public ?Post $post = null;

    public ?Comment $parentComment = null;

    public string $content = '';

    public bool $showForm = false;

    public function submit(CommentService $commentService)
    {
        if (! auth()->check()) {
            return redirect()->route('register');
        }

        $this->validate();

        if ($this->post instanceof Post) {
            $commentService->createPostComment(
                post: $this->post,
                user: auth()->user(),
                content: $this->content
            );
        } elseif ($this->parentComment instanceof Comment) {
            $commentService->createCommentReply(
                parentComment: $this->parentComment,
                user: auth()->user(),
                content: $this->content
            );
        }

        $this->content = '';
        $this->showForm = false;
        $this->dispatch('commentAdded');

        session()->flash('success', 'Comentário adicionado!');
        return null;
    }

    public function toggleForm()
    {
        if (! auth()->check()) {
            return redirect()->route('register');
        }

        $this->showForm = ! $this->showForm;
        return null;
    }

    public function render(): View|Factory
    {
        return view('livewire.comment-form');
    }

    private function rules(): array
    {
        return [
            'content' => 'required|string|min:1|max:10000',
        ];
    }
}
