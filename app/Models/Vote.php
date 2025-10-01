<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\VoteFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

final class Vote extends Model
{
    /** @use HasFactory<VoteFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'votable_type',
        'votable_id',
        'value',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => '[deleted]',
            'avatar' => null,
        ]);
    }

    public function votable(): MorphTo
    {
        return $this->morphTo();
    }
}
