<!DOCTYPE html>
<html lang="en">
	<head>
		<title>@yield('title')</title>
		@stack('meta')
		@include('templates.headers')
		@stack('styles')

		@section('data')
			<script type="text/javascript">
				window.doc = {
					data: <?php echo isset($data) ? json_encode($data) : "false" ?>,
				};
			</script>
		@show
	</head>
	<body class="hold-transition skin-blue layout-top-nav">
		<div class="wrapper">
			@include('website.templates.navbar')
			<!-- Body -->
			<div class="content-wrapper">
				<div class="container">
					@yield('breadcrumb')
					<section class="content">
						<div class="col-md-4 col-md-offset-4">
							<div class="box box-widget widget-user-2">
								<div class="box-header with-border">
											<div class="user-block">
												<img class="img-circle" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
												<span class="username">Parag Pathak</span>
												<span class="description">Kalyan West</span>
											</div>
											<p class="mar-t-10"><span class="label label-success">Personally recommended</span> by Navin Kulkarni</p>
											<hr>

											<div>
								              <strong><i class="fa fa-phone margin-r-5"></i> Contact</strong>

								              <p class="text-muted">
								                9769503450, 454545544
								              </p>

								              <hr>

								              <strong><i class="fa fa-comment margin-r-5"></i> Description</strong>

								              <p class="text-muted">Malibu, California</p>

								              <hr>

								             
								              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

								              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
								            </div>
											  
								</div>
									
								
							</div>
								

							
					</section>
				</div>
			</div>
			<!-- Footer -->
			@include('templates.footer')
		</div>
		@stack('scripts')
	</body>
</html>