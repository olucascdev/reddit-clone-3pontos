<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Services\VoteService;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

final class VoteButton extends Component
{
    public Model $votable;

    public int $currentVote = 0;

    public int $voteCount = 0;

    public function mount(VoteService $voteService): void
    {
        $this->voteCount = $this->votable->votes_sum_value ?? 0;

        if (auth()->check()) {
            $this->currentVote = $voteService->getUserVote(auth()->user(), $this->votable);
        }
    }

    public function vote(int $value, VoteService $voteService)
    {
        if (! auth()->check()) {
            return redirect()->route('register');
        }

        $result = $voteService->toggleVote(
            user: auth()->user(),
            votable: $this->votable,
            value: $value
        );

        $this->currentVote = $result['userVote'];
        $this->voteCount = $result['totalVotes'];

        $this->dispatch('voteUpdated');
        return null;
    }

    public function render(): Factory|View
    {
        return view('livewire.vote-button');
    }
}
