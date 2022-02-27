<?php

namespace App\Http\Controllers\Solution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reference;
use App\Solution;
use App\SolutionImage;
use App\SolutionReference;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SolutionController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solutions = Solution::orderBy('rank', 'ASC')->paginate(20);
        return view('admin.solutions.index', compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $references = Reference::orderBy('name', 'ASC')->get();
        return view('admin.solutions.create', compact('references'));
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
            'name'              => 'required|max:191',
            'short_description' => 'required',
            'description'       => 'required',
            'image'             => 'nullable|mimes:jpg,png,svg',
            'icon'              => 'nullable|mimes:jpg,png,svg'
        ]);


        // get the largest ranking team Solution or assign rank=1 assuming its first item
        $oldest_soltn = Solution::orderBy('rank', 'DESC')->first();

        $solution = new Solution();
        $solution->name = $request->name;
        $solution->slug = Str::slug($request->name) . '-' . time();
        $solution->short_description = $request->short_description;
        $solution->description = $request->description;
        $solution->rank = $oldest_soltn ? $oldest_soltn->rank + 1 : 1;

        if ($request->file('image')) {
            $solution->image = Storage::putFile('solutions', $request->file('image'));
        }

        if ($request->file('icon')) {
            $solution->icon = Storage::putFile('solutions/icon', $request->file('icon'));
        }

        $solution->save();

        try {
            if ($request->get('references')) {
                foreach ($request->get('references') as $ref_id) {
                    $solution_ref = new SolutionReference();
                    $solution_ref->solution_id = $solution->id;
                    $solution_ref->reference_id = $ref_id;
                    $solution_ref->save();
                }
            }
        } catch (\Exception $e) { }

        session()->flash('success', 'Solution created successfully');

        return redirect()->route('admin.solutions.show', ['solution' => $solution->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solution = Solution::findOrFail($id);
        return view('admin.solutions.show', compact('solution'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solution = Solution::findOrFail($id);
        $references = Reference::orderBy('name', 'ASC')->get();
        $selected_refs = $solution->references->pluck('id')->toArray();

        return view('admin.solutions.edit', compact('solution', 'references', 'selected_refs'));
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
        $solution = Solution::findOrFail($id);

        request()->validate([
            'name'              => 'required|max:191',
            'short_description' => 'required',
            'description'       => 'required',
            'image'             => 'nullable|mimes:jpg,png,svg',
            'icon'              => 'nullable|mimes:jpg,png,svg'
        ]);

        $solution->name = $request->name;
        $solution->short_description = $request->short_description;
        $solution->description = $request->description;

        if ($request->file('image')) {
            if ($solution->image) {
                Storage::delete($solution->image);
            }
            $solution->image = Storage::putFile('solutions', $request->file('image'));
        }

        if ($request->file('icon')) {
            if ($solution->icon) {
                Storage::delete($solution->icon);
            }
            $solution->icon = Storage::putFile('solutions/icon', $request->file('icon'));
        }

        try {
            if ($request->get('references')) {
                SolutionReference::where('solution_id', $solution->id)->delete();

                foreach ($request->get('references') as $ref_id) {
                    if($ref_id) {
                        $solution_ref = new SolutionReference();
                        $solution_ref->solution_id = $solution->id;
                        $solution_ref->reference_id = $ref_id;
                        $solution_ref->save();
                    }
                }
            }
        } catch (\Exception $e) { }

        $solution->save();
        session()->flash('success', 'Solution updated successfully');

        return redirect()->route('admin.solutions.show', ['solution' => $solution->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solution = Solution::findOrFail($id);
        $rank = $solution->rank;
        $solution->delete();

        foreach (Solution::where('rank', '>', $rank)->orderBy('rank', 'ASC')->get() as $soltn) {
            $soltn->rank = $soltn->rank - 1;
            $soltn->save();
        }

        session()->flash('success', 'Solution deleted successfully');
        return redirect()->route('admin.solutions.index');
    }


    public function updateRank(Request $request)
    {
        $Solution = Solution::findOrFail($request->get('id'));

        $new_rank = $request->get('rank');
        if (!$new_rank) {
            abort(422);
        }

        $oldest_Solution = Solution::orderBy('rank', 'DESC')->first();

        if ($new_rank < 1 || ($oldest_Solution && $new_rank > $oldest_Solution->rank)) {
            abort(422, 'Rank must be greater than 1 ' . $oldest_Solution ? ' and less than ' . $oldest_Solution->rank : '');
        }

        try {
            DB::transaction(function () use ($Solution, $new_rank) {
                $old_rank = $Solution->rank;
                if ($old_rank != $new_rank) {
                    $Solution->rank = 0;
                    $Solution->save();

                    // placing the item at the top half or list
                    if ($old_rank > $new_rank) {
                        foreach (Solution::where('rank', '<', $old_rank)->where('rank', '>=', $new_rank)->orderBy('rank', 'DESC')->get() as $p) {
                            $p->rank = $p->rank + 1;
                            $p->save();
                        }
                    } else {
                        // placing the item at the bottom half or list
                        foreach (Solution::where('rank', '>', $old_rank)->where('rank', '<=', $new_rank)->orderBy('rank', 'ASC')->get() as $p) {
                            $p->rank = $p->rank - 1;
                            $p->save();
                        }
                    }

                    $Solution->rank = $new_rank;
                    $Solution->save();
                }
            });
        } catch (\Exception $e) {
            abort(500);
        }

        return response()->json(['status' => 'success']);
    }
}
