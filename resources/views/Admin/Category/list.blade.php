<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Category List</title>
  </head>
  <body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Category List</h2>
                @if (Session::has('success'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('success')}}
                    </div>                    
                @endif

                {{-- Start buttons --}}
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('listAdmin')}}" class="btn btn-success">Admins</a>
                </div>
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('listProduct')}}" class="btn btn-success">Products</a>
                </div>
                @if ((!Session::has('LoginID')))
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('loginAdmin')}}" class="btn btn-success">Log in</a>
                </div>
                @else
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('addCategory')}}" class="btn btn-success">Add new</a>
                </div>
                
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('adminLogOut')}}" class="btn btn-success">Log out</a>
                </div>

                <div style="margin-right: 1%; float:right;">
                    <p>Welcome <?php echo(session()->get('Name'))?></p> 
                </div>
                {{-- End buttons --}}
                
                @endif
                <table class="table table-hover">
                    <thead>
                        {{-- Table header --}}
                        <tr style="text-align: center">
                            <th>Category ID</th>
                            <th>Category Name</th>
                            @if (Session::has('LoginID'))
                            <th>Actions</th>
                            @endif
                        </tr>
                        {{-- End table header --}}
                    </thead>
                    <tbody>
                        {{-- Fetch category data --}}
                        @foreach ($data as $row)
                            <tr>
                                <td style="text-align: center">{{$row->Category_ID}}</td>
                                <td style="text-align: left">{{$row->Category_Name}}</td>                               

                                @if (Session::has('LoginID'))                                    
                                <td style="text-align: center">
                                    <a href="{{url('editCategory/'.$row->Category_ID)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('deleteCategory/'.$row->Category_ID)}}" class="btn btn-danger" onclick="return confirm('Confirm delete?')">Delete</a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        {{-- End fetching data --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>