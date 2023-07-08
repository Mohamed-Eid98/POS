<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function addemployee()
    {
        // dd('dsf');
        return view('employee.addemployeerole');
    }
    public function UpdateRole(Request $request)
    {
        // return $request;

        $role_id = Role::insertGetId([
                'name' => $request->name
        ]);

        foreach ($request->permissions as $permission) {
            RolePermission::create([
                'role_id' => $role_id,
                'permission_id' => $permission
            ]);
        }

        session()->flash('Add', 'تم اضافة الدور بنجاح ');

        return redirect()->back();
    }
    public function showemployee()
    {
        return view('employee.showemployee');
    }
    public function addnewemployee()
    {
        $roles = Role::get();
        return view('employee.addnewemployee'  , compact('roles'));
    }
    public function UpdateEmployee(Request $request)
    {

        // return $request;
        $user = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => $request->role_id,
        ]);

        if ($request->hasFile('avatar')) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('images');
    }


    session()->flash('Add', 'تم اضافة الموظف بنجاح ');

    return redirect()->back();
}

}
