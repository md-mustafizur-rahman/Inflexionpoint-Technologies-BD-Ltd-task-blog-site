<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    function getHomePage()
    {
        $query = BlogPost::query();

        $allPosts = $query->orderBy('updated_at', 'desc')->limit(6)->get();

        $featurePosts = $query->where('feature', 1)->orderBy('updated_at', 'desc')->limit(6)->get();

        return view("fontPages.home", compact('allPosts', 'featurePosts'));
    }


    function getBlogListPage()
    {
        return view("fontPages.blogList");
    }
    function getBlogListPageByCategoy($category)
    {
        return view("fontPages.blogList");
    }

    function getblogDetails($id)
    {
        return view("fontPages.blogSinglePage");
    }
}
