<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function store(Request $request){
        $userId =  Auth::user()->id;
        // if (Favourite::where('user_id', $userId)->where('book_id', $request->book_id)->get()) {
        //     return redirect()->back()->with('SUCCESS_MESSAGE', 'Already added favourite list');
        // }else{
            Favourite::create([
                'book_id'=> $request->book_id,
                'user_id'=> $userId,
            ]);
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Favourite added successfully');
        // }
    }

    public function favouriteDelete($id){
        if (Favourite::find($id)->delete()) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Favourite delete successfully');
        }
        return redirect()->back()->with('SUCCESS_MESSAGE', 'Somthing wrong');
    }
}
