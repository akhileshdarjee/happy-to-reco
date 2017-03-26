@extends('website')

@section('title', $recommendations[0]->service . ' Recommendations - Happy to Reco')

@section('breadcrumb')
	<section class="content-header">
		<h1>&nbsp;</h1>
		<ol class="breadcrumb app-breadcrumb">
			<li>
				<a href="/">Home</a>
			</li>
			<li>
				<a href="/services">Services</a>
			</li>
			<li class="active">
				<strong>{{ $recommendations[0]->service }}</strong>
			</li>
		</ol>
	</section>
@endsection

@section('body')
	<div class="container">
		<section class="content">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							@if (count($recommendations))
								@foreach($recommendations as $recommendation)
									<div class="col-md-3">
										<div class="box box-widget widget-user-2">
											<div class="box-header with-border">
												<div class="text-center">
													<a href="/service/{{ $slug }}/{{ $recommendation->id }}">
														<img class="img-circle img-responsive" src="{{ $recommendation->avatar }}" alt="{{ $recommendation->name }}">
													</a>
													<h2><a href="/service/{{ $slug }}/{{ $recommendation->id }}">{{ $recommendation->name }}</a></h2>
													<p class="mar-t-10">
														<span class="label label-success">Personally recommended</span> <br/>by {{ $recommendation->full_name }}
													</p>
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
												<h3><i class="fa fa-warning text-yellow"></i> Oops! no recommendation found.</h3>
												<p>
													We could not find the {{ $service }} you were looking for. Meanwhile, check our other <a href="/services">Services</a> 
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