<?php

namespace App\Http\Controllers\Admin;

use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('id', 'DESC')->paginate(20);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'  => 'required|mimes:jpg,png,svg',
            'name'   => 'required|max:191',
            'link'   => 'nullable|string|max:191|url',
        ]);

        $partner = new Partner();
        $partner->name = $request->name;
        $partner->link = $request->link;
        if($request->file('image'))
        {
            //Getting the file name with extension
            $image = $request->file('image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $pat = $image->storeAs('public/partners', $fileNameToStore);
            $partner->image = $fileNameToStore;     
        }
        $partner->save();
        session()->flash('success', 'partner created successfully');
        return redirect()->route('admin.partners.show', $partner->id);
    }

    public function show($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.show', compact('partner'));
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);
        request()->validate([
            'name'        => 'required|max:191',
            'link'    => 'nullable',
            'image'       => 'nullable|mimes:jpg,png,svg',
        ]);
        $partner->name = $request->name;
        $partner->link = $request->link;
        if ($request->file('image')) {
            if ($partner->image) {
                Storage::delete('public/partners/'. $partner->image);
            }
             //Getting the file name with extension
             $image = $request->file('image');
             $filenameWithExt = $image->getClientOriginalName();
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             $extension = $image->getClientOriginalExtension();
             $fileNameToStore = $filename.'_'.time().'.'.$extension;
             $pat = $image->storeAs('public/partners', $fileNameToStore);
             $partner->image = $fileNameToStore;
        }
        $partner->save();
        session()->flash('success', 'Partner updated successfully');
        return redirect()->route('admin.partners.show', $partner->id);
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        Storage::delete('public/partners/'. $partner->image);
        $partner->delete();

        session()->flash('success', 'Partner deleted successfully');
        return redirect()->route('admin.partners.index');
    }
}