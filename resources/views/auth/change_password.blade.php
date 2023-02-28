@extends('layouts.app')
@include('partials.facultyHeader')
@include('partials.dataTablesImport')
@section('content')
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Schedule of Classes</div>
</div>
<section id="about" class="about">
	<div id="main-content" class="blog-page">
        <div class="row m-3 content-center p-5 m-relative">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header"> 
                        {{-- style="background-image: linear-gradient(to bottom right, red, white,white, rgb(250, 166, 55))" --}}
                        <h3>Change Password</h3>
                    </div>
                    <form action="{{route('update_password')}}" method="POST" class="form">
                        @csrf
                        <div class="card-body p-5">
                            <div class="row mb-2">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <label for="old_passowrd" class="form-label">Old Password</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6 ">
                                    <input type="password" name="old_password" class="form-control" required autofocus placeholder="Enter old password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <label for="password" class="form-label">New Password</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
                                    <input type="password" name="password" class="form-control" required autofocus placeholder="Enter new password">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <label for="password_confirmation" class="form-label">Confirm new Password</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
                                    <input type="password" name="password_confirmation" class="form-control" required autofocus placeholder="Confirm new password">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end p-3">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
</section>
@endsection
