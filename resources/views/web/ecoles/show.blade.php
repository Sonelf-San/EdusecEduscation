@extends('layouts.app')
@section('title', $school->name)

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
                <h1 class="title2">Schools | Faculties</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">{{ $school->name }}</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
  <!-- END Header -->
    <div class="container">
        <div class="row">
            <div class="team-top">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="height">
                        <!-- Ads -->
                        <!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
                        <!-- ici -->
                        <!-- <ins class="adsbygoogle"
                            style="display:block"
                            data-ad-client="ca-pub-2820834451459954"
                            data-ad-slot="7392139863"
                            data-ad-format="auto"
                            data-full-width-responsive="true"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script> -->
                        <!-- Ads -->
                    </div>
                    <div class="single-team-member">
                        <div class="text-center border-soli">
                            <!-- content Start -->
                            <p class = "text-justify"> {!! $school->description !!} </p>
                            <!-- Content End -->
                            <!-- <h2><font color = "red"></font></h2> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12"><br><br>
                    <h2 class = "section-headline services-head text-center">Related Articles</h2>
                </div>
                <?php
                $qs = \App\Article::where('title', 'iLIKE', '%'. $school->logo->name .'%')
                            ->orWhere('title', 'iLIKE', '%'. $school->name .'%')
                            ->orWhere('title', 'iLIKE', '%'. $school->acronym .'%')
                            ->orWhere('description', 'iLIKE', '%'. $school->name .'%')->get();
                
            foreach($qs as $q)
            {
            ?>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="single-team-member height">
                        <div class="team-img text-center img-fluid causes-one__img">
                            <a class = "cover-img" href="">
                                <img src="{{ asset('storage/logos/' . $school->logo->image) }}" class = "" alt="">
                            </a>

                        </div>                                        
                        <div class="team-content text-center">
                            <i class="fa fa-user"></i>
                                <small>{{$q->author}}</small>                                        
                                |
                            <i class="fa fa-calendar"></i>
                            <small>{{$q->created_at->format('d M Y')}}</small>
                            |
                            <i class="fa fa-clock-o"></i>
                            <small>{{$q->created_at->diffForHumans()}}</small>
                            <div class="text-center titltesh3 border-solid">
                                <a href="" 
                                class = "text-justify titles">{{$q->title}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
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