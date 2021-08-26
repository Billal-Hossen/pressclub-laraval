<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SliderController extends Controller
{
    /**RR
     * Display a listing of the resource.R
     *R
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Slider::all();
        return view('admin.slider.index', compact('datas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title'=>'required',
            'description'=>'required',
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status'=>'required'
        ]);

        $image = $request->file('image');

        $imagename = time().'_slider.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/slider/';

        $image->move($path, $imagename);

        $data = new Slider();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->image = $path.$imagename;
        $data->link = $request->link;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Slider successfully create', 'Success');

        return redirect()->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $data = $slider;
        return view('admin.slider.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'link'=>'required|url',
            'status'=>'required'
        ]);


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time().'_slider.'. $image->getClientOriginalExtension();
            $path = 'assets/admin/slider/';

            if (file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $slider->image;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;

        $slider->image = $img;
        $slider->link = $request->link;
        $slider->status = $request->status;

        $slider->save();

        Toastr::success('slider successfully update', 'Success');

        return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        if (file_exists(public_path($slider->image)))
        {
            unlink(public_path($slider->image));
        }

        Toastr::success('Slider successfully Deleted', 'Success');

        return redirect()->route('admin.sliders.index');
    }
}
