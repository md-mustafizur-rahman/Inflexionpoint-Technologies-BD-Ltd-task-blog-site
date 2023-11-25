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


    function getBlogListPage(Request $request)
    {

        $searchQuery = $request->input('search');

        // Retrieve all blog posts
        $query = BlogPost::query();

        // Apply search conditions if a search query is provided
        if ($searchQuery) {
            $searchQueryLower = strtolower($searchQuery);

            $query->whereRaw('LOWER(post_title) LIKE ?', ["%$searchQueryLower%"])
                ->orWhereRaw('LOWER(post_description) LIKE ?', ["%$searchQueryLower%"])
                ->orWhere(function ($query) use ($searchQueryLower) {
                    // Map 'tech' to 0, 'education' to 1, 'business' to 2
                    $categoryMapping = [
                        'tech' => 0,
                        'education' => 1,
                        'business' => 2,
                    ];
                    $mappedCategory = $categoryMapping[$searchQueryLower] ?? null;
                    if ($mappedCategory !== null) {
                        $query->where('category', $mappedCategory);
                    }
                })
                ->orWhere(function ($query) use ($searchQueryLower) {
                    // Map 'yes' to 1, 'no' to 0 for the feature field
                    $featureMapping = [
                        'yes' => 1,
                        'no' => 0,
                    ];
                    $mappedFeature = $featureMapping[$searchQueryLower] ?? null;
                    if ($mappedFeature !== null) {
                        $query->where('feature', $mappedFeature);
                    }
                })
                ->orWhere('author_id', '=', $searchQuery);
        }

       
        $posts = $query->latest()->paginate(1); 
        return view('fontPages.blogList', compact('posts','searchQuery'));
      
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
