<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Notice::all();
        return view('admin.notice.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
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
            'status'=>'required',
        ]);


        $data = new Notice();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Notice successfully create', 'Success');

        return redirect()->route('admin.notices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        $data = $notice;
        return view('admin.notice.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);




        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->status = $request->status;

        $notice->save();

        Toastr::success('Notice successfully update', 'Success');

        return redirect()->route('admin.notices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();


        Toastr::success('Notice successfully Deleted', 'Success');

        return redirect()->route('admin.notices.index');
    }
}
