@include('Admin.Navigation_bar');
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 20px">
                <h4>Add new admin</h4>
                <hr>
                {{-- Notification --}}
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                {{-- End notification --}}
                {{-- Start form --}}
                <form action="{{ url('saveAdmin') }}" method="post">
                    @csrf
                    {{-- Enter name --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="name"
                            value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- Enter username --}}
                    <div class="form-group">
                        <label for="username">Admin username</label>
                        <input type="text" class="form-control" placeholder="Enter admin username" name="username"
                            value="{{ old('username') }}">
                    </div>
                    @error('username')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- Choose class --}}
                    <div class="md-3">
                        <label for="class" class="form-label">Admin class</label>
                        <select name="class" class="form-control form-select" value="{{ old('class') }}"
                            style="width: 200px">
                            <option value="Product Operator" selected>Product Operator</option>
                            <option value="Full Control">Full Control</option>
                            <option value="Manager">Manager</option>
                        </select>
                    </div>
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    @error('class')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- Enter password --}}
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                    </div>
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    {{-- Confirm password --}}
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm password"
                            name="confirm_password">
                    </div>
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <br>
                    <button class="btn btn-block btn-primary" type="submit" style="margin-top: 10px">Add</button>
                    <a href="{{ url('listAdmin') }}" class="btn btn-danger" style="margin-top: 10px">Back</a>
                </form>
                {{-- end form --}}
                <br>
                <a href="{{ url('adminLogOut') }}" class="btn btn-success">Login Admin</a>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
