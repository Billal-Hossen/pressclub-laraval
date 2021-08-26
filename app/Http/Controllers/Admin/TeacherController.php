<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Teacher::all();
        return view('admin.teacher.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
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

        $imagename = time().'_teacher.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/teacher/';

        $image->move($path, $imagename);

        $data = new Teacher();
        $data->name = $request->name;
        $data->image = $path.$imagename;
        $data->designation = $request->designation;
        $data->institute = $request->institute;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Teacher successfully create', 'Success');

        return redirect()->route('admin.teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $data = $teacher;
        return view('admin.teacher.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
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
            $imagename = time().'_teacher.'. $image->getClientOriginalExtension();
            $path = 'assets/admin/teacher/';

            if (file_exists(public_path($teacher->image))) {
                unlink(public_path($teacher->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $teacher->image;
        }

        $teacher->name = $request->name;
        $teacher->image = $img;
        $teacher->designation = $request->designation;
        $teacher->institute = $request->institute;
        $teacher->status = $request->status;

        $teacher->save();

        Toastr::success('Teacher information successfully update', 'Success');

        return redirect()->route('admin.teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        if (file_exists(public_path($teacher->image)))
        {
            unlink(public_path($teacher->image));
        }

        Toastr::success('Teacher successfully Deleted', 'Success');

        return redirect()->route('admin.teachers.index');
    }
}
