@extends('layouts.app')
@section('title', $project->title)

@section('content')

<main role="main" id="main">

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Nos Projets</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('web.projects.index') }}">Nos Projets</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$project->title}}</li>
        </ol>
    </div>
</div>

<div class="container h-100">
    <div class="100 shadow py-5 px-2 px-md-5">
        <h4>{{$project->title}}</h4>

        <div class="mb-5">
            <img src="{{ asset('storage/projects/' . $project->image) }}" class="img-fluid w-100">
            <div class="article-date-block">
                <div class="share-block d-flex align-items-center justify-content-end mt-2">
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


        <div>
           {!! $project->description !!}
        </div>

    </div>
</div>

</main>
@endsection

@section('footer_script')
    <script>
        $(function () {
            $('.other-product-slider').owlCarousel({
                loop: true,
                nav: false,
                margin: 10,
                dots: false,
                responsive: {
                    0: {
                        items: 2
                    },
                    567: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 5
                    }
                }
            });
        })
    </script>
@endsection