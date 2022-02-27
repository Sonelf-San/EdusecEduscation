<?php

namespace App\Http\Controllers\Admin;

use App\GalImage;
use App\Gallery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->paginate(20);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|max:191',
            'description' => 'required',
            'image'       => 'required|mimes:jpg,png,svg',
        ]);


        // if($request->hasFile('image'))
        // {


        if ($request->file('images')) {

            $gallery = new Gallery();
            $gallery->name = $request->name;
            $gallery->description = $request->description;
            if ($request->file('image')) {
                //Getting the file name with extension
                $image = $request->file('image');
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $pat = $image->storeAs('public/galleries', $fileNameToStore);
                $gallery->image = $fileNameToStore;
            }
            $gallery->save();

            foreach ($request->file('images') as $image) {
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $pat = $image->storeAs('public/galleries', $fileNameToStore);

                $gal = new GalImage();
                $gal->image = $fileNameToStore;
                $gal->gallery_id = $gallery->id;
                $gal->save();
            }
        } else {
            session()->flash('error', 'Please upload at least one image');
        }
        // }
        // $gallery->save();
        session()->flash('success', 'Gallery created successfully');

        return redirect()->route('admin.galleries.show', $gallery->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galleries.edit', compact('gallery'));
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
        $gallery = Gallery::findOrFail($id);

        request()->validate([
            'name'        => 'required|max:191',
            'description' => 'required',
            'image'       => 'nullable|mimes:jpg,png,svg',
        ]);


        $gallery->name = $request->name;
        $gallery->description = $request->description;
        if ($request->file('image')) {
            if ($gallery->image) {
                Storage::delete('public/galleries/' . $gallery->image);
            }
            //Getting the file name with extension
            $image = $request->file('image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $pat = $image->storeAs('public/galleries', $fileNameToStore);
            $gallery->image = $fileNameToStore;
        }
        $gallery->save();

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $pat = $image->storeAs('public/galleries', $fileNameToStore);

                $gal = new GalImage();
                $gal->image = $fileNameToStore;
                $gal->gallery_id = $gallery->id;
                $gal->save();
            }
        }
        // else
        // {
        //     session()->flash('error', 'Please upload at least one image');
        // }
        session()->flash('success', 'Gallery updated successfully');

        return redirect()->route('admin.galleries.show', $gallery->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $images = $gallery->gal_images;
        foreach ($images as $image) {
            Storage::delete('public/galleries/' . $image->image);
        }
        Storage::delete('public/galleries/' . $gallery->image);
        $gallery->delete();

        session()->flash('success', 'Gallery deleted successfully');
        return redirect()->route('admin.galleries.index');
    }

    public function deleteImage(Request $request, $id)
    {
        $gallery_image = GalImage::findOrFail($id);
        Storage::delete('public/galleries/' . $gallery_image->image);
        $gallery_image->delete();
        return redirect()->back();
    }
}

?>