@include('Header')

<head>
    <title>Contact</title>
</head>

<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center" style="display: inline-block">
        <div class="col-md-5">
            <div class="card rounded-3">
                @if (Session::has('customerLoginID'))
                    <img src="img/ProfilePics/Placeholder_PFP_Male.jpg" alt="" height="250" width="250"
                        style="border-radius: 25%; align-self:center">
                    <h1>{{ $data->Customer_Name }}</h1>
                    <p><i class="far fa-user-circle"></i> Username: {{ $data->Customer_Username }}</p>
                    <p><i class="fas fa-address-card"></i> Name: {{ $data->Customer_Name }}</p>
                    <p><i class="fas fa-envelope"></i> Email: {{ $data->Email }}</p>
                    <p><i class="fas fa-phone"></i> Phone: {{ $data->Phone }}</p>
                    <p><i class="fas fa-home"></i> Address: {{ $data->Address }}</p>
                    <p><i class="fas fa-user"></i> Gender: {{ $data->Gender }}</p>
                    <p><i class="fas fa-birthday-cake"></i> Birthday:
                        {{ date('d/m/Y', strtotime($data->Date_of_Birth)) }}
                    </p>
                @else
                    <p>Looks like you have not logged in yet! To see your own profile you need to <a
                            href="{{ url('customerLogin') }}" style="color: #23B35A">Login here</a> or <a
                            href="{{ url('customerRegister') }}"style="color: #23B35A">Sign up here</a>.</p>
                @endif
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
