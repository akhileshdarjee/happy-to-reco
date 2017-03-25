<div class="row">
	<div class="col-md-12" id="friends-details">
		<h4>
			<strong><i class="fa fa-heart"></i> Friends Details</strong>
		</h4>
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
					<label class="col-md-6 control-label">Email</label>
					<div class="col-md-6">
						<input type="text" name="email" id="email" class="form-control" data-mandatory="yes" autocomplete="off">
					</div>
				</div>
			</div>
		</div>
		@if (Session::get('role') == "Administrator")
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-6 control-label">Friend Of</label>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-user"></i>
								</span>
								<input type="hidden" name="friend_id" id="friend_id" class="form-control" data-mandatory="yes" autocomplete="off" data-target-module="User" data-target-field="id">
								<input type="text" name="friend_of" id="friend_of" class="form-control autocomplete" data-mandatory="yes" autocomplete="off" data-target-module="User" data-target-field="name">
							</div>
						</div>
					</div>
				</div>
			</div>
		@endif
	</div>
</div>