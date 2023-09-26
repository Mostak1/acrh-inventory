<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @csrf
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @include('flash')
    <div class="container mt-5">
        <h2>Register</h2>
        <form action="{{ url('api/users') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="phone_no" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="phone_no" name="phone_no" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>


        <div class="my-3 row ">

            <div class="mb-3  col-4">
                <div class="input-group">
                    <label for="table" class="form-label">Table Name: </label>
                    <input type="text" class="form-control" id="table" name="table" required>
                </div>
            </div>
            <div class="mb-3 col-4">
                <div class="input-group">
                    <label for="id" class="form-label">ID : </label>
                    <input type="number" class="form-control" id="id" name="id" required>
                </div>
            </div>
            <div class="col-4">

                <button id="delete" class="btn btn-outline-danger " type="submit">Delete </button>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <div class="mb-3">
                    <div class="input-group">
                        <label for="table1" class="input-group-text">Table Name: </label>
                        <input type="text" class="form-control" id="table1" name="table1" required>
                    </div>
                </div>
                <div class="mb-3 ">
                    <div class="input-group">
                        <label for="id1" class="input-group-text">ID : </label>
                        <input type="number" class="form-control" id="id1" name="id1" required>
                    </div>
                </div>
                <div class="">

                    <button id="details" class="btn btn-outline-primary " type="submit">Show Details</button>
                </div>
            </div>
            <div class="col-7">
                <div class="show">

                </div>
            </div>
        </div>
    </div>

    {{--  --}}
    {{-- <form action="/permission-role-form" method="post">
        @csrf
        <label for="role_name">Role Name:</label>
        <input type="text" name="role_name" required><br>

        <label for="permissions[]">Permissions:</label><br>
        @foreach ($permissions as $permission)
            <input type="checkbox" name="permissions[]"
                value="{{ $permission->id }}">{{ $permission->permission_name }}<br>
        @endforeach

        <input type="submit" value="Submit">
    </form> --}}

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- DataTable JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.5/b-2.4.0/b-html5-2.4.0/b-print-2.4.0/r-2.5.0/datatables.min.js">
    </script>
    <!-- DataTable JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#delete').click(function() {
                let table = $('#table').val();
                let id = $('#id').val();

                // Get CSRF token from the meta tag
                let csrfToken = $('meta[name="csrf-token"]').attr('content');

                fetch('http://127.0.0.1:8000/api/' + table + '/' + id, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');

                        }
                        return response.json();
                    })
                    .then(data => {
                        // console.log('About to call Swal.fire()');
                        Swal.fire({
                            icon: 'warning',
                            title: 'Delete',
                            text: data.info,
                        });

                        console.log('Role deleted:', data);
                    })
                    .catch(error => {

                        console.error('Error:', error);
                    });
            });

            // details show
            $('#details').click(function(e) {
                e.preventDefault(); // Prevents the default form submission

                let table = $('#table1').val();
                let id = $('#id1').val();

                // Get CSRF token from the meta tag
                let csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: 'http://127.0.0.1:8000/api/' + table + '/' + id,
                    dataType: 'json',
                    success: function(data) {
                        // Assuming data.info contains the individual data you want to display
                        console.log(data.data);
                        $('.show').html(
                            '<h3>Role Name: ' + data.data.role_name + '</h3>' +
                            '<h3> Id: ' + data.data.id + '</h3>'
                        );
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
