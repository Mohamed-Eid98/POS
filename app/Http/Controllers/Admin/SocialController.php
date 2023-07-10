<?php

namespace App\Http\Controllers\Admin;

use App\Models\Icon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialController extends Controller
{
    public function addsocial()
    {
        $icons = Icon::get();
        return view('social.addsocial', compact('icons'));
    }
    public function social_store(Request $request)
    {


        if($request->file('pic')){
            $image = $request->file('pic');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $path = 'uploads/Socials/';
            $save_url = 'uploads/Socials/'.$name_gen;
            $image->move($path, $save_url);

            Icon::create([
                'title' => $request->name,
                'link' => $request->link,
                'image' => $save_url,
            ]);

        }else{

            Icon::create([
                'title' => $request->name,
                'link' => $request->link,
                'image' => $save_url,
            ]);
        }
        session()->flash('add', 'تم اضافة الرابط بنجاح ');

        return redirect()->back();
    }
    public function delete($id)
    {
        $icon = Icon::find($id);
        if($icon->image){

            $image = $icon->image;
            unlink($image);
        }
        Icon::find($id)->delete();

        session()->flash('delete', 'تم حذف الرابط بنجاح ');
        return redirect()->back();
    }
}
