@extends('layouts.app')
@include('partials.adminHeader')
@include('partials.dataTablesImport')
@section('content')
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Manage Faculty Accounts</div>
</div>
<section id="about" class="about">
	<div id="main-content" class="blog-page">		
		<hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-primary" style="padding: 10px 20px 10px 20px;">
			<div class="card-header" style="background-color: #ffffff;">
				<div style="float:right; text-align: right;">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_faculty">
						<i class="fa-solid fa-plus"></i> Create Faculty Accounts
					</button>
				</div>
            </div>
            <div class="card-body p-0">
				@if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
                <div class="table-responsive table-billing-history">
                    <table id="firstDataTable" class="display table-bordered table-striped table-hover" style="width:100%">
                        <thead style="background-color:#b2dce4; color:black;">
                            <tr>
                                <th width="2%" class="border-gray-200" scope="col">#</th>
                                <th width="20%" class="border-gray-200" scope="col">Name</th>
                                <th width="20%" class="border-gray-200" scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php 
                                $i=1;
                            ?>
                            @foreach ($data as $user)
								<tr>
									<td width="2%" class="text-center"><?php echo $i++; ?></td>
									<td>{{$user->name}}</td>
									<td>{{$user->email}}</td>
								</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
@endsection

@section('modals')
	<div class="modal fade modal-lg modal-add h-100" id="create_faculty" tabindex="-1" aria-labelledby="create_faculty" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content border-start-lg border-start-yellow">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Create Faculty Account</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
				</div>
				<form action="{{ route('store_faculty') }}" method="POST" class="form my-4 needs-validation" novalidate>
					<div class="modal-body">
						<span class="form-text text-danger"> * Required field </span>
						@csrf
						<div class="row mb-2">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<label for="name" class="form-label w-75"><span style="color: red">*</span> First Name: </label>
								<input type="text" name="name" id="name" placeholder="Enter name" class="form-control" required autofocus autocomplete="on" onkeydown="return alphaOnly(event);">
								<div class="invalid-feedback">
									Please input valid name.
								</div>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<label for="email" class="form-label w-75"><span style="color: red">*</span> Email Address: </label>
								<input type="email" name="email" id="email" placeholder="emailaddress@sample.com" class="form-control" required autofocus autocomplete="on">
								<div class="invalid-feedback">	
									Please input valid email address.
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<label for="password" class="form-label w-75"><span style="color: red">*</span> Password</label>
								<div class="input-group">
									<input type="password" name="password" id="password" placeholder="enter password" class="form-control" required autofocus autocomplete="on" readonly onclick="
									$(document).ready(function(){
										$('#viewPassword').attr('disabled',false);
									});">
									<button class="btn btn-light btn-sm" id="generatePassword" title="Generate Password" type="button">G</button>
									<button type="button" id="viewPassword" class="btn btn-secondary btn-sm" onclick='var x = document.getElementById("password");
									if (x.type === "password") {
									x.type = "text";
									} else {
									x.type = "password";
									}'><i class="fa-regular fa-eye"></i></button>
									<div class="invalid-feedback">
										Please input valid password.
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary btn-md" value=Submit>
					</div>
				</form>
			</div>
			<!-- For validaition of forms -->
			<script src="{{ asset('assets/js/needs-validated2.js') }}"></script>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		function makePass(length) {
			let result = '';
			const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*';
			const charactersLength = characters.length;
			let counter = 0;
			while (counter < length) {
				result += characters.charAt(Math.floor(Math.random() * charactersLength));
				counter += 1;
			}
			return result;
		}
		$(document).ready(function(){
			$("#generatePassword").click(function(){
				$("#password").val(makePass(11));
			});
		});
	</script>
@endsection