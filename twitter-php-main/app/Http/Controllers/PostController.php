<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function submitPost(Request $request) {
        $request->validate([
            'postText' => 'required|max:280',
            'postImage' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('postImage') && $request->file('postImage')->isValid()) {
            $imagePath = $request->file('postImage')->store('images', 'public');
        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->text = $request->postText;
        $post->image = $imagePath;
        $post->save();

        return redirect('/')->with('status', 'Post created successfully!');
    }

    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect('/')->with('status', 'Post deleted successfully!');
    }
}
