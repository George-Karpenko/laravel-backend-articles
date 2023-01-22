<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function fullName()
    {
        return "$this->first_name $this->last_name";
    }

    /**
     * Get the articles for the author.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }


    /**
     * Get the user associated with the author.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
