@extends('layouts.app')
@section('title', $event->name)

@section('content')


<main role="main" id="main">

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Nos Évènements</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('web.events.index') }}">Nos Évènements</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$event->name}}</li>
        </ol>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row row-sm">
            <div class="col-lg-8">
                <h4>{{$event->name}}</h4>
            </div>
            <div class="col-lg-8 mb-3">
                <img src="{{ asset('storage/events/' . $event->image) }}" class="w-100">
            </div>
            <div class="col-lg-4">
                <div class="d-flex flex-column justify-content-between h-100">
                    <div class="table-responsive mb-3">
                        <table class="table table-borderless border">
                            <tr>
                                <th colspan="2"
                                    class="bg-primary-bold text-white">Details de l'Évènements</th>
                            </tr>
                            <tr>
                                <td class="text-primary-bold font-weight-bold">Date: </td>
                                <td>{{ $event->displayDate()}}</td>
                            </tr>
                            <tr>
                                <td class="text-primary-bold font-weight-bold">Temps: </td>
                                <td>{{date('h:i a', strtotime($event->start_time))}} - {{date('h:i a', strtotime($event->end_time))}}</td>
                            </tr>
                            <tr>
                                <td class="text-primary-bold font-weight-bold">Lieux: </td>
                                <td>{{$event->location}}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="article-date-block mb-3">
                        <div class="share-block ">
                            <span>Partage:</span>
                            <ul class="nav share-links flex-row">
                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fab fa-whatsapp"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <p>{!! $event->description !!}</p>
            </div>
        </div>
    </div>
</section>


</main>

@endsection

@section('footer_script')
    <script>
        $(function () {
            $('.reference-slider').owlCarousel({
                loop: true,
                nav: true,
                margin: 15,
                dots: false,
                responsive: {
                    0: {
                        items: 1.5
                    },
                    567: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                }
            });
        });
    </script>
@endsection