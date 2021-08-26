<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Executive;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Executive::all();
        return view('admin.executive.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.executive.create');
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
            'name'=>'required',
            'designation'=>'required',
            'institute'=>'required',
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status'=>'required'
        ]);

        $image = $request->file('image');

        $imagename = time().'_executive.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/executive/';

        $image->move($path, $imagename);

        $data = new Executive();
        $data->name = $request->name;
        $data->image = $path.$imagename;
        $data->designation = $request->designation;
        $data->institute = $request->institute;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Executive Body Member successfully create', 'Success');

        return redirect()->route('admin.executives.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Executive  $executive
     * @return \Illuminate\Http\Response
     */
    public function show(Executive $executive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Executive  $executive
     * @return \Illuminate\Http\Response
     */
    public function edit(Executive $executive)
    {
        $data = $executive;
        return view('admin.executive.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Executive  $executive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Executive $executive)
    {
        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'institute'=>'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'status'=>'required'
        ]);


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time().'_executive.'. $image->getClientOriginalExtension();
            $path = 'assets/admin/executive/';

            if (file_exists(public_path($executive->image))) {
                unlink(public_path($executive->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $executive->image;
        }

        $executive->name = $request->name;
        $executive->image = $img;
        $executive->designation = $request->designation;
        $executive->institute = $request->institute;
        $executive->status = $request->status;

        $executive->save();

        Toastr::success('Executive member successfully update', 'Success');

        return redirect()->route('admin.executives.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Executive  $executive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Executive $executive)
    {
        $executive->delete();

        if (file_exists(public_path($executive->image)))
        {
            unlink(public_path($executive->image));
        }

        Toastr::success('Executive member successfully Deleted', 'Success');

        return redirect()->route('admin.executives.index');
    }
}
