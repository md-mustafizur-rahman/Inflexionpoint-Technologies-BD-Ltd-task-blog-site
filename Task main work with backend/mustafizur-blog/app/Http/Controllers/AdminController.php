<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
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

    function getOwnPostsList(Request $request)
    {



        $searchQuery = $request->input('search');


        $query = BlogPost::where('author_id', Auth::id());

        // Apply search conditions if a search query is provided
        if ($searchQuery) {
            $searchQueryLower = strtolower($searchQuery);

            $query->where(function ($query) use ($searchQueryLower) {
                $query->whereRaw('LOWER(post_title) LIKE ?', ["%$searchQueryLower%"])
                    ->orWhereRaw('LOWER(content) LIKE ?', ["%$searchQueryLower%"])
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
                    });
            });
        }

        // Get paginated results in descending order based on the creation timestamp
        $posts = $query->latest()->paginate(25);

        return view('adminPage.ownPosts', compact('posts'));
    }
    function getAllPostsList(Request $request)
    {

        $searchQuery = $request->input('search');

        // Retrieve all blog posts
        $query = BlogPost::query();

        // Apply search conditions if a search query is provided
        if ($searchQuery) {
            $searchQueryLower = strtolower($searchQuery);

            $query->whereRaw('LOWER(post_title) LIKE ?', ["%$searchQueryLower%"])
                ->orWhereRaw('LOWER(content) LIKE ?', ["%$searchQueryLower%"])
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

        // Get paginated results in descending order based on the creation timestamp
        $posts = $query->latest()->paginate(25); // Adjust the pagination limit as needed

        return view('adminPage.allPosts', compact('posts'));
    }

    function getAddPostPage()
    {
        return view('adminPage.addPostPage');
    }
}
