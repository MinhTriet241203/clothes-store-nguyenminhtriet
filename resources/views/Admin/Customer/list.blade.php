@include('Admin.Navigation_bar')

<head>
    <title>Customer List</title>
</head>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div style="margin-left: 5%; float:left;">
                <h2>Customer List</h2>
            </div>
            @if ($data->isNotEmpty())
                <table class="table table-hover">
                    <thead>
                        {{-- Table header --}}
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Username</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Email</th>
                            <th style="text-align: center">Phone</th>
                            <th style="text-align: center">Address</th>
                            <th style="text-align: center">Gender</th>
                            <th style="text-align: center">Date of Birth</th>
                            <th style="text-align: center">Actions</th>
                        </tr>
                        {{-- End table header --}}
                    </thead>
                    <tbody>
                        {{-- Fetch table data --}}
                        @foreach ($data as $row)
                            <tr>
                                <td style="text-align: center">{{ $row->Customer_ID }}</td>
                                <td style="text-align: center">{{ $row->Customer_Username }}</td>
                                <td style="text-align: center">{{ $row->Customer_Name }}</td>
                                <td style="text-align: center">{{ $row->Email }}</td>
                                <td style="text-align: center">{{ $row->Phone }}</td>
                                <td style="text-align: center">{{ $row->Address }}</td>
                                <td style="text-align: center">{{ $row->Gender }}</td>
                                <td style="text-align: center">{{ $row->Date_of_Birth }}</td>
                                <td style="text-align: center">
                                    <a href="{{ url('deleteCustomer/' . $row->Customer_Username) }}" class="btn btn-danger"
                                        onclick="return confirm('Confirm delete?')">
                                        <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
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
