@extends('layouts.app')
@section('title', 'Events')

@section('content')

<main role="main" id="main">

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Nos Évènements</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nos Évènements</li>
            </ol>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <!--UPCOMING EVENTS-->
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <p class="mb-0">Nos Évènements </p>
                    <h4>Évènements À Venir</h4>
                </div>
                <a href="{{ route('upcoming-events')}}" class="link-dark d-none d-sm-block">Voir Tout
                    <img src="{{ asset('assets/img/icons/Icon-arrow-right-1.svg') }}" style="max-width: 2rem"> </a>
            </div>

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
                                <?php 
                                    //parsing date
                                    $date = \Carbon\Carbon::parse($event->created_at);
                                    $day = $date->day;
                                    $month = $date->month;
                                    $dateObj = DateTime::createFromFormat('!m', $month);
                                    $month = $dateObj->format('F'); // March
                                    $year = $date->year;
                                ?>
                                    <p class="day">{{$day}}</p>
                                    <p class="month">{{$event->created_at->format('M')}} {{$year}}</p>
                                </div>
                            </div>

                            <div class="content">
                                <h5 class="title">
                                    <a href="{{ route('web.events.show', $event->id) }}" class="link-dark">
                                        {{$event->name}}
                                    </a>
                                </h5>

                                <ul class="nav time-location">
                                    <li><img src="assets/img/icons/Icon-clock.svg"> <span>{{date('h:i a', strtotime($event->created_at))}}</span></li>
                                    <li><img src="assets/img/icons/Icon-my-location.svg">
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


            <!--PAST EVENTS-->
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <p class="mb-0">Nos Évènements </p>
                    <h4>Évènements Passés</h4>
                </div>
                <a href="{{ route('passed-events')}}" class="link-dark d-none d-sm-block">Voir Tout
                    <img src="assets/img/icons/Icon-arrow-right-1.svg" style="max-width: 2rem"> </a>
            </div>

            <div class="row">
            @foreach($eventspas as $event)
                <div class="col-md-6">
                    <div class="event-item">
                        <div class="img-wrapper">
                            <a href="{{ route('web.events.show', $event->id) }}">
                                <img src="{{ asset('storage/events/' . $event->image) }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="body">
                            <div class="event-date-block">
                                <div class="event-date">
                                <?php 
                                    //parsing date
                                    $date = \Carbon\Carbon::parse($event->created_at);
                                    $day = $date->day;
                                    $month = $date->month;
                                    $dateObj = DateTime::createFromFormat('!m', $month);
                                    $month = $dateObj->format('M'); // March
                                    $year = $date->year;
                                ?>
                                    <p class="day">{{$day}}</p>
                                    <p class="month">{{$month}} {{$year}}</p>
                                </div>
                            </div>

                            <div class="content">
                                <h5 class="title">
                                    <a href="{{ route('web.events.show', $event->id) }}" class="link-dark">
                                        {{$event->name}}
                                    </a>
                                </h5>

                                <ul class="nav time-location">
                                    <li><img src="assets/img/icons/Icon-clock.svg"> <span>{{date('h:i a', strtotime($event->created_at))}}</span></li>
                                    <li><img src="assets/img/icons/Icon-my-location.svg">
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
        $('.grid').colcade({
            columns: '.grid-col',
            items: '.grid-item'
        })
    </script>
@endsection