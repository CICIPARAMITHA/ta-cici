<!doctype html>
<html lang="en">
<head>
	<title>LOGIN SG</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{url('public/login')}}/css/style.css">

</head>
<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">

				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">

					<div class="wrap">
						<div class="img" style="background-image: url(public/assets/img/wall-tomat.jpeg);"></div>
						@foreach(['success', 'warning', 'danger'] as $status)
									@if (session($status))
									<div class="alert alert-{{$status}} mt-3 alert-dismissable custom-{{$status}}-box">
										<a href="#" class="close" data-dismiss='alert' aria-label='close'></a>
										<strong> {{session($status)}} </strong>
									</div>
									@endif
									@endforeach
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Smart Garden</h3>

								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">

									</p>
								</div>
							</div>
							<form action="{{url('login')}}" method="post" class="signin-form">
								@csrf
								<div class="form-group mt-3">
									<input type="text" class="form-control" name="username" required>
									<label class="form-control-placeholder" for="username">Username</label>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" name="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">MASUK</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{url('public/login')}}/js/jquery.min.js"></script>
	<script src="{{url('public/login')}}/js/popper.js"></script>
	<script src="{{url('public/login')}}/js/bootstrap.min.js"></script>
	<script src="{{url('public/login')}}/js/main.js"></script>

</body>
</html>

