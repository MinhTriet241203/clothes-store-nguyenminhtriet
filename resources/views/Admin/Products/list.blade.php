<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product List</title>
  </head>
  <body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Product List</h2>'
                @if (Session::has('success'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('success')}}
                    </div>                    
                @endif
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('listAdmin')}}" class="btn btn-success">Admins</a>
                </div>
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('addProduct')}}" class="btn btn-success">Add new</a>
                </div>
                @if ((!Session::has('LoginID')))
                    <div style="margin-right: 1%; float:right;">
                        <a href="{{url('loginAdmin')}}" class="btn btn-success">Log in</a>
                    </div>
                @else
                            
                <div style="margin-right: 1%; float:right;">
                    <a href="{{url('adminLogOut')}}" class="btn btn-success">Log out</a>
                </div>

                <div style="margin-right: 1%; float:right;">
                    <p>Welcome <?php echo(session()->get('Name'))?></p> 
                </div>
                
                @endif
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Details</th>
                            <th>Images</th>
                            <th>Size</th>
                            <th>Available</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{$row->Product_ID}}</td>
                                <td>{{$row->Product_Name}}</td>
                                <td>{{$row->Category_ID}}</td>
                                <td>${{$row->Price}}</td>
                                <td>{{$row->Details}}</td>
                                <td>{{$row->Images}}</td>
                                <td>{{$row->Size}}</td>
                                <td>{{$row->Available}}</td>                                

                                <td>
                                    <a href="{{url('editProduct/'.$row->Product_ID)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('deleteProduct/'.$row->Product_ID)}}" class="btn btn-danger" onclick="return confirm('Confirm delete?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>