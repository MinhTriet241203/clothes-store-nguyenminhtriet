@include('Header')
<head><title>Cart</title></head>

    <!-- Open Content -->
    <section class="bg-light h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                        <div>
                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                    class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                        </div>
                    </div>

                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="img/categories/00000018061514shirt.jpg" class="img-fluid rounded-3"
                                        alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">Basic T-shirt</p>
                                    <p>
                                        <span class="text-muted">Size: </span>
                                        M
                                    </p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <p>Ammount: 8</p>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">$499.00</h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1  ">
                                    <a href="#!" class="text-danger">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content">    
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-10">
                                    <h5 class="mb-0">Total: $499.00</h5>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-3">
                            <a href="" class="btn btn-success" 
                                style="float: right">Purchase</a>
                            <a href="{{ url('/') }}" class="btn btn-danger"
                                style="float: right; margin-right: 1%">Back</a>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    @include('Footer')
</body>

</html>
