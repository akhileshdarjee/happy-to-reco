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
				  <h3 class="widget-user-username">Alexander Pierce</h3>
				  <h5 class="widget-user-desc">Founder &amp; CEO</h5>
				</div>
				<div class="widget-user-image">
				  <img class="img-circle" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
				</div>
				<div class="box-footer">
				  <div class="row">
					<div class="col-sm-6 border-right">
					  <div class="description-block">
						<h5 class="description-header">28</h5>
						<span class="description-text">Recommended</span>
					  </div>
					  <!-- /.description-block -->
					</div>
					<!-- /.col -->
					<div class="col-sm-6 border-right">
					  <div class="description-block">
						<h5 class="description-header">16</h5>
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
				@for($i=0;$i<=5;$i++)
					
						<div class="box-header with-border">
							<div class="user-block">
								<img class="img-circle" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
								<span class="username"><a href="#">Dentist</a></span>
								<span class="description">Kalyan West</span>
							</div>
							  <!-- /.user-block -->   
						</div>
					
				@endfor
				<div class="box-header with-border">
					<h5 class="text-center"><strong>Please help others</strong></h5>
					<a href="#" class="btn btn-primary btn-block">Make Recommendation</a>
					  <!-- /.user-block -->   
				</div>
				
			</div>
			<h3>Needed</h3>
			<div class="box box-widget widget-user-2">
				@for($i=0;$i<=5;$i++)
					
						<div class="box-header with-border">
							<div class="user-block">
								<img class="img-circle" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
								<span class="username"><a href="#">Dentist</a></span>
								<span class="description">Kalyan West</span>
							</div>
							  <!-- /.user-block -->   
						</div>
					
				@endfor

				<div class="box-header with-border">
					<h5 class="text-center"><strong>Need something?</strong></h5>
					<a href="#" class="btn btn-primary btn-block">Ask for help</a>
					  <!-- /.user-block -->   
				</div>
			</div>
	</section>
</div>
@endsection