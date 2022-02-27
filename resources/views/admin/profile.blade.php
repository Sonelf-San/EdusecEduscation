@extends('admin.layouts.app')
@section('title', 'Profil')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>
                <h4 class="page-title">Profil</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Détails du compte</h5>
                    <form method="post" action="{{ route('admin.profile.edit') }}">
                        @csrf

                        <div class="form-group">
                            <label>Nom <em>*</em></label>
                            <input type="text"
                                   name="name" value="{{ old('name', $user->name) }}"
                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   placeholder="Nom" required="">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="{{ $user->email }}"
                                   class="form-control"
                                   placeholder="Email" readonly>
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-primary" type="submit">Mise à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Changer le mot de passe</h5>

                    <form method="post" action="{{ route('admin.profile.password') }}">
                        @csrf

                        <div class="form-group">
                            <label>Mot de passe actuel <em>*</em></label>
                            <input type="password"
                                   class="form-control {{ $errors->has('current_password') ? "is-invalid" : "" }}"
                                   name="current_password">

                            @if ($errors->has('current_password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('current_password') }}
                                </div>
                            @endif
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <label>{{ __('Nouveau mot de passe') }}</label>
                            <input type="password"
                                   class="form-control {{ $errors->has('password') ? "is-invalid" : "" }}"
                                   name="password">

                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <!-- Retype New Password -->
                        <div class="form-group">

                            <label>{{ __('Re-taper le nouveau mot de passe') }}</label>

                            <input type="password" class="form-control"
                                   name="password_confirmation">

                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-primary" type="submit">Changer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection