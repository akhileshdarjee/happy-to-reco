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
					<a href="/recommendation_look" class="btn btn-outline-inverse btn-lg">Look for Recommendations</a> 
					<a href="/login" class="btn btn-outline-inverse btn-lg">Ask for Recommendations</a> 
				</p>
			</div>
		</main>
	</div>
@endsection