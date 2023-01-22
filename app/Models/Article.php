<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'posted_at',
    ];

    /**
     * Get the category associated with the article.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author associated with the article.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()->with(['author', 'category'])->where('title', 'like', '%' . $search . '%')
            ->orWhereHas('category', function (Builder $query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            });
    }
}
