<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Post;
use App\Models\Review;
use App\Models\Category;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $data['books'] = Book::all();
        $data['categories'] = Category::all();
        return view('home', $data);
    }

    public function singleBook($id){
        $data['singleBook'] = Book::find($id);
        $userId =  Auth::id();
        $data['categories'] = Category::all();
        $data['favourite'] = Favourite::where('user_id', $userId)->where('book_id', $id)->value('book_id');
        $data['reviewes'] = Review::with(['author'])->where('book_id', $id)->get();
        return view('single_book', $data);
    }

    public function profile(){
        $userId =  Auth::user()->id;
        $data['categories'] = Category::all();
        $data['favourites'] = Favourite::with(['book'])->where('user_id', $userId)->get();
        return view('profile', $data);
    }

    public function categoryBook($id){
        $data['categories'] = Category::all();
        $data['categoryBooks'] = Book::with(['category'])->where('category_id', $id)->get();
        return view('bookList', $data);
    }

    public function search(){
        $data['categories'] = Category::all();
        $search_text = $_GET['query'];
        $data['books'] = Book::where('title', 'LIKE', '%'.$search_text.'%')->get();
        // $books = Book::where('title', 'LIKE', '%'.$search_text.'%')->get();
        // if ($books->count() >= 1) {
            // return response()->json([
            //     'status' => 'no data',
            // ])
        // }else{

        // }

        return view('search', $data);
    }

}
