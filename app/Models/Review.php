<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id', 'user_id', 'rating', 'comment',
    ];

    public function book(){
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
