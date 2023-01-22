<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
    ];


    /**
     * Get the articles for the category.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()->where('title', 'like', '%' . $search . '%');
    }
}
