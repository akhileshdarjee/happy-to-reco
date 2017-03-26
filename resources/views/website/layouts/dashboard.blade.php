@extends('website')

@section('title', 'User Dashboard - Happy to Reco')

@section('body')
	<div class="container">
		<section class="content">
			<div class="col-md-4 col-md-offset-4">
				<!-- Widget: user widget style 1 -->
				<div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-aqua-active">
						<h3 class="widget-user-username text-center">{{ Session::get('user') }}</h3>
					</div>
					<div class="widget-user-image">
						<img class="img-circle" src="{{ Session::get('avatar') }}" alt="{{ Session::get('user') }}">
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-6 border-right">
								<div class="description-block">
									<h5 class="description-header">{{ count($recommendations) }}</h5>
									<span class="description-text">Recommended</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-6 border-right">
								<div class="description-block">
									<h5 class="description-header">{{ count($needed) }}</h5>
									<span class="description-text">NEEDED</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
				</div>
				<!-- /.widget-user -->
				<h3>Recommended</h3>
				<div class="box box-widget widget-user-2">
					@foreach($recommendations as $recommendation)
						<div class="box-header with-border">
							<div class="user-block">
								<img class="img-circle" src="{{ $recommendation->avatar }}" alt="{{ $recommendation->name }}">
								<span class="username">
									<a href="/service/{{ $recommendation->slug }}/{{ $recommendation->id }}">{{ $recommendation->service }}</a>
								</span>
								@if (count($recommendation->cities) > 2)
									<span class="description">{{ $recommendation->cities[0] }}, {{ $recommendation->cities[1] }} &amp; {{ (count($recommendation->cities) - 2) }} others</span>
								@elseif (count($recommendation->cities) == 2)
									<span class="description">{{ $recommendation->cities[0] }} &amp; {{ $recommendation->cities[1] }}</span>
								@elseif (count($recommendation->cities) == 1)
									<span class="description">{{ $recommendation->cities[0] }}</span>
								@endif
							</div>
							<!-- /.user-block -->
						</div>
					@endforeach
					<div class="box-header with-border">
						<h5 class="text-center"><strong>Please help others</strong></h5>
						<a href="/add-recommendation" class="btn btn-primary btn-block">Make Recommendation</a>
						<!-- /.user-block -->   
					</div>
				</div>
				<h3>Needed</h3>
				<div class="box box-widget widget-user-2">
					@foreach($needed as $need)
						<div class="box-header with-border">
							<div class="user-block">
								<img class="img-circle" src="{{ $need->avatar }}" alt="{{ $need->name }}">
								<span class="username"><a href="/">{{ $need->service }}</a></span>
								<span class="description">{{ $need->city }}</span>
							</div>
							<!-- /.user-block -->
						</div>
					@endforeach
					<div class="box-header with-border">
						<h5 class="text-center"><strong>Need help?</strong></h5>
						<a href="#" class="btn btn-primary btn-block">Ask for Recommendations</a>
						<!-- /.user-block -->   
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection