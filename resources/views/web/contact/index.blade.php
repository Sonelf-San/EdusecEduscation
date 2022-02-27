@extends('layouts.app')
@section('title', 'Welcome')

@section('content')

<main role="main" id="main">

    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Nous Contacter</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nous Contacter</li>
            </ol>
        </div>
    </div>

    <section class="py-5">
        <div class="container">

            <div class="section-header center">
                <h2 class="section-title">{!! \App\Pages::find(24)->name !!}</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 mb-4">
                    <p class="font-weight-bold text-center">{!! \App\Pages::find(24)->content !!}</p>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="/contact" class="mb-5">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group floating">
                            <input type="text" value="{{ old('name') }}" name = "name" class="form-control {{ $errors->has('name') ? 'error' : '' }}"/>
                            <label>Name</label>
                            <!-- Error -->
                        @if ($errors->has('name'))
                        <div class="error text-danger">
                            {{ $errors->first('name') }}
                        </div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group floating">
                            <input type="email" value="{{ old('email') }}" name = "email" class="form-control {{ $errors->has('email') ? 'error' : '' }}"/>
                            <label>Email</label>
                            <!-- Error -->
                        @if ($errors->has('email'))
                        <div class="error text-danger">
                            {{ $errors->first('email') }}
                        </div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class=" form-group floating">
                            <textarea class="form-control" name = "commentaire" rows="9">
                            {{ old('commentaire') }}
                            </textarea>
                            <label>Entrez un commentaire ici</label>
                            @if ($errors->has('commentaire'))
                        <div class="error text-danger">
                            {{ $errors->first('commentaire') }}
                        </div>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Soumettre Votre Commentaire</button>
                </div>
            </form>
        </div>
    </section>

    <div class="row row-sm flex-column-reverse flex-lg-row">
        <div class="col-lg-8">
            <div id="map"></div>
        </div>
        <div class="col-lg-4">
            <div class="contact-info-title">
                <small class="d-block text-primary">Trouve nous</small>
                <h4>Nous sommes là pour<br>
                    vous aider</h4>
            </div>

            <div class="contact-info">
                <img src="assets/img/icons/icon-message-contacte.svg">
                <div class="info">
                    <p class="mb-0"><a href="mailto:info@vosemail.com" class="link-dark">info@vosemail.com</a></p>
                    <p class="mb-0"><a href="mailto:contact@vosemail.com" class="link-dark">contact@vosemail.com</a></p>
                </div>
            </div>
            <div class="contact-info">
                <img src="assets/img/icons/icon-phone-contacte.svg">
                <div class="info">
                    <p class="mb-0"><a href="tel:+237 254 458 458" class="link-dark">+237 254 458 458</a></p>
                    <p class="mb-0"><a href="tel:+237 254 458 458" class="link-dark">+237 254 458 458</a></p>
                </div>
            </div>
            <div class="contact-info">
                <img src="assets/img/icons/icon-location-contacte.svg">
                <div class="info">
                    <p class="mb-0">Boulevard de L'Unite,<br>
                        Douala, Littoral Region</p>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection

@section('footer_script')

    <script src="{{ asset('assets/js/map.js') }}"></script>

@endsection