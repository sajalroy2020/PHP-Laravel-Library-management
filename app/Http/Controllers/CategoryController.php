<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::get();
        return view('dashboard.category', $data);
    }

    public function store(CategoryRequest $request)
    {
        $formData = $request->validated();

        if (Category::create($formData)) {
            return redirect()->route('categoryStore')->with('SUCCESS_MESSAGE', 'Category Created successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'something went rong !..');

    }


    public function edit($id)
    {
        $data['categoryEdit'] = Category::findOrFail($id);
        return view('dashboard.editCategory', $data);
    }

    public function update(CategoryRequest $request, $id)
    {
        $formData = $request->validated();

        if (Category::find($id)->update($formData)) {
            return redirect()->route('categoryStore')->with('SUCCESS_MESSAGE', 'Category updated successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'something went rong !..');
    }


    public function destroy($id)
    {
        if (Category::find($id)->delete()) {
            return redirect()->route('categoryStore')->with('SUCCESS_MESSAGE', 'Category deleted successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'something went rong !..');
    }
}
