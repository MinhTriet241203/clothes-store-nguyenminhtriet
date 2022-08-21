@include('Header')

<head>
    <title>Contact</title>
</head>

{{-- Đống icon nha
<i class="far fa-user-circle"></i> Username
<i class="fas fa-address-card"></i> Name
<i class="fas fa-envelope"></i> Email
<i class="fas fa-phone"></i> Phone
<i class="fas fa-home"></i> Address
<i class="fas fa-user"></i> Gender
<i class="fas fa-birthday-cake"></i> Birthday --}}

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                    @if ($data->Gender == 'male')
                        <img src="../img/Male.jpg" class="rounded-circle img-fluid" style="width: 273px;">
                    @elseif ($data->Gender == 'female')
                        <img src="../img/Female.jpg" class="rounded-circle img-fluid" style="width: 273px;">
                    @else
                        <img src="../img/Other.jpg" class="rounded-circle img-fluid" style="width: 273px;">
                    @endif
                    <h2 class="my-3">{{ $data->Customer_Name }}</h2>
                    <h3 class="text-muted mb-1">{{ $data->Customer_Username }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">{{ $data->Customer_Name }}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $data->Email }}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $data->Phone }}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $data->Address }}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                    <p class="mb-0">Gender</p>
                    </div>
                    <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $data->Gender }}</p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-3">
                    <p class="mb-0">Birthday</p>
                    </div>
                    <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ date('d/m/Y', strtotime($data->Date_of_Birth)) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <!-- Start Contact -->
<div class="container py-5">
</div>
<!-- End Contact --> --}}


@include('Footer')

<!-- Start Script -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/templatemo.js"></script>
<script src="js/custom.js"></script>
<!-- End Script -->
</body>

</html>
