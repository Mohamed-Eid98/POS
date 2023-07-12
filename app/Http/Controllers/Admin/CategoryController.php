<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\subCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CategoryController extends Controller
{
    function Add()
    {
        return view('category.categoryAdd');
    }


    public function Store(Request $request)
    {


        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'pic' => 'image',
        ], [

            'name.required' => 'يرجي ادخال اسم القسم',
            'name.unique' => 'هذا القسم مسجل مسبقا',
            // 'pic.required' =>'يرجي ادخال صوره ',
        ]);


        $category = new Category;
        $category->name = $request->name;
        $category->save();


        if ($request->hasFile('pic')) {
            $category->addMediaFromRequest('pic')->usingName($category->name)->toMediaCollection('images');
        }
        session()->flash('Add', 'تم اضافة القسم بنجاح ');

        return redirect()->back();
    }

    public function Show()
    {
        $categories = Category::latest()->get();
        return view('category.categoryView', compact('categories'));
    }

    public function showPage($id)
    {
        $category = subCategory::with('category')->find($id);
        // return $category;
        return view('category.categoryViewPage', compact('category'));
    }

    public function Edit($id)
    {
        $category = Category::find($id);
        return view('category.categoryEdit', compact('category'));
    }
    public function Update(Request $request)
    {

        // return $request;

        $id  = $request->id;
        $category = Category::find($id);

        Category::find($id)->update([
            'name' => $request->name,
        ]);

        if ($request->hasFile('pic')) {
            $category->addMediaFromRequest('pic')->toMediaCollection('images');
        }





        session()->flash('edit', 'تم تعديل القسم بنجاح ');

        return redirect()->route('category.show');
    }

    public function Delete($id)
    {
        Category::find($id)->delete();
        session()->flash('delete', 'تم حذف القسم بنجاح ');
        return redirect()->back();
    }
}
