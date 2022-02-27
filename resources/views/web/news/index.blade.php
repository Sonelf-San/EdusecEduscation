@extends('layouts.app')
@section('title', 'News')

@section('content')

<main role="main" id="main">

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Actualités</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Actualités</li>
        </ol>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row row-sm">

            <div class="col-md-8 mb-4 mb-lg-0">
                <div class="article-slider owl-carousel owl-theme">
                @foreach($news as $new)
                    <div class="item">
                        <a href="{{ route('web.news.show', $new->id) }}" class="link-dark">
                            <span class="category">{{$new->category->name}}</span>
                            <img src="{{ asset('storage/news/' . $new->image) }}" alt = "Image..." class="zoom-hover">
                            <p class="title">{{$new->name}}</p>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>


            <div class="col-md-4 d-none d-md-block">
            @foreach($news as $new)
                <div class="article-card">
                    <div class="img-wrapper">
                        <a href="{{ route('web.news.show', $new->id) }}">
                            <span class="category">{{$new->category->name}}</span>
                            <img src="{{ asset('storage/news/' . $new->image) }}" alt = "Image...">
                        </a>
                    </div>

                    <div class="content">
                        <ul class="nav article-meta">
                            <li><span class="fa fa-calendar-alt icon"></span>
                                <span>{{$new->created_at->format('d')}} {{$new->created_at->format('F')}} {{$new->created_at->format('Y')}}</span></li>
                            <li><span class="fa fa-user icon"></span>
                                <span>{{$new->author}}</span></li>
                        </ul>

                        <h6>
                            <a href="{{ route('web.news.show', $new->id) }}" class="link-dark">
                            {{$new->name}}
                            </a>
                        </h6>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>




<section class="py-5">
    <div class="container">
        <div class="row article-list">

        @foreach($more_news as $new)
            <div class="col-md-6">
                <div class="article-card">
                    <div class="img-wrapper">
                        <a href="{{ route('web.news.show', $new->id) }}">
                            <span class="category">{{$new->category->name}}</span>
                            <img src="{{ asset('storage/news/' . $new->image) }}" alt = "Image..." class = "img-fluid">
                        </a>
                    </div>

                    <div class="content">
                        <ul class="nav article-meta">
                            <li><span class="fa fa-calendar-alt icon"></span>
                                <span>{{$new->created_at->format('d')}} {{$new->created_at->format('F')}} {{$new->created_at->format('Y')}}</span></li>
                            <li><span class="fa fa-user icon"></span>
                                <span>{{$new->author}}</span></li>
                        </ul>

                        <p class="title">
                            <a href="{{ route('web.news.show', $new->id) }}" class="link-dark">
                                {{$new->name}}
                            </a>
                        </p>
                        <p>{!! Str::limit($new->description, 67) !!}</p>
                        <div class="cta">
                            <a href="{{ route('web.news.show', $new->id) }}">Lire La Suite <i class="fa fa-arrow-right"></i></a>
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