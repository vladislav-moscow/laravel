<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    public function getCategories(): array
    {
        return DB::table($this->table)
            ->select("id", "title", "image")->get()->toArray();
    }

    public function getCategoryById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }

    protected $fillable = [
        'title', 'description'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    //relations
    public function news(): hasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
