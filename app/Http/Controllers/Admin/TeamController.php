<?php

namespace App\Http\Controllers\Admin;

use App\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = TeamMember::orderBy('rank', 'ASC')->get();
        return view('admin.team_members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status_list = ['published' => 'Published', 'draft' => 'Draft'];
        return view('admin.team_members.create', compact('status_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:191',
            'position'    => 'required|string|max:116',
            'facebook'    => 'nullable|string|max:191|url',
            'twitter'     => 'nullable|string|max:191|url',
            'linkedin'    => 'nullable|string|max:191|url',
            'youtube'     => 'nullable|string|max:191|url',
            'description' => 'required|string|max:116',
            'image'       => 'required|mimes:jpg,png,svg|dimensions:ratio=1/1,min_width=357'
        ]);

    // if($request->file('image'))
    // {
        //Getting the file name with extension
        $image = $request->file('image');
        $filenameWithExt = $image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $pat = $image->storeAs('public/team_members_pictures', $fileNameToStore);
        // Storage::putFile('public/team_members_pictures', $fileNameToStore);
    // }
    // else
    // {
    //     $fileNameToStore = 
    // }

        // get the largest ranking team member or assign rank=1 assuming its first item
        $oldest_team_mem = TeamMember::orderBy('rank', 'DESC')->first();

        $team_member = TeamMember::create([
            'name'        => $request->name,
            'position'    => $request->position,
            'image'       => $fileNameToStore,
            'facebook'    => $request->facebook,
            'twitter'     => $request->twitter,
            'linkedin'    => $request->linkedin,
            'youtube'     => $request->youtube,
            'description' => $request->description,
            'rank'        => $oldest_team_mem ? $oldest_team_mem->rank + 1 : 1
        ]);

        session()->flash('success', 'Team Member successfully added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $members = TeamMember::findorFail($id);
        return view('admin.team_members.edit', compact('members'));
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
        $members = TeamMember::findorFail($id);

        $this->validate($request, [
            'name'        => 'required|string|max:191',
            'position'    => 'required|string|max:116',
            'facebook'    => 'nullable|string|max:191|url',
            'twitter'     => 'nullable|string|max:191|url',
            'linkedin'    => 'nullable|string|max:191|url',
            'youtube'     => 'nullable|string|max:191|url',
            'description' => 'required|string|max:116',
            'image'       => 'nullable|mimes:jpg,png,svg|dimensions:ratio=1/1,min_width=357'
        ]);

        if ($request->file('image')) {
            // delete old file
            if ($members->image) {
                Storage::delete('public/team_members/' . $members->image);
            }

            //Getting the file name with extension
            $image = $request->file('image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $pat = $image->storeAs('public/team_members_pictures', $fileNameToStore);
            $members->image = $fileNameToStore;
            // $members->image = Storage::putFile('public/team_members_pictures', $request->file('image'));
        }

        $members->name = $request->name;
        $members->position = $request->position;
        $members->facebook = $request->facebook;
        $members->twitter = $request->twitter;
        $members->linkedin = $request->linkedin;
        $members->youtube = $request->youtube;
        $members->description = $request->description;

        $members->save();

        Session::flash('success', 'Team Member updated successfully');
        return redirect()->route('admin.team_members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $members = TeamMember::findorFail($id);
        $rank = $members->rank;

        if ($members->image) {
            Storage::delete('public/team_members/' . $members->image);
        }

        $members->delete();

        foreach (TeamMember::where('rank', '>', $rank)->orderBy('rank', 'ASC')->get() as $member) {
            $member->rank = $member->rank - 1;
            $member->save();
        }


        Session::flash('success', 'Team Member deleted successfully');
        return redirect()->route('admin.team_members.index');
    }

    public function updateRank(Request $request)
    {
        $member = TeamMember::findOrFail($request->get('id'));

        $new_rank = $request->get('rank');
        if (!$new_rank) {
            abort(422);
        }

        $oldest_member = TeamMember::orderBy('rank', 'DESC')->first();

        if ($new_rank < 1 || ($oldest_member && $new_rank > $oldest_member->rank)) {
            abort(422, 'Rank must be greater than 1 ' . $oldest_member ? ' and less than ' . $oldest_member->rank : '');
        }

        try {
            DB::transaction(function () use ($member, $new_rank) {
                $old_rank = $member->rank;
                if ($old_rank != $new_rank) {
                    $member->rank = 0;
                    $member->save();

                    // placing the item at the top half or list
                    if ($old_rank > $new_rank) {
                        foreach (TeamMember::where('rank', '<', $old_rank)->where('rank', '>=', $new_rank)->orderBy('rank', 'DESC')->get() as $p) {
                            $p->rank = $p->rank + 1;
                            $p->save();
                        }
                    } else {
                        // placing the item at the bottom half or list
                        foreach (TeamMember::where('rank', '>', $old_rank)->where('rank', '<=', $new_rank)->orderBy('rank', 'ASC')->get() as $p) {
                            $p->rank = $p->rank - 1;
                            $p->save();
                        }
                    }

                    $member->rank = $new_rank;
                    $member->save();
                }
            });
        } catch (\Exception $e) {
            abort(500);
        }

        return response()->json(['status' => 'success']);
    }
}
