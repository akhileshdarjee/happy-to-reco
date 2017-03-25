@extends('website')

<<<<<<< HEAD
@section('title', 'Happy to Reco')

@section('body')
	<div class="container">
		<section class="content">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<div class="has-feedback">
							<input type="text" class="form-control input-sm" placeholder="Search Recommendation">
							<span class="fa fa-search form-control-feedback"></span>
=======
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
							<div class="box box-primary">
								<div class="box-header with-border">
					              
					             	<div class="has-feedback">
					                  <input type="text" class="form-control input-sm" placeholder="Search Recommendation">
					                  <span class="fa fa-search form-control-feedback"></span>
					                </div>
					              
					              <!-- /.box-tools -->
					            </div>
							</div>
							<h3>Services</h3>
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
															</div>
														</div>
																	  
													</div>
															
											</div>	
										@endfor	
									</div>
								</div>
							</div>
>>>>>>> 1f3873665ce17056fc4dda6a42f2cc058202f0ae
						</div>
						<!-- /.box-tools -->
					</div>
				</div>
				<h3>Services</h3>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							@if (count($services))
								@foreach($services as $service)
									<div class="col-md-3">
										<div class="box box-widget widget-user-2">
											<div class="box-header with-border">
												<div class="text-center">
													<img class="img-circle" src="{{ $service->avatar }}" alt="{{ $service->name }}">
													<h2><a href="/login">{{ $service->name }}</a></h2>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection