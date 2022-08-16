<!doctype html>
<html lang="en">

<head>
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
            <a class="navbar-brand text-success logo h2 align-self-center" href="{{ url('listAdmin') }}">
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
                                <li><a href="listCustomer">Customers</a></li>
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

                    @if (Session()->has('LoginID'))
                        <div class="welcome"
                            style="magin-top: 12px; background-color: white; color:rgb(35, 179, 90); display:inline-block">
                            <p style="margin-top:10%; margin-right: 1px">Welcome : <?php echo session()->get('Name'); ?></p> 
                            {{-- username --}}
                        </div>
                        <a style="margin-left: 10px" class="nav-icon position-relative text-decoration-none"
                            href="{{ url('adminLogOut') }}">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    @else
                        <a class="nav-icon position-relative text-decoration-none" href="{{ url('loginAdmin') }}">
                            <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </nav>