@include('Admin.Navigation_bar')
{{-- Tab title --}}
<head>
    <title>Customer List</title>
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

            {{-- Page title --}}
            <div style="margin-left: 5%; float:left;">
                <h2>Customer List</h2>
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
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Fetch table data --}}
                            @foreach ($data as $row)
                                <tr style="text-align: center; vertical-align:middle">
                                    <td>{{ $row->Customer_ID }}</td>
                                    <td>{{ $row->Customer_Username }}</td>
                                    <td>{{ $row->Customer_Name }}</td>
                                    <td>{{ $row->Email }}</td>
                                    <td>{{ $row->Phone }}</td>
                                    <td>{{ $row->Address }}</td>
                                    <td>{{ $row->Gender }}</td>
                                    <td>{{ $row->Date_of_Birth }}</td>
                                    <td>
                                        <a href="{{ url('deleteCustomer/' . $row->Customer_Username) }}" class="btn btn-danger"
                                            onclick="return confirm('Confirm delete?')">
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
