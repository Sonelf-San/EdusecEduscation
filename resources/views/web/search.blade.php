@extends('layouts.app')
@section('title', $_GET['query'])

@section('content')
<main role="main" id="main">

  <!-- Start Bottom Header -->
    <div class="header-bg page-area">
        <div class="home-overly"></div>
            <div class="container">
                <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slider-content text-center">
                                    <div class="header-bottom">
                                        <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                                            <h1 class="title2">Edusec Search</h1>
                                        </div>
                                        <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                                            <h2 class="title3">{{$_GET['query']}}</h2>
                                        </div>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row"> -->
        <div class="container">
            <div class="single-blog-page">
                <!-- search option start -->
                @include('layouts.searchform')
                <!-- search option end -->
            </div>
            <div class="row">
                <div class="team-top">
                    @if($posts->count() == 0)
                    <div class="container col-md-12 col-sm-12 col-xs-12">
                        <div class="single-team-member height">
                            <div class="text-center border-soli">
                                <h2><font color = "red">No results for "{{$_GET['query']}}"</font></h2>
                            </div>
                        </div>
                    </div>
                    @else
                    @foreach($posts as $post)
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="single-team-member height">
                                <div class="team-img text-center img-fluid causes-one__img">
                                    <a class = "cover-img" href="{{ route('web.postdetail', $post->slug) }}">
                                        <img src="{{ $post->getLogoUrl() }}" class = "" alt="">
                                    </a>
     
                                </div>                                        
                                <div class="team-content text-center">
                                    <i class="fa fa-user"></i>
                                        <small>{{$post->author}}</small>                                        
                                        |
                                    <i class="fa fa-calendar"></i>
                                    <small>{{$post->created_at->format('d M Y')}}</small>
                                    <div class="text-center titltesh3 border-solid">
                                    <a href="{{ route('web.postdetail', $post->slug) }}" 
                                    class = "text-justify titles">{{$post->title}}</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
                

        <!-- <div class="row text-center">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg">
                    </ul>
                </nav>
            </div>
        </div> -->

        </div>
    <!-- </div> -->
</main>

@endsection

@section('footer_script')
    <script>

    </script>
@endsection