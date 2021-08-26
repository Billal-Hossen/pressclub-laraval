<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Post::all();
        return view('admin.post.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::where('status','1')->orderBy('name')->get();
        return view('admin.post.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        $request->validate([
            'tag_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status'=>'required'
        ]);

        if ($request->is_featured)
        {
            $request->is_featured = "1";
        }else{
            $request->is_featured = "0";
        }


        $image = $request->file('image');

        $imagename = time().'_post.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/posts/';

        $image->move($path, $imagename);

        $data = new Post();
        $data->tag_id = $request->tag_id;
        $data->user_id = Auth::user()->id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->image = $path.$imagename;
        $data->is_featured = $request->is_featured;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Post successfully create', 'Success');

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = $post;
        return view('admin.post.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::where('status','1')->orderBy('name')->get();
        $data = $post;

        //return $categories;
        return view('admin.post.edit', compact('data', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'tag_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'status'=>'required'
        ]);


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time().'_slider.'. $image->getClientOriginalExtension();
            $path = 'assets/admin/posts/';

            if (file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $post->image;
        }

        if ($request->is_featured)
        {
            $request->is_featured = "1";
        }else{
            $request->is_featured = "0";
        }

        $post->tag_id = $request->tag_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $img;
        $post->is_featured = $request->is_featured;
        $post->status = $request->status;

        $post->save();

        Toastr::success('Post successfully update', 'Success');

        return redirect()->route('admin.posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        if (file_exists(public_path($post->image)))
        {
            unlink(public_path($post->image));
        }

        Toastr::success('Post successfully Deleted', 'Success');

        return redirect()->route('admin.posts.index');
    }
}
