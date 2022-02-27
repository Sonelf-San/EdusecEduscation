<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\ArtFile;
use App\Category;
use App\Logo;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        $logos = Logo::orderBy('created_at', 'DESC')->get();
        return view('admin.articles.create', compact('categories', 'logos'));
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
            'title'          => 'required|max:191',
            'description'   => 'required',
            'files' => 'nullable',
            'category' => 'required',
            'logo'  => 'required'
            // 'image'         => 'required|mimes:jpg,png,svg'
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title, '-');
        // $article->slug = Str::slug($request->title, '-') . '-' . time();
        $article->description = $request->description;
        $article->category_id = $request->category;
        $article->logo_id = $request->logo;
        $article->author = Auth('admin')->user()->name;
        $article->save();

        if ($request->file('files')) {
            foreach ($request->file('files') as $image) {
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $pat = $image->storeAs('public/articles', $fileNameToStore);

                $art = new ArtFile();
                $art->file = $fileNameToStore;
                $art->article_id = $article->id;
                $art->save();
            }
        } else {
            // session()->flash('error', 'Please upload at least one file');
        }
        session()->flash('success', 'Article created successfully');

        return redirect()->route('admin.articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        // dd($article->logo);
        // dd($article->categories);
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $logos = Logo::orderBy('created_at', 'DESC')->get();
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.articles.edit', compact('article', 'categories', 'logos'));
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
        $article = Article::findOrFail($id);

        request()->validate([
            'title'          => 'required|max:191',
            'description'   => 'required',
            'files' => 'nullable',
            'category' => 'required',
            'logo'  => 'required'
        ]);

        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->logo_id = $request->logo;
        $article->description = $request->description;

        if($request->file('files')) 
        {
        foreach ($request->file('files') as $image) 
            {
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $pat = $image->storeAs('public/articles', $fileNameToStore);

                $art = new ArtFile();
                $art->file = $fileNameToStore;
                $art->article_id = $article->id;
                $art->save();
            }
        }
        // dd($article);
        $article->save();
        session()->flash('success', 'Article updated successfully');

        return redirect()->route('admin.articles.show', $article->id);
    }

    public function deleteFile(Request $request, $id)
    {
        $article_file = ArtFile::findOrFail($id);
        Storage::delete('public/articles/' . $article_file->file);
        $article_file->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        Storage::delete('public/articles/'. $article->image);
        $article->delete();

        session()->flash('success', 'Article deleted successfully');
        return redirect()->route('admin.articles.index');
    }
}
