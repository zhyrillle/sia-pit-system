<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\BorrowedBook;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Adding the fillable property
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

    // ✅ Relationship: User has many Borrowed Books
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }
}
