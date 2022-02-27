@extends('layouts.app')
@section('title', 'Upcoming Events')

@section('content')

<main role="main" id="main">

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Évènements À Venir</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('web.events.index')}}">Evénements</a></li>
            <li class="breadcrumb-item active" aria-current="page">Évènements À Venir</li>
        </ol>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <!--UPCOMING EVENTS-->
        <div class="row event-list">

        @foreach($events as $event)
            <div class="col-md-12">
                <div class="event-item">
                    <div class="img-wrapper">
                        <a href="{{ route('web.events.show', $event->id) }}">
                            <img src="{{ asset('storage/events/' . $event->image) }}" class="img-fluid">
                        </a>
                    </div>
                    <div class="body">
                        <div class="event-date-block">
                            <div class="event-date">
                                <p class="day">{{$event->created_at->format('d')}}</p>
                                <p class="month">{{$event->created_at->format('M')}} {{$event->created_at->format('Y')}}</p>
                            </div>
                        </div>

                        <div class="content">
                            <h5 class="title">
                                <a href="{{ route('web.events.show', $event->id) }}" class="link-dark">
                                {{$event->name}}
                                </a>
                            </h5>

                            <ul class="nav time-location">
                                <li><img src="{{ asset('assets/img/icons/Icon-clock.svg') }}"> <span>{{date('h:i a', strtotime($event->created_at))}}</span></li>
                                <li><img src="{{ asset('assets/img/icons/Icon-my-location.svg') }}">
                                    <span>{{$event->ville}}, {{$event->pays}}</span></li>
                            </ul>

                            <p>{!! Str::limit($event->description, 183) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <div class="py-5 text-center">
            <button class="btn btn-primary">Voir Plus</button>
        </div>

    </div>
</section>


</main>

@endsection

@section('footer_script')
    <script>

    </script>
@endsection