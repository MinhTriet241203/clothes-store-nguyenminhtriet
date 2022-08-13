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

                {{-- Start buttons --}}
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('listCategory')}}" class="btn btn-success">Categories</a>
                </div>

                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('listProduct')}}" class="btn btn-success">Products</a>
                </div>

                @if ((Session::has('LoginID')))
                    <div style="margin-right: 1%; float:right;">
                        <a href="{{url('registrationAdmin')}}" class="btn btn-success">Add new</a>
                    </div>  
                                
                    <div style="margin-right: 1%; float:right;">
                        <a href="{{url('adminLogOut')}}" class="btn btn-success">Log out</a>
                    </div>

                    <div style="margin-right: 1%; float:right;">
                        <p class="btn border border-success" style="color: green">Welcome <?php echo(session()->get('Name'))?></p> 
                    </div>
                @endif
                {{-- End buttons --}}

                @if ($data->isNotEmpty())
                    <table class="table table-hover">
                        <thead>
                            {{-- Table header --}}
                            <tr>
                                <th style="text-align: center">Username</th>
                                <th style="text-align: center">Name</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                            {{-- End table header  --}}
                        </thead>
                        <tbody>
                            {{-- Fetch table data --}}
                            @foreach ($data as $row)
                                <tr>
                                    <td style="text-align: center">{{$row->Admin_Username}}</td>
                                    <td style="text-align: center">{{$row->Admin_Name}}</td>
                                    <td style="text-align: center">
                                        <a href="{{url('editAdmin/'.$row->Admin_Username)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('deleteAdmin/'.$row->Admin_Username)}}" class="btn btn-danger" onclick="return confirm('Confirm delete?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- End fetching table data --}}
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