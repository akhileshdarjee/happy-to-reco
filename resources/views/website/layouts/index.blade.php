@extends('website')

@section('title', 'Happy to Reco')

@section('body')
	<div class="content-wrapper">
		<main class="bs-docs-masthead" id="content" tabindex="-1"> 
			<div class="container"> 
				<p class="lead">
					Happy to Reco is a personal Recommendation Assistance
				</p>
				<p class="lead"> 
					<a href="/services" class="btn btn-outline-inverse btn-lg">Look for Recommendations</a>
					@if (Auth::check()) 
						<a href="/dashboard" class="btn btn-outline-inverse btn-lg">Ask for Recommendations</a>
					@else
						<a href="/login" class="btn btn-outline-inverse btn-lg">Ask for Recommendations</a>
					@endif
				</p>
			</div>
		</main>
	</div>
@endsection