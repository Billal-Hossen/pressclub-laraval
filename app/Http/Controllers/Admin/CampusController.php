<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Campus::all();
        return view('admin.campus.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campus.create');
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

        $imagename = time().'_campus.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/campus/';

        $image->move($path, $imagename);

        $data = new Campus();
        $data->title = $request->title;
        $data->image = $path.$imagename;
        $data->description = $request->description;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Campus Information successfully create', 'Success');

        return redirect()->route('admin.campus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        $data = $campus;
        return view('admin.campus.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'status'=>'required'
        ]);


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time().'_campus.'. $image->getClientOriginalExtension();
            $path = 'assets/admin/campus/';

            if (file_exists(public_path($campus->image))) {
                unlink(public_path($campus->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $campus->image;
        }

        $campus->title = $request->title;
        $campus->image = $img;
        $campus->description = $request->description;
        $campus->status = $request->status;

        $campus->save();

        Toastr::success('Campus Information successfully update', 'Success');

        return redirect()->route('admin.campus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        $campus->delete();

        if (file_exists(public_path($campus->image)))
        {
            unlink(public_path($campus->image));
        }

        Toastr::success('Campus Information successfully Deleted', 'Success');

        return redirect()->route('admin.campus.index');
    }
}
