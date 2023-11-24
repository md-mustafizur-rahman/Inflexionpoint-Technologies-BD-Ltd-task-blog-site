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
        if ($category) {
            $categoryID = '';

            switch ($category) {
                case 'tech':
                    $categoryID = 0;
                    break;

                case 'education':
                    $categoryID = 1;
                    break;

                case 'business':
                    $categoryID = 2;
                    break;
            }

            $posts = BlogPost::where('category', $categoryID)
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
            return view("fontPages.blogList", compact('posts', 'category'));
        } else {
            return redirect()->back();
        }
    }

    function getblogDetails($id)
    {
        return view("fontPages.blogSinglePage");
    }
}
