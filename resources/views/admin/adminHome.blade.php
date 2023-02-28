@extends('layouts.app')
@include('partials.adminHeader')
@section('content')
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Dashboard</div>
</div>
<section id="about" class="about">
	<div id="main-content" class="blog-page">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="card card-hover">
					<div class="card-body" style="background-color: #FF6666;">
						<h5 class="card-title" style="font-size:28px; color: #184624;">Years</h5>
						<p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-regular fa-calendar"> </i> {{$schoolyear}}</p>
					</div>
					<a href='{{ route("schoolYears") }}'  style="background-color:#FFCCCC;">
						<div class="card-footer" style="text-align: right;">
							<small style="color: #006600; font-size:20px;">View Years <i class="fa-solid fa-arrow-right"> </i></small>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="card card-hover">
					<div class="card-body" style="background-color: #FFB266;">
						<h5 class="card-title" style="font-size:28px; color: #184624;">Schedules</h5>
						<p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-solid fa-school-flag"> </i> {{$schedules}}</p>
					</div>
					<a href='{{ route("schedule") }}'  style="background-color:#FFE5CC;">
						<div class="card-footer" style="text-align: right;">
							<small style="color: #006600; font-size:20px;">View Schedules <i class="fa-solid fa-arrow-right"> </i></small>
						</div>
					</a>
				</div>
			</div>
			<!-- <div class="col-lg-4 col-md-6 col-sm-12">
				<div class="card card-hover">
					<div class="card-body" style="background-color: #FFFF66;">
						<h5 class="card-title" style="font-size:28px; color: #184624;">Weeks</h5>
						<p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-solid fa-calendar-week"> </i> 1</p>
					</div>
					<a href=""  style="background-color:#FFFFCC;">
						<div class="card-footer" style="text-align: right;">
							<small style="color: #006600; font-size:20px;">View Weeks <i class="fa-solid fa-arrow-right"> </i></small>
						</div>
					</a>
				</div>
			</div> -->
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="card card-hover">
					<div class="card-body" style="background-color: #B2FF66;">
						<h5 class="card-title" style="font-size:28px; color: #184624;">Faculties</h5>
						<p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-solid fa-chalkboard-user"> </i> {{$faculties}}</p>
					</div>
					<a href='{{ route("create_faculty") }}' title="Faculties"  style="background-color:#E5FFCC;">
						<div class="card-footer" style="text-align: right;">
							<small style="color: #006600; font-size:20px;">View Faculties <i class="fa-solid fa-arrow-right"> </i></small>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="card card-hover">
					<div class="card-body" style="background-color: #66FFFF;">
						<h5 class="card-title" style="font-size:28px; color: #184624;">Courses</h5>
						<p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-solid fa-calendar-days"> </i> {{$courses}}</p>
					</div>
					<a href='{{ route("courses") }}'  style="background-color:#CCE5FF;">
						<div class="card-footer" style="text-align: right;">
							<small style="color: #006600; font-size:20px;">View Courses <i class="fa-solid fa-arrow-right"> </i></small>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="card card-hover">
					<div class="card-body" style="background-color: #6666FF;">
						<h5 class="card-title" style="font-size:28px; color: #184624;">Subjects</h5>
						<p class="card-text" style="font-size:40px;">&nbsp;<i class="fa-solid fa-book"> </i> {{$subjects}}</p>
					</div>
					<a href='{{ route("subjects") }}'  style="background-color:#CCCCFF;">
						<div class="card-footer" style="text-align: right;">
							<small style="color: #006600; font-size:20px;">View Subjects <i class="fa-solid fa-arrow-right"> </i></small>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection