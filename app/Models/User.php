<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ✅ WAJIB pakai ini (bukan attribute)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔥 RELASI

    // One-to-One ke Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // One-to-Many ke Article
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}