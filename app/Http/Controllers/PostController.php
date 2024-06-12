<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
//        $posts = Post::orderby('id', 'asc')->get()->toArray();
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();       
        $post->name = $request->name;    
        $post->content = $request->content;
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $exten = $file->getClientOriginalExtension();
            // $filename = time().".".$exten;
            $originalFile = $file->getClientOriginalName();
            $file->move(storage_path( 'app/public/posts/'), $originalFile);
            $post->featured_image = $originalFile;
            // dd($file, $exten, $filename);
       }
       $post->save();


        return redirect()->route('post.list')->with('success', 'Post Added Successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        // $item = Item::find($id);
        return view('posts.edit', compact('post'));
    
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->content = $request->content;
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $originalFile = $file->getClientOriginalName();
            $file->move(storage_path('app/public/posts/'), $originalFile);
            $post->featured_image = $originalFile;
        }
        $post->save();
    
        return redirect()->route('post.list')->with('success', 'Post Updated Successfully.');
    }

    public function delete($id)
    {
        $post = Post::find($id)->delete();

        return response()->json(['success' => 'User Deleted Successfully!']);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
       
        return response()->json(['post' => $post]);
    }
}
