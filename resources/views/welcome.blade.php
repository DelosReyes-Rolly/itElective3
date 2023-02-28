@extends('layouts.app')
@include('partials.loginHeader')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <div class="loginchoice loginOthers">     
		<div class="col-md-12 text-center">
            <div class="box-form" style="background-color: #E8D5C4;">
                <div class="right">
                    <div class="right-logo">
                        <center>
                            <img src='{{ URL::asset("img/ocsr.png")}}'><br/><br/>
                        </center>
                    </div>
                    <img src='{{ URL::asset("img/ocsr.png")}}'><br/><br/>
                    <h1 style="font-weight: 900;font-size: 4vmax;">ONLINE COURSE REGISTRATION</h1><br/><br/>
                </div>
            </div>
        </div>
    </div>
@endsection