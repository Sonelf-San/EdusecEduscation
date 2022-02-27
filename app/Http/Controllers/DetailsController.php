<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //
    public function gallery()
    {
        return view('web.gallery.show');
    }

    public function projects()
    {
        return view('web.projects.show');
    }

    public function events()
    {
        return view('web.events.show');
    }

    public function activities()
    {
        return view('web.activities.show');
    }

    public function news()
    {
        return view('web.news.show');
    }

    public function upcomingevents()
    {
        return view('web.upcoming-events');
    }
}
