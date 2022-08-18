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

            {{-- Add button --}}
            @if (Session::has('LoginID'))
                @if (session()->get('Class') == "Full Control")
                <div style="margin-right: 1%; float:right;">
                    <a href="{{ url('registrationAdmin') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Add</a>
                </div>
                @else
                <div style="margin-right: 1%; float:right;">
                    <a class="btn btn-success disabled">
                        <i class="fas fa-plus-circle"></i> Add</a>
                </div>
                @endif
            @endif

            <div style="margin-left: 5%; float:left;">
                <h2>Admin List</h2>
            </div>
            {{-- End buttons --}}

            @if ($data->isNotEmpty())
                <table class="table table-hover" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;">
                    <thead>
                        {{-- Table header --}}
                        <tr style="text-align: center; vertical-align:middle">
                            <th>Username</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Actions</th>
                        </tr>
                        {{-- End table header --}}
                    </thead>
                    <tbody>
                        
                        {{-- Fetch table data if class is read only --}}
                        {{-- If class is read only then disable action buttons --}}
                        @if ( session()->get('Class') == "Read Only" )
                            @foreach ($data as $row)
                            <tr style="text-align: center; vertical-align:middle">
                                <td>{{ $row->Admin_Username }}</td>
                                <td>{{ $row->Admin_Name }}</td>
                                <td>{{ $row->Admin_Class }}</td>
                                <td>
                                    <a class="btn btn-primary disabled">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger disabled">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        {{-- Fetch table data if class is full control --}}
                        {{-- If class is full control then enable action buttons --}}
                        @else
                            @foreach ($data as $row)
                            @if ($row->Admin_Username !== 'admin')
                                <tr style="text-align: center; vertical-align:middle">
                                    <td>{{ $row->Admin_Username }}</td>
                                    <td>{{ $row->Admin_Name }}</td>
                                    <td>{{ $row->Admin_Class }}</td>
                                    <td>
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
                                <tr style="text-align: center; vertical-align:middle">
                                    <td>{{ $row->Admin_Username }}</td>
                                    <td>{{ $row->Admin_Name }}</td>
                                    <td>{{ $row->Admin_Class }}</td>
                                    <td>
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
                        @endif
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
