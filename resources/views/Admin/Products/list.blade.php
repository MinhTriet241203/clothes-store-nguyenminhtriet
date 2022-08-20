@include('Admin.Navigation_bar')
{{-- Tab title --}}
<head>
    <title>Product List</title>
</head>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            {{-- Notification --}}
            @if (Session::has('success'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (!empty($notify))
                <div class="alert alert-primary" role="alert">
                    {{ $notify }}
                </div>
            @endif
            @if (!empty($fail))
                <div class="alert alert-danger" role="alert">
                    {{ $fail }}
                </div>
            @endif
            
            {{-- Add button and search --}}
            @if (Session::has('LoginID'))
                <div style="margin-right: 1%; float:right;box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;">
                    @if ( session()->get('Class') == 'Full Control' )
                    {{-- If admin class is full control then enable add button --}}
                        <a href="{{ url('addProduct') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Add</a>
                    @else
                    {{-- If admin class is read only then disable add button --}}
                        <a class="btn btn-success disabled">
                        <i class="fas fa-plus-circle"></i> Add</a>
                    @endif
                </div>

                {{-- Search function if admin is logged in --}}
                <div style="margin-right: 1%; float:right;">
                    <form action="{{ url('searchProduct') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search products" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="height:100%;box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;"><i
                                        class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif

            {{-- Page title --}}
            <div style="margin-left: 5%; float:left;">
                <h2>Product List</h2>
            </div>

            @if (Session::has('LoginID'))
            {{-- If admin is logged in then show table --}}
                @if ($data->isNotEmpty())
                {{-- If $data is not empty then fetch data --}}    
                    <table class="table table-hover" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;">
                        <thead>
                            {{-- Table header --}}
                            <tr style="text-align: center; vertical-align:middle">
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th style="width: 15%">Details</th>
                                <th>Images</th>
                                <th>Size</th>
                                <th>Available</th>
                                <th style="width: 9%">Actions</th> {{--magic number for the 2 buttons to stay on the same line on <=80% zoom--}}
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Fetch table data --}}
                            @foreach ($data as $row)
                                <tr style="text-align: center; vertical-align:middle">
                                    <td>{{ $row->Product_ID }}</td>
                                    <td>{{ $row->Product_Name }}</td>
                                    <td>{{ $row->Category_Name }}</td>
                                    <td>${{ $row->Price }}</td>
                                    <td>{{ $row->Details }}</td>
                                    <td>
                                        <?php
                                        $path = 'img/products/';
                                        $ImagesAll = explode('@@@', $row->Images);
                                        foreach ($ImagesAll as $item) {
                                            $img = $path . $item;
                                            echo "<img src='$img' width='100px' height='100px' style='margin-left:5px;border-radius: 10px;border: 1px solid #ced4da;'>";
                                        }
                                        ?>
                                    </td>
                                    <td>{{ $row->Size }}</td>
                                    <td>{{ $row->Available }}</td> <img src="" alt="">
                                    <td>
                                        @if ( session()->get('Class') == 'Read Only' )
                                        {{-- If admin class is read only then disable update, delete button --}}
                                            <a class="btn btn-primary disabled">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger disabled">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        @else
                                        {{-- If admin class is full control then enable update, delete button --}}
                                            <a href="{{ url('editProduct/' . $row->Product_ID) }}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('deleteProduct/' . $row->Product_ID) }}" class="btn btn-danger"
                                                onclick="return confirm('Confirm delete?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                {{-- If $data is empty then show error message --}}
                    <br><br>
                    <hr>
                    <div class="text-danger">Error ! No data found !</div>
                @endif
            @endif
        </div>
    </div>
</div>
</body>

</html>
