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
							  <!-- Widget: user widget style 1 -->
							 <div class="box box-widget widget-user">
								<!-- Add the bg color to the header using any of the bg-* classes -->
								<div class="widget-user-header bg-aqua-active">
								  <h3 class="widget-user-username">Alexander Pierce</h3>
								  <h5 class="widget-user-desc">Founder &amp; CEO</h5>
								</div>
								<div class="widget-user-image">
								  <img class="img-circle" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
								</div>
								<div class="box-footer">
								  <div class="row">
									<div class="col-sm-6 border-right">
									  <div class="description-block">
										<h5 class="description-header">28</h5>
										<span class="description-text">Recommended</span>
									  </div>
									  <!-- /.description-block -->
									</div>
									<!-- /.col -->
									<div class="col-sm-6 border-right">
									  <div class="description-block">
										<h5 class="description-header">16</h5>
										<span class="description-text">NEEDED</span>
									  </div>
									  <!-- /.description-block -->
									</div>
									<!-- /.col -->
									
								  </div>
								  <!-- /.row -->
								</div>
							 </div>
							  <!-- /.widget-user -->

							<h3>Recommended</h3>

							<div class="box box-widget widget-user-2">
								@for($i=0;$i<=5;$i++)
									
										<div class="box-header with-border">
											<div class="user-block">
												<img class="img-circle" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
												<span class="username"><a href="#">Dentist</a></span>
												<span class="description">Kalyan West</span>
											</div>
											  <!-- /.user-block -->   
										</div>
									
								@endfor
							</div>
								

							<h3>Needed</h3>

							<div class="box box-widget widget-user-2">
								@for($i=0;$i<=5;$i++)
									
										<div class="box-header with-border">
											<div class="user-block">
												<img class="img-circle" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
												<span class="username"><a href="#">Dentist</a></span>
												<span class="description">Kalyan West</span>
											</div>
											  <!-- /.user-block -->   
										</div>
									
								@endfor
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