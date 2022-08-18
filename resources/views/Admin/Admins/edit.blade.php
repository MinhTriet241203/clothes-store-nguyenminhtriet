<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Admin</title>
</head>

<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit admin</h2>
                {{-- Notification --}}
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                {{-- End notification --}}

                {{-- Start Form --}}
                <form action="{{ url('updateAdmin') }}" method="POST">
                    @csrf
                    <input type="hidden" name="username" value="{{ $data->Admin_Username }}">
                    {{-- Enter name --}}
                    <div class="md-3">
                        <label for="name" class="form-label">Admin Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter admin name"
                            value="{{ $data->Admin_Name }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    {{-- Enter class --}}
                    <div class="md-3">
                        <label for="class" class="form-label">Admin class</label>
                        @if ( $data->Admin_Name !== "admin" )
                            <select name="class" class="form-control form-select" value="{{ old('class') }}"
                                style="width: 200px">
                            @if ( $data->Admin_Class == "Read Only" )
                                <option value="Read Only" selected>Read Only</option>
                                <option value="Full Control">Full Control</option>
                            @else
                                <option value="Read Only">Read Only</option>
                                <option value="Full Control" selected>Full Control</option>
                            @endif
                            </select>
                        @else
                            <select name="class" class="form-control form-select"
                                style="width: 200px" disabled>
                                <option value="Read Only">Read Only</option>
                                <option value="Full Control" selected>Full Control</option>
                            </select>
                        @endif 
                    </div>
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- Enter password --}}
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                    </div>
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- Confirm password --}}
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm password"
                            name="confirm_password">
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('listAdmin') }}" class="btn btn-danger">Back</a>
                </form>
                {{-- End form --}}
            </div>
        </div>
    </div>
</body>

</html>
