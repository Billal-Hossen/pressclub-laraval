<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Event::all();
        return view('admin.event.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
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
            'place'=>'required',
            'description'=>'required',
            'image' => 'required|mimes:jpeg,png,jpg,JPG',
            'date'=>'required',
            'time'=>'required',
            'status'=>'required'
        ]);

        $image = $request->file('image');

        $imagename = time().'_event.'.$image->getClientOriginalExtension();

        $path = 'assets/admin/event/';

        $image->move($path, $imagename);

        $data = new Event();
        $data->title = $request->title;
        $data->place = $request->place;
        $data->description = $request->description;
        $data->image = $path.$imagename;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->status = $request->status;

        $data->save();

        Toastr::success('Event successfully create', 'Success');

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $data = $event;
        return view('admin.event.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title'=>'required',
            'place'=>'required',
            'description'=>'required',
            'image' => 'mimes:jpeg,png,jpg,JPG',
            'date'=>'required',
            'time'=>'required',
            'status'=>'required'
        ]);


        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time().'_event.'. $image->getClientOriginalExtension();
            $path = 'assets/admin/event/';

            if (file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }
            $image->move($path, $imagename);
            $img = $path.$imagename;
        }else{
            $img = $event->image;
        }

        $event->title = $request->title;
        $event->place = $request->place;
        $event->description = $request->description;
        $event->image = $img;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->status = $request->status;

        $event->save();

        Toastr::success('Event successfully update', 'Success');

        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        if (file_exists(public_path($event->image)))
        {
            unlink(public_path($event->image));
        }

        Toastr::success('Event successfully Deleted', 'Success');

        return redirect()->route('admin.events.index');
    }
}
