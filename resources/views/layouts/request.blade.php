<div class="row">
	<div class="col-md-12" id="request-details">
		<h4>
			<strong><i class="fa fa-envelope"></i> Request Details</strong>
		</h4>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">Service</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-magic"></i>
							</span>
							<input type="hidden" name="service_id" id="service_id" class="form-control" data-mandatory="yes" autocomplete="off" data-target-module="Service" data-target-field="id">
							<input type="text" name="service" id="service" class="bg-focus form-control autocomplete" data-mandatory="yes" autocomplete="off" data-target-module="Service" data-target-field="name">
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
					<label class="col-md-6 control-label">Requested By</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<input type="hidden" name="user_id" id="user_id" class="form-control" data-mandatory="yes" autocomplete="off" data-target-module="User" data-target-field="id">
							<input type="text" name="requested_by" id="requested_by" class="form-control autocomplete" data-mandatory="yes" autocomplete="off" data-target-module="User" data-target-field="full_name">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-4 control-label">City</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-location-arrow"></i>
							</span>
							<input type="text" name="city" id="city" class="form-control" data-mandatory="yes" autocomplete="off">
						</div>
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