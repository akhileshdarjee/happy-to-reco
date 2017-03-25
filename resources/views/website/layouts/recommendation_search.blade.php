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
						<div class="col-md-12">
							
							<h3>Services Name</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										@for($i=1;$i<=12;$i++)
											<div class="col-md-3">
													<div class="box box-widget widget-user-2">
														<div class="box-header with-border">
															<div class="text-center">
																<img class="img-circle" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
																<h2><a href="#">Driver</a></h2>
																<div class="user-block">
																 <span class="description no-mar">Kalyan West</span>
																</div>
																<p class="mar-t-10">
																	<span class="label label-success">Personally recommended</span> <br/>by Navin Kulkarni
																</p>
															</div>
														</div>
																	  
													</div>
															
											</div>	
										@endfor	
									</div>
								</div>
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