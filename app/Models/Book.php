<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Review;
use App\Models\Category;
use App\Models\Favourite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'category_id', 'description', 'author', 'book_image', 'publish_at'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function favourites(){
        return $this->hasMany(Favourite::class);
    }

    public function reviewes(){
        return $this->hasMany(Review::class);
    }
}
