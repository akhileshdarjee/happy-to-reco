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
	<body class="hold-transition skin-blue layout-top-nav home">
		<div class="wrapper">
			@include('website.templates.navbar')
			<!-- Body -->
			<div class="content-wrapper">
				<main class="bs-docs-masthead" id="content" tabindex="-1"> 
					<div class="container"> 
						<p class="lead">
							Happy to Reco is a personal Recommendation Assistance
						</p> 
						<p class="lead"> 
							<a href="#" class="btn btn-outline-inverse btn-lg">Look for Recommendations</a> 
							<a href="#" class="btn btn-outline-inverse btn-lg">Ask for Recommendations</a> 
						</p> 
					 </div> 
				</main>
			</div>
			<!-- Footer -->
			@include('templates.footer')
		</div>
		@stack('scripts')
	</body>
</html>