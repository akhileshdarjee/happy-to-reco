@extends('website')

@section('title', 'Add a Recommendation - Happy to Reco')

@section('body')
	<div class="container">
		<section class="content">
			<div class="col-md-8 col-md-offset-2">
				<div class="login-box-body">
					<h3>Recommend services to your friend that help him/her</h3>
					<form method="POST" action="/add-recommendation" name="add-recommendation" class="form-horizontal" enctype="multipart/form-data">
						@if (Session::has('msg'))
							@if (Session::has('success') && Session::get('success') == "true")
								<div class="block">
									<div class="alert alert-success alert-dismissible">
										<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
										<strong>
											<i class="fa fa-check fa-lg"></i> {{ Session::get('msg') }}
										</strong>
									</div>
								</div>
							@else
								<div class="block">
									<div class="alert alert-danger alert-dismissible">
										<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
										<strong>
											<i class="fa fa-exclamation-triangle fa-lg"></i> {{ Session::get('msg') }}
										</strong>
									</div>
								</div>
							@endif
						@endif
						{!! csrf_field() !!}
						<div class="form-group">
							<label for="inputName" class="col-sm-3 control-label">Service </label>
							<div class="col-sm-9">
								<select class="form-control" id="service_id" name="service_id">
									<option value="">Select Service Type</option>
									@if (count($services))
										@foreach($services as $service)
											<option value="{{ $service->id }}">{{ $service->name }}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-sm-3 control-label">City</label>
							<div class="col-sm-9">
								<select class="form-control" id="city" name="city">
									<option value="">Select City</option>
									@if (count($cities))
										@foreach($cities as $city)
											<option value="{{ $city->id }}">{{ $city->name }}</option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Avatar</label>
							<div class="col-sm-9">
								<div class="media-body">
									<label title="Upload image file" for="avatar" class="btn btn-primary btn-sm">
										<input type="file" accept="image/*" name="avatar" id="avatar" class="hide">
										Select...
									</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-3 control-label">Person Name</label>
							<div class="col-sm-9">
								<input class="form-control" name="name" id="name" placeholder="Name" />
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-3 control-label">Person Contact No</label>
							<div class="col-sm-9">
								<input class="form-control" name="contact_no" id="contact_no" placeholder="Contact No." />
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-3 control-label">Address</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" id="description" placeholder="Tell something more about the person..."></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-10">
								<button type="submit" class="btn btn-danger">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
@endsection