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
						<div class="col-md-6 col-md-offset-3">
							<div class="login-box-body">
								<h3>Recommend services to your friend that help him</h3>
								<form class="form-horizontal">
								  <div class="form-group">
									<label for="inputName" class="col-sm-2 control-label">Service </label>

									<div class="col-sm-10">
									  <select class="form-control" id="service_type" name="service_type">
									  	<option value="">Select Service Type</option>
									  	<option value="driver">Driver</option>
									  </select>
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">City</label>

									<div class="col-sm-10">
									  <input type="text" class="form-control" id="city" placeholder="City">
									</div>
								  </div>
								  
								  <div class="form-group">
									<label for="inputExperience" class="col-sm-2 control-label">Description</label>

									<div class="col-sm-10">
									  <textarea class="form-control" id="description" placeholder="Description"></textarea>
									</div>
								  </div>
								  
								  <div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-danger">Submit</button>
									</div>
								  </div>
								</form>
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