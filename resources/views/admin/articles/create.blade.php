@extends('admin.layouts.app')
@section('title', 'articles')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.articles.index') }}">Articles</a></li>
                        <li class="breadcrumb-item active">Téléverser</li>
                    </ol>
                </div>
                <h4 class="page-title">Téléverser l'article</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                  action="{{ route('admin.articles.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Titre <em>*</em></label>
                            <input type="text" name="title"
                                value="{{ old('title') }}"
                                class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Category <em>*</em></label>
                                <select type="text" name="category"
                                        class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}">
                                    <option value="">- Select Category -</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('$category') ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fichier(s) <em></em></label>
                            <input type="file" accept="application/pdf/*" multiple name="files[]"
                                   class="form-control @error('files') is-invalid @enderror">

                            <small class="d-block text-muted mt-1">Accepted format: .pdf</small>

                            @error('files')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo <em>*</em></label>
                            <select type="text" name="logo"
                                    class="form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}">
                                <option value="">- Select Logo -</option>
                                @foreach($logos as $logo)
                                    <option value="{{ $logo->id }}" {{ $logo->id == old('$logo') ? 'selected' : '' }}>
                                        {{ $logo->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Description <em>*</em></label>
                        <textarea class="form-control tiny-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                rows="5"
                                name="description">{{ old('description') }}</textarea>

                        @error('description')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
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