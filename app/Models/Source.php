<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    protected $fillable = [
        'news_id', 'sender', 'email', 'url'
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class);
    }
}
