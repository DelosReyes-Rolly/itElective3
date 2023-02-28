@extends('layouts.app')
@include('partials.adminHeader')
@include('partials.dataTablesImport')
@section('content')
<div class="announcement_body">
	<div class="announcement_text top-to-bottom">Manage Subjects</div>
</div>
<section id="about" class="about">
	<div id="main-content" class="blog-page">		
		<hr class="mt-0 mb-4">
        <div class="card mb-4 border-start-lg border-start-primary" style="padding: 10px 20px 10px 20px;">
			<div class="card-header" style="background-color: #ffffff;">
				<div style="float:right; text-align: right;">
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_subject">
						<i class="fa-solid fa-plus"></i> Create New subject
					</button>
				</div>
            </div>
            <div class="card-body p-0">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if($subjects->count() == 0)
					<br><br>
					<div class="alert alert-danger"><em>No records found.</em></div>
				@else 
                    <div class="table-responsive table-billing-history">
                        <table id="firstDataTable" class="display table-bordered table-striped table-hover" style="width:100%">
                            <thead style="background-color:#b2dce4; color:black;">
                                <tr>
                                    <th width="2%" class="border-gray-200" scope="col">#</th>
                                    <th width="20%" class="border-gray-200" scope="col">Subject Name</th>
                                    <th width="60%" class="border-gray-200" scope="col">Subject Description</th>
                                    <th width="4%" class="border-gray-200" scope="col">Units</th>
                                    <th width="10%" class="border-gray-200" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;
                                ?>
                                    @foreach ($subjects as $subject)
                                        <tr id="subject{{$subject->id}}">
                                            <td width="2%" class="text-center"><?php echo $i++; ?></td>
                                            <td width="20%">{{$subject -> subject_name}}</td>
                                            <td width="40%">{{$subject -> subject_description}}</td>
                                            <td width="4%">{{$subject -> units}}</td>
                                            <td width="30%">
												<a class="btn btn-warning btn-md" href="{{ url('showsubject',['id'=>$subject->id]) }}" data-toggle="modal" onclick="editItem(this)" data-id="{{ $subject->id }}" data-target="#editModal{{ $subject->id }}"><i class="fas fa-edit"></i> Update</a>
                                                <a class="btn btn-danger btn-md" href="{{ url('deletesubject',['id'=>$subject->id]) }}" data-toggle="modal" onclick="deleteItem(this)" data-id="{{ $subject->id }}" data-target="#deleteModal{{ $subject->id }}"><i class="fas fa-trash-alt"></i> Delete</a>
                                            </td> 
                                        </tr>
										<!-- delete modal -->
                                        <div id="deleteModal{{ $subject->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content border-start-lg border-start-yellow">
                                                </div>
                                            </div>
                                        </div>   
                                        <!-- update modal -->
                                        <div id="editModal{{ $subject->id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
	<div class="modal fade modal-lg modal-add h-100" id="create_subject" tabindex="-1" aria-labelledby="create_subject" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
			<div class="modal-content border-start-lg border-start-yellow">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Create subject</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
				</div>
				<form action="{{ route('store_subject') }}" method="POST" class="form my-4 needs-validation" novalidate>
					<div class="modal-body">
						<span class="form-text text-danger"> * Required field </span>
						@csrf
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<label for="subject_name" class="form-label w-75"><span style="color: red">*</span> Subject name: </label>
								<input type="text" name="subject_name" id="subject_name" placeholder="Enter name" class="form-control" required autofocus autocomplete="on">
								<div class="invalid-feedback">
									Please input valid subject name.
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br/>
								<label for="subject_description" class="form-label w-75"><span style="color: red">*</span> Subject description: </label>
								<input type="text" name="subject_description" id="subject_description" placeholder="Enter description" class="form-control" required autofocus autocomplete="on">
								<div class="invalid-feedback">
									Please input valid description.
								</div>
							</div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br/>
								<label for="units" class="form-label w-75"><span style="color: red">*</span> Units: </label>
								<input type="number" name="units" id="units" placeholder="Unit" class="form-control" required autofocus autocomplete="on">
								<div class="invalid-feedback">
									Please input valid units.
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