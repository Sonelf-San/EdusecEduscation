@extends('layouts.app')
@section('title', $new->name)

@section('content')


    <main role="main" id="main">

        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Actualités</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('web.news.index') }}">Actualités</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$new->name}}</li>
                </ol>
            </div>
        </div>

        <section class="py-5">
            <div class="container">
                <div class="text-center">
                    <h3 class="text-primary-bold">
                        {{$new->name}}
                    </h3>
                    <ul class="nav article-meta justify-content-center">
                        <li><span class="fa fa-user icon"></span>
                            <span>{{$new->author}}</span></li>
                        <li><span class="fa fa-calendar-alt icon"></span>
                            <span>{{$new->created_at->format('d')}} {{$new->created_at->format('F')}} {{$new->created_at->format('Y')}}</span>
                        </li>
                        <li><span class="fa fa-eye icon"></span>
                            <span>{{$new->reads}}</span></li>
                        <li><span class="fa fa-comment-alt icon"></span>
                            <span>13</span></li>
                    </ul>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="py-5 text-center">
                            <img src="{{ asset('storage/news/' . $new->image) }}" class="img-fluid">
                        </div>

                        <div class="description mb-4">

                            {!! $new->description !!}

                        </div>

                        <div class="share-article">
                            <div class="d-flex flex-wrap align-items-center justify-content-end">
                                <span class="mr-2">Partage:</span>
                                <ul class="nav">
                                    <li><a href="#"><img
                                                    src="{{ asset('assets/img/icons/social/icon-facebook-colored.svg') }}"></a>
                                    </li>
                                    <li><a href="#"><img
                                                    src="{{ asset('assets/img/icons/social/icon-twitter-colored.svg') }}"></a>
                                    </li>
                                    <li><a href="#"><img
                                                    src="{{ asset('assets/img/icons/social/icon-instagram-colored.svg') }}"></a>
                                    </li>
                                    <li><a href="#"><img
                                                    src="{{ asset('assets/img/icons/social/icon-pinterest-colored.svg') }}"></a>
                                    </li>
                                    <li><a href="#"><img
                                                    src="{{ asset('assets/img/icons/social/icon-linkedin-colored.svg') }}"></a>
                                    </li>
                                    <li><a href="#"><img
                                                    src="{{ asset('assets/img/icons/social/icon-whatsapp-colored.svg') }}"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" border-top border-bottom py-1 mb-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                            if($new->id === 1)
                            {
                            }
                            else
                            {
                            ?>
                            <a href="{{ route('web.news.show', $new->id-1) }}" class="btn btn-primary mr-2"><span
                                        class="fa fa-arrow-left"></span></a>
                            <span>Post précédent</span>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php
                            $last_row = \App\News::latest()->first();
                            if($new->id === $last_row->id)
                            {
                            }
                            else
                            {
                            ?>
                            <span>Prochain Post</span>
                            <a href="{{ route('web.news.show', $new->id+1) }}" class="btn btn-primary ml-2"><span
                                        class="fa fa-arrow-right"></span></a>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>


                <div class="row article-list d-none d-md-flex @if(!$prev) justify-content-end @endif">

                    @if($prev)
                        <div class="col-md-6">
                            <div class="article-card">
                                <div class="img-wrapper">
                                    <a href="{{ route('web.news.show', $prev->id) }}">
                                        <img src="{{ asset('storage/news/' . $prev->image) }}">
                                    </a>
                                </div>

                                <div class="content d-flex align-items-center">
                                    <div>
                                        <p class="title">
                                            <a href="{{ route('web.news.show', $prev->id) }}" class="link-dark">
                                                {{$prev->name}}
                                            </a>
                                        </p>
                                        <ul class="nav article-meta">
                                            <li><span class="fa fa-calendar-alt icon text-primary-bold"></span>
                                                <span>{{$prev->created_at->format('d')}} {{$prev->created_at->format('F')}} {{$prev->created_at->format('Y')}}</span>
                                            </li>
                                            <li><span class="fa fa-user icon text-primary-bold"></span>
                                                <span>{{$prev->author}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($next)
                        <div class="col-md-6">
                            <div class="article-card d-flex flex-column-reverse flex-lg-row">
                                <div class="content d-flex align-items-center">
                                    <div>
                                        <p class="title">
                                            <a href="{{ route('web.news.show', $next->id) }}" class="link-dark">
                                                {{$next->name}}
                                            </a>
                                        </p>
                                        <ul class="nav article-meta">
                                            <li><span class="fa fa-calendar-alt icon text-primary-bold"></span>
                                                <span>{{$next->created_at->format('d')}} {{$next->created_at->format('F')}} {{$next->created_at->format('Y')}}</span>
                                            </li>
                                            <li><span class="fa fa-user icon text-primary-bold"></span>
                                                <span>{{$next->author}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="img-wrapper">
                                    <a href="{{ route('web.news.show', $next->id) }}">
                                        <img src="{{ asset('storage/news/' . $next->image) }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
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