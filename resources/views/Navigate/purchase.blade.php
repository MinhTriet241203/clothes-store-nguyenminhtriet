@include('Header')

<head>
    <title>purchase</title>
</head>
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
                        <div class="mb-3">
                            <label for="inputmessage">Status</label>
                            <textarea class="form-control mt-1" id="status" name="status" placeholder="Status" rows="8"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('Footer')
</body>

</html>
