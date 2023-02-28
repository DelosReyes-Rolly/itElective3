<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Strand</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateCourse{{$course->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <input type="hidden" id="id" name="id" value="{{$course->id}}"/>
        <div class="mb-3" style="color: red">
           * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Course Name</label>
                <input id="course_name" type="text" name="course_name"  class="form-control @error('course_name') is-invalid @enderror" value="{{$course->course_name}}" style="font-size: 18px;"  required>
                <div class="invalid-feedback">
                    Please input valid strand name.
                </div>
            </div>
            <div class="col-md-12"><br/>
                <label style="font-size: 20px;"><span style="color: red">*</span> Course description</label>
                <input id="course_description" type="text" name="course_description"  class="form-control @error('course_description') is-invalid @enderror" value="{{$course->course_description}}" style="font-size: 18px;" required>
                <div class="invalid-feedback">
                    Please input valid course_description.
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <font face = "Verdana" size = "2"><input type="submit" class="btn btn-primary btn-md" value="Submit"></font>
    </div>
</form>
<script>
        function formPost(){
            var form_data = $("form#updateCourse"+id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatecourse/")}}/' + id,
                data:form_data,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'Course has been updated successfully',
                    }).then(function() {
                        location.reload(true);
                    });
                }
            })
        }
</script>