<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ $message }}',
        });
    </script>
@endif
{{-- @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}

@if ($message = Session::get('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Opps! !',
        text: '{{ $message }}',
    });
</script>
  
@endif
@if ($message = Session::get('warning'))
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Warning!',
        text: '{{ $message }}',
    });
</script>
  
@endif
@if ($message = Session::get('info'))
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Please Wait!',
        text: '{{ $message }}',
    });
</script>
  
@endif