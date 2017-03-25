<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register - Origin CMS</title>
		@include('templates.headers')
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="/"><b>Origin</b>CMS</a>
			</div>
			<!-- /.register-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">Register</p>
				<form action="/register" method="POST" name="register" id="register">
					@if (Session::has('msg'))
						@if (Session::has('success') && Session::get('success') == "true")
							<div class="block">
								<div class="alert alert-success alert-dismissible">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<strong>
										<i class="fa fa-check fa-lg"></i> {{ Session::get('msg') }}
									</strong>
								</div>
							</div>
						@else
							<div class="block">
								<div class="alert alert-danger alert-dismissible">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<strong>
										<i class="fa fa-exclamation-triangle fa-lg"></i> {{ Session::get('msg') }}
									</strong>
								</div>
							</div>
						@endif
					@endif
					{!! csrf_field() !!}
					<div class="form-group has-feedback">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<input type="text" name="full_name" id="full_name" class="form-control" placeholder="Name">
						</div>
						<div class="text-danger" id="alert" style="text-align: left; display: none;">Please Enter Your Full Name</div>
					</div>
					<div class="form-group has-feedback">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-envelope"></i>
							</span>
							<input type="email" name="email" id="email" class="form-control" placeholder="Email">
						</div>
						<div class="text-danger" id="alert" style="text-align: left; display: none;">Please Enter Your Email ID</div>
					</div>
					<div class="form-group has-feedback">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock"></i>
							</span>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>
						<div class="text-danger" id="alert" style="text-align: left; display: none;">Please Enter Password</div>
					</div>
					<div class="row">
						<div class="col-xs-8">
							<a href="/password/email"><small>Forgot password?</small></a>
						</div>
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat" id="submit-register" data-loading-text="Registering...">
								Register
							</button>
						</div>
					</div>
				</form>
				<p class="text-muted text-center"><small>Have an account?</small></p>
				<a class="btn btn-default btn-sm btn-block" href="/login">Login</a>
			</div>
		</div>
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script type="text/javascript" src="/js/web_app/register.js"></script>
	</body>
</html>