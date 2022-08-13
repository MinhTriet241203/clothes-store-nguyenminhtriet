<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Male Fashion - Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logoWebsite.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
    <link rel="stylesheet" href="css/login_style.css">
    <link rel="stylesheet" href="css/button_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
	<div id="login-form">
		<div class="row">
			<div class="col-lg-7">
				<form>
					<h3 class="login-header">Sign in</h3>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Username or Email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password">
					</div>
                    <button class="btn btn-primary btn-lg btn-block submit custom-btn btn-3"><span>Sign in</span></button>
					<div class="row">
						<div class="col text-center ">
                            <button class="custom-btn btn-1">Register now</button>
							{{-- <a class="register" href="#">Register now</a> --}}
						</div>
						<div class="col text-center">
							{{-- <a href="#" class="forgot-pass">Forgot password?</a> --}}
                            <button class="custom-btn btn-1"><a href="{{url('/')}}" class="home">To home page</a></button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-5">
				<button class="btn btn-block social-login facebook">
					<span class="social-icons">
						<i class="fab fa-facebook-square fa-lg">
						</i>
					</span>
					<span class="align-middle">Login with Facebook</span>
				</button>
				<button class="btn btn-block social-login google">
					<span class="social-icons">
						<i class="fab fa-google fa-lg">
						</i>
					</span>
					<span class="align-middle">Login with Google</span>
				</button>
			</div>
		</div>
	</div>
</div>
<!-- partial -->
  
</body>
</html>