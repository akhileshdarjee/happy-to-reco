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
				@yield('breadcrumb')
				<section class="content">
					<div class="callout callout-info">
						<h4>Tip!</h4>
						<p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
							sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
							links instead.
						</p>
					</div>
					<div class="callout callout-danger">
						<h4>Warning!</h4>
						<p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
							and the content will slightly differ than that of the normal layout.
						</p>
					</div>
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">Blank Box</h3>
						</div>
						<div class="box-body">
							The great content goes here
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</section>
			</div>
			<!-- Footer -->
			@include('templates.footer')
		</div>
		@stack('scripts')
	</body>
</html>