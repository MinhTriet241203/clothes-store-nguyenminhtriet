<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Product</title>
</head>

<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Add a new product</h2>
                {{-- Notification --}}
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form action="{{ url('saveProduct') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="md-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter product name">
                    </div>
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="md-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" class="form-control">
                            @foreach ($data as $row)
                                <option value="{{ $row->Category_ID }}">{{ $row->Category_Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="md-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter product price">
                    </div>
                    @error('price')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="md-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea type="number" name="details" class="form-control" placeholder="Enter product details"></textarea>
                    </div>
                    @error('details')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="md-3">
                        <label for="images" class="form-label">Images</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                    @error('images')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    {{-- <div class="md-3">
                        <label for="size" class="form-label">Size</label>
                        <input type="text" name="size" class="form-control" placeholder="Enter size">
                    </div>
                    @error('size')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror --}}
                    <div class="md-3">
                        <label>Sizes</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="S" name="size[]">
                            <label class="form-check-label" for="inlineCheckbox1">S</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="M" name="size[]">
                            <label class="form-check-label" for="inlineCheckbox2">M</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="L" name="size[]">
                            <label class="form-check-label" for="inlineCheckbox3">L</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="XL" name="size[]">
                            <label class="form-check-label" for="inlineCheckbox4">XL</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="XXL" name="size[]">
                            <label class="form-check-label" for="inlineCheckbox5">XXL</label>
                        </div>
                    </div>

                    <div class="md-3">  
                        <label for="available" class="form-label">Available</label>
                        <input type="number" name="available" class="form-control" placeholder="Enter available">
                    </div>
                    @error('available')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('listProduct') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
