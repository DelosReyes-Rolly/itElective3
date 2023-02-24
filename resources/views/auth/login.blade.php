@extends('layouts.app')
@include('partials.loginHeader')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <div class="loginchoice loginOthers">     
		<div class="col-md-12 text-center">
            <div class="box-form">
                <div class="left">
                    <div class="overlay">
                        <center>
                            <img src='{{ URL::asset("img/shs.png")}}'>
                            <h6>ONLINE COURSE <br>REGISTRATION</h6>
                        </center>
                    </div>
                </div>
                <div class="right">
                    <div class="right-logo">
                        <center>
                            <img src='{{ URL::asset("img/shs.png")}}'><br/><br/>
                        </center>
                    </div>
                    <div class="card-header" style="background-color: #1c8a43; color:white; text-align:center; border-radius:10px; font-weight:bold; font-family: arial black"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>
                    <br><br>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if ($message = Session::get('message'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                             @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label  for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                            <br/>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection