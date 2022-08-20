@include('Admin.Navigation_bar')
{{-- Tab title --}}

<head>
    <title>Admin List</title>
</head>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            {{-- Notifications --}}
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
                <div style="margin-right: 1%; float:right;">
                    @if (session()->get('Class') == 'Product Operator')
                        {{-- If admin class is product operator then disable add button --}}
                        <a class="btn btn-success disabled">
                            <i class="fas fa-plus-circle"></i> Add</a>
                    @else
                        {{-- If admin class is full control or manager then enable add button --}}
                        <a href="{{ url('registrationAdmin') }}" class="btn btn-success">
                            <i class="fas fa-plus-circle"></i> Add</a>
                    @endif
                </div>

                {{-- Search function if admin is logged in --}}
                <div style="margin-right: 1%; float:right;">
                    <form action="{{ url('searchAdmin') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search admins" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"
                                    style="height:100%;box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;"><i
                                        class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif

            {{-- Page title --}}
            <div style="margin-left: 5%; float:left;">
                <h2>Admin List</h2>
            </div>

            @if (Session::has('LoginID'))
                {{-- If admin is logged in then show table --}}
                @if ($data->isNotEmpty())
                    {{-- If $data is not empty then fetch data --}}
                    <table class="table table-hover" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;">
                        <thead>
                            {{-- Table header --}}
                            <tr style="text-align: center; vertical-align:middle">
                                <th>Username</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Fetch table data --}}
                            @foreach ($data as $row)
                                <tr style="text-align: center; vertical-align:middle">
                                    <td>{{ $row->Admin_Username }}</td>
                                    <td>{{ $row->Admin_Name }}</td>
                                    <td>{{ $row->Admin_Class }}</td>
                                    <td>
                                        @if (session()->get('Class') == 'Product Operator')
                                            {{-- If admin class is product operator then disable update, delete button on admin list page --}}
                                            <a class="btn btn-primary disabled">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger disabled">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        @else
                                            {{-- If admin class is full control or manager then enable update, delete button --}}
                                            @if ($row->Admin_Username == 'admin')
                                                {{-- If admin username is admin then disable delete button --}}
                                                <a href="{{ url('editAdmin/' . $row->Admin_Username) }}"
                                                    class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger disabled">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            @else
                                                {{-- If admin username is not admin then enable update, delete button --}}
                                                <a href="{{ url('editAdmin/' . $row->Admin_Username) }}"
                                                    class="btn btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ url('deleteAdmin/' . $row->Admin_Username) }}"
                                                    class="btn btn-danger" onclick="return confirm('Confirm delete?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            @endif
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
