<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function storePost(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'post_title' => ['required', 'string'],
            'post_description' => ['required', 'string'],
            'category' => ['required', 'numeric'],
            'feature' => ['nullable', 'boolean'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Store the image in Laravel storage with a unique name
        $uniqueImageName = uniqid('blog_image_') . '.' . $request->file('image')->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('blog_images', $uniqueImageName, 'public');

        // Create a new BlogPost instance
        $blogPost = new BlogPost();

        // Update the blog post fields including the unique image name
        $blogPost->image = $uniqueImageName;
        $blogPost->post_title = $request->input('post_title');
        $blogPost->post_description = $request->input('post_description');
        $blogPost->category = $request->input('category');
        $blogPost->feature = $request->input('feature', 0);
        $blogPost->author_id = auth()->id(); // Assuming you have authentication and an 'id' field in the users table

        // Save the new blog post to the database
        $blogPost->save();

        return redirect("/own-posts");
    }




    function getUpdateOwnPostPage($id)
    {


        $post = BlogPost::find($id);
        if ($post->author_id == Auth::id()) {

            return view("adminPage.updatePostPage", compact('post'));
        } else {
            return redirect()->back();
        }
    }

    public function deleteOwnPost($id)
    {
        // Validate the incoming request

        // Find the blog post by ID
        $blogPost = BlogPost::findOrFail($id);
        if ($blogPost->author_id == Auth::id()) {



            // Delete the associated image if it exists
            if ($blogPost->image) {
                Storage::disk('public')->delete('blog_images/' . $blogPost->image);
            }

            // Delete the blog post from the database
            $blogPost->delete();

            return redirect("/own-posts");
        } else {
            return redirect()->back();
        }
    }




    function getUpdateAllUsersPost($id)
    {
        $post = BlogPost::find($id);
        if ($post) {

            return view("adminPage.updatePostPage", compact('post'));
        } else {
            return redirect()->back();
        }
    }

    public function deleteAllUserPost($id)
    {
        // Validate the incoming request

        // Find the blog post by ID
        $blogPost = BlogPost::findOrFail($id);
        if ($blogPost->author_id == Auth::id()) {



            // Delete the associated image if it exists
            if ($blogPost->image) {
                Storage::disk('public')->delete('blog_images/' . $blogPost->image);
            }

            // Delete the blog post from the database
            $blogPost->delete();

            return redirect("/all-posts");
        } else {
            return redirect()->back();
        }
    }


    public function updatePost(Request $request,)
    {
        // Validate the incoming request
        $request->validate([
            'id' => ['integer'],
            'post_title' => ['required', 'string'],
            'post_description' => ['required', 'string'],
            'category' => ['required', 'numeric'],
            'feature' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Find the blog post by ID
        $blogPost = BlogPost::findOrFail($request->id);

        // If an image is uploaded, update it
        if ($request->hasFile('image')) {
            // Store the new image in Laravel storage with a unique name
            $uniqueImageName = uniqid('blog_image_') . '.' . $request->file('image')->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('blog_images', $uniqueImageName, 'public');

            // Delete the old image if it exists
            if ($blogPost->image) {
                Storage::disk('public')->delete('blog_images/' . $blogPost->image);
            }

            // Update the blog post with the new image
            $blogPost->image = $uniqueImageName;
        }

        // Update other blog post fields
        $blogPost->post_title = $request->input('post_title');
        $blogPost->post_description = $request->input('post_description');
        $blogPost->category = $request->input('category');
        $blogPost->feature = $request->input('feature', 0);

        // Save the updated blog post to the database
        $blogPost->save();

        return redirect()->back();
    }
}
