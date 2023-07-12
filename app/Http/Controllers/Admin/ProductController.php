<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\User;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\subCategory;
use App\Models\ColorProduct;
use Illuminate\Http\Request;
use App\Models\ColorProductSize;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\ProductNotification;
use Illuminate\Support\Facades\Notification;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class ProductController extends Controller
{
    public function add()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $colors = Color::orderBy('name', 'ASC')->get();
        $sizes = Size::orderBy('name', 'ASC')->get();
        return view('product.productAdd', compact('categories', 'colors', 'sizes'));
    }

    public function addcands()
    {
        $products = Product::orderBy('name', 'ASC')->get();
        $colors = Color::orderBy('name', 'ASC')->get();
        $sizes = Size::orderBy('name', 'ASC')->get();
        // return response()->view('my-view')->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        return view('product.addcolorandsize', compact('products', 'colors', 'sizes'));
    }
    public function AjaxShow($id)
    {
        $sub_cate = subCategory::where('category_id', $id)->orderBy('name', 'ASC')->get();
        // dd($sub_cate);
        return response()->json($sub_cate);
    }

    public function Store(Request $request)
    {
        // return $request;


        $product = Product::create([
            'name' => $request->name,
            'description' => $request->desc,
            'code' => $request->code,

            'sub_category_id' => $request->subcate_id,

            'price' => $request->price,
            'min_price' => $request->min_price,
            'increase_ratio' => $request->increase_ratio,
            'repeat_times' => $request->repeated_times,
            'product_qty' => $request->qty,


            'is_new' => $request->new,
            'is_on_sale' => $request->sale,
            'is_new_arrival' => $request->new_arrival,
            'is_best_seller' => $request->best_seller,

        ]);



        if ($request->hasFile('pic')) {
            $product->addMediaFromRequest('pic')->toMediaCollection('images');
        }

        session()->flash('add', 'تم اضافة المنتج بنجاح ');

        return redirect()->back();
    }

    public function Show()
    {
        $products = Product::with('subcategory')->get();
        // return $products;
        return view('product.productView', compact('products'));
    }

    public function showSub($id)
    {
        $product = Product::find($id);
        $subcategory = subCategory::where('id', $product->sub_category_id)->first();
        // return $subcategory;
        return view('sub_category.subcategoryPage', compact('subcategory'));
    }

    public function tags()
    {
        dd('das');
        // return view('product.product_view_sub');
    }

    public function Edit($id)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $subcategories = subCategory::orderBy('name', 'ASC')->get();
        $product = Product::find($id);

        $colors = Color::orderBy('name', 'ASC')->get();
        // $color = ColorProduct::where('product_id' , $product->id)->first();

        $sizes = Size::orderBy('name', 'ASC')->get();
        // $size= ColorProductSize::where('color_product_id' , $color->id)->first();
        return view('product.ProductEdit', compact('categories', 'colors', 'sizes', 'product', 'subcategories'));
    }

    public function Update(Request $request)
    {
        $id = $request->id;
        $product = Product::findOrFail($id);

        Product::findOrFail($id)->update([

            'name' => $request->name,
            'description' => $request->desc,
            'code' => $request->code,

            'sub_category_id' => $request->subcate_id,

            'price' => $request->price,
            'min_price' => $request->min_price,
            'increase_ratio' => $request->increase_ratio,
            'repeat_times' => $request->repeated_times,
            'product_qty' => $request->qty,


            'is_new' => $request->new,
            'is_on_sale' => $request->sale,
            'is_new_arrival' => $request->new_arrival,
            'is_best_seller' => $request->best_seller,

        ]);

        if ($request->hasFile('pic')) {
            $product->addMediaFromRequest('pic')->toMediaCollection('images');
        }


        session()->flash('edit', 'تم تعديل المنتج بنجاح ');

        return redirect()->route('product.show');
    }

    public function Delete($id)
    {
        $product = Product::findOrfail($id);


        Product::findOrfail($id)->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح ');

        return redirect()->back();
    }
    public function ColorSizeStore(Request $request)
    {

        // return $request;

        $request->validate([
            'product_id' => 'required',
            'size' => 'required',
            'color' => 'required',
        ], [

            'product_id.required' => 'يرجي ادخال اسم المنتج',
            'size.required' => 'يرجي ادخال حجم النتج ',
            'color.required' => 'يرجي ادخال لون النتج ',
        ]);

        // $product = new Product;
        // $product->name = $request->name;
        // $product->save();


        $color_product = ColorProduct::Create([
            'product_id' => $request->product_id,
            'color_id' => $request->color,
        ]);

        foreach ($request->size as $size) {
            ColorProductSize::create([
                'color_product_id' => $color_product->id,
                'size_id' => $size,
            ]);
        }

        if ($request->hasFile('multi_img')) {
            foreach ($request->file('multi_img') as $image) {
                $color_product->addMedia($image)->usingName('colorImages')->toMediaCollection('images');
            }
        }



        session()->flash('add', 'تم اضافة البيانات بنجاح ');

        return redirect()->back();
    }




    public function zero($id)
    {
        $product = Product::findOrfail($id);

        $users = User::get();

        $user = auth()->user()->name;

        $message =     'المنتج [' . $product->name . '] قد نفذ ';
        Notification::send($users, new ProductNotification($product->id, $message, $user));

        session()->flash('delete', 'تم ارسال الاشعار بنجاح ');

        return redirect()->back();
    }
    public function lessTen($id)
    {
        $product = Product::findOrfail($id);

        $users = User::get();

        $user = auth()->user()->name;

        $message =     'المنتج [' . $product->name . '] قرب النفاذ ';

        Notification::send($users, new ProductNotification($product->id, $message, $user));

        session()->flash('delete', 'تم ارسال الاشعار بنجاح ');

        return redirect()->back();
    }
    public function readNotification($id)
    {
        $product = Product::findOrfail($id);

        $getId = DB::table('notifications')->where('data->id', $id)->pluck('id');
        foreach ($getId as $id) {
            DB::table('notifications')->where('id', $id)->update(['read_at' => now()]);
        }

        return redirect()->back();
    }
}
