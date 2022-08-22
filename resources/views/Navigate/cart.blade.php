@include('Header')

<head>
    <title>Cart</title>
</head>

<!-- Open Content -->
<section class="bg-light" style="background-color: #eee;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                </div>
                <div class="container py-5">
                    <div class="row py-5">
                        <form class="col-md-9 m-auto" method="post" role="form">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="inputname">Recieve Address</label>
                                    <input type="text" class="form-control mt-1" id="adress" name="address"
                                        placeholder="Address">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="inputemail">Recieve Phone</label>
                                    <input type="text" class="form-control mt-1" id="phone" name="phone"
                                        placeholder="Phone">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        @if (!empty(session('cart')))
                            <?php $total = 0;
                            $i = 0; ?>
                            @foreach (session('cart') as $row)
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ 'img/products/' . $row['img'] }}" class="img-fluid rounded-3"
                                            alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{ $row['name'] }}</p>
                                        <p>
                                            <span class="text-muted">Size: </span>
                                            {{ $row['size'] }}
                                        </p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <p>Ammount: {{ $row['quantity'] }}</p>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0">${{ $row['price'] }}</h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1  ">
                                        <a href="removeItem/{{ $i }}" class="text-danger"
                                            onclick="return confirm('Confirm delete?')">
                                            <i class="fas fa-trash fa-lg"></i>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <?php $total += $row['price'] * $row['quantity'];
                                $i++; ?>
                            @endforeach
                        @else
                            <p>Looks like your cart is empty! You can get some items <a href="{{ 'shop' }}"
                                    style="color: #23B35A">Here</a></p>
                        @endif
                        <div class="row d-flex justify-content">
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-10">
                                @if (!empty(session('cart')))
                                    <h5 class="mb-0">Total: ${{ $total }}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if (!empty(session('cart')))
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-3">
                            <a href="{{url('purchase')}}" class="btn btn-success" style="float: right">Purchase</a>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-danger"
                                style="float: right; margin-right: 1%">Back</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
</section>

@include('Footer')
</body>

</html>
