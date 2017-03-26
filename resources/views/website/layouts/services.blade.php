@extends('website')

@section('title', 'Services - Happy to Reco')

@section('breadcrumb')
	<section class="content-header">
		<h1>&nbsp;</h1>
		<ol class="breadcrumb app-breadcrumb">
			<li>
				<a href="/">Home</a>
			</li>
			<li class="active">
				<strong>Services</strong>
			</li>
		</ol>
	</section>
@endsection

@section('body')
	<div class="container">
		<section class="content">
			<div class="col-md-12">
				<!-- <div class="box box-primary">
					<div class="box-header with-border">
						<div class="has-feedback">
							<input type="text" class="form-control input-sm" placeholder="Search Recommendation">
							<span class="fa fa-search form-control-feedback"></span>
						</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							@if (count($services))
								@foreach($services as $service)
									<div class="col-md-3">
										<div class="box box-widget widget-user-2">
											<div class="box-header with-border">
												<div class="text-center">
													<a href="/service/{{ $service->slug }}" title="{{ $service->name }}">
														<img class="img-circle" src="{{ $service->avatar }}" alt="{{ $service->name }}">
													</a>
													<h2><a href="/service/{{ $service->slug }}">{{ $service->name }}</a></h2>
												</div>
											</div>
										</div>
									</div>
								@endforeach
							@else
								<div class="col-md-4 col-md-offset-4">
									<div class="box box-widget widget-user-2">
										<div class="box-header with-border">
											<div class="text-center">
												<h3><i class="fa fa-warning text-yellow"></i> Oops! no services found.</h3>
												<p>
													We could not find the services you were looking for. Meanwhile, you may return to <a href="#">Home page</a> 
												</p>
											</div>
										</div>
									</div>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection