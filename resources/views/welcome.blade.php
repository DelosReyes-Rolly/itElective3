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
                            <img src='{{ URL::asset("img/ocsr.png")}}'>
                            <h6>ONLINE COURSE <br>REGISTRATION</h6>
                            Virtuso&ensp;|&ensp;Agustin&ensp;|&ensp;Vinoya&ensp;|&ensp;Pajaron&ensp;|&ensp;Gierza&ensp;|&ensp;Geneta&ensp;|&ensp;Revillas&ensp;|&ensp;Delos Reyes
                        </center>
                    </div>
                </div>
                <div class="right">
                    <div class="right-logo">
                        <center>
                            <img src='{{ URL::asset("img/ocsr.png")}}'><br/><br/>
                        </center>
                    </div>
                    <h1><b>WHAT IS OCSR?</b></h1><br/>
                    Online Course Subject Registration is a system where the admin can assign subject to a teacher. The teachers can view their subjects on their own account.
                </div>
            </div>
        </div>
    </div>
@endsection