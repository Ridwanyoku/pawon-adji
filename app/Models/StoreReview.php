<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreReview extends Model
{
    protected $fillable = ['buyer_id', 'rating', 'comment', 'is_approved'];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}