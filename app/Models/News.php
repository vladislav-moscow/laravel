<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public function getNews():array
    {

        return DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as categoryTitle')
            ->get()
            ->toArray();

    }

    public function getNewsById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }

    protected $fillable = [
        'category_id', 'title', 'status', 'author', 'image', 'description'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function source(): BelongsToMany
    {
        return $this->belongsToMany(Source::class, 'news');
    }
}
