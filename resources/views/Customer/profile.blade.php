@include('Header')

<head>
    <title>Contact</title>
</head>

<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center" style="display: inline-block">
        <div class="col-md-5 align-content-between">

            <div class="card rounded-3 mb-4">
                <img src="img/PlaceholderPFP.jpg" alt="" height="250" width="250"
                    style="border-radius: 25%; align-self:center">
            </div>

            <div class="card rounded-3 mb-4">
                <h1>{{ $data->Customer_Name }}</h1>
                <p><i class="far fa-user-circle"></i> Username: {{ $data->Customer_Username }}</p>
                <p><i class="fas fa-address-card"></i> Name: {{ $data->Customer_Name }}</p>
                <p><i class="fas fa-envelope"></i> Email: {{ $data->Email }}</p>
                <p><i class="fas fa-phone"></i> Phone: {{ $data->Phone }}</p>
                <p><i class="fas fa-home"></i> Address: {{ $data->Address }}</p>
                <p><i class="fas fa-user"></i> Gender: {{ $data->Gender }}</p>
                <p><i class="fas fa-birthday-cake"></i> Birthday: {{ date('d/m/Y', strtotime($data->Date_of_Birth)) }}
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Start Contact -->
<div class="container py-5">
</div>
<!-- End Contact -->


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
