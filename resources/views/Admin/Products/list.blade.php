@include('Admin.Navigation_bar');
<head><title>Product List</title></head>

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
                <a href="{{ url('addProduct') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Add</a>
                </div>
            @endif

            <div style="margin-left: 5%; float:left;">
                <h2 >Product List</h2>
            </div>
                {{-- End buttons --}}
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
                            @if (Session::has('LoginID'))
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                <td>{{ $row->Product_ID }}</td>
                                <td>{{ $row->Product_Name }}</td>
                                <td>{{ $row->Category_ID }}</td>
                                <td>${{ $row->Price }}</td>
                                <td>{{ $row->Details }}</td>
                                <td>
                                    <?php
                                    $path = 'img/products/';
                                    $ImagesAll = explode('@@@', $row->Images);
                                    foreach ($ImagesAll as $item)
                                    {
                                        $img = $path . $item;
                                        echo "<img src='$img' width='100px' height='100px' style='margin-left:5px'>";
                                    }
                                    ?>
                                </td>
                                <td>{{ $row->Size }}</td>
                                <td>{{ $row->Available }}</td> <img src="" alt="">

                                @if (Session::has('LoginID'))
                                    <td>
                                        <a href="{{ url('editProduct/' . $row->Product_ID) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ url('deleteProduct/' . $row->Product_ID) }}" class="btn btn-danger"
                                            onclick="return confirm('Confirm delete?')">Delete</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
