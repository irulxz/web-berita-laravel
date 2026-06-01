<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'content', 'image'];

    // Relasi Many-to-One ke model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi Many-to-One ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}