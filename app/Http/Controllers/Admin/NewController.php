<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\NewsCategory;
use App\NewsImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::orderBy('name', 'ASC')->get();
        return view('admin.news.create', compact('categories'));
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
            'name'        => 'required|max:191',
            'category'    => 'nullable|exists:news_categories,id',
            'description' => 'required',
            'image'       => 'nullable|mimes:jpg,png,svg',
        ]);

        $new = new News();
        $new->name = $request->name;
        $new->slug = Str::slug($request->name) . '-' . time();
        $new->category_id = $request->category;
        $new->description = $request->description;

        if ($request->file('image'))
        {
             //Getting the file name with extension
             $image = $request->file('image');
             $filenameWithExt = $image->getClientOriginalName();
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             $extension = $image->getClientOriginalExtension();
             $fileNameToStore = $filename.'_'.time().'.'.$extension;
             $pat = $image->storeAs('public/news', $fileNameToStore);
             $new->image = $fileNameToStore;
        }

        // {{ \Auth('admin')->user()->name }}
        $new->author = Auth('admin')->user()->name;

        $new->save();
        session()->flash('success', 'New created successfully');

        return redirect()->route('admin.news.show', $new->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::findOrFail($id);
        return view('admin.news.show', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::findOrFail($id);
        $categories = NewsCategory::orderBy('name', 'ASC')->get();
        return view('admin.news.edit', compact('new', 'categories'));
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
        $new = News::findOrFail($id);

        request()->validate([
            'name'        => 'required|max:191',
            'category'    => 'nullable|exists:news_categories,id',
            'description' => 'required',
            'image'       => 'nullable|mimes:jpg,png,svg',
        ]);

        $new->name = $request->name;
        $new->category_id = $request->category;
        $new->description = $request->description;

        if ($request->file('image')) {
            if ($new->image) {
                Storage::delete('public/news/'. $new->image);
            }
             //Getting the file name with extension
             $image = $request->file('image');
             $filenameWithExt = $image->getClientOriginalName();
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             $extension = $image->getClientOriginalExtension();
             $fileNameToStore = $filename.'_'.time().'.'.$extension;
             $pat = $image->storeAs('public/news', $fileNameToStore);
             $new->image = $fileNameToStore;
        }

        $new->save();
        session()->flash('success', 'New updated successfully');

        return redirect()->route('admin.news.show', $new->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        Storage::delete('public/news/'. $new->image);
        $new->delete();

        session()->flash('success', 'New deleted successfully');
        return redirect()->route('admin.news.index');
    }

    public function addImages(Request $request, $id)
    {
        $new = News::findOrFail($id);

        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                $path = Storage::putFile('news', $image);
                $new_image = new NewsImage();
                $new_image->path = $path;
                $new_image->new_id = $new->id;
                $new_image->save();
            }
        } else {
            session()->flash('error', 'Please upload at least one image');
        }

        session()->flash('success', 'Images uploaded successfully');
        return redirect()->back();
    }


    public function deleteImage(Request $request, $id)
    {
        $new_image = NewsImage::findOrFail($id);
        $new_image->delete();

        return redirect()->back();
    }
}
