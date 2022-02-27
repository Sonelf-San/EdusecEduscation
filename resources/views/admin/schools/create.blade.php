@extends('admin.layouts.app')
@section('title', 'Schools')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.schools.index') }}">Schools</a></li>
                        <li class="breadcrumb-item active">Télécharger</li>
                    </ol>
                </div>
                <h4 class="page-title">Télécharger l'école</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                  action="{{ route('admin.schools.store') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Acronym <em>*</em></label>
                            <input type="text" name="acronym"
                                value="{{ old('acronym') }}"
                                class="form-control {{ $errors->has('acronym') ? ' is-invalid' : '' }}">
                            @error('acronym')
                            <span class="text-danger">{{ $message }}</span>
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


                <div class="form-group">
                        <label> Name (Acronym meaning) <em>*</em></label>
                        <input type="text" name="name"
                        value="{{ old('name') }}"
                        class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form-group">
                    <label>Cover Image <em></em></label>
                    <input type="file" accept="image/*" name="image"
                            class="form-control @error('image') is-invalid @enderror">

                    <small class="d-block text-muted mt-1">Accepted format: .png, .jpg, .svg</small>

                    @error('image')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div><hr>

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