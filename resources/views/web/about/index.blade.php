@extends('layouts.app')
@section('title', 'Welcome')

@section('content')


<main role="main" id="main">

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Nous connaître</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="#">Nous connaître </a></li>
                <li class="breadcrumb-item active" aria-current="page">Qui Sommes Nous</li>
            </ol>
        </div>
    </div>

    <div class="section">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-md-0">
                    <div class="section-header">
                        <h2 class="section-title">Qui Sommes Nous
                            <span class="float">A propos</span>
                        </h2>
                    </div>
                    <p class="font-weight-bold">{!! \App\Pages::find(11)->content !!}</p>
                    <div class="nfd-checklist">
                        <div class="nfd-checklist-item">
                            <span>{!! \App\Pages::find(12)->content !!}</span>
                        </div>
                        <div class="nfd-checklist-item">
                            <span>{!! \App\Pages::find(13)->content !!}</span>
                        </div>
                        <div class="nfd-checklist-item">
                            <span>{!! \App\Pages::find(14)->content !!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us-bg">
                        <div class="img-wrapper">
                            <img src="assets/img/about_imgage_1.png" class="img-fluid">
                            <div class="bg-1"></div>
                            <div class="bg-2"></div>
                            <div class="bg-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shadow py-5">
        <div class="container position-relative">
            <img src="assets/img/bg/about_video.png" class="w-100">
            <a href="#" data-toggle="modal" data-target="#aboutUsVideo">
                <div class="about-us-play">
                    <img src="assets/img/icons/icon_play_btn.svg">
                    <span class="play-text"> Regarder la vidéo</span>
                </div>
            </a>
        </div>

        <div class="modal fade about-us-video-modal" id="aboutUsVideo" tabindex="-1"
             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="about-us-video-modal-video-wrapper">
                            <iframe src="https://www.youtube.com/embed/ScMzIvxBSi4" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-bg-2">
        <div class="py-5 my-md-5">
            <div class="container">
                <div class="row ">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <img src="assets/img/Nous_Connaitre_bg_img_-1.png" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="section-header">
                            <h2 class="section-title">Notre Mission</h2>
                        </div>
                        <p class="font-weight-bold">
                        {!! \App\Pages::find(15)->content !!}
                        </p>
                        <p>
                        {!! \App\Pages::find(16)->content !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-pink">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0 vertically-align">
                    <div>
                        <p class="mb-0">{!! \App\Pages::find(17)->name !!}</p>
                        <h3>Qui Nous Soutiennent</h3>
                        <p>{!! \App\Pages::find(17)->content !!}</p>
                        <a href="#" class="btn btn-secondary">Devenir Un Partenaire</a>
                    </div>
                </div>
                <div class="col-md-6 about-partner-list">
                        <div>
                            <div class="row row-sm">
                            @foreach($partners as $partner)
                                <div class="col-6 col-md-4">
                                    <div class="single-partner">
                                        <div class="img-wrapper">
                                            <img src="{{ asset('storage/partners/' . $partner->image) }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection

@section('footer_script')
    <script>

    </script>
@endsection