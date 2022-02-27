@extends('admin.layouts.app')
@section('title', 'Settings')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Settings</h4>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.settings') }}" method="POST">
        @csrf

        <div class="card card-body mb-3">
            <h4>Contact Information</h4>
            <p class="text-muted">This info will be displayed on the site.</p>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Email <em>*</em></label>
                        <input type="email" value="{{ old('contact_email', $settings['contact_email']) }}"
                               class="form-control @error('contact_email') is-invalid @enderror"
                               name="contact_email">
                        @error('contact_email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Email 2 </label>
                        <input type="email" value="{{ old('contact_email_2', $settings['contact_email_2']) }}"
                               class="form-control @error('contact_email_2') is-invalid @enderror"
                               name="contact_email_2">
                        @error('contact_email_2')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Phone <em>*</em></label>
                        <input type="text" value="{{ old('contact_phone', $settings['contact_phone']) }}"
                               class="form-control @error('contact_phone') is-invalid @enderror"
                               name="contact_phone">
                        @error('contact_phone')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Phone 2</label>
                        <input type="text" value="{{ old('contact_phone_2', $settings['contact_phone_2']) }}"
                               class="form-control @error('contact_phone_2') is-invalid @enderror"
                               name="contact_phone_2">
                        @error('contact_phone_2')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Notify Email <em>*</em></label>
                        <input type="email" value="{{ old('notify_email', $settings['notify_email']) }}"
                               class="form-control @error('notify_email') is-invalid @enderror"
                               name="notify_email">
                        <small class="d-block text-muted">This email will be used to notify about events on the site.</small>
                        @error('notify_email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-body mb-3">
            <h4>About AIVDP</h4>
            <p class="text-muted">This information will be displayed on the site</p>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>P.O.Box <em>*</em></label>
                        <input type="text" value="{{ old('post_box', $settings['post_box']) }}"
                               class="form-control @error('post_box') is-invalid @enderror"
                               name="post_box">
                        @error('post_box')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address <em>*</em></label>
                        <input type="text" value="{{ old('address', $settings['address']) }}"
                               class="form-control @error('address') is-invalid @enderror"
                               name="address">
                        @error('address')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-body mb-3">
            <h4>Social Media</h4>


            <div class="form-group">
                <label>Facebook </label>
                <input type="text" value="{{ old('facebook_url', $settings['facebook_url']) }}"
                       class="form-control @error('facebook_url') is-invalid @enderror"
                       name="facebook_url">
                @error('facebook_url')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Twitter </label>
                <input type="text" value="{{ old('twitter_url', $settings['twitter_url']) }}"
                       class="form-control @error('twitter_url') is-invalid @enderror"
                       name="twitter_url">
                @error('twitter_url')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Instagram </label>
                <input type="text" value="{{ old('instagram_url', $settings['instagram_url']) }}"
                       class="form-control @error('instagram_url') is-invalid @enderror"
                       name="instagram_url">
                @error('instagram_url')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>LinkedIn </label>
                <input type="text" value="{{ old('linkedin_url', $settings['linkedin_url']) }}"
                       class="form-control @error('linkedin_url') is-invalid @enderror"
                       name="linkedin_url">
                @error('linkedin_url')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="text-right mb-4">
            <button type="submit" class="btn btn-info">Save Changes</button>
        </div>
    </form>
@endsection

@section('footer_script')
    <script></script>
@endsection