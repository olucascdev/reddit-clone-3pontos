<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final class VoteService
{
    public function toggleVote(User $user, Model $votable, int $value): array
    {
        return DB::transaction(function () use ($user, $votable, $value): array {
            $existingVote = Vote::query()->where([
                'user_id' => $user->id,
                'votable_type' => $votable::class,
                'votable_id' => $votable->id,
            ])->first();

            if ($existingVote) {
                if ($existingVote->value === $value) {
                    $existingVote->delete();
                    $userVote = 0;
                } else {
                    $existingVote->update(['value' => $value]);
                    $userVote = $value;
                }
            } else {
                Vote::query()->create([
                    'user_id' => $user->id,
                    'votable_type' => $votable::class,
                    'votable_id' => $votable->id,
                    'value' => $value,
                ]);
                $userVote = $value;
            }

            $totalVotes = $votable->votes()->sum('value');

            return [
                'userVote' => $userVote,
                'totalVotes' => $totalVotes,
            ];
        });
    }

    public function getUserVote(?User $user, Model $votable): int
    {
        if (!$user instanceof User) {
            return 0;
        }

        return Vote::query()->where([
            'user_id' => $user->id,
            'votable_type' => $votable::class,
            'votable_id' => $votable->id,
        ])->value('value') ?? 0;
    }
}
