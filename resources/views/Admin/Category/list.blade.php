@include('Admin.Navigation_bar')
{{-- Tab title --}}

<head>
    <title>Category List</title>
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

            {{-- Add button --}}
            @if (Session::has('LoginID'))
                <div style="margin-right: 1%; float:right;">
                    @if (session()->get('Class') == 'Full Control')
                        {{-- If admin class is full control then enable add button --}}
                        <a href="{{ url('addCategory') }}" class="btn btn-success">
                            <i class="fas fa-plus-circle"></i> Add</a>
                    @else
                        {{-- If admin class is read only then disable add button --}}
                        <a class="btn btn-success disabled">
                            <i class="fas fa-plus-circle"></i> Add</a>
                    @endif
                </div>
            @endif

            {{-- Page title --}}
            <div style="margin-left: 5%; float:left;">
                <h2>Category List</h2>
            </div>

            @if (Session::has('LoginID'))
                {{-- If admin is logged in then show table --}}
                @if ($data->isNotEmpty())
                    {{-- If $data is not empty then fetch data --}}
                    <table class="table table-hover" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;">
                        <thead>
                            {{-- Table header --}}
                            <tr style="text-align: center; vertical-align:middle">
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Fetch table data --}}
                            @foreach ($data as $row)
                                <tr style="text-align: center; vertical-align:middle">
                                    <td>{{ $row->Category_ID }}</td>
                                    <td>{{ $row->Category_Name }}</td>
                                    <td>
                                        <img src="img/categories/{{ $row->Category_Image }}" height="100px"
                                            width="auto" style="border-radius: 10px;border: 1px solid #ced4da;">
                                    </td>
                                    <td>
                                        <a href="{{ url('editCategory/' . $row->Category_ID) }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('deleteCategory/' . $row->Category_ID) }}"
                                            class="btn btn-danger" onclick="return confirm('Confirm delete?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
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
