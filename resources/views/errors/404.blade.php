@extends('layouts.app')
@section('title', 'Page not found')

@section('content')
    <div class="page-404">
        <div class="content justify-content-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12">
                        <h1 class="text-404">404</h1>
                        <h3 class="subtitle">Page non trouvée</h3>
                        <p class = "txt">La page demandée est introuvable. Il peut s'agir d'une erreur
                            d'orthographe dans l'URL ou d'une page supprimée.</p>
                        <a href="{{ route('index') }}" class="btn btn-primary">
                            <span class="fa fa-arrow-left mr-2"></span> Accueil</a>
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