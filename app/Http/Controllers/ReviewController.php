<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function reviewStore(ReviewRequest $request){
        $userId =  Auth::user()->id;
        $reviewData = $request->validated();
        $reviewData['user_id'] = $userId;
        $reviewData['book_id'] = $request->book_id;

        if (Review::create($reviewData)) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Review added successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'something went rong !..');
    }
}
