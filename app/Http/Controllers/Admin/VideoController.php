<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Video::all();
        return view('admin.video.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'link'=>'required',
            'video_title'=>'required',
            'link_id'=>'required|unique:videos',
            'status'=>'required'
        ]);

        $image = $request->file('image');

        $imagename = time().'_video.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/videoGallery/';

        $image->move($path, $imagename);

        $data = new Video();
        $data->image = $path.$imagename;
        $data->link = $request->link;
        $data->video_title = $request->video_title;
        $data->link_id = $request->link_id;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Video successfully create', 'Success');

        return redirect()->route('admin.videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $data = $video;
        return view('admin.video.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'link'=>'required',
            'video_title'=>'required',
            'link_id'=>'required',
            'status'=>'required'
        ]);


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time().'_video.'. $image->getClientOriginalExtension();
            $path = 'assets/admin/videoGallery/';

            if (file_exists(public_path($video->image))) {
                unlink(public_path($video->image));
            }

            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $video->image;
        }


        $video->image = $img;
        $video->link = $request->link;
        $video->video_title = $request->video_title;
        $video->link_id = $request->link_id;
        $video->status = $request->status;

        $video->update();

        Toastr::success('Video successfully update', 'Success');

        return redirect()->route('admin.videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();

        if (file_exists(public_path($video->image)))
        {
            unlink(public_path($video->image));
        }

        Toastr::success('Video successfully Deleted', 'Success');

        return redirect()->route('admin.videos.index');
    }
}
