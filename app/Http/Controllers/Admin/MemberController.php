<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Member::all();
        return view('admin.member.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
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

        $imagename = time().'_member.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/member/';

        $image->move($path, $imagename);

        $data = new Member();
        $data->name = $request->name;
        $data->image = $path.$imagename;
        $data->designation = $request->designation;
        $data->institute = $request->institute;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Member successfully create', 'Success');

        return redirect()->route('admin.members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $data = $member;
        return view('admin.member.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
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

            if (file_exists(public_path($member->image))) {
                unlink(public_path($member->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $member->image;
        }

        $member->name = $request->name;
        $member->image = $img;
        $member->designation = $request->designation;
        $member->institute = $request->institute;
        $member->status = $request->status;

        $member->save();

        Toastr::success('Member successfully update', 'Success');

        return redirect()->route('admin.members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        if (file_exists(public_path($member->image)))
        {
            unlink(public_path($member->image));
        }

        Toastr::success('Member successfully Deleted', 'Success');

        return redirect()->route('admin.members.index');
    }
}
