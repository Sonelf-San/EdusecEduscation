<?php

namespace App\Http\Controllers\Admin;

use App\School;
use App\Logo;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $schools = School::orderBy('created_at', 'DESC')->get();
        $logos = Logo::orderBy('created_at', 'DESC')->get();
        return view('admin.schools.create', compact('logos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'          => 'required|max:191',
            'description'   => 'required',
            'image' => 'nullable',
            'acronym' => 'required',
            'logo'  => 'required'
        ]);

        $school = new School();
        $school->name = $request->name;
        $school->slug = Str::slug($request->name, '-');
        $school->description = $request->description;
        $school->acronym = $request->acronym;
        $school->logo_id = $request->logo;
        $school->author = Auth('admin')->user()->name;
        if($request->file('image'))
        {
            //Getting the file name with extension
            $image = $request->file('image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $pat = $image->storeAs('public/schools', $fileNameToStore);
            $school->image = $fileNameToStore;        
        }
        // dd($school);
        $school->save();
        session()->flash('success', 'School added successfully');

        return redirect()->route('admin.schools.show', $school->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::findOrFail($id);
        // dd($school->logo);
        // dd($school->categories);
        return view('admin.schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::findOrFail($id);
        $logos = Logo::orderBy('created_at', 'DESC')->get();
        return view('admin.schools.edit', compact('school', 'logos'));
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
        $school = School::findOrFail($id);

        request()->validate([
            'name'          => 'required|max:191',
            'description'   => 'required',
            'image' => 'nullable',
            'acronym' => 'required',
            'logo'  => 'required'
        ]);

        $school->name = $request->name;
        $school->acronym = $request->acronym;
        $school->logo_id = $request->logo;
        $school->description = $request->description;
        if($request->file('image')) {
            if ($school->image) {
                Storage::delete('public/schools/'. $school->image);
            }
            //Getting the file name with extension
            $image = $request->file('image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $pat = $image->storeAs('public/schools', $fileNameToStore);
            $school->image = $fileNameToStore;
        }

        $school->save();
        session()->flash('success', 'School updated successfully');

        return redirect()->route('admin.schools.show', $school->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        Storage::delete('public/schools/'. $school->image);
        $school->delete();

        session()->flash('success', 'School deleted successfully');
        return redirect()->route('admin.schools.index');
    }
}
