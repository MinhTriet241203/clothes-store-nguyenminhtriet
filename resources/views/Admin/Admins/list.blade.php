<!doctype html>
<html lang="en">

<head>
    <title>Admin list</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/logoWebsite.ico">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <!--
        
    TemplateMo 559 Zay Shop
    
    https://templatemo.com/tm-559-zay-shop
    
    -->
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            {{-- Logo --}}
            <a class="navbar-brand text-success logo h2 align-self-center" href="{{ url('/') }}">
                MF manager
                <img src="img/logoWebsite.png" style="width: 50px; height: 50px;" />
            </a>
            {{-- End logo --}}

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                {{-- Navigation buttons --}}
                <div class="flex-fill">
                    <nav id="primary_nav_wrap">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <p class="nav-link">Accounts 
                                <i class="fas fa-angle-down"></i>
                            </p>
                            <ul>
                                <li><a href="listAdmin">Admins</a></li>
                                <li><a href="#">Customers</a></li> {{-- need edit here --}}
                            </ul>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link">Products 
                                <i class="fas fa-angle-down"></i>
                            </p>
                            <ul>
                                <li><a href="listCategory">Categories</a></li>
                                <li><a href="listProduct">Products</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <p class="nav-link" href="{{ url('contact') }}">Analytics
                                <i class="fas fa-angle-down"></i>
                            </p>
                            <ul>
                                <li><a href="">Orders</a></li>
                                <li><a href="">Sales</a></li>
                            </ul>
                        </li>
                    </ul>
                    </nav>
                </div>
                {{-- End navigation buttons --}}
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
                        data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>

                    @if (Session()->has('LoginID'))
                        <div class="welcome"
                            style="magin-top: 12px; background-color: white; color:rgb(35, 179, 90); display:inline-block">
                            <p style="text-decoration: underline 1px; text-underline-offset: 2px; margin-top:20px ">Welcome : <?php echo session()->get('Name'); ?></p> 
                            {{-- username --}}
                        </div>
                        <a style="margin-left: 10px" class="nav-icon position-relative text-decoration-none"
                            href="{{ url('adminLogOut') }}">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    @else
                        <a class="nav-icon position-relative text-decoration-none" href="{{ url('adminLogin') }}">
                            <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </nav>

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
                    <h2 >Admin List</h2>
                </div>
                    {{-- End buttons --}}
                    
                    @if ($data->isNotEmpty())
                    <table class="table table-hover">
                        <thead>
                            {{-- Table header --}}
                            <tr>
                                <th style="text-align: center">Username</th>
                                <th style="text-align: center">Name</th>
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
                                <td style="text-align: center">
                                    <a href="{{ url('editAdmin/' . $row->Admin_Username) }}"
                                                class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('deleteAdmin/' . $row->Admin_Username) }}"
                                                class="btn btn-danger"
                                                onclick="return confirm('Confirm delete?')">
                                                <i class="fas fa-trash-alt"></i></a>
                                            </td>
                                    @else
                                    <tr>
                                        <td style="text-align: center">{{ $row->Admin_Username }}</td>
                                        <td style="text-align: center">{{ $row->Admin_Name }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ url('editAdmin/' . $row->Admin_Username) }}"
                                                class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-danger disabled">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                @endif
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
