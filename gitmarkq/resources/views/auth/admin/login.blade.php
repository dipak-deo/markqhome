<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>IB CMS software || Login</title>
	<link rel="shortcut icon" href="{{ url($settings->fabicon ?? '') }}" type="image/x-icon">
    @include('admin.includes.css')
</head>

<body class="pace-top">




	<div id="app" class="app">

		<div class="login login-v2 fw-bold">

			<div class="login-cover">
				<div class="login-cover-img" style="background-image: url({{url('admin/img/login-bg/login-bg-13.jpg')}}"
					data-id="login-cover-image"></div>
				<div class="login-cover-bg"></div>
			</div>


			<div class="login-container">

				<div class="login-header">
					<div class="brand">
						<div class="d-flex align-items-center">
							<span class="logo"><img src="{{ $settings->logo }}" alt="" width="20px"></span> <b>IB</b> CMS Software
						</div>
						
					</div>
					<div class="icon">
						<i class="fa fa-key"></i>
					</div>
				</div>


				<div class="login-content">
					@include('message.message')
					<form action="{{ route('admin.login.submit') }}" method="POST">
						@csrf
						<div class="form-floating mb-20px">
							<input type="text" class="form-control fs-13px h-45px border-0" placeholder="Email Address"
								id="emailAddress"name="email" required />
							<label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Email
								Address</label>
								@error('email') <p class="text-danger">{{ $message }}</p>@enderror
								
						</div>
						<div class="form-floating mb-20px">
							<input type="password" class="form-control fs-13px h-45px border-0"
								placeholder="Password" name="password" required />
							<label for="emailAddress"
								class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
								@error('password') <p class="text-danger">{{ $message }}</p>@enderror
						</div>
						
						<div class="mb-20px">
							<button type="submit" class="btn btn-theme d-block w-100 h-45px btn-lg">Login</button>
						</div>
						
					</form>
				</div>

			</div>

		</div>


		<a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top"
			data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

	</div>


	@include('admin.includes.js')
</body>


</html>

