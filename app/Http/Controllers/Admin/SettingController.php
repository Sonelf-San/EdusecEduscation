<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {

        $settings = settings()->all($fresh = true);
        return view('admin.settings', compact('settings'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'contact_email'    => 'required|email|max:191',
            'contact_email_2'  => 'nullable|email|max:191',
            'contact_phone'    => 'required|max:191',
            'contact_phone_2'  => 'nullable|max:191',
            'notify_email'     => 'required|email|max:191',

            'post_box'          => 'required|string|max:191',
            'address'           => 'required|string|max:191',

            'facebook_url'  => 'nullable|url|max:191',
            'twitter_url'   => 'nullable|url|max:191',
            'instagram_url' => 'nullable|url|max:191',
            'linkedin_url'  => 'nullable|url|max:191',

        ]);

        settings()->set([
            'contact_email'    => $request->contact_email,
            'contact_email_2'  => $request->contact_email_2,
            'contact_phone'    => $request->contact_phone,
            'contact_phone_2'  => $request->contact_phone_2,
            'notify_email'     => $request->notify_email,

            'post_box'          => $request->post_box,
            'address'           => $request->address,

            'facebook_url'  => $request->facebook_url,
            'twitter_url'   => $request->twitter_url,
            'instagram_url' => $request->instagram_url,
            'linkedin_url'  => $request->linkedin_url,
        ]);

        session()->flash('success', "Settings updated successfully");
        return redirect()->back();
    }
}
