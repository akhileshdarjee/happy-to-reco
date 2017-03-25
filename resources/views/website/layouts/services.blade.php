@extends('website')

@section('title', 'Services - Happy to Reco')

@section('body')
	<div class="container">
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
							@if (count($services))
								@foreach($services as $service)
									<div class="col-md-3">
										<div class="box box-widget widget-user-2">
											<div class="box-header with-border">
												<div class="text-center">
													<img class="img-circle" src="{{ $service->avatar }}" alt="{{ $service->name }}">
													<h2><a href="/service/{{ $service->slug }}">{{ $service->name }}</a></h2>
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