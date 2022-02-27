@extends('layouts.app')
@section('ogtags')
    @include('layouts.og_tags', ['title' => 'my title', 'image' => 'my-image.png'])
@endsection
@section('title', $articleshow->title)

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
                <!-- <h1 class="title2"> Concours</h1> -->
              </div>
              <div class="layer4 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title4">{{$articleshow->title}}</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Header -->
  <div class="blog-page area-padding">
    <div class="container">
            <div class="single-blog-page">
                <!-- search option start -->
                <!-- @include('layouts.searchform') -->
                <!-- search option end -->
            </div>
      <div class="row">
        <!-- Start left sidebar -->
        @include('layouts.leftside')
        <!-- End left sidebar -->
   
        <!-- Start single blog -->
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <!-- single-blog start -->
              <article class="blog-post-wrapper">
                <div class="post-thumbnail ">
                  <img src="{{ asset($articleshow->getLogoUrl()) }}" alt="" class = "text-center" />
                </div>
                <div class="post-information">
                  <h2>{{$articleshow->title}}</h2>
                  <div class="entry-meta">
                    <span class="author-meta"><i class="fa fa-user"></i> <a href="#">{{$articleshow->author}}</a></span>
                    <span><i class="fa fa-calendar"></i> {{$articleshow->created_at->format('d M Y')}}</span>
                    <span><i class="fa fa-clock-o"></i> {{$articleshow->created_at->format('h:i A')}}</span>
                    <span>
												<i class="fa fa-tags"></i>
												<a href="#">{{$articleshow->logo->name}}</a>,
											</span>
                    <span><i class="fa fa-eye"></i> <a href="#">{{ $articleshow->reads}}</span>
                  </div>
                  <div class="text-justify">
                    <p>{{ Str::limit(strip_tags($articleshow->description), 300) }}</p>
                    @if($articleshow->count() > 1)
                      <ol>
                        @foreach($articleshow->art_files as $art)
                            <li>
                            <a href="{{ asset('storage/articles/'.$art->file) }}" alt="" class = "text-center">{{$art->file}}</a>
                            </li>
                        @endforeach
                      </ol>
                    @else
                      <ul>
                        @foreach($articleshow->art_files as $art)
                        <li>
                        <a href="{{ asset('storage/articles/'.$art->file) }}" alt="" class = "text-center">{{$art->file}}</a>
                        </li>
                        @endforeach
                      </ul>
                    @endif
                  </div>
                </div>
              </article>
              <div class="clear"></div>
              <div class="single-post-comments">
                @include('layouts.facebookcomment')
              </div>
              <!-- single-blog end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Area -->
  <div class="clearfix"></div>
</main>

@endsection

@section('footer_script')
    <script>
        $(function () {
            $('.reference-image-slider').owlCarousel({
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
                }
            });

            $('.other-references-slider').owlCarousel({
                loop: true,
                nav: false,
                margin: 10,
                dots: false,
                responsive: {
                    0: {
                        items: 1.35
                    },
                    567: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                }
            });
        })
    </script>
@endsection