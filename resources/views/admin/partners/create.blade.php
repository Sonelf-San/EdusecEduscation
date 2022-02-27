@extends('admin.layouts.app')
@section('title', 'Partners')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">Partenaires</a></li>
                        <li class="breadcrumb-item active">Télécharger</li>
                    </ol>
                </div>
                <h4 class="page-title">Télécharger le Partenaire</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                  action="{{ route('admin.partners.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Titre <em>*</em></label>
                            <input type="text" name="name"
                                   value="{{ old('name') }}"
                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lien</label>
                            <input type="text" name="link"
                                   value="{{ old('link') }}"
                                   class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}">
                            @error('link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>Cover Image <em>*</em></label>
                    <input type="file" accept="image/*" name="image"
                           class="form-control @error('image') is-invalid @enderror">

                    <small class="d-block text-muted mt-1">Accepted format: .png, .jpg, .svg</small>

                    @error('image')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <hr>

                <div class="text-right">
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('footer_script')
    <script></script>
@endsection