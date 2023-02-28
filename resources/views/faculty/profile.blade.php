
@include('partials.facultyheader')
<main>
	<!-- php
	    // if(!empty($success)){
	    // 	echo '<div class="alert alert-success">'.$success.'</div>';
	    // }
	?> -->

	<form action="{{ route('faculty.update_profile') }}" method="post">
        @csrf
	    <div class="rounded bg-white mt-5 mb-5 top-to-bottom">
		<div style="font-size: 20px; background-color:rgb(248, 248, 248) ;">
			<b>Profile Information</b>
			<hr style="border:1px solid black;">
		</div>
		<div style="box-shadow: 0 4px 16px rgba(0,0,0,1);">
			<hr>
			<div class="row">
				<div class="col-md-3 border-right">
					<div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px"
						@if (Auth::user()->gender == "Male")
							src="{{ URL::asset('img/profile-male.png')}}"><br>
						@elseif(Auth::user()->gender == "Female")
							src="{{ URL::asset('img/profile-female.png')}}"><br>
						@elseif(Auth::user()->gender == "Others")
							src="{{ URL::asset('img/ocsr.png')}}"><br>
						@else
							src="{{ URL::asset('img/svnhs-logo.png')}}"><br>
						@endif
						<span class="font-weight-bold"> {{Auth::user()->first_name}} {{Auth::user()->middle_name}} {{Auth::user()->last_name}} </span><span class="text-black-50"><br>Faculty</span><span> </span><br/><br/>
					</div>
				</div>
				<div class="col-md-5 border-right">
					<div class="p-3 py-5">
						@if ($message = Session::get('success'))
							<div class="alert alert-success alert-block">
								<button type="button" class="close" data-dismiss="alert">×</button>
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
						<div class=" mb-3">
							<b><div class="text-center" style="font-size: 28px; color:green;">Profile Settings</div><br><hr style="border:1px solid grey;"></b><br>
						</div>
						<div class="row mt-2">
							<div class="col-md-12" style="font-size: 18px;">
								<label>First Name</label>
								<input  style="font-size: 16px;" class="form-control @error('first_name') is-invalid @enderror" type="text" onkeydown="return alphaOnly(event);" name="first_name" class="form-control" placeholder="First Name" required maxlength="255" value="{{$teacher->first_name}}">
								<div class="invalid-feedback">
									Please input first name.
								</div>
							</div><br/>
							<div class="col-md-12" style="font-size: 18px;">
								<label>Middle Name</label>
								<input style="font-size: 16px;" class="form-control @error('middle_name') is-invalid @enderror" type="text" onkeydown="return alphaOnly(event);" name="middle_name" class="form-control" placeholder="Middle Name" maxlength="255" value="{{$teacher->middle_name}}">
								<div class="invalid-feedback">
									Please input valid middle name.
								</div>
							</div><br/>
							<div class="col-md-12" style="font-size: 18px;">
								<label>Last Name</label>
								<input style="font-size: 16px;" class="form-control @error('last_name') is-invalid @enderror" type="text" onkeydown="return alphaOnly(event);" name="last_name" class="form-control" placeholder="Last Name"  required maxlength="255" value="{{$teacher->last_name}}">
								<div class="invalid-feedback">
									Please input last name.
								</div>
							</div><br/>
							<div class="col-md-12" style="font-size: 18px;">
								<label>Suffix</label>
								<input style="font-size: 16px;" type="text" class="form-control @error('suffix') is-invalid @enderror" onkeydown="return alphaOnly(event);" name="suffix" placeholder="Suffix" maxlength="255" value="{{$teacher->suffix}}">
								<div class="invalid-feedback">
									Please input valid suffix.
								</div>
							</div><br/>
						</div><br/>
						<div class="row mt-3">
							<div class="col-md-12" style="font-size: 18px;"><label>Email</label>
								<input style="font-size: 16px;" class="form-control @error('email') is-invalid @enderror" type="text" name="email" class="form-control" placeholder="Email Address" value="{{$teacher->email}}" required maxlength="255">
							</div><br/><br/>
                            <div class="col-md-12" style="font-size: 18px;"><label>Contact Number</label>
								<input style="font-size: 16px;" class="form-control @error('contact_no') is-invalid @enderror" type="text" name="contact_no" class="form-control" placeholder="Contact Number" value="{{$teacher->contact_no}}" onkeypress="return onlyNumberKey(event)">
							</div><br/>
							<div class="col-md-12" style="font-size: 18px;"><label for="gender">Sex</label><br/>
								<select id="gender" name="gender"  class="@error('gender') is-invalid @enderror" style="font-size: 16px; padding: 6px; width:100%;">
									<option value="" hidden>  Please Select Sex </option>
									<option value="Male" {{$teacher->sex == "Male" ? 'selected' : ''}}>Male</option>
									<option value="Female" {{$teacher->sex == "Female" ? 'selected' : ''}}>Female</option>
								</select>
							</div><br/>
							<br/><br/>
						</div>
					</div>
				</div>
				<div class="col-md-4" style="font-size: 18px;">
					<div class="p-3 py-5">
						<div class="d-flex justify-content-between align-items-center experience"><span>Additional Info</span></div><br>
						<div class="col-md-12"><label>House Number</label><input style="font-size: 16px;" type="text" class="form-control @error('house_num') is-invalid @enderror" name="house_num" placeholder="House Number" value="{{ $address->house_number }}"></div>
                        <div class="col-md-12"><label>Lot Number</label><input style="font-size: 16px;" type="text" class="form-control @error('lot_num') is-invalid @enderror" name="lot_num" placeholder="Lot Number" value="{{ $address->lot_number }}"></div>
                        <div class="col-md-12"><label>Street</label><input style="font-size: 16px;" type="text" class="form-control @error('street') is-invalid @enderror" name="street" placeholder="Street Name" value="{{ $address->street_name }}"></div>
						<div class="col-md-12"><label>Barangay</label><input style="font-size: 16px;" type="text" class="form-control @error('barangay') is-invalid @enderror" name="barangay" placeholder="Barangay" value="{{ $address->barangay }}"></div>
						<div class="col-md-12"><label>City</label><input style="font-size: 16px;" type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="City" value="{{ $address->city }}"></div>
						<div class="col-md-12">
							<label>Zip code</label>
							<input style="font-size: 16px;" type="text" onkeypress="return onlyNumberKey(event)" class="form-control @error('zip_code') is-invalid @enderror" minlength="4" maxlength="4" name="zip_code" placeholder="Zip Code" value="{{ $address->zip_code }}">
							<div class="invalid-feedback">
								Please input valid zip code.
							</div>
						</div>
                        <div class="col-md-12"><label>Country</label><input style="font-size: 16px;" type="text" class="form-control @error('country') is-invalid @enderror" name="country" placeholder="Country" value="{{ $address->country }}"></div>
					</div>
				</div>
				<hr>
			</div>
			<div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" style="font-size: 16px;" value="Submit"></div>
			<br/>
		</div>
		<hr style="border:1px solid black;"><hr>
		</div>
		<script src="{{ asset('assets/js/needs-validated2.js') }}"></script>
	</form>
</main>
