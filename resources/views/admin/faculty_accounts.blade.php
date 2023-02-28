@extends('layouts.app')
@include('partials.adminHeader')

@section('content')
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Manage Faculty Accounts</div>
</div>

<section id="about" class="about">
	<div id="main-content" class="blog-page">		
		<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create_faculty">
			<i class="fa-solid fa-plus"></i> Create Faculty Accounts
		</button>

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>
						<th>Name</th>
						<th>Email</th>
						<th>Sex</th>
						<th>Contact No.</th>
						<th>Actions</th>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan=6 class="text-center">
						<span class="text-muted">
							No Data To show Yet
						</span>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</section>
@endsection

@section('modals')
	<div class="modal fade modal-lg" id="create_faculty" tabindex="-1" aria-labelledby="create_faculty" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Create Faculty Accounts</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{ route('store_faculty') }}" method="POST" class="form my-4 needs-validation" novalidate>
					<div class="modal-body">
						<span class="form-text text-danger"> * Required field </span>
						@csrf
						<div class="row mb2">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<label for="name" class="form-label w-75"><span class="form-text text-danger">* </span>Name: </label>
								<input type="name" name="name" id="name" placeholder="Enter name" class="form-control" required autofocus autocomplete="on">
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<label for="email" class="form-label w-75"><span class="form-text text-danger">* </span>Email Address: </label>
								<input type="email" name="email" id="email" placeholder="emailaddress@sample.com" class="form-control" required autofocus autocomplete="on">
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<label for="password" class="form-label w-75"><span class="form-text text-danger">* </span>Password</label>
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
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary btn-md" value=Submit></input>
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