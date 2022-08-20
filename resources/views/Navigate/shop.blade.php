@include('Header')

<head>
    <title>Shop</title>
</head>

<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <h1 class="h2 pb-4">Categories</h1>
            <ul class="list-unstyled templatemo-accordion">
                @foreach ($categories as $row)
                    <a class="d-flex justify-content-between h3" style="text-decoration:none"
                        href="{{ url('category/' . $row->Category_ID) }}">
                        <li class="pb-3">
                            {{ $row->Category_Name }}
                            <i class="fa fa-fw fa-chevron-circle-right mt-1"></i>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row justify-content-end">
                <div class="col-md-6 pb-4">
                    <div class="d-flex">
                        <select class="form-control">
                            <option>Featured</option>
                            <option>A to Z</option>
                            <option>Item</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $showProducts)
                    <div class="col-md-4">
                        <a href="{{ url('shopSingle/' . $showProducts->Product_ID) }}"
                            style="text-decoration: none;color:black;">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <?php
                                    $path = '../img/products/';
                                    $ImagesAll = explode('@@@', $showProducts->Images);
                                    $item = reset($ImagesAll);
                                    $img = $path . $item;
                                    echo "<img class='card-img rounded-0 img-fluid' src='$img'>";
                                    ?>
                                    <div
                                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <li>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>{{ $size = implode(' / ', $sizes = explode(' ', $showProducts->Size)) }}
                                        </li> {{-- Re-implode values for better display --}}
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                                        <li>
                                        </li>
                                    </ul>
                                    <p class="text-center mb-0" style="color: #59ab6e; font-size: 25px !important;">
                                        ${{ $showProducts->Price }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#"
                            tabindex="-1">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                            href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark"
                            href="#">3</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<!-- End Content -->

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
