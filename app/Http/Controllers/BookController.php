<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        $data['books'] = Book::with(['category'])->get();
        $data['categories'] = Category::get();
        return view('dashboard.book', $data);
    }

    public function store(BookRequest $request){
        $formData = $request->validated();
        if($request->hasFile("book_image")){
            $file=$request->file("book_image");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);
            $formData['book_image'] = $imageName;
        }
        if($request->has('publish_at')){
            $formData['publish_at'] = now();
        }
        if (Book::create($formData)) {
            return redirect()->route('book')->with('SUCCESS_MESSAGE', 'Book Created successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'something went rong !..');
    }

    public function edit($id){
        $data['categories'] = Category::all();
        $data['editData'] = Book::find($id);
        return view('dashboard.editBook', $data);
    }

    public function update(BookRequest $request, $id){

        $updateData = Book::findOrFail($id);
        $formData = $request->validated();

        if($request->has('published_at')){
            $formData['published_at'] = now();
        }
        $imgPath = '';
        $deleteOldImg = "cover/".$updateData->book_image;
        if($image = $request->file('book_image')){
           if (File::exists($deleteOldImg)) {
              File::delete($deleteOldImg);
           }
           $imgPath = time().'.'.$image->getClientOriginalExtension();
           $image->move('cover', $imgPath);
        }else{
           $imgPath = $updateData->book_image;
        }
        $formData['book_image'] = $imgPath;
        if (Book::findOrFail($id)->update($formData)) {
            return redirect()->route('book')->with('SUCCESS_MESSAGE', 'Book Updated successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'something went rong !..');
    }


    public function destroy($id)
    {
        $deleteData = Book::findOrFail($id);

         if (File::exists("cover/".$deleteData->book_image)) {
            File::delete("cover/".$deleteData->book_image);
        }

        if ($deleteData->delete()) {
            return redirect()->route('book')->with('SUCCESS_MESSAGE', 'Book Delete successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'something went rong !..');
    }
}
