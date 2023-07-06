<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    public function BeneShow()
    {
        $privacy = DB::table('info_translations')->where('title' , 'سياسة بنسايز')->first();
        // return $privacy;
        return view('privacy.benesize.show' , compact('privacy'));
    }
    public function BeneEdit($id)
    {
        $privacy = DB::table('info_translations')->find($id);
        return view('privacy.benesize.edit' , compact('privacy'));
    }
    public function BeneUpdate(Request $request)
    {
        $id = $request->id;

        DB::table('info_translations')->where('id',$id)->update([
            'description' => $request->area,
        ]);
        session()->flash('edit', 'تم تعديل خصوصية بنسايز بنجاح ');
        return redirect()->route('privacy.bene.show');
    }
    public function BeneDelete($id)
    {
        DB::table('info_translations')->where('id',$id)->update([
            'description' => Null
        ]);
        session()->flash('delete', 'تم حذف خصوصية بنسايز بنجاح ');
        return redirect()->back();
    }



    public function DeliveryShow()
    {
        $privacy = DB::table('info_translations')->where('title' , 'سياسة التوصيل')->first();
        return view('privacy.delivery.show' , compact('privacy'));
    }
    public function DeliveryEdit($id)
    {
        $privacy = DB::table('info_translations')->find($id);
        return view('privacy.delivery.edit' , compact('privacy'));
    }
    public function DeliveryUpdate(Request $request)
    {
        $id = $request->id;

        DB::table('info_translations')->where('id',$id)->update([
            'description' => $request->area,
        ]);
        session()->flash('edit', 'تم تعديل خصوصية التوصيل بنجاح ');
        return redirect()->route('privacy.delivery.show');
    }
    public function DeliveryDelete($id)
    {
        DB::table('info_translations')->where('id',$id)->update([
            'description' => Null
        ]);
        session()->flash('delete', 'تم حذف خصوصية التوصيل بنجاح ');
        return redirect()->back();
    }




    public function ReturnShow()
    {
        $privacy = DB::table('info_translations')->where('title' , 'سياسة الارجاع')->first();
        return view('privacy.return.show' , compact('privacy'));
    }
    public function ReturnEdit($id)
    {
        $privacy = DB::table('info_translations')->find($id);
        return view('privacy.return.edit' , compact('privacy'));
    }
    public function ReturnUpdate(Request $request)
    {
        $id = $request->id;

        DB::table('info_translations')->where('id',$id)->update([
            'description' => $request->area,
        ]);
        session()->flash('edit', 'تم تعديل خصوصية الارجاع بنجاح ');
        return redirect()->route('privacy.return.show');
    }
    public function ReturnDelete($id)
    {
        DB::table('info_translations')->where('id',$id)->update([
            'description' => Null
        ]);
        session()->flash('delete', 'تم حذف خصوصية الارجاع بنجاح ');
        return redirect()->back();
    }



    public function WarrantyShow()
    {
        $privacy = DB::table('info_translations')->where('title' , 'سياسة الضمان')->first();
        return view('privacy.warranty.show' , compact('privacy'));
    }
    public function WarrantyEdit($id)
    {
        $privacy = DB::table('info_translations')->find($id);
        return view('privacy.warranty.edit' , compact('privacy'));
    }
    public function WarrantyUpdate(Request $request)
    {
        $id = $request->id;

        DB::table('info_translations')->where('id',$id)->update([
            'description' => $request->area,
        ]);
        session()->flash('edit', 'تم تعديل خصوصية الضمان بنجاح ');
        return redirect()->route('privacy.warranty.show');
    }
    public function WarrantyDelete($id)
    {
        DB::table('info_translations')->where('id',$id)->update([
            'description' => Null
        ]);
        session()->flash('delete', 'تم حذف خصوصية الضمان بنجاح ');
        return redirect()->back();
    }




    public function TermsShow()
    {
        $privacy = DB::table('info_translations')->where('title' , 'سياسات قانونية')->first();
        return view('privacy.terms.show' , compact('privacy'));
    }
    public function TermsEdit($id)
    {
        $privacy = DB::table('info_translations')->find($id);
        return view('privacy.terms.edit' , compact('privacy'));
    }
    public function TermsUpdate(Request $request)
    {
        $id = $request->id;

        DB::table('info_translations')->where('id',$id)->update([
            'description' => $request->area,
        ]);
        session()->flash('edit', 'تم تعديل خصوصية السياسات القانونيه بنجاح ');
        return redirect()->route('privacy.terms.show');
    }
    public function TermsDelete($id)
    {
        DB::table('info_translations')->where('id',$id)->update([
            'description' => Null
        ]);
        session()->flash('delete', 'تم حذف خصوصية السياسات القانونيه بنجاح ');
        return redirect()->back();
    }


}
