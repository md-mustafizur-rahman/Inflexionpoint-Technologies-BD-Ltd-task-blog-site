<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function getUserList()
    {
        return view('adminPage.userList');
    }
    function getOwnPostsList()
    {
        return view('adminPage.ownPosts');
    }
    function getAllPostsList()
    {
        return view('adminPage.allPosts');
    }
}
