<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-jquery-1.12.1.css') }}">
<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-rowreorder-1.2.8.css') }}">
<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/datatables-responsive-2.3.0.css') }}">
<script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('assets/js/datatables-jquery-1.12.1.js') }}"></script>
<script src="{{ asset('assets/js/datatables-rowreorder-1.2.8.js') }}"></script>
<script src="{{ asset('assets/js/datatables-responsive-2.3.0.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.3.3.6.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#firstDataTable').DataTable( {
            responsive: true,
        } );

        $('#secondDataTable').DataTable( {
            responsive: true,
        } );
    } );
</script>