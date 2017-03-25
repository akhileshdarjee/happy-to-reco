@extends('website')

@section('title', $service . ' Recommendations - Happy to Reco')

@section('body')
	<div class="container">
		<section class="content">
			<div class="col-md-12">
				<h3>{{ $service }}</h3>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							@if (count($recommendations))
								@foreach($recommendations as $recommendation)
									<div class="col-md-3">
										<div class="box box-widget widget-user-2">
											<div class="box-header with-border">
												<div class="text-center">
													<img class="img-circle" src="{{ $recommendation->avatar }}" alt="{{ $recommendation->name }}">
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
													We could not find the {{ $service }} you were looking for. Meanwhile, you may return to <a href="#">Home page</a> 
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