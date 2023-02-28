<script src="{{ asset('assets/js/needs-validated.js') }}"></script>
<div class="modal-header">
    <h1 class="modal-title" id="staticBackdropLabel" style="font-size: 20px;">Update School year</h1>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form method="POST" id="updateschoolyear{{$schoolyear->id}}" class="needs-validation" novalidate>
    <div class="modal-body">
        @csrf
        @method('PUT')
        <input type="hidden" id="id" name="id" value="{{$schoolyear->id}}"/>
        <div class="mb-3" style="color: red">
           * required field
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br/>
					<label for="year_from" class="form-label w-75"><span style="color: red">*</span>Year from: </label>
					<input type="number" name="year_from" id="year_from" placeholder="from" class="form-control" required autofocus autocomplete="on" value="{{$schoolyear->year_from}}"  min=2023 max=2999>
					<div class="invalid-feedback">
						Please input valid year.
					</div>
				</div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><br/>
					<label for="year_to" class="form-label w-75"><span style="color: red">*</span>Year to: </label>
					<input type="number" name="year_to" id="year_to" placeholder="to" class="form-control" required autofocus autocomplete="on"value="{{$schoolyear->year_to}}" min=2024 max=2999>
					<div class="invalid-feedback">
						Please input valid year.
					</div>
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
            var form_data = $("form#updateschoolyear"+id).serialize();
            $(":submit").attr("disabled", true);
            $.ajax({
                type: "PUT",
                url: '{{url("/updateschoolyear/")}}/' + id,
                data:form_data,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success.',
                        text: 'schoolyear has been updated successfully',
                    }).then(function() {
                        location.reload(true);
                    });
                }
            })
        }
</script>