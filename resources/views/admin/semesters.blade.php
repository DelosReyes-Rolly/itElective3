@extends('layouts.app')
@include('partials.adminHeader')
@include('partials.dataTablesImport')
@section('content')
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Manage Semesters</div>
</div>
<section id="about" class="about">
	<div id="main-content" class="blog-page">		
		<hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-success" style="padding: 10px 20px 10px 20px;">
			<div class="card-header" style="background-color: #ffffff;">
				<div style="float:right; text-align: right;">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_semester">
						<i class="fa-solid fa-plus"></i> Create New Semester
					</button>
				</div>
            </div>
            <div class="card-body p-0">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if($semesters->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    <div class="table-responsive table-billing-history">
                        <table id="firstDataTable" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead style="background-color:#00cc00; color:#004d00;">
                                <tr>
                                    <th width="2%" class="border-gray-200" scope="col">#</th>
                                    <th width="40%" class="border-gray-200" scope="col">Semester Name</th>
                                    <th width="10%" class="border-gray-200" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                ?>
                                    @foreach ($semesters as $semester)
                                        <tr id="semester{{$semester->id}}">
                                            <td width="2%" class="text-center"><?php echo $i++; ?></td>
                                            <td width="40%">{{$semester -> semester_name}}</td>
                                            <td width="30%">
											<a class="btn btn-warning btn-md" href="{{ url('showsemester',['id'=>$semester->id]) }}" data-toggle="modal" onclick="editItem(this)" data-id="{{ $semester->id }}" data-target="#editModal{{ $semester->id }}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="{{ url('deletesemester',['id'=>$semester->id]) }}" data-toggle="modal" onclick="deleteItem(this)" data-id="{{ $semester->id }}" data-target="#deleteModal{{ $semester->id }}"><i class="fas fa-trash-alt"></i> Delete</a>
                                            </td> 
                                        </tr>
										<!-- delete modal -->
                                        <div id="deleteModal{{ $semester->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content border-start-lg border-start-yellow">
                                                </div>
                                            </div>
                                        </div>   
                                        <!-- update modal -->
                                        <div id="editModal{{ $semester->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content border-start-lg border-start-yellow">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach 
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
</section>
@endsection


@section('modals')
	<div class="modal fade modal-lg" id="create_semester" tabindex="-1" aria-labelledby="create_semester" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content border-start-lg border-start-yellow">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Create semester</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="{{ route('store_semester') }}" method="POST" class="form my-4 needs-validation" novalidate>
					<div class="modal-body">
						<span class="form-text text-danger"> * Required field </span>
						@csrf
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<label for="semester_name" class="form-label w-75"><span class="form-text text-danger">* </span>Semester name: </label>
								<input type="text" name="semester_name" id="semester_name" placeholder="Enter name" class="form-control" required autofocus autocomplete="on" onkeydown="return alphaOnly(event);">
								<div class="invalid-feedback">
									Please input valid semester name.
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


<script>
	$(document).ready(function(){
    
	editItem(e);
	deleteItem(e);
	});
	function editItem(e){
		id = e.getAttribute('data-id');
	}
	//delete
	function deleteItem(e){
		id = e.getAttribute('data-id');
	}
</script>