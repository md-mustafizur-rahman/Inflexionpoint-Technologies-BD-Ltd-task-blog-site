<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getUserList(Request $request)
    {
        $searchTerm = $request->search;

        if (Auth::user()->roles == 1) {
            $users = User::select('id', 'image', 'email', 'name', 'roles')
                ->where(function ($query) use ($searchTerm) {
                    $query->where('email', 'like', '%' . $searchTerm . '%')
                        ->orWhere('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('id', 'like', '%' . $searchTerm . '%')
                        ->orWhere('roles', 'like', '%' . (strtolower($searchTerm) == "admin" ? 1 : (strtolower($searchTerm) == "user" ? 0 : '')) . '%');
                })
                ->orderBy('id', 'desc')
                ->paginate(25);

            return view('adminPage.userList', compact('users'));
        } else {
            return redirect()->back();
        }
    }

    function getOwnPostsList()
    {
        return view('adminPage.ownPosts');
    }
    function getAllPostsList()
    {
        return view('adminPage.allPosts');
    }

    function getAddPosts()
    {
        return view('adminPage.addPost');
    }
}
