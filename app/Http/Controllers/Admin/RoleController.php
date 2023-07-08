<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function show()
    {
        // dd('das');
        $user = auth()->user();

        $role = $user->role;
        $permissions = $role->permissions;

        return $permissions;
    }
}
