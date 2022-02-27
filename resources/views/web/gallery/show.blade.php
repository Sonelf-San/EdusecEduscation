@extends('layouts.app')
@section('title', $gallery->name)

@section('content')


<main role="main" id="main">

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Galerie</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="#">Nous connaître </a></li>
                <li class="breadcrumb-item"><a href="#">Galerie </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$gallery->name}}</li>
            </ol>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row row-sm justify-content-center mb-4">
                <div class="col-lg-10 text-center">
                    <h3>{{$gallery->name}}</h3>
                    <p>
                    {!! $gallery->description !!}
                    </p>
                </div>
            </div>

            <h4 class="text-center text-muted mb-4">Les Photo</h4>
            <div class="row no-gutters gallery-images">

            @foreach($gallery->gal_images as $gal)
                <div class="col-6 col-md-4 col-lg-3 single-image">
                    <a href="#" data-id="{{$loop->index}}">
                        <img src="{{ asset('storage/galleries/' . $gal->image) }}" alt = "Image...">
                    </a>
                </div>
            @endforeach

            </div>
            <div class="modal fade" id="gallery_modal" tabindex="-1" role="dialog"
                 aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button class="gallery-modal-close" data-dismiss="modal">
                                <span class="fa fa-times"></span></button>

                            <div class="owl-carousel owl-theme gallery-lightbox-slide" id="gallery_lightbox_slide">
                            @foreach($gallery->gal_images as $gal) 
                                <div class="item">
                                    <img src="{{ asset('storage/galleries/' . $gal->image) }}" class="img-fluid">
                                </div>
                            @endforeach
                            </div>


                            <div class="row justify-content-end">
                                <div class="col-lg-4 position-relative">
                                    <p class="gallery-slide-count"><span id="gallery_current_slide">1</span>/{{count($gallery->gal_images)}}</p>
                                </div>
                                <div class="col-lg-8">
                                    <div class="owl-carousel owl-theme gallery-nav-slide" id="gallery_nav_slide">
                                    
                                    @foreach($gallery->gal_images as $gal)   
                                        <a href="#" class="item" data-id="{{$loop->index}}">
                                            <img src="{{ asset('storage/galleries/' . $gal->image) }}">
                                        </a>
                                    @endforeach
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
</main>


@endsection

@section('footer_script')

@endsection