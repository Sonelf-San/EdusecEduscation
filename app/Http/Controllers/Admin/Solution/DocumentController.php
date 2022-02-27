<?php

namespace App\Http\Controllers\Admin\Solution;

use App\SolutionDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'file'        => 'required|file',
            'solution_id' => 'required|exists:solutions,id'
        ]);

        $doc = new SolutionDocument();
        $doc->solution_id = $request->solution_id;
        $doc->name = $request->name;
        $doc->path = Storage::putFile('solutions/brochures', $request->file('file'));
        $doc->save();

        return redirect()->back()->with(['success', 'Created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = SolutionDocument::findOrFail($id);
        $doc->delete();

        return redirect()->back()->with(['success' => 'Deleted successfully']);
    }
}
