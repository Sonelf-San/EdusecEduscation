@extends('layouts.app')
@section('title', 'Schools | Faculties')

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
                <h1 class="title2">Edusec</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">Schools | Faculties</h2>
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
        @include('layouts.searchform')
        <div class="row">
            <div class="team-top">
                @foreach($schools as $post)
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="single-team-member height">
                            <div class="team-img text-center img-fluid causes-one__img">
                                <a class = "cover-img" href="{{ route('web.ecoles.show', $post->slug) }}">
                                    <img src="{{ asset('storage/logos/' . $post->logo->image) }}" class = "" alt="">
                                </a>

                            </div>                                        
                            <div class="team-content text-center">
                                <i class="fa fa-user"></i>
                                    <small>{{$post->author}}</small>                                        
                                    |
                                <i class="fa fa-calendar"></i>
                                <small>{{$post->created_at->format('d M Y')}}</small>
                                <div class="text-center titltesh3 border-solid">
                                <a href="{{ route('web.ecoles.show', $post->slug) }}" 
                                class = "text-justify titles">{{$post->acronym}} : {{$post->name}}</a>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-lg">
                {{ $schools->links() }}
                </ul>
            </nav>
        </div>
      </div>
  <!-- End Blog Area -->

</main>

@endsection

@section('footer_script')
    <script>
        $(function () {
            var ref_carousel = $('#references');
            ref_carousel.owlCarousel({
                items: 1,
                margin: 10,
                dots: false,
                nav: true,
                loop: true,
                mouseDrag: false,
                touchDrag: false,
                autoHeight: true,
                animateOut: 'fadeOut',
                animateIn: 'flipInX',
                navText: [
                    '<div><span class="fa fa-arrow-left icon"></span></div>',
                    '<div><span class="fa fa-arrow-right icon"></span></div>'
                ]
            });

            ref_carousel.on('changed.owl.carousel', function ($event) {
                if ($($event.target).hasClass('reference-slide')) {
                    var position = getPosition($event);
                    $('#ref_current_slide').html(position ? position : 1);
                }
            });

            function getPosition(e) {
                if (e.item) {
                    var index = e.item.index - 1;
                    var count = e.item.count;
                    if (index > count) {
                        index -= count;
                    }
                    if (index <= 0) {
                        index += count;
                    }
                    return index;
                }
            }

            $('.toggle-ref-modal').on('click', function ($e) {
                $e.preventDefault();

                var position = $(this).attr('data-id');

                if (position) {
                    ref_carousel.trigger('to.owl.carousel', position);
                    setTimeout(() => {
                        $('#reference_modal').modal('show');
                    });
                }
            });

            $('.ref_photos').owlCarousel({
                items: 4,
                margin: 10,
                dots: false,
                nav: false,
                loop: true,
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
            })
        });
    </script>
@endsection