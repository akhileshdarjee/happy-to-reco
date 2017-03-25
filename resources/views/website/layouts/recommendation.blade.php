@extends('website')

@section('title', 'Recommendation - Happy to Reco')

@section('body')
	<div class="container">
		<section class="content">
				<div class="col-md-4 col-md-offset-4">
					<div class="box box-widget widget-user-2">
						<div class="box-header with-border">
									<div class="user-block">
										<img class="img-circle" src="{{ $recommendation->avatar }}" alt="{{ $recommendation->name }}">
										<span class="username">{{ $recommendation->name }}</span>
										<span class="description">Kalyan West</span>
									</div>
									<p class="mar-t-10"><span class="label label-success">Personally recommended</span> by {{ $recommendation->full_name }}</p>
									<hr>
									@if (Auth::check())
										<div>
							              <strong><i class="fa fa-phone margin-r-5"></i> Contact</strong>
							              <p class="text-muted">
							                {{ $recommendation->contact_no }}
							              </p>
							              <hr>
							              <strong><i class="fa fa-comment margin-r-5"></i> Description</strong>
							              <p class="text-muted">{{ $recommendation->description }}</p>
							              <hr>
							              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
							              <p class="text-muted">{!! nl2br($recommendation->address) !!}</p>
							            </div>
							        @else
							        	<h5 class="text-center">Please login to see further details</h5>
							        	<a href="/login" class="btn btn-primary btn-block">Login</a>
							        @endif
						</div>
					</div>
		</section>
	</div>
@endsection