<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Category;
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
}
