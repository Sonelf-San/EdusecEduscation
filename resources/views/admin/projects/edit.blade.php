@extends('admin.layouts.app')
@section('title', $project->title)

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Projets</a></li>
                        <li class="breadcrumb-item active">{{ $project->title }}</li>
                    </ol>
                </div>
                <h4 class="page-title">Projets</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                  action="{{ route('admin.projects.update', $project->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Titre <em>*</em></label>
                    <input type="text" name="title"
                           value="{{ old('title', $project->title) }}"
                           class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Description <em>*</em></label>
                    <textarea class="form-control tiny-textarea {{ $errors->has('description') ? ' is-invalid' : '' }}"
                              rows="5"
                              name="description">{{ old('description', $project->description) }}</textarea>

                    @error('description')
                    <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Cover Image</label>
                            <input type="file" accept="image/*" name="image"
                                   class="form-control @error('image') is-invalid @enderror">

                            <small class="d-block text-muted mt-1">Accepted format: .png, .jpg, .svg</small>

                            @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
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