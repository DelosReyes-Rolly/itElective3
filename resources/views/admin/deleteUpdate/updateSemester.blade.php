<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update Semester</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updatesemester{{$semester->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <input type="hidden" id="id" name="id" value="{{$semester->id}}"/>
        <div class="mb-3" style="color: red">
           * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <label style="font-size: 20px;"><span style="color: red">*</span> Semester Name</label>
                <input id="semester_name" type="text" name="semester_name"  class="form-control @error('semester_name') is-invalid @enderror" value="{{$semester->semester_name}}" onkeydown="return alphaOnly(event);" style="font-size: 18px;"  required>
                <div class="invalid-feedback">
                    Please input valid semester name.
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
            var form_data = $("form#updatesemester"+id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updatesemester/")}}/' + id,
                data:form_data,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'semester has been updated successfully',
                    }).then(function() {
                        location.reload(true);
                    });
                }
            })
        }
</script>