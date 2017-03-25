<div class="row">
	<div class="col-md-12" id="service-details">
		<h4>
			<strong><i class="fa fa-magic"></i> Service Details</strong>
		</h4>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">Avatar</label>
					<div class="col-md-6 media">
						<div class="pull-left text-center avatar-box">
						@if (isset($form_data['tabService']['avatar']) && $form_data['tabService']['avatar'])
							<img src="{{ $form_data['tabService']['avatar'] }}" alt="{{ $form_data['tabService']['name'] }}">
						@else
							<i class="fa fa-picture-o inline fa-2x avatar"></i>
						@endif
						</div>
						<div class="media-body">
							<label title="Upload image file" for="avatar" class="btn btn-primary btn-sm">
								<input type="file" accept="image/*" name="avatar" id="avatar" class="hide">
								Change
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-4 control-label">Status</label>
					<div class="col-md-4">
						<select name="status" id="status" class="form-control" data-mandatory="yes">
							<option value="Active">Active</option>
							<option value="Inactive">Inactive</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">Name</label>
					<div class="col-md-6">
						<input type="text" name="name" id="name" class="bg-focus form-control" data-mandatory="yes" autocomplete="off">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-4 control-label">Slug</label>
					<div class="col-md-6">
						<input type="text" name="slug" id="slug" class="form-control" data-mandatory="yes" autocomplete="off">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">Description</label>
					<div class="col-md-6">
						<textarea rows="5" name="description" id="description" class="input-xlarge form-control" data-mandatory="no" autocomplete="off"></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>