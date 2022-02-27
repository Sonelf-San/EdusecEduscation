<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::orderBy('name', 'ASC')->get();
        return view('admin.events.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|max:191',
            'description' => 'required',
            'image'       => 'required|mimes:jpg,png,svg',
            'location'       => 'required',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i',
        ]);

        // Checking the two dates
        $validator->after(function ($validator) use ($request) {
            //
            if ($request->end_date < $request->start_date) {
                $validator->errors()->add('end_date',
                    __('La date de fin doit etre égale ou plus grande que celle de début!'));
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $event = new Event();
        $event->name = $request->name;
        $event->location = $request->location;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->description = $request->description;

        if ($request->file('image'))
        {
             //Getting the file name with extension
             $image = $request->file('image');
             $filenameWithExt = $image->getClientOriginalName();
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             $extension = $image->getClientOriginalExtension();
             $fileNameToStore = $filename.'_'.time().'.'.$extension;
             $pat = $image->storeAs('public/events', $fileNameToStore);
             $event->image = $fileNameToStore;
        }
        // if($event->end_date < ($event->start_date))
        // {
        //     // $errdate = 'La date de fin doit etre egale ou plus grande que celle de debut!';
        //     session()->flash('error', 'La date de fin doit etre égale ou plus grande que celle de début!');
        //     return redirect()->route('admin.events.create'); 
        // }
        // else
        // {
            $event->save();
            session()->flash('success', 'Event created successfully');

            return redirect()->route('admin.events.show', $event->id);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'        => 'required|max:191',
            'description' => 'required',
            'image'       => 'nullable|mimes:jpg,png,svg',
            'location'    => 'required',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i',
        ]);

        // Checking the two dates
        $validator->after(function ($validator) use ($request) {
            //
            if ($request->end_date < $request->start_date) {
                $validator->errors()->add('end_date',
                    __('La date de fin doit etre égale ou plus grande que celle de début!'));
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $event->name = $request->name;
        $event->location = $request->location;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->description = $request->description;

        if ($request->file('image')) {
            if ($event->image) {
                Storage::delete('public/events/'. $event->image);
            }
             //Getting the file name with extension
             $image = $request->file('image');
             $filenameWithExt = $image->getClientOriginalName();
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             $extension = $image->getClientOriginalExtension();
             $fileNameToStore = $filename.'_'.time().'.'.$extension;
             $pat = $image->storeAs('public/events', $fileNameToStore);
             $event->image = $fileNameToStore;
        }
        if($event->end_date < ($event->start_date))
        {
            $errdate = 'La date de fin doit etre egale ou plus grande que celle de debut!';
            // session()->flash('error', 'La date de fin doit etre egale ou plus grande que celle de debut!');
            return redirect()->route('admin.events.edit', $event->id)->with('errdate');
        }
        else
        {
            $event->save();
            session()->flash('success', 'Event updated successfully');

            return redirect()->route('admin.events.show', $event->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        if(Storage::exists('public/events/'. $event->image)){
            Storage::delete('public/events/'. $event->image);
        }else{
            dd('File does not exists.');
        }
        $event->delete();

        session()->flash('success', 'Event deleted successfully');
        return redirect()->route('admin.events.index');
    }
}
