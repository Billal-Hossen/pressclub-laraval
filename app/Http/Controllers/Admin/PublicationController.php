<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Publication::all();
        return view('admin.publication.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publication.create');
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
            'title'=>'required',
            'author'=>'required',
            'platform'=>'required',
            'image' => 'required|mimes:pdf',
            'status'=>'required'
        ]);

        $image = $request->file('image');

        $imagename = time().'_publication.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/publication/';

        $image->move($path, $imagename);

        $data = new Publication();
        $data->title = $request->title;
        $data->author = $request->author;
        $data->platform = $request->platform;
        $data->image = $path.$imagename;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Publication successfully create', 'Success');

        return redirect()->route('admin.publications.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        $data = $publication;
        return view('admin.publication.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'platform'=>'required',
            'image' => 'mimes:pdf',
            'status'=>'required',
        ]);


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time().'_publication.'. $image->getClientOriginalExtension();
            $path = 'assets/admin/publication/';

            if (file_exists(public_path($publication->image))) {
                unlink(public_path($publication->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $publication->image;
        }

        $publication->title = $request->title;
        $publication->author = $request->author;
        $publication->platform = $request->platform;
        $publication->image = $img;
        $publication->status = $request->status;

        $publication->save();

        Toastr::success('Publication successfully update', 'Success');

        return redirect()->route('admin.publications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();

        if (file_exists(public_path($publication->image)))
        {
            unlink(public_path($publication->image));
        }

        Toastr::success('Publication successfully Deleted', 'Success');

        return redirect()->route('admin.publications.index');
    }
}
