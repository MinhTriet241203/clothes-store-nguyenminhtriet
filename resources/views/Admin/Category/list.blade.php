@include('Admin.Navigation_bar')

<head>
    <title>Category List</title>
</head>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            {{-- Start buttons --}}
            {{-- <div style="margin-right: 1%; float:right;">
                    <a href="{{ url('listCategory') }}" class="btn btn-success">Categories</a>
                </div>
                
                <div style="margin-right: 1%; float:right;">
                    <a href="{{ url('listProduct') }}" class="btn btn-success">Products</a>
                </div> --}}
            @if (Session::has('LoginID'))
                <div style="margin-right: 1%; float:right;">
                    <a href="{{ url('addCategory') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Add</a>
                </div>
            @endif

            <div style="margin-left: 5%; float:left;">
                <h2>Category List</h2>
            </div>
            {{-- End buttons --}}
            @if ($data->isNotEmpty())
                <table class="table table-hover" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;">
                    <thead>
                        {{-- Table header --}}
                        <tr style="text-align: center; vertical-align:middle">
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            @if (Session::has('LoginID'))
                                <th>Actions</th>
                            @endif
                        </tr>
                        {{-- End table header --}}
                    </thead>
                    <tbody>
                        {{-- Fetch category data --}}
                        @foreach ($data as $row)
                            <tr style="text-align: center; vertical-align:middle">
                                <td>{{ $row->Category_ID }}</td>
                                <td>{{ $row->Category_Name }}</td>
                                <td><img src="img/categories/{{ $row->Category_Image }}" alt="" height="100px"
                                        width="auto"></td>

                                @if (Session::has('LoginID'))
                                    <td style="text-align: center">
                                        <a href="{{ url('editCategory/' . $row->Category_ID) }}"
                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('deleteCategory/' . $row->Category_ID) }}"
                                            class="btn btn-danger" onclick="return confirm('Confirm delete?')"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        {{-- End fetching data --}}
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
