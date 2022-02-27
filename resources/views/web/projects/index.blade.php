@extends('layouts.app')
@section('title', 'Projects')

@section('content')

<main role="main" id="main">

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Nos Projets</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nos Projets</li>
            </ol>
        </div>
    </div>

    <section class="py-5  project-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 vertically-align">
                    <div>
                        <div class="section-header">
                            <h2 class="section-title">{!! \App\Pages::find(22)->name !!}</h2>
                        </div>

                        <p>
                        {!! \App\Pages::find(22)->content !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="assets/img/projects/projects-img.png" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10 text-center">
                    <p class="mb-0 text-primary">Nos Projets</p>
                    <h4 class="mb-0">{!! \App\Pages::find(23)->name !!}</h4>
                    <p class="mb-0">{!! \App\Pages::find(23)->content !!}</p>
                </div>
            </div>

            <div class="row no-gutters recent-projects">

            @foreach($projects as $project)
                <div class="col-md-6 col-lg-4">
                    @if($loop->iteration % 2 == 0)
                    <div class="recent-project">
                        <div class="img-wrapper">
                            <a href="{{ route('web.projects.show', $project->id) }}">
                                <img src="{{ asset('storage/projects/' . $project->image) }}" alt = "Image..." class = "img-fluid">
                            </a>
                        </div>
                        <div class="title-block">
                            <h5>{{$project->title}}</h5>
                            <a href="{{ route('web.projects.show', $project->id) }}" class="btn btn-primary">Voir Le Detail</a>
                        </div>
                        </div>
                    </div>
                    @else
                    <div class="recent-project green">
                        <div class="img-wrapper">
                            <a href="{{ route('web.projects.show', $project->id) }}">
                                <img src="{{ asset('storage/projects/' . $project->image) }}" alt = "Image..." class = "img-fluid">
                            </a>
                        </div>
                        <div class="title-block">
                            <h5>{{$project->title}}</h5>
                            <a href="{{ route('web.projects.show', $project->id) }}" class="btn btn-primary">Voir Le Detail</a>
                        </div>
                        </div>
                    </div>
                @endif
            @endforeach
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10 text-center">
                    <p class="mb-0 text-primary">Nos Projets</p>
                    <h4 class="mb-0">Tous Les Projets</h4>
                </div>
            </div>
        </div>

        <div class="row no-gutters project-list">

        @foreach($more_projects as $project)
            @if($loop->iteration % 2 == 0)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-project pink">
                    <div class="img-wrapper">
                        <a href="{{ route('web.projects.show', $project->id) }}">
                            <img src="{{ asset('storage/projects/' . $project->image) }}">
                        </a>
                    </div>
                    <div class="title-block">
                        <h5 class="title">{{$project->title}}</h5>
                        <p>{!! Str::limit($project->description, 119) !!}</p>
                        <a href="{{ route('web.projects.show', $project->id) }}" class="btn btn-secondary">Voir Le Detail</a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-project">
                    <div class="img-wrapper">
                        <a href="{{ route('web.projects.show', $project->id) }}">
                            <img src="{{ asset('storage/projects/' . $project->image) }}">
                        </a>
                    </div>
                    <div class="title-block">
                        <h5 class="title">{{$project->title}}</h5>
                        <p>{!! Str::limit($project->description, 119) !!}</p>
                        <a href="{{ route('web.projects.show', $project->id) }}" class="btn btn-secondary">Voir Le Detail</a>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        </div>
        <ul class="pagination justify-content-center">
        {{ $more_projects->links() }}
        </ul>
        
    </section>


</main>
@endsection

@section('footer_script')
    <script>

    </script>
@endsection