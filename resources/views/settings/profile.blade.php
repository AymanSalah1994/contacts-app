@extends('layouts.main')
@section('title', 'Settings | Profile')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('layouts._message')
                    <div class="card">
                        <div class="card-header">
                            Settings
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action active">Profile</a>
                            <a href="#" class="list-group-item list-group-item-action">Account</a>
                            <a href="#" class="list-group-item list-group-item-action">Import & Export</a>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-9">
                    @include('layouts._message')
                    <form action="{{ route('settings.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card">
                            <div class="card-header card-title">
                                <strong>Edit Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" id="first_name"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                value="{{ old('first_name', $user->first_name) }}">
                                            @error('first_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" id="last_name"
                                                class="form-control  @error('last_name') is-invalid @enderror"
                                                value="{{ old('last_name', $user->last_name) }}">
                                            @error('last_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                    {{ 'TT' }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input type="text" name="company" id="company" class="form-control"
                                                value="{{ old('company', $user->company) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="bio">Bio</label>
                                            <textarea name="bio" id="biod" rows="3" class="form-control">{{ old('bio', $user->bio) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="offset-md-1 col-md-3">
                                        <div class="form-group">
                                            <label for="bio">Profile picture</label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new img-thumbnail"
                                                    style="width: 150px; height: 150px;">
                                                    <img src="{{ $user->profile_picture ? asset('uploads/'.$user->profile_picture) : "https://via.placeholder.com/150x150/ff7f7f/333333?text=Sample"}}"
                                                        alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists img-thumbnail"
                                                    style="max-width: 150px; max-height: 150px;"></div>
                                                <div class="mt-2">
                                                    <span class="btn btn-outline-secondary btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="profile_picture" accept="image/*">
                                                    </span>
                                                    <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                            @error('profile_picture')
                                                <div class="text-danger">
                                                    {{-- Here We Changed the Class of the Div --}}
                                                    {{-- Because invalid-faadback Class Appends the Element inside the invalid Class --}}
                                                    {{ $message }}
                                                    {{ 'TT For the Image' }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-6">
                                                <button type="submit" class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
@endsection


@section('scripts')
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
@endsection
@section('styles')
    <link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endsection
