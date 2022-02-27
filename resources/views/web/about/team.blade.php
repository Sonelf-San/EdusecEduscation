@extends('layouts.app')
@section('title', 'Welcome')

@section('content')

<main role="main" id="main">

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Notre Equipe</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('web.about.index') }}">Nous connaître </a></li>
            <li class="breadcrumb-item active" aria-current="page">Notre Equipe</li>
        </ol>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="about-img-wrapper">
                    <img src="{{ asset('assets/img/Notre_Equipe_1.png')}}" class="img-fluid">
                    <div class="text-center mt-3">
                        <h4 class="mb-0">Kautzer Block Ari</h4>
                        <p class="mb-0 text-primary">Fondateur</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 vertically-align">
                <div>
                    <h1 class="text-uppercase">{!! \App\Pages::find(18)->name !!} </h1>
                    <p>{!! \App\Pages::find(18)->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="section-header center">
            <h2 class="section-title">{!! \App\Pages::find(19)->name !!}</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <p class="text-center mb-4">
                {!! \App\Pages::find(19)->content !!}</p>
            </div>
        </div>

        <div class="row team-card-deck">

        @foreach($members as $member)
            <div class="col-md-6 col-lg-4">
                <div class="team-member">
                    <ul class="social-links nav">
                        <li><a href="{{$member->facebook}}"><span class="fab fa-facebook-f"></span></a></li>
                        <li><a href="{{$member->twitter}}"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="{{$member->youtube}}"><span class="fab fa-youtube"></span></a></li>
                        <li><a href="{{$member->linkedin}}"><span class="fab fa-linkedin-in"></span></a></li>
                    </ul>
                    <div class="img-wrapper">
                        <a href="#" class="team-member-action">
                            <img src="{{ asset('storage/team_members_pictures/' . $member->image) }}" alt = "Image team" class="img-fluid">
                        </a>
                    </div>
                    <div class="content">
                        <div class="top-section">
                            <a href="#" class="link-dark team-member-action">
                                <h5 class="name">{{$member->name}}</h5>
                            </a>
                            <p class="position">{{$member->position}}</p>
                        </div>
                        <div class="description">
                            <p>{{$member->description}}</p>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach


            </div>
            
            
    </div>
</section>


<section class="join-team-cta">
    <div class="container text-center position-relative" style="z-index: 1">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <p class="mb-0 line-height-1 text-secondary">Rejoins l'équipe</p>
                <h4 class="mb-4">{!! \App\Pages::find(20)->name !!}</h4>
                <p class="mb-5">
                {!! \App\Pages::find(20)->content !!}</p>
                <a href="#" class="btn btn-primary">Devenir Bénévole</a>
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