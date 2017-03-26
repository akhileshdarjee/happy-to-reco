@extends('website')

@section('title', 'Add a Recommendation - Happy to Reco')

@section('body')
	<div class="container">
		<section class="content">
			<div class="col-md-8 col-md-offset-2">
				<div class="login-box-body">
					<h3>Recommend services to your friend that help him/her</h3>
					<form name="add-recommendation" class="form-horizontal" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-group">
							<label for="inputName" class="col-sm-3 control-label">Service </label>
							<div class="col-sm-9">
								<select class="form-control" id="service_type" name="service_type">
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