@extends('admin.layouts.app')
@section('title', 'Team Members')

@section('header-style')
    <style>
        .team-img-preview {
            height: 42px;
            width: 42px;
            overflow: hidden;
            border-radius: 50%;
            background-color: #fff;
            border: solid 2px #ddd;
            margin-right: 10px;
        }
    </style>
@endsection

@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Votre Équipe</li>
                    </ol>
                </div>
                <h4 class="page-title">Votre Équipe</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="card card-body">
        <div class="text-right mb-3">
            <button class="btn btn-info mb-3" data-toggle="modal" data-target="#newTeamMemberModal">
                <i class="fa fa-user-plus"></i> New Team Member
            </button>
        </div>
        <div class="table-responsive position-relative">
            <div class="ajax-loader">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Poste</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="sort">
                @forelse($members as $member)
                    <tr data-id="{{ $member->id }}">
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="fa fa-list mr-2"></span>
                                <div class="team-img-preview">
                                    <img class="img-fluid"
                                        src="{{ asset('storage/team_members_pictures/' . $member->image) }}" alt="images...">
                                
                                </div>
                                <span>{{ $member->name }}</span>
                            </div>
                        </td>
                        <td class="text-uppercase">{{ $member->position }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.team_members.edit', $member->id) }}"
                                   class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                                <button type="button" class="btn btn-danger btn-sm"
                                        data-toggle="modal"
                                        data-target="#deleteModal{{ $member->id }}"><span class="fa fa-trash"></span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteModal{{ $member->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterLabel">Confirm Delete </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                </div>
                                <form method="POST" action="{{ route('admin.team_members.destroy', $member->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                Are you sure you want to delete this member ({{ $member->name }}) ?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            NO
                                        </button>
                                        <button type="submit" class="btn btn-danger">YES</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No records found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="newTeamMemberModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Team Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data"
                          action="{{ route('admin.team_members.store') }}">
                        @csrf

                <div class = "row">
                    <div class = "col">
                        <div class="form-group">
                            <label>Name <em>*</em></label>
                            <input type="text" name="name"
                                   value="{{ old('name') }}"
                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class = "col">
                        <div class="form-group">
                            <label>Poste <em>*</em></label>
                            <input type="text" name="position"
                                   value="{{ old('position') }}"
                                   class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}">
                            @error('position')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class = "row">
                    <div class = "col">
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook"
                                   value="{{ old('facebook') }}"
                                   class="form-control {{ $errors->has('facebook') ? ' is-invalid' : '' }}">
                            @error('facebook')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class = "col">
                        <div class="form-group">
                            <label>Twitter </label>
                            <input type="text" name="twitter"
                                   value="{{ old('twitter') }}"
                                   class="form-control {{ $errors->has('twitter') ? ' is-invalid' : '' }}">
                            @error('twitter')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class = "row">
                    <div class = "col">
                        <div class="form-group">
                            <label>Linkedin</label>
                            <input type="text" name="linkedin"
                                   value="{{ old('linkedin') }}"
                                   class="form-control {{ $errors->has('linkedin') ? ' is-invalid' : '' }}">
                            @error('linkedin')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class = "col">
                        <div class="form-group">
                            <label>Youtube </label>
                            <input type="text" name="youtube"
                                   value="{{ old('youtube') }}"
                                   class="form-control {{ $errors->has('youtube') ? ' is-invalid' : '' }}">
                            @error('youtube')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                
                        <div class="form-group">
                            <label>Description </label>
                            <textarea name="description"
                                   value="{{ old('description') }}"
                                   class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="image"> Image </label>
                            <div class="row align-items-end">
                                <div class="col-3">
                                    <img src="{{ asset('assets/images/no_user.png') }}"
                                         class="img-fluid img-thumbnail" id="preview" alt="">
                                </div>
                                <div class="col-9">
                                    <input type="file" accept="image/*" onchange="previewImage(this)" name="image"
                                           class="form-control @error('image') is-invalid @enderror">
                                    <small class="d-block text-muted">Required dimesion: 306x444</small>
                                    <small class="d-block text-muted mt-1">Accepted format: .png, .jpg, .svg</small>

                                    @error('image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>


                        <div class="d-flex justify-content-between">
                            <button class="btn" data-dismiss="modal">Close</button>
                            <button class="btn btn-info" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_script')
    <script>
        $(function () {
            @if(count($errors) > 0)
            $('#newTeamMemberModal').modal('show');
            @endif
        });

        sortable('.sort')[0].addEventListener('sortupdate', function (e) {
            var el = $(e.detail.item);
            var loader = $('.ajax-loader');

            loader.show();
            $.ajax({
                method: 'POST',
                data: {
                    'id': el.attr('data-id'),
                    'rank': e.detail.destination.index + 1,
                    '_token': '{{ csrf_token() }}'
                },
                url: '{{ route('admin.team_members.rank_update') }}',
                success: function (data) {
                    loader.hide();
                },
                error: function () {
                    loader.hide();
                    alert('An unexpected error occurred.');
                }
            })
        });

        function previewImage(input) {
            var file = input.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/jpg", "image/png"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                $("#preview").attr('src', 'images/default.png');
                input.setAttribute("value", "");
                // $("#message").append("<p class='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg and png Images type allowed</span>");
            } else {
                var reader = new FileReader();
                reader.onload = function (e) {
                    //  $("#message").empty();
                    $('#preview').attr("src", e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
