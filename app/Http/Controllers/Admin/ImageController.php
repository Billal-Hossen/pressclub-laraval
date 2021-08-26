<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Image;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Image::all();
        return view('admin.image.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.image.create');
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
            'small_image' => 'required|mimes:jpeg,png,jpg,JPG',
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status'=>'required'
        ]);

        $smimage = $request->file('small_image');
        $bgimage = $request->file('image');

        $smimagename = time().'_sm.'.$smimage->getClientOriginalExtension();
        $bgimagename = time().'_bg.'.$bgimage->getClientOriginalExtension();


        $path = 'assets/admin/photoGallery/';

        $smimage->move($path, $smimagename);
        $bgimage->move($path, $bgimagename);

        $data = new Image();
        $data->small_image = $path.$smimagename;
        $data->image = $path.$bgimagename;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Image successfully create', 'Success');

        return redirect()->route('admin.images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $data = $image;
        return view('admin.image.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $request->validate([
            'small_image' => 'mimes:jpeg,png,jpg,JPG',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'status'=>'required'
        ]);

        if ($request->hasFile('small_image'))
        {
            $path = 'assets/admin/photoGallery/';
            $smimage = $request->file('small_image');
            $smimagename = time().'_sm.'.$smimage->getClientOriginalExtension();

            if (file_exists(public_path($image->small_image)))
            {
                unlink(public_path($image->small_image));
            }

            $smimage->move($path, $smimagename);

            $imgsm = $path.$smimagename;
        }else{
            $imgsm = $image->small_image;
        }



        if ($request->hasFile('image'))
        {
            $path = 'assets/admin/photoGallery/';
            $bgimage = $request->file('image');
            $bgimage = time().'_sm.'.$bgimage->getClientOriginalExtension();

            if (file_exists(public_path($image->image)))
            {
                unlink(public_path($image->image));
            }

            $bgimage->move($path, $bgimage);

            $imgbg = $path.$smimagename;
        }else{
            $imgbg = $image->image;
        }



        $image->small_image = $imgsm;
        $image->image = $imgbg;
        $image->status = $request->status;

        $image->save();

        Toastr::success('Image Successfully Update', 'Success');

        return redirect()->route('admin.images.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();

        if (file_exists(public_path($image->small_image)))
        {
            unlink(public_path($image->small_image));
        }

        if (file_exists(public_path($image->image)))
        {
            unlink(public_path($image->image));
        }

        Toastr::success('Image successfully Deleted', 'Success');

        return redirect()->route('admin.images.index');
    }
}
