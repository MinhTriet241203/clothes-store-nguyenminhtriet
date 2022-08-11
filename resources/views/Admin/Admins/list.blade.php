<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin List</title>
  </head>
  <body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Admin List</h2>
                @if (Session::has('success'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('success')}} 
                    </div>                    
                @endif
                
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('listProduct')}}" class="btn btn-success">Products</a>
                </div>

                @if ((!Session::has('LoginID')))
                    <?php return redirect('loginAdmin');?>
                @else
                    <div style="margin-right: 1%; float:right;">
                        <a href="{{url('registrationAdmin')}}" class="btn btn-success">Add new</a>
                    </div>  
                                
                    <div style="margin-right: 1%; float:right;">
                        <a href="{{url('adminLogOut')}}" class="btn btn-success">Log out</a>
                    </div>

                    <div style="margin-right: 1%; float:right;">
                        <p>Welcome <?php echo(session()->get('Name'))?></p> 
                    </div>
                @endif

                @if ($data->isNotEmpty())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>name</th>
                                <th style="margin-right: 0%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{$row->Admin_Username}}</td>
                                    <td>{{$row->Admin_Name}}</td>
                                    <td>
                                        <a href="{{url('editAdmin/'.$row->Admin_Username)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('deleteAdmin/'.$row->Admin_Username)}}" class="btn btn-danger" onclick="return confirm('Confirm delete?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <br><br>
                    <hr>
                    <div class="text-danger">Error ! No data found !</div>
                @endif
            </div>
        </div>
    </div>
  </body>
</html>