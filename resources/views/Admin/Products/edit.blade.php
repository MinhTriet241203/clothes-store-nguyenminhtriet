@include('Admin.Navigation_bar')
{{-- Tab title --}}
<head>
    <title>Edit product</title>
</head>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit product</h2>
            <hr style="width: 500px;">
            {{-- Notification --}}
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form action="{{ url('saveProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $data->Product_ID }}">

                {{-- Enter product name --}}
                <div class="md-3">
                    <label for="name" class="form-label">Product Name</label>
                    <textarea type="number" name="name" class="form-control"
                        style="width: 500px; height:75px">{{ $data->Product_Name }}</textarea>
                </div>
                @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                {{-- Choose product category --}}
                <div class="md-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" class="form-control form-select" value="{{ $data->Category_ID }}"
                        style="width: 200px">
                        @foreach ($category as $row)
                            <option value="{{ $row->Category_ID }}">{{ $row->Category_Name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                {{-- Enter product price --}}
                <div class="md-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Product price"
                        value="{{ $data->Price }}" style="width: 150px">
                </div>
                @error('price')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                {{-- Enter product details --}}
                <div class="md-3">
                    <label for="details" class="form-label">Details</label>
                    <textarea type="number" name="details" class="form-control" placeholder="Enter product details"
                        style="width: 500px; height:150px">{{ $data->Details }}</textarea>
                </div>
                @error('details')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                {{-- Edit images here bitch =))) --}}

                {{-- <div class="md-3">
                    <label for="images" class="form-label">Images</label>
                    <input type="file" name="images[]" class="form-control" multiple value="{{ old('images[]') }}"
                        style="width: 350px">
                </div>
                @error('images')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror --}}

                {{-- Choose sizes --}}
                <div class="md-3">
                    {{-- Show size checkboxes --}}
                    <label>Sizes</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckboxS" value="S"
                            name="size[]">
                        <label class="form-check-label" for="CheckboxS">S</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckboxM" value="M"
                            name="size[]">
                        <label class="form-check-label" for="CheckboxM">M</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckboxL" value="L"
                            name="size[]">
                        <label class="form-check-label" for="CheckboxL">L</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckboxXL" value="XL"
                            name="size[]">
                        <label class="form-check-label" for="CheckboxXL">XL</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="CheckboxXXL" value="XXL"
                            name="size[]">
                        <label class="form-check-label" for="CheckboxXXL">XXL</label>
                    </div>
                    {{-- Check checkboxes according to $data from database --}}
                    <?php
                        $SizesAll = explode(' ', $data->Size);
                        foreach ($SizesAll as $size) {
                            if ($size == 'S') {
                                echo '<script type="text/javascript">document.getElementById("CheckboxS").checked=true;</script>';
                            }
                            if ($size == 'M') {
                                echo '<script type="text/javascript">document.getElementById("CheckboxM").checked=true;</script>';
                            }
                            if ($size == 'L') {
                                echo '<script type="text/javascript">document.getElementById("CheckboxL").checked=true;</script>';
                            }
                            if ($size == 'XL') {
                                echo '<script type="text/javascript">document.getElementById("CheckboxXL").checked=true;</script>';
                            }
                            if ($size == 'XXL') {
                                echo '<script type="text/javascript">document.getElementById("CheckboxXXL").checked=true;</script>';
                            }
                        }
                    ?>
                </div>

                <div class="md-3">
                    <label for="available" class="form-label">Available</label>
                    <input type="number" name="available" class="form-control" placeholder="Enter available"
                        value="{{ $data->Available }}" style="width: 160px">
                </div>
                @error('available')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('listProduct') }}" class="btn btn-danger">Back</a>
                <br><br><br><br><br><br>
            </form>
        </div>
    </div>
</div>
</body>



</html>
