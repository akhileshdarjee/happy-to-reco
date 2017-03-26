@extends('app')

@section('title', awesome_case($title) . ' - Happy to Reco')

@section('data')
	<script type="text/javascript">
		window.doc = {
			data: <?php echo isset($form_data) ? json_encode($form_data) : "false" ?>,
			title: "{{ $title }}",
			module: "{{ $module }}",
			changed: false
		};
	</script>
@endsection

{{-- Hide breadcrumbs for Single type Modules eg. Settings --}}

@if (!isset($module_type))
	@section('breadcrumb')
		<section class="content-header">
			<h1>&nbsp;</h1>
			<ol class="breadcrumb app-breadcrumb">
				<li>
					<a href="/app">Home</a>
				</li>
				<li>
					<a href="/list/{{ snake_case($module) }}">{{ $title }}</a>
				</li>
				<li class="active">
					<strong>{{ isset($form_data[$table_name]['id']) ? $form_data[$table_name][$record_identifier] : 'New ' . $title }}</strong>
				</li>
			</ol>
		</section>
	@endsection
@endif

@section('body')
	<div class="box">
		<div class="box-header with-border">
			<div class="box-title floatbox-title">
				<div class="form-name">
					@if (isset($module_type) && $module_type == "Single")
						<i class="{{ $icon }}"></i> {{ $title }}
					@else
						<i class="{{ $icon }}"></i> {{ isset($form_data[$table_name]['id']) ? $form_data[$table_name][$record_identifier] : "New $title" }}
					@endif

					@if (isset($form_data[$table_name]['id']))
						<div class="form-status non-printable">
							<small>
								<span class="text-center" id="form-stats">
									<i class="fa fa-circle text-success"></i>
									<span id="form-status">Saved</span>
								</span>
							</small>
						</div>
					@endif
				</div>
			</div>
			<div class="box-tools non-printable">
				<ul class="no-margin pull-right">
					@if (isset($form_data[$table_name]['id']))
						<!-- Form action buttons -->
						<div class="btn-group">
							<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
								File <span class="caret"></span>
							</button>
							<ul class="dropdown-menu dropdown-left">
								<li>
									<a href="/form/{{ snake_case($module) }}/draft/{{ $form_data[$table_name][$link_field] }}">
										Duplicate
									</a>
								</li>
								<li>
									<a href="#" id="delete" name="delete">Delete</a>
								</li>
								<li>
									<a href="#" id="print-page">Print</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="/form/{{ snake_case($module) }}">New {{ $title }}</a>
								</li>
							</ul>
						</div>
					@endif
				</ul>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			@if (isset($module_type) && $module_type == "Single")
				@include($file)
			@else
				@var $action = "/form/" . snake_case($module)
				<form method="POST" action="{{ isset($form_data[$table_name]['id']) ? $action."/".$form_data[$table_name][$link_field] : $action }}" name="{{ snake_case($module) }}" id="{{ snake_case($module) }}" class="form-horizontal" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<input type="hidden" name="id" id="id" class="form-control" data-mandatory="no" autocomplete="off" readonly>
					@if (view()->exists(str_replace('.', '/', $file)))
						@include($file)
					@else
						Please create '{{ str_replace('.', '/', $file) }}.blade.php' in views
					@endif
				</form>
			@endif
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix hidden-print">
			<div class="col-md-3">&nbsp;</div>
			<div class="col-md-8">
				<button type="reset" class="btn btn-default" id="reset_form">Reset</button>
				<button type="submit" class="btn btn-primary disabled" id="save_form">
					<i class="fa fa-save"></i> Save Changes
				</button>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script type="text/javascript" src="/js/web_app/form.js"></script>
	<script type="text/javascript" src="/js/web_app/table.js"></script>
	@if (File::exists(public_path('/js/web_app/' . snake_case($module) . '.js')))
		<!-- Include client js file -->
		<script type="text/javascript" src="/js/web_app/{{ snake_case($module) }}.js"></script>
	@endif
@endpush