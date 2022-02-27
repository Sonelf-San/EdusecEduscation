@extends('layouts.app')
@section('title', 'Gallery')

@section('content')

<main role="main" id="main">

<div class="page-header">
    <div class="container">
        <h1 class="page-title">Galerie</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="#">Nous connaître </a></li>
            <li class="breadcrumb-item active" aria-current="page">Galerie</li>
        </ol>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row row-sm gallery-list">
        
        @foreach($galleries as $gallery)
            <div class="col-md-6 col-lg-4">
                <div class="gallery-item">
                    <div class="img-wrapper">
                        <a href="{{ route('web.gallery.show', $gallery->id) }}">

                            <img src="{{ asset('storage/galleries/' . $gallery->image) }}" class="img-fluid">
                        </a>
                    </div>
                    <a href="{{ route('web.gallery.show', $gallery->id) }}" class="title">{{$gallery->name}}</a>
                </div>
            </div>

        @endforeach
        </div>

        
    </div>
</div>
</main>
@endsection

@section('footer_script')
    <script>
        $(function () {
            var cert_carousel = $('#certificates');
            cert_carousel.owlCarousel({
                items: 1,
                margin: 10,
                dots: false,
                nav: true,
                autoHeight:true,
                loop: true,
                navText: [
                    '<div><span class="fa fa-angle-left icon"></span> <span class="btn-text">Précédent</span></div>',
                    '<div><span class="btn-text">Suivant</span> <span class="fa fa-angle-right icon"></span></div>'
                ]
            });

            $('.toggle-cert-modal').on('click', function ($e) {
                $e.preventDefault();

                var position = $(this).attr('data-id');

                if (position) {
                    $('#cert_modal').modal('show');
                    cert_carousel.trigger('to.owl.carousel', position)
                }
            });

        });
    </script>
@endsection