@extends('layouts.app')
@section('title', 'Welcome')

@section('content')
    <!-- Hero slider -->
    <div class="hero-slider owl-carousel" id="home_hero_slider">
        <div class="hero-slider-item">
            <div class="content">
                <p class="intro ">Appelez-Nous Aujourd'hui</p>
                <h1 class="title">Les Meilleurs Services</h1>
                <p class="text-white font-weight-bold">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                    diam nonummy nibh.</p>

                <a href="#" class="btn btn-cta text-uppercase font-weight-bold mt-5">En Savoir Plus</a>
            </div>
        </div>
        <div class="hero-slider-item bg-2">
            <div class="content">
                <p class="intro ">Appelez-Nous Aujourd'hui</p>
                <h1 class="title">Plusieurs Services</h1>
                <p class="text-white font-weight-bold">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                    diam nonummy nibh.</p>

                <a href="#" class="btn btn-cta text-uppercase font-weight-bold mt-5">En Savoir Plus</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="wcu-card">
            <div class="cover-image"></div>
            <div class="card-body">
                <p class=" text-muted text-uppercase">A propos</p>
                <h4 class="text-primary-1 text-uppercase font-weight-bold mb-5">Pourquoi nous choisir ?</h4>
                    <div class="wcu-item">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/bolt.svg') }}" class="img-fluid"/>
                        </div>
                        <div class="content">
                            <h6>Titre Principal</h6>
                            <p class="mb-0">Reprehenderit voluptatem quibusdam molestiae harum numquam sunt.Sunt
                                voluptates error.</p>
                        </div>
                    </div>
                    <div class="wcu-item">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/tools.svg') }}" class="img-fluid"/>
                        </div>
                        <div class="content">
                            <h6>Titre Principal</h6>
                            <p class="mb-0">Reprehenderit voluptatem quibusdam molestiae harum numquam sunt.Sunt
                                voluptates error.</p>
                        </div>
                    </div>
                    <div class="wcu-item">
                        <div class="icon">
                            <img src="{{ asset('assets/icons/experts.svg') }}" class="img-fluid"/>
                        </div>
                        <div class="content">
                            <h6>Titre Principal</h6>
                            <p class="mb-0">Reprehenderit voluptatem quibusdam molestiae harum numquam sunt.Sunt
                                voluptates error.</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <section class="section-cta">
        <div class="container px-4 py-4">

            <div class="row">
                <div class="col-lg-8">
                    <h6 class="text-white font-weight-bold my-4 py-0">
                        Besoin d'un expert pour vous conseiller sur le choix de nos produits?
                    </h6>
                </div>
                <div class="col-lg-4">
                    <a class="btn btn-cta my-4 font-weight-bold mx-auto text-uppercase">Contactez nous</a>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6 col-lg-5 d-flex align-items-center">
                    <div class=" text-left">
                        <p class="text-uppercase mb-md-0">
                            L'ENTREPRISE
                        </p>
                        <h4 class="text-primary-1 my-2">Quelque chose à propos de nous</h4>
                        <p class="mb-md-0 my-4">
                            Natus non fugiat ea itaque. Ipsum aut laboriosam. Laudantium sapiente dolores est
                            ea molestias et.Est ipsa eaque ratione officiis totam ut quaerat quo.
                            Velit sed et neque repellat autem enim hic molestias. Non consectetur corporis sed
                            quidem quo voluptas consequatur distinctio. Sint asperiores aliquid qui delectus tenetur
                            eius.
                            Dolorum quo qui dolore molestiae rerum voluptatem qui. Qui est sit architecto.Dignissimos
                            corporis labore.
                            Illo in quaerat consectetur molestiae est assumenda repellat sit. Voluptate enim
                            voluptatibus.
                        </p>
                        <a href="" class="btn btn-primary text-uppercase my-5"> Plus d'info</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <img src="{{ asset('assets/images/solution_3.png') }}" class="img-fluid w-100">
                </div>

            </div>
        </div>
    </section>

    <div class="py-5 bg-light">
        <div class="container">
            <p class="mb-2 text-primary-1">L'ENTREPRISE</p>
            <h4 class="text-primary-1 mb-5">Nos Solutions</h4>

            <div class="row home-solutions no-gutters">
                @foreach($solutions as $solution)
                    <div class="col-md-4 mb-3">
                        <div class=" solution-item">
                            <div class="icon-wrapper">
                                <a href="{{ route('solutions.show', ['slug' => $solution->slug]) }}">
                                    <img src="{{ $solution->getIconUrl() }}" class="img-fluid">
                                </a>
                            </div>
                            <a href="{{ route('solutions.show', ['slug' => $solution->slug]) }}">
                                <h6 class="name mb-4 text-primary-1">
                                    {{ $solution->name }}
                                </h6>
                            </a>
                            <p class="mb-0 description">{{ $solution->short_description }}</p>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="text-center my-4">
                <a href="{{ route('solutions.index') }}"
                   class="btn btn-outline-primary more-solutions font-weight-bold">Voir Plus</a>
            </div>
        </div>
    </div>


    <div class="py-5 shadow">
        <div class="container">
            <p class="mb-2 text-primary-1">L'ENTREPRISE</p>
            <h4 class="text-primary-1 mb-5">Nos dernières réalisations</h4>

            <div class="home-refs">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($references as $reference)
                            <a class="nav-item nav-link {{ $loop->index == 0 ? 'active' : '' }}"
                               id="{{ 'ref_tab_'.$reference->id }}"
                               data-toggle="tab"
                               href="{{ '#ref-tab-'.$reference->id }}" role="tab">{{ $reference->name }}</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach($references as $reference)
                        <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}"
                             id="{{ 'ref-tab-'.$reference->id }}" role="tabpanel">

                            <div class="row">
                                <div class="col-6 col-md-4 mb-4">
                                    <img src="{{ $reference->getImageUrl() }}" class="img-fluid">
                                </div>
                                @foreach($reference->images as $image)
                                    <div class="col-6 col-md-4 mb-4">
                                        <img src="{{ $image->getImageUrl() }}" class="img-fluid">
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center my-4">
                <a href="{{ route('references.index') }}"
                   class="btn btn-cta font-weight-bold">Voir Plus</a>
            </div>
        </div>
    </div>


    <div class="py-5 my-5">
        <div class="container">
            <p class="mb-2 text-primary-1">L'ENTREPRISE</p>
            <h4 class="text-primary-1 mb-5">Nos Partenaires</h4>

            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 justify-content-center align-items-center">
                <div class="col">
                    <img src="{{ asset('assets/images/Partner_logo_1.png') }}" class="img-fluid">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/Partner_logo_2.png') }}" class="img-fluid">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/Partner_logo_3.png') }}" class="img-fluid">
                </div>
                <div class="col">
                    <img src="{{ asset('assets/images/Partner_logo_4.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>



    <div class="py-5 bg-light">
        <div class="container my-5">
            <p class="mb-2 text-primary-1">L'ENTREPRISE</p>
            <h4 class="text-primary-1 mb-5">Nos chiffres clés</h4>

            <div class="row key-figures no-gutters">
                <div class="col-md-6 col-lg-3">
                    <div class="key-figure-item">
                        <div class="icon-wrapper">
                            <img src="{{ asset('assets/icons/support-service.svg') }}" class="img-fluid">
                        </div>
                        <div class="content">
                            <h2 class="count">15000</h2>
                            <p class="caption">voluptas vitae sint</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="key-figure-item bg-primary-1">
                        <div class="icon-wrapper">
                            <img src="{{ asset('assets/icons/time-fast.svg') }}" class="img-fluid">
                        </div>
                        <div class="content">
                            <h2 class="count">250</h2>
                            <p class="caption">voluptas sint</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="key-figure-item">
                        <div class="icon-wrapper">
                            <img src="{{ asset('assets/icons/delivery.svg') }}" class="img-fluid">
                        </div>
                        <div class="content">
                            <h2 class="count">85</h2>
                            <p class="caption">voluptas vitae sint</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ">
                    <div class="key-figure-item bg-primary-1">
                        <div class="icon-wrapper">
                            <img src="{{ asset('assets/icons/tools_white.svg') }}" class="img-fluid">
                        </div>
                        <div class="content">
                            <h2 class="count">940</h2>
                            <p class="caption">voluptas vitae sint</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')
    <script>

    </script>
@endsection