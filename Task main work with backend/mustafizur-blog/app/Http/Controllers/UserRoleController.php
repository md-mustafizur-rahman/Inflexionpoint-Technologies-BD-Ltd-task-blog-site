<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserRoleController extends Controller
{
    function getUserRolePage($id)
    {
        $user = User::find($id);
        if (!$user) {

            return abort(404);
        }



        return view("adminPage.UpdateUserRole", compact('user'));
    }


    function updateRole(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:users,id'],
            'roles' => ['nullable', 'integer', 'between:0,1'],
        ]);

        $user = User::findOrFail($request->id);


        if ($request->has('roles') && Auth::user()->id != $request->id) {
            $user->roles = $request->roles;
            $user->save();
        }

        return redirect('/user-list');
    }
}
