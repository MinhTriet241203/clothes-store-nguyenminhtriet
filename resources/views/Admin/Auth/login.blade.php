<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 20px">
                <h4>Login</h4>
                <hr>
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @else

                @if (Session::has('fail'))
                    <div class="alert alert-error" role="alert">
                        {{Session::get('fail')}}
                    </div>
                @endif

                @endif
                <form action="{{url('adminSignIn')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Admin username</label>
                        <input type="text" class="form-control" placeholder="Enter admin username" name="username" value="{{old('username')}}">
                    </div>
                    @error('username')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div>
                    @enderror

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{old('password')}}">
                    </div>
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div>
                    @enderror
                    <button class="btn btn-block btn-primary" type="submit" style="margin-top: 10px">Login</button>
                </form>
                <br>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>