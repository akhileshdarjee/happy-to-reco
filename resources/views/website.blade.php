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
	@if (Request::is('/'))
		<body class="hold-transition skin-blue layout-top-nav home">
	@else
		<body class="hold-transition skin-blue layout-top-nav">
	@endif
		<div class="wrapper">
			@include('website.templates.navbar')
			<div class="content-wrapper">
				@yield('breadcrumb')
				@yield('body')
			</div>
		</div>
		@stack('scripts')
	</body>
</html>