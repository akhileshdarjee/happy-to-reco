<div class="row">
	<div class="col-md-12" id="recommendation-details">
		<h4>
			<strong><i class="fa fa-gift"></i> Recommendation Details</strong>
		</h4>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">Avatar</label>
					<div class="col-md-6 media">
						<div class="pull-left text-center avatar-box">
						@if (isset($form_data['tabRecommendation']['avatar']) && $form_data['tabRecommendation']['avatar'])
							<img src="{{ $form_data['tabRecommendation']['avatar'] }}" alt="{{ $form_data['tabRecommendation']['name'] }}">
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
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">Contact No</label>
					<div class="col-md-6">
						<input type="text" name="contact_no" id="contact_no" class="form-control" data-mandatory="yes" autocomplete="off">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">Address</label>
					<div class="col-md-6">
						<textarea rows="5" name="address" id="address" class="input-xlarge form-control" data-mandatory="no" autocomplete="off"></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12" id="service-details">
		<h4>
			<strong><i class="fa fa-magic"></i> Service Details</strong>
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
					<label class="col-md-4 control-label">Recommended By</label>
					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<input type="text" name="recommended_by" id="recommended_by" class="form-control autocomplete" data-mandatory="yes" autocomplete="off" data-target-module="User" data-target-field="full_name" value="{{ Session::get('user') }}">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
						<table class="table table-bordered m-b-none" id="reco_cities" data-table="tabRecoCities">
							<thead class="text-small">
								<tr>
									<th width="6%" id="sr_no" class="text-center">#</th>
									<th id="action" class="text-center" style="display: none;">Action</th>
									<th id="row_id" class="text-center" style="display: none;">ID</th>
									<th width="88%" class="text-center" data-field-type="link" data-field-name="city" data-target-module="City" data-target-field="name">City</th>
									<th data-field-type="text" data-field-name="city_id" data-target-module="City" data-target-field="id" data-hidden="yes" style="display: none;">City ID</th>
									<th width="6%" id="remove"></th>
								</tr>
							</thead>
							<tbody>
								<tr class="odd">
									<td valign="middle" align="center" colspan="3">Empty</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3" class="text-right">
										<button type="button" class="btn btn-default btn-xs new_row" data-target="reco_cities">+ Add new row</button>
									</td>
								</tr>
							</tfoot>
						</table>
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