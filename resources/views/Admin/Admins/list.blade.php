@include('Admin.Navigation_bar')

<head>
    <title>Admin List</title>
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
                    <a href="{{ url('registrationAdmin') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Add</a>
                </div>
            @endif

            <div style="margin-left: 5%; float:left;">
                <h2>Admin List</h2>
            </div>
            {{-- End buttons --}}

            @if ($data->isNotEmpty())
                <table class="table table-hover">
                    <thead>
                        {{-- Table header --}}
                        <tr>
                            <th style="text-align: center">Username</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Class</th>
                            <th style="text-align: center">Actions</th>
                        </tr>
                        {{-- End table header --}}
                    </thead>
                    <tbody>
                        {{-- Fetch table data --}}
                        @foreach ($data as $row)
                            @if ($row->Admin_Username !== 'admin')
                                <tr>
                                    <td style="text-align: center">{{ $row->Admin_Username }}</td>
                                    <td style="text-align: center">{{ $row->Admin_Name }}</td>
                                    <td style="text-align: center">{{ $row->Admin_Class }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ url('editAdmin/' . $row->Admin_Username) }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url('deleteAdmin/' . $row->Admin_Username) }}"
                                            class="btn btn-danger" onclick="return confirm('Confirm delete?')">
                                            <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td style="text-align: center">{{ $row->Admin_Username }}</td>
                                    <td style="text-align: center">{{ $row->Admin_Name }}</td>
                                    <td style="text-align: center">{{ $row->Admin_Class }}</td>
                                    <td style="text-align: center">
                                        <a href="{{ url('editAdmin/' . $row->Admin_Username) }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger disabled">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
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
