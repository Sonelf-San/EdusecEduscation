<?php

namespace App\Http\Controllers;

use App\TeamMember;
use App\News;
use App\Article;
use App\Project;
use App\Event;
use App\Partner;
use App\Gallery;
use App\Category;
use App\School;
use Mail;

use Carbon\Carbon;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(4);
        // $partners = Partner::orderBy('id', 'DESC')->paginate(8);
        // $members = TeamMember::orderBy('rank', 'DESC')->get();
        // return view('home', compact('articles', 'partners', 'members'));
        return view('home', compact('articles'));

    }

    public function search()
    {
        $query = $_GET['query'];
        $posts = Article::where('title', 'iLIKE', '%'. $query. '%')
        ->orWhere('description', 'iLIKE', '%'. $query. '%')
        ->where('status', 1)->get();
        // ->paginate(10);
        return view('web.search', compact('posts'));
    }

    public function searchDetails($slug)
    {
        // $article = Article::findOrFail($id);
        $articleshow = Article::where('slug', $slug)->first();
        // dd($articleshow->id);
        $articleshow->incrementReadCount();
        $recents = Article::orderBy('id', 'DESC')->where('id', '!=', $articleshow->id)->paginate(4);
        return view('web.postdetail', compact('articleshow', 'recents'));
    }

    public function about()
    {
        $partners = Partner::orderBy('id', 'DESC')->get();
        return view('web.about.index', compact('partners'));
    }

    public function team()
    {
        $members = TeamMember::orderBy('rank', 'ASC')->get();
        return view('web.about.team', compact('members'));
    }

    public function gallery()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->paginate(6);
        return view('web.gallery.index', compact('galleries'));
    }

    public function galleryshow($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('web.gallery.show', compact('gallery'));
    }

    public function concours()
    {
        $category = Category::orderBy('id', 'DESC');
        $concours = Article::orderBy('id', 'DESC')->where('category_id', '=', 1)->paginate(12);
        $recents = Article::orderBy('id', 'DESC')->paginate(4);
        return view('web.concours.index', compact('concours', 'recents'));
    }

    public function concoursshow($slug)
    {
        // $article = Article::findOrFail($id);
        $articleshow = Article::where('slug', $slug)->first();
        $articleshow->incrementReadCount();
        $recents = Article::orderBy('id', 'DESC')->where('id', '!=', $articleshow->id)->paginate(4);
        return view('web.concours.show', compact('articleshow', 'recents'));
    }

    public function bourses()
    {
        $bourses = Article::orderBy('id', 'DESC')->where('category_id', '=', 2)->paginate(12);
        $recents = Article::orderBy('id', 'DESC')->paginate(4);
        return view('web.bourses.index', compact('bourses', 'recents'));
    }

    public function boursesshow($slug)
    {
        // $articleshow = Article::whereSlug($slug);
        $articleshow = Article::where('slug', $slug)->first();
        // dd($articleshow->id);
        $recents = Article::orderBy('id', 'DESC')->where('id', '!=', $articleshow->id)->paginate(4);
        $articleshow->incrementReadCount();
        return view('web.bourses.show', compact('articleshow', 'recents'));
    }

    public function ecoles()
    {
        $schools = School::orderBy('id', 'DESC')->paginate(6);
        return view('web.ecoles.index', compact('schools'));
    }

    public function ecolesshow($slug)
    {
        // $school = School::whereSlug($slug)->first();
        $school = School::where('slug', $slug)->first();
        $school->incrementReadCount();
        return view('web.ecoles.show', compact('school'));
    }

    public function events()
    {
        $events = Event::orderBy('id', 'DESC')
        ->where('start_date', '>', Carbon::now()->toDateString())
        ->orWhere('end_date', '>', Carbon::now()->toDateString())
        ->paginate(2);

        $eventspas = Event::orderBy('id', 'DESC')
        ->where('start_date', '<', Carbon::now()->toDateString())
        ->orWhere('end_date', '<', Carbon::now()->toDateString())
        ->paginate(2);
        return view('web.events.index', compact('events', 'eventspas'));
    }

    public function upcomingevents()
    {
        $events = Event::orderBy('id', 'DESC')
        ->where('start_date', '>', Carbon::now()->toDateString())
        ->orWhere('end_date', '>', Carbon::now()->toDateString())
        ->paginate(4);
        return view('web.events.upcoming', compact('events'));
    }

    public function passedevents()
    {
        $events = Event::orderBy('id', 'DESC')
        ->where('start_date', '<', Carbon::now()->toDateString())
        ->orWhere('end_date', '<', Carbon::now()->toDateString())
        ->paginate(4);
        return view('web.events.passed', compact('events'));
    }

    public function eventsshow($id)
    {
        $event = Event::findOrFail($id);
        return view('web.events.show', compact('event'));
    }

    public function news()
    {
        $news = News::orderBy('id', 'DESC')->paginate(2);
        $more_news = News::orderBy('id', 'DESC')->paginate(8);
        return view('web.news.index', compact('news', 'more_news'));
        // return view('web.news.index');
    }

    public function new($id)
    {
        $new = News::findOrFail($id);
        $new->incrementReadCount();

        $next = News::where('id', '>', $id)->orderBy('id')->first();
        $prev = News::where('id', '<', $id)->orderBy('id', 'DESC')->first();
        return view('web.news.show', compact('new', 'next', 'prev'));
    }

    // public function contact()
    // {
    //     return view('web.contact.index');
    // }

    public function senMail(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'messages' => 'required'
    ]);

        //  Sending mail
        $send = Mail::send('web.mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject'=> $request->get('subject'),
            'messages' => $request->get('messages'),
        ), function($message) use ($request){
            $message->from($request->get('email'));
            // $message->to(settings()->get('notify_email'))->subject('New message');
            $message->to('elfridsonfack@gmail.com', 'Edusec Manager')->subject('New message');
        });

        return response()->json(['success' => 'We have received your message and we will get back to you soon.']);
    }
}
