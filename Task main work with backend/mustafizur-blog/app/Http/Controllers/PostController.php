<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $blogPost->content = $request->input('post_description');
        $blogPost->category = $request->input('category');
        $blogPost->feature = $request->input('feature', 0);
        $blogPost->author_id = auth()->id(); // Assuming you have authentication and an 'id' field in the users table

        // Save the new blog post to the database
        $blogPost->save();

        return redirect("/own-posts");
    }


    public function updatePost(Request $request, $postId)
    {
        // Validate the incoming request
        $request->validate([
            'post_title' => ['required', 'string'],
            'post_description' => ['required', 'string'],
            'category' => ['required', 'numeric'],
            'feature' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Find the blog post by ID
        $blogPost = BlogPost::findOrFail($postId);

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
        $blogPost->content = $request->input('post_description');
        $blogPost->category = $request->input('category');
        $blogPost->feature = $request->input('feature', 0);

        // Save the updated blog post to the database
        $blogPost->save();

        return redirect("/own-posts")->with('success', 'Post updated successfully');
    }
}
