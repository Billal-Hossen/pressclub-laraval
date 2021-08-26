<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Committee::all();
        return view('admin.committee.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.committee.create');
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
            'name'=>'required',
            'designation'=>'required',
            'institute'=>'required',
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'status'=>'required'
        ]);

        $image = $request->file('image');

        $imagename = time().'_committee.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/committee/';

        $image->move($path, $imagename);

        $data = new Committee();
        $data->name = $request->name;
        $data->image = $path.$imagename;
        $data->designation = $request->designation;
        $data->institute = $request->institute;
        $data->status = $request->status;

        $data->save();

        Toastr::success('committee Member successfully create', 'Success');

        return redirect()->route('admin.committees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function show(Committee $committee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function edit(Committee $committee)
    {
        $data = $committee;
        return view('admin.committee.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Committee $committee)
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

            if (file_exists(public_path($committee->image))) {
                unlink(public_path($committee->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $committee->image;
        }

        $committee->name = $request->name;
        $committee->image = $img;
        $committee->designation = $request->designation;
        $committee->institute = $request->institute;
        $committee->status = $request->status;

        $committee->save();

        Toastr::success('Committee member successfully update', 'Success');

        return redirect()->route('admin.committees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Committee $committee)
    {
        $committee->delete();

        if (file_exists(public_path($committee->image)))
        {
            unlink(public_path($committee->image));
        }

        Toastr::success('Committee member successfully Deleted', 'Success');

        return redirect()->route('admin.committees.index');
    }
}
